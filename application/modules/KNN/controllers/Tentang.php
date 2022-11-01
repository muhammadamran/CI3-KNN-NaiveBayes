<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{

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
      redirect('SignIn');
    } else if ($this->session->userdata('username') != NULL) {

      $value = '';

      $this->load->view('include/head');
      $this->load->view('include/alert');
      $this->load->view('include/top-header');
      $this->load->view('include/sidebar', $value);
      $this->load->view('tentang', $value);
      $this->load->view('include/footer');
    }
  }
}
