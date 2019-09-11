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

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/settings/parameter/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/settings/parameter/add') ?>" method="post" >

							<div class="form-group">
								<label for="param_type">Paramter Type *</label>
								<input class="form-control <?php echo form_error('param_type') ? 'is-invalid':'' ?>"
								 type="text" name="param_type"  />
								<div class="invalid-feedback">
									<?php echo form_error('param_type') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="param_name">Parameter Name *</label>
								<input class="form-control <?php echo form_error('param_name') ? 'is-invalid':'' ?>"
								 type="text" name="param_name" min="0"  />
								<div class="invalid-feedback">
									<?php echo form_error('param_name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="param_value">Parameter Value *</label>
								<input class="form-control <?php echo form_error('param_value') ? 'is-invalid':'' ?>"
								 type="text" name="param_value" min="0"  />
								<div class="invalid-feedback">
									<?php echo form_error('param_value') ?>
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