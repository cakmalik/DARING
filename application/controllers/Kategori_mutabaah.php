<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori_mutabaah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_mutabaah_model');
        $this->load->library('form_validation');
        is_logged_in();
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
            'content' => 'kategori_mutabaah/99_kategori_mutabaah_list',
            'judul' => 'kategori_mutabaah',
        );
        $this->load->view('temp/layout_dt', $data);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Kategori_mutabaah_model->json();
    }

    public function read($id)
    {
        $row = $this->Kategori_mutabaah_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'id_kategori' => $row->id_kategori,
                'nama_kategori' => $row->nama_kategori,

                'content' => 'kategori_mutabaah/99_kategori_mutabaah_read',
                'judul' => 'kategori_mutabaah',
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('kategori_mutabaah'));
        }
    }

    public function create()
    {
        $data = array(
            'content' => 'kategori_mutabaah/99_kategori_mutabaah_form',
            'judul' => 'kategori_mutabaah',
            'button' => 'Create',
            'action' => site_url('kategori_mutabaah/create_action'),
            'id' => set_value('id'),
            'id_kategori' => set_value('id_kategori'),
            'nama_kategori' => set_value('nama_kategori'),

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
                'id_kategori' => $this->input->post('id_kategori', TRUE),
                'nama_kategori' => $this->input->post('nama_kategori', TRUE),
            );

            $this->Kategori_mutabaah_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil ditambah.
                </div>');
            redirect(site_url('kategori_mutabaah'));
        }
    }

    public function update($id)
    {
        $row = $this->Kategori_mutabaah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'content' => 'kategori_mutabaah/99_kategori_mutabaah_form',
                'judul' => 'kategori_mutabaah',
                'button' => 'Update',
                'action' => site_url('kategori_mutabaah/update_action'),
                'id' => set_value('id', $row->id),
                'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
            );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('kategori_mutabaah'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'id_kategori' => $this->input->post('id_kategori', TRUE),
                'nama_kategori' => $this->input->post('nama_kategori', TRUE),
            );

            $this->Kategori_mutabaah_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Berhasil perbarui data.
                </div>');
            redirect(site_url('kategori_mutabaah'));
        }
    }

    public function delete($id)
    {
        $row = $this->Kategori_mutabaah_model->get_by_id($id);

        if ($row) {
            $this->Kategori_mutabaah_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil dihapus.
                </div>');
            redirect(site_url('kategori_mutabaah'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan
                </div>');
            redirect(site_url('kategori_mutabaah'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('id_kategori', 'id kategori', 'trim|required');
        $this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Kategori_mutabaah.php */
/* Location: ./application/controllers/Kategori_mutabaah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-04 16:15:26 */
/* http://harviacode.com */
