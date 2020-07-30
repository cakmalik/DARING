<?php $this->load->view('temp/header') ?>
<?php $this->load->view('temp/sidebar') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <?= form_open_multipart('walas/editAction/' . $ediD->id . '/' . $kategori) ?>
    <section class="content ml-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Judul :</label>
                        <input class="form-control" name="judul" type="text" value="<?= $ediD->judul ?>" placeholder="judul" maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan :</label>
                        <input class="form-control" name="keterangan" type="text" value="<?= $ediD->keterangan ?>" placeholder="keterangan" maxlength="200">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <?php form_close() ?>
    <?php $this->load->view('temp/footer') ?>