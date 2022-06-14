document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        document.getElementById(`officer-edit-${i}`).addEventListener('click', statusValidation);
    }
});

function statusValidation(event){
    event.preventDefault();
    
    var dataId = event.target.id.split('-')[2];
    var status = document.getElementById(`status-order-${dataId}`).innerHTML.trim();

    if(status == 'MENUNGGU PERSETUJUAN' || status == 'DITERIMA'){
        Swal.fire({
            icon: 'error',
            title: 'Akses Ditolak!',
            text: 'Mohon Tunggu Yantek Mengonfirmasi Persetujuan Fasyankes!'
        });
    }else{
        window.location.href = event.target.href;
    }
}