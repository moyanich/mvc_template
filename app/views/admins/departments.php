<?php 
require APPROOT . '/views/inc/header.php'; 

$depList = "";

	foreach ($data['departments'] as $dept) {

		$depList .= "<tr>";


		$depList .= '<td>' . $dept->deptID . '</td>';

		$depList  .= '<td>' . $dept->deptName . '</td>';

		//$depList  .= '<td>' . $dept->deptSupervisor . '</td>';

		//$depList  .= '<td>' . $dept->NAME . '</td>';

		$depList  .= '<td class="text-center"><button class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#e' . $dept->deptID .'"><i class="fa fa-edit"></i></button></td>';

		require APPROOT . '/views/admins/edit_dept.php';
		 	
		 	

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
