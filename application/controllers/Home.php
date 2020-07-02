<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_customer');
        $this->load->model('m_karyawan');
        $this->load->model('m_laundry');
        $this->load->model('m_user');
    }
    // Fungsi Untuk Mengakses Dashboard Admin
    public function index()
    {
        if (!$this->session->has_userdata('username')) {
            redirect('login');
        }else{
            $data['title'] = 'Dashboard';
            $data['customer'] = $this->m_customer->count_customer();
            $data['karyawan'] = $this->m_karyawan->count_karyawan();
            $data['order'] = $this->m_laundry->hitungOrder();
            $data['transaksi'] = $this->m_laundry->lihat_transaksi();
            $this->load->view('template/header',$data);
            $this->load->view('home/home',$data);
            $this->load->view('template/footer');
        }
    }
    // fungsi untuk mengakses halaman Lihat Customer
    public function customer()
    {
        $data['title'] = 'Lihat Customer';
        $data['customer'] = $this->m_customer->get_customer();
        $this->load->view('template/header',$data);
        $this->load->view('customer/lihat_customer',$data);
        $this->load->view('template/footer');
    }
    // Fungsi Untuk Mengakses Halaman Tambah Customer
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
    // Fungsi Untuk Melakukan Oper ID customer untuk dihapus
    public function hapusCustomer($id)
    {
        $this->m_customer->deleteCustomer($id);
        $this->session->set_flashdata('message','<div class="alert alert-success">Berhasil Mengahapus Data</div>');
        redirect('home/customer');
    }
    // Fungsi Untuk Mengakses Edit Data Customer
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
    // Fungsi Untuk Mengakses Halaman Lihat Karyawan
    public function LihatKaryawan()
    {
        $data['title'] = 'Lihat Karyawan';
        $data['karyawan'] = $this->m_karyawan->get_karyawan();
        $this->load->view('template/header',$data);
        $this->load->view('karyawan/lihat_karyawan',$data);
        $this->load->view('template/footer');
    }
    // Fungsi Untuk mengakses Halaman Tambah Karyawan
    public function tambahKaryawan()
    {
        $this->form_validation->set_rules('nama','Nama', 'required|trim');
        $this->form_validation->set_rules('username','Alamat', 'required|trim');
        $this->form_validation->set_rules('password',' Password', 'required|trim');
        $this->form_validation->set_rules('alamat','Nomor Hp', 'required|trim');
        $this->form_validation->set_rules('nohp','Nomor Hp', 'required|trim|numeric');
        if ($this->form_validation->run() == False) {
            $data['title'] = 'Tambah Karyawan';
            $this->load->view('template/header',$data);
            $this->load->view('karyawan/tambah_karyawan');
            $this->load->view('template/footer');
        }else{
            $this->m_user->register();
            $this->session->set_flashdata('message','<div class="alert alert-success">Berhasil Menambah Data</div>');
            redirect('home/lihatKaryawan');
        }
    }
    // Fungsi Untuk Mengakses Halaman Edit Karyawan
    public function editKaryawan($id)
    {
        $this->form_validation->set_rules('nama','Nama', 'required|trim');
        $this->form_validation->set_rules('username','Alamat', 'required|trim');
        $this->form_validation->set_rules('alamat','Nomor Hp', 'required|trim');
        $this->form_validation->set_rules('nohp','Nomor Hp', 'required|trim|numeric');
        if ($this->form_validation->run() == False) {
            $data['title'] = 'Tambah Karyawan';
            $data['karyawan'] = $this->m_karyawan->get_karyawanById($id);
            $this->load->view('template/header',$data);
            $this->load->view('karyawan/edit_karyawan',$data);
            $this->load->view('template/footer');
        }else{
            $this->m_karyawan->updateKaryawan($id);
            $this->session->set_flashdata('message','<div class="alert alert-success">Berhasil Mengubah Data</div>');
            redirect('home/lihatKaryawan');
        }
    }
    // fungsi Untuk Mengahpus Data karyawan
    public function hapusKaryawan($id)
    {
        $this->m_karyawan->deleteKaryawan($id);
        $this->session->set_flashdata('message','<div class="alert alert-success">Berhasil Mengahapus Data</div>');
        redirect('home/lihatKaryawan');
    }
    // Fungsi Untuk Melihat Data Admin
    public function LihatAdmin()
    {
        $data['title'] = 'Lihat Admin';
        $data['karyawan'] = $this->m_user->get_admin();
        $this->load->view('template/header',$data);
        $this->load->view('home/lihat_admin',$data);
        $this->load->view('template/footer');
    }
}
