document.addEventListener("DOMContentLoaded", function(){
    var officers = document.getElementsByClassName("officer-checkbox");
    var officersChief = document.getElementsByClassName("officer-chief-checkbox");
    for(var i = 0; i < 22; i++) {
        officersChief[i].addEventListener('click', checklistOfficerChiefValidation);
        officers[i].addEventListener('click', checklistOfficerValidation);
    }
});

function checklistOfficerChiefValidation(event){
    var officerChiefChecked = document.getElementsByClassName('officer-chief-checkbox');

    officerChiefCheckedCount = 0;
    for(i = 0; i < officerChiefChecked.length; i++){
        if(officerChiefChecked[i].checked){
            officerChiefCheckedCount++;
        }
    }

    if(officerChiefCheckedCount > 1){
        event.target.checked = false;
        Swal.fire({
            icon: 'error',
            title: 'Akses Ditolak!',
            text: `Ketua tim tidak boleh melebihi 1 Orang!`
        });
    }
}

function checklistOfficerValidation(event){
    // Mengambil id ketua yang sudah dipilih
    var officerChiefChecked = document.getElementsByClassName('officer-chief-checkbox');
    var officerChiefId = 0;
    for(i = 0; i < officerChiefChecked.length; i++){
        if(officerChiefChecked[i].checked){
            officerChiefId = officerChiefChecked[i].id.split('_')[2];
            break;
        }
    }

    var maxOfficer = document.getElementById('max-officer').innerHTML.trim();
    var officerChecked = document.getElementsByClassName('officer-checkbox');

    officerCheckedCount = 0;
    for(i = 0; i < officerChecked.length; i++){
        if(officerChecked[i].checked){
            if(officerChecked[i].id == officerChiefId){
                event.target.checked = false;

                officerChiefName = document.getElementById(`officer_chief_name_${officerChiefId}`).innerHTML;
                Swal.fire({
                    icon: 'error',
                    title: 'Akses Ditolak!',
                    text: `${officerChiefName} Sudah Terpilih Menjadi Ketua Tim, Silahkan Pilih yang lain!`
                });
            }else{
                officerCheckedCount++;
            }
        }
    }


    if(officerCheckedCount > (maxOfficer - 1)){
        event.target.checked = false;
        Swal.fire({
            icon: 'error',
            title: 'Akses Ditolak!',
            text: `Jumlah Petugas yang Dipilih Sudah Melebihi Estimasi (${maxOfficer - 1} Orang)!`
        });
    }
}