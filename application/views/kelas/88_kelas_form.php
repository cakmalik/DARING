
    <body>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="nama_kelas">Nama Kelas <?php echo form_error('nama_kelas') ?></label>
            <textarea class="form-control" rows="3" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas"><?php echo $nama_kelas; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Id Kelas <?php echo form_error('id_kelas') ?></label>
            <input type="text" class="form-control" name="id_kelas" id="id_kelas" placeholder="Id Kelas" value="<?php echo $id_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Walas <?php echo form_error('id_walas') ?></label>
            <input type="text" class="form-control" name="id_walas" id="id_walas" placeholder="Id Walas" value="<?php echo $id_walas; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kelas') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>