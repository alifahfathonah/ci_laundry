<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laundry extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laundry');
        $this->load->model('m_customer');
        $this->load->model('m_invoice');
    }
    // Fungsi Untuk Menampilkan Seluruh Data Jenis Laundry
    public function jenis_laundry()
    {
        $data['title'] = 'Lihat Jenis Laundry';
        $data['jenis'] = $this->m_laundry->lihat_jenis();
        $this->load->view('template/header',$data);
        $this->load->view('laundry/lihat_jenis',$data);
        $this->load->view('template/footer');
    }
    // Fungsi Untuk Mengakses Halaman Tambah Jenis Laundry
    public function tambahJenis()
    {
        $this->form_validation->set_rules('jenis','Jenis', 'required|trim');
        $this->form_validation->set_rules('harga','Harga', 'required|trim|numeric');
        if ($this->form_validation->run() == False) {
            $data['title'] = 'Tambah Jenis Laundry';
            $this->load->view('template/header',$data);
            $this->load->view('laundry/tambah_jenis');
            $this->load->view('template/footer');
        }else{
            $this->m_laundry->insertJenis();
            $this->session->set_flashdata('message','<div class="alert alert-success">Berhasil Menambah Data</div>');
            redirect('laundry/jenis_laundry');
        }
    }
    // Fungsi Untuk Mengakses Tambah Transaksi
    public function tambahTransaksi()
    {
        $this->form_validation->set_rules('invoice', 'Invoice', 'required|trim');
        $this->form_validation->set_rules('customer', 'Nama Customer', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Paket Laundry', 'required|trim');
        $this->form_validation->set_rules('berat', 'Berat Cucian', 'required|trim|numeric');
        $this->form_validation->set_rules('tanggalAmbil', 'Tanggal Ambil', 'required|trim');
        $this->form_validation->set_rules('statusBayar', 'Status Pembayaran', 'required|trim');
        if ($this->form_validation->run() == False) {
            $kode = $this->m_invoice->cekInvoice();
            $kodeSekarang = $this->m_invoice->cekKode($kode);
            $data['title'] = 'Tambah Transaksi';
            $data['customer'] = $this->m_customer->get_customer();
            $data['paket'] = $this->m_laundry->lihat_jenis();
            $data['invoice'] = $kodeSekarang;
            $this->load->view('template/header',$data);
            $this->load->view('laundry/tambah_transaksi',$data);
            $this->load->view('template/footer');
        }else{
            $this->m_laundry->simpanTransaksi();
            redirect('home');
        }
    }
    // Fungsi Untuk menampilkan Halaman Data Transaksi
    public function lihatTransaksi()
    {
        $data['title'] = 'Lihat Transaksi';
        $data['transaksi'] = $this->m_laundry->lihat_transaksi();
        $this->load->view('template/header',$data);
        $this->load->view('laundry/lihat_transaksi',$data);
        $this->load->view('template/footer');
    }
    // Fungsi Untuk Menampilkan Detail Transaksi
    public function detail($invoice)
    {
        $data['title'] = 'Detail Laundry';
        $data['transaksi'] = $this->m_laundry->detailTransaksi($invoice);
        $this->load->view('template/header',$data);
        $this->load->view('laundry/detailTransaksi',$data);
        $this->load->view('template/footer');
    }
    // Fungsi Untuk Melakukan Update Detail Transaksi
    public function updateDetail($invoice)
    {
        $this->m_laundry->updateDetail($invoice);
        redirect('laundry');
    }
    // Fungsi Untuk Mencetak Invoice
    public function laporanPdf($invoice)
    {
        $data['transaksi'] = $this->m_laundry->detailTransaksi($invoice);
        $this->load->library('pdf');
        $this->pdf->setPaper('A5', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('laporan/laporan_pdf', $data);
    }
}