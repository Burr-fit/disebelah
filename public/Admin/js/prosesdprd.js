$("form#formModal2")
    .off("submit")
    .on("submit", function (event) {
        event.preventDefault();

        let $this = $(this);
        let table = document.getElementById("tablenya2").value;

        Swal.fire({
            title: "MOHON TUNGGU",
            text: "sedang diproses..",
            showConfirmButton: false,
            allowOutsideClick: false,
        });

        $.ajax({
            url: $this.attr("action"),
            method: $this.attr("method"),
            processData: false,
            contentType: false,
            cache: false,
            async: true,
            data: new FormData(this),
            success: function (data) {
                Swal.close();

                if (data.status == 3) {
                    Swal.fire({
                        icon: "success",
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000,
                    }).then(() => {
                        $("#" + table).bootstrapTable("refresh");
                        $("#preview-file").attr("src", defaultImageURL);

                        // RESET QUILL + TEXTAREA (simple & mantap)
                        const el = document.getElementById("quill-editor1");
                        const q =
                            window.Quill && typeof Quill.find === "function"
                                ? Quill.find(el)
                                : el && el.__quill;
                        if (q) {
                            q.deleteText(0, q.getLength()); // bersihkan seluruh Delta
                            if (
                                q.history &&
                                typeof q.history.clear === "function"
                            )
                                q.history.clear();
                            document.getElementById("idtextarea1").value = ""; // kosongkan hidden textarea
                        } else {
                            // fallback super-singkat kalau instance nggak ketemu
                            const ed = el && el.querySelector(".ql-editor");
                            if (ed) ed.innerHTML = "";
                        }

                        document.getElementById("formModal2")?.reset();

                        $("#modalAdd2").modal("hide");
                    });
                } else if (data.status == 0) {
                    Swal.fire({
                        icon: "error",
                        title: data.message,
                        showConfirmButton: false,
                        timer: 2000,
                    });
                } else {
                    Swal.fire("GAGAL!", "Terjadi kesalahan.", "error");
                }
            },
            error: function () {
                Swal.fire("GAGAL!", "Terjadi kesalahan pada server.", "error");
            },
        });
    });

$("form#formModalEdit2").on("submit", function (event) {
    event.preventDefault();
    var table = document.getElementById("tablenya2").value;

    Swal.fire({
        title: "MOHON TUNGGU",
        text: "sedang diproses..",
        showConfirmButton: false,
    });

    $.ajax({
        url: $(this).attr("action"),
        method: $(this).attr("method"),
        processData: false,
        contentType: false,
        cache: false,
        async: true,
        data: new FormData(this),
        success: function (data) {
            Swal.close();

            if (data.status == 3) {
                Swal.fire({
                    icon: "success",
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000,
                }).then(() => {
                    $("#" + table).bootstrapTable("refresh");
                    $("#preview-file").attr("src", defaultImageURL);
                    document.getElementById("formModalEdit2").reset();
                    $("#modalEdit2").modal("hide");
                });
            } else if (data.status == 0) {
                Swal.fire({
                    icon: "error",
                    title: data.message,
                    showConfirmButton: false,
                    timer: 2000,
                });
            } else {
                Swal.fire("GAGAL!", "Terjadi kesalahan.", "error");
            }
        },
        error: function () {
            Swal.fire("GAGAL!", "Terjadi kesalahan pada server.", "error");
        },
    });
});
