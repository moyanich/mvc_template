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
flashMessage('add_success'); 
flashMessage('delete_success'); 
flashMessage('delete_failure'); 
?>

<div class="row">
	<div class="col-12 col-md-8">
		<div class="card shadow">
			<div class="card-header">
				<div class="row">
					<div class="col-12 col-md-8">
						<h4 class="card-title"><?php echo $data['title']; ?></h4>
						<p class="text-muted"><?php echo $data['description']; ?></p>
					</div>
					<div class="col-12 col-md-4 d-flex justify-content-end align-items-center">
						<a href="<?php echo URLROOT ?>/jobs/add" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Add <?php echo $data['singlular']; ?></a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="deptTable" style="width:100%">
						<thead>
							<tr>
								<th scope="col">Position</th>
								<th scope="col">Department</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($data['positions'] as $position) {
								echo '<tr>';
									echo '<td class="text-capitalize">' . $position->job  . '</td>';
									echo '<td>' . $position->deptName . '</td>';

									/* echo '<td class="actions"><a href="' . URLROOT. '/' . $position->id . '" class="mr-3" data-toggle="tooltip" data-placement="top" title="Edit ' . $data['title'] . '"><i class="far fa-edit"></i></a></td>'; */

									echo '<td class="actions"><a href="javascript:void(0);" data-toggle="modal" data-target="#delJobModal-' . $position->id . '"><i class="far fa-trash-alt"></i></a></td>'; 
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


<?php foreach ($data['positions'] as $position) { ?>

	<!-- Modal -->
	<div class="modal custom-modal fade" id="delJobModal-<?php echo $position->id; ?>" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<p>Are you sure want to Delete?</p>
						<h4 class=""><?php echo $position->job; ?></h4>
						<p class="text-muted mb-0">in Department</p>
						<h5><?php echo $position->deptName; ?></h5>
					</div>
					<div class="modal-buttons delete-action">
						<div class="row">
							<div class="col-6">
								<form action="<?php echo URLROOT; ?>/jobs/delete/<?php echo $position->id ?>" method="POST">
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


<?php }  ?>




<?php require APPROOT . '/views/inc/footer.php'; ?>


