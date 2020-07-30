<?php
$this->load->view('temp/header');
$this->load->view('temp/sidebar');

$jdl = str_replace('_', ' ', $judul); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
            </div>
        </div>
    </section>
 -->

    <!-- Main content -->
    <section class="content mt-3">
        <!-- bagian pesan -->
        <?php echo $this->session->flashdata('pesan'); ?>

        <!-- Default box -->
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="card-title"> <?= $jdl ?></h3>
                <div class="card-tools">

                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">
                <?php $this->load->view($content); ?>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
$this->load->view('temp/footer');
?>