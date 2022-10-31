<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SignIn extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// MODELS
		$this->load->model('M_SignIn');
	}

	public function index()
	{
		$this->load->view('SignIn');
	}

	public function check_signin()
	{
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = array(
				'username' => $username,
				'password' => md5($password),
			);

			$get_validasi_statususer = $this->M_SignIn->get_status_user_employee($username);
			$validasi_statususer_log = $get_validasi_statususer[0]->status_user;

			if ($validasi_statususer_log == '2') {
				$this->session->set_flashdata('n_signin_nonaktif', "Maaf <b>Status User anda</b> di Non-Aktifkan, Silakan hubungi administrator!");
				redirect('SignIn');
			} else {

				$get_validasi = $this->M_SignIn->get_employee($username);
				$validasi_log = $get_validasi[0]->Login;

				if ($validasi_log == NULL) {
					$this->session->set_flashdata('n_signin', "Maaf <b>Data anda</b> tidak terdaftar di kepegawaian, Silakan hubungi administrator!");
					redirect('SignIn');
				} else {

					$cek = $this->M_SignIn->check_signin('tbl_users', $data);

					if (@$cek) {

						$get_employee = $this->M_SignIn->get_employee($cek->username);

						$data_session = array(
							'ID' => $cek->ID,
							'username' => $username,
							'password' => $password,
							'Created_Date' => $cek->Created_Date,
							'Role' => $cek->Role,
							'status_user' => $cek->status_user,
							// GET TABEL TBL_EMPLOYEE
							'Login' => $get_employee[0]->Login,
							'Foto' => $get_employee[0]->Foto,
							'NIK' => $get_employee[0]->NIK,
							'NIP' => $get_employee[0]->NIP,
							'NamaLengkap' => $get_employee[0]->NamaLengkap,
							'GelarDepan' => $get_employee[0]->GelarDepan,
							'GelarBelakang' => $get_employee[0]->GelarBelakang,
							'JenisKelamin' => $get_employee[0]->JenisKelamin,
							'TempatLahir' => $get_employee[0]->TempatLahir,
							'TanggalLahir' => $get_employee[0]->TanggalLahir,
							'Usia' => $get_employee[0]->Usia,
							'Agama' => $get_employee[0]->Agama,
							'StatusNikah' => $get_employee[0]->StatusNikah,
							'GolonganDarah' => $get_employee[0]->GolonganDarah,
							'StatusEmployee' => $get_employee[0]->StatusEmployee,
							'GolonganEmployee' => $get_employee[0]->GolonganEmployee,
							'Tgl_Masuk' => $get_employee[0]->Tgl_Masuk,
							'Tgl_Keluar' => $get_employee[0]->Tgl_Keluar,
							'Alamat' => $get_employee[0]->Alamat,
							'Provinsi' => $get_employee[0]->Provinsi,
							'KotaKab' => $get_employee[0]->KotaKab,
							'Kecamatan' => $get_employee[0]->Kecamatan,
							'Kelurahan' => $get_employee[0]->Kelurahan,
							'KodePOS' => $get_employee[0]->KodePOS,
							'Email' => $get_employee[0]->Email,
							'NoTlpRumah' => $get_employee[0]->NoTlpRumah,
							'NoHP' => $get_employee[0]->NoHP,
							'Created_Date' => $get_employee[0]->Created_Date,
							// LIST ALAMAT
							'id_provinsi' => $get_employee[0]->id_provinsi,
							'nm_provinsi' => $get_employee[0]->nm_provinsi,
							'id_kotakab' => $get_employee[0]->id_kotakab,
							'nm_kotakab' => $get_employee[0]->nm_kotakab,
							'id_kecamatan' => $get_employee[0]->id_kecamatan,
							'nm_kecamatan' => $get_employee[0]->nm_kecamatan,
							'id_kelurahan' => $get_employee[0]->id_kelurahan,
							'nm_kelurahan' => $get_employee[0]->nm_kelurahan
						);

						$data_log = array(
							'username' => $username,
							'role' => $cek->Role,
							'datetime' => date('Y-m-d H:i:s'),
							'status' => 'Login'
						);

						$this->session->set_userdata($data_session);
						$this->db->insert('tbl_log', $data_log);
						$this->session->set_flashdata('s_sigin', $this->input->post('username'));
						redirect('home');
					} else {
						$this->session->set_flashdata('f_sigin', "Maaf <b>Username</b> atau <b>Password</b> Anda salah, Silakan Coba Lagi!");
						redirect('signin');
					}
				}
			}
		}
	}

	public function SignOut($username)
	{
		$get_validasi = $this->M_SignIn->get_role($username);
		$cek_role = $get_validasi[0]->Role;

		$data_log = array(
			'username' => $username,
			'role' => $cek_role,
			'datetime' => date('Y-m-d H:i:s'),
			'status' => 'SignOut'
		);
		$this->db->insert('tbl_log', $data_log);
		$this->session->sess_destroy();
		$this->session->set_flashdata('n_gsignin', 'Anda Berhasil SignOut!');
		redirect('signin');
	}
}
