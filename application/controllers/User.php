<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $user = $this->User_model->get_all();
        $data = array(
            'user_data' => $user,
            'content' => 'user/user_list',
            'judul' => 'user',
        );
        $this->load->view('layout', $data);
    }
    public function aku()
    {

        $this->load->view('aku');
    }

    public function read($id)
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'name' => $row->name,
                'email' => $row->email,
                'image' => $row->image,
                'password' => $row->password,
                'role_id' => $row->role_id,
                'is_active' => $row->is_active,
                'date_created' => $row->date_created,

                'content' => 'user/user_read',
                'judul' => 'user',
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('user'));
        }
    }

    public function create()
    {
        $data = array(
            'content' => 'user/user_form',
            'judul' => 'user',
            'button' => 'Create',
            'action' => site_url('user/create_action'),
            'id' => set_value('id'),
            'name' => set_value('name'),
            'email' => set_value('email'),
            'image' => set_value('image'),
            'password' => set_value('password'),
            'role_id' => set_value('role_id'),
            'is_active' => set_value('is_active'),
            'date_created' => set_value('date_created'),

        );
        $this->load->view('layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', TRUE),
                'is_active' => $this->input->post('is_active', TRUE),
                'date_created' => time(),
            );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil ditambah.
                </div>');
            redirect(site_url('user'));
        }
    }

    public function update($id)
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'content' => 'user/user_form',
                'judul' => 'user',
                'button' => 'Update',
                'action' => site_url('user/update_action'),
                'id' => set_value('id', $id),
                'name' => set_value('name', $row->name),
                'email' => set_value('email', $row->email),
                'image' => set_value('image', $row->image),
                'password' => set_value('password', $row->password),
                'role_id' => set_value('role_id', $row->role_id),
                'is_active' => set_value('is_active', $row->is_active),
                'date_created' => set_value('date_created', $row->date_created),
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('user'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'name' => $this->input->post('name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id', TRUE),
                'is_active' => $this->input->post('is_active', TRUE),
            );

            $this->User_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Berhasil perbarui data.
                </div>');
            redirect(site_url('user'));
        }
    }

    public function delete($id)
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil dihapus.
                </div>');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan
                </div>');
            redirect(site_url('user'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('role_id', 'role id', 'trim|required');
        $this->form_validation->set_rules('is_active', 'is active', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-15 12:38:11 */
/* http://harviacode.com */
