<?= $this->extend('templates/index-front'); ?>

<?= $this->section('content-front'); ?>

<section class="section-header pb-10 bg-primary text-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 text-center">
                <h1 class="display-1 mb-4">Checkout</h1>
            </div>
        </div>
    </div>
</section>
<section class="section section-sm mt-n9">
    <div class="container">
        <div class="row align-items-start justify-content-around">
            <form action="./checkout-completed.html" class="col-12">
                <div class="card bg-soft border-light p-3 mb-4">
                    <div class="card-body px-2 px-lg-4 py-4">
                        <h4 class="mb-4 mb-lg-5">Pesanan Kamu</h4>
                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="card-body">
                                    <ul class="list-group list-group-flush list my--3">
                                        <?php if (isset($pesanans)) {
                                            if (count($pesanans) > 0) {
                                                foreach ($pesanans as $key => $pes) { ?>
                                                    <li class="list-group-item px-0">
                                                        <div class="row align-items-center loading-change-item-<?= $pes->cid ?>">
                                                            <div class="col-auto"> <a href="#" class="avatar rounded-circle"><img width="80px" height="130px" alt="Image placeholder" src="<?= base_url('uploads/buku') . '/' . $pes->gambar ?>"></a></div>
                                                            <div class="col ml--2">
                                                                <h4 class="mb-0"><a href="#!"><?= $pes->nama_buku ?></a></h4><span class="text-success"><?= Rupiah($pes->harga) ?></span>
                                                                <br />
                                                                <span style="margin: 0 10px; padding: 0 5px;"><a href="javascript:aksiUbahItem('<?= $pes->cid ?>', 'kurang');" class="btn btn-outline-default btn-sm rounded-circle"><span class="btn-inner--icon"><i class="fas fa-minus"></i></span></a></span>
                                                                <span style="border: 1px solid blue; padding: 0 5px;" class="jumlah-item-<?= $pes->cid ?>" id="jumlah-item"><?= $pes->quantiti ?> PCS</span>
                                                                <span style="margin: 0 10px; padding: 0 5px;"><a href="javascript:aksiUbahItem('<?= $pes->cid ?>', 'tambah');" class="btn btn-outline-default btn-sm rounded-circle"><span class="btn-inner--icon"><i class="fas fa-plus"></i></span></a></span>
                                                            </div>
                                                            <div class="col-auto"><button type="button" onclick="aksiHapusItem('<?= $pes->cid ?>', '<?= $pes->nama_buku ?>')" class="btn btn-sm btn-danger"><i class="fas fa-trash"> </i> Hapus</button></div>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <li class="list-group-item px-0">
                                                    <div class="row align-items-center">
                                                        <div class="col ml--2">
                                                            <h4 class="mb-0">Belum ada data.</h4>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <li class="list-group-item px-0">
                                                <div class="row align-items-center">
                                                    <div class="col ml--2">
                                                        <h4 class="mb-0">Belum ada data.</h4>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <hr />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card bg-soft border-light p-3 mb-4">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="bg-light border-top">
                                    <tr>
                                        <th scope="row" class="border-0 text-left">Item</th>
                                        <th scope="row" class="border-0">Price</th>
                                        <th scope="row" class="border-0">Qty</th>
                                        <th scope="row" class="border-0">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($pesanans)) {
                                        if (count($pesanans) > 0) {
                                            foreach ($pesanans as $key => $pesDet) { ?>
                                                <tr>
                                                    <th scope="row" class="text-left font-weight-bold h6"><?= $pesDet->nama_buku ?></th>
                                                    <td><?= Rupiah($pesDet->harga) ?></td>
                                                    <td><?= $pesDet->quantiti ?></td>
                                                    <td><?= Rupiah((int)$pesDet->harga * (int)$pesDet->quantiti) ?></td>
                                                </tr>
                                            <?php } ?>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end text-right mb-4 py-4 border-bottom">
                            <div class="mt-4">
                                <table class="table table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left"><strong>Subtotal</strong></td>
                                            <td class="right">$8.497,00</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Discount (20%)</strong></td>
                                            <td class="right">$1,699,40</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>VAT (10%)</strong></td>
                                            <td class="right">$679,76</td>
                                        </tr>
                                        <tr>
                                            <td class="left"><strong>Total</strong></td>
                                            <td class="right"><strong>$7.477,36</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-9 mb-3 mb-lg-0">
                        &nbsp;
                    </div>
                    <div class="col-12 col-lg-3 text-center mb-4 mb-lg-0"><button type="button" class="btn btn-block btn-primary font-weight-bold">Pay $99</button></div>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>

<?= $this->section('scriptBottomFront'); ?>
<script>
    function reloadPage(action = "") {
        if (action === "") {
            document.location.href = "<?= current_url(true); ?>";
        } else {
            document.location.href = action;
        }
    }

    function aksiHapusItem(id, title) {
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus buku ini dari keranjang belanja?',
            text: "Hapus buku : " + title + " dari keranjang",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url('toko/cart/hapus') ?>",
                    type: 'POST',
                    data: {
                        id: id,
                        title: title
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
                            reloadPage();
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
        })
    }

    function aksiUbahItem(id, aksi) {
        $.ajax({
            url: "<?= base_url('toko/buku/ubahitemcart') ?>",
            type: 'POST',
            data: {
                id: id,
                aksi: aksi
            },
            dataType: 'JSON',
            beforeSend: function() {
                $('div.loading-change-item-' + id).block({
                    message: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                });
            },
            success: function(resul) {
                $('div.loading-change-item-' + id).unblock();

                if (resul.status !== 200) {
                    Swal.fire(
                        'Failed!',
                        resul.message,
                        'warning'
                    );
                } else {
                    $('.jumlah-item-' + id).html(resul.data.quantiti + " PCS");
                }
            },
            error: function() {
                $('div.loading-change-item-' + id).unblock();
                Swal.fire(
                    'Failed!',
                    "Trafik sedang penuh, silahkan ulangi beberapa saat lagi.",
                    'warning'
                );
            }
        });
        // jumlah-item
    }
</script>
<?= $this->endSection(); ?>