<body>
    <form action="<?php echo $action; ?>" method="post">

        <input type="hidden" class="form-control" name="id_guru" id="id_guru" placeholder="Id Guru" value="<?php echo $id_guru; ?>" />
        <input type="hidden" class="form-control" name="date_created" id="date_created" placeholder="Date Created" value="<?php echo $date_created; ?>" />
        <div class="form-group">
            <label for="varchar">Judul <?php echo form_error('judul') ?></label>
            <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Keterangan <?php echo form_error('keterangan') ?></label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </div>
        <input type="hidden" class="form-control" name="nama_file" id="nama_file" placeholder="Nama File" value="<?php echo $nama_file; ?>" />
        <input type="hidden" name="jenis_file" value="<?php echo $jenis_file; ?>"/>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('berkas_kita') ?>" class="btn btn-default">Cancel</a>
    </form>
</body>

</html>