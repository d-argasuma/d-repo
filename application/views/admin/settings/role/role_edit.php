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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/settings/role/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/settings/role/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="stg_role_id" value="<?php echo $role->stg_role_id?>" />

							<div class="form-group">
								<label for="role_code">Role Code *</label>
								<input class="form-control <?php echo form_error('role_code') ? 'is-invalid':'' ?>"
								 type="text" name="role_code" placeholder="" value="<?php echo $role->role_code ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('role_code') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="role_name">Role Name *</label>
								<input class="form-control <?php echo form_error('role_name') ? 'is-invalid':'' ?>"
								 type="text" name="role_name" min="0" placeholder="" value="<?php echo $role->role_name ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('role_name') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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