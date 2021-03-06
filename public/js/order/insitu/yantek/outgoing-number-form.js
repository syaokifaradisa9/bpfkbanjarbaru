document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var outorderNumberForm = document.getElementById(`out_letter_number_${i}`);

        outorderNumberForm.addEventListener('click', setUpOutFormNumber);
        outorderNumberForm.addEventListener('input', changeOutFormNumber);
        outorderNumberForm.addEventListener('keyup', keyUpOutFormNumberEvent);
        outorderNumberForm.addEventListener('focusout', keyFocusOutFormOutNumberEvent);
    }
});

function setUpOutFormNumber(event){
  var dataId = event.target.id.split('_')[3];

  var accommodationValue = document.getElementById(`accommodation_${dataId}`).innerHTML.trim();
  var estimationValue = document.getElementById(`estimation_${dataId}`).innerHTML.trim();

  if(accommodationValue == 'Rp. 0' || estimationValue == '0 Hari / 0 Petugas'){
    event.target.blur();
    Swal.fire({
      icon: 'error',
      title: 'Akses Ditolak!',
      text: 'Mohon Isikan Akomodasi dan Estimasi Terlebih Dahulu!'
    });
  }
}

function changeOutFormNumber(event){
    if(isNaN(event.data)){
        var element = event.target;
        var numberOnlyValue = element.value.match(/\d+/);

        element.value = numberOnlyValue != null ? numberOnlyValue[0] : '';
    }
}

async function keyUpOutFormNumberEvent(event){
    if(event.keyCode === 13 && event.target.value){
        var value = event.target.value;
        var dataId = event.target.id.split('_')[3];
        var order_id = this.closest('tr').cells[0].getElementsByClassName('order_id')[0].value;

        event.target.blur();
        await updateOutLetterNumber(order_id, dataId, value);
    }
}

async function keyFocusOutFormOutNumberEvent(event){
    if(event.target.value){
      var value = event.target.value;
      var dataId = event.target.id.split('_')[3];
      var order_id = this.closest('tr').cells[0].getElementsByClassName('order_id')[0].value;

      event.target.blur();
      await updateOutLetterNumber(order_id, dataId, value);
    }
}

async function updateOutLetterNumber(orderId, dataId, value){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Konfirmasi Pengisian Nomor?',
        text: "Yakin ingin Menetapkan Nomor Surat Keluar",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then(async (result) => {
        if (result.isConfirmed) {
          const response = await fetch(
              `http://bpfkbanjarbaru.test/api/order/${orderId}/out_order_number?api_key=vohtTCCa8FboaF3hA15UiR0AVQ1tqlErYHhEgO4kXnPeTxBJKRDPrYRVLVgbXTdf`,
              {
                method: "PUT",
                headers: {
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    out_letter_number: value,
                })
              }
          );

          var json = await response.json();
          if(json['status'] == 'success'){
            document.getElementById(`btn-show-offering-letter-${dataId}`).classList.remove('d-none');
            document.getElementById(`btn-send-offering-letter-${dataId}`).classList.remove('d-none');

            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Penetapan Nomor Surat Keluar Sukses, Sekarang anda Bisa Mencetak dan Mengirim Surat Penawaran'
            });
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Gagal!',
              text: 'Gagal Menetapkan Nomor Surat keluar, silahkan coba lagi!'
            });
          }
        }
    });
}