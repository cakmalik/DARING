
    <body>
        <table class="table">
	    <tr><td>Id Guru</td><td><?php echo $id_guru; ?></td></tr>
	    <tr><td>Date Created</td><td><?php echo $date_created; ?></td></tr>
	    <tr><td>Judul</td><td><?php echo $judul; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td>Nama File</td><td><?php echo $nama_file; ?></td></tr>
	    <tr><td>Jenis File</td><td><?php echo $jenis_file; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('berkas_kita') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>