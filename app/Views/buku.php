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
        <section class="section-header pb-9 pb-md-11 pb-lg-13 mb-4 mb-lg-6 bg-primary text-white">

            <div class="pattern bottom"></div>
        </section>
        <?php if (isset($bukus)) {
            if (count($bukus) > 0) { ?>
                <section class="section section-lg pt-0">
                    <div class="container mt-n8 mt-lg-n12 z-2">
                        <div class="row mt-6 mt-md-n7">
                            <?php foreach ($bukus as $keyb => $buku) { ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="profile-card mb-7">
                                        <div class="card shadow-soft border-light text-center">
                                            <div class="profile-image">
                                                <img width="50px" height="150px" src="<?= base_url('uploads/buku') . '/' . $buku->gambar ?>" class="card-img-top" alt="image">
                                            </div>
                                            <div class="card-body mt-n5">
                                                <h5 class="card-title"><?= $buku->nama_buku ?></h5>
                                                <h6 class="card-subtitle"><?= $buku->kategori ?></h6>
                                                <ul class="social-buttons py-3">
                                                    <li><a href="#" target="_blank" class="btn btn-link btn-slack"><?= Rupiah($buku->harga) ?></a></li>
                                                    <li><button type="button" onclick="addToCard(this, '<?= $buku->bid ?>')" class="btn btn-info btn-dribbble">Tambahkan Ke Keranjang</button></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>

            <?php } else {
            ?>
                <section class="section section-lg pb-5 bg-soft">
                    <div class="container z-2">
                        <div class="row justify-content-center">
                            <div class="col-md-10 text-center">
                                <h2 class="h1">Interested in joining the team?</h2>
                                <p class="lead py-4 text-gray">One of our most important core values is to partner with our employees because we know they are instrumental in the success of the company.</p><a href="./careers.html" class="btn btn-lg btn-secondary animate-up-2">See job openings</a>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php } else { ?>
            <section class="section section-lg pb-5 bg-soft">
                <div class="container z-2">
                    <div class="row justify-content-center">
                        <div class="col-md-10 text-center">
                            <h2 class="h1">Data tidak ditemukan.</h2>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
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
                    $('div.main-content').unblock();

                    if (resul.status !== 200) {
                        Swal.fire(
                            'Failed!',
                            resul.message,
                            'warning'
                        );
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

        // function aksiPencarian() {
        //     const keyWord = document.getElementsByName('_pencarian')[0].value;
        //     if (keyWord !== "") {
        //         window.location.href = "<?= base_url() ?>/toko/buku?keyword=" + keyWord;
        //     }
        // }
    </script>
</body>

</html>