document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var orderNumberForm = document.getElementById(`out_letter_number_${i}`);

        orderNumberForm.addEventListener('input', changeOutFormNumber);
        orderNumberForm.addEventListener('keyup', keyUpOutFormNumberEvent);
        orderNumberForm.addEventListener('focusout', keyFocusOutFormOutNumberEvent);
    }
});

function changeOutFormNumber(event){
    if(isNaN(event.data)){
        var element = event.target;
        var numberOnlyValue = element.value.match(/\d+/);

        element.value = numberOnlyValue != null ? numberOnlyValue[0] : '';
    }
}

async function keyUpOutFormNumberEvent(event){
    if(event.keyCode === 13){
        var value = event.target.value;
        var dataId = event.target.id.split('_')[2];
        var order_id = this.closest('tr').cells[0].getElementsByClassName('order_id')[0].value;
    }
}

async function keyFocusOutFormOutNumberEvent(event){
    var value = event.target.value;
    var dataId = event.target.id.split('_')[2];
    var order_id = this.closest('tr').cells[0].getElementsByClassName('order_id')[0].value;
}