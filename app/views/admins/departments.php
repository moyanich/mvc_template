<?php require APPROOT . '/views/inc/header.php'; ?>

<?php 
$depList = "";

	foreach ($data['departments'] as $dept) {

		$depList .= "<tr>";


		$depList .= '<td>' . $dept->deptID . '</td>';

		$depList  .= '<td>' . $dept->deptName . '</td>';

		//$depList  .= '<td>' . $dept->deptSupervisor . '</td>';

		//$depList  .= '<td>' . $dept->NAME . '</td>';

		$depList  .= '<td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="pageEmployeeProfile.php?idDept=' . $dept->deptID .'"><i class="fa fa-edit"></i></a></td>';

		 /*	if (isset($_GET['employeeID'])) {
		 		include('modal_delEmployee.php'); 
		 	} */
		 	

		$depList  .= "</tr>";

	} 
?>


<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card card-departments shadow">
				<div class="card-header">
					<h2 class="font-weight-bold text-primary"><?php echo $data['title']; ?></h2>
					<p><?php echo $data['description']; ?></p>
					<ul class="card-button">
						<li><a href="add_dept" class="btn btn-info">Add New</a></li>
					</ul>
				</div>
				<div class="card-body">
					<?php flashMessage('add_sucess'); ?>
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="deptTable">
							<thead>
								<tr>
									<th scope="col">Department ID</th>
									<th scope="col">Department Name</th>
									<!--<th scope="col">Manager</th>
									<th scope="col">Supervisor</th>-->
									<!--<th scope="col">Total Employees</th>-->
									<th scope="col">Actions</th>
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

*/