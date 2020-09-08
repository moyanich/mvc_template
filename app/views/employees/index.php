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


<div class="row">
  	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-12 col-md-8">
						<h4 class="card-title"><?php echo $data['title']; ?></h4>
						<p class="text-muted"><?php echo $data['description']; ?></p>
					</div>
					<div class="col-12 col-md-4 d-flex justify-content-end align-items-center">
						<a href="<?php echo URLROOT ?>/<?php echo $data['title']; ?>/add" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Add <?php echo $data['singlular']; ?></a>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover" id="empTable"  style="width:100%">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Employee ID</th>
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Phone</th>
								<th scope="col">Hire Date</th>
								<th scope="col">Role</th>
								<th scope="col">Department</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($data['employees'] as $emp ) {
								echo '<tr>';
									echo '<td class="text-uppercase">' . $emp->id . '</td>';
									echo '<td class="text-uppercase">' . $emp->empID . '</td>';
									echo '<td>' . $emp->first_name . '</td>';
									echo '<td>' . $emp->last_name  . '</td>';
									echo '<td>' . $emp->phone . '</td>';
									echo '<td>' . $emp->hire_date . '</td>';
									echo '<td >' . $emp->job . '</td>';
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
<!--end row-->






<?php require APPROOT . '/views/inc/footer.php'; ?>


<?php /*

$empList = "";

	foreach ( $data['employees'] as $emp ) {

		$empList .= "<tr>";

		$empList .= '<td>' . $emp->idEmployee . '</td>';
		
		$empList  .= '<td>' . $emp->NAME . '</td>';

		$empList .= '<td>' . $emp->emp_no . '</td>';
		
		$empList  .= '<td>' . $emp->phone . '</td>';

		$empList  .= '<td>' . $emp->hire_date . '</td>';

		$empList  .= '<td>' . $emp->job .'</td>';

		$empList  .= '<td>' . $emp->deptName . '</td>';

		$empList  .= '<td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="pageEmployeeProfile.php?employeeID=' . $emp->idEmployee .'"><i class="fa fa-edit"></i></a></td>';

		 /*	if (isset($_GET['employeeID'])) {
		 		include('modal_delEmployee.php'); 
		 	} */
		 	/*
		$empList  .= "</tr>";

		$empList  .= "</tr>";



	}  */
?>
