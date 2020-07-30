<?php
$role_id = $this->session->userdata('role_id');
if ($role_id == 2) {
    $nis = $this->session->userdata('email');
    $queryMenu = "SELECT `user_menu`.`id`,`menu`
                FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`role_id` = $role_id AND `user_access_menu`.`menu_id` NOT LIKE 7
                ORDER BY `user_access_menu`.`menu_id` ASC 
                ";

    $menu = $this->db->query($queryMenu)->result_array();
    //ambil data user
    $this->db->where('nis', $this->session->userdata('email'));
    $user = $this->db->get('88_siswa')->row();
} else {
    $queryMenu = "SELECT `user_menu`.`id`,`menu`
                FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`role_id` = $role_id AND `user_access_menu`.`menu_id` NOT LIKE 7
                ORDER BY `user_access_menu`.`menu_id` ASC 
                ";
    $menu = $this->db->query($queryMenu)->result_array();
    $nama = $this->session->userdata('name');
    $foto = $this->session->userdata('image');
    //ambil data user
    $this->db->where('email', $this->session->userdata('email'));
    $user = $this->db->get('user')->row();
}
//ambil data brand
$judul = $this->db->get_where('setting_dewe', ['nama_set' => 'judul_page'])->row();
?>



<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-success navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-slide="true" href="<?= base_url('auth/logout') ?>" role="button">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="<?= base_url('assets/sdit/') ?>logo2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text"><strong><?= $judul->nilai_set ?></strong></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/foto_user/') . $user->image ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $user->name ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <!-- LOOPING MENU -->
                    <?php foreach ($menu as $m) : ?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- <li class="nav-item">
                        <a href="<?= base_url('welcome') ?>" class="nav-link">
                            <i class="fas fa-home nav-icon"></i>
                            <p>Beranda</p>
                        </a>
                    </li> -->
                            <li class="nav-header text-secondary"><?= $m['menu']; ?></li>
                            <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                            <?php
                            $menuId = $m['id'];
                            $querySubMenu = "SELECT *
                               FROM `user_sub_menu` JOIN `user_menu` 
                                 ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                              WHERE `user_sub_menu`.`menu_id` = $menuId
                                AND `user_sub_menu`.`is_active` = 1
                        ";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                            ?>
                            <?php foreach ($subMenu as $sm) : ?>
                                <li class="nav-item <?php
                                                    if ($sm['sub_menu_id'] != 0) {
                                                        echo 'has-treeview';
                                                    } else {
                                                        echo '';
                                                    } ?> ">
                                    <a href="<?php
                                                if ($sm['sub_menu_id'] != 0) {
                                                    echo '#';
                                                } else {
                                                    echo base_url($sm['url']);
                                                } ?>" class="nav-link">
                                        <i class="nav-icon <?= $sm['icon']; ?>"></i>
                                        <p>
                                            <?= $sm['title']; ?>
                                            <i class="<?php
                                                        if ($sm['sub_menu_id'] != 0) {
                                                            echo 'right fas fa-angle-left';
                                                        } else {
                                                            echo '';
                                                        } ?> "></i>
                                        </p>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    <?php endforeach ?>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>