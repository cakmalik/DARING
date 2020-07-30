<body>
    <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Menu <?php echo form_error('menu') ?></label>
            <input type="text" class="form-control" name="menu" id="menu" placeholder="Menu" value="<?php echo $menu; ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="javascript:window.history.go(-1);" class="btn btn-default">Cancel</a>
    </form>
</body>