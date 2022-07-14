document.addEventListener("DOMContentLoaded", function(){
    $('input[type="radio"]').on('click change', function(e) {
        if(e.target.value === "Diantar oleh pihak pertama"){
          $('#delivery_travel_name_form').addClass('d-none');
        }else{
          $('#delivery_travel_name_form').removeClass('d-none');
        }
    });
});