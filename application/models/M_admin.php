<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_admin extends CI_Model
{
    function getWhere($field,$value,$table)
    {
        $this->db->where($field,$value);
        return $this->db->get($table);
    }
    public function getTable($table)
    {
        return $this->db->get($table);
    }
}
