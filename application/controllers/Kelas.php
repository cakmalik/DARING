<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');
        is_logged_in();
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'content' => 'kelas/88_kelas_list',
            'judul' => 'kelas',
        );
        $this->load->view('temp/layout_dt', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Kelas_model->json();
    }

    public function read($id)
    {
        $row = $this->Kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_kelas' => $row->nama_kelas,
                'id_kelas' => $row->id_kelas,
                'id_walas' => $row->id_walas,

                'content' => 'kelas/88_kelas_read',
                'judul' => 'kelas',
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('kelas'));
        }
    }

    public function create()
    {
        $data = array(
            'content' => 'kelas/88_kelas_form',
            'judul' => 'kelas',
            'button' => 'Create',
            'action' => site_url('kelas/create_action'),
            'id' => set_value('id'),
            'nama_kelas' => set_value('nama_kelas'),
            'id_kelas' => set_value('id_kelas'),
            'id_walas' => set_value('id_walas'),

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
                'nama_kelas' => $this->input->post('nama_kelas', TRUE),
                'id_kelas' => $this->input->post('id_kelas', TRUE),
                'id_walas' => $this->input->post('id_walas', TRUE),
            );

            $this->Kelas_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil ditambah.
                </div>');
            redirect(site_url('kelas'));
        }
    }

    public function update($id)
    {
        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'content' => 'kelas/88_kelas_form',
                'judul' => 'kelas',
                'button' => 'Update',
                'action' => site_url('kelas/update_action'),
                'id' => set_value('id', $row->id),
                'nama_kelas' => set_value('nama_kelas', $row->nama_kelas),
                'id_kelas' => set_value('id_kelas', $row->id_kelas),
                'id_walas' => set_value('id_walas', $row->id_walas),
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('kelas'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama_kelas' => $this->input->post('nama_kelas', TRUE),
                'id_kelas' => $this->input->post('id_kelas', TRUE),
                'id_walas' => $this->input->post('id_walas', TRUE),
            );

            $this->Kelas_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Berhasil perbarui data.
                </div>');
            redirect(site_url('kelas'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $this->Kelas_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil dihapus.
                </div>');
            redirect(site_url('kelas'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan
                </div>');
            redirect(site_url('kelas'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kelas', 'nama kelas', 'trim|required');
        $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('id_walas', 'id walas', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-04 11:39:08 */
/* http://harviacode.com */
