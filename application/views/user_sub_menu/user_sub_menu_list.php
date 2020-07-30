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
            <form action="<?php echo site_url('user_sub_menu/index'); ?>" class="form-inline" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                    <span class="input-group-btn">
                        <?php
                        if ($q <> '') {
                        ?>
                            <a href="<?php echo site_url('user_sub_menu'); ?>" class="btn btn-default">Reset</a>
                        <?php
                        }
                        ?>
                        <button class="btn btn-success btn-flat" type="submit">Search</button>
                        <?php echo anchor(site_url('user_sub_menu/create'), '+', 'class="btn btn-success btn-flat"'); ?>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover" style="margin-bottom: 10px">
            <tr>
                <th>Menu Id</th>
                <th>Title</th>
                <th>Url</th>
                <th>Icon</th>
                <th>Sub Menu id</th>
                <th>Is Active</th>
                <th>Action</th>
            </tr><?php
                    foreach ($user_sub_menu_data as $user_sub_menu) {
                    ?>
                <tr>
                    <td><?php echo $user_sub_menu->menu_id ?></td>
                    <td><?php echo $user_sub_menu->title ?></td>
                    <td><?php echo $user_sub_menu->url ?></td>
                    <td><?php echo $user_sub_menu->icon ?></td>
                    <td><?php echo $user_sub_menu->sub_menu_id ?></td>
                    <td><?php echo $user_sub_menu->is_active ?></td>
                    <td style="text-align:center" width="200px">
                        <?php
                        echo anchor(site_url('user_sub_menu/read/' . $user_sub_menu->id), '<button type="button" class="btn btn-outline-success btn-xs btn-flat"><i class="fas fa-search"></i></button>');
                        echo '  ';
                        echo anchor(site_url('user_sub_menu/update/' . $user_sub_menu->id), '<button type="button" class="btn btn-outline-success btn-xs btn-flat"><i class="fas fa-edit"></i></button>');
                        echo '  ';
                        echo anchor(site_url('user_sub_menu/delete/' . $user_sub_menu->id), '<button type="button" class="btn btn-outline-success btn-xs btn-flat"><i class="fas fa-trash"></i></button>', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
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