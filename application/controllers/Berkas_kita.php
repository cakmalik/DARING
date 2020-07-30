<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berkas_kita extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Berkas_kita_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'berkas_kita/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'berkas_kita/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'berkas_kita/index.html';
            $config['first_url'] = base_url() . 'berkas_kita/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Berkas_kita_model->total_rows($q);
        $berkas_kita = $this->Berkas_kita_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'berkas_kita_data' => $berkas_kita,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'berkas_kita/berkas_kita_list',
            'judul' => 'berkas_kita',
        );
        $this->load->view('layout', $data);
    }

    public function read($id) 
    {
        $row = $this->Berkas_kita_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_guru' => $row->id_guru,
		'date_created' => $row->date_created,
		'judul' => $row->judul,
		'keterangan' => $row->keterangan,
		'nama_file' => $row->nama_file,
		'jenis_file' => $row->jenis_file,
	  
'content' => 'berkas_kita/berkas_kita_read',
            'judul' => 'berkas_kita',
          );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('berkas_kita'));
        }
    }

    public function create() 
    {
        $data = array(
            'content' => 'berkas_kita/berkas_kita_form',
            'judul' => 'berkas_kita',
            'button' => 'Create',
            'action' => site_url('berkas_kita/create_action'),
	    'id' => set_value('id'),
	    'id_guru' => set_value('id_guru'),
	    'date_created' => set_value('date_created'),
	    'judul' => set_value('judul'),
	    'keterangan' => set_value('keterangan'),
	    'nama_file' => set_value('nama_file'),
	    'jenis_file' => set_value('jenis_file'),
	
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
		'date_created' => $this->input->post('date_created',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'nama_file' => $this->input->post('nama_file',TRUE),
		'jenis_file' => $this->input->post('jenis_file',TRUE),
	    );

            $this->Berkas_kita_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil ditambah.
                </div>');
            redirect(site_url('berkas_kita'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Berkas_kita_model->get_by_id($id);

        if ($row) {
            $data = array(
                 'content' => 'berkas_kita/berkas_kita_form',
            'judul' => 'berkas_kita',
                'button' => 'Update',
                'action' => site_url('berkas_kita/update_action'),
		'id' => set_value('id', $row->id),
		'id_guru' => set_value('id_guru', $row->id_guru),
		'date_created' => set_value('date_created', $row->date_created),
		'judul' => set_value('judul', $row->judul),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'nama_file' => set_value('nama_file', $row->nama_file),
		'jenis_file' => set_value('jenis_file', $row->jenis_file),
	    );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('berkas_kita'));
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
		'date_created' => $this->input->post('date_created',TRUE),
		'judul' => $this->input->post('judul',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'nama_file' => $this->input->post('nama_file',TRUE),
		'jenis_file' => $this->input->post('jenis_file',TRUE),
	    );

            $this->Berkas_kita_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Berhasil perbarui data.
                </div>');
            redirect(site_url('berkas_kita'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Berkas_kita_model->get_by_id($id);

        if ($row) {
            $this->Berkas_kita_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil dihapus.
                </div>');
            redirect(site_url('berkas_kita'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan
                </div>');
            redirect(site_url('berkas_kita'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_guru', 'id guru', 'trim|required');
	$this->form_validation->set_rules('date_created', 'date created', 'trim|required');
	$this->form_validation->set_rules('judul', 'judul', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('nama_file', 'nama file', 'trim|required');
	$this->form_validation->set_rules('jenis_file', 'jenis file', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function unggah()
    {
        $data = [
            'judul' => 'Unggah berkas',
            'content' => 'berkas_kita/unggah'
        ];
        $this->load->view('layout', $data);
    }
    public function aksi_upload()
    {
        $nis = $this->session->userdata('email');
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = 'assets/berkas_kita';
            $config['allowed_types'] = '*';
            $config['max_size'] = 50000;
            $config['file_name'] = $nis . '-' . time();
            // $config['file_name'] = $this->input->post('nik');

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('gagal-input', 'ok');
               redirect('berkas_kita');
            } else {
                $this->upload->data();
                $this->session->set_flashdata('error', '<br><i><small class="text-success">Berhasil Upload foto', '</small></i>');
                $gbr = $this->upload->data();

                $nama = $config['file_name'] . $gbr['file_ext'];
                $data = [
                    'id_guru' => $nis,
                    'date_created' => time(),
                    'judul' => $this->input->post('judul'),
                    'keterangan' => $this->input->post('keterangan'),
                    'nama_file' => $nama,
                    'jenis_file' => $gbr['file_ext'],
                ];
                $table = 'berkas_kita';
                $this->db->insert($table, $data);
                $this->session->set_flashdata('ditambah', 'ok');
               redirect('berkas_kita');
            }
        }
    }
    public function hapus($id, $kategori)
	{
		$table = 'berkas_kita';
        $_id = $this->db->get_where($table, ['id' => $id])->row();
        		$query = $this->db->delete($table, ['id' => $id]);
		if ($query) {
			unlink("assets/berkas_kita/" . $_id->nama_file);
		}
		$this->session->set_flashdata('terhapus', 'ok');
		redirect('berkas_kita/');
    }
}