/* ============= [Helper] Pengambilan Data Array Alkes Dari Tabel Referensi Alkes =============*/
function getAlkesOrder(){
    var alkesOrderTableReference = document.getElementById('complete-alkes-order-table');
    const totalDataRows = alkesOrderTableReference.rows.length - 2;

    var alkes_orders = [];
    for(var i=0; i<totalDataRows; i++){
        var id            = document.getElementById(`alkes-order-id-${i}`).innerText.trim();

        var maxAmmount = getMaxAlkesOrder(id);
        var totalAmmount = getTotalAlkesOrder(id);

        if(totalAmmount < maxAmmount){
            var alkes         = document.getElementById(`alkes-${i}`).innerText;
            var merk          = document.getElementById(`merk-${i}`).innerText;
            var model         = document.getElementById(`model-${i}`).innerText;
            var series_number = document.getElementById(`series_number-${i}`).innerText;
            alkes_orders.push({
                'id' : id,
                'alkes' : `${alkes}, Merk : ${merk}, Model : ${model}, SN : ${series_number}`
            });
        }
    }

    return alkes_orders;
}

/* ================ [Helper] Pengambilan Data Array Petugas Dari Baris Pertama ================*/
function getOfficers(){
    var officersData = document.getElementById('officer_0').options;

    const officers = [];
    for (let i = 1; i < officersData.length; i++) { 
        officers.push({
            'id': officersData[i].value,
            'name' : officersData[i].text
        });
    }

    return officers;
}

function getMaxAlkesOrder(orderId){
    var alkesOrderTableReference = document.getElementById('complete-alkes-order-table');
    var totalReferenceDataRows = alkesOrderTableReference.rows.length - 2;

    var maxAmmount = 0;
    for(var j=0; j< totalReferenceDataRows; j++){
        var id = document.getElementById(`alkes-order-id-${j}`).innerText.trim();
        if(orderId === id){
            maxAmmount = parseInt(document.getElementById(`max-ammount-${j}`).innerText.trim());
            break;
        }
    }

    return maxAmmount;
}

function getTotalAlkesOrder(orderId){
    const alkesOrderTable = document.getElementById('alkes-order-table');
    const totalDataRows = alkesOrderTable.rows.length - 2;

    var totalAmmount = 0;
    for(var j=0; j< totalDataRows; j++){
        var id = document.getElementById(`alkes_order_${j}`)?.value;

        if(orderId == id){
            totalAmmount += parseInt(document.getElementById(`ammount_${j}`).value);
        }
    }

    return totalAmmount;
}

function normalizeTotalAlkesOrder(orderId, alkesOrderIndex, alkesOrderAmmount){
    /* ==================== Pencarian Data Maksimal Jumlah Alkes ==================== */
    var maxAmmount = getMaxAlkesOrder(orderId);

    /* =========== Pencarian Data Total Alkes Pada Tabel Pemilihan Petugas =========== */
    var totalAmmount = getTotalAlkesOrder(orderId);

    /* ========================== Penyesuaian Jumlah Alkes ========================== */
    if(totalAmmount > maxAmmount){
        var remaining_ammount = maxAmmount - (totalAmmount - alkesOrderAmmount);
        document.getElementById(`ammount_${alkesOrderIndex}`).value = remaining_ammount;
        calculateTotalAmmount();
    }
    
    calculateSelectedAmmount();
}

/* =================== Perhitungan Total Alkes Pada Tabel Pemilihan Petugas ===================*/
function calculateTotalAmmount(){
    var alkesOrderTableReference = document.getElementById('alkes-order-table');
    var totalDataRows = alkesOrderTableReference.rows.length - 2;

    var totalAmmount = 0;
    for(var j = 0; j < totalDataRows; j++){
        var total = parseInt(document.getElementById(`ammount_${j}`).value);
        totalAmmount += total;
    }

    document.getElementById("total_ammount").innerHTML = totalAmmount;
}

/* =================== Perhitungan Total Alkes Terpilih Pada Tabel Referensi ==================*/
function calculateSelectedAmmount(){
    // Tabel Referensi Alkes
    const alkesOrderTableReference = document.getElementById('complete-alkes-order-table');
    const totalReferenceDataRows = alkesOrderTableReference.rows.length - 2;

    // Tabel Pemilihan Petugas
    const alkesOrderTable = document.getElementById('alkes-order-table');
    const totalDataRows = alkesOrderTable.rows.length - 2;

    // Perhitungan Total Alkes Terpilih
    var totalAmmount = 0;
    for(var i = 0; i < totalReferenceDataRows; i++){
        var alkes_order_id = document.getElementById(`alkes-order-id-${i}`).innerText.trim();
        var totalSelectedAlkes = 0;
        for(var j = 0; j < totalDataRows; j++){
            var selectedAlkesOrderId = document.getElementById(`alkes_order_${j}`).value;
            if(selectedAlkesOrderId == alkes_order_id){
                var selectedAmmount = parseInt(document.getElementById(`ammount_${j}`).value);
                totalSelectedAlkes += selectedAmmount;
            }
        }

        totalAmmount += totalSelectedAlkes;
        if(totalSelectedAlkes){
            document.getElementById(`references-alkes-ammount-${i}`).innerHTML = `${totalSelectedAlkes}`;
        }
    }

    document.getElementById('references-total-ammount').innerHTML = totalAmmount;
}

/* ========================== [1] Menambah Baris Baru ke Dalam Tabel ==========================*/
function addRowTable(event){
    event.preventDefault();

    var totalSelectedAlkes = parseInt(document.getElementById('references-total-ammount').innerText.trim());
    var totalOrderedAlkes  = parseInt(document.getElementById('total-ordered-alkes').innerText.trim());

    if(totalSelectedAlkes < totalOrderedAlkes){
        var alkesOrdertable = document.getElementById('alkes-order-table');
        var newRow = alkesOrdertable.insertRow(alkesOrdertable.rows.length - 1);
    
        var newRowNumber = alkesOrdertable.rows.length - 2;
        var newRowId = newRowNumber - 1;
    
        var officers = getOfficers();
        const officerOptions = [];
        for(const officer of officers){
            officerOptions.push(`<option value="${officer.id}">${officer.name}</option>`);
        }
    
        newRow.innerHTML = `
            <td id="number_${newRowId}">
                ${newRowNumber}
            </td>
            <td class="pt-3">
                <div class="form-group" style="width: 100%">
                    <select class="form-control select2 category-select" name="alkes_order[]" id="alkes_order_${newRowId}">
                        <option value="-" selected hidden>Pilih Alat Kesehatan</option>
                    </select>
                </div>
            </td>
            </td>
            <td class="pt-3">
                <div class="form-group">
                    <input type="number" class="form-control text-center ammount-input" name="ammount[]" value="1" id="ammount_${newRowId}">
                </div>
            </td>
            <td class="pt-3">
                <div class="form-group">
                    <select class="form-control select2 officer-select" name="officers[]" id="officer_${newRowId}">
                        <option value="-" selected hidden>Pilih Petugas</option>
                        ${officerOptions}
                    </select>
                </div>
            </td>
            <td class="text-center">
                <button class="btn btn-sm btn-danger" id="btnDelete_${newRowId}">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        `;
    
        resetActionTable();
    }else{
        alert("Jumlah Alkes Order Sudah Tercukupi!");
    }
}


/* ====================== [2] Program Utama yang Dijalankan Pertama Kali ======================*/
document.addEventListener("DOMContentLoaded", function(){
    var addRowButton = document.getElementById('btnAddRow');
    addRowButton.addEventListener('click', addRowTable);

    resetActionTable();
});


/* ======================= [3] Menginisialisasi Ulang Event Dalam Tabel =======================*/
function resetActionTable(){
    /* ========================= Pengambilan Tabel Pemilihan Petugas ========================= */
    var alkesOrderTable = document.getElementById('alkes-order-table');
    var totalDataRows = alkesOrderTable.rows.length - 2;

    /* ======================= Inisialisasi Event Pada Tiap Component ======================= */
    for(var i=0; i<totalDataRows; i++){
        /* ======================= Reset Action Change Dropdown Alkes ========================*/
        document.getElementById(`alkes_order_${i}`).onmousedown = function(event){
            /* ==================== Pengambilan Atribut yang Berhubungan ==================== */
            var selectedIndex = event.target.id.split("_")[2];

            var alkesOrderDropdown = document.getElementById(`alkes_order_${selectedIndex}`);
            var existingValue = alkesOrderDropdown.value;
            alkesOrderDropdown.innerHTML = '';

            /* ==================== Mengisi Kembali Dropdown Alat Kesehatan ==================== */
            var alkesOrders = getAlkesOrder();
            const alkesOrderOptions = [];
            alkesOrderOptions.push(`<option value="-" selected hidden>Pilih Alat Kesehatan</option>`);
            for(const alkesOrder of alkesOrders){
                alkesOrderOptions.push(`<option value="${alkesOrder.id}" ${existingValue == alkesOrder.id ? "selected" : ""}>${alkesOrder.alkes}</option>`);
            }

            alkesOrderDropdown.innerHTML = alkesOrderOptions;
        }

        /* ======================== Reset Action Change Input Jumlah =========================*/
        document.getElementById(`ammount_${i}`).onchange = function(event){
            /* ==================== Pengambilan Atribut yang Berhubungan ==================== */
            var selectedIndex = event.target.id.split("_")[1];
            var selectedAlkesOrderId = document.getElementById(`alkes_order_${selectedIndex}`).value;
            
            /* ========================= Validasi Input Jumlah Alkes ========================= */
            if(selectedAlkesOrderId != "-"){
                var selectedAmmount = event.target.value;
                if(selectedAmmount > 1){
                    normalizeTotalAlkesOrder(selectedAlkesOrderId, selectedIndex, selectedAmmount);
                }else{
                    alert("Tidak Bisa Kurang Dari 1!");
                    event.target.value = 1;
                }
            }else{
                alert("Pilih Alat Kesehatan Terlebih Dahulu!");
                event.target.value = 1;
            }
        }

        /* ====================== Reset Action Klik Awalan Dropdown Petugas =======================*/
        document.getElementById(`officer_${i}`).onmousedown = function(event){
            var selectedIndex = event.target.id.split("_")[1];
            var selectedAlkesOrderId = document.getElementById(`alkes_order_${selectedIndex}`).value;
            
            if(selectedAlkesOrderId == "-"){
                alert("Pilih Alat Kesehatan Terlebih Dahulu!");
            }
        }

        /* ====================== Reset Action Change Dropdown Petugas =======================*/
        document.getElementById(`officer_${i}`).onchange = function(event){
            var officerCounter = [];

            var officers = getOfficers();
            for(var j=0; j<officers.length; j++){
                var isAppend = false;

                var alkes = [];
                var ammount = [];
                
                for(var k=0; k < totalDataRows; k++){
                    var officerDropdown = document.getElementById(`officer_${k}`);
                    var officerSelectedText = officerDropdown.options[officerDropdown.selectedIndex].text.trim();

                    isAppend = officerSelectedText === officers[j].name;
                    if(isAppend){
                        var alkesDropdown = document.getElementById(`alkes_order_${k}`);
                        var alkesSelectedText = alkesDropdown.options[alkesDropdown.selectedIndex].text.trim();
                        
                        var alkesAmmount = parseInt(document.getElementById(`ammount_${k}`).value);
                        if(alkes.includes(alkesSelectedText)){
                            var index = alkes.indexOf(alkesSelectedText);
                            ammount[index] += alkesAmmount;
                        }else{
                            alkes.push(alkesSelectedText);
                            ammount.push(alkesAmmount);
                        }
                    }
                }

                if(alkes.length != 0){
                    officerCounter.push({
                        'officer' : officers[j].name,
                        'alkes' : alkes,
                        'ammount' : ammount
                    });
                }
            }

            var body = '';
            for(var j = 0; j < officerCounter.length; j++){
                var alkesBody = '';
                for(var k = 0; k< officerCounter[j].alkes.length; k++){
                    alkesBody += `${officerCounter[j].ammount[k]} Buah ${officerCounter[j].alkes[k]} <br>`;
                }

                body += `
                    <tr>
                        <td class="text-center">
                            ${j + 1}
                        </td>
                        <td>
                            ${officerCounter[j].officer}
                        </td>
                        <td>
                            ${alkesBody}
                        </td>
                    </tr>
                `;
            }

            var officertableBody = document.getElementById('officer-order-table-data');
            officertableBody.innerHTML = body;
        }

        /* ========================= Reset Action Click Tombol Hapus =========================*/
        document.getElementById(`btnDelete_${i}`).onclick = function(event){
            event.preventDefault();

            if(totalDataRows > 1){
                var deletedId = parseInt(this.closest('button').id.split('_')[1]);
                this.closest('tr').remove();

                var startId = deletedId + 1;
                for(var j = startId; j < totalDataRows; j++){
                    document.getElementById(`number_${j}`).innerText = j;
                    document.getElementById(`number_${j}`).id = `number_${j - 1}`;
                    document.getElementById(`btnDelete_${j}`).id = `btnDelete_${j - 1}`;
                    document.getElementById(`alkes_order_${j}`).id = `alkes_order_${j - 1}`;
                    document.getElementById(`ammount_${j}`).id = `ammount_${j - 1}`;
                    document.getElementById(`officer_${j}`).id = `officer_${j - 1}`;
                }
                resetActionTable();
            }else{
                alert('Tidak Bisa Menghapus');
            }
        }
    }

    calculateTotalAmmount();
    calculateSelectedAmmount();
}