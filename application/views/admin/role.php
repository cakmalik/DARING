     <!-- Content Wrapper. Contains page content -->
     <section class="content-wrapper">
         <!-- Content Header (Page header) -->
         <div class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1 class="m-0 text-dark">Dashboard</h1>
                     </div><!-- /.col -->
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item active">Bakid</li>
                         </ol>
                     </div><!-- /.col -->
                 </div><!-- /.row -->
             </div><!-- /.container-fluid -->
         </div>
         <!-- /.content-header -->

         <!-- Main content -->
         <section class="content">
             <section class="container-fluid">
                 <!-- Small boxes (Stat box) -->
                 <!-- /.row -->

                 <div class="row">
                     <div class="col-12">
                         <div class="card">
                             <div class="card-header">
                                 <h3 class="card-title"><?= $user['name'] ?></h3>

                                 <div class="card-tools">
                                     <?= form_open_multipart('admin/addRole') ?>
                                     <div class="input-group input-group-sm" style="width: 150px;">
                                         <input type="text" name="role" class="form-control float-right" placeholder="Tambah">
                                         <div class="input-group-append">
                                             <button type="submit" class="btn btn-default"><i class="fas fa-plus"></i></button>
                                         </div>
                                     </div>
                                     <?php form_close() ?>
                                 </div>
                             </div>
                             <!-- /.card-header -->
                             <div class="card-body table-responsive p-0" style="height: 500px;">
                                 <table class="table table-head-fixed">
                                     <thead>
                                         <tr>
                                             <th>ID ROLE</th>
                                             <th>ROLE</th>
                                             <th>AKSI</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $i = 1;
                                            ?>
                                         <?php foreach ($role as $r) : ?>
                                             <tr>
                                                 <td><?= $r['id'] ?></td>
                                                 <td><?= $r['role']; ?></td>
                                                 <td>
                                                     <a href="<?= base_url('admin/roleAccess/' . $r['id']) ?>" class="badge badge-success">Akses</a>
                                                     <a href="" class="badge badge-primary">Ubah</a>
                                                     <a href="<?= base_url('admin/hapusRole/' . $r['id']) ?>" class="badge badge-danger">Hapus</a>
                                                 </td>
                                             </tr>
                                             <?php $i++ ?>
                                         <?php endforeach ?>
                                     </tbody>
                                 </table>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->
                     </div>
                 </div>

                 <!-- /.row -->
             </section>
         </section>
     </section>