<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wamur extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_wamur');
		$this->load->helper('text');
		is_logged_in();
	}

	public function index()
	{
		$nis = $this->session->userdata('email');
		$jml_mutabaah = $this->db->get_where('99_mutabaah', ['nis' => $nis])->num_rows();
		$jml_lifeskill = $this->db->get_where('99_lifeskill', ['id_siswa' => $nis])->num_rows();
		$jml_tematik = $this->db->get_where('99_tematik', ['id_siswa' => $nis])->num_rows();
		$jml_tahfidz = $this->db->get_where('99_tahfidz', ['id_siswa' => $nis])->num_rows();
		$jml_mulok = $this->db->get_where('99_mulok', ['id_siswa' => $nis])->num_rows();


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
		$this->load->view('wamur/welcome_wamur', $data);
		$this->load->view('temp/footer');
	}
	public function lifeskill()
	{
		$nis = $this->session->userdata('email');
		$this->db->order_by('id', 'DESC');
		$foto = $this->db->get_where('99_lifeskill', ['id_siswa' => $nis])->result_array();
		$data = [
			'judul' => 'Life Skill',
			'foto' => $foto,
			'content' => 'wamur/additional',
			'kategori' => 'lifeskill',
		];
		$this->load->view('layout', $data);
	}
	public function tematik()
	{
		$nis = $this->session->userdata('email');
		$this->db->order_by('id', 'DESC');
		$foto = $this->M_wamur->getAll('99_tematik', $nis)->result_array();
		$data = [
			'judul' => 'Tematik',
			'foto' => $foto,
			'kategori' => 'tematik',
			'content' => 'wamur/additional',
		];
		$this->load->view('layout', $data);
	}
	public function mulok()
	{
		$nis = $this->session->userdata('email');
		$this->db->order_by('id', 'DESC');
		$foto = $this->M_wamur->getAll('99_mulok', $nis)->result_array();
		$data = [
			'judul' => 'Mulok',
			'foto' => $foto,
			'kategori' => 'mulok',
			'content' => 'wamur/additional',
		];
		$this->load->view('layout', $data);
	}
	public function tahfidz()
	{
		$nis = $this->session->userdata('email');
		$this->db->order_by('id', 'DESC');
		$foto = $this->M_wamur->getAll('99_tahfidz', $nis)->result_array();
		$data = [
			'judul' => 'Tahfidz',
			'foto' => $foto,
			'kategori' => 'tahfidz',
			'content' => 'wamur/additional',
		];
		$this->load->view('layout', $data);
	}
	public function aksi_upload($kategori)
	{
		$nis = $this->session->userdata('email');
		if (!empty($_FILES['image']['name'])) {
			$config['upload_path'] = 'assets/' . $kategori . '/';
			$config['allowed_types'] = '*';
			$config['max_size'] = 20000;
			$config['file_name'] = $nis . '-' . time();
			// $config['file_name'] = $this->input->post('nik');

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				$this->session->set_flashdata('gagal-input', 'ok');
				echo "<script>window.location.href='javascript:history.back(-1);'</script>";
			} else {
				$this->upload->data();
				$this->session->set_flashdata('error', '<br><i><small class="text-success">Berhasil Upload foto', '</small></i>');
				$gbr = $this->upload->data();

				$nama = $config['file_name'] . $gbr['file_ext'];
				$data = [
					'id_siswa' => $nis,
					'id_kelas' => $this->session->userdata('kelas'),
					'date_created' => time(),
					'judul' => $this->input->post('judul'),
					'keterangan' => $this->input->post('keterangan'),
					'nama_file' => $nama,
				];
				$table = '99_' . $kategori;
				$this->db->insert($table, $data);
				$this->session->set_flashdata('ditambah', 'ok');
				echo "<script>window.location.href='javascript:history.back(-1);'</script>";
			}
		}
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
		redirect('wamur/' . $kategori);
	}
	public function edit($id, $kategori)
	{
		$table = '99_' . $kategori;
		$data['ediD'] = $this->db->get_where($table, [
			'id' => $id,
		])->row();
		$data['kategori'] = $kategori;

		$this->load->view('wamur/edit', $data);
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
		echo "<script>window.location.href='javascript:history.back(-1);'</script>";
	}
	function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('keluar', 'ok');
		redirect(base_url('auth'));
	}
	public function embed($kategori)
	{
		$data = [
			'judul' => 'Embed Dari Youtube',
			'content' => 'wamur/embed',
			'kategori' => $kategori
		];
		$this->load->view('layout', $data);
	}
	public function aksiEmbed($kategori)
	{
		$judul = $this->input->post('judul');

		$keterangan = $this->input->post('ket');
		$kode = $this->input->post('kode');
		$nis = $_SESSION['email'];

		$x = [
			'judul' => $judul,
			'keterangan' => $keterangan,
			'nama_file' => 'mbd',
			'jenis_file' => $kode,
			'id_siswa' => $nis,
			'id_kelas' => $this->session->userdata('kelas'),
			'date_created' => time(),
		];

		$this->db->insert('99_' . $kategori, $x);
		redirect('wamur/' . $kategori);
	}
}
