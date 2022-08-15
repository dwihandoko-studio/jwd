<?= $this->extend('templates/index-front'); ?>

<?= $this->section('content-front'); ?>
<section class="section-header bg-primary text-white pb-9 pb-lg-13 mb-4 mb-lg-6">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <h1 class="display-2 mb-3">HUBUNGI KAMI<br /><?= $toko->nama_toko ?></h1>
            </div>
        </div>
    </div>
    <div class="pattern bottom"></div>
</section>
<div class="section section-lg pt-0">
    <div class="container mt-n8 mt-lg-n13 z-2">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card border-light shadow-soft p-2 p-md-4 p-lg-5">
                    <div class="card-body">
                        <form action="<?= base_url('toko/about/post') ?>" method="post">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group"><label class="form-label text-dark" for="firstNameLabel">Nama Lengkap <span class="text-danger">*</span></label>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-alt"></i></span></div><input class="form-control" id="_fullname" name="_fullname" placeholder="Nama lengkap...." type="text" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group"><label class="form-label text-dark" for="EmailLabel">Email <span class="text-danger">*</span></label>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div><input class="form-control" id="_email" name="_email" placeholder="example@company.com" type="email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group"><label class="form-label text-dark" for="phonenumberLabel">No Telp.<span class="text-danger">*</span></label>
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span></div><input class="form-control" id="_no_hp" name="_no_hp" placeholder="(555) 555-1234" type="number" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="form-group"><label class="form-label text-dark" for="phonenumberLabel">How can we help you?<span class="text-danger">*</span></label> <textarea class="form-control" placeholder="Hi KNT, apa yang bisa kami bantu ..." id="_message" name="_message" rows="8" required></textarea></div>
                                    <div class="text-center"><button type="submit" class="btn btn-secondary mt-4 animate-up-2"><span class="mr-2"><i class="fas fa-paper-plane"></i></span>Send Message</button></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section section-lg pt-0 line-bottom-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 text-center px-4 mb-5 mb-lg-0">
                <div class="icon icon-sm icon-shape icon-shape-primary rounded mb-4"><i class="fas fa-envelope-open-text"></i></div>
                <h5 class="mb-3">Via Email</h5>
                <a class="font-weight-bold text-primary" href="#"><?= $toko->email ?></a>
            </div>
            <div class="col-12 col-md-4 text-center px-4 mb-5 mb-lg-0">
                <div class="icon icon-sm icon-shape icon-shape-primary rounded mb-4"><i class="fas fa-phone-volume"></i></div>
                <h5 class="mb-3">Via Telp</h5>
                <a class="font-weight-bold text-primary" href="#"><?= $toko->no_telp_toko ?></a>
            </div>
            <div class="col-12 col-md-4 text-center px-4">
                <div class="icon icon-sm icon-shape icon-shape-primary rounded mb-4"><i class="fas fa-headset"></i></div>
                <h5 class="mb-3">Alamat</h5>
                <p><?= $toko->alamat_toko ?></p><a class="btn btn-sm btn-outline-primary" href="#">Kode Pos : <?= $toko->kode_pos ?></a>
            </div>
        </div>
    </div>
</div>
<section class="section section-lg pb-5 bg-soft">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <?= $toko->lokasi_toko ?>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('scriptBottom'); ?>

<?= $this->endSection(); ?>