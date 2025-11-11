function showMultiple(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById("preview-container");

    // reset container (hapus semua thumbnail, termasuk default)
    previewContainer.innerHTML = "";

    if (files.length > 5) {
        alert("Maksimal 5 gambar yang dapat diunggah.");
        event.target.value = ""; // reset input
        return;
    }

    if (files.length === 0) {
        // kalau nggak ada file → tampilkan default
        const img = document.createElement("img");
        img.id = "preview-file";
        img.src = defaultImageURL;
        img.className = "mx-auto d-block mt-2";
        img.width = 150;
        img.height = 150;
        img.style.border = "2px dashed #444";
        img.style.borderRadius = "8px";
        previewContainer.appendChild(img);
    } else {
        // render thumbnails
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (!file.type.startsWith("image/")) continue;

            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.classList.add("img-thumbnail");
                img.style.width = "150px";
                img.style.height = "150px";
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }
}

function showMultiple2(event) {
    const files = event.target.files;
    const previewContainer = document.getElementById("preview-container2");
    previewContainer.innerHTML = ""; // reset preview

    if (files.length > 5) {
        alert("Maksimal 5 gambar yang dapat diunggah.");
        event.target.value = ""; // reset input
        return;
    }

    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        if (!file.type.startsWith("image/")) continue;

        const reader = new FileReader();
        reader.onload = function (e) {
            const img = document.createElement("img");
            img.src = e.target.result;
            img.classList.add("img-thumbnail");
            img.style.width = "150px";
            img.style.height = "150px";
            previewContainer.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
}

function showPreview(event) {
    if (event.target.files.length > 0) {
        var file = event.target.files[0];

        if (file) {
            var allowedTypes = ["image/png", "image/jpeg", "image/jpg"];

            if (allowedTypes.includes(file.type)) {
                var src = URL.createObjectURL(file);
                var prev = document.getElementById("preview-file");
                prev.src = src;
                prev.style.display = "block";
                prev.style.width = "100%";
                prev.style.height = "100%";
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Invalid File Type",
                    text: "Please upload a valid file .png .jpeg .jpg",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        prev.src = defaultImageURL;
                        prev.style.display = "block";
                        prev.style.width = "100%";
                        prev.style.height = "100%";
                    }
                });

                event.target.value = "";
            }
        }
    }
}

function showPreview2(event) {
    if (event.target.files.length > 0) {
        var file = event.target.files[0];

        if (file) {
            var allowedTypes = ["image/png", "image/jpeg", "image/jpg"];

            if (allowedTypes.includes(file.type)) {
                var src = URL.createObjectURL(file);
                var prev = document.getElementById("preview-file2");
                prev.src = src;
                prev.style.display = "block";
                prev.style.width = "100%";
                prev.style.height = "100%";
            } else {
                let modalElement = document.getElementById("formeditnya");
                let modal = modalElement
                    ? bootstrap.Modal.getInstance(modalElement)
                    : null;

                if (modal) {
                    modal.hide();
                }

                Swal.fire({
                    icon: "error",
                    title: "Type File Salah",
                    text: "Silahkan Upload Ulang Dengan Type File .JPG .JPEG .PNG",
                    confirmButtonText: "OK",
                }).then((result) => {
                    if (result.isConfirmed) {
                        modal.show();
                        prev.src = defaultImageURL;
                        prev.style.display = "block";
                        prev.style.width = "100%";
                        prev.style.height = "100%";
                    }
                });

                event.target.value = "";
            }
        }
    }
}

function showPreviewFile(event) {
    const input = event.target;
    const file = input.files && input.files[0];
    const prevImg = document.getElementById("preview-file");
    const prevPdf = document.getElementById("preview-pdf");

    // helper: reset ke default
    const resetPreview = () => {
        if (prevPdf.dataset.blobUrl) {
            try {
                URL.revokeObjectURL(prevPdf.dataset.blobUrl);
            } catch (_) {}
            delete prevPdf.dataset.blobUrl;
        }
        prevPdf.removeAttribute("src");
        prevPdf.style.display = "none";
        if (prevImg) prevImg.style.display = "block";
    };

    if (!file) {
        resetPreview();
        return;
    }

    if (file.type !== "application/pdf") {
        // jika bukan PDF, tolak & reset
        if (typeof Swal !== "undefined") {
            Swal.fire({
                icon: "error",
                title: "Invalid File Type",
                text: "Silakan upload file PDF (.pdf) saja.",
                confirmButtonText: "OK",
            }).then(() => {
                input.value = ""; // reset input
                resetPreview();
            });
        } else {
            alert("Silakan upload file PDF (.pdf) saja.");
            input.value = "";
            resetPreview();
        }
        return;
    }

    // bersihkan blob lama
    if (prevPdf.dataset.blobUrl) {
        try {
            URL.revokeObjectURL(prevPdf.dataset.blobUrl);
        } catch (_) {}
    }

    // tampilkan PDF
    const pdfUrl = URL.createObjectURL(file);
    prevPdf.src = pdfUrl;
    prevPdf.dataset.blobUrl = pdfUrl;
    prevPdf.style.display = "block";

    // sembunyikan placeholder image
    if (prevImg) prevImg.style.display = "none";
}

function showPreviewFile2(event) {
    const input = event.target;
    const file = input.files && input.files[0];
    const prevImg = document.getElementById("preview-file2");
    const prevPdf = document.getElementById("preview-pdf2");

    const resetPreview = () => {
        if (prevPdf.dataset.blobUrl) {
            try {
                URL.revokeObjectURL(prevPdf.dataset.blobUrl);
            } catch (_) {}
            delete prevPdf.dataset.blobUrl;
        }
        prevPdf.removeAttribute("src");
        prevPdf.style.display = "none";
        if (prevImg) prevImg.style.display = "block";
    };

    if (!file) {
        resetPreview();
        return;
    }

    if (file.type !== "application/pdf") {
        window.Swal
            ? Swal.fire({
                  icon: "error",
                  title: "Invalid File Type",
                  text: "Silakan upload file PDF (.pdf) saja.",
                  confirmButtonText: "OK",
              }).then(() => {
                  input.value = "";
                  resetPreview();
              })
            : (alert("Silakan upload file PDF (.pdf) saja."),
              (input.value = ""),
              resetPreview());
        return;
    }

    // Bersihkan blob sebelumnya
    if (prevPdf.dataset.blobUrl) {
        try {
            URL.revokeObjectURL(prevPdf.dataset.blobUrl);
        } catch (_) {}
    }

    // Tampilkan PDF baru
    const pdfUrl = URL.createObjectURL(file);
    prevPdf.src = pdfUrl;
    prevPdf.dataset.blobUrl = pdfUrl;
    prevPdf.style.display = "block";

    if (prevImg) prevImg.style.display = "none";
}

$("form#formModal")
    .off("submit")
    .on("submit", function (event) {
        event.preventDefault();

        let $this = $(this);
        let table = document.getElementById("tablenya").value;

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

                        document.getElementById("formModal")?.reset();

                        $("#modalAdd").modal("hide");
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

$("form#formModalEdit").on("submit", function (event) {
    event.preventDefault();
    var table = document.getElementById("tablenya").value;

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
                    document.getElementById("formModalEdit").reset();
                    $("#modalEdit").modal("hide");
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

$(document).ready(function () {
    $(".select2").select2({
        placeholder: "Pilih opsi",
        width: "100%",
    });

    $("#modalAdd").on("shown.bs.modal", function () {
        $(".select2").select2({
            dropdownParent: $("#modalAdd"),
            // theme: "bootstrap-5",
            width: "100%",
        });

        $(this).find(":focus").trigger("blur");

        $("#Periode").on("change", function () {
            let periodeId = $(this).val();

            if (periodeId) {
                $.ajax({
                    url: urldata + "CMS/get-PeriodeDPRD/" + periodeId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $("#AnggotaDPRD").empty();
                        $("#AnggotaDPRD").append(
                            '<option value="" disabled selected>Pilih</option>'
                        );
                        $.each(data, function (key, value) {
                            $("#AnggotaDPRD").append(
                                '<option value="' +
                                    value.kdAnggota +
                                    '">' +
                                    value.namaDewan +
                                    "</option>"
                            );
                        });
                    },
                    error: function () {
                        alert("Gagal mengambil data Anggota DPRD");
                    },
                });
            } else {
                $("#AnggotaDPRD")
                    .empty()
                    .append(
                        '<option value="" disabled selected>Pilih</option>'
                    );
            }
        });
    });

    $("#modalEdit").on("shown.bs.modal", function () {
        const $modal = $("#modalEdit");
        const $periode = $modal.find("#Periode");
        const $anggota = $modal.find("#AnggotaDPRD");
        const currentValKey = "current";

        // init select2 di dalam modal (scope ke modal)
        $modal.find(".select2").select2({
            dropdownParent: $modal,
            width: "100%",
        });

        function setPlaceholder($el, text) {
            $el.html(`<option value="" disabled selected>${text}</option>`);
        }

        function reinitSelect2($el) {
            // beberapa versi perlu destroy → init ulang setelah ganti opsi
            if ($el.data("select2")) {
                $el.select2("destroy");
            }
            $el.select2({
                dropdownParent: $modal,
                width: "100%",
            });
        }

        function fillAnggotaOptions(list, preferValue = null) {
            let html = `<option value="" disabled selected>Pilih</option>`;
            for (const row of list) {
                // pastikan nama field sesuai response server
                html += `<option value="${row.kdAnggota}">${row.namaDewan}</option>`;
            }
            $anggota.html(html);

            const dataCurrent = $anggota.data(currentValKey);
            const targetVal = preferValue ?? (dataCurrent || null);

            if (
                targetVal &&
                $anggota.find(`option[value="${targetVal}"]`).length
            ) {
                $anggota.val(targetVal);
            } else {
                $anggota.val(null);
            }

            reinitSelect2($anggota);
            $anggota.trigger("change");
        }

        // simpan current value dari markup ke data()
        $anggota.data(
            currentValKey,
            $anggota.val() || $anggota.data(currentValKey) || null
        );

        // pastikan tidak double-bind saat modal dibuka berkali-kali
        $periode.off("change.modalEdit").on("change.modalEdit", function () {
            const periodeId = $(this).val();
            // console.log("[Periode change] id:", periodeId);

            if (!periodeId) {
                setPlaceholder($anggota, "Pilih");
                reinitSelect2($anggota);
                $anggota.val(null).trigger("change");
                return;
            }

            // loading state
            setPlaceholder($anggota, "Memuat…");
            reinitSelect2($anggota);
            $anggota.prop("disabled", true).trigger("change");

            const url =
                (typeof urldata !== "undefined" ? urldata : "{{ url('') }}/") +
                "CMS/get-PeriodeDPRD/" +
                encodeURIComponent(periodeId);

            $.ajax({
                url,
                type: "GET",
                dataType: "json",
            })
                .done(function (data) {
                    // console.log("[AJAX done] data:", data);
                    if (!Array.isArray(data)) data = [];
                    fillAnggotaOptions(data);
                })
                .fail(function (xhr) {
                    // console.error("[AJAX fail]", xhr.status, xhr.responseText);
                    setPlaceholder($anggota, "Gagal memuat");
                    reinitSelect2($anggota);
                    alert("Gagal mengambil data Anggota DPRD");
                })
                .always(function () {
                    $anggota.prop("disabled", false).trigger("change");
                });
        });
    });

    $("#modalAdd").on("hidden.bs.modal", function () {
        const previewContainer = document.getElementById("preview-container");
        previewContainer.innerHTML = "";
        // kembalikan default image
        const img = document.createElement("img");
        img.id = "preview-file";
        img.src = defaultImageURL;
        img.className = "mx-auto d-block mt-2";
        img.width = 150;
        img.height = 150;
        img.style.border = "2px dashed #444";
        img.style.borderRadius = "8px";
        previewContainer.appendChild(img);
        $('input[type="file"]').val("");
    });
});

$("#FORMlogin").submit(function (event) {
    event.preventDefault();

    Swal.fire({
        title: "MOHON TUNGGU",
        text: " sedang diproses..",
        showConfirmButton: false,
    });

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

$("#UpdateProfil").submit(function (event) {
    event.preventDefault();

    Swal.fire({
        title: "MOHON TUNGGU",
        text: " sedang diproses..",
        showConfirmButton: false,
    });

    $.ajax({
        url: $(this).attr("action"),
        // url: url,
        method: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
            console.log(response);

            if (response.status == 3) {
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
