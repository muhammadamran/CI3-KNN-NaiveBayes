<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    //LOAD MODELS
    $this->load->model('M_tentang');
    $this->load->model('home/M_home');
  }

  public function index()
  {
    if ($this->session->userdata('username') == NULL) {

      $this->session->set_flashdata('f_role', "Anda belum memulai <b>session</b>!, Silahkan mulai <b>session</b> anda!");
      redirect('login');

    } else if ($this->session->userdata('username') != NULL) {

      $Tpegawai = $this->M_home->get_total_pegawai();
      if ($Tpegawai == NULL) {
        $value['total_pegawai'] = '0';
      } else {
        $value['total_pegawai'] = $Tpegawai[0]->total_pegawai;
      }

      $TSPA = $this->M_home->get_total_spa();
      if ($TSPA == NULL) {
        $value['total_SPA'] = '0';
      } else {
        $value['total_SPA'] = $TSPA[0]->total_SPA;
      }

      $TDO = $this->M_home->get_total_do();
      if ($TDO == NULL) {
        $value['total_DO'] = '0';
      } else {
        $value['total_DO'] = $TDO[0]->total_DO;
      }

      $TSJ = $this->M_home->get_total_sj();
      if ($TSJ == NULL) {
        $value['total_SJ'] = '0';
      } else {
        $value['total_SJ'] = $TSJ[0]->total_SJ;
      }

      $this->load->view('include/head');
      $this->load->view('include/alert');
      $this->load->view('include/top-header');
      $this->load->view('include/sidebar',$value);
      $this->load->view('tentang',$value);
      $this->load->view('include/footer');

    }
  }
}
