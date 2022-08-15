<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<div class="main-content" id="panel">
    <?= $this->include('templates/topnav'); ?>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/home'); ?>"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('admin/buku/data'); ?>">Data Buku</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Buku</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="mb-0">TAMBAH BUKU</h3>
                        <br>
                    </div>
                    <div class="card-body">
                        <form id="formAddData" class="form-horizontal form-add-data" method="post">
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group _kategori-block">
                                        <label for="_kategori" class="form-control-label">Kategori Buku</label>
                                        <select class="form-control kategori" name="_kategori" id="_kategori" data-toggle="select-2" title="Simple select" data-live-search="true" data-live-search-placeholder="Search ..." required>
                                            <option value="">-- Pilih --</option>
                                            <?php if (isset($kategoris)) {
                                                if (count($kategoris) > 0) {
                                                    foreach ($kategoris as $key => $val) { ?>
                                                        <option value="<?= $val->kid ?>"><?= $val->kategori ?></option>
                                            <?php }
                                                }
                                            } ?>
                                        </select>
                                        <div class="help-block _kategori"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group _nama_buku-block">
                                        <label for="_nama_buku" class="form-control-label">Nama Buku</label>
                                        <input type="text" class="form-control nama-buku" id="_nama_buku" name="_nama_buku" placeholder="Nama buku . . ." onFocus="inputFocus(this);" required />
                                        <div class="help-block _nama_buku"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group _pengarang-block">
                                        <label for="_pengarang" class="form-control-label">Pengarang</label>
                                        <input type="text" class="form-control pengarang" id="_pengarang" name="_pengarang" placeholder="Pengarang . . ." onFocus="inputFocus(this);" required />
                                        <div class="help-block _pengarang"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group _tahun-block">
                                        <label for="_tahun" class="form-control-label">Tahun Terbit</label>
                                        <select class="form-control tahun" name="_tahun" id="_tahun" data-toggle="select-2" title="Simple select" data-live-search="true" data-live-search-placeholder="Search ..." required>
                                            <option value="">-- Pilih --</option>
                                            <?php for ($i = 1945; $i < 2030; $i++) {  ?>
                                                <option value="<?= $i ?>">Tahun <?= $i ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="help-block _tahun"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group _harga-block">
                                        <label for="_harga" class="form-control-label">Harga</label>
                                        <input type="number" class="form-control harga" id="_harga" name="_harga" placeholder="Harga . . ." onFocus="inputFocus(this);" required />
                                        <div class="help-block _harga"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group _quantiti-block">
                                        <label for="_quantiti" class="form-control-label">Quantiti</label>
                                        <input type="number" class="form-control quantiti" id="_quantiti" name="_quantiti" placeholder="Harga . . ." onFocus="inputFocus(this);" required />
                                        <div class="help-block _quantiti"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Deskripsi</label>
                                <div class="form-group _deskripsi-block">
                                    <textarea class="form-control deskripsi" id="_deskripsi" name="_deskripsi" rows="5" onFocus="inputFocus(this);" placeholder="Deskripsi . . ." required></textarea>
                                    <div class="help-block _deskripsi"></div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group" id="file-error">
                                        <h5>Gambar Buku<span class="required">*</span></h5>
                                        <div class="controls">
                                            <input type="file" class="form-control" id="_file" name="_file" onFocus="inputFocus(this);" accept="image/*" onchange="loadFileImage()" required>
                                            <div class="help-block _file" for="file"></div>
                                        </div>
                                        <p>Pilih gambar dengan ukuran maksimal 512 kb.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>&nbsp;</label>
                                    <div class="form-group">
                                        <div class="preview-image-upload">
                                            <img class="imagePreviewUpload" id="imagePreviewUpload" />
                                            <button type="button" class="btn-remove-preview-image">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div><progress id="progressBar" value="0" max="100" style="width:100%; display: none;"></progress></div>
                            <div>
                                <h3 id="status" style="font-size: 15px; margin: 8px auto;"></h3>
                            </div>
                            <div>
                                <p id="loaded_n_total" style="margin-bottom: 0px;"></p>
                            </div>
                            <button type="button" onclick="addSave(this)" class="btn btn-outline-primary simpan-data">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="contentModal" tabindex="-1" role="dialog" aria-labelledby="contentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-loading">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contentModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="contentBodyModal">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scriptBottom'); ?>
<script src="<?= base_url('new-assets/assets/js'); ?>/jquery-block-ui.js"></script>
<script src="<?= base_url('new-assets') ?>/assets/vendor/datatables/datatables.min.js"></script>
<script src="<?= base_url('new-assets'); ?>/assets/vendor/select2/dist/js/select2.min.js"></script>

<script>
    function loadFileImage() {
        const input = document.getElementsByName('_file')[0];
        if (input.files && input.files[0]) {
            var file = input.files[0];

            // allowed MIME types
            var mime_types = ['image/jpg', 'image/jpeg', 'image/png'];

            if (mime_types.indexOf(file.type) == -1) {
                input.value = "";
                $('.imagePreviewUpload').attr('src', '');
                Swal.fire(
                    'Warning!!!',
                    "Hanya file type gambar yang diizinkan.",
                    'warning'
                );
                return;
            }

            // console.log(file.size);

            // validate file size
            if (file.size > 1 * 256 * 1000) {
                input.value = "";
                $('.imagePreviewUpload').attr('src', '');
                Swal.fire(
                    'Warning!!!',
                    "Ukuran file tidak boleh lebih dari 250 Kb.",
                    'warning'
                );
                return;
            }

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.imagePreviewUpload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
            // console.log("success Load");
        } else {
            console.log("failed Load");
        }
    }

    function addSave(event) {
        const fileName = document.getElementsByName('_file')[0].value;
        const kategori = document.getElementsByName('_kategori')[0].value;
        const nama = document.getElementsByName('_nama_buku')[0].value;
        const pengarang = document.getElementsByName('_pengarang')[0].value;
        const tahun = document.getElementsByName('_tahun')[0].value;
        const harga = document.getElementsByName('_harga')[0].value;
        const qty = document.getElementsByName('_quantiti')[0].value;
        const deskripsi = document.getElementsByName('_deskripsi')[0].value;

        if (kategori === "") {
            $("select#_kategori").css("color", "#dc3545");
            $("select#_kategori").css("border-color", "#dc3545");
            $('._kategori').html('<ul role="alert" style="color: #dc3545;"><li style="color: #dc3545;">Silahkan pilih kategori buku.</li></ul>');
            return false;
        }

        if (nama === "") {
            $("input#_nama_buku").css("color", "#dc3545");
            $("input#_nama_buku").css("border-color", "#dc3545");
            $('._nama_buku').html('<ul role="alert" style="color: #dc3545;"><li style="color: #dc3545;">Nama buku tidak boleh kosong.</li></ul>');
            return false;
        }

        if (pengarang === "") {
            $("input#_pengarang").css("color", "#dc3545");
            $("input#_pengarang").css("border-color", "#dc3545");
            $('._pengarang').html('<ul role="alert" style="color: #dc3545;"><li style="color: #dc3545;">Pengarang tidak boleh kosong.</li></ul>');
            return false;
        }

        if (tahun === "") {
            $("select#_tahun").css("color", "#dc3545");
            $("select#_tahun").css("border-color", "#dc3545");
            $('._tahun').html('<ul role="alert" style="color: #dc3545;"><li style="color: #dc3545;">Silahkan pilih tahun terbit buku.</li></ul>');
            return false;
        }

        if (harga === "") {
            $("input#_harga").css("color", "#dc3545");
            $("input#_harga").css("border-color", "#dc3545");
            $('._harga').html('<ul role="alert" style="color: #dc3545;"><li style="color: #dc3545;">Harga buku tidak boleh kosong.</li></ul>');
            return false;
        }

        if (qty === "") {
            $("input#_quantiti").css("color", "#dc3545");
            $("input#_quantiti").css("border-color", "#dc3545");
            $('._quantiti').html('<ul role="alert" style="color: #dc3545;"><li style="color: #dc3545;">Quantiti buku tidak boleh kosong.</li></ul>');
            return false;
        }

        if (deskripsi === "") {
            $("textarea#_deskripsi").css("color", "#dc3545");
            $("textarea#_deskripsi").css("border-color", "#dc3545");
            $('._deskripsi').html('<ul role="alert" style="color: #dc3545;"><li style="color: #dc3545;">Deskripsi buku tidak boleh kosong.</li></ul>');
            return false;
        }

        if (fileName === "") {
            $("input#_file").css("color", "#dc3545");
            $("input#_file").css("border-color", "#dc3545");
            $('._file').html('<ul role="alert" style="color: #dc3545;"><li style="color: #dc3545;">Silahkan pilih file gambar buku.</li></ul>');
            return false;
        }

        const formUpload = new FormData();
        const file = document.getElementsByName('_file')[0].files[0];
        formUpload.append('file', file);
        formUpload.append('nama', nama);
        formUpload.append('kategori', kategori);
        formUpload.append('pengarang', pengarang);
        formUpload.append('tahun', tahun);
        formUpload.append('harga', harga);
        formUpload.append('deskripsi', deskripsi);
        formUpload.append('qty', qty);

        $.ajax({
            xhr: function() {
                let xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        ambilId("loaded_n_total").innerHTML = "Uploaded " + evt.loaded + " bytes of " + evt.total;
                        var percent = (evt.loaded / evt.total) * 100;
                        ambilId("progressBar").value = Math.round(percent);
                        ambilId("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
                    }
                }, false);
                return xhr;
            },
            url: "<?= base_url('admin/buku/addSave') ?>",
            type: 'POST',
            data: formUpload,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'JSON',
            beforeSend: function() {
                ambilId("progressBar").style.display = "block";
                $('.simpan-data').attr('disabled', 'disabled');
                ambilId("status").innerHTML = "Mulai mengupload . . .";
                ambilId("status").style.color = "blue"; //#858585
                ambilId("progressBar").value = 0;
                ambilId("loaded_n_total").innerHTML = "";
                $('div.modal-content-loading').block({
                    message: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                });
            },
            success: function(resul) {
                $('div.modal-content-loading').unblock();

                if (resul.status !== 200) {
                    ambilId("status").innerHTML = resul.message;
                    ambilId("status").style.color = "red";
                    ambilId("progressBar").value = 0;
                    ambilId("loaded_n_total").innerHTML = "";
                    $('.simpan-data').attr('disabled', false);

                    Swal.fire(
                        'Failed!',
                        resul.message,
                        'warning'
                    );
                } else {
                    ambilId("status").innerHTML = resul.message;
                    ambilId("status").style.color = "green";
                    ambilId("progressBar").value = 100;

                    Swal.fire(
                        'SELAMAT!',
                        resul.message,
                        'success'
                    ).then((valRes) => {
                        document.location.href = resul.redirect;
                    })
                }
            },
            error: function() {
                ambilId("status").innerHTML = "Upload Failed";
                ambilId("status").style.color = "red"; //#858585
                $('.simpan-data').attr('disabled', false);
                $('div.modal-content-loading').unblock();
                Swal.fire(
                    'Failed!',
                    "Trafik sedang penuh, silahkan ulangi beberapa saat lagi.",
                    'warning'
                );
            }
        });

    }

    function changeValidation(event) {
        $('.' + event).css('display', 'none');
    };

    function inputFocus(id) {
        const color = $(id).attr('id');
        $(id).removeAttr('style');
        $('.' + color).html('');
    }

    function inputChange(event) {
        console.log(event.value);
        if (event.value === null || (event.value.length > 0 && event.value !== "")) {
            $(event).removeAttr('style');
        } else {
            $(event).css("color", "#dc3545");
            $(event).css("border-color", "#dc3545");
            // $('.nama_instansi').html('<ul role="alert" style="color: #dc3545;"><li style="color: #dc3545;">Isian tidak boleh kosong.</li></ul>');
        }
    }

    function ambilId(id) {
        return document.getElementById(id);
    }

    $('#contentModal').on('click', '.btn-remove-preview-image', function(event) {
        $('.imagePreviewUpload').removeAttr('src');
        document.getElementsByName("_file")[0].value = "";
    });

    $(document).ready(function() {
        initSelect2('_kategori', '#panel');
        initSelect2('_tahun', '#panel');
    });

    function initSelect2(event, parrent) {
        $('#' + event).select2({
            dropdownParent: parrent
        });
    }
</script>
<?= $this->endSection(); ?>

<?= $this->section('scriptTop'); ?>
<link rel="stylesheet" href="<?= base_url('new-assets'); ?>/assets/vendor/select2/dist/css/select2.min.css">
<style>
    .preview-image-upload {
        position: relative;
    }

    .preview-image-upload .imagePreviewUpload {
        max-width: 300px;
        max-height: 300px;
        cursor: pointer;
    }

    .preview-image-upload .btn-remove-preview-image {
        display: none;
        position: absolute;
        top: 5px;
        left: 5px;
        /*top: 50%;*/
        /*left: 50%;*/
        /*transform: translate(-50%, -50%);*/
        /*-ms-transform: translate(-50%, -50%);*/
        background-color: #555;
        color: white;
        font-size: 16px;
        padding: 5px 10px;
        border: none;
        /*cursor: pointer;*/
        border-radius: 5px;
    }

    .imagePreviewUpload:hover+.btn-remove-preview-image,
    .btn-remove-preview-image:hover {
        display: block;
    }

    /*.imagePreviewUpload .btn-remove-preview-image:hover {*/

    /*    background-color: black;*/
    /*}*/
</style>
<?= $this->endSection(); ?>