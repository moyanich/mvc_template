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

<?php flashMessage('delete_success'); ?>

<div class="row">
	<div class="col-12">
		<div class="card card-departments shadow">
			<div class="card-header">
				<div class="row">
					<div class="col-12 col-md-8">
						<h4 class="card-title"><?php echo $data['title']; ?></h4>
						<p class="text-muted"><?php echo $data['description']; ?></p>
					</div>
					<div class="col-12 col-md-4 d-flex justify-content-end align-items-center">
						<a href="<?php echo URLROOT ?>/departments/add" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Add <?php echo $data['singlular']; ?></a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="deptTable" style="width:100%">
						<thead>
							<tr>
								<th scope="col">Department ID</th>
								<th scope="col">Department Code</th>
								<th scope="col">Department Name</th>
								<!--<th scope="col">Manager</th>
								<th scope="col">Supervisor</th>-->
								<!--<th scope="col">Total Employees</th>-->
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($data['departments'] as $dept) {
								echo '<tr>';
									echo '<td>' . $dept->id . '</td>';
									echo '<td class="text-uppercase">' . $dept->deptCode . '</td>';
									echo '<td>' . $dept->deptName . '</td>';
									echo '<td class="actions"><a href="' . URLROOT. '/departments/edit/' . $dept->id . '" class="mr-3" data-toggle="tooltip" data-placement="top" title="Edit ' . $data['title'] . '"><i class="far fa-edit"></i></a>
									<a href="javascript:void(0);" data-toggle="modal" data-target="#delModal-' . $dept->id . '"><i class="far fa-trash-alt"></i></a></td>';
								echo '</tr>';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<?php foreach ($data['departments'] as $dept) { ?>

	<!-- Modal -->
	<div class="modal custom-modal fade" id="delModal-<?php echo $dept->id; ?>" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<p>Are you sure want to Delete?</p>
						<h6 class="text-muted text-uppercase"><?php echo $dept->deptCode; ?></h6>
						<h4><?php echo $dept->deptName; ?></h4>
						
					</div>
					<div class="modal-buttons delete-action">
						<div class="row">
							<div class="col-6">
								<form action="<?php echo URLROOT; ?>/departments/delete/<?php echo $dept->id ?>" method="post">
									<input type="submit" value="Delete" class="btn btn-primary del-btn modal-btn">
								</form>
							</div>
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn modal-btn">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>





<?php } ?>




<?php require APPROOT . '/views/inc/footer.php'; ?>


<?php /*
							foreach ($data['departments'] as $dept) {
								echo '<tr>';
									echo '<td>' . $dept->id . '</td>';
									echo '<td>' . $dept->deptCode . '</td>';
									echo '<td>' . $dept->deptName . '</td>';
									echo '<td class="actions"><a href="' . URLROOT. '/departments/edit/' . $dept->id . '" class="mr-3" data-toggle="tooltip" data-placement="top" title="Edit ' . $data['title'] . '"><i class="far fa-edit"></i></a>
									<!--<a href="' . URLROOT. '/departments/delete/' . $dept->id . '" class="" data-toggle="tooltip" data-original-title="Delete ' . $data['title'] . '"><i class="far fa-trash-alt"></i></a>-->

									<button type="button" class="btn btn-link" data-toggle="modal" data-target="#delModal-' . $dept->id . '"><i class="far fa-trash-alt"></i></button>
									
									
									</td>';
								echo '</tr>';
							} */
							?>