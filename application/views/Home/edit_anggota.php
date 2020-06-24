<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Anggota</h1>
		</div>

		<div class="section-body">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4>Anggota</h4>
								<div class="card-header-action">
									<a href="<?=base_url('dashboard/anggota')?>" class="btn btn-primary">
										Kembali
									</a>
								</div>
							</div>
							<div class="card-body">
								<form action="<?=base_url('dashboard/proses_editanggota')?>" method="POST">
									<div class="modal-body">
										<div class="form-group">
											<label>Nama</label>
											<input type="hidden" name="id" value="<?=$anggota->id_anggota?>">
											<input type="text" name="nama" class="form-control"
												value="<?=$anggota->nama?>">
										</div>
										<div class="form-group">
											<label>Alamat</label>
											<textarea name="alamat" class="form-control"><?=$anggota->alamat?></textarea>
										</div>
										<div class="form-group">
											<label>No Telepon</label>
											<input type="number" name="no_telepon" class="form-control"
												value="<?=$anggota->no_telepon?>">
										</div>
									</div>
									<div class="modal-footer">
										<input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
										<input type="submit" name="edit" class="btn btn-success" value="Edit">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>
