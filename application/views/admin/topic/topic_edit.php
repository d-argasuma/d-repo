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

						<a href="<?php echo site_url('admin/topic/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/topic/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="topic_id" value="<?php echo $topic->topic_id?>" />

							<div class="form-group">
								<label for="topic_title">Title *</label>
								<input class="form-control <?php echo form_error('topic_title') ? 'is-invalid':'' ?>"
								 type="text" name="topic_title" placeholder="Title" value="<?php echo $topic->topic_title ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('topic_title') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="usr_crt">Create By *</label>
								<input class="form-control <?php echo form_error('usr_crt') ? 'is-invalid':'' ?>"
								 type="text" name="usr_crt" min="0" placeholder="Create By" value="<?php echo $topic->usr_crt ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('usr_crt') ?>
								</div>
							</div>

                            <div class="form-group">
								<label for="topic_desc">Description *</label>
								<textarea class="form-control <?php echo form_error('topic_desc') ? 'is-invalid':'' ?>"
								 name="topic_desc" placeholder="Description" ><?php echo $topic->topic_desc ?></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('topic_desc') ?>
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