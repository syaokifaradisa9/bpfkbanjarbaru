function rupiahConverter(number, prefix){
	var number_string = number.toString().replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	div     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, div),
	thousands     	= split[0].substr(div).match(/\d{3}/gi);
 
	if(thousands){
		separator = div ? '.' : '';
		rupiah += separator + thousands.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

function resetTable(){
  const alkesOrdertable = document.getElementById('price-table');
  const totalDataRow = alkesOrdertable.rows.length - 2;

  for(var i=0; i < totalDataRow; i++){
    var btnDelete = document.getElementById(`btnDelete_${i}`);
    if(btnDelete){
      btnDelete.addEventListener('click', removeRow);
    }
    
    var priceForm = document.getElementById(`price_${i}`);
    console.log(priceForm);
    if(priceForm){
      priceForm.addEventListener('click', setUpAccomodationForm);
      priceForm.addEventListener('input', changeFormAccomodation);
      priceForm.addEventListener('focusout', keyFocusOutAccomodationEvent);
      priceForm.addEventListener('keyup', keyUpAccomodationEvent);

      var rawCost = parseInt(priceForm.value.replaceAll('.','').match(/\d+/)[0]);
      priceForm.value = rupiahConverter(rawCost, 'Rp. ');
    }
  }

  updateTotalAccommodation();
}

function addRow(event){
  event.preventDefault();

  const alkesOrdertable = document.getElementById('price-table');
  const newRow = alkesOrdertable.insertRow(alkesOrdertable.rows.length - 1);

  const newRowNumber = alkesOrdertable.rows.length-2;
  const newRowId = newRowNumber-1;

  newRow.innerHTML = `
    <td id="number_${newRowId}" class="text-center">${newRowNumber}</td>
    <td class="pt-3">
      <div class="form-group">
        <input type="text" class="form-control cost-breakdown-input" name="cost-breakdown[]" id="cost-breakdown_${newRowId}">
      </div>
    </td>
    <td class="pt-3">
      <div class="form-group">
        <input type="text" class="form-control text-right price-input" name="price[]" value="Rp. 0" id="price_${newRowId}">
      </div>
    </td>
    <td class="text-center pt-3">
      <div class="form-group">
        <textarea class="form-control" name="description[]" id="description_${newRowId}"> </textarea>
      </div>
    </td>
    <td class="text-center">
      <button class="btn btn-sm btn-danger btn_delete" id="btnDelete_${newRowId}"><i class="fas fa-trash-alt"></i></button>
    </td>
  `;

  resetTable();
}

function removeRow(event){
  event.preventDefault();

  const alkesOrderTable = document.getElementById('price-table');
  const totalDataRows = alkesOrderTable.rows.length - 2;

  if(totalDataRows === 2){
    alert('Tidak bisa menghapus!');
}else{
    var deletedId = parseInt(this.closest('tr').getElementsByTagName ('td')[0].id.split('_')[1]);
    this.closest('tr').remove();

    for(var i=deletedId; i < totalDataRows - 1; i++){
      document.getElementById(`number_${i + 1}`).innerHTML  = i + 1;
      document.getElementById(`number_${i + 1}`).id = `number_${i}`;
      document.getElementById(`cost-breakdown_${i + 1}`).id = `cost-breakdown_${i}`;
      document.getElementById(`price_${i + 1}`).id = `price_${i}`;
      document.getElementById(`description_${i + 1}`).id = `description_${i}`;
      document.getElementById(`btnDelete_${i + 1}`).id = `btnDelete_${i}`;
    }

    resetTable();
  }
}

function updateTotalAccommodation(){
  const alkesOrdertable = document.getElementById('price-table');
  const totalDataRow = alkesOrdertable.rows.length - 2;

  var totalAccommodation = 0;
  for(var i=0; i < totalDataRow; i++){
    var priceForm = document.getElementById(`price_${i}`);
    var rawCost = parseInt(priceForm.value.replaceAll('.','').match(/\d+/)[0]);

    totalAccommodation += rawCost;
  }

  document.getElementById('total_price').innerHTML = rupiahConverter(totalAccommodation, 'Rp. ');
}

document.addEventListener("DOMContentLoaded", function(){
  document.getElementById('btnAddRow').addEventListener('click', addRow);
  resetTable();
});

function setUpAccomodationForm(event){
  var element = event.target;
  if(element.value === 'Rp. 0'){
    element.value = 'Rp. ';
  }
}

function changeFormAccomodation(event){
  var element = event.target;
  var rawCost = element.value.replaceAll('.','').match(/\d+/);

  if(rawCost != null){
    element.value = rupiahConverter(rawCost[0], 'Rp. ');
  }else{
    element.value = 'Rp. ';
  }

  updateTotalAccommodation();
}

function keyFocusOutAccomodationEvent(event){
  var element = event.target;
  if(element.value === 'Rp. '){
    element.value = 'Rp. 0';
  }
}

function keyUpAccomodationEvent(event){
  if(event.keyCode === 8){
    var element = event.target;
    if(!element.value.includes('Rp. ')){
      var rawCost = element.value.replaceAll('.','').match(/\d+/);
      if(rawCost != null){
        element.value = rupiahConverter(rawCost[0], 'Rp. ');
      }else{
        element.value = 'Rp. ';
      }
    }

    updateTotalAccommodation();
  }
}