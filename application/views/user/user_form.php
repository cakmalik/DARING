<body>
    <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Name <?php echo form_error('name') ?></label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>

        <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Role Id <?php echo form_error('role_id') ?></label>
            <?php $role = $this->db->get('user_role')->result_array(); ?>
            <select class="form-control" name="role_id" id="role_id">
                <option value="<?= $role_id; ?>"><?php echo $role_id; ?> (Terpilih)</option>
                <?php foreach ($role as $r) : ?>
                    <option value="<?= $r['id'] ?>"><?= $r['id'] . ' | ' . $r['role'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="int">Is Active <?php echo form_error('is_active') ?></label>
            <input type="text" class="form-control" name="is_active" id="is_active" placeholder="Is Active" value="<?php echo $is_active; ?>" />
        </div>
        <!-- <div class="form-group">
            <label for="int">Date Created <?php echo form_error('date_created') ?></label>
            <input type="text" class="form-control" name="date_created" id="date_created" placeholder="Date Created" value="<?php echo $date_created; ?>" />
        </div> -->
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="javascript:window.history.go(-1);" class="btn btn-default">Cancel</a>
    </form>
</body>