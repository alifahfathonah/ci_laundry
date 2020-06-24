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
    public function total($id_paket,$berat)
    {
        $harga = $this->db->get_where('tbl_paketLaundry', ['id_paket' => $id_paket])->row_array();
        $total = $harga['harga'] * $berat;
        return $total;
    }
    public function simpanTransaksi()
    {
        $transaksi = array(
            'no_invoice' => $this->input->post('invoice'),
            'id_customer' => $this->input->post('customer'),
            'id_paket' => $this->input->post('jenis'),
            'tanggal_order' => date('Y-m-d'),
            'tanggal_ambil' => $this->input->post('tanggalAmbil'),
        );
        $total = $this->total($transaksi['id_paket'],$this->input->post('berat'));
        $detail = array(
            'no_invoice' => $this->input->post('invoice'),
            'status_order' => 'Baru',
            'status_pembayaran' => $this->input->post('statusBayar'),
            'beratCucian' => $this->input->post('berat'),
            'total' => $total,
        );
        $this->db->insert('tbl_transaksi',$transaksi);
        $this->db->insert('tbl_detailTransaksi',$detail);
    }
    public function lihat_transaksi()
    {
        $this->db->select('tbl_customer.nama, tbl_customer.id_customer, tbl_paketLaundry.id_paket, tbl_paketLaundry.jenis, tbl_transaksi.*, tbl_detailTransaksi.no_invoice, tbl_detailTransaksi.status_order, tbl_detailTransaksi.status_pembayaran, tbl_detailTransaksi.total, tbl_transaksi.tanggal_order');
        $this->db->from('tbl_transaksi');
        $this->db->join('tbl_customer', 'tbl_transaksi.id_customer = tbl_customer.id_customer');
        $this->db->join('tbl_paketLaundry', 'tbl_transaksi.id_paket = tbl_paketLaundry.id_paket');
        $this->db->join('tbl_detailTransaksi', 'tbl_transaksi.no_invoice = tbl_detailTransaksi.no_invoice');
        $data = $this->db->get();
        return $data->result_array();
    }

}