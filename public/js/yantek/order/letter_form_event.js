// [1] Binding Event
document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var letterNumberForm = document.getElementById(`letter_number_${i}`);
        letterNumberForm.addEventListener('keyup', keyUpLetterEvent);
        letterNumberForm.addEventListener('focusout', keyFocusOutLetterEvent);
    }
});

// [2] Event Nomor Surat Keyup
async function keyUpLetterEvent(event){
    if(event.keyCode === 13){
        var letter_number = this.closest('.letter_number_form').value;
        var firstColumnElement = this.closest('tr').cells[0];
        var order_id = firstColumnElement.getElementsByClassName('order_id')[0].value

        this.blur();
        await updateLetterNumber(order_id, letter_number);
    }
}

// [2] Event Nomor Surat focusout
async function keyFocusOutLetterEvent(){
    var letter_number = this.closest('.letter_number_form').value;
    var firstColumnElement = this.closest('tr').cells[0];
    var order_id = firstColumnElement.getElementsByClassName('order_id')[0].value

    this.blur();
    await updateLetterNumber(order_id, letter_number);
}

// [3] Update Nomor Surat Berdasarkan ID
async function updateLetterNumber(id, letter_number){
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