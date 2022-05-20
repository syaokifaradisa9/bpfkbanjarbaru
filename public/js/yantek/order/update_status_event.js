document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var outorderNumberForm = document.getElementById(`confirm-agreement-${i}`);

        outorderNumberForm.addEventListener('click', updateStatusToAccepted);
    }
});

function updateStatusToAccepted(event){
    var dataId = event.target.id.split('-')[2];
    if(document.getElementById(`status_${dataId}`).innerHTML.trim() == "MENUNGGU<br>PERSETUJUAN"){
        var order_id = this.closest('tr').cells[0].getElementsByClassName('order_id')[0].value;

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: 'Konfirmasi Persetujuan',
            text: "Yakin ingin Mengonfirmasi Persetujuan Order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
          }).then(async (result) => {
            if (result.isConfirmed) {
              const response = await fetch(
                  `http://bpfkbanjarbaru.test/api/order/${order_id}/updateStatusToAccepted?api_key=5IF7F16s9XRzvBH94LG9GqQIUYhMp5PJEBfdyCjWCjklcpveXNGmZbbSAqkjWqQF`,
                  {
                    method: "PUT",
                    headers: {
                      'Content-Type': 'application/json'
                    }
                  }
              );
    
              var json = await response.json();
              if(json.status == 'success'){
                document.getElementById(`status_${dataId}`).innerHTML = "DISETUJUI";
                document.getElementById(`confirm-agreement-${dataId}`).classList.add('d-none');

                Swal.fire({
                  icon: 'success',
                  title: 'Sukses',
                  text: 'Sukses Mengonfirmasi Persetujuan Order'
                });
              }else{
                Swal.fire({
                  icon: 'error',
                  title: 'Gagal!',
                  text: 'Gagal Mengonfirmasi Persetujuan Order, Silahkan Coba Lagi!'
                });
              }
            }
        });
    }else{
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Akses ditolak'
        });
    }
}