<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Anggota</h1>
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
								<h4>Data Anggota</h4>
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
												<th>Nama Anggota</th>
												<th>Alamat</th>
												<th>No Telepon</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
                                                $no=1; 
                                                foreach($anggota as $data){
                                            ?>
											<tr>
												<td><?=$no++?></td>
												<td><?=$data->nama?></td>
												<td><?=$data->alamat?></td>
												<td><?=$data->no_telepon?></td>
												<td>
													<a href="<?=base_url('dashboard/editanggota/'.$data->id_anggota)?>"
														class="btn btn-warning">Edit</a>
													<a onclick="return confirm('Data akan dihapus!')"
														href="<?=base_url('dashboard/delanggota/'.$data->id_anggota)?>"
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
			<form action="<?=base_url('dashboard/addanggota')?>" method="POST">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Anggota</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>No Telepon</label>
						<input type="number" name="no_telepon" class="form-control" required>
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
