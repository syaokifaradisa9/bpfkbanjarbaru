// Helper
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

function getAllAlkesCategory(){
    const alkesCategories = document.getElementById('category_0').options;
    const categories = [];
    for (let i = 0; i < alkesCategories.length; i++) { 
        categories.push({
            'id': alkesCategories[i].value,
            'name' : alkesCategories[i].text
        });
    }

    return categories;
}

async function setAlkesSelectByCategoryId(rowId, selectedId){
    const response = await fetch(`http://bpfkbanjarbaru.test/api/category/${selectedId}/alkes?api_key=MAq6gTq9gJacnrqJxmfBs1kZwC9VJDcwcHbI66ns687ZUqhcCfKWd76kyQTnZ7`);
    const json = await response.json();
    
    dropdownData = '';
    dropdownData += `<option value="-" hidden selected>Pilih Alat Kesehatan</option>`;
    for(var data of json){
        dropdownData += `<option value="${data.id}">${data.name}</option>`;
    }

    document.getElementById(`alkes_${rowId}`).innerHTML = dropdownData;
}

async function setAlkesPriceByAlkesId(rowId, selectedId){
    const response = await fetch(`http://bpfkbanjarbaru.test/api/alkes/${selectedId}/price?api_key=7ZwiJpZaHEmSy7OMAAxq0GPmXIp6iU5l1ERBVNgw59ofNxvhw8egjvrsK058JJ`);
    const price = await response.json();

    document.getElementById(`price_${rowId}`).innerHTML = rupiahConverter(price, 'Rp. ');
    refreshTable();
}

// Update Table
function refreshTable(){
    // Mendapatkan jumlah data
    const alkesOrdertable = document.getElementById('alkes-order-table');
    const totalDataRow = alkesOrdertable.rows.length - 2;

    // Inisialisasi Variabel
    var ammounts = 0;
    var totals = 0;

    // Perulangan sebanyak banyak data
    for(var i=0; i<totalDataRow; i++){
        // Kalkulasi Sub total
        const rawPrice = document.getElementById(`price_${i}`).innerHTML.split(' ')[1];
        const price = rawPrice.replaceAll('.', '');
        const ammount = document.getElementById(`ammount_${i}`).value;
        const subtotal = price * ammount;
        document.getElementById(`subtotal_${i}`).innerHTML = rupiahConverter(subtotal, "Rp. ");

        // Kalkulasi Total
        ammounts += parseInt(ammount);
        totals += subtotal;

        // Event Binding
        document.getElementById(`ammount_${i}`).addEventListener('change', onChangeAmmount);
        document.getElementById(`category_${i}`).addEventListener('change', onChangeCategory);
        document.getElementById(`alkes_${i}`).addEventListener('change', onChangeAlkes);
        document.getElementById(`btnDelete_${i}`).addEventListener('click', deleteRowAlkesOrder);
    }

    // Update UI
    document.getElementById('total_ammount').innerHTML = ammounts;
    document.getElementById('total_price').innerHTML = rupiahConverter(totals, 'Rp. ');
}

// Action Function
function addRowAlkesOrder(){
    event.preventDefault();

    const alkesOrdertable = document.getElementById('alkes-order-table');
    const newRow = alkesOrdertable.insertRow(alkesOrdertable.rows.length-1);


    const categories = getAllAlkesCategory();
    const categoryOptions = [];
    for(const category of categories){
        categoryOptions.push(`<option value="${category.id}">${category.name}</option>`);
    }

    const newRowNumber = alkesOrdertable.rows.length-2;
    const newRowId = newRowNumber-1;

    newRow.innerHTML = `
        <td id="number_${newRowId}">${newRowNumber}</td>
        <td class="pt-3">
            <div class="form-group">
                <select class="form-control select2 category-select" name="category[]" id="category_${newRowId}">
                    <option value="-" selected hidden>Pilih Layanan</option>
                    ${categoryOptions}
                </select>
            </div>
        </td>
        <td class="pt-3">
            <div class="form-group align-middle">
                <select class="form-control select2 alkes-select" name="alkes[]" id="alkes_${newRowId}">
                <option value="-">-</option>
                </select>
            </div>
        </td>
        <td id="price_${newRowId}" class="text-right">Rp. 0</td>
        <td class="pt-3">
            <div class="form-group">
                <input type="number" class="form-control text-center ammount-input" name="ammount[]" value="1" id="ammount_${newRowId}">
            </div>
        </td>
        <td class="text-right " id="subtotal_${newRowId}">${newRowId}</td>
        <td class="text-center pt-3">
            <div class="form-group">
                <textarea class="form-control" name="description[]" id="description_${newRowId}"> </textarea>
            </div>
        </td>
        <td class="text-center">
            <button class="btn btn-sm btn-danger btn_delete" id="btnDelete_${newRowId}"><i class="fas fa-trash-alt"></i></button>
        </td>
    `;

    refreshTable();
}

function deleteRowAlkesOrder(){
    event.preventDefault();

    const alkesOrderTable = document.getElementById('alkes-order-table');
    const totalDataRows = alkesOrderTable.rows.length - 2;

    if(totalDataRows === 1){
        alert('Tidak bisa menghapus!');
    }else{
        this.closest('tr').remove();
        const rows = document.getElementsByClassName('btn_delete');
        for(var i=0; i<rows.length; i++){
            var rowId = rows[i].id.split('_')[1];
            if(rowId != i){
                document.getElementById(`category_${rowId}`).id = `category_${i}`;
                document.getElementById(`number_${rowId}`).innerHTML  = i + 1;
                document.getElementById(`number_${rowId}`).id = `number_${i}`;
                document.getElementById(`alkes_${rowId}`).id = `alkes_${i}`;
                document.getElementById(`price_${rowId}`).id = `price_${i}`;
                document.getElementById(`ammount_${rowId}`).id = `ammount_${i}`;
                document.getElementById(`subtotal_${rowId}`).id = `subtotal_${i}`;
                document.getElementById(`btnDelete_${rowId}`).id = `btnDelete_${i}`;
                document.getElementById(`description_${rowId}`).id = `description_${i}`;
            }
        }

        refreshTable();
    }
}

function onChangeAmmount(){
    if(this.closest('.ammount-input').value < 1){
        alert("Jumlah Tidak Boleh Kurang dari 1");
        this.closest('.ammount-input').value = 1;
    }
    refreshTable();
}

function onChangeAlkes(){
    const idNumber = this.closest('.alkes-select').id.split("_")[1];
    const selectedId = this.closest('.alkes-select').value;
    setAlkesPriceByAlkesId(idNumber, selectedId);
}

function onChangeCategory(){
    const idNumber = this.closest('.category-select').id.split("_")[1];
    const selectedId = this.closest('.category-select').value;
    setAlkesSelectByCategoryId(idNumber, selectedId);
}

// Binding Event
document.addEventListener("DOMContentLoaded", function(){
    const addAlkesOrderRow = document.getElementById('btnAddRow');
    addAlkesOrderRow.addEventListener('click', addRowAlkesOrder);

    refreshTable();
});