<section class=" section">
    <div class=" jumbotron">
        <div class="row text-center">
            <?php foreach ($foto as $f) : ?>
                <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="card">
                        <?php
                        $jenis = substr($f['nama_file'], -3);
                        if ($jenis == 'jpg' or $jenis == 'jpeg' or $jenis == 'png') {
                            $nama_file = $f['nama_file'];
                        } else if ($jenis == 'mp3' or $jenis == 'm4a' or $jenis == 'mav') {
                            $nama_file = 'musik.jpg';
                        } else if ($jenis == 'mp4') {
                            $nama_file = 'video.jpg';
                        } else {
                            $nama_file = 'dokumen.png';
                        }
                        ?>
                        <img src="<?= base_url('assets/' . $kategori . '/' . $nama_file) ?>" class="card-img-top thumbnail rounded" height="200px" width="auto">
                        <div class="card-body">
                            <span class="text-left"></span><br>
                            <h5 class="card-title text-center"><strong><?= $f['judul'] ?></strong></h5><br>
                            <?php $ket =  $f['keterangan'];
                            $ket = character_limiter($ket, 100) ?>
                            <p class="card-left text-left"><?= date('d/m/Y', $f['date_created']) ?><br><?= $ket ?></p>
                            <a href="<?= base_url('assets/' . $kategori . '/' . $f['nama_file'])  ?>" class="btn btn-primary"><i class="fas fa-search-plus"></i></a>
                            <a href="<?= base_url('walas/edit/' . $f['id'] . '/' . $kategori)  ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url('walas/hapus/' . $f['id'] . '/' . $kategori)  ?>" class="btn btn-primary" onclick="return confirm('Yakin mau hapus buang aku bos?');"><i class="fas fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>

</section>