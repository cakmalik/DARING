<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    }else {
        $control = $ci->uri->segment(1);
        $ci->db->like('url', $control);
        $cekMenuId = $ci->db->get('user_sub_menu')->row();
        // if ($cekMenuId == NULL) {
        //     $ci->db->like('sub_url', $control);
        //     $cekMenuId = $ci->db->get('user_sub_sub_menu')->row();
        // }
        $noSubmenu = $cekMenuId->menu_id;
        $role_id = $ci->session->userdata('role_id');
        //cek apakah ada di DB, 
        $User_access_subMenu = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $noSubmenu
        ]);
        if ($User_access_subMenu->num_rows() < 1) {
            //CEK di Sub Sub Menu
            redirect('404');
        }
    }
}




/* 
        // KODE_CADANGAN UNTUK CEK SUB MENU DAN ROLE

        $control = $ci->uri->segment(1);
        //cek di DB, grafik berada di url mana untuk mengetahui menu_id
        $ci->db->like('url', $control);
        $cekMenuId = $ci->db->get('user_sub_menu')->row();
        $noSubmenu = $cekMenuId->id_sub;
        $role_id = $ci->session->userdata('role_id');
        //cek apakah ada di DB, 
        $User_access_subMenu = $ci->db->get_where('user_access_sub_menu', [
            'role_id' => $role_id,
            'sub_menu_id' => $noSubmenu
        ]);
        if ($User_access_subMenu->num_rows() < 1) {
            redirect('auth/blocked');
        }
        */

function check_access($role_id, $menu_id)
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}


















// function apiKota()
// {
//     $curl = curl_init();

//     curl_setopt_array($curl, array(
//         CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_ENCODING => "",
//         CURLOPT_MAXREDIRS => 10,
//         CURLOPT_TIMEOUT => 30,
//         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//         CURLOPT_CUSTOMREQUEST => "GET",
//         CURLOPT_HTTPHEADER => array(
//             "key: 656724c6467711a1a6adfa81ff5e97ce"
//         ),
//     ));

//     $response = curl_exec($curl);
//     $err = curl_error($curl);

//     curl_close($curl);

//     $listKota = array(); //bikin array untuk nampung list kota

//     if ($err) {
//         echo "cURL Error #:" . $err;
//     } else {

//         $arrayResponse = json_decode($response, true); //decode response dari raja ongkir, json ke array

//         $tempListKota = $arrayResponse['rajaongkir']['results']; // ambil array yang dibutuhin aja, disini resultnya aja

//         //looping array temporary untuk masukin object yang kita butuhin
//         foreach ($tempListKota as $value) {
//             //bikin object baru
//             $kota = new stdClass();
//             $kota->id = $value['city_id']; //id kotanya
//             $kota->nama = $value['city_name']; //nama kotanya

//             array_push($listKota, $kota); //push object kota yang kita bikin ke array yang nampung list kota

//         }

//         //$listKota : udah berisi list kota yang kita butuhin

//         //ini untuk ngecek aja isi $list kota udah bener apa belum

//     }
