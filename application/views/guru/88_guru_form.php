
    <body>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Guru <?php echo form_error('id_guru') ?></label>
            <input type="text" class="form-control" name="id_guru" id="id_guru" placeholder="Id Guru" value="<?php echo $id_guru; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ttl <?php echo form_error('ttl') ?></label>
            <input type="text" class="form-control" name="ttl" id="ttl" placeholder="Ttl" value="<?php echo $ttl; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pendidikan Terakhir <?php echo form_error('pendidikan_terakhir') ?></label>
            <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="Pendidikan Terakhir" value="<?php echo $pendidikan_terakhir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tgl Mulai Kerja <?php echo form_error('tgl_mulai_kerja') ?></label>
            <input type="text" class="form-control" name="tgl_mulai_kerja" id="tgl_mulai_kerja" placeholder="Tgl Mulai Kerja" value="<?php echo $tgl_mulai_kerja; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jabatan <?php echo form_error('jabatan') ?></label>
            <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan" value="<?php echo $jabatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Role Id <?php echo form_error('role_id') ?></label>
            <input type="text" class="form-control" name="role_id" id="role_id" placeholder="Role Id" value="<?php echo $role_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Image <?php echo form_error('image') ?></label>
            <input type="text" class="form-control" name="image" id="image" placeholder="Image" value="<?php echo $image; ?>" />
        </div>
	    <div class="form-group">
            <label for="id_kelas">Id Kelas <?php echo form_error('id_kelas') ?></label>
            <textarea class="form-control" rows="3" name="id_kelas" id="id_kelas" placeholder="Id Kelas"><?php echo $id_kelas; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="password">Password <?php echo form_error('password') ?></label>
            <textarea class="form-control" rows="3" name="password" id="password" placeholder="Password"><?php echo $password; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('guru') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>