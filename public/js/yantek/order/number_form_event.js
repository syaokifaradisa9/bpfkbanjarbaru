// [1] Binding Event
document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var orderNumberForm = document.getElementById(`order_number_${i}`);
        orderNumberForm.addEventListener('keyup', keyUpNumberEvent);
        orderNumberForm.addEventListener('focusout', keyFocusOutNumberEvent);
    }
});

// [2] Event Nomor Order Keyup
async function keyUpNumberEvent(event){
    if(event.keyCode === 13){
        var order_number = this.closest('.order_number_form').value;
        var firstColumnElement = this.closest('tr').cells[0];
        var order_id = firstColumnElement.getElementsByClassName('order_id')[0].value

        this.blur();
        await updateOrderNumber(order_id, order_number);
    }
}

// [2] Event Nomor Order focusout
async function keyFocusOutNumberEvent(){
    var order_number = this.closest('.order_number_form').value;
    var firstColumnElement = this.closest('tr').cells[0];
    var order_id = firstColumnElement.getElementsByClassName('order_id')[0].value

    this.blur();
    await updateOrderNumber(order_id, order_number);
}

// [3] Update Nomor Order Berdasarkan ID
async function updateOrderNumber(id, order_number){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })
      
      swalWithBootstrapButtons.fire({
        title: 'Konfirmasi Permintaaan?',
        text: "Yakin ingin Mengonfirmasi Permintaaan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          console.log('Success');
        } else {
          console.log("Gagal!");
        }
    });
}