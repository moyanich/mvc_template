<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
					<h4 class="page-title"><?php echo $data['title']; ?></h4>
				</div>
				<div class="col-auto align-self-center">
					<?php displayDate(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end row--><!-- end page title end breadcrumb -->

<?php

flashMessage('add_error');
?>

<div class="row">
	<div class="col-12 col-md-6">
		<div class="card card-departments shadow">
			<div class="card-header">
				<h4 class="card-title">Add Designation</h4>
			</div>
			<div class="card-body">
				<form name="addJob" action="<?php echo URLROOT; ?>/jobs/add" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label class="col-form-label" for="Designation">Designation<span class="text-danger pl-1">*</span></label>
						<input type="text" name="job" class="form-control <?php echo (!empty($data['job_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['job']; ?>" value="<?php echo $data['job']; ?>" />
						<?php echo (!empty($data['job_err'])) ? '<span class="invalid-feedback">' . $data['job_err'] . '</span>' : '' ; ?>
					</div> 

					<div class="form-group">
						<label class="col-form-label" for="Department">Department<span class="text-danger pl-1">*</span></label>
						<select name="relDeptID" id="department" class="custom-select">
							<?php 
							foreach ($data['deptList'] as $dept) { 
								echo '<option value="' . $dept->id. '">' . $dept->deptName . '</option>';
							} ?>
						</select>
					</div>

					<div class="form-group">
						<div class="col-lg-12 p-t-20 text-center">
							<input type="submit" class="btn btn-primary btn-shadow text-uppercase" value="Save" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
