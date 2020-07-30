<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BAKID</title>
  <!-- Tell the browser to be responsive to screen wjquery-1idth -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte3/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte3/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte3/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="<?= base_url('assets/adminlte3/') ?>plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte3/') ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte3/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte3/') ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte3/') ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Favicon-->
  <link rel="icon" href="<?= base_url('assets') ?>/favicon.ico" type="image/x-icon">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/adminlte3/') ?>plugins/toastr/toastr.min.css">
  <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
  <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.jqueryui.min.css
">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.all.min.js"></script>

  <style>
    .ignielPelangi {
      background: linear-gradient(45deg, #f22613, #f89406, #26a65b, #5868ec, #f54e80, #f7ca18, #d2527f);
      background-size: 500% 500%;
      -webkit-animation: ignielGradient 12s ease infinite;
      -moz-animation: ignielGradient 12s ease infinite;
      animation: ignielGradient 12s ease infinite;
    }

    @-webkit-keyframes ignielGradient {
      0% {
        background-position: 0% 50%
      }

      50% {
        background-position: 100% 50%
      }

      100% {
        background-position: 0% 50%
      }
    }

    @-moz-keyframes ignielGradient {
      0% {
        background-position: 0% 50%
      }

      50% {
        background-position: 100% 50%
      }

      100% {
        background-position: 0% 50%
      }
    }

    @keyframes ignielGradient {
      0% {
        background-position: 0% 50%
      }

      50% {
        background-position: 100% 50%
      }

      100% {
        background-position: 0% 50%
      }
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-green navbar-dark ignielPelangi">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-slide="true" href="<?= base_url('welcome') ?>">
            <i class="fas fa-home"></i>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-slide="true" href="
          <?php if ($this->session->userdata['role_id'] == 15) {
            echo base_url('frontpendidik/logout');
          } else {
            echo base_url('auth/logout');
          } ?>
          ">
            <i class="fas fa-sign-out-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->