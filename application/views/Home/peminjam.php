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
			<form action="<?=base_url('dashboard/pinjambook')?>" method="POST">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Pinjam Buku</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Buku</label>
						<select name="nbsn" class="form-control" required>
							<?php
                                foreach($buku as $b){
                            ?>
							<option value="<?=$b->nbsn?>"><?=$b->judul?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Anggota</label>
						<select name="id_anggota" class="form-control" required>
							<?php
                                foreach($anggota as $a){
                            ?>
							<option value="<?=$a->id_anggota?>"><?=$a->nama?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label>Tgl Pinjam</label>
						<input type="date" name="tgl_pinjam" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Status</label>
						<input type="text" name="status" class="form-control" value="dipinjamkan" readonly>
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
