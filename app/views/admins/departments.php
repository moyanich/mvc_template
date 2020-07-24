<?php require APPROOT . '/views/inc/header.php'; ?>

<?php 
	foreach ($data['departments'] as $dept) {

		$depList .= "<tr>";

		$depList .= '<td>' . $dept->idDept . '</td>';	

		$depList  .= '<td>' . $dept->department_name . '</td>';

		$depList  .= '<td>' . $dept->departmentCode .'</td>';

		//$depList  .= '<td>' . $dept->MANAGER . '</td>';

		//$depList  .= '<td>' . $dept->SUPERVISOR . '</td>';

		$depList  .= "</tr>";

	} 
?>


<div class="page-wrapper px-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?php echo $data['title']; ?></h1>
                <p><?php echo $data['description']; ?></p>


                <div class="card card-departments shadow">
                    <div class="card-header">
						<h6 class="m-0 font-weight-bold text-primary"><?php echo $data['title']; ?></h6>
						<ul class="card-button">
							<li><a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#addDepartments">Add New</a></li>
                       </ul>
		            </div>
                    <div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover" id="deptTable">
								<thead>
									<tr>
										<th scope="col">ID#</th>
										<th scope="col">Department Name</th>
										<th scope="col">Department Code</th>
										<!--<th scope="col">Manager</th>
										<th scope="col">Supervisor</th>
										<th scope="col">Total Employees</th>
										<th scope="col">Actions</th>-->
									</tr>
								</thead>
								<tbody>
									<?php echo $depList; ?>  
								</tbody>
							</table>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addDepartments" tabindex="-1" role="dialog" aria-labelledby="addDepartments" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add <?php echo $data['subtitle']; ?></h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span></button>
		</div>
		<div class="modal-body">
			<div class="row clearfix">
					<div class="col-md-12">
						<div class="form-group">                                    
							<input type="text" class="form-control" placeholder="Departments Name">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">                                    
							<input type="text" class="form-control" placeholder="Departments Head">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">                                    
							<input type="number" class="form-control" placeholder="No of Employee">
						</div>
					</div>
            </div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary">Save</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		</div>
		</div>
	</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

<?php 



/*
 foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $post->title; ?></h4>
      <div class="bg-light p-2 mb-3">
        Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; 

		$empID 		= $row['empID'];

		$empFname	= $row['empFirstName'];

		$empLname	= $row['empLastName'];

		$emptDept 	= $row['deptName'];
		
		$empPhoto 	= $row['empPhoto'];

		$endDate	= $row['empEndDate']; 

		$empStatus	= $row['empStatus']; 
	

		$employeeList  .= "<tr>";

		$employeeList  .= '<td>';
			if (!is_null($empPhoto)) {
				$employeeList  .= '<img src="' . $empPhoto  . '" class="img-thumbnail rounded">';
			}
		$employeeList  .= '</td>';

		$employeeList  .= '<td>' . $empFname . '</td>';

		$employeeList  .= '<td>' . $empLname .'</td>';

		$employeeList .= '<td>' . $empID . '</td>';	

		$employeeList  .= '<td>' . $emptDept  . '</td>';

		$employeeList  .= '<td>';

			if ($empStatus === null || $empStatus === 'No' ) { 
				$employeeList  .= '<span class="green">Active</span>'; 
			} else {
				$employeeList  .= '<span class="red">Not Active</span>';
			}

		$employeeList  .= '</td>';	
		
		$employeeList  .= '<td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="pageEmployeeProfile.php?employeeID=' . $empID .'"><i class="fa fa-edit"></i></a></td>';

		 	if (isset($_GET['employeeID'])) {
		 		include('modal_delEmployee.php'); 
		 	}
		 	
		$employeeList  .= "</tr>";


<div class="table-responsive">
	<table class="table align-items-center text-left" id="empTable">
		<thead class="thead-light">
          	<tr>
          		<th scope="col"></th>
				<th scope="col">First Name</th>
				<th scope="col">Last Name</th>
				<th scope="col">Employee ID</th>
				<th scope="col">Department</th>
				<th scope="col">Status</th>
				<th scope="col">Actions</th>
          	</tr>
      	</thead>
      	<tbody>
        	<?php echo $employeeList; ?>        
      	</tbody>
    </table>
</div>

