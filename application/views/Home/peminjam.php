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
                                                foreach($buku as $data){
                                            ?>
											<tr>
												<td><?=$no++?></td>
												<td><?=$data->judul?></td>
												<td><?=$data->nama?></td>
												<td><?=date('d M Y', strtotime($data->tgl_pinjam));?></td>
												<td><a
														href="<?php echo ($data->status == 'dipinjamkan') ? 'proses/proses_updatestatuspinjam.php?idkembali='.$data->d_pinjam: '#' ?>">
														<div
															class="<?php echo ($data->status == 'dipinjamkan') ? 'btn btn-danger' : 'btn btn-success' ?>">
															<?=$data->status?></div>
													</a></td>
												<td>
													<a onclick="return confirm('Data akan dihapus!')"
														href="<?=base_url('dashboard/delbook/'.$data->id_pinjam)?>"
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
