<?php
class M_login extends CI_Model
{

    public function cek_login($table, $data)
    {
        $query = $this->db->get_where($table, $data);

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_statususer_pegawai($username)
    {
        return $this->db->query("SELECT status_user FROM bulog_user
            WHERE username='$username'")->result();
    }

    public function get_pegawai($username)
    {
        return $this->db->query("SELECT *,
            c.id AS id_provinsi,c.name AS nm_provinsi,
            d.id AS id_kotakab,d.name AS nm_kotakab,
            e.id AS id_kecamatan,e.name AS nm_kecamatan,
            f.id AS id_kelurahan,f.name AS nm_kelurahan  
            FROM bulog_pegawai AS a
            JOIN bulog_departemen AS b ON a.DepartemenID=b.DepartemenID
            LEFT OUTER JOIN provinces AS c ON a.Provinsi=c.id 
            LEFT OUTER JOIN regencies AS d ON a.KotaKab=d.id
            LEFT OUTER JOIN districts AS e ON a.Kecamatan=e.id
            LEFT OUTER JOIN villages AS f ON a.Kelurahan=f.id
            WHERE a.Login='$username'")->result();
    }

    public function get_role($username)
    {
        return $this->db->query("SELECT Role FROM bulog_user
            WHERE username='$username'")->result();
    }


}
