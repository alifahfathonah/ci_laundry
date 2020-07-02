<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_karyawan extends CI_Model {
    function __construct(){
        $this->load->database();
    }
    // Fungsi Untuk Mengambil semua Data Karyawan Dari tabel user
    public function get_karyawan()
    {
        $data = $this->db->get_where('tbl_user', ['role' => 'karyawan']);
        return $data->result_array();
    }
    // Fungsi Untuk Mengambil Data Karyawan yang dipilih Dari tabel user
    public function get_karyawanById($id)
    {
        $data = $this->db->get_where('tbl_user', ['id_user' => $id]);
        return $data->row_array();
    }
    // Fungsi Untuk Menghitung total karyawan yang terdaftar
    public function count_karyawan()
    {
        $data = $this->db->get_where('tbl_user', ['role' => 'karyawan'])->num_rows();
        return $data;
    }
    // Fungsi Untuk Mengupdate data karyawan ke database
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
    // Fungsi Untuk menghapus data karyawan
    public function deleteKaryawan($id)
    {
        return $this->db->delete('tbl_user', array('id_user' => $id ));
    }
}
?>
