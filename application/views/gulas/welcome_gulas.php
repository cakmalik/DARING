<?php $this->load->view('temp/header') ?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pilih kelas</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php
            //pecah array
            $id_k = explode(',', $list_kelas);
            //looping array
            for ($i = 0; $i < count($id_k); $i++) : ?>
                <!-- buat pengulangan ambil data kelas -->
                <?php $dk = $this->db->get_where('88_kelas', ['id_kelas' => $id_k[$i]])->row() ?>
                <div class="col-md-4">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h5> Kelas </h5>
                            <h3> <?= $dk->nama_kelas ?></h3>
                        </div>
                        <div class="icon">
                            <i class="fas fa-school"></i>
                        </div>
                        <a href="<?= base_url('gulas/lihatkelas/' . $id_k[$i]) ?>" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            <?php endfor ?>

        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php $this->load->view('temp/footer') ?>