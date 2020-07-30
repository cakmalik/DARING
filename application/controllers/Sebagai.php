<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sebagai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // is_logged_in();
    }
    public function apa($sebagai)
    {
        if ($sebagai == 'walas') {
            $role = 3;
        } else {
            $role = 4;
        }
        $data_guru = $this->db->get('88_guru')->result_array();
        $data_kelas = $this->db->get('88_kelas')->result_array();
        $data_sebagai = $this->db->get_where('88_guru', ['role_id' => $role])->result_array();
        $data = [
            'judul' => 'Data ' . $sebagai,
            'content' => 'sebagai/index',
            'data_guru' => $data_guru,
            'data_kelas' => $data_kelas,
            'data_sebagai' => $data_sebagai
        ];
        $this->load->view('layout', $data);
    }
    public function unset($ig, $sbg)
    {
        $data = [
            'role_id' => 0,
            'id_kelas' => 0,
        ];
        $this->db->where('id_guru', $ig);
        $this->db->update('88_guru', $data);
        redirect('sebagai/apa/' . $sbg);
    }
    public function updateWalas()
    {
        $ig = $this->input->post('id_guru');
        $ik = $this->input->post('id_kelas');
        // var_dump($ig);
        // die;
        $data = [
            'role_id' => 3,
            'id_kelas' => $ik,
            'password' => 'sdit',
            'image' => 'user.png',
        ];
        $this->db->where('id_guru', $ig);
        $this->db->update('88_guru', $data);
        redirect('sebagai/apa/walas');
    }
    public function updateGulas()
    {
        $ig = $this->input->post('id_guru');
        $ik = $this->input->post('id_kelas');

        $ik = implode(',', $ik);

        $data = [
            'role_id' => 4,
            'id_kelas' => $ik,
            'password' => 'sdit',
            'image' => 'user.png',
        ];
        $this->db->where('id_guru', $ig);
        $this->db->update('88_guru', $data);
        redirect('sebagai/apa/gulas');
    }
}
