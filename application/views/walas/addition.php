<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Total File</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($datasiswa as $ds) : ?>

                        <tr class="text-center">
                            <td><?= $no++ ?></td>
                            <td class="text-left"><?= $ds['name'] ?></td>
                            <td>
                                <?php $tbl = '99_' . $kategori;
                                $a = $this->db->get_where($tbl, ['id_siswa' => $ds['nis']])->num_rows();
                                echo $a; ?>
                            </td>
                            <td><a href="<?= base_url('walas/detailADD/' . $ds['nis'] . '/' . $kategori) ?>" class="btn btn-primary btn-sm">Lihat</a></td>
                        </tr>
                    <?php endforeach ?>

                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>