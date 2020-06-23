<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laundry extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_laundry');
    }
    public function jenis_laundry()
    {
        $data['title'] = 'Lihat Jenis Laundry';
        $data['jenis'] = $this->m_laundry->lihat_jenis();
        $this->load->view('template/header',$data);
        $this->load->view('laundry/lihat_jenis',$data);
        $this->load->view('template/footer');
    }
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
}