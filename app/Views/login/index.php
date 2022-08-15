<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<main class="main-content mt-0 content-loading">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Sign In</h4>
                                <p class="mb-0">Enter your email and password to sign in</p>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('auth') ?>/login" method="post" id="form-login" role="form">
                                    <div class="mb-3">
                                        <input type="text" class="form-control form-control-lg" id="username" name="username" placeholder="Username / Email" aria-label="Username / Email">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" aria-label="Password">
                                    </div>
                                    <!-- <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div> -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="<?= base_url('auth/register') ?>" class="text-primary text-gradient font-weight-bold">Sign up</a>
                                </p>
                                <p class="mb-4 mt-4 text-sm mx-auto">
                                    <a href="<?= base_url() ?>" class="btn btn-sm  bg-gradient-dark  btn-round mb-0 me-1">Kembali</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center">
                            <img src="<?= base_url() ?>/assets/img/shapes/pattern-lines.svg" alt="pattern-lines" class="position-absolute opacity-4 start-0">
                            <div class="position-relative">
                                <img class="max-width-500 w-100 position-relative z-index-2" src="<?= base_url() ?>/assets/img/illustrations/chat.png" alt="chat-img">
                            </div>
                            <h4 class="mt-5 text-white font-weight-bolder">"Attention is the new currency"</h4>
                            <p class="text-white">The more effortless the writing looks, the more effort the writer actually put
                                into the process.</p>
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

    $("form").on("submit", function(e) {

        e.preventDefault();
        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: '<?= base_url('auth') ?>/login',
            data: dataString,
            dataType: 'JSON',
            beforeSend: function() {
                loading = true;
                $('div.content-loading').block({
                    message: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                });
            },
            success: function(msg) {
                console.log(msg);
                if (msg.status != 200) {
                    if (msg.status !== 201) {
                        if (msg.status !== 202) {
                            $('div.content-loading').unblock();
                            loading = false;
                            Swal.fire(
                                "Gagal!",
                                msg.message,
                                "warning"
                            );
                        } else {
                            Swal.fire(
                                "Warning!",
                                msg.message,
                                "warning"
                            ).then((valRes) => {
                                // setTimeout(function() {
                                document.location.href = msg.redirect;
                                // }, 2000);

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