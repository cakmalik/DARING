<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        is_logged_in();
        
    }


    public function index()
    {
        $jml_mutabaah = $this->db->get('99_mutabaah')->num_rows();
        $jml_life_skill = $this->db->get('99_lifeskill')->num_rows();
        $jml_tematik = $this->db->get('99_tematik')->num_rows();
        $jml_tahfidz = $this->db->get('99_tahfidz')->num_rows();
        $jml_mulok = $this->db->get('99_mulok')->num_rows();


        $data = [
            'title' => 'HOME',
            'jml_mutabaah' => $jml_mutabaah,
            'jml_life_skill' => $jml_life_skill,
            'jml_tematik' => $jml_tematik,
            'jml_tahfidz' => $jml_tahfidz,
            'jml_mulok' => $jml_mulok,
        ];

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('admin/welcome_admin', $data);
        $this->load->view('temp/footer');
    }


    public function role()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('temp/header');
        $this->load->view('temp/sidebar');
        $this->load->view('admin/role', $data);
        $this->load->view('temp/footer');
    }
    public function roleAccess($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('temp/header');
        $this->load->view('temp/sidebar');
        $this->load->view('admin/role-access', $data);
        $this->load->view('temp/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akses Berhasil di Rubah</div>');
    }
    public function addRole()
    {
        $this->form_validation->set_rules('role', 'Role', 'trim|required');
        if (!$this->form_validation->run() == false) {
            $data['role'] = $this->input->post('role');
            $this->db->insert('user_role', $data);
            redirect('admin/role');
        }
    }
    public function hapusRole($id)
    {
        $this->db->delete('user_role', ['id' => $id]);
        redirect('admin/role');
    }
    public function blocked()
    {
        $this->load->view('auth/blocked');
    
    }
}
