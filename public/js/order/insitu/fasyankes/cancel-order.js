async function cancelExternalOrder(event){
    event.preventDefault();

    var dataId = event.target.id.split('-')[2];
    var order_id = document.getElementById(`order-id-${dataId}`).innerHTML.trim();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Konfirmasi Pembatalan Order?',
        text: "Yakin ingin Membatalkan Order Insitu ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then(async (result) => {
        if (result.isConfirmed) {
          const response = await fetch(
              `http://bpfkbanjarbaru.test/order/insitu/${order_id}/cancel`,
              {
                method: "GET",
                headers: {'Content-Type': 'application/json'}
              }
          );

          var json = await response.json();
          if(json.status == 'success'){
            document.getElementById(`status_${dataId}`).innerHTML = "DIBATALKAN";
            document.getElementById(`btn-cancel-${dataId}`).classList.add('d-none');
            document.getElementById(`btn-edit-order-${dataId}`).classList.add('d-none');

            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Sukses Membatalkan Order Insitu'
            });
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Gagal!',
              text: 'Gagal Membatalkan Order Insitu, Silahkan Coba Lagi!'
            });
          }
        }
    });
}

document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('insitu-order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var cancelButton = document.getElementById(`btn-cancel-${i}`);
        cancelButton.addEventListener('click', cancelExternalOrder);
    }
});