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
						<a href="<?php echo site_url('admin/settings/parameter/add') ?>"><i class="fas fa-plus"></i> Tambah Baru </a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Parameter Type</th>
										<th>Parameter Name</th>
										<th>Parameter Value</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($params as $param): ?>
									<tr>
										<td width="150">
											<?php echo $param->param_type ?>
										</td>
                                        <td width="150">
                                            <?php echo $param->param_name ?>
										</td>
										<td width="150">
                                            <?php echo $param->param_value ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/settings/parameter/edit/'.$param->stg_param_id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Ubah </a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/settings/parameter/delete/'.$param->stg_param_id) ?>')"
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

    <script>
        function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>

</body>

</html>