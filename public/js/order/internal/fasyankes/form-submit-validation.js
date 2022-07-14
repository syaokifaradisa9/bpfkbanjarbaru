// Menampilkan Pesan Error Form
function setErrormessage(formComponent, componentId, message){
    if(formComponent){
        formComponent.classList.add('is-invalid');
    }
    document.getElementById(componentId).classList.remove('d-none');
    document.getElementById(componentId).innerHTML = message;
}

// Menghilangkan Pesan Error Form
function removeErrormessage(formComponent, componentId){
    if(formComponent){
        formComponent.classList.remove('is-invalid');
    }
    document.getElementById(componentId).classList.add('d-none');
    document.getElementById(componentId).innerHTML = '';
}

// Proses Validasi Form Upload
function uploadFileValidation(){
    var uploadForm = document.getElementById('uploaded-file-form');
    var formValue = uploadForm.value;

    var errorMessageComponentId = 'upload-error-message';

    // Validasi Apakah Ada File
    if(formValue){
        // Validasi Esktensi File
        var validExtension = /(\.pdf|\.doc|\.docx)$/i;
        if(!validExtension.exec(formValue)){
            setErrormessage(uploadForm, errorMessageComponentId, 'File Harus Berupa pdf, doc atau docx!');
            return false;
        }

        // Validasi Ukuran File
        var size = parseFloat(uploadForm.files[0].size / (1024 * 1024)).toFixed(2); 
        if(size > 10){
            setErrormessage(uploadForm, errorMessageComponentId, 'File Harus Kurang Dari 10mb!');
            return false;
        }
    }

    removeErrormessage(uploadForm, errorMessageComponentId);
    return true;
}

// Validasi Estimasi Tanggal Pengiriman Alat
function deliveryDateEstimationValidation(){
    var deliveryForm = document.getElementById('delivery_date_estimation');
    var formValue = deliveryForm.value;

    var errorMessageComponentId = 'delivery-date-estimation-error-message';

    // Validasi Nilai kosong
    if(!formValue){
        setErrormessage(deliveryForm, errorMessageComponentId, 'Mohon Pilih Estimasi Tanggal Pengiriman!');
        return false;
    }

    var deliveryDateEntered = new Date(formValue);

    // Jika Estimasi Tanggal Sampai Sudah Terisi
    var arrivalDateValue = document.getElementById('arrival_date_estimation').value;
    if(arrivalDateValue){
        // Validasi Estimasi Sampai Tidak Boleh Kurang Dari Estimasi Pengiriman Alat
        var arrivalDateEntered = new Date(arrivalDateValue);
        if(deliveryDateEntered > arrivalDateEntered){
            setErrormessage(deliveryForm, errorMessageComponentId, 'Tidak Bisa Lebih Dari Estimasi Tanggal Sampai!');
            return false;
        }
    }

    // Validasi Tanggal
    const today = new Date().setHours(0,0,0,0);
    if(deliveryDateEntered < today){
        setErrormessage(deliveryForm, errorMessageComponentId, 'Tidak Bisa Kurang Dari Hari Ini!');
        return false;
    }

    removeErrormessage(deliveryForm, errorMessageComponentId);
    return true;
}


// Validasi Estimasi Tanggal Sampai Alat
function arrivalDateEstimationValidation(){
    var arrivalForm = document.getElementById('arrival_date_estimation');
    var formValue = arrivalForm.value;

    var errorMessageComponentId = 'arrival-date-estimation-error-message';

    // Validasi Nilai kosong
    if(!formValue){
        setErrormessage(arrivalForm, errorMessageComponentId, 'Mohon Pilih Estimasi Tanggal Sampai!');
        return false;
    }

    var arrivalDateEntered = new Date(formValue);

    // Jika Estimasi Tanggal Sudah Terisi
    var deliveryDateValue = document.getElementById('delivery_date_estimation').value;
    if(deliveryDateValue){
        // Validasi Estimasi Sampai Tidak Boleh Kurang Dari Estimasi Pengiriman Alat
        var deliveryDateEntered = new Date(deliveryDateValue);
        if(arrivalDateEntered < deliveryDateEntered){
            setErrormessage(arrivalForm, errorMessageComponentId, 'Tidak Bisa Kurang Dari Estimasi Tanggal Pengiriman!');
            return false;
        }
    }

    // Validasi Tanggal Kurang dari hari ini
    const today = new Date().setHours(0,0,0,0);
    if(arrivalDateEntered < today){
        setErrormessage(arrivalForm, errorMessageComponentId, 'Tidak Bisa Kurang Dari Hari Ini!');
        return false;
    }

    removeErrormessage(arrivalForm, errorMessageComponentId);
    return true;
}

// Validasi Contact Person Nama Lengkap
function contactPersonNameValidation(){
    var contactPersonNameForm = document.getElementById('contact_person_name');
    var formValue = contactPersonNameForm.value;

    var errorMessageComponentId = 'contact-person-name-error-message';

    // Validasi Nilai kosong
    if(!formValue){
        setErrormessage(contactPersonNameForm, errorMessageComponentId, 'Nama Lengkap Pengantar Tidak Boleh Kosong!');
        return false;
    }

    removeErrormessage(contactPersonNameForm, errorMessageComponentId);
    return true;
}

// Validasi Contact Person Nomor Telepon
function contactPersonPhoneValidation(){
    var contactPersonPhoneForm = document.getElementById('contact_person_phone');
    var formValue = contactPersonPhoneForm.value;

    var errorMessageComponentId = 'contact-person-phone-error-message';

    // Validasi Nilai kosong
    if(!formValue){
        setErrormessage(contactPersonPhoneForm, errorMessageComponentId, 'Nomor Telepon Pengantar Tidak Boleh Kosong!');
        return false;
    }

    removeErrormessage(contactPersonPhoneForm, errorMessageComponentId);
    return true;
}

// Validasi Opsi Pengiriman
function deliveryOptionValidation(){
    var deliveryOptions = document.getElementsByName('delivery_option');
    var errorMessageComponentId = 'delivery-option-error-message';

    // Pengecekan Apakah Opsi Sudah ada yang dipilih
    var isValid = false;
    for (let i of deliveryOptions) {
        isValid = isValid || i.checked;
    }

    // Validasi Nilai kosong
    if(!isValid){
        for (let i of deliveryOptions) {
            setErrormessage(i, errorMessageComponentId, 'Mohon Pilih Opsi Pengiriman!');
        }
        return false;
    }

    for (let i of deliveryOptions) {
        removeErrormessage(i, errorMessageComponentId);
    }
    
    return true;
}

// Validasi Nama Travel
function travelNameValidation(){
    var travelNameForm = document.getElementById('delivery_travel_name');
    var formValue = travelNameForm.value;

    var errorMessageComponentId = 'delivery-travel-name-error-message';

    // Jika Mengantar Dengan Pihak Ketiga
    var deliveryOption = document.getElementsByName('delivery_option')[0];
    if(!deliveryOption.checked){
        // Validasi Nilai kosong
        if(!formValue){
            setErrormessage(travelNameForm, errorMessageComponentId, 'Nama Pengantar Pihak Ketiga Tidak Boleh Kosong!');
            return false;
        }
    }

    removeErrormessage(travelNameForm, errorMessageComponentId);
    return true;
}



/* ==================== Awal Validasi Tabel Order ==================== */

// Menampilkan Pesan Error Tabel
function showTableError(componentId, message){
    document.getElementById(componentId).classList.remove('d-none');
    document.getElementById(componentId).innerHTML = message;
}

// Menghilangkan Pesan Error Tabel
function hideTableError(componentId){
    document.getElementById(componentId).classList.add('d-none');
    document.getElementById(componentId).innerHTML = '';
}

// [1] Validasi Kategori Layanan
function categoriesValidation(totalRow){
    var iscategoryValid = true;
    var errorMessageCategoryComponentId = 'category-error-message';

    for(var i = 0; i< totalRow; i++){
        var categoryForm = document.getElementById(`category_${i}`);
        var isValid = categoryForm.value != '-';
        if(isValid){
            categoryForm.classList.remove('is-invalid');
        }else{
            categoryForm.classList.add('is-invalid');
        }

        iscategoryValid = iscategoryValid && isValid;
    }

    if(!iscategoryValid){
        showTableError(errorMessageCategoryComponentId, '- Mohon Pilih Kategori Layanan Alat Kesehatan Dengan Benar! <br>');
    }else{
        hideTableError(errorMessageCategoryComponentId);
    }

    return iscategoryValid;
}

// [2] Validasi Alat Kesehatan
function alkesValidation(totalRow){
    var isAlkesValid = true;
    var errorMessageAlkesComponentId = 'alkes-error-message';

    for(var i = 0; i< totalRow; i++){
        var AlkesForm = document.getElementById(`alkes_${i}`);
        var isValid = AlkesForm.value != '-';
        if(isValid){
            AlkesForm.classList.remove('is-invalid');
        }else{
            AlkesForm.classList.add('is-invalid');
        }

        isAlkesValid = isAlkesValid && isValid;
    }

    if(!isAlkesValid){
        showTableError(errorMessageAlkesComponentId, '- Mohon Pilih Alat Kesehatan Dengan Benar! <br>');
    }else{
        hideTableError(errorMessageAlkesComponentId);
    }

    return isAlkesValid;
}

// Program Validasi Tabel Order Utama
function orderTableValidation(){
    const alkesOrdertable = document.getElementById('alkes-order-table');
    const totalDataRow = alkesOrdertable.rows.length - 2;

    var isCategoryValid = categoriesValidation(totalDataRow)
    var isAlkesValid = alkesValidation(totalDataRow)

    return isCategoryValid && isAlkesValid;
}

/* ==================== Akhir Validasi Tabel Order ==================== */



/* ==================== Program Validasi Utama ==================== */
document.addEventListener("DOMContentLoaded", function(){
    var orderForm = document.getElementById('form-internal-order');
    orderForm.addEventListener('submit', function(event){
        event.preventDefault();

        // Validasi Form File
        var isFileFormValid = uploadFileValidation();

        // Validasi Estimasi Tanggal Pengiriman
        var isDeliveryDateFormValid = deliveryDateEstimationValidation();

        // Validasi Estimasi Tanggal Sampai
        var isArrivalDateFormValid =  arrivalDateEstimationValidation();

        // Validasi Form CP Nama Lengkap
        var isContactPersonName = contactPersonNameValidation();

        // Validasi Form CP Nomor Telepon
        var isContactPersonPhone = contactPersonPhoneValidation();

        // Validasi Form Radio Button Opsi Pengiriman
        var isDeliveryOptionValid = deliveryOptionValidation();

        // Validasi Nama Travel
        var isTravelNameFormValid = travelNameValidation();

        // Validasi Tabel Pemilihan Alat Kesehatan
        var isOrderTableValid = orderTableValidation();

        // Pengecekan Kondisi Semua Valid
        if(isFileFormValid && isDeliveryDateFormValid && isArrivalDateFormValid 
            && isContactPersonName && isContactPersonPhone && isDeliveryOptionValid 
            && isTravelNameFormValid && isOrderTableValid){
            orderForm.submit();
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Pengajuan Ditolak!',
                text: 'Silahkan Perbaiki Beberapa Form Pengajuan Terlebih Dahulu!'
            });
        }
   });
});