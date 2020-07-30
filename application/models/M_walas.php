<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_walas extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    public function getIDKelas($ik)
    {
        return $this->db->get_where('88_kelas', ['id_kelas' => $ik]);
    }
    public function getWhere($table, $field, $id)
    {
        return $this->db->get_where($table, [$field => $id]);
    }
    public function getSiswa($id)
    {
        return $this->db->get_where('88_siswa', ['nis' => $id]);
    }
}
