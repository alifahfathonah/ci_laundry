<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_customer');
        $this->load->model('m_karyawan');
    }
    public function index()
    {
        if (!$this->session->has_userdata('username')) {
            redirect('login');
        }else{
            $data['title'] = 'Dashboard';
            $data['customer'] = $this->m_customer->count_customer();
            $data['karyawan'] = $this->m_karyawan->count_karyawan();
            $this->load->view('template/header',$data);
            $this->load->view('home/home',$data);
            $this->load->view('template/footer');
        }
    }
    public function customer()
    {
        $data['title'] = 'Lihat Customer';
        $data['customer'] = $this->m_customer->get_customer();
        $this->load->view('template/header',$data);
        $this->load->view('customer/lihat_customer',$data);
        $this->load->view('template/footer');
    }
    public function tambah_customer()
    {
        $this->form_validation->set_rules('nama','Nama', 'required|trim');
        $this->form_validation->set_rules('alamat','Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp','Nomor Hp', 'required|trim|numeric');
        if ($this->form_validation->run() == False) {
            $data['title'] = 'Tambah Customer';
            $this->load->view('template/header',$data);
            $this->load->view('customer/tambah-customer');
            $this->load->view('template/footer');
        }else{
            $this->m_customer->tambah_customer();
            $this->session->set_flashdata('message','<div class="alert alert-success">Berhasil Menambah Data</div>');
            redirect('home/customer');
        }
    }
    public function hapusCustomer($id)
    {
        $this->m_customer->deleteCustomer($id);
        $this->session->set_flashdata('message','<div class="alert alert-success">Berhasil Mengahapus Data</div>');
        redirect('home/customer');
    }
    public function editCustomer($id)
    {
        $this->form_validation->set_rules('nama','Nama', 'required|trim');
        $this->form_validation->set_rules('alamat','Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp','Nomor Hp', 'required|trim|numeric');
        if ($this->form_validation->run() == False) {
            $data['title'] = 'Tambah Customer';
            $data['customer'] = $this->m_customer->detailCustomer($id);
            $this->load->view('template/header',$data);
            $this->load->view('customer/edit_customer',$data);
            $this->load->view('template/footer');
        }else{
            $this->m_customer->updateCustomer($id);
            $this->session->set_flashdata('message','<div class="alert alert-success">Berhasil Mengubah Data</div>');
            redirect('home/customer');
        }
    }
}
