<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
	<div class="card-body p-0">
		<!-- Nested Row within Card Body -->
		<div class="row">
			<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
			<div class="col-lg-7">
				<div class="p-5">
					<div class="text-center">
						<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
					</div>
					<form class="user" method="POST" action="<?= base_url('auth/regis') ?>">
						<div class="form-group">
							<input type="text" name="email" value="<?= set_value('email') ?>" class="form-control form-control-user" id="email" placeholder="Alamat Email">
							<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group row">
							<div class="col-sm-6 mb-3 mb-sm-0">
								<input type="password" name="password1" class="form-control form-control-user" id="password1" placeholder="Password">
								<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="col-sm-6">
								<input type="password" name="password2" class="form-control form-control-user" id="password2" placeholder="Konfirmasi Password">
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-user btn-block">
							Daftar
						</button>
					</form>
					<hr>
					<div class="text-center">
						<a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Login!</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
