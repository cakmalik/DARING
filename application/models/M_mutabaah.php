<?php
defined('BASEPATH') or exit('TIDAK DI IZINKAN AKSES, COK');
class M_mutabaah extends CI_Model
{
    public $table = 'mutabaah';

    public function joinBos($nis)
    {
        // $this->db->select('*');
        $this->db->where('nis', $nis);
        $this->db->from('99_mutabaah');
        $this->db->join('99_kategori_mutabaah', '99_mutabaah.id_kategori=99_kategori_mutabaah.id_kategori');
        $this->db->join('88_kelas', '99_mutabaah.id_kelas=88_kelas.id_kelas');
        return $this->db->get();
    }
}
