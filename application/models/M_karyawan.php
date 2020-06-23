<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {
    function __construct(){
        $this->load->database();
    }
    public function get_karyawan()
    {
        $data = $this->db->get_where('tbl_user', ['role' => 'karyawan']);
        return $data;
    }
    public function count_karyawan()
    {
        $data = $this->db->get_where('tbl_user', ['role' => 'karyawan'])->num_rows();
        return $data;
    }
}
?>
