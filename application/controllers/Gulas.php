<?php defined('BASEPATH') or exit('Tak olle masok ben cong');

class Gulas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $ig = $this->session->userdata('email');
        $d = $this->db->get_where('88_guru', ['id_guru' => $ig])->row();
        $data = [
            'list_kelas' => $d->id_kelas,
        ];
        $this->load->view('gulas/welcome_gulas', $data);
    }
    public function lihatKelas($id)
    {
        $data = [
            'id_kelas' => $id,
            'role_id' => 3
        ];
        $this->session->set_userdata($data);
        redirect('walas');
    }
}
