<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Edit Buku</h1>
		</div>

		<div class="section-body">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<h4>Buku</h4>
								<div class="card-header-action">
									<a href="<?=base_url('dashboard/buku')?>" class="btn btn-primary">
										Kembali
									</a>
								</div>
							</div>
							<div class="card-body">
								<form action="<?=base_url('dashboard/proses_editbook')?>" method="POST">
									<div class="modal-body">
										<div class="form-group">
											<label>NBSN</label>
											<input type="number" name="nbsn" class="form-control"
												value="<?=$buku->nbsn?>" readonly>
										</div>
										<div class="form-group">
											<label>Judul</label>
											<input type="text" name="judul" class="form-control"
												value="<?=$buku->judul?>">
										</div>
										<div class="form-group">
											<label>Pengarang</label>
											<input type="text" name="pengarang" class="form-control"
												value="<?=$buku->pengarang?>">
										</div>
										<div class="form-group">
											<label>Penerbit</label>
											<input type="text" name="penerbit" class="form-control"
												value="<?=$buku->penerbit?>">
										</div>
										<div class="form-group">
											<label>Tahun</label>
											<input type="number" name="tahun" class="form-control"
												value="<?=$buku->tahun?>">
										</div>
										<div class="form-group">
											<label>Stok</label>
											<input type="number" name="stok" class="form-control"
												value="<?=$buku->stok?>">
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
