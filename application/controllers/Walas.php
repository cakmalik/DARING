<?php
defined('BASEPATH') or exit('Tak olle cong');
class Walas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_walas');
        $this->load->helper('text');
    }
    public function index()
    {
        // ig == id_guru , ik=id_kelas
        $ig = $this->session->userdata('email');
        $ik = $this->session->userdata('id_kelas');
        $jml_mutabaah = $this->db->get_where('99_mutabaah', ['id_kelas' => $ik])->num_rows();

        $jml_lifeskill = $this->db->get_where('99_lifeskill', ['id_kelas' => $ik])->num_rows();
        $jml_tematik = $this->db->get_where('99_tematik', ['id_kelas' => $ik])->num_rows();
        $jml_tahfidz = $this->db->get_where('99_tahfidz', ['id_kelas' => $ik])->num_rows();
        $jml_mulok = $this->db->get_where('99_mulok', ['id_kelas' => $ik])->num_rows();


        $data = [
            'title' => 'HOME',
            'jml_mutabaah' => $jml_mutabaah,
            'jml_lifeskill' => $jml_lifeskill,
            'jml_tematik' => $jml_tematik,
            'jml_tahfidz' => $jml_tahfidz,
            'jml_mulok' => $jml_mulok,
        ];

        $this->load->view('temp/header', $data);
        $this->load->view('temp/sidebar', $data);
        $this->load->view('wamur/welcome_walas', $data);
        $this->load->view('temp/footer');
    }
    public function mutabaah()
    {
        $ik = $this->session->userdata('id_kelas');
        $kelas = $this->M_walas->getIDKelas($ik)->row();
        $nama_kelas = $kelas->nama_kelas;

        //ambil nama siswa kelas 5 ali
        $datasiswa = $this->M_walas->getWhere('88_siswa', 'id_kelas', $ik)->result_array();

        $data = [
            'judul' => 'Mutabaah Siswa Kelas (' . $nama_kelas . ')',
            'content' => 'walas/mutabaah',
            'kategori' => 'lifeskill',
            'datasiswa' => $datasiswa
        ];
        $this->load->view('layout', $data);
    }
    public function lifeskill()
    {
        $ik = $this->session->userdata('id_kelas');
        //untuk ambil nama kelas
        $kelas = $this->M_walas->getIDKelas($ik)->row();
        $nama_kelas = $kelas->nama_kelas;
        //ambil nama siswa kelas 5 ali
        $datasiswa = $this->M_walas->getWhere('88_siswa', 'id_kelas', $ik)->result_array();

        $data = [
            'judul' => 'Life skill Siswa Kelas (' . $nama_kelas . ')',
            'content' => 'walas/addition',
            'kategori' => 'lifeskill',
            'datasiswa' => $datasiswa
        ];
        $this->load->view('layout', $data);
    }
    public function tematik()
    {
        $ik = $this->session->userdata('id_kelas');
        //untuk ambil nama kelas

        $kelas = $this->M_walas->getIDKelas($ik)->row();
        $nama_kelas = $kelas->nama_kelas;
        //ambil nama siswa kelas 5 ali
        $datasiswa = $this->M_walas->getWhere('88_siswa', 'id_kelas', $ik)->result_array();

        $data = [
            'judul' => 'Tematik Siswa Kelas (' . $nama_kelas . ')',
            'content' => 'walas/addition',
            'kategori' => 'tematik',
            'datasiswa' => $datasiswa
        ];
        $this->load->view('layout', $data);
    }
    public function tahfidz()
    {
        $ik = $this->session->userdata('id_kelas');
        //untuk ambil nama kelas

        $kelas = $this->M_walas->getIDKelas($ik)->row();
        $nama_kelas = $kelas->nama_kelas;
        //ambil nama siswa kelas 5 ali
        $datasiswa = $this->M_walas->getWhere('88_siswa', 'id_kelas', $ik)->result_array();

        $data = [
            'judul' => 'Tahfidz Siswa Kelas (' . $nama_kelas . ')',
            'content' => 'walas/addition',
            'kategori' => 'tahfidz',
            'datasiswa' => $datasiswa
        ];
        $this->load->view('layout', $data);
    }
    public function mulok()
    {
        $ik = $this->session->userdata('id_kelas');
        //untuk ambil nama kelas

        $kelas = $this->M_walas->getIDKelas($ik)->row();
        $nama_kelas = $kelas->nama_kelas;
        //ambil nama siswa kelas 5 ali
        $datasiswa = $this->M_walas->getWhere('88_siswa', 'id_kelas', $ik)->result_array();

        $data = [
            'judul' => 'Mulok Siswa Kelas (' . $nama_kelas . ')',
            'content' => 'walas/addition',
            'kategori' => 'mulok',
            'datasiswa' => $datasiswa
        ];
        $this->load->view('layout', $data);
    }
    public function detailADD($nis, $kategori)
    {
        // $nis = $this->session->userdata('email');
        $this->db->order_by('id', 'DESC');
        $tbl = '99_' . $kategori;
        $foto = $this->db->get_where($tbl, ['id_siswa' => $nis])->result_array();
        $data = [
            'judul' => $kategori,
            'foto' => $foto,
            'content' => 'walas/detail_add',
            'kategori' => $kategori,
        ];
        $this->load->view('layout', $data);
    }
    public function mutabaahSiswa($id)
    {
        $datasiswa = $this->M_walas->getSiswa($id)->row();
        $a = $this->M_walas->getWhere('99_mutabaah', 'nis', $id)->result_array();
        $data = [
            'listmutabaahsiswa' => $a,
            'judul' => 'List Mutabaah ' . $datasiswa->name,
            'content' => 'walas/listMutabaahsiswa'
        ];
        $this->load->view('layout', $data);
    }

    public function hapus($id, $kategori)
    {
        $table = '99_' . $kategori;
        $_id = $this->db->get_where($table, ['id' => $id])->row();
        $query = $this->db->delete($table, ['id' => $id]);
        if ($query) {
            unlink("assets/'.$kategori.'/" . $_id->nama_file);
        }
        $this->session->set_flashdata('terhapus', 'ok');
        redirect('walas/' . $kategori);
    }
    public function edit($id, $kategori)
    {
        $table = '99_' . $kategori;
        $data['ediD'] = $this->db->get_where($table, [
            'id' => $id,
        ])->row();
        $data['kategori'] = $kategori;

        $this->load->view('walas/edit', $data);
    }
    public function editAction($id, $kategori)
    {
        $table = '99_' . $kategori;
        $data = [
            'judul' => htmlspecialchars($this->input->post('judul')),
            'keterangan' => htmlspecialchars($this->input->post('keterangan')),
        ];
        $this->db->where('id', $id);
        $this->db->update($table, $data);
        $this->session->set_flashdata('diedit', 'ok');
        redirect('walas/' . $kategori);
    }
    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('keluar', 'ok');
        redirect(base_url('auth'));
    }
}
