@extends('Owner.Layout.Index')

@section('content')
    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
        <div class="flex-grow-1">
            <h4 class="fs-18 fw-semibold m-0"></h4>
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
                        data-id-field="idTempat" data-url="{{ url('Owner/get-tempat') }}">
                        <thead>
                            <tr class="text-center">
                                <th data-formatter="NoFormatter" data-width="10" class="text-center">NO</th>
                                <th data-field="nomer" class="text-center">Nomer Meja</th>
                                <th data-formatter="operateFormatter2" data-events="operateEvents2" data-width="200"
                                    class="text-center">OPSI</th>
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
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">TAMBAH DATA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form id="formModal" action="{{ url('Owner/add-meja') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="tablenya" value="table">
                        <input type="hidden" id="FormAdd" value="modalAdd">
                        <div class="row">
                            <div class="col-12">
                                <div class=" mb-3">
                                    <label>Nomer Meja</label>
                                    <input type="number" class="form-control" name="nomermeja" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


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

        function operateFormatter2(value, row, index) {
            return `
                <div class="btn-group" role="group" aria-label="Opsi Meja">
                    <a href="${row.link}" target="_blank" class="btn btn-sm btn-success" title="Buka Link">
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                    <a href="/${row.qris}" download class="btn btn-sm btn-primary" title="Download QR">
                        <i class="bi bi-download"></i>
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-danger Hapus d-flex align-items-center justify-content-center" data-id="${row.idTempat}" title="Hapus">
                        <i class="bi bi-trash3"></i>
                    </button>
                </div>
            `;
        }

        window.operateEvents2 = {
            'click .Hapus': function(e, value, row) {
                var id = row.idTempat;
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
                            url: urldata + "/Owner/hapus-meja/" + id,
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
