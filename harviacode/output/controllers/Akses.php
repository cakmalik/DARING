<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akses extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Akses_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'akses/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'akses/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'akses/index.html';
            $config['first_url'] = base_url() . 'akses/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Akses_model->total_rows($q);
        $akses = $this->Akses_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'akses_data' => $akses,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'akses/akses_list',
            'judul' => 'akses',
        );
        $this->load->view('layout', $data);
    }

    public function read($id) 
    {
        $row = $this->Akses_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'pess' => $row->pess,
		'is_active' => $row->is_active,
	  
'content' => 'akses/akses_read',
            'judul' => 'akses',
          );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('akses'));
        }
    }

    public function create() 
    {
        $data = array(
            'content' => 'akses/akses_form',
            'judul' => 'akses',
            'button' => 'Create',
            'action' => site_url('akses/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'pess' => set_value('pess'),
	    'is_active' => set_value('is_active'),
	
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
		'nama' => $this->input->post('nama',TRUE),
		'pess' => $this->input->post('pess',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
	    );

            $this->Akses_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil ditambah.
                </div>');
            redirect(site_url('akses'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Akses_model->get_by_id($id);

        if ($row) {
            $data = array(
                 'content' => 'akses/akses_form',
            'judul' => 'akses',
                'button' => 'Update',
                'action' => site_url('akses/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'pess' => set_value('pess', $row->pess),
		'is_active' => set_value('is_active', $row->is_active),
	    );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('akses'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'pess' => $this->input->post('pess',TRUE),
		'is_active' => $this->input->post('is_active',TRUE),
	    );

            $this->Akses_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Berhasil perbarui data.
                </div>');
            redirect(site_url('akses'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Akses_model->get_by_id($id);

        if ($row) {
            $this->Akses_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil dihapus.
                </div>');
            redirect(site_url('akses'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan
                </div>');
            redirect(site_url('akses'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('pess', 'pess', 'trim|required');
	$this->form_validation->set_rules('is_active', 'is active', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Akses.php */
/* Location: ./application/controllers/Akses.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-12 14:50:32 */
/* http://harviacode.com */