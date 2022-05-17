document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var accommodation = document.getElementById(`accommodation_${i}`);
        accommodation.addEventListener('click', accommodationClick);

        var outLetterNumber = document.getElementById(`out_letter_number_${i}`);
        outLetterNumber.addEventListener('click', outLetterNumberClick);
    }
});

function accommodationClick(event){
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

function outLetterNumberClick(event){
    var dataId = event.target.id.split('_')[3];
    var accommodationValue = document.getElementById(`accommodation_${dataId}`).innerHTML.trim().match(/\d+/)[0];

    if(accommodationValue == 0){
        Swal.fire({
            icon: 'error',
            title: 'Akses Ditolak!',
            text: 'Mohon Tentukan Akomodasi Terlebih Dahulu!'
        });

        this.blur();
    }
}