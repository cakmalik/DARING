    <!-- Content Header (Page header) -->
    <style>
        #more {
            display: none;
        }
    </style>
    <script>
        $(document).ready(function() {
            var text_max = 20;
            $('#textarea_feedback').html(text_max + ' jumlah karakter');

            $('#judul').keyup(function() {
                var text_length = $('#judul').val().length;
                var text_remaining = text_max - text_length;

                $('#textarea_feedback').html(text_remaining + ' karakter tersisa');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var text_max = 100;
            $('#textarea_feedback').html(text_max + ' jumlah karakter');

            $('#ket').keyup(function() {
                var text_length = $('#ket').val().length;
                var text_remaining = text_max - text_length;

                $('#textarea_feedback').html(text_remaining + ' karakter tersisa');
            });
        });
    </script>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Unggah</button>
                <a href="<?= base_url('wamur/embed/' . $kategori) ?>" class="btn btn-primary ml-1">Embed</a>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class=" section">
        <div class=" jumbotron">
            <div class="row text-center">
                <?php foreach ($foto as $f) : ?>
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="card">
                            <!-- ganti nama youtube menjadi embed -->
                            <?php $yt = str_replace('youtu.be/', 'youtube.com/embed/', $f['nama_file']);
                            ?>

                            <?php
                            $jenis = substr($f['nama_file'], -3);
                            if ($jenis == 'jpg' or $jenis == 'jpeg' or $jenis == 'png') {
                                $nama_file = $f['nama_file'];
                            } else if ($jenis == 'mp3' or $jenis == 'm4a' or $jenis == 'mav') {
                                $nama_file = 'musik.jpg';
                            } else if ($jenis == 'mp4') {
                                $nama_file = 'video.jpg';
                            } else if ($jenis == 'mbd') {
                                $nama_file = '<iframe width="auto" height="auto" src="https://youtube.com/embed/MTKUFLty8hQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            } else {
                                $nama_file = 'dokumen.png';
                            }
                            var_dump($nama_file);
                            die;
                            ?>


                            <?php if ($f['nama_file'] != NULL) : ?>
                                <iframe width="auto" height="auto" src="<?= $yt ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <?php else : ?>
                                <img src="<?= base_url('assets/' . $kategori . '/' . $nama_file) ?>" class="card-img-top thumbnail rounded" height="200px" width="auto">
                            <?php endif ?>


                            <div class="card-body">
                                <h5 class="card-title"><strong><?= $f['judul'] ?></strong></h5><br>
                                <?php $ket =  $f['keterangan'];
                                $ket = character_limiter($ket, 100) ?>
                                <p class="card-left text-left"><?= $ket ?></p>
                                <a href="<?= base_url('assets/' . $kategori . '/' . $f['nama_file'])  ?>" class="btn btn-primary"><i class="fas fa-search-plus"></i></a>
                                <a href="<?= base_url('wamur/edit/' . $f['id'] . '/' . $kategori)  ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('wamur/hapus/' . $f['id'] . '/' . $kategori)  ?>" class="btn btn-primary" onclick="return confirm('Yakin mau hapus buang aku bos?');"><i class="fas fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </section>



    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Media</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open_multipart('wamur/aksi_upload/' . $this->uri->segment(2)) ?>
                    <div class="form-group">
                        <input id="judul" type="text" class="form-control" name="judul" placeholder="Judul" maxlength="20">
                    </div>
                    <div class="form-group">
                        <input id="ket" type="text" class="form-control" name="keterangan" placeholder="Keterangan (Max:100)" maxlength="100">
                    </div>
                    <div id="textarea_feedback"></div><br>
                    <div class="form-group">
                        <input type="file" name="image">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 pl-3">
                        <p style="color: red">
                            * Media diterima : all <br>
                            * Dok. diterima : all <br>
                            * Max Size : 20MB
                        </p>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                    <?php form_close() ?>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>