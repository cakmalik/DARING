<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" />
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet" /> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?= base_url('assets/adminlte34') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<?php $jml_muta = $this->db->get('99_kategori_mutabaah')->num_rows() ?>

<body>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-4"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                yuk Mutabaah
            </button>
        </div>

        <div class="col-md-4 text-right">
            <!-- tombol -->
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Dikerjakan</th>
                <th>Dilupakan</th>
                <th>Detail</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($data_mutabaah as $dm) : ?>
                <!-- coba pecahkan array  -->
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= date('d F Y', strtotime($dm['date_created'])); ?></td>
                    <td> <?php
                            $id_kt = explode(',', $dm['id_kategori']);
                            $jml_muta_today =  count($id_kt);
                            echo $jml_muta_today;
                            ?></td>
                    <td><?php echo $jml_muta - $jml_muta_today ?></td>
                    <td>
                        <a href="<?= base_url('mutabaah/cekDetail/' . $dm['id']) ?>" class="badge badge-primary">Detail</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

<!-- modal tambah mutabaah -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">BISMILLAH</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('mutabaah/inputMutabaah') ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="datepicker">Tanggal</label>
                            <input type="text" name="date_created" class="form-control" id="datepicker" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <?php $kategori = $this->db->get('99_kategori_mutabaah')->result_array() ?>
                        <?php foreach ($kategori as $k) : ?>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" value="<?= $k['id_kategori'] ?>" name="id_kategori[]" id="kategori<?= $k['id'] ?>">
                                    <label for="kategori<?= $k['id'] ?>"><?= $k['nama_kategori'] ?></label>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
            <?php form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    var currentDate = new Date();
    $('#datepicker').datepicker("setDate", currentDate);
</script>

<?php if ($this->session->flashdata('gagal')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'MAAF',
            text: 'Data tanggal tersebut sudah ada',
            showConfirmButton: true,
            // timer: 2500
        })
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('berhasil')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'YEEEEES',
            text: 'Data Mutabaah Berhasil di Input loh',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php endif; ?>