<?php

$return = array();
$return['status'] = 0;
$return['content'] = "";

function clearJSON($json_data) {
 if (0 === strpos(bin2hex($json_data), 'efbbbf')) {
       return substr($json_data, 3);
    } else {
     return $json_data;
    }
}

if(isset($_POST['update']) && trim($_POST['update'])!='') {
 $mst_kode_wilayah = trim($_POST['update']);
 $url = "http://jendela.data.kemdikbud.go.id/api/index.php/CWilayah/wilayahGET?mst_kode_wilayah=$mst_kode_wilayah";

 $ch = curl_init();

 curl_setopt($ch, CURLOPT_URL,$url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 if(curl_exec($ch) === false) {
  $output = '{"data":[]}';
 } else {
  $output = curl_exec($ch);
 }

 curl_close($ch);

 $json_data = clearJSON($output);
 $output = json_decode($json_data, true);

 if(count($output['data']) > 0) {
  $return['status'] = 1;
  $return['content'] = $output;
 }
}

echo json_encode($return);

?>