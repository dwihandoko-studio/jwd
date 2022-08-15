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


    <link href="<?= base_url() ?>/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />

    <script src="<?= base_url() ?>/assets/js/fontawesomekit.js" crossorigin="anonymous"></script>
    <link href="<?= base_url() ?>/assets/css/nucleo-svg.css" rel="stylesheet" />

    <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.min.css?v=1.0.9" rel="stylesheet" />
    <?= $this->renderSection('scriptTop'); ?>
</head>

<body class="<?= isset($admin) ? "g-sidenav-show  bg-gray-100" : "bg-white" ?> loading-content">
    <?= $this->renderSection('content'); ?>
    <script src="<?= base_url() ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/smooth-scrollbar.min.js"></script>

    <script src="<?= base_url() ?>/assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/jkanban/jkanban.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>


    <script src="<?= base_url() ?>/assets/js/jquery-block-ui.js"></script>
    <script src="<?= base_url() ?>/assets/js/plugins/sweetalert.min.js"></script>
    <?= $this->renderSection('scriptBottom'); ?>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="<?= base_url() ?>/assets/js/soft-ui-dashboard.min.js?v=1.0.9"></script>
</body>

</html>