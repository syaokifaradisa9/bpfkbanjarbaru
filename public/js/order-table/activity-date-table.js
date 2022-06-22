function addRowTable(event){
    event.preventDefault();

    const activitytable = document.getElementById('activity-date-table');
    const newRow = activitytable.insertRow(activitytable.rows.length-1);

    const newRowNumber = activitytable.rows.length-2;
    const newRowId = newRowNumber-1;

    newRow.innerHTML = `
        <tr>
            <td class="text-center" id="number-${newRowId}">${newRowNumber}</td>
            <td>
                <input type="date" class="form-control" name="start_date[]" id="start-date-${newRowId}">
            </td>
            <td>
                <input type="date" class="form-control" name="end_date[]" id="end-date-${newRowId}">
            </td>
            <td class="text-center">
                <span id="sub-total-${newRowId}">0</span> Hari
            </td>
            <td class="text-center">
                <button class="btn btn-sm btn-danger btn-delete" id="btn-delete-${newRowId}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        </tr>
    `;

    refreshTable();
}

function removeRowTable(event){
    event.preventDefault();

    const alkesOrderTable = document.getElementById('activity-date-table');
    const totalDataRows = alkesOrderTable.rows.length - 2;

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

                document.getElementById(`start-date-${rowId}`).id = `start-date-${i}`;
                document.getElementById(`end-date-${rowId}`).id = `end-date-${i}`;

                document.getElementById(`sub-total-${rowId}`).id = `sub-total-${i}`;
                document.getElementById(`btn-delete-${rowId}`).id = `btn-delete-${i}`;
            }
        }

        refreshTable();
        refreshTotalDays();
    }
}

function onDateChange(event){
    event.preventDefault();

    var dataId = event.target.id.split('-')[2];
    
    var startDateInput = document.getElementById(`start-date-${dataId}`).value;
    var endDateInput = document.getElementById(`end-date-${dataId}`).value;

    if(startDateInput && endDateInput){
        var startDate = new Date(startDateInput);
        var endDate = new Date(endDateInput);

        var differenceTime = endDate.getTime() - startDate.getTime();
        var differenceDay = differenceTime / (1000 * 3600 * 24);

        if(differenceDay < 0){
            alert('Tanggal Selesai Tidak Boleh Kurang Dari Tanggal Mulai!');
            document.getElementById(`end-date-${dataId}`).value = '';
        }else{
            document.getElementById(`sub-total-${dataId}`).innerHTML = differenceDay + 1;
            refreshTotalDays();
        }
    }
}

function refreshTotalDays(){
    const activityTable = document.getElementById('activity-date-table');
    const totalDataRow = activityTable.rows.length - 2;

    var totalDay = 0;
    for(var i=0; i<totalDataRow; i++){
        var day = document.getElementById(`sub-total-${i}`).innerHTML.trim();
        totalDay += parseInt(day);
    }

    document.getElementById('total-day').innerHTML = totalDay;
}

function refreshTable(){
    const activityTable = document.getElementById('activity-date-table');
    const totalDataRow = activityTable.rows.length - 2;

    for(var i=0; i<totalDataRow; i++){
        document.getElementById(`btn-delete-${i}`).addEventListener('click', removeRowTable);
        document.getElementById(`start-date-${i}`).addEventListener('change', onDateChange);
        document.getElementById(`end-date-${i}`).addEventListener('change', onDateChange);
    }

    var totalDayInFirstRow = document.getElementById(`sub-total-0`).innerHTML.trim();
    if(parseInt(totalDayInFirstRow) > 0){
        refreshTotalDays();
    }
}

document.addEventListener("DOMContentLoaded", function(){
    document.getElementById('btnAddRow').addEventListener('click', addRowTable);
    refreshTable();
});