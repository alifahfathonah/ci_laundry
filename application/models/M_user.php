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
}
?>
