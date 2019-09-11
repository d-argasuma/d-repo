<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/_header.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/_navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/_sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/_breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/user/add') ?>"><i class="fas fa-plus"></i> Tambah Baru </a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Foto Profil</th>
										<th>Username</th>
										<th>Name</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($users as $user): ?>
									<tr>
										<td>
											<img src="<?php echo base_url('upload/images/'.$user->prof_pic) ?>" width="64" />
										</td>
										<td width="150">
											<?php echo $user->username ?>
										</td>
										<td class="150">
											<?php echo $user->full_name ?>
										</td>
										<td>
                                            <?php echo $user->email ?>
										</td>
										<td>
                                            <?php echo $user->role_name ?>
											
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/user/edit/'.$user->user_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Ubah </a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/'.$user->user_id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus </a>
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

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/_footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/_scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/_modal.php") ?>

	<?php $this->load->view("admin/_partials/_js.php") ?>

</body>

</html>