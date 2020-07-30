<body>
    <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="int">Role Id <?php echo form_error('role_id') ?></label>
            <input type="text" class="form-control" name="role_id" id="role_id" placeholder="Role Id" value="<?php echo $role_id; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Menu Id <?php echo form_error('menu_id') ?></label>
            <input type="text" class="form-control" name="menu_id" id="menu_id" placeholder="Menu Id" value="<?php echo $menu_id; ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="javascript:window.history.go(-1);" class="btn btn-default">Cancel</a>
    </form>
</body>