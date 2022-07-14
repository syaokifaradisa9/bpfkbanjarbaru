// Menampilkan Pesan Error Form
function setErrormessage(formComponent, componentId, message){
    formComponent.classList.add('is-invalid');
    document.getElementById(componentId).classList.remove('d-none');
    document.getElementById(componentId).innerHTML = message;
}

// Menghilangkan Pesan Error Form
function removeErrormessage(formComponent, componentId){
    formComponent.classList.remove('is-invalid');
    document.getElementById(componentId).classList.add('d-none');
    document.getElementById(componentId).innerHTML = '';
}

// Proses Validasi Form Upload
function uploadFileValidation(){
    var uploadForm = document.getElementById('uploaded-file-form');
    var formValue = uploadForm.value;

    var errorMessageComponentId = 'upload-error-message';

    // Validasi Apakah File Kosong
    if(!formValue){
        setErrormessage(uploadForm, errorMessageComponentId, 'Mohon Pilih dan Upload File Surat Permohonan!');
        return false;
    }

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

    removeErrormessage(uploadForm, errorMessageComponentId);
    return true;
}

// Validasi Nomor Surat
function letterNumberValidation(){
    var letterNumberForm = document.getElementById('letter_number');
    var formValue = letterNumberForm.value;

    var errorMessageComponentId = 'letter-number-error-message';

    if(!formValue){
        setErrormessage(letterNumberForm, errorMessageComponentId, 'Nomor Surat Tidak Boleh Kosong! <br>');
        return false;
    }

    removeErrormessage(letterNumberForm, errorMessageComponentId);
    return true;
}

// Validasi Tanggal Surat
function letterDateValidation(){
    var dateForm = document.getElementById('letter_date');
    var formValue = dateForm.value;

    var errorMessageComponentId = 'letter-date-error-message';

    // Validasi Nilai kosong
    if(!formValue){
        setErrormessage(dateForm, errorMessageComponentId, 'Mohon Pilih Tanggal Surat!');
        return false;
    }

    // Validasi Tanggal
    var dateEntered = new Date(formValue);
    const today = new Date();
    if(dateEntered > today){
        setErrormessage(dateForm, errorMessageComponentId, 'Tanggal Tidak Bisa Lebih Dari Hari Ini!');
        return false;
    }

    removeErrormessage(dateForm, errorMessageComponentId);
    return true;
}

// Validasi Tanggal Surat
function letterDateValidation(){
    var dateForm = document.getElementById('letter_date');
    var formValue = dateForm.value;

    var errorMessageComponentId = 'letter-date-error-message';

    // Validasi Nilai kosong
    if(!formValue){
        setErrormessage(dateForm, errorMessageComponentId, 'Mohon Pilih Tanggal Surat!');
        return false;
    }

    // Validasi Tanggal
    var dateEntered = new Date(formValue);
    const today = new Date();
    if(dateEntered > today){
        setErrormessage(dateForm, errorMessageComponentId, 'Tanggal Tidak Bisa Lebih Dari Hari Ini!');
        return false;
    }

    removeErrormessage(dateForm, errorMessageComponentId);
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
    var orderForm = document.getElementById('form-insitu-order');
    orderForm.addEventListener('submit', function(event){
        event.preventDefault();

        // Validasi Form File
        var isFileFormValid = uploadFileValidation();

        // Validasi Form Nomor Surat
        var isLetterNumberFormValid = letterNumberValidation();

        // Validasi Form Tanggal Surat
        var isletterDateValid = letterDateValidation();

        // Validasi Tabel Pemilihan Alat Kesehatan
        var isOrderTableValid = orderTableValidation();

        // Pengecekan Kondisi Semua Valid
        if(isFileFormValid && isLetterNumberFormValid && isletterDateValid && isOrderTableValid){
            orderForm.submit();
        }
   });
});