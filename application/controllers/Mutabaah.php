<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mutabaah extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_mutabaah');
    }
    public function index()
    {
        $nis = $this->session->userdata('email');
        // $join = $this->M_mutabaah->joinBos($nis)->result_array();
        $this->db->order_by('id','DESC');
        $dm = $this->db->get_where('99_mutabaah', ['nis' => $nis])->result_array();
        $data = [
            'content' => 'mutabaah/index',
            'judul' => 'Mutabaah',
            'data_mutabaah' => $dm,
        ];
        $this->load->view('layout', $data);
    }
    public function inputMutabaah()
    {
        $nis = $this->session->userdata('email');
        $user = $this->db->get_where('88_siswa', ['nis' => $nis])->row();
        $id_kelas = $user->id_kelas;
        $id_kt = $this->input->post('id_kategori');
        $tgl = $this->input->post('date_created');
        //cek terlebih dahulu apakah sdh ada tanggal hari ini
        $this->db->where('nis', $nis);
        $this->db->where('date_created', $tgl);
        $cek = $this->db->get('99_mutabaah')->num_rows();
        if ($cek > 0) { //jika data sdh ada
            $this->session->set_flashdata('gagal', 'data-ada');
            redirect('mutabaah');
        } else {

            //jadikan array ke string
            $id_kategori = implode(',', $id_kt);
            $data = [
                'nis' => $nis,
                'id_kelas' => $id_kelas,
                'id_kategori' => $id_kategori,
                'date_created' => $tgl,
            ];
            $this->db->insert('99_mutabaah', $data);
            $this->session->set_flashdata('berhasil', 'data-ada');
            redirect('mutabaah');
        }
    }
    public function cekDetail($id)
    {
        //ambil datanya
        $jenis_muta = $this->db->get_where('99_mutabaah', ['id' => $id])->row();
        //pemecahan array saya taruh di view index supaya lebih mudah looping
        $data = [
            'content' => 'mutabaah/detail',
            'judul' => 'Mutabaah',
            'jenis_muta' => $jenis_muta
        ];
        $this->load->view('layout', $data);
    }
}
