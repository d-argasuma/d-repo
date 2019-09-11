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
						<a href="<?php echo site_url('admin/user/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php base_url('admin/user/add') ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group">
								<label for="username">Username *</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username"  autocomplete="new-username"/>
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="password">Password *</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="password" name="password" min="0" autocomplete="new-password"/>
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="full_name">Full Name *</label>
								<input class="form-control <?php echo form_error('full_name') ? 'is-invalid':'' ?>"
								 type="text" name="full_name" min="0"  />
								<div class="invalid-feedback">
									<?php echo form_error('full_name') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="email">Email *</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="text" name="email" min="0"  />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="prof_pic">Foto Profil</label>
								<input class="form-control-file <?php echo form_error('prof_pic') ? 'is-invalid':'' ?>"
								 type="file" name="prof_pic" />
								<div class="invalid-feedback">
									<?php echo form_error('prof_pic') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="role_code">Role</label>
								<select id="role_code" name="role_code">
								<?php foreach ($roles as $role): ?>                      
									<option value="<?php echo $role->role_code ?>"><?php echo $role->role_name ?></option>
								<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('role_code') ?>
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