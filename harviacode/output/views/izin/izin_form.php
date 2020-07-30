
    <body>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nis <?php echo form_error('nis') ?></label>
            <input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Lapor <?php echo form_error('lapor') ?></label>
            <input type="text" class="form-control" name="lapor" id="lapor" placeholder="Lapor" value="<?php echo $lapor; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Waktu Izin <?php echo form_error('waktu_izin') ?></label>
            <input type="text" class="form-control" name="waktu_izin" id="waktu_izin" placeholder="Waktu Izin" value="<?php echo $waktu_izin; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Rencana Kembali <?php echo form_error('rencana_kembali') ?></label>
            <input type="text" class="form-control" name="rencana_kembali" id="rencana_kembali" placeholder="Rencana Kembali" value="<?php echo $rencana_kembali; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Waktu Kembali <?php echo form_error('waktu_kembali') ?></label>
            <input type="text" class="form-control" name="waktu_kembali" id="waktu_kembali" placeholder="Waktu Kembali" value="<?php echo $waktu_kembali; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('izin') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>