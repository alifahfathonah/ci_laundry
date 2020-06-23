<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laundry extends CI_Model {
    function __construct(){
        $this->load->database();
    }
    public function lihat_jenis()
    {
        $data = $this->db->get('tbl_paketLaundry')->result_array();
        return $data;
    }
    public function insertJenis()
    {
        $data = array(
            'jenis' => $this->input->post('jenis'),
            'harga' => $this->input->post('harga')
        );
        $this->db->insert('tbl_paketLaundry',$data);
    }
}