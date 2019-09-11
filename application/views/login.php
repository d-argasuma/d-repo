<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/_header.php") ?>
</head>

<body id="page-top">

	<div id="wrapper" style="max-width:500px;margin:auto;" class=" mt-5">

		<div id="content-wrapper">

			<div class="container-fluid">

				<div class="card" style="box-shadow: 0 10px 6px -6px #777; margin:3rem !important;">
					<div class="card-body">
                    <form action="<?php echo base_url('login/act_login'); ?>" method="post">		
                        <div class="form-group">
						    <label for="username">Username *</label>
							<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
							 type="text" name="username"  autocomplete="new-username" required/>
							<div class="invalid-feedback">
								<?php echo form_error('username') ?>
							</div>
						</div>

						<div class="form-group">
						    <label for="password">Password *</label>
							<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
							 type="password" name="password" min="0"  autocomplete="new-password" required/>
							<div class="invalid-feedback">
								<?php echo form_error('password') ?>
							</div>
					    </div>
                        <input class="btn btn-primary" type="submit" name="btn" value="Login" />
                            <!-- <input type="submit" value="Login"> -->
                      
                    </form>
				</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>

			</div>
			<?php if ($this->session->flashdata('alert')): ?>
				<div class="alert alert-warning" role="alert" style="margin:3rem !important;">
					<?php echo $this->session->flashdata('alert'); ?>
				</div>
				<?php endif; ?>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/_scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/_modal.php") ?>

	<?php $this->load->view("admin/_partials/_js.php") ?>

</body>

</html>