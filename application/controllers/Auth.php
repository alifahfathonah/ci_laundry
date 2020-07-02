<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
  }
  // fungsi untuk mengakses default index Kehalaman Login
	public function index()
	{
    if ($this->session->has_userdata('username')) {
      redirect('home');
    }else{
      $this->load->view('auth/login');
    }
  }
  // Fungsi Untuk Mengakses Menu Login
    public function login()
    {
      if ($this->session->has_userdata('username')) {
        redirect('home');
      }else{
        $this->form_validation->set_rules('username','Username', 'required|trim]');
        $this->form_validation->set_rules('password','Password','required|trim');
        if ($this->form_validation == FALSE) {
          $this->load->view('auth/login');
        }else{
          $this->_masuk();
        }
      }
    }
    // Fungsi Backend Untuk Melakukan Login Dan Menambahkan Session
    private function _masuk(){
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $user = $this->db->get_where('tbl_user', ['username' => $username])->row_array();
      if ($user) {
        if (password_verify($password, $user['password'])) {
          $data = [
            'id_user' => $user['id_user'],
            'username' => $user['username'],
            'nama' => $user['nama'],
            'role' => $user['role']
          ];
          $this->session->set_userdata($data);
          redirect('home');
        }else{
          $this->session->set_flashdata('err_message','password salah');
          $this->load->view('auth/login');
        }
      }else{
        $this->session->set_flashdata('err_message','username Tidak Ada');
        $this->load->view('auth/login');
      }
    }
    // FUngsi Untuk Melakukan Logout
    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role');
        redirect('login');
    }
    // Fungsi Untuk Mendaftar Jika Belum Ada Data Admin
    public function register()
    {
      $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
      $this->form_validation->set_rules('username', 'Username', 'required|trim');
      $this->form_validation->set_rules('password', 'Password', 'required|trim');
      $this->form_validation->set_rules('nohp', 'Nomor HP', 'required|trim|numeric');
      if ($this->form_validation->run() === false) {
        $this->load->view('auth/register');
      }else{
        $this->m_user->register();
        redirect('auth');
      }

    }
    public function changePassword()
    {
      $data['title'] = 'Ubah Password';
      $data['user'] = $this->db->get_where('tbl_user',['id_user' => $this->session->userdata['id_user']])->row_array();
      $this->form_validation->set_rules('current_password','Current Password', 'trim|required');
      $this->form_validation->set_rules('password1','New Password', 'trim|required|matches[password2]');
      $this->form_validation->set_rules('password2','Confirm Password', 'trim|required|matches[password1]');
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('template/header',$data);
        $this->load->view('auth/change_password');
        $this->load->view('template/footer');
      }else{
        $password_sekarang = $this->input->post('current_password');
        if (password_verify($password_sekarang, $data['user']['password'])) {
          $password_hash = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
          $this->db->set('password',$password_hash);
          $this->db->where('id_user', $this->session->userdata('id_user'));
          $this->db->update('tbl_user');
          $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Mengubah Password</div>');
          redirect('auth/changePassword');
        }else{
          $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Lama Salah</div>');
          redirect('auth/changePassword');
        }
      }
    }

    // Fungsi Untuk Menampilkan Form Tambah Karyawan Dan Juga Menyyimpan Data Karyawan
    public function tambah_karyawan()
    {
      $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
      $this->form_validation->set_rules('username', 'Username', 'required|trim');
      $this->form_validation->set_rules('password', 'Password', 'required|trim');
      $this->form_validation->set_rules('nohp', 'Nomor HP', 'required|trim|numeric');
      if ($this->form_validation->run() === false) {
        $data['title'] = 'Tambah Karyawan';
        $this->load->view('template/header',$data);
        $this->load->view('karyawan/tambah_karyawan');
        $this->load->view('template/footer',$data);
      }else{
        $this->m_user->register();
        redirect('home');
      }
    }
}
