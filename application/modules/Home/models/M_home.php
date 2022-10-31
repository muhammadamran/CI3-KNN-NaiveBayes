<?php
class M_home extends CI_Model
{

    // TOTAL EMPLOYEE
    public function get_total_employee()
    {
        return $this->db->query("SELECT COUNT(*) AS total_employee FROM tbl_employee")->result();
    }
}
