<?php require APPROOT . '/views/inc/header.php'; ?>

<?php 

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
		 	
		$empList  .= "</tr>";

		$empList  .= "</tr>";



	} 
?>


    <div class="container-fluid">
		<div class="block-header">
			<div class="row">
				<div class="col-lg-6 col-md-8 col-12">
					<h2><?php echo $data['title']; ?></h2>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>                            
						<li class="breadcrumb-item">Employee</li>
						<li class="breadcrumb-item active">Employee List</li>
					</ul>
				</div>            
				<div class="col-lg-6 col-md-4 col-sm-12 text-right">
					<div class="bh_chart hidden-xs">
					<?php /*<div class="float-left m-r-15">
							<small>Visitors</small>
							<h6 class="mb-0 mt-1"><i class="icon-user"></i> 1,784</h6>
						</div>
						<span class="bh_visitors float-right"><canvas width="47" height="42" style="display: inline-block; width: 47px; height: 42px; vertical-align: top;"></canvas></span> 8/ ?>
					</div>
					<div class="bh_chart hidden-sm">
						<?php /* <div class="float-left m-r-15">
							<small>Visits</small>
							<h6 class="mb-0 mt-1"><i class="icon-globe"></i> 325</h6>
						</div>
						<span class="bh_visits float-right"><canvas width="41" height="42" style="display: inline-block; width: 41px; height: 42px; vertical-align: top;"></canvas></span> */ ?>
					</div>
					<div class="bh_chart hidden-sm">
					<?php /*<div class="float-left m-r-15">
							<small>Chats</small>
							<h6 class="mb-0 mt-1"><i class="icon-bubbles"></i> 13</h6>
						</div>
						<span class="bh_chats float-right"><canvas width="47" height="42" style="display: inline-block; width: 47px; height: 42px; vertical-align: top;"></canvas></span> */ ?>
					</div>
				</div>
			</div>
		</div>
			
		<div class="row">
			<div class="col-12">
				<div class="card card-employees shadow">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold"><?php echo $data['title']; ?></h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-hover" id="empTable">
								<thead class="thead-dark">
									<tr>
										<th scope="col">#</th>
										<th scope="col">Name</th>
										<th scope="col">Employee ID</th>
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

<?php require APPROOT . '/views/inc/footer.php'; ?>