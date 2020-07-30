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
            <button class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal-default">+ Tambah</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Sebagai</th>
                <th>Date Created</th>
                <th>Action</th>
            </tr>
            <?php
            $start = 0;
            foreach ($user_data as $user) {
            ?>
                <tr>
                    <td width="80px"><?php echo ++$start ?></td>
                    <td><?php echo $user->name ?></td>
                    <td><?php echo $user->email ?></td>
                    <td><?php echo $user->role ?></td>
                    <td><?= date('<b>H:i</b> | d M', $user->date_created); ?></td>
                    <td style="text-align:center" width="200px">
                        <?php
                        echo anchor(site_url('user/update/' . $user->id_u), '<button type="button" class="btn btn-outline-success btn-xs btn-flat"><i class="fas fa-edit"></i></button>');
                        echo '  ';
                        echo anchor(site_url('user/delete/' . $user->id_u), '<button type="button" class="btn btn-outline-success btn-xs btn-flat"><i class="fas fa-trash"></i></button>', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <br>

</body>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-head-fixed">
                    <tbody>
                        <form action="<?= base_url('auth/register') ?>" method="post">
                            <?= form_error('name', '<small class="text-danger pl-1">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username" value="<?= set_value('name') ?>" id="name" name="name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('email', '<small class="text-danger pl-1">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>" id="email" name="email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('password1', '<small class="text-danger pl-1">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-1">', '</small>') ?>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Retype password" id="password2" name="password2">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <?php $aa = $this->db->get('user_role')->result_array(); ?>
                            <div class="input-group mb-3">
                                <select class="form-control" name="role">
                                    <?php foreach ($aa as $r) : ?>
                                        <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-key"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->