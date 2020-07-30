<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aaaaaaa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aaaaaaaaa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'aaaaaaa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'aaaaaaa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'aaaaaaa/index.html';
            $config['first_url'] = base_url() . 'aaaaaaa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Aaaaaaaaa->total_rows($q);
        $aaaaaaa = $this->Aaaaaaaaa->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'aaaaaaa_data' => $aaaaaaa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'aaaaaaa/88_guru_list',
            'judul' => 'aaaaaaa',
        );
        $this->load->view('layout', $data);
    }

    public function read($id) 
    {
        $row = $this->Aaaaaaaaa->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_guru' => $row->id_guru,
		'nama_guru' => $row->nama_guru,
		'ttl' => $row->ttl,
		'pendidikan_terakhir' => $row->pendidikan_terakhir,
		'tgl_mulai_kerja' => $row->tgl_mulai_kerja,
		'jabatan' => $row->jabatan,
	  
'content' => 'aaaaaaa/88_guru_read',
            'judul' => 'aaaaaaa',
          );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('aaaaaaa'));
        }
    }

    public function create() 
    {
        $data = array(
            'content' => 'aaaaaaa/88_guru_form',
            'judul' => 'aaaaaaa',
            'button' => 'Create',
            'action' => site_url('aaaaaaa/create_action'),
	    'id' => set_value('id'),
	    'id_guru' => set_value('id_guru'),
	    'nama_guru' => set_value('nama_guru'),
	    'ttl' => set_value('ttl'),
	    'pendidikan_terakhir' => set_value('pendidikan_terakhir'),
	    'tgl_mulai_kerja' => set_value('tgl_mulai_kerja'),
	    'jabatan' => set_value('jabatan'),
	
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
		'id_guru' => $this->input->post('id_guru',TRUE),
		'nama_guru' => $this->input->post('nama_guru',TRUE),
		'ttl' => $this->input->post('ttl',TRUE),
		'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir',TRUE),
		'tgl_mulai_kerja' => $this->input->post('tgl_mulai_kerja',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Aaaaaaaaa->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil ditambah.
                </div>');
            redirect(site_url('aaaaaaa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Aaaaaaaaa->get_by_id($id);

        if ($row) {
            $data = array(
                 'content' => 'aaaaaaa/88_guru_form',
            'judul' => 'aaaaaaa',
                'button' => 'Update',
                'action' => site_url('aaaaaaa/update_action'),
		'id' => set_value('id', $row->id),
		'id_guru' => set_value('id_guru', $row->id_guru),
		'nama_guru' => set_value('nama_guru', $row->nama_guru),
		'ttl' => set_value('ttl', $row->ttl),
		'pendidikan_terakhir' => set_value('pendidikan_terakhir', $row->pendidikan_terakhir),
		'tgl_mulai_kerja' => set_value('tgl_mulai_kerja', $row->tgl_mulai_kerja),
		'jabatan' => set_value('jabatan', $row->jabatan),
	    );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('aaaaaaa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'id_guru' => $this->input->post('id_guru',TRUE),
		'nama_guru' => $this->input->post('nama_guru',TRUE),
		'ttl' => $this->input->post('ttl',TRUE),
		'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir',TRUE),
		'tgl_mulai_kerja' => $this->input->post('tgl_mulai_kerja',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Aaaaaaaaa->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Berhasil perbarui data.
                </div>');
            redirect(site_url('aaaaaaa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Aaaaaaaaa->get_by_id($id);

        if ($row) {
            $this->Aaaaaaaaa->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil dihapus.
                </div>');
            redirect(site_url('aaaaaaa'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan
                </div>');
            redirect(site_url('aaaaaaa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_guru', 'id guru', 'trim|required');
	$this->form_validation->set_rules('nama_guru', 'nama guru', 'trim|required');
	$this->form_validation->set_rules('ttl', 'ttl', 'trim|required');
	$this->form_validation->set_rules('pendidikan_terakhir', 'pendidikan terakhir', 'trim|required');
	$this->form_validation->set_rules('tgl_mulai_kerja', 'tgl mulai kerja', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Aaaaaaa.php */
/* Location: ./application/controllers/Aaaaaaa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-06 14:37:21 */
/* http://harviacode.com */