
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
               
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('izin/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('izin'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-success btn-flat" type="submit">Search</button>
                           <?php echo anchor(site_url('izin/create'),'+', 'class="btn btn-success btn-flat"'); ?>
                        </span>
                    </div>
                </form>
            </div>
        </div>
	<div class="table-responsive">
        <table class="table table-hover" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nis</th>
		<th>Lapor</th>
		<th>Waktu Izin</th>
		<th>Rencana Kembali</th>
		<th>Waktu Kembali</th>
		<th>Action</th>
            </tr><?php
            foreach ($izin_data as $izin)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $izin->nis ?></td>
			<td><?php echo $izin->lapor ?></td>
			<td><?php echo $izin->waktu_izin ?></td>
			<td><?php echo $izin->rencana_kembali ?></td>
			<td><?php echo $izin->waktu_kembali ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('izin/read/'.$izin->id),'<button type="button" class="btn btn-outline-success btn-xs btn-flat"><i class="fas fa-search"></i></button>'); 
				echo '  '; 
				echo anchor(site_url('izin/update/'.$izin->id),'<button type="button" class="btn btn-outline-success btn-xs btn-flat"><i class="fas fa-edit"></i></button>'); 
				echo '  '; 
				echo anchor(site_url('izin/delete/'.$izin->id),'<button type="button" class="btn btn-outline-success btn-xs btn-flat"><i class="fas fa-trash"></i></button>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
            <div class="float-left">
                <a href="#" class="btn btn-sm btn-outline-success btn-flat">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="float-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </div>
    </body>