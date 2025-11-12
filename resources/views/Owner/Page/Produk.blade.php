@extends('Owner.Layout.Index')

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0">PRODUK</h4>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <div id="toolbar" class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <button type="button" class="btn btn-outline-info d-flex " data-bs-toggle="modal"
                        data-bs-target="#modalAdd">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah Data
                    </button>
                </div>

                <div class="table-responsive mb-2">
                    <table id="table" data-toolbar="#toolbar" class="table table-bordered table-striped"
                        data-toggle="table" data-pagination="true" data-search="true" data-click-to-select="true"
                        data-id-field="idTempat" data-url="{{ url('Owner/get-produk') }}">
                        <thead>
                            <tr class="text-center">
                                <th data-formatter="NoFormatter" data-width="10" class="text-center align-middle">NO</th>
                                <th data-formatter="gambar" class="align-middle" data-width="100">GAMBAR PRODUK</th>
                                <th data-field="nama" class="align-middle">NAMA PRODUK</th>
                                <th data-formatter="harga" class="align-middle">HARGA PRODUK</th>
                                <th data-formatter="operateFormatter" data-events="operateEvents" data-width="200"
                                    class="text-center align-middle">
                                    STATUS
                                </th>
                                <th data-formatter="operateFormatter2" data-events="operateEvents2" data-width="200"
                                    class="text-center align-middle">OPSI</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT DATA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="hasilEdit">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">TAMBAH DATA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form id="formModal" action="{{ url('Owner/add-produk') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="tablenya" value="table">
                        <input type="hidden" id="FormAdd" value="modalAdd">
                        <div class="row">
                            <div class="col-6">
                                <div class=" mb-3">
                                    <label>Katagori Produk</label>
                                    <select name="idKatagori" id="" class="form-control select2">
                                        <option value=" " disabled selected>Pilih</option>
                                        @foreach ($katagori as $kat)
                                            <option value="{{ $kat->idKatagori }}">{{ $kat->namaKatagori }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class=" mb-3">
                                    <label>Nama Produk</label>
                                    <input type="text" class="form-control" name="namaProduk" required>
                                </div>

                                <div class="mb-3">
                                    <label>Harga Produk</label>
                                    <div class="input-group">
                                        <span class="input-group-text"
                                            style="border: none; background: none; border-radius: 0; border-bottom: 1px solid">Rp</span>
                                        <input type="text" class="form-control" id="hargaProduk" name="hargaProduk"
                                            required>
                                    </div>
                                </div>

                                <label for="idtextarea1">Deskripsi Produk</label>
                                <div class="form-floating mb-3">
                                    <div id="quill-editor1" style="height: 100px;"></div>
                                    <textarea name="deskripsiProduk" id="idtextarea1" style="display: none;"></textarea>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="preview d-flex justify-content-center align-items-center mb-3"
                                    style="width: 200px; height: 200px; margin: 0 auto;">
                                    <img id="preview-file" class="mx-auto d-block" width="200px" height="200px"
                                        style="border: 2px dashed #444; border-radius: 8px;"
                                        src="{{ asset('./Admin/images/No_Image.png') }}">
                                </div>

                                <div class="mb-3">
                                    <label>Upload</label>
                                    <input type="file" class="form-control" name="gambar"
                                        onchange="showPreview(event)" accept=".jpeg, .jpg, .png" required>
                                </div>

                                <label class="w-100 mb-2">Status</label>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="d-flex justify-content-evenly">
                                                <div class="col-sm">
                                                    <div class="form-row">
                                                        <div class="checkbox-wrapper">
                                                            <input type="radio" name="status" value="Publish"
                                                                id="activeRadio" required>
                                                            <svg viewBox="0 0 35.6 35.6">
                                                                <circle class="background" cx="17.8" cy="17.8"
                                                                    r="17.8"></circle>
                                                                <circle class="stroke" cx="17.8" cy="17.8"
                                                                    r="14.37"></circle>
                                                                <polyline class="check"
                                                                    points="11.78 18.12 15.55 22.23 25.17 12.87">
                                                                </polyline>
                                                            </svg>
                                                        </div>
                                                        <label for="activeRadio" class="label">Publish</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm">
                                                    <div class="form-row">
                                                        <div class="checkbox-wrapper">
                                                            <input type="radio" name="status" value="UnPublish"
                                                                id="inactiveRadio">
                                                            <svg viewBox="0 0 35.6 35.6">
                                                                <circle class="background" cx="17.8" cy="17.8"
                                                                    r="17.8"></circle>
                                                                <circle class="stroke" cx="17.8" cy="17.8"
                                                                    r="14.37"></circle>
                                                                <polyline class="check"
                                                                    points="11.78 18.12 15.55 22.23 25.17 12.87">
                                                                </polyline>
                                                            </svg>
                                                        </div>
                                                        <label for="inactiveRadio" class="label">Un-publish</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">BATAL</button>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('./Admin/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('./Admin/js/quilljs.init.js') }}"></script>
    <script src="{{ asset('./Admin/js/inputmusk.js') }}"></script>

    <script>
        var urldata = "<?= env('APP_URL') ?>";
        var pubiconY = "{{ asset('Admin/gif/letter-y.gif') }}";
        var pubiconN = "{{ asset('Admin/gif/letter-t.gif') }}";
        var editIcon = "{{ asset('Admin/gif/Edit.lottie') }}";
        var hapusIcon = "{{ asset('Admin/gif/Delete.lottie') }}";
        var defaultImageURL = "{{ asset('Admin/images/No_Image.png') }}";

        function NoFormatter(value, row, index) {
            return index + 1;
        }

        function gambar(value, row, index) {
            const gambar = row.gambar ? `/${row.gambar}` : '';
            const defaultImg = `{{ asset('./Admin/images/No_Image.png') }}`;
            const src = gambar && gambar !== '/' ? gambar : defaultImg;

            return `
                <div class="text-center">
                    <img src="${src}" 
                        onerror="this.onerror=null;this.src='${defaultImg}';"
                        alt="${row.nama || 'No Image'}"
                        style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd;">
                </div>
            `;
        }

        function harga(value, row, index) {
            if (!row.harga) return '-';
            const formatted = new Intl.NumberFormat('id-ID').format(row.harga);
            return `<span class=" text-dark">Rp ${formatted}</span>`;
        }

        function operateFormatter(value, row, index) {
            var stsData = row.status;
            if (stsData == "Publish") {
                return [
                    '<div class="btn-group" role="group" aria-label="Basic mixed styles example">',
                    '<button disabled class="py-2 px-2 d-flex align-items-center btn btn-success Aktif"> Publish',
                    '</button>',
                    '<button class="py-2 px-2 d-flex align-items-center btn btn-outline-danger NonAktifkan"> UnPublish',
                    '</button>',
                    '</div>',
                ].join("");
            } else {
                return [
                    '<div class="btn-group" role="group" aria-label="Basic mixed styles example">',
                    '<button class="py-2 px-2 d-flex align-items-center btn btn-outline-success Aktif"> Publish',
                    '</button>',
                    '<button disabled class="py-2 px-2 d-flex align-items-center btn btn-danger NonAktifkan"> UnPublish',
                    '</button>',
                    '</div>',
                ].join("");
            }
        }

        window.operateEvents = {

            'click .Aktif': function(e, value, row) {
                var id = row.idProduk;
                var is_active = "Publish";

                Swal.fire({
                    title: 'Anda Yakin?',
                    text: "Data akan publish",
                    icon: 'warning',
                    showCancelButton: true,
                    backdrop: `rgba(60,60,60,0.8)`,
                    confirmButtonText: 'Ya, Publish',
                    confirmButtonColor: "#c03221",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "MOHON TUNGGU",
                            text: "Sedang diproses...",
                            showConfirmButton: false,
                        });
                        $.ajax({
                            type: "POST",
                            url: urldata + "/Owner/status-produk",
                            data: {
                                id: id,
                                is_active: is_active,
                                _token: $('meta[name="csrf-token"]').attr('content') // CSRF token
                            },
                            success: function(data) {
                                $('#table').bootstrapTable('refresh');
                                Swal.close();
                                Swal.fire("BERHASIL!", "Data berhasil diproses.", "success");
                            },
                            error: function(xhr) {
                                Swal.close();
                                let pesanError = "Terjadi kesalahan pada server.";
                                Swal.fire("GAGAL!", pesanError, "error");
                            }
                        });
                    }
                });
            },

            'click .NonAktifkan': function(e, value, row) {
                var id = row.idProduk;
                var is_active = "UnPublish";
                console.log(urldata + "/Owner/status-produk");

                Swal.fire({
                    title: 'Anda Yakin?',
                    text: "Data akan UnPublish",
                    icon: 'warning',
                    showCancelButton: true,
                    backdrop: `rgba(60,60,60,0.8)`,
                    confirmButtonText: 'Ya, UnPublish',
                    confirmButtonColor: "#c03221",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "MOHON TUNGGU",
                            text: "Sedang diproses...",
                            showConfirmButton: false,
                        });
                        $.ajax({
                            type: "POST",
                            url: urldata + "/Owner/status-produk",
                            data: {
                                id: id,
                                is_active: is_active,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                $('#table').bootstrapTable('refresh');
                                Swal.close();
                                Swal.fire("BERHASIL!", "Data berhasil diproses.", "success");
                            },
                            error: function(xhr) {
                                Swal.close();
                                let pesanError = "Terjadi kesalahan pada serverb.";
                                Swal.fire("GAGAL!", pesanError, "error");
                            }
                        });
                    }
                });
            }
        };

        function operateFormatter2(value, row, index) {
            return `
                <div class="btn-group" role="group" aria-label="Opsi Meja">
                    <button type="button" class="btn btn-sm btn-outline-danger Hapus d-flex align-items-center justify-content-center" data-id="${row.idTempat}" title="Hapus">
                        <i class="bi bi-trash3"></i>
                    </button>
                </div>
            `;
        }

        window.operateEvents2 = {
            'click .Hapus': function(e, value, row) {
                var id = row.idProduk;
                Swal.fire({
                    title: 'Anda Yakin?',
                    text: "Data akan terhapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    backdrop: `rgba(60,60,60,0.8)`,
                    confirmButtonText: 'Yes, Hapus',
                    confirmButtonColor: "#c03221",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.value) {
                        Swal.fire({
                            title: "MOHON TUNGGU",
                            text: " sedang diproses..",
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        });
                        $.ajax({
                            type: "POST",
                            url: urldata + "/Owner/hapus-produk/" + id,
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                $('#table').bootstrapTable('refresh')
                                Swal.close();
                                if (data.status == 3) {
                                    Swal.fire({
                                        icon: "success",
                                        title: data.message,
                                        allowOutsideClick: false,
                                    });
                                } else if (data.status == 0) {
                                    Swal.fire({
                                        icon: "error",
                                        title: data.message,
                                        allowOutsideClick: false,
                                    });
                                } else {
                                    Swal.fire("GAGAL!", "Terjadi kesalahan.", "error");
                                }
                            },
                        });
                    }
                })
            }
        };
    </script>
@endsection
