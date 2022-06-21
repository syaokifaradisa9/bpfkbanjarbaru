document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('external-order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var uploadButton = document.getElementById(`btn-upload-approval-${i}`);
        uploadButton.addEventListener('click', setOrderIdToModalUpload);
    }
});

function setOrderIdToModalUpload(event){
    var dataId = event.target.id.split("-")[3];
    var orderId = document.getElementById(`order-id-${dataId}`).innerHTML.trim();

    var uploadForm = document.getElementById('approval-upload-form');
    uploadForm.action = `http://bpfkbanjarbaru.test/order/external/${orderId}/update-approval-letter`;
}