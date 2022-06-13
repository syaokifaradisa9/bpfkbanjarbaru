function paymentConfirmation(event){
    event.preventDefault();
    var dataId = event.target.id.split('-')[3];
    var order_id = document.getElementById(`order-id-${dataId}`).innerHTML.trim();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Konfirmasi Penerimaan Pembayaran Fasyenkes?',
        text: "Yakin ingin mengonfirmasi pembayaran fasyenkes?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then(async (result) => {
        if (result.isConfirmed) {
          const response = await fetch(
              `http://bpfkbanjarbaru.test/bendahara/order/external/${order_id}/confirm-payment`,
              {
                method: "GET",
                headers: {'Content-Type': 'application/json'}
              }
          );

          var json = await response.json();
          if(json.status == 'success'){
            document.getElementById(`status_${dataId}`).innerHTML = "SELESAI";
            document.getElementById(`btn-confirm-payment-${dataId}`).classList.add('d-none');

            Swal.fire({
              icon: 'success',
              title: 'Sukses',
              text: 'Sukses Mengonfirmasi Pembayaran Fasyenkes'
            });
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Gagal!',
              text: 'Gagal Mengonfirmasi Pembayaran Fasyenkes, Silahkan Coba Lagi!'
            });
          }
        }
    });
}

document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var confirmButton = document.getElementById(`btn-confirm-payment-${i}`);
        confirmButton.addEventListener('click', paymentConfirmation);
    }
});