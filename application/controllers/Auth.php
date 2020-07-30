<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('auth/auth_header');
		$this->load->view('auth/login');
		$this->load->view('auth/auth_footer');
	}

	public function aksilogin()
	{
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('fail-login', 'Gagal!');
			redirect('auth');
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$email = htmlspecialchars($this->input->post('email', true));
		$password = $this->input->post('password');
		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		$guru = $this->db->get_where('88_guru', ['id_guru' => $email])->row_array();
		if ($user) {
			//jika aktif
			if ($user['is_active'] == 1) {
				//cek password
				if (password_verify($password, $user['password'])) {
					//siapkan data
					$data = [
						'name' => $user['name'],
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'image' => $user['image'],
					];
					//simpan ke session
					$this->session->set_userdata($data);
					$this->session->set_flashdata('login-success');

					//penentuan arah redirect
					$this->db->where('role_id', $user['role_id']);
					$arah = $this->db->get('user_arah_login')->row();

					redirect($arah->arah_login, $data);
				} else {
					$this->session->set_flashdata('fail-login', 'Gagal!');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('fail-login', 'Gagal!');
				redirect('auth');
			}
		} else if ($guru) {
			if ($guru['password'] == $password) {
				$data = [
					'name' => $guru['nama_guru'],
					'email' => $guru['id_guru'],
					'role_id' => $guru['role_id'],
					'image' => $guru['foto'],
					'id_kelas' => $guru['id_kelas'],
				];
				//simpan ke session
				$this->session->set_userdata($data);
				$this->session->set_flashdata('login-success');
				//penentuan arah redirect
				$this->db->where('role_id', $guru['role_id']);
				$arah = $this->db->get('user_arah_login')->row();
				redirect($arah->arah_login, $data);
			} else {
				$this->session->set_flashdata('fail-login', 'Gagal!');
				redirect('auth');
			}
		} else {
			$user = $this->db->get_where('88_siswa', ['nis' => $email])->row_array();
			if ($user['password'] == $password) {
				//siapkan data
				$data = [
					'name' => $user['name'],
					'email' => $user['nis'],
					'role_id' => $user['role_id'],
					'image' => $user['foto'],
					'kelas' => $user['id_kelas'],
				];
				//simpan ke session
				$this->session->set_userdata($data);
				$this->session->set_flashdata('login-success');

				//penentuan arah redirect
				$this->db->where('role_id', $user['role_id']);
				$arah = $this->db->get('user_arah_login')->row();
				redirect('wamur', $data);
			} else {
				$this->session->set_flashdata('fail-login', 'Gagal!');
				redirect('auth');
			}
		}
	}
	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email Sudah terpakai'
		]);
		$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too Short!'
		]);
		$this->form_validation->set_rules('password2', 'password2', 'required|trim|min_length[3]|matches[password]');


		if ($this->form_validation->run() == false) {
			$data['title'] = 'BAKID Registration';
			$this->load->view('templates/head');
			$this->load->view('templates/side');
			$this->load->view('user/user_list');
			$this->load->view('templates/foot');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'user.jpg',
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'role_id' => $this->input->post('role'),
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil, Silahkan Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>');
			redirect('welcome');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu Berhasil keluar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button></div>');
		redirect('auth');
	}
	public function blocked()
	{
		$this->load->view('auth/blocked');
	}	public function mainte()
	{
	    redirect('https://datasysbd.com/wp-content/uploads/2018/07/support-and-maintenance.gif');
	   // redirect('https://cdn.dribbble.com/users/572419/screenshots/4909082/maintenance.gif');
	   // redirect('https://i.pinimg.com/originals/4d/a1/ad/4da1ad7c96b1c208e5178e311d90a494.gif');
// 	redirect('https://i.pinimg.com/originals/cf/6f/cf/cf6fcf14be2cd01dd4923b36445ca632.gif');
// redirect('https://i.pinimg.com/originals/d7/78/de/d778de8d75e8fb0b18b87a7b3653fd26.gif');
// $this->load->view('mainte');
	}
}
