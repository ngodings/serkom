        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="card shadow mt-3 col-lg-4">
                <!-- Page Heading -->
                <h1 class="h3 my-4 text-gray-800"><?= $judul; ?></h1>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>

                	<?= form_open_multipart('Mahasiswa/tambah'); ?>
                    <div class="form-group mt-3">
                        <label for="nim">Nim Mahasiswa</label>
                        <input type="text" name="nim" class="form-control" id="nim" >
                    </div>
                    <div class="form-group mt-3">
                        <label for="nama">Nama Mahasiswa</label>
                        <input type="text" name="nama" class="form-control" id="nama">
					</div>
					<div class="form-group mt-3">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
					</div>
					<div class="form-group mt-3">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
					</div>
					<div class="form-group mt-3">
                        <label for="prodi">Prodi</label>
                        <input type="text" name="prodi" class="form-control" id="prodi">
					</div>
					<div class="form-group mt-3">
                        <label for="fakultas">Fakultas</label>
                        <input type="text" name="fakultas" class="form-control" id="fakultas">
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
                    
                    <button type="submit" class="btn btn-success mb-3">Tambah</button>
                </form>
            </div>
        </div>
        </div>
        <!-- /.container-fluid -->
        <!-- End of Main Content -->
