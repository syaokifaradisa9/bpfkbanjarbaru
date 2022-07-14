document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        document.getElementById(`accommodation_${i}`).addEventListener('click', statusValidation);
        document.getElementById(`estimation_${i}`).addEventListener('click', statusValidation);
    }
});

function statusValidation(event){
    event.preventDefault();
    
    var dataId = event.target.id.split('_')[1];
    var status = document.getElementById(`status_${dataId}`).innerHTML.trim();

    if(status === 'MENUNGGU'){
        Swal.fire({
            icon: 'error',
            title: 'Akses Ditolak!',
            text: 'Mohon Isikan Nomor Order Terlebih Dahulu!'
        });
    }else{
        window.location.href = event.target.href;
    }
}