<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customer extends CI_Model {
    function __construct(){
        $this->load->database();
    }
    public function get_customer()
    {
        $data = $this->db->get('tbl_customer')->result_array();
        return $data;
    }
    public function count_customer()
    {
        $data = $this->db->get('tbl_customer')->num_rows();
        return $data;
    }
    public function tambah_customer()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('nohp'),
        );
        $this->db->insert('tbl_customer',$data);
    }
    public function detailCustomer($id)
    {
        $data = $this->db->get_where('tbl_customer', ['id_customer' => $id])->row_array();
        return $data;
    }
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
    public function deleteCustomer($id)
    {
        return $this->db->delete('tbl_customer', array('id_customer' => $id ));
    }
}
?>
