document.addEventListener("DOMContentLoaded", function(){
    var editForm = document.getElementById('officer-edit-form');
    editForm.addEventListener('submit', function (event){
        event.preventDefault();

        var totalSelectedAlkes = parseInt(document.getElementById('references-total-ammount').innerText.trim());
        var totalOrderedAlkes  = parseInt(document.getElementById('total-ordered-alkes').innerText.trim());

        if(totalOrderedAlkes === totalSelectedAlkes){
            editForm.submit();
        }else{
            alert("Alkes Order Belum Terpilih Semua!");
        }
    });
});