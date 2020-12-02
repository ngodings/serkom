    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="card shadow mt-3 col-lg-4">
            <h1 class="h3 my-4 text-gray-800"><?= $judul; ?></h1>
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= form_open_multipart('Mahasiswa/edit/' . $mahasiswa['id']); ?>
                <div class="form-group mt-3">
                    <label for="id">ID</label>
                    <input type="text" name="id" value="<?php echo $mahasiswa['id']; ?>" class="form-control" id="id" readonly>
				</div>
				<div class="form-group mt-3">
                    <label for="nim">NIM</label>
                    <input type="text" name="nim" value="<?php echo $mahasiswa['nim']; ?>" class="form-control" id="nim">
                </div>
                <div class="form-group mt-3">
                    <label for="nama">Nama Mahasiswa</label>
                    <input type="text" name="nama" value="<?php echo $mahasiswa['nama']; ?>" class="form-control" id="nama">
				</div>
				<div class="form-group mt-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="<?php echo $mahasiswa['tempat_lahir']; ?>" class="form-control" id="tempat_lahir">
				</div>
				<div class="form-group mt-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="<?php echo $mahasiswa['tanggal_lahir']; ?>" class="form-control" id="tanggal_lahir">
				</div>
				<div class="form-group mt-3">
                    <label for="prodi">Prodi</label>
                    <input type="text" name="prodi" value="<?php echo $mahasiswa['prodi']; ?>" class="form-control" id="prodi">
				</div>
				<div class="form-group mt-3">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" name="fakultas" value="<?php echo $mahasiswa['fakultas']; ?>" class="form-control" id="fakultas">
				</div>
				<div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="foto">
                                <?= form_error('foto', '<small class="text-danger pl-3">', '</small>'); ?>
                                <label class="custom-file-label" for="foto">Pilih Foto</label>
                            </div>
                        </div>
                    </div>
				</div>
			</br>
              
                <button type="submit" class="btn btn-success my-3">Edit</button>
            </form>
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->
    <!-- End of Main Content -->
