document.addEventListener("DOMContentLoaded", function(){
    document.getElementById('province').addEventListener('change', onChangeProvince);
});

async function onChangeProvince(evt){
    var provinceId = evt.target.value.split('.')[0];

    const response = await fetch(`http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=${provinceId}`);
    const json = await response.json();

    dropdownData = '';
    dropdownData += `<option value="-" hidden selected>Pilih Kabupaten</option>`;
    for(var data of json.kota_kabupaten){
        dropdownData += `<option value="${data.nama}">${data.nama}</option>`;
    }

    document.getElementById('city').innerHTML = dropdownData;
}