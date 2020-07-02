<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    public function register()
    {
        $data = array(
            'nama' => $this->input->post('nama',true),
            'username' => $this->input->post('username','true'),
            'password' => password_hash($this->input->post('password',true), PASSWORD_DEFAULT),
            'alamat' => $this->input->post('alamat',true),
            'notelp' => $this->input->post('nohp',true),
            'role' => 'karyawan'
        );
        $this->db->insert('tbl_user',$data);
    }
    public function get_admin()
    {
        $data = $this->db->get_where('tbl_user', ['role' => 'admin']);
        return $data->result_array();
    }
}
?>
