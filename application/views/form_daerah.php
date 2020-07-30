<!doctype html>
<html>
<head>
 <title>Data Wilayah Indonesia</title>
 <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
 <script type="text/javascript">
  $(document).ready(function(){
   updateData('pokok', '000000');

   $(".data-wilayah select").change(function(){
    var id_wilayah = $(this).attr('id');
    var kode_wilayah = $(this).val();

    if(id_wilayah!='kelurahan') {
     updateData(id_wilayah, kode_wilayah);
    }    
   })
  });

  function updateData(id_wilayah, kode_wilayah) {
   if(id_wilayah=='pokok') {
    $("#propinsi").empty().prepend('<option value="">-- Pilih Nama Propinsi --</option>');
   }

   if(id_wilayah=='pokok' || id_wilayah=='propinsi') {
    $("#kota").empty().prepend('<option value="">-- Pilih Nama Kabupaten/Kota --</option>');
   }

   if(id_wilayah=='pokok' || id_wilayah=='propinsi' || id_wilayah=='kota') {
    $("#kecamatan").empty().prepend('<option value="">-- Pilih Nama Kecamatan --</option>');
   }

   if(id_wilayah=='pokok' || id_wilayah=='propinsi' || id_wilayah=='kota' || id_wilayah=='kecamatan') {
    $("#kelurahan").empty().prepend('<option value="">-- Pilih Nama Desa/Kelurahan --</option>');
   }

   if(kode_wilayah!="") {
    $.post('update.php',{
     update: kode_wilayah
    }, function(data) {
     var data = jQuery.parseJSON(data);

     if(data.status==1) {
      var obj = '#propinsi';
      var content = '';

      if(id_wilayah=='propinsi') {
       obj = '#kota';
      } else if(id_wilayah=='kota') {
       obj = '#kecamatan';
      } else if(id_wilayah=='kecamatan') {
       obj = '#kelurahan';
      }

      $.each(data.content.data, function(i,d) {
       content += '<option value="'+d.kode_wilayah+'">'+d.nama+'</option>';
      });

      $(obj).append(content);
     }
    });
   }
  }
 </script>
</head>
<body>
 <h3>Data Wilayah Indonesia</h3>
 <form id="territory">
  <p class="data-wilayah"><label for="propinsi">Propinsi</label> <select id="propinsi">
   <option value="">-- Pilih Nama Propinsi --</option>
  </select></p>
  <p class="data-wilayah"><label for="kota">Kabupaten/Kota</label> <select id="kota">
   <option value="">-- Pilih Nama Kabupaten/Kota --</option>
  </select></p>
  <p class="data-wilayah"><label for="kecamatan">Kecamatan</label> <select id="kecamatan">
   <option value="">-- Pilih Nama Kecamatan --</option>
  </select></p>
  <p class="data-wilayah"><label for="kelurahan">Desa/Kelurahan</label> <select id="kelurahan">
   <option value="">-- Pilih Nama Desa/Kelurahan --</option>
  </select></p>
 </form>
</body> 
</html>