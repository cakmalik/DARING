<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">88_guru List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('aaaaaaa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('aaaaaaa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('aaaaaaa'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Guru</th>
		<th>Nama Guru</th>
		<th>Ttl</th>
		<th>Pendidikan Terakhir</th>
		<th>Tgl Mulai Kerja</th>
		<th>Jabatan</th>
		<th>Action</th>
            </tr><?php
            foreach ($aaaaaaa_data as $aaaaaaa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $aaaaaaa->id_guru ?></td>
			<td><?php echo $aaaaaaa->nama_guru ?></td>
			<td><?php echo $aaaaaaa->ttl ?></td>
			<td><?php echo $aaaaaaa->pendidikan_terakhir ?></td>
			<td><?php echo $aaaaaaa->tgl_mulai_kerja ?></td>
			<td><?php echo $aaaaaaa->jabatan ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('aaaaaaa/read/'.$aaaaaaa->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('aaaaaaa/update/'.$aaaaaaa->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('aaaaaaa/delete/'.$aaaaaaa->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>