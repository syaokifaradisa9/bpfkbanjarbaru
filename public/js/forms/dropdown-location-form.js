document.addEventListener("DOMContentLoaded", function(){
    setProvinceDropdown();
    document.getElementById('province').addEventListener('change', onChangeProvince);
});

async function setProvinceDropdown(){
    const response = await fetch(`https://dev.farizdotid.com/api/daerahindonesia/provinsi`);
    const json = await response.json();

    dropdownData = '';
    dropdownData += `<option value="-" hidden selected>Pilih Provinsi</option>`;
    for(var data of json.provinsi){
        dropdownData += `<option value="${data.id}.${data.nama}">${data.nama}</option>`;
    }

    document.getElementById('province').innerHTML = dropdownData;
}

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