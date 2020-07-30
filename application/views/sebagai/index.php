<script language="javascript">
    function submit_form() {
        document.formwalas.submit();
    }

    function apply_form() {
        document.formgulas.submit();
    }
</script>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php if ($this->uri->segment(3) == 'walas') : ?>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-walas">Update Walas</button>
            <?php else : ?>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modal-gulas">Update Gulas</button>
            <?php endif ?>
        </div>
    </div>
</div>

<section class="content ml-2">
    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kode</th>
                        <th>Unset</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($data_sebagai as $ds) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $ds['name'] ?></td>
                            <td><?= $ds['id_guru'] ?></td>
                            <td><a href="<?= base_url('sebagai/unset/' . $ds['id_guru'] . '/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-primary">Unset</a></td>
                        </tr>
                    <?php endforeach ?>
                </table>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</section>


<div class="modal fade" id="modal-walas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Walas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="formwalas" action="<?= base_url('sebagai/updatewalas') ?>" method="POST">
                    <div class="form-group">
                        <label for="kelas">Pilih Guru</label>
                        <select name="id_guru" id="kelas" class="form-control">
                            <?php foreach ($data_guru as $dg) : ?>
                                <option value="<?= $dg['id_guru'] ?>"><?= $dg['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="id_kelas" id="kelas" class="form-control">
                            <label for="kelas">Wali Kelas dari</label>
                            <?php foreach ($data_kelas as $dk) : ?>
                                <option value="<?= $dk['id_kelas'] ?>"><?= $dk['nama_kelas'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" onclick="submit_form()" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-gulas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Update Gulas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form name="formgulas" action="<?= base_url('sebagai/updateGulas') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kelas">Pilih Guru</label>
                        <select name="id_guru" id="kelas" class="form-control">
                            <?php foreach ($data_guru as $dg) : ?>
                                <option value="<?= $dg['id_guru'] ?>"><?= $dg['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <hr>Ngajar di Kelas
                        <hr>
                        <?php foreach ($data_kelas as $k) : ?>
                            <div class="form-group clearfix">
                                <div class="icheck-primary d-inline">
                                    <input type="checkbox" value="<?= $k['id_kelas'] ?>" name="id_kelas[]" id="kelas<?= $k['id_kelas'] ?>">
                                    <label for="kelas<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></label>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="apply_form()" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>