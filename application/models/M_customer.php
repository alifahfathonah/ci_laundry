<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {
    function __construct(){
        $this->load->database();
    }
    // Fungsi Untuk Mengambil Data Customer dan Mendapatkan nya dalam Bentuk Array
    public function get_customer()
    {
        $data = $this->db->get('tbl_customer')->result_array();
        return $data;
    }
    // fungsi Untuk Menghitung total customer yang terdaftar
    public function count_customer()
    {
        $data = $this->db->get('tbl_customer')->num_rows();
        return $data;
    }
    // Fungsi Untuk Meng-insert data customer kedalam database
    public function tambah_customer()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('nohp'),
        );
        $this->db->insert('tbl_customer',$data);
    }
    // Fungsi Untuk Mengambil Data customer yang Dipilih
    public function detailCustomer($id)
    {
        $data = $this->db->get_where('tbl_customer', ['id_customer' => $id])->row_array();
        return $data;
    }
    // Fungsi Untuk melakukan Update Customer di database
    public function updateCustomer($id)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('nohp'),
        );
        $this->db->where('id_customer',$id);
        $this->db->update('tbl_customer',$data);
    }
    // fungsi untuk menghapus Data customer dari tabel
    public function deleteCustomer($id)
    {
        return $this->db->delete('tbl_customer', array('id_customer' => $id ));
    }
}
?>
