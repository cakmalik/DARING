<footer class="main-footer small">
    <strong>Copyright &copy; 2019 <a href="https://wa.me/6285333920007" target="_blank">PM DEV</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>PM</b> {elapsed_time}
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- jQuery UI 1.11.4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<!-- Sparkline -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.11.0/js/OverlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/adminlte3/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/adminlte3/') ?>dist/js/demo.js"></script>

<!-- Morris Plugin Js -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script src="<?= base_url('assets/adminlte34/') ?>dist/js/adminlte.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });



    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });

    });
</script>


<?php if ($this->session->flashdata('terhapus')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<i class="fas fa-sad-cry"> Hmmm..</i>',
            text: 'Aku telah di campakkan',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('ditambah')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<i class="fas fa-grin-hearts"> Yee..</i>',
            text: 'Terima kasih sudah menambahku',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('gagal-input')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: '<i class="fas fa-grin-wink"> Yee..</i>',
            text: 'Cek kembali datamu',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('keluar')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<i class="fas fa-grin-wink"> Jangan lupa</i>',
            text: 'kembali lagi nanti ya',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php endif; ?>
<?php if ($this->session->flashdata('diedit')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<i class="fas fa-grin-wink">Yeeee</i>',
            text: 'Aku berhasil di perbarui',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php endif; ?>
</body>

</html>