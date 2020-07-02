<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {
    function __construct(){
        $this->load->database();
    }
    public function get_karyawan()
    {
        $data = $this->db->get_where('tbl_user', ['role' => 'karyawan']);
        return $data->result_array();
    }
    public function get_karyawanById($id)
    {
        $data = $this->db->get_where('tbl_user', ['id_user' => $id]);
        return $data->row_array();
    }
    public function count_karyawan()
    {
        $data = $this->db->get_where('tbl_user', ['role' => 'karyawan'])->num_rows();
        return $data;
    }
    public function updateKaryawan($id)
    {
        $data = array(
            'nama' => $this->input->post('nama',true),
            'username' => $this->input->post('username','true'),
            'alamat' => $this->input->post('alamat',true),
            'notelp' => $this->input->post('nohp',true),
        );
        $this->db->where('id_user', $id);
        return $this->db->update('tbl_user',$data);
    }
    public function deleteKaryawan($id)
    {
        return $this->db->delete('tbl_user', array('id_user' => $id ));
    }
}
?>
