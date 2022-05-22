document.addEventListener("DOMContentLoaded", function(){
    var inputs = document.querySelectorAll("input[type='checkbox']");
    for(var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('click', checklistOfficerValidation);
    }
});

function checklistOfficerValidation(event){
    var maxOfficer = document.getElementById('max-officer').innerHTML.trim();
    var officerCheckedCount = document.querySelectorAll('input[type="checkbox"]:checked').length;

    if(officerCheckedCount > maxOfficer){
        event.target.checked = false;
        Swal.fire({
            icon: 'error',
            title: 'Akses Ditolak!',
            text: `Jumlah Petugas yang Dipilih Sudah Melebihi Estimasi (${maxOfficer} Orang)!`
        });
    }
}