<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Izin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Izin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'izin/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'izin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'izin/index.html';
            $config['first_url'] = base_url() . 'izin/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Izin_model->total_rows($q);
        $izin = $this->Izin_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'izin_data' => $izin,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'izin/izin_list',
            'judul' => 'izin',
        );
        $this->load->view('layout', $data);
    }

    public function read($id) 
    {
        $row = $this->Izin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nis' => $row->nis,
		'lapor' => $row->lapor,
		'waktu_izin' => $row->waktu_izin,
		'rencana_kembali' => $row->rencana_kembali,
		'waktu_kembali' => $row->waktu_kembali,
	  
'content' => 'izin/izin_read',
            'judul' => 'izin',
          );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('izin'));
        }
    }

    public function create() 
    {
        $data = array(
            'content' => 'izin/izin_form',
            'judul' => 'izin',
            'button' => 'Create',
            'action' => site_url('izin/create_action'),
	    'id' => set_value('id'),
	    'nis' => set_value('nis'),
	    'lapor' => set_value('lapor'),
	    'waktu_izin' => set_value('waktu_izin'),
	    'rencana_kembali' => set_value('rencana_kembali'),
	    'waktu_kembali' => set_value('waktu_kembali'),
	
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
		'nis' => $this->input->post('nis',TRUE),
		'lapor' => $this->input->post('lapor',TRUE),
		'waktu_izin' => $this->input->post('waktu_izin',TRUE),
		'rencana_kembali' => $this->input->post('rencana_kembali',TRUE),
		'waktu_kembali' => $this->input->post('waktu_kembali',TRUE),
	    );

            $this->Izin_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil ditambah.
                </div>');
            redirect(site_url('izin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Izin_model->get_by_id($id);

        if ($row) {
            $data = array(
                 'content' => 'izin/izin_form',
            'judul' => 'izin',
                'button' => 'Update',
                'action' => site_url('izin/update_action'),
		'id' => set_value('id', $row->id),
		'nis' => set_value('nis', $row->nis),
		'lapor' => set_value('lapor', $row->lapor),
		'waktu_izin' => set_value('waktu_izin', $row->waktu_izin),
		'rencana_kembali' => set_value('rencana_kembali', $row->rencana_kembali),
		'waktu_kembali' => set_value('waktu_kembali', $row->waktu_kembali),
	    );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('izin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nis' => $this->input->post('nis',TRUE),
		'lapor' => $this->input->post('lapor',TRUE),
		'waktu_izin' => $this->input->post('waktu_izin',TRUE),
		'rencana_kembali' => $this->input->post('rencana_kembali',TRUE),
		'waktu_kembali' => $this->input->post('waktu_kembali',TRUE),
	    );

            $this->Izin_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Berhasil perbarui data.
                </div>');
            redirect(site_url('izin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Izin_model->get_by_id($id);

        if ($row) {
            $this->Izin_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil dihapus.
                </div>');
            redirect(site_url('izin'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan
                </div>');
            redirect(site_url('izin'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nis', 'nis', 'trim|required');
	$this->form_validation->set_rules('lapor', 'lapor', 'trim|required');
	$this->form_validation->set_rules('waktu_izin', 'waktu izin', 'trim|required');
	$this->form_validation->set_rules('rencana_kembali', 'rencana kembali', 'trim|required');
	$this->form_validation->set_rules('waktu_kembali', 'waktu kembali', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Izin.php */
/* Location: ./application/controllers/Izin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-14 23:15:06 */
/* http://harviacode.com */