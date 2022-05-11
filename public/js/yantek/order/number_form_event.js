/* ==================== [1] Binding Event ==================== */
document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var orderNumberForm = document.getElementById(`order_number_${i}`);
        orderNumberForm.addEventListener('click', setUpNumberForm);
        orderNumberForm.addEventListener('keyup', keyUpNumberEvent);
        orderNumberForm.addEventListener('focusout', keyFocusOutNumberEvent);
    }
});

/* ==================== [2.a] Event Nomor Order Click ==================== */
function setUpNumberForm(){
  var element = this.closest('.order_number_form');
  element.setSelectionRange(element.value.length-3, element.value.length-3);
}

/* ==================== [2.b] Event Nomor Order Keyup ==================== */
async function keyUpNumberEvent(event){
    // Enter Key
    if(event.keyCode === 13){
        var order_number = this.closest('.order_number_form').value;
        var firstColumnElement = this.closest('tr').cells[0];
        var order_id = firstColumnElement.getElementsByClassName('order_id')[0].value

        this.blur();
        await updateOrderNumber(order_id, order_number);
    }
    
    // Delete Key
    if(event.keyCode === 8){
      // Elemen Form Nomor Order
      var element = this.closest('.order_number_form');

      // Validasi Prefix dan Suffix
      var hasPrefix = element.value.includes('E - ');
      var hasSuffix = element.value.includes(' DL');

      // Jika Menghapus Prefix dan Suffix
      if(!(hasPrefix && hasSuffix)){
        var formvalue = element.value;
        var number_order = formvalue.includes('.') ? formvalue.match(/[0-9]*\.[0-9]*/) : formvalue.match(/\d+/);

        element.value = `E - ${number_order ?? ''} DL`;
        element.setSelectionRange(element.value.length-3, element.value.length-3);
      }
    }
}

/* ==================== [2.b] Event Nomor Order focusout ==================== */
async function keyFocusOutNumberEvent(){
    var order_number = this.closest('.order_number_form').value;
    var firstColumnElement = this.closest('tr').cells[0];
    var order_id = firstColumnElement.getElementsByClassName('order_id')[0].value

    this.blur();
    await updateOrderNumber(order_id, order_number);
}

/* ==================== [3.b] Update Nomor Order Berdasarkan ID ==================== */
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
      }).then(async (result) => {
        if (result.isConfirmed) {
          const response = await fetch(
              `http://bpfkbanjarbaru.test/api/order/${id}/order_number?api_key=bQ2FxXLfw8RjH1rsrLcBkEzZKY3FVRlICDX4AziUcFESyiVKzCRM2rVpg8yAhk`,
              {
                method: "PUT",
                headers: {
                  'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                  order_number: order_number,
                })
              }
          );
        } else {
          console.log("Gagal!");
        }
    });
}