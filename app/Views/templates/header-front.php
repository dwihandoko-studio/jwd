<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg headroom py-lg-3 px-lg-6 navbar-dark navbar-theme-primary">
        <div class="container">
            <a class="navbar-brand @@logo_classes" href="<?= base_url('home') ?>">
                <img class="navbar-brand-dark common" src="<?= base_url() ?>/assets/knt.png" height="35" alt="Logo light"> <img class="navbar-brand-light common" src="<?= base_url() ?>/assets/knt.png" height="35" alt="Logo dark"></a>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/knt.png" height="35" alt="Logo Impact"></a></div>
                        <div class="col-6 collapse-close"><a href="#navbar_global" role="button" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"></a></div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover justify-content-center">

                    <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" aria-expanded="false" data-toggle="dropdown"><span class="nav-link-inner-text mr-1">Koleksi Buku</span> <i class="fas fa-angle-down nav-link-arrow"></i></a>
                        <div class="dropdown-menu dropdown-menu-lg">
                            <div class="col-auto px-0" data-dropdown-content>
                                <div class="list-group list-group-flush">
                                    <a href="<?= base_url('toko/buku') ?>" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                                        <div class="ml-4">
                                            <span class="text-dark d-block">SEMUA KATEGORI</span>
                                        </div>
                                    </a>
                                    <?php if (isset($kategories)) {
                                        if (count($kategories) > 0) {
                                            foreach ($kategories as $key => $value) { ?>
                                                <a href="<?= base_url('toko/buku') . '?categori=' . $value->kid ?>" class="list-group-item list-group-item-action d-flex align-items-center p-0 py-3 px-lg-4">
                                                    <div class="ml-4">
                                                        <span class="text-dark d-block"><?= $value->kategori ?></span>
                                                    </div>
                                                </a>
                                    <?php }
                                        }
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item"><a href="<?= base_url('toko/about') ?>" class="nav-link">About US</a></li>
                </ul>
            </div>
            <div class="d-none d-lg-block @@cta_button_classes">
                <a href="#" class="btn btn-secondary animate-up-2" data-toggle="modal" data-target=".pricing-modal">
                    <i class="fas fa-search"></i> Search</a>
                <a href="<?= base_url('toko/cart') ?>" class="btn btn-md btn-outline-white animate-up-2 mr-3">
                    <i class="fas fa-shopping-bag mr-1">12</i> Keranjang
                </a> <?php if (isset($user_login)) { ?>
                    <a href="#" class="btn btn-md btn-secondary animate-up-2 tombol-logout"><i class="fas fa-power-off mr-2"></i> Logout</a>
                <?php } else { ?><a href="<?= base_url('auth') ?>" class="btn btn-md btn-secondary animate-up-2"><i class="fas fa-user mr-2"></i> Login</a>
                <?php } ?>
            </div>
            <div class="d-flex d-lg-none align-items-center"><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button></div>
        </div>
    </nav>
</header>
<div id="pricing-modal" class="modal fade pricing-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content py-4">
            <form action="<?= base_url('toko/buku') ?>" method="GET" id="navbar-search-main">
                <div class="px-3">
                    <div class="col-12 d-flex justify-content-end d-lg-none"><i class="fas fa-times" data-dismiss="modal" aria-label="Close"></i></div>
                </div>
                <div class="modal-header text-center text-black">
                    <div class="col-12">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-search"></i></span></div><input class="form-control" id="keyword" name="keyword" placeholder="Search" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 text-center">
                    <div class="col text-gray">
                        <button type="submit" class="btn btn-primary mb-4">Search</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>