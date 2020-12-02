<?php

class MahasiswaM extends CI_Model
{

    public function getAllMahasiswa()
    {
        $query = $this->db->get('mahasiswa');
        return $query;
    }
    public function getIdJadwal($id)
    {
        $query = $this->db->get_where('mahasiswa', [
            'id' => $id
        ]);
        return $query;
    }


    public function hapusDataMahasiswa($id)
    {
		$this->db->from("mahasiswa");
		$this->db->where("id", $id);
		$this->db->delete("mahasiswa");
        
    }


    public function edit()
    {
	   $id = $this->input->post('id');
	   $nim = $this->input->post('nim');
	   $nama = $this->input->post('nama');
	   $tempat_lahir = $this->input->post('tempat_lahir');
	   $tanggal_lahir = $this->input->post('tanggal_lahir');
	   $prodi = $this->input->post('prodi');
	   $fakultas = $this->input->post('fakultas');
	
		$data = [
			'id' => $id,
			'nim' => $nim,
			'nama' => $nama,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'prodi' => $prodi,
			'fakultas' => $fakultas

		];

		$this->db->where('id', $id);
		$this->db->update('mahasiswa', $data);
	
	
	}

    public function getIdMahasiswa($id)
    {
        $query = $this->db->get_where('mahasiswa', [
            'id' => $id
        ]);
        return $query;
    }

    public function tambah(){
        //$data['kodeunik'] = $this->buat_kode();
        $data = [

			
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tanggal_lahir'),
			'prodi' => $this->input->post('prodi'),
			'fakultas' => $this->input->post('fakultas')
            
            
        ];

		$this->db->insert('mahasiswa', $data);
		
	}
			
	
	
}
