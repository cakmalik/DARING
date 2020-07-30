<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');is_logged_in();
    }

    public function index()
    {
        $data = array(
            'content' => 'guru/88_guru_list',
            'judul' => 'guru',
        );
        $this->load->view('temp/layout_dt', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Guru_model->json();
    }

    public function read($id) 
    {
        $row = $this->Guru_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'id_guru' => $row->id_guru,
		'name' => $row->name,
		'ttl' => $row->ttl,
		'pendidikan_terakhir' => $row->pendidikan_terakhir,
		'tgl_mulai_kerja' => $row->tgl_mulai_kerja,
		'jabatan' => $row->jabatan,
		'role_id' => $row->role_id,
		'image' => $row->image,
		'id_kelas' => $row->id_kelas,
		'password' => $row->password,
	  
'content' => 'guru/88_guru_read',
            'judul' => 'guru',
          );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('guru'));
        }
    }

    public function create() 
    {
        $data = array(
            'content' => 'guru/88_guru_form',
            'judul' => 'guru',
            'button' => 'Create',
            'action' => site_url('guru/create_action'),
	    'id' => set_value('id'),
	    'id_guru' => set_value('id_guru'),
	    'name' => set_value('name'),
	    'ttl' => set_value('ttl'),
	    'pendidikan_terakhir' => set_value('pendidikan_terakhir'),
	    'tgl_mulai_kerja' => set_value('tgl_mulai_kerja'),
	    'jabatan' => set_value('jabatan'),
	    'role_id' => set_value('role_id'),
	    'image' => set_value('image'),
	    'id_kelas' => set_value('id_kelas'),
	    'password' => set_value('password'),
	
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
		'name' => $this->input->post('name',TRUE),
		'ttl' => $this->input->post('ttl',TRUE),
		'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir',TRUE),
		'tgl_mulai_kerja' => $this->input->post('tgl_mulai_kerja',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'role_id' => $this->input->post('role_id',TRUE),
		'image' => $this->input->post('image',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Guru_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil ditambah.
                </div>');
            redirect(site_url('guru'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Guru_model->get_by_id($id);

        if ($row) {
            $data = array(
                 'content' => 'guru/88_guru_form',
            'judul' => 'guru',
                'button' => 'Update',
                'action' => site_url('guru/update_action'),
		'id' => set_value('id', $row->id),
		'id_guru' => set_value('id_guru', $row->id_guru),
		'name' => set_value('name', $row->name),
		'ttl' => set_value('ttl', $row->ttl),
		'pendidikan_terakhir' => set_value('pendidikan_terakhir', $row->pendidikan_terakhir),
		'tgl_mulai_kerja' => set_value('tgl_mulai_kerja', $row->tgl_mulai_kerja),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'role_id' => set_value('role_id', $row->role_id),
		'image' => set_value('image', $row->image),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'password' => set_value('password', $row->password),
	    );
            $this->load->view('layout', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan.
                </div>');
            redirect(site_url('guru'));
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
		'name' => $this->input->post('name',TRUE),
		'ttl' => $this->input->post('ttl',TRUE),
		'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir',TRUE),
		'tgl_mulai_kerja' => $this->input->post('tgl_mulai_kerja',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'role_id' => $this->input->post('role_id',TRUE),
		'image' => $this->input->post('image',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'password' => $this->input->post('password',TRUE),
	    );

            $this->Guru_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Berhasil perbarui data.
                </div>');
            redirect(site_url('guru'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Guru_model->get_by_id($id);

        if ($row) {
            $this->Guru_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data berhasil dihapus.
                </div>');
            redirect(site_url('guru'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  Data tidak ditemukan
                </div>');
            redirect(site_url('guru'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_guru', 'id guru', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('ttl', 'ttl', 'trim|required');
	$this->form_validation->set_rules('pendidikan_terakhir', 'pendidikan terakhir', 'trim|required');
	$this->form_validation->set_rules('tgl_mulai_kerja', 'tgl mulai kerja', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('role_id', 'role id', 'trim|required');
	$this->form_validation->set_rules('image', 'image', 'trim|required');
	$this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "88_guru.xls";
        $judul = "88_guru";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Guru");
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Ttl");
	xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan Terakhir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Mulai Kerja");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Role Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Image");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");

	foreach ($this->Guru_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_guru);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ttl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pendidikan_terakhir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_mulai_kerja);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->role_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->image);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-08 01:18:33 */
/* http://harviacode.com */