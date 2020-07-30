<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($listmutabaahsiswa as $lms) : ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td><?= date('d F Y', strtotime($lms['date_created'])) ?></td>
                            <td><a href="<?= base_url('Mutabaah/cekDetail/' . $lms['id']) ?>" class="btn btn-primary btn-sm">Lihat</a></td>
                        </tr>
                    <?php endforeach ?>

                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>