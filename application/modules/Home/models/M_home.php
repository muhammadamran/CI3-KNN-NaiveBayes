<?php
class M_home extends CI_Model {

  // TOTAL PEGAWAI
  public function get_total_pegawai()
  {
      return $this->db->query("SELECT COUNT(*) AS total_pegawai FROM bulog_pegawai ")->result();
  }

  // TOTAL SPA
  public function get_total_spa()
  {
      return $this->db->query("SELECT COUNT(*) AS total_SPA FROM bulog_spa WHERE take_do='0' ")->result();
  }

  // TOTAL DO
  public function get_total_do()
  {
      return $this->db->query("SELECT COUNT(*) AS total_DO FROM bulog_do ")->result();
  }

  // TOTAL SJ
  public function get_total_sj()
  {
      return $this->db->query("SELECT COUNT(*) AS total_SJ FROM bulog_sj ")->result();
  }

}
?>
