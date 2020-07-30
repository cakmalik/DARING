<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Total Mutabaah</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($datasiswa as $ds) : ?>
                        <!-- persiapkan data mutabaah yg nis = nis di mutabaah per siswa -->
                        <?php $dm = $this->db->get_where('99_mutabaah', ['nis' => $ds['nis']]); ?>
                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td class="text-left"><?= $ds['name'] ?></td>
                            <td><?= $dm->num_rows() ?></td>
                            <td>
                                <a href="<?= base_url('walas/mutabaahSiswa/' . $ds['nis']) ?>" class="btn btn-primary btn-sm">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>