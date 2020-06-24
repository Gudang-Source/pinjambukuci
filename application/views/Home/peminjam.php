<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Peminjaman</h1>
		</div>

		<div class="section-body">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php if($this->session->flashdata('berhasil')){ ?>
						<div class="alert alert-primary alert-dismissible show fade">
							<div class="alert-body">
								<button class="close" data-dismiss="alert">
									<span>&times;</span>
								</button>
								<?=$this->session->flashdata('berhasil');?>
							</div>
						</div>
						<?php }?>
						<div class="card">
							<div class="card-header">
								<h4>Data Pinjaman</h4>
								<div class="card-header-action">
									<a href="#tambahbuku" data-toggle="modal" class="btn btn-primary">
										Tambah
									</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table align-items-center table-hover" id="tabel">
										<thead class="thead-light">
											<tr>
												<th>No</th>
												<th>Judul Buku</th>
												<th>Nama Peminjam</th>
												<th>Tgl Pinjam</th>
												<th>Status (klik untuk ubah status)</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
                                                $no=1; 
                                                foreach($peminjam as $data){
                                            ?>
											<tr>
												<td><?=$no++?></td>
												<td><?=$data->judul?></td>
												<td><?=$data->nama?></td>
												<td><?=date('d M Y', strtotime($data->tgl_pinjam));?></td>
												<td><a
														href="<?php echo ($data->status == 'dipinjamkan') ? base_url('dashboard/changestatus/'.$data->id_pinjam) : '#' ?>">
														<div
															class="<?php echo ($data->status == 'dipinjamkan') ? 'btn btn-danger' : 'btn btn-success' ?>">
															<?=$data->status?></div>
													</a></td>
												<td>
													<a onclick="return confirm('Data akan dihapus!')"
														href="<?=base_url('dashboard/delpinjam/'.$data->id_pinjam)?>"
														onclick="" class="btn btn-danger ml-2">
														Hapus
													</a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>

<!-- Modal tambah buku -->
<div id="tambahbuku" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?=base_url('dashboard/addbook')?>" method="POST">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Peminjam Buku</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>NBSN</label>
						<input type="number" name="nbsn" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Judul</label>
						<input type="text" name="judul" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Pengarang</label>
						<input type="text" name="pengarang" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Penerbit</label>
						<input type="text" name="penerbit" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<input type="number" name="tahun" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input type="number" name="stok" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Batal">
					<input type="submit" name="tambah" class="btn btn-success" value="Tambah">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal tambah buku end -->