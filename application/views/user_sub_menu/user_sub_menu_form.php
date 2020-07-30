<?php $Menu = $this->db->get('user_menu')->result(); ?>

<body>
    <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="int">Sub Menu dari <?php echo form_error('menu_id') ?></label>
            <select class="form-control" name="menu_id">
                <option value="<?php echo $menu_id; ?>"><?php echo $menu_id; ?></option>
                <?php foreach ($Menu as $m) : ?>
                    <option value="<?= $m->id ?>"><?= $m->id . ' | ' . $m->menu ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="varchar">Title <?php echo form_error('title') ?></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Url <?php echo form_error('url') ?></label>
            <input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Icon <?php echo form_error('icon') ?></label>
            <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" />
        </div>
        <?php
        $this->db->select_max('sub_menu_id');
        $x = $this->db->get('user_sub_menu')->row();
        $smi = $x->sub_menu_id + 1;
        ?>
        <div class="form-group">
            <label for="sub_menu_id">Sub Menu Id <?php echo form_error('sub_menu_id') ?></label>
            <input class="form-control" rows="3" name="sub_menu_id" id="sub_menu_id" placeholder="Sub Menu Id" value="<?= $smi ?>"></input>
        </div>
        <input type="hidden" name="is_active" id="is_active" value="1" />
        <input type="hidden" name="id_sub" value="0" />

        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="javascript:window.history.go(-1);" class="btn btn-default">Cancel</a>
    </form>
</body>