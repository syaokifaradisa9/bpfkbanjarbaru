document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('insitu-order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        var uploadButton = document.getElementById(`btn-upload-approval-${i}`);
        uploadButton.addEventListener('click', setOrderIdToModalUpload);
    }
});

function setOrderIdToModalUpload(event){
    var dataId = event.target.id.split("-")[3];
    var orderId = document.getElementById(`order-id-${dataId}`).innerHTML.trim();

    var approvalLetterPath = document.getElementById(`approval-letter-path-${dataId}`).innerText.trim();
    if(approvalLetterPath){
        document.getElementById('approval-letter-description-modal').classList.remove('d-none')

        var approvalLetterAnchor = document.getElementById('approval-letter-path-modal');
        approvalLetterAnchor.setAttribute('href', `${approvalLetterAnchor.getAttribute('href')}${approvalLetterPath}`);
    }else{
        document.getElementById('approval-letter-description-modal').classList.add('d-none')
    }

    var uploadForm = document.getElementById('approval-upload-form');
    uploadForm.action = `http://bpfkbanjarbaru.test/order/insitu/${orderId}/update-approval-letter`;
}