<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invoice extends CI_Model {
    public $nomorInvoice;
    function __construct(){
        $this->load->database();
    }
    // fungsi untuk mengecek Invoice
    public function cekInvoice()
    {
        $this->db->select('no_invoice');
        $this->db->order_by('no_invoice', 'DESC');
        $this->db->from('tbl_transaksi');
        $data = $this->db->get();
        if ($data->num_rows() == 0) {
            $nomor = 'TRS-0001';
        }else{
            $no = $data->row_array();
            $nomor = $no['no_invoice'];
        }
        return $nomor;
    }
    // Fungsi Untuk Generate Kode Invoice
    public function cekKode($kode)
    {
        $kodeUrut =(int) substr($kode,4,4);
        $kodeUrut++;
        $huruf = "TRS-";
        $kodebarang = $huruf . sprintf("%04s",$kodeUrut);
        return $kodebarang;
    }
}