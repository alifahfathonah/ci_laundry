<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_user');
  }
	public function index()
	{
    if ($this->session->has_userdata('username')) {
      redirect('home');
    }else{
      $this->load->view('auth/login');
    }
    }
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
    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role');
        redirect('login');
    }
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
}
