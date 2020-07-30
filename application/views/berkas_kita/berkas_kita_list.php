
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            <a href="<?= base_url('berkas_kita/unggah') ?>" class="btn btn-primary">Unggah</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('berkas_kita/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('berkas_kita'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered text-left" style="margin-bottom: 10px">
            <tr  class="text-center">
                <th>Preview</th>
		<th>Oleh</th>
		<th>Tgl</th>
		<th>Judul</th>
		<th>Keterangan</th>
		<th>Action</th>
            </tr><?php
            foreach ($berkas_kita_data as $berkas_kita)
            {
                ?>
                <tr>
			<td><img width="80px" class="img-fluid" src="<?=base_url('assets/berkas_kita/'.$berkas_kita->nama_file)?>" alt=""></td>
			
			<?php $nama= $this->db->get_where('88_guru',['id_guru'=>$berkas_kita->id_guru])->row()?>
			
			<td><?=$nama->name?></td>
			<td><?php echo date('d/m/Y', $berkas_kita->date_created); ?></td>
			<td><?php echo $berkas_kita->judul ?></td>
			<td><?php echo $berkas_kita->keterangan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('assets/berkas_kita/'.$berkas_kita->nama_file),'Lihat'); 
				echo ' | '; 
				echo anchor(site_url('berkas_kita/update/'.$berkas_kita->id),'Edit'); 
				echo ' | '; 
				echo anchor(site_url('berkas_kita/hapus/'.$berkas_kita->id.'/berkas_kita'),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table></div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
   