document.addEventListener("DOMContentLoaded", function(){
    const orderTable = document.getElementById('order-table');
    const totalDataRow = orderTable.rows.length - 1;

    for(var i=0; i<totalDataRow; i++){
        document.getElementById(`accept-${i}`).addEventListener('click', updateModalInformation);
        document.getElementById(`refuse-${i}`).addEventListener('click', updateModalInformation);
    }
});

function updateModalInformation(event){
    event.preventDefault();

    // Pengambilan Data Tabel
    var dataId = event.target.id.split('-')[1];
    var orderId = document.getElementById(`order-id-${dataId}`).innerText.trim();
    var buttonText = event.target.innerText.trim();

    // Inisialisasi data modal
    var modalTitle = (buttonText === "Terima") ? "Konfirmasi Penerimaan Order" : "Konfirmasi Penolakan Order";
    var modalSubmitButton = document.getElementById('btn-submit');
    var form = document.getElementById('confirmation-form');
    var descriptionFormInputElement = document.getElementById('description-input');
    var statusFormInputElement = document.getElementById('status-input');

    var fasyankesNameTextElement = document.getElementById('fasyankes-name-description');
    var fasyankesNameOrder = document.getElementById(`fasyankes-name-${dataId}`).innerText.trim();

    // Update Informasi Modal
    document.getElementById('modal-title').innerHTML = modalTitle;
    form.setAttribute('action',`http://bpfkbanjarbaru.test/petugas/order/internal/${orderId}/update-status`);
    descriptionFormInputElement.value = (buttonText === "Terima") ? "Menunggu Alat Diantar ke LPFK Banjarbaru" : "";
    fasyankesNameTextElement.innerHTML = fasyankesNameOrder;
    statusFormInputElement.value = (buttonText === "Terima") ? 'DITERIMA' : 'DITOLAK';
    
    // Binding event
    modalSubmitButton.addEventListener('click', function(){
        form.submit();
    });
}