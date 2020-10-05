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
								<!--<th scope="col">#</th>-->
								<th scope="col">Employee ID</th>
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Hire Date<br/>(YYYY-MM-DD)</th>
								<th scope="col">Gender</th>
								<th scope="col">DOB<br/>(YYYY-MM-DD)</th>
								<th scope="col">Retirement<br/>(YYYY-MM-DD)</th>
								<!--<th scope="col">Role</th>
								<th scope="col">Department</th>-->
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach ($data['employees'] as $emp ) {
								echo '<tr>';
									echo '<td class="text-uppercase">' . $emp->empID . '</td>';
									echo '<td>' . $emp->first_name . '</td>';
									echo '<td>' . $emp->last_name  . '</td>';
									echo '<td>' . $emp->hire_date . '</td>';
									echo '<td>' . $emp->gender . '</td>';
									echo '<td>' . $emp->empDOB . '</td>';
									echo '<td>' . $emp->retirementDate . '</td>';
									// echo '<td></td>';
									// echo '<td></td>';
									//echo '<td >' . $emp->job . '</td>';
									//echo '<td>' . $dept->deptName . '</td>';
									/* echo '<td class="actions"><a href="' . URLROOT. '/departments/edit/' . $dept->id . '" class="mr-3" data-toggle="tooltip" data-placement="top" title="Edit ' . $data['title'] . '"><i class="far fa-edit"></i></a>
									<a href="javascript:void(0);" data-toggle="modal" data-target="#delModal-' . $emp->empID . '"><i class="far fa-trash-alt"></i></a></td>'; */
									echo '<td class="actions"><a href="' . URLROOT . '/employees/profile/' . $emp->empID . '" class="mr-3"><i class="far fa-edit"></i></a></td>';
									;
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
<!-- Modal -->
<div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployee" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $data['newtitle']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form name="addEmployee" name="empForm" action="<?php echo URLROOT; ?>/employees/add" method="POST">	
					<div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="empNo">Employee Number:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="empID" class="form-control text-uppercase <?php echo (!empty($data['empID_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empID']; ?>" />
                            <?php echo (!empty($data['empID_err'])) ? '<span class="invalid-feedback">' . $data['empID_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="empTitle">Title</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="empTitle">
                                <option selected>Mr.</option>
                                <option value="1">Mrs.</option>
                                <option value="2">Miss</option>
                                <option value="3">Ms.</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="firstName" class="col-sm-4 col-form-label">First Name:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="first_name" class="form-control <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : '' ; ?>" id="firstName" value="<?php echo $data['first_name']; ?>">
                            <?php echo (!empty($data['first_name_err'])) ? '<span class="invalid-feedback">' . $data['first_name_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="middleName">Middle Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="middle_name" class="form-control" id="middleName">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="lastName">Last Name:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="last_name" class="form-control <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : '' ; ?>" id="lastName" value="<?php echo $data['last_name']; ?>">
                            <?php echo (!empty($data['last_name_err'])) ? '<span class="invalid-feedback">' . $data['last_name_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="empDOB">DOB:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="date" name="empDOB" class="form-control <?php echo (!empty($data['empDOB_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empDOB']; ?>">
                        </div>
                        <?php echo (!empty($data['empDOB_err'])) ? '<span class="invalid-feedback">' . $data['empDOB_err'] . '</span>' : '' ; ?>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="gender">Gender:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="gender" class="custom-select">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="email">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" name="empEmail" class="form-control <?php echo (!empty($data['empEmail_err_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['empEmail']; ?>">
                            <?php echo (!empty($data['empEmail_err'])) ? '<span class="invalid-feedback">' . $data['empEmail_err'] . '</span>' : '' ; ?>
                        </div>
					</div>

					<div class="form-group">
						<div class="col-lg-12 p-t-20 text-center">
							<a href="<?php echo URLROOT; ?>/emplpoyees" class="btn btn-danger btn-shadow text-uppercase mr-4">Cancel</a>
							<input type="submit" class="btn btn-primary btn-shadow text-uppercase" value="Save" />
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>



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
