function refreshTable(){
    // Mendapatkan jumlah data
    const paymentTable = document.getElementById('payment-order-table');
    const totalDataRow = paymentTable.rows.length - 2;

    // Perulangan sebanyak banyak data
    for(var i=0; i<totalDataRow; i++){
        document.getElementById(`btn-delete-${i}`).addEventListener('click', deleteRow);
        document.getElementById(`payment-form-${i}`).addEventListener('change', function(event){
            const fileForm = event.target;
            const fileName = fileForm.value.split('\\').pop();

            const id = fileForm.id.split('-')[2];
            document.getElementById(`payment-form-label-${id}`).innerHTML = fileName;
        });
    }
}

function addRow(event){
    event.preventDefault();

    const paymentTable = document.getElementById('payment-order-table');
    const newRow = paymentTable.insertRow(paymentTable.rows.length-1);

    const newRowNumber = paymentTable.rows.length-2;
    const newRowId = newRowNumber-1;

    newRow.innerHTML = `
        <td id="number-${newRowId}" class="align-middle text-center">${newRowNumber}</td>
        <td id="file-${newRowId}" class="align-middle">
            -
        </td>
        <td>
            <div class="form-group mt-3">
                <div class="custom-file">
                    <input type="file" name="payment_file[]" class="custom-file-input" id="payment-form-${newRowId}" name="payment_${newRowId}">
                    <label class="custom-file-label" for="uploaded-file-form" id="payment-form-label-${newRowId}">Choose file</label>
                </div>
            </div>
        </td>
        <td class="text-center align-middle">
            <button class="btn btn-sm btn-danger btn-delete" id="btn-delete-${newRowId}"><i class="fas fa-trash-alt"></i></button>
        </td>
    `;

    refreshTable();
}

function deleteRow(event){
    event.preventDefault();

    const paymentTable = document.getElementById('payment-order-table');
    const totalDataRows = paymentTable.rows.length - 2;

    if(totalDataRows === 1){
        alert('Tidak bisa menghapus!');
    }else{
        this.closest('tr').remove();
        const rows = document.getElementsByClassName('btn-delete');
        for(var i=0; i<rows.length; i++){
            var rowId = rows[i].id.split('-')[2];
            if(rowId != i){
                document.getElementById(`number-${rowId}`).innerHTML  = i + 1;
                document.getElementById(`number-${rowId}`).id = `number-${i}`;
            }
        }

        refreshTable();
    }
}

document.addEventListener("DOMContentLoaded", function(){
    const addFormRowButton = document.getElementById('btn-add-upload');
    addFormRowButton.addEventListener('click', addRow);

    refreshTable();
});