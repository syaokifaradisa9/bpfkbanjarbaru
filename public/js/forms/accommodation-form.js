function rupiahConverter(number, prefix){
	var number_string = number.toString().replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
	div     		= split[0].length % 3,
	rupiah     		= split[0].substr(0, div),
	thousands     	= split[0].substr(div).match(/\d{3}/gi);
 
	if(thousands){
		separator = div ? '.' : '';
		rupiah += separator + thousands.join('.');
	}
 
	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

document.addEventListener("DOMContentLoaded", function(){
  var AccommodationForm = document.getElementById('accommodation_cost');
  AccommodationForm.value = rupiahConverter(AccommodationForm.value, 'Rp. ')
  var rapidForm = document.getElementById('rapid_cost');
  rapidForm.value = rupiahConverter(rapidForm.value, 'Rp. ')
  var dailyForm = document.getElementById('daily_cost');
  dailyForm.value = rupiahConverter(dailyForm.value, 'Rp. ')

  AccommodationForm.addEventListener('click', setUpAccomodationForm);
  AccommodationForm.addEventListener('input', changeFormAccomodation);
  AccommodationForm.addEventListener('focusout', keyFocusOutAccomodationEvent);
  AccommodationForm.addEventListener('keyup', keyUpAccomodationEvent);

  rapidForm.addEventListener('click', setUpAccomodationForm);
  rapidForm.addEventListener('input', changeFormAccomodation);
  rapidForm.addEventListener('focusout', keyFocusOutAccomodationEvent);
  rapidForm.addEventListener('keyup', keyUpAccomodationEvent);

  dailyForm.addEventListener('click', setUpAccomodationForm);
  dailyForm.addEventListener('input', changeFormAccomodation);
  dailyForm.addEventListener('focusout', keyFocusOutAccomodationEvent);
  dailyForm.addEventListener('keyup', keyUpAccomodationEvent);
});

function setUpAccomodationForm(event){
  var element = event.target;
  if(element.value === 'Rp. 0'){
    element.value = 'Rp. ';
  }
}

function changeFormAccomodation(event){
  var element = event.target;
  var rawCost = element.value.replaceAll('.','').match(/\d+/);
  if(rawCost != null){
    element.value = rupiahConverter(rawCost[0], 'Rp. ');
  }else{
    element.value = 'Rp. ';
  }
}

function keyFocusOutAccomodationEvent(event){
  var element = event.target;
  if(element.value === 'Rp. '){
    element.value = 'Rp. 0';
  }
}

function keyUpAccomodationEvent(event){
  if(event.keyCode === 8){
    var element = event.target;
    if(!element.value.includes('Rp. ')){
      var rawCost = element.value.replaceAll('.','').match(/\d+/);
      if(rawCost != null){
        element.value = rupiahConverter(rawCost[0], 'Rp. ');
      }else{
        element.value = 'Rp. ';
      }
    }
  }
}