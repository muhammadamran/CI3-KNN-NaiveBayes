<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// MODELS
		$this->load->model('M_login');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function aksi_login()
	{
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = array(
				'username' => $username,
				'password' => md5($password),
			);

			$get_validasi_statususer = $this->M_login->get_statususer_pegawai($username);
			$validasi_statususer_log = $get_validasi_statususer[0]->status_user;

			if ($validasi_statususer_log == '2') {
				$this->session->set_flashdata('n_sigin_nonaktif', "Maaf <b>Status User anda</b> di Non-Aktifkan, Silakan hubungi administrator!");
				redirect('login');
			} else {

				$get_validasi = $this->M_login->get_pegawai($username);
				$validasi_log = $get_validasi[0]->Login;

				if ($validasi_log == NULL) {
					$this->session->set_flashdata('n_sigin', "Maaf <b>Data anda</b> tidak terdaftar di kepegawaian, Silakan hubungi administrator!");
					redirect('login');
				} else {

					$cek = $this->M_login->cek_login('bulog_user', $data);

					if (@$cek) {

						// var_dump($cek);exit;
						$get_pegawai = $this->M_login->get_pegawai($cek->username);
						// var_dump($get_pegawai[0]->Login);exit;

						$data_session = array(
							'id_pegawai' => $cek->id_pegawai,
							'username' => $username,
							'password' => $password,
							'Created_Date' => $cek->Created_Date,
							'Role' => $cek->Role,
							'status_user' => $cek->status_user,
							// GET TABEL BULOG_PEGAWAI
							'id_pegawai' => $get_pegawai[0]->id_pegawai,
							'Foto' => $get_pegawai[0]->Foto,
							'NIK' => $get_pegawai[0]->NIK,
							'NIP' => $get_pegawai[0]->NIP,
							'NamaLengkap' => $get_pegawai[0]->NamaLengkap,
							'GelarDepan' => $get_pegawai[0]->GelarDepan,
							'GelarBelakang' => $get_pegawai[0]->GelarBelakang,
							'JenisKelamin' => $get_pegawai[0]->JenisKelamin,
							'TempatLahir' => $get_pegawai[0]->TempatLahir,
							'TanggalLahir' => $get_pegawai[0]->TanggalLahir,
							'Usia' => $get_pegawai[0]->Usia,
							'Agama' => $get_pegawai[0]->Agama,
							'StatusNikah' => $get_pegawai[0]->StatusNikah,
							'GolonganDarah' => $get_pegawai[0]->GolonganDarah,
							'DepartemenID' => $get_pegawai[0]->DepartemenID,
							'StatusPegawai' => $get_pegawai[0]->StatusPegawai,
							'GolonganPegawai' => $get_pegawai[0]->GolonganPegawai,
							'Tgl_Masuk' => $get_pegawai[0]->Tgl_Masuk,
							'Tgl_Keluar' => $get_pegawai[0]->Tgl_Keluar,
							'Alamat' => $get_pegawai[0]->Alamat,
							'Provinsi' => $get_pegawai[0]->Provinsi,
							'KotaKab' => $get_pegawai[0]->KotaKab,
							'Kecamatan' => $get_pegawai[0]->Kecamatan,
							'Kelurahan' => $get_pegawai[0]->Kelurahan,
							'KodePOS' => $get_pegawai[0]->KodePOS,
							'Email' => $get_pegawai[0]->Email,
							'NoTlpRumah' => $get_pegawai[0]->NoTlpRumah,
							'NoHP' => $get_pegawai[0]->NoHP,
							'Created_Date' => $get_pegawai[0]->Created_Date,
							'DepartemenID' => $get_pegawai[0]->DepartemenID,
							'NamaDepartemen' => $get_pegawai[0]->NamaDepartemen,
							'KepalaDepartemen' => $get_pegawai[0]->KepalaDepartemen,
							// LIST ALAMAT
							'id_provinsi' => $get_pegawai[0]->id_provinsi,
							'nm_provinsi' => $get_pegawai[0]->nm_provinsi,
							'id_kotakab' => $get_pegawai[0]->id_kotakab,
							'nm_kotakab' => $get_pegawai[0]->nm_kotakab,
							'id_kecamatan' => $get_pegawai[0]->id_kecamatan,
							'nm_kecamatan' => $get_pegawai[0]->nm_kecamatan,
							'id_kelurahan' => $get_pegawai[0]->id_kelurahan,
							'nm_kelurahan' => $get_pegawai[0]->nm_kelurahan
						);

						$data_log = array(
							'username' => $username,
							'role' => $cek->Role,
							'datetime' => date('Y-m-d H:i:s'),
							'status' => 'Login'
						);

						$this->session->set_userdata($data_session);
						$this->db->insert('bulog_log', $data_log);
						$this->session->set_flashdata('s_sigin', $this->input->post('username'));
						redirect('home');
					} else {
						$this->session->set_flashdata('f_sigin', "Maaf <b>Username</b> atau <b>Password</b> Anda salah, Silakan Coba Lagi!");
						redirect('login');
					}
				}
			}
		}
	}

	public function logout($username)
	{
		$get_validasi = $this->M_login->get_role($username);
		$cek_role = $get_validasi[0]->Role;

		$data_log = array(
			'username' => $username,
			'role' => $cek_role,
			'datetime' => date('Y-m-d H:i:s'),
			'status' => 'Logout'
		);
		$this->db->insert('bulog_log', $data_log);
		$this->session->sess_destroy();
		$this->session->set_flashdata('n_glogin', 'Anda Berhasil Logout!');
		redirect('login');
	}
}
