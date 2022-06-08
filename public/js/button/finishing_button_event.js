document.addEventListener("DOMContentLoaded", function(){
    const confirmButton = document.getElementById('finishing-confirm-button');
    confirmButton.addEventListener('click', async function(event){
        event.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: 'Konfirmasi Penyelesaian Order',
            text: "Yakin ingin menyelesaikan order? Jika iya, petugas tidak akan bisa mengedit data kalibrasi lagi",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
          }).then(async (result) => {
            if (result.isConfirmed) {
                document.getElementById('finishing-form').submit();
            }
        });
    });
});