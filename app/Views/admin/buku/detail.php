<?php if (isset($data)) { ?>
    <div class="modal-body" style="padding-top: 0px; padding-bottom: 0px;">
        <div class="row col-md-12">
            <div class="col-md-6">
                <div class="form-group _kategori-block">
                    <label for="_kategori" class="form-control-label">Kategori Buku</label>
                    <input type="text" class="form-control pengarang" id="_pengarang" name="_pengarang" value="<?= $data->kategori ?>" onFocus="inputFocus(this);" readonly />
                </div>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-6">
                <div class="form-group _nama_buku-block">
                    <label for="_nama_buku" class="form-control-label">Nama Buku</label>
                    <input type="text" class="form-control pengarang" id="_pengarang" name="_pengarang" value="<?= $data->nama_buku ?>" onFocus="inputFocus(this);" readonly />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group _pengarang-block">
                    <label for="_pengarang" class="form-control-label">Pengarang</label>
                    <input type="text" class="form-control pengarang" id="_pengarang" name="_pengarang" value="<?= $data->pengarang ?>" onFocus="inputFocus(this);" readonly />
                </div>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-4">
                <div class="form-group _tahun-block">
                    <label for="_tahun" class="form-control-label">Tahun Terbit</label>
                    <input type="text" class="form-control pengarang" id="_pengarang" name="_pengarang" value="<?= $data->tahun_terbit ?>" onFocus="inputFocus(this);" readonly />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group _harga-block">
                    <label for="_harga" class="form-control-label">Harga</label>
                    <input type="text" class="form-control pengarang" id="_pengarang" name="_pengarang" value="<?= $data->harga ?>" onFocus="inputFocus(this);" readonly />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group _quantiti-block">
                    <label for="_quantiti" class="form-control-label">Quantiti</label>
                    <input type="text" class="form-control pengarang" id="_pengarang" name="_pengarang" value="<?= $data->stok ?>" onFocus="inputFocus(this);" readonly />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <label>Deskripsi</label>
            <div class="form-group _deskripsi-block">
                <textarea class="form-control deskripsi" id="_deskripsi" name="_deskripsi" rows="5" onFocus="inputFocus(this);" placeholder="Deskripsi . . ." readonly><?= $data->deskripsi ?></textarea>
                <div class="help-block _deskripsi"></div>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-6">
                <label>&nbsp;</label>
                <div class="form-group">
                    <div class="preview-image-upload">
                        <img src="<?= $data->gambar !== null ? base_url('uploads/buku') . '/' . $data->gambar : base_url('new-assets/placeholder.png') ?>" class="imagePreviewUpload" alt="place" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
    </div>

<?php } ?>