$("#FORMlogin").submit(function (event) {
    event.preventDefault();

    $.ajax({
        url: $(this).attr("action"),
        // url: url,
        method: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
            if (response.status === "success") {
                Swal.fire({
                    icon: "success",
                    backdrop: `rgba(60,60,60,0.8)`,
                    title: response.message,
                    showConfirmButton: false,
                    timer: 2000,
                }).then(() => {
                    window.location.href = response.redirect;
                });
            } else {
                Swal.fire({
                    icon: "error",
                    title: "GAGAL",
                    text:
                        response.message ||
                        "Pastikan kembali username dan password Anda",
                    backdrop: `rgba(60,60,60,0.8)`,
                    showConfirmButton: false,
                    timer: 5000,
                });
            }
        },
        error: function (xhr) {
            $("#loadinglogin").empty();
            Swal.fire({
                icon: "error",
                title: "GAGAL",
                text:
                    xhr.responseJSON?.message ||
                    "Terjadi kesalahan. Silakan coba lagi.",
                backdrop: `rgba(60,60,60,0.8)`,
                showConfirmButton: false,
                timer: 5000,
            });
        },
    });
});
