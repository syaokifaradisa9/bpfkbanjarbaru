document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var sendButton = document.getElementById(`btn-send-offering-letter-${i}`);
        sendButton.addEventListener('click', sendExternalOfferingLetterViaEmail);
    }
});

function sendExternalOfferingLetterViaEmail(event){
    var dataId = event.target.id.split('-')[4];
    if(document.getElementById(`out_letter_number_${dataId}`).value){
        var order_id = this.closest('tr').cells[0].getElementsByClassName('order_id')[0].value;

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: 'Konfirmasi Pengiriman Surat Penawaran?',
            text: "Yakin ingin mengirim surat penawaran ke fasyenkes?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
          }).then(async (result) => {
            if (result.isConfirmed) {
              const response = await fetch(
                  `http://bpfkbanjarbaru.test/api/order/${order_id}/sendOfferingLetter?api_key=YIYCm4oo91XxvLG1gIUVKRyprHIF78Dz40IaB0DFodsz171MNqidSDtcflzfkK9N`,
                  {
                    method: "PUT",
                    headers: {
                      'Content-Type': 'application/json'
                    }
                  }
              );
    
              var json = await response.json();
              if(json.status == 'success'){
                document.getElementById(`status_${dataId}`).innerHTML = "MENUNGGU\nPERSETUJUAN";
                Swal.fire({
                  icon: 'success',
                  title: 'Sukses',
                  text: 'Sukses Mengirim Surat Penawaran ke Fasyenkes'
                });
              }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal!',
                  text: 'Gagal Mengirim Surat Penawaran ke Fasyenkes, Silahkan Coba Lagi!'
                });
              }
            }
        });
    }
}