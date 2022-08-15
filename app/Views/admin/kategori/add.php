<form id="formAddData" class="form-horizontal form-add-data" method="post">
    <div class="modal-body" style="padding-top: 0px; padding-bottom: 0px;">
        <div class="col-md-12">
            <div class="form-group _name-block">
                <label for="_name" class="form-control-label">Nama Kategori</label>
                <input type="text" class="form-control name" name="_name" placeholder="Nama kategori..." id="_name" onfocusin="inputFocus(this);" required>
                <div class="help-block _name"></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="saveAdd(this)" class="btn btn-outline-primary">Simpan</button>
    </div>
</form>

<script>
    function saveAdd(event) {
        const name = document.getElementsByName('_name')[0].value;


        if (name === "") {
            $("input#_name").css("color", "#dc3545");
            $("input#_name").css("border-color", "#dc3545");
            $('._name').html('<ul role="alert" style="color: #dc3545; list-style: none; margin-block-start: 0px; padding-inline-start: 10px;"><li style="color: #dc3545;">Nama kategori tidak boleh kosong.</li></ul>');
            return false;
        }

        $.ajax({
            url: BASE_URL + "/admin/kategori/addSave",
            type: 'POST',
            data: {
                name: name,
            },
            dataType: 'JSON',
            beforeSend: function() {
                $('div.modal-content-loading').block({
                    message: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                });
            },
            success: function(resul) {
                $('div.modal-content-loading').unblock();

                if (resul.status !== 200) {
                    if (resul.status === 401) {
                        Swal.fire(
                            'Failed!',
                            resul.message,
                            'warning'
                        ).then((valRes) => {
                            reloadPage();
                        });
                    } else {
                        Swal.fire(
                            'GAGAL!',
                            resul.message,
                            'warning'
                        );
                    }
                } else {
                    Swal.fire(
                        'SELAMAT!',
                        resul.message,
                        'success'
                    ).then((valRes) => {
                        reloadPage();
                    })
                }
            },
            error: function() {
                $('div.modal-content-loading').unblock();
                Swal.fire(
                    'PERINGATAN!',
                    "Trafik sedang penuh, silahkan ulangi beberapa saat lagi.",
                    'warning'
                );
            }
        });
    }
</script>