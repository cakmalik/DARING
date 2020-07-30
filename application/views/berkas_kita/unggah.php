<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <?= form_open_multipart('berkas_kita/aksi_upload') ?>
                <div class="form-group">
                    <input id="judul" type="text" class="form-control" name="judul" placeholder="Judul" maxlength="20">
                </div>
                <div class="form-group">
                    <input id="ket" type="text" class="form-control" name="keterangan" placeholder="Keterangan (Max:100)" maxlength="100">
                </div>
                Ukuran Max : 50 MB
                <div id="textarea_feedback"></div><br>
                <div class="form-group">
                    <input type="file" name="image">
                </div>
            </div>
            <div class="row">
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <?php form_close() ?>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>