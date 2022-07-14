function getSuffix(formId){
    if(formId === 'pp_hour'){
        return "Jam";
    }else if(formId === 'pp_minute'){
        return "Menit";
    }else if(formId === 'officer'){
        return "Orang";
    }
}

document.addEventListener("DOMContentLoaded", function(){
    calculateEstimation();

    var hourForm = document.getElementById('pp_hour');
    var minuteForm = document.getElementById('pp_minute');
    var officerForm = document.getElementById('officer');

    hourForm.addEventListener('click', setUpEstimationForm);
    hourForm.addEventListener('focusout', keyFocusOutEstimationEvent);
    hourForm.addEventListener('input', changeFormEstimation);

    minuteForm.addEventListener('click', setUpEstimationForm);
    minuteForm.addEventListener('focusout', keyFocusOutEstimationEvent);
    minuteForm.addEventListener('input', changeFormEstimation);

    officerForm.addEventListener('click', setUpEstimationForm);
    officerForm.addEventListener('focusout', keyFocusOutEstimationEvent);
    officerForm.addEventListener('input', changeFormEstimation);
});

function setUpEstimationForm(event){
    var formElement = event.target;
    var suffix = getSuffix(formElement.id);

    var rawValue = formElement.value.replaceAll(suffix,'').match(/\d+/);
    if(rawValue[0] != 0){
        formElement.value = `${rawValue[0]} ${suffix}`
        formElement.setSelectionRange(rawValue[0].length, rawValue[0].length);
    }else{
        formElement.value = ` ${suffix}`
        formElement.setSelectionRange(0, 0);
    }
}

function keyFocusOutEstimationEvent(event){
    var element = event.target;
    var suffix = getSuffix(element.id);
    if(element.value === ` ${suffix}`){
      element.value = `0 ${suffix}`;
    }
}

function changeFormEstimation(event){
    var element = event.target;
    var suffix = getSuffix(element.id);

    var rawValue = element.value.match(/\d+/);
    if(rawValue != null){
        element.value = `${rawValue[0]} ${suffix}`;
        element.setSelectionRange(
            rawValue[0].length, 
            rawValue[0].length,
        );
    }else{
        element.value = ` ${suffix}`;
        element.setSelectionRange(0, 0);
    }

    calculateEstimation();
}

function calculateEstimation(){
    var hourFormValue = document.getElementById('pp_hour').value.match(/\d+/)[0];
    var minuteValue = document.getElementById('pp_minute').value.match(/\d+/)[0];
    var officerValue = document.getElementById('officer').value.match(/\d+/)[0];

    var totalMinute = (hourFormValue * 60) + minuteValue;
    if(totalMinute != 0 && officerValue != 0){
        var totalHourAlkes = parseInt(document.getElementById('total-hour').innerHTML);
        var totalMinuteAlkes = parseInt(document.getElementById('total-minutes').innerHTML);

        // Total Waktu
        var totalAlkesDay = (totalMinuteAlkes/60 + totalHourAlkes)/7;

        // Jumlah Hari / Jumlah Petugas
        var totalAlkesDayWithOfficer = totalAlkesDay / officerValue;

        // Jumlah Hari Setelah Ditambahkan Perjalanan
        var totalDay = totalAlkesDayWithOfficer + ((minuteValue/60 + hourFormValue)/7);

        document.getElementById('total_estimation_time1').innerHTML = `Total Waktu                             : ${totalAlkesDay} Hari`;
        document.getElementById('total_estimation_time2').innerHTML = `Jumlah Hari / Jumlah Petugas            : ${totalAlkesDayWithOfficer} Hari`;
        document.getElementById('total_estimation_time3').innerHTML = `Jumlah Hari Setelah Ditambah Perjalanan : ${totalDay}`;
        document.getElementById('messages').innerHTML = "";
    }else{
        document.getElementsByClassName('estimation').innerHTML = "";
        document.getElementById('messages').innerHTML = "Mohon Isikan Form PP dan Jumlah Petugas Terlebih Dahulu";
    }
}