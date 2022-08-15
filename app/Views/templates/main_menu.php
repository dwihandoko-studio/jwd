<?php $uri = current_url(true); ?>
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="#">
                <h2><?= getenv('web.app') ? getenv('web.app') : 'ADMINISTRATOR' ?></h2>
            </a>
            <div class=" ml-auto ">
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <?php if ((int)$user->level == 1) : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "home") ? 'class="nav-link active" style="color: #00BCD4 !important"' : 'class="nav-link"'; ?> href="<?= base_url('admin/home'); ?>" role="button" aria-expanded="true">
                                <i class="fa fa-home text-primary"></i>
                                <span class="nav-link-text">Beranda</span>
                            </a>
                        </li>
                        <hr class="my-2">
                        <h6 class="navbar-heading pl-4 text-muted">
                            <span class="docs-normal">BUKU</span>
                        </h6>
                        <li class="nav-item">
                            <a <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "kategori") ? 'class="nav-link active" style="color: #00BCD4 !important"' : 'class="nav-link"'; ?> href="<?= base_url('admin/kategori') ?>">
                                <i class="ni ni-atom"></i>
                                <span class="nav-link-text">Kategori Buku</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link<?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "buku") ? '' : ' collapsed' ?>" href="#navbar-buku" data-toggle="collapse" role="button" aria-expanded="<?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "buku") ? 'true' : 'false' ?>" aria-controls="navbar-buku">
                                <i class="ni ni-single-copy-04" <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "buku") ? ' style="color: #00BCD4 !important"' : '' ?>></i>
                                <span class="nav-link-text" <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "buku") ? ' style="color: #00BCD4 !important"' : '' ?>>Buku</span>
                            </a>
                            <div class="collapse<?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "buku") ? ' show' : '' ?>" id="navbar-buku">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "buku"  && $uri->getSegment(3) == "add") ? 'class="nav-link active" style="color: #00BCD4 !important"' : 'class="nav-link"' ?> href="<?= base_url('admin/buku/add') ?>">
                                            <span class="sidenav-mini-icon"> TB </span>
                                            <span class="sidenav-normal"> Tambah Buku </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "buku"  && $uri->getSegment(3) == "data") ? 'class="nav-link active" style="color: #00BCD4 !important"' : 'class="nav-link"' ?> href="<?= base_url('admin/buku/data') ?>">
                                            <span class="sidenav-mini-icon"> DB </span>
                                            <span class="sidenav-normal"> Data Buku </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "pengguna") ? 'class="nav-link active" style="color: #00BCD4 !important"' : 'class="nav-link"'; ?> href="<?= base_url('admin/pengguna') ?>">
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-text">Pengguna</span>
                            </a>
                        </li>

                        <hr class="my-2">
                        <h6 class="navbar-heading pl-4 text-muted">
                            <span class="docs-normal">TRANSAKSI</span>
                        </h6>
                        <li class="nav-item">
                            <a class="nav-link<?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "orderan") ? '' : ' collapsed' ?>" href="#navbar-orderan" data-toggle="collapse" role="button" aria-expanded="<?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "orderan") ? 'true' : 'false' ?>" aria-controls="navbar-orderan">
                                <i class="ni ni-diamond" <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "orderan") ? ' style="color: #00BCD4 !important"' : '' ?>></i>
                                <span class="nav-link-text" <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "orderan") ? ' style="color: #00BCD4 !important"' : '' ?>>Orderan</span>
                            </a>
                            <div class="collapse<?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "orderan") ? ' show' : '' ?>" id="navbar-orderan">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "orderan"  && $uri->getSegment(3) == "baru") ? 'class="nav-link active" style="color: #00BCD4 !important"' : 'class="nav-link"' ?> href="<?= base_url('admin/orderan/baru') ?>">
                                            <span class="sidenav-mini-icon"> OB </span>
                                            <span class="sidenav-normal"> Orderan Baru </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "orderan"  && $uri->getSegment(3) == "all") ? 'class="nav-link active" style="color: #00BCD4 !important"' : 'class="nav-link"' ?> href="<?= base_url('admin/orderan/all') ?>">
                                            <span class="sidenav-mini-icon"> SO </span>
                                            <span class="sidenav-normal"> Semua Orderan </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <hr class="my-2">
                        <h6 class="navbar-heading pl-4 text-muted">
                            <span class="docs-normal">MESSAGE</span>
                        </h6>
                        <li class="nav-item">
                            <a <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "message"  && $uri->getSegment(3) == "baru") ? 'class="nav-link active" style="color: #00BCD4 !important"' : 'class="nav-link"'; ?> href="<?= base_url('admin/message/baru') ?>">
                                <i class="ni ni-chat-round"></i>
                                <span class="nav-link-text">Message Baru</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a <?= ($uri->getSegment(1) == "admin" && $uri->getSegment(2) == "message") ? 'class="nav-link active" style="color: #00BCD4 !important"' : 'class="nav-link"'; ?> href="<?= base_url('admin/message') ?>">
                                <i class="ni ni-folder-17"></i>
                                <span class="nav-link-text">Semua Pesan</span>
                            </a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>