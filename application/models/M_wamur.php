<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_wamur extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getAll($table, $nis)
  {
    return $this->db->get_where($table, ['id_siswa' => $nis]);
  }
  //ambil data mahasiswa dari database
  function get_lifeskill_list($limit, $start)
  {
    $query = $this->db->get('99_lifeskill', $limit, $start);
    return $query;
  }

  public function tampil()
  {
    $query = $this->db->get('99_lifeskill');
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return array();
    }
  }

  public function per_id($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('99_lifeskill');
    return $query;
  }
}
