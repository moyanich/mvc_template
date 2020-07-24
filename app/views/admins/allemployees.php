<?php require APPROOT . '/views/inc/header.php'; ?>

<?php 
	foreach ($data['employees'] as $emp ) {

		$empList .= "<tr>";

		$empList .= '<td>' . $emp->idEmployee . '</td>';	

		$empList .= '<td>' . $emp->emp_no . '</td>';
		
		$empList  .= '<td>' . $emp->NAME . '</td>';

		$empList  .= '<td>' . $emp->phone . '</td>';

		$empList  .= '<td>' . $emp->hire_date . '</td>';

		$empList  .= '<td>' . $emp->job .'</td>';

		$empList  .= '<td>' . $emp->idDepartment_fk . '</td>';

		$empList  .= "</tr>";



	} 
?>

<div class="page-wrapper px-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?php echo $data['title']; ?></h1>
                <p><?php echo $data['description']; ?></p>


                <div class="card card-employees shadow">
                    <div class="card-header py-3">
		            	<h6 class="m-0 font-weight-bold text-primary"><?php echo $data['title']; ?></h6>
		            </div>
                    <div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="empTable">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Employee ID</th>
										<th scope="col">Name</th>
										<th scope="col">Phone</th>
										<th scope="col">Hire Date</th>
										<th scope="col">Role</th>
										<th scope="col">Department</th>
										<!--<th scope="col">Actions</th>-->
									</tr>
								</thead>
								<tbody>
									<?php echo $empList; ?>  
								</tbody>
							</table>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

				Role	Action

<?php require APPROOT . '/views/inc/footer.php'; ?>