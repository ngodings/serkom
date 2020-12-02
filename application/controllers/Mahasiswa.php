<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MahasiswaM', '', TRUE);
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
    }
    public function index()
    {
        $data['judul'] = "Data Mahasiswa";
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $data['mahasiswa'] = $this->MahasiswaM->getAllMahasiswa()->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('admin/mahasiswa/index', $data);
        $this->load->view('template/footer');
    }

	public function tambah()
    {
        $data['judul'] = "Tambah Data Mahasiswa";
        $data['user'] = $this->db->get_where('user', [
            'email' => $this->session->userdata('email')
        ])->row_array();

       
        $this->form_validation->set_rules('nama', 'nim',  'required');


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/mahasiswa/tambah', $data);
            $this->load->view('template/footer');
        } else {
			$nama = $this->input->post('nama');
            // $email = $this->input->post('email');
            // $id_user = $this->input->post('id');

            //cek gambar
            $foto = $_FILES['foto'];
            // var_dump($foto);
            // die;

            if ($nama) {
                $config['allowed_types'] = 'gif|jpg';
                $config['max_size'] = '60000';
                $config['allowed_types'] = 'gif|jpg';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $nama_baru = $this->upload->data('file_name');
                    $this->db->set('foto', $nama_baru);
                } else {
                    echo $this->upload->display_errors();
                }
            
                $this->MahasiswaM->tambah();
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                            Tambah data mahasiswa berhasil!
                                            </div>');
                redirect('mahasiswa');
            }
        }
	}
	public function edit($id)
    {
        $this->load->model('MahasiswaM');

        $this->form_validation->set_rules('nama', 'nim', 'required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Form Edit";

            $data['user'] = $this->db->get_where('user', [
                'email' => $this->session->userdata('email')
            ])->row_array();
            $data['mahasiswa'] = $this->MahasiswaM->getIdMahasiswa($id)->row_array();

        
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/topbar', $data);
            $this->load->view('admin/mahasiswa/edit', $data);
            $this->load->view('template/footer');
        } else {
            $nama = $this->input->post('nama');
            // $email = $this->input->post('email');
            // $id_user = $this->input->post('id');

            //cek gambar
            $foto = $_FILES['foto'];
            // var_dump($foto);
            // die;

            if ($nama) {
                $config['allowed_types'] = 'gif|jpg';
                $config['max_size'] = '60000';
                $config['allowed_types'] = 'gif|jpg';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $nama_baru = $this->upload->data('file_name');
                    $this->db->set('foto', $nama_baru);
                } else {
                    echo $this->upload->display_errors();
                }
                $this->MahasiswaM->edit();
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                            Update data mahasiswa berhasil!
                                            </div>');

                redirect('mahasiswa');
                // // $this->TransaksiM->edit();
            // echo "berhasil";
            }
        }
    }
	public function hapus($id)
    {
        $this->MahasiswaM->hapusDataMahasiswa($id);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                            Hapus data mahasiswa berhasil!
                                            </div>');
        redirect('mahasiswa');
	}
	
	public function search(){
		// Ambil data 
		$keyword = $this->input->post('keyword');
		$mahasiswa = $this->MahasiswaM->search($keyword);
		
		
		$hasil = $this->load->view('view', array('mahasiswa'=>$mahasiswa), true);
		
		// Buat sebuah array
		$callback = array(
		  'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
		);
		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	  }
}
