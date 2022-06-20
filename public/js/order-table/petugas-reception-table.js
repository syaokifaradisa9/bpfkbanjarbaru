function getAllAlkes(){
    const alkesOptions = document.getElementById('alkes_0').options;
    const alkes = [];
    for (let i = 1; i < alkesOptions.length; i++) { 
        alkes.push({
            'id': alkesOptions[i].value,
            'name' : alkesOptions[i].text
        });
    }

    return alkes;
}

function onAmmountChange(event){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 2;

    var value = event.target.value;
    if(value < 1){
        alert('Jumlah Tidak Boleh Kurang Dari 1');
        event.target.value = 1;
    }else{
        var dataId = event.target.id.split('_')[1];
        var selectedAlkes = document.getElementById(`alkes_${dataId}`);

        if(selectedAlkes.value !== '-'){
            var totalAmmountInAlkes = 0;
            for(var i=0; i<totalDataRow; i++){
                if(document.getElementById(`alkes_${i}`).value == selectedAlkes.value){
                    totalAmmountInAlkes+= parseInt(document.getElementById(`ammount_${i}`).value);
                }
            }

            var maxAmmount = document.getElementById(`ammount-${selectedAlkes.value}`).innerHTML.trim();
            if(totalAmmountInAlkes > maxAmmount){
                var realAmmount = maxAmmount;
                for(var i=0; i<totalDataRow; i++){
                    if(document.getElementById(`alkes_${i}`).value == selectedAlkes.value && i != dataId){
                        realAmmount-= parseInt(document.getElementById(`ammount_${i}`).value);
                    }
                }

                event.target.value = realAmmount;
                alert('Batas Maksimum Terpenuhi!');
            }
        }

        var totalAmmount = 0;
        for(var i=0; i<totalDataRow; i++){
            totalAmmount+= parseInt(document.getElementById(`ammount_${i}`).value);
        }

        console.log(document.getElementById('total_ammount').innerHTML);
        document.getElementById('total_ammount').innerHTML = totalAmmount;
    }
}

function onAlkesDropdownChange(event){
    var dataId = event.target.id.split('_')[1];
    var alkesId = event.target.value;
    document.getElementById(`description_client_id_${dataId}`).value = document.getElementById(`description-id-${alkesId}`).innerHTML.trim();
}

function refreshTable(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 2;

    for(var i=0; i<totalDataRow; i++){
        document.getElementById(`ammount_${i}`).addEventListener('change', onAmmountChange);
        document.getElementById(`alkes_${i}`).addEventListener('change', onAlkesDropdownChange)
    }
}

function addRowTable(event){
    event.preventDefault();

    const alkesOptions = [];
    for(const alkes of getAllAlkes()){
        alkesOptions.push(`<option value="${alkes.id}">${alkes.name}</option>`);
    }

    const ordertable = document.getElementById('order-table');
    const newRow = ordertable.insertRow(ordertable.rows.length-1);

    const newRowNumber = ordertable.rows.length-2;
    const newRowId = newRowNumber-1;

    newRow.innerHTML = `
        <td class="align-middle">
            <select class="form-control select2 alkes-select" name="alkes[]" id="alkes_${newRowId}">
                <option value="-" selected hidden>Alat Kesehatan</option>
                ${alkesOptions}
            </select>
            <input type="text" class="d-none" name="description_client_id[]" id="description_client_id_${newRowId}">
        </td>
        <td><input type="text" class="form-control text-center" name="merk[]" id="merk_${newRowId}"></td>
        <td><input type="text" class="form-control text-center" name="model[]" id="model_${newRowId}"></td>
        <td><input type="text" class="form-control text-center" name="series_number[]" id="series_number_${newRowId}"></td>
        <td><input type="number" class="form-control text-center" name="ammount[]" id="ammount_${newRowId}" value="1"></td>
        <td>
            <div class="custom-control custom-radio">
                <input name="function_${newRowId}" value="Baik" type="radio" id="function_${newRowId}_a" class="custom-control-input" checked>
                <label class="custom-control-label" for="function_${newRowId}_a">Baik</label>
            </div>
            <div class="custom-control custom-radio">
                <input name="function_${newRowId}" value="Tidak Baik" type="radio" id="function_${newRowId}_b" class="custom-control-input">
                <label class="custom-control-label" for="function_${newRowId}_b">Rusak</label>
            </div>
        </td>
        <td><input type="text" class="form-control text-center" name="description[]" id="description_${newRowId}"></td>
        <td class="text-center">
            <button class="btn btn-sm btn-danger btn_delete" id="btnDelete_${newRowId}"><i class="fas fa-trash-alt"></i></button>
        </td>
    `;

    refreshTable();
}

document.addEventListener("DOMContentLoaded", function(){
    document.getElementById('btnAddRow').addEventListener('click', addRowTable);
    refreshTable();
});