<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');
        is_logged_in();
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'content' => 'siswa/88_siswa_list',
            'judul' => 'siswa',
        );
        $this->load->view('temp/layout_dt', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Siswa_model->json();
    }

    public function read($id)
    {
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nis' => $row->nis,
                'name' => $row->name,
                'jk' => $row->jk,
                'id_kelas' => $row->id_kelas,
                'password' => $row->password,
                'image' => $row->image,
                'role_id' => $row->role_id,

                'content' => 'siswa/88_siswa_read',
                'judul' => 'siswa',
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('siswa'));
        }
    }

    public function create()
    {
        $data = array(
            'content' => 'siswa/88_siswa_form',
            'judul' => 'siswa',
            'button' => 'Create',
            'action' => site_url('siswa/create_action'),
            'id' => set_value('id'),
            'nis' => set_value('nis'),
            'name' => set_value('name'),
            'jk' => set_value('jk'),
            'id_kelas' => set_value('id_kelas'),
            'password' => set_value('password'),
            'image' => set_value('image'),
            'role_id' => set_value('role_id'),

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
                'nis' => $this->input->post('nis', TRUE),
                'name' => $this->input->post('name', TRUE),
                'jk' => $this->input->post('jk', TRUE),
                'id_kelas' => $this->input->post('id_kelas', TRUE),
                'password' => $this->input->post('password', TRUE),
                'image' => $this->input->post('image', TRUE),
                'role_id' => $this->input->post('role_id', TRUE),
            );

            $this->Siswa_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil ditambah.
                </div>');
            redirect(site_url('siswa'));
        }
    }

    public function update($id)
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'content' => 'siswa/88_siswa_form',
                'judul' => 'siswa',
                'button' => 'Update',
                'action' => site_url('siswa/update_action'),
                'id' => set_value('id', $row->id),
                'nis' => set_value('nis', $row->nis),
                'name' => set_value('name', $row->name),
                'jk' => set_value('jk', $row->jk),
                'id_kelas' => set_value('id_kelas', $row->id_kelas),
                'password' => set_value('password', $row->password),
                'image' => set_value('image', $row->image),
                'role_id' => set_value('role_id', $row->role_id),
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('siswa'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nis' => $this->input->post('nis', TRUE),
                'name' => $this->input->post('name', TRUE),
                'jk' => $this->input->post('jk', TRUE),
                'id_kelas' => $this->input->post('id_kelas', TRUE),
                'password' => $this->input->post('password', TRUE),
                'image' => $this->input->post('image', TRUE),
                'role_id' => $this->input->post('role_id', TRUE),
            );

            $this->Siswa_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Berhasil perbarui data.
                </div>');
            redirect(site_url('siswa'));
        }
    }

    public function delete($id)
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $this->Siswa_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil dihapus.
                </div>');
            redirect(site_url('siswa'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan
                </div>');
            redirect(site_url('siswa'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nis', 'nis', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('jk', 'jk', 'trim|required');
        $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('image', 'image', 'trim|required');
        $this->form_validation->set_rules('role_id', 'role id', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-04 19:06:20 */
/* http://harviacode.com */
