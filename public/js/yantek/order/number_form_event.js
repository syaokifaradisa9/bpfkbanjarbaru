/* ==================== [1] Binding Event ==================== */
document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var orderNumberForm = document.getElementById(`order_number_${i}`);

        orderNumberForm.addEventListener('click', setUpNumberForm);
        orderNumberForm.addEventListener('input', changeFormNumber);
        orderNumberForm.addEventListener('keyup', keyUpNumberEvent);
        orderNumberForm.addEventListener('focusout', keyFocusOutNumberEvent);
    }
});

/* ==================== [2.a] Event Nomor Order Click ==================== */
function setUpNumberForm(){
  var element = this.closest('.order_number_form');
  element.setSelectionRange(element.value.length-3, element.value.length-3);
}

/* ==================== [2.a] Event Change Form Nomor Order ==================== */
function changeFormNumber(event){
  if(isNaN(event.data)){
    // Default Value
    var closest_td = this.closest('td');
    var default_number = closest_td.getElementsByClassName('default_order_number')[0].value;

    // Prefix dan Suffix
    var defaultPrefix = default_number.split('.')[0] + '.';
    var defaultSuffix = default_number.split('.')[1];

    var element = this.closest('.order_number_form');
    var suffix = element.value.split('.')[1];

    // Update Form
    element.value = `${defaultPrefix}${suffix.split(' ')[0].match(/\d+/) ?? ''}${defaultSuffix}`;
    element.setSelectionRange(element.value.length-3, element.value.length-3);
  }
}

/* ==================== [2.c] Event Nomor Order Keyup ==================== */
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
      // Default Value
      var closest_td = this.closest('td');
      var default_number = closest_td.getElementsByClassName('default_order_number')[0].value;

      // Prefix dan Suffix
      var defaultPrefix = default_number.split('.')[0];
      var defaultSuffix = default_number.split('.')[1];
      
      // Elemen Form Nomor Order
      var element = this.closest('.order_number_form');
      var value = element.value;
      var order_number = value.substring(defaultPrefix.length, value.length - 2);

      // Status Prefix dan Suffix
      var hasPrefix = value.includes(defaultPrefix + '.');
      var hasSuffix = value.includes(defaultSuffix);

      // Jika Menghapus Prefix dan Suffix
      if(!(hasPrefix && hasSuffix)){
        element.value = `${defaultPrefix}.${order_number.match(/\d+/) ?? ''}${defaultSuffix}`;
        element.setSelectionRange(element.value.length-3, element.value.length-3);
      }
    }
}

/* ==================== [2.c] Event Nomor Order focusout ==================== */
async function keyFocusOutNumberEvent(){
    var order_number = this.closest('.order_number_form').value;
    var firstColumnElement = this.closest('tr').cells[0];
    var order_id = firstColumnElement.getElementsByClassName('order_id')[0].value

    this.blur();
    await updateOrderNumber(order_id, order_number);
}

/* ==================== [3.c] Update Nomor Order Berdasarkan ID ==================== */
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