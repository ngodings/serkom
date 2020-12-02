<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

  <a href="<?php echo base_url('mahasiswa/tambah') ?>" class="btn btn-primary my-3"> Tambah Data</a>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?= $this->session->flashdata('pesan'); ?>
      <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
    </div>
		

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nim</th>
							<th>Nama</th>
							<th>Tempat Lahir</th>
							<th>Tanggal Lahir</th>
							<th>Prodi</th>
							<th>Fakultas</th>
							<th>Foto</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($mahasiswa as $row) : ?>
              <tr>
                <td width="150">
                  <?= $row['id']; ?>
                </td>
                <td>
                  <?= $row['nim']; ?>
                </td>
                <td>
                  <?= $row['nama']; ?>
								</td>
								<td>
                  <?= $row['tempat_lahir']; ?>
								</td>
								<td>
                  <?= $row['tanggal_lahir']; ?>
								</td>
								<td>
                  <?= $row['prodi']; ?>
								</td>
								<td>
                  <?= $row['fakultas']; ?>
								</td>
								<td>
                    <img style="width:100px;height:100px;" src="<?= base_url('assets/img/profile/') . $row['foto']; ?>">
                </td>
                <td width="250">
                  <a href="<?php echo site_url('mahasiswa/edit/' . $row['id']) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                  <a href="<?php echo site_url('mahasiswa/hapus/' . $row['id']) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>

          </tbody>

        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
