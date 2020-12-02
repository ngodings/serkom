<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        
        $this->load->model('MahasiswaM');

        $data['jumlahM'] = $this->MahasiswaM->getAllMahasiswa()->num_rows();
       
        
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();
        // echo 'selamat datang ' . $data['user']['nama'];


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }

   
}
