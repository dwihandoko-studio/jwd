<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <meta name="description" content="Toko Buku KNTechline.">
    <meta name="author" content="BJ Hands - handokowae.my.id">
    <title><?= isset($title) ? $title : 'Toko Buku KNTechline' ?></title>
    <meta name="keywords" content="Toko Buku, Toko, Buku, KNT, KNTechline, kntechline, KNTECHLINE">
    <meta name="description" content="Toko Buku KNTechline.">
    <meta itemprop="name" content="Toko Buku KNTechline.">
    <meta itemprop="description" content="Toko Buku KNTechline.">

    <link type="text/css" href="<?= base_url('new-assets'); ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('new-assets'); ?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link type="text/css" href="<?= base_url('new-assets'); ?>/assets/vendor/prismjs/themes/prism.css" rel="stylesheet">
    <link type="text/css" href="<?= base_url('new-assets'); ?>/assets/front/css/front.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('new-assets'); ?>/assets/vendor/sweetalert2/dist/sweetalert2.min.css">

</head>

<body>
    <?= $this->include('templates/header-front'); ?>
    <main>
        <?= $this->renderSection('content-front'); ?>
        <footer class="footer section pt-6 pt-md-8 pt-lg-10 pb-3 bg-primary text-white overflow-hidden">
            <div class="pattern pattern-soft top"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0"><a class="footer-brand mr-lg-5 d-flex" href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/knt.png" height="35" class="mr-3" alt="Footer logo"></a>
                        <p class="my-4">Menyediakan berbagai koleksi jenis buku pendidikan, pantun dan cerita. Edisi rata-rata terbaru<br />Silahkan lihat-lihat di koleksi kami.</p>
                    </div>
                </div>
                <hr class="my-4 my-lg-5">
                <div class="row">
                    <div class="col pb-4 mb-md-0">
                        <div class="d-flex text-center justify-content-center align-items-center">
                            <p class="font-weight-normal mb-0">Copyright © <a href="https://handokowae.my.id" target="_blank">Handokowae</a> & <a href="https://kntechline.id">KNTECHLINE</a> <span class="current-year"></span>. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/headroom.js/dist/headroom.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/jarallax/dist/jarallax.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/countup.js/dist/countUp.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/prismjs/prism.js"></script>
    <script async defer="defer" src="https://buttons.github.io/buttons.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/front/assets/js/front.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery-block-ui.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script>
        function addToCard(event, id) {
            $.ajax({
                url: "<?= base_url('toko/buku/addtocart') ?>",
                type: 'POST',
                data: {
                    id: id,
                },
                dataType: 'JSON',
                beforeSend: function() {
                    $('div.main-content').block({
                        message: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                    });
                },
                success: function(resul) {
                    console.log(resul);
                    $('div.main-content').unblock();

                    if (resul.status !== 200) {
                        if (resul.status !== 401) {
                            Swal.fire(
                                'Failed!',
                                resul.message,
                                'warning'
                            );
                        } else {
                            window.location.href = resul.redirect;
                        }
                    } else {
                        Swal.fire(
                            'SELAMAT!',
                            resul.message,
                            'success'
                        ).then((valRes) => {
                            window.location.href = resul.redirect;
                        })
                    }
                },
                error: function() {
                    $('div.main-content').unblock();
                    Swal.fire(
                        'Failed!',
                        "Trafik sedang penuh, silahkan ulangi beberapa saat lagi.",
                        'warning'
                    );
                }
            });
        }

        $('.tombol-logout').on('click', function(e) {
            e.preventDefault();
            const href = BASE_URL + "/auth/logout";
            Swal.fire({
                title: 'Apakah anda yakin ingin keluar?',
                text: "Dari Aplikasi ini",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Sign Out!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: href,
                        type: 'GET',
                        contentType: false,
                        cache: false,
                        beforeSend: function() {
                            $('body.loading-logout').block({
                                message: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                            });
                        },
                        success: function(resMsg) {
                            Swal.fire(
                                'Berhasil!',
                                "Anda berhasil logout.",
                                'success'
                            ).then((valRes) => {
                                document.location.href = BASE_URL + "/web/home";
                            })
                        },
                        error: function() {
                            $('body.loading-logout').unblock();
                            Swal.fire(
                                'Gagal!',
                                "Trafik sedang penuh, silahkan ulangi beberapa saat lagi.",
                                'warning'
                            );
                        }
                    })
                }
            })
        });
    </script>
    <?= $this->renderSection('scriptBottomFront'); ?>
</body>

</html>