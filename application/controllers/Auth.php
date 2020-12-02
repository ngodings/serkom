<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User');
        $this->load->database();
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $data['judul'] = 'Halaman Login';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {

            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
		$password = $this->input->post('password');
		$passwordx = md5($password);

        $user = $this->db->get_where('user', [
            'email' => $email
        ])->row_array();

        // JIKA USER ADA
        if ($user) {
            
                if ($passwordx) { //password_verify($password, $user['password'])
                    // echo "sama";

                    $data = [
                        'email' => $user['email'],
                        
                    ];
                        redirect('Admin');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                            Password salah!
                                            </div>');
                    redirect('auth');
                }
            
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                            Email belum terdaftar!
                                            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                            Logout berhasil!.
                                            </div>');
        redirect('auth');
    }



    public function regis()
    {
    
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[8]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim');


        if ($this->form_validation->run() == FALSE) {


            $data['judul'] = 'Halaman Registrasi';
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/regis', $data);
            $this->load->view('template/auth_footer');
        } else {
            $data = [
                //'id_user' => $this->input->post('id_user'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password1'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                            Selamat! Registrasi berhasil.
                                            </div>');
            redirect('auth');
        }
    }
}
