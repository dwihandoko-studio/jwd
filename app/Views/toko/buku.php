<?= $this->extend('templates/index-front'); ?>

<?= $this->section('content-front'); ?>

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
<?= $this->endSection(); ?>

<?= $this->section('scriptBottom'); ?>

<?= $this->endSection(); ?>