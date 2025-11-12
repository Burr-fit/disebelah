(function () {
    const hargaInput = document.getElementById("hargaProduk");

    hargaInput.addEventListener("input", function (e) {
        // Ambil hanya angka
        let value = this.value.replace(/\D/g, "");

        // Format ke ribuan Indonesia
        if (value) {
            this.value = new Intl.NumberFormat("id-ID").format(value);
        } else {
            this.value = "";
        }
    });

    // Hapus titik sebelum kirim ke backend
    const form = hargaInput.closest("form");
    if (form) {
        form.addEventListener("submit", function () {
            hargaInput.value = hargaInput.value.replace(/\./g, "");
        });
    }
})();
