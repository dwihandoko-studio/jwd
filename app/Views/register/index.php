<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<main class="main-content mt-0 content-loading">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder">Daftar</h4>
                                <p class="mb-0">Silahkan lengkapi isian berikut:</p>
                            </div>
                            <div class="card-body pb-3">
                                <form action="<?= base_url('auth') ?>/saveregis" method="post" id="form-daftar" role="form">
                                    <label>Name</label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control name" id="_name" name="_name" onchange="inputChange(this)" placeholder="Name" aria-label="Name">
                                        <div class="_name"></div>
                                    </div>
                                    <label>No Handphone</label>
                                    <div class="mb-3">
                                        <input type="tel" class="form-control no-hp" id="_no_hp" name="_no_hp" onchange="inputChange(this)" placeholder="No Handphone" aria-label="No Handphone">
                                        <div class="_no_hp"></div>
                                    </div>
                                    <label>Kode POS</label>
                                    <div class="mb-3">
                                        <input type="number" class="form-control kode-pos" id="_kode_pos" name="_kode_pos" onchange="inputChange(this)" placeholder="Kode POS" aria-label="Kode POS">
                                        <div class="_kode_pos"></div>
                                    </div>
                                    <label>Alamat</label>
                                    <div class="mb-3">
                                        <textarea class="form-control alamat" id="_alamat" name="_alamat" placeholder="Alamat" onchange="inputChange(this)" aria-label="Alamat" rows="3"></textarea>
                                        <div class="_alamat"></div>
                                    </div>
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="email" class="form-control email" id="_email" name="_email" onchange="inputChange(this)" placeholder="Email" aria-label="Email">
                                        <div class="_email"></div>
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control password" id="_password" name="_password" onchange="inputChange(this)" placeholder="Password" aria-label="Password">
                                        <div class="_password"></div>
                                    </div>
                                    <label>Re-Password</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control repassword" id="_repassword" name="_repassword" onchange="inputChange(this)" placeholder="Password" aria-label="Password">
                                        <div class="_repassword"></div>
                                    </div>
                                    <div class="form-check form-check-info text-left">
                                        <input class="form-check-input setujui" type="checkbox" value="" onchange="inputChange(this)" id="_setujui" name="_setujui">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree the <a href="#" class="text-dark font-weight-bolder">Terms and Conditions</a>
                                        </label>
                                        <div class="_setujui"></div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Daftar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-sm-4 px-1">
                                <p class="mb-4 mx-auto">
                                    Already have an account?
                                    <a href="<?= base_url('auth') ?>" class="text-primary text-gradient font-weight-bold">Masuk</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                            <img src="<?= base_url() ?>/assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-4 start-0">
                            <div class="position-relative">
                                <img class="max-width-500 w-100 position-relative z-index-2" src="<?= base_url() ?>/assets/img/illustrations/rocket-white.png" alt="rocket">
                            </div>
                            <h4 class="mt-5 text-white font-weight-bolder">Mari Bergabung Bersama Kami</h4>
                            <p class="text-white">Banyak koleksi buku-buku baru dan favorit tersedia untuk anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?= $this->endSection(); ?>

<?= $this->section('scriptBottom'); ?>
<script>
    // Swal.fire(
    //     "Peringatan!",
    //     '{{ .error }}',
    //     "warning"
    // );
    function inputChange(id) {
        const color = $(id).attr('id');
        $(id).removeAttr('style');
        $('.' + color).html('');
    }

    $("form").on("submit", function(e) {

        e.preventDefault();
        let dataString = $(this).serialize();
        const name = document.getElementById('_name');
        const nohp = document.getElementById('_no_hp');
        const kodepos = document.getElementById('_kode_pos');
        const alamat = document.getElementById('_alamat');
        const email = document.getElementById('_email');
        const password = document.getElementById('_password');
        const repassword = document.getElementById('_repassword');

        const iscek = document.querySelector('#_setujui').checked;

        if (name.value === "") {
            $("input#_name").css("color", "#dc3545");
            $("input#_name").css("border-color", "#dc3545");
            $('._name').html('<ul role="alert" style="color: #dc3545;list-style-type: none;"><li style="color: #dc3545;">Nama tidak boleh kosong.</li></ul>');
            name.focus();
            return false;
        }

        if (nohp.value === "") {
            $("input#_no_hp").css("color", "#dc3545");
            $("input#_no_hp").css("border-color", "#dc3545");
            $('._no_hp').html('<ul role="alert" style="color: #dc3545;list-style-type: none;"><li style="color: #dc3545;">No handphone tidak boleh kosong.</li></ul>');
            nohp.focus();
            return false;
        }

        if (kodepos.value === "") {
            $("input#_kode_pos").css("color", "#dc3545");
            $("input#_kode_pos").css("border-color", "#dc3545");
            $('._kode_pos').html('<ul role="alert" style="color: #dc3545;list-style-type: none;"><li style="color: #dc3545;">Kode pos tidak boleh kosong.</li></ul>');
            kodepos.focus();
            return false;
        }

        if (alamat.value === "") {
            $("textarea#_alamat").css("color", "#dc3545");
            $("textarea#_alamat").css("border-color", "#dc3545");
            $('._alamat').html('<ul role="alert" style="color: #dc3545;list-style-type: none;"><li style="color: #dc3545;">Alamat tidak boleh kosong.</li></ul>');
            alamat.focus();
            return false;
        }

        if (email.value === "") {
            $("textarea#_email").css("color", "#dc3545");
            $("textarea#_email").css("border-color", "#dc3545");
            $('._email').html('<ul role="alert" style="color: #dc3545;list-style-type: none;"><li style="color: #dc3545;">Email tidak boleh kosong.</li></ul>');
            email.focus();
            return false;
        }

        if (password.value === "") {
            $("input#_password").css("color", "#dc3545");
            $("input#_password").css("border-color", "#dc3545");
            $('._password').html('<ul role="alert" style="color: #dc3545;list-style-type: none;"><li style="color: #dc3545;">Password tidak boleh kosong.</li></ul>');
            password.focus();
            return false;
        }

        if (repassword.value === "") {
            $("input#_repassword").css("color", "#dc3545");
            $("input#_repassword").css("border-color", "#dc3545");
            $('._repassword').html('<ul role="alert" style="color: #dc3545;list-style-type: none;"><li style="color: #dc3545;">Re-password tidak boleh kosong.</li></ul>');
            repassword.focus();
            return false;
        }

        if (password.value !== repassword.value) {
            $("input#_repassword").css("color", "#dc3545");
            $("input#_repassword").css("border-color", "#dc3545");
            $('._repassword').html('<ul role="alert" style="color: #dc3545;list-style-type: none;"><li style="color: #dc3545;">Re-password tidak sama.</li></ul>');
            repassword.focus();
            return false;
        }

        if (!iscek) {
            $("input#_setujui").css("color", "#dc3545");
            $("input#_setujui").css("border-color", "#dc3545");
            $('._setujui').html('<ul role="alert" style="color: #dc3545;list-style-type: none;"><li style="color: #dc3545;">Silahkan ceklis isian diatas.</li></ul>');
            return false;
        }

        $.ajax({
            type: "POST",
            url: '<?= base_url('auth') ?>/saveregis',
            data: dataString,
            dataType: 'JSON',
            beforeSend: function() {
                loading = true;
                $('div.content-loading').block({
                    message: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                });
            },
            success: function(msg) {
                if (msg.status != 200) {
                    if (msg.status != 204) {
                        $('div.content-loading').unblock();
                        loading = false;
                        Swal.fire(
                            "Peringatan!",
                            msg.message,
                            "warning"
                        );
                    } else {
                        Swal.fire(
                            'Peringatan!',
                            msg.message,
                            'warning'
                        ).then((valRes) => {
                            document.location.href = msg.redirect;
                        })
                    }
                } else {
                    Swal.fire(
                        'Berhasil!',
                        msg.message,
                        'success'
                    ).then((valRes) => {
                        // setTimeout(function() {
                        document.location.href = msg.redirect;
                        // }, 2000);
                        // document.location.href = window.location.href + "dashboard";
                    })
                }
            },
            error: function(data) {
                console.log(data); {
                    {
                        /* if (data.status === 200 && (data.statusText === "parsererror" || data.statusText === "OK")) {
                                                // setTimeout(function() {
                                                document.location.href = BASE_URL + '/dahboard';
                                                // }, 2000);
                                            } else { */
                    }
                }
                loading = false;
                $('div.content-loading').unblock();
                Swal.fire(
                    'Gagal!',
                    "Trafik sedang penuh, silahkan ulangi beberapa saat lagi.",
                    'warning'
                ); {
                    {
                        /* } */
                    }
                }
            }
        });

    });
</script>
<?= $this->endSection(); ?>