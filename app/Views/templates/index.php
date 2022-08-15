<!DOCTYPE html>
<html>

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

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="<?= base_url('new-assets'); ?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/fontawesome.min.css" integrity="sha512-8Vtie9oRR62i7vkmVUISvuwOeipGv8Jd+Sur/ORKDD5JiLgTGeBSkI3ISOhc730VGvA5VVQPwKIKlmi+zMZ71w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/fontawesome.min.js" integrity="sha512-PoFg70xtc+rAkD9xsjaZwIMkhkgbl1TkoaRrgucfsct7SVy9KvTj5LtECit+ZjQ3ts+7xWzgfHOGzdolfWEgrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <link rel="stylesheet" href="<?= base_url('new-assets'); ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('new-assets'); ?>/assets/vendor/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="<?= base_url('new-assets'); ?>/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('new-assets'); ?>/assets/css/dashboard.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('new-assets'); ?>/assets/DataTables/datatables.css" type="text/css">
    <script>
        const BASE_URL = '<?= base_url() ?>';
    </script>
    <?= $this->renderSection('scriptTop'); ?>

</head>


<body class="bg-white loading-logout">
    <?= $this->include('templates/main_menu'); ?>
    <?= $this->renderSection('content'); ?>

    <script src="<?= base_url('new-assets'); ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/vendor/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/js/dashboard.js?v=1.2.0"></script>
    <script src="<?= base_url('new-assets'); ?>/assets/js/demo.min.js"></script>
    <?= $this->renderSection('scriptBottom'); ?>
    <script>
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

</body>

</html>