<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card card-departments shadow">
				<div class="card-header">
					<h2 class="font-weight-bold text-primary"><?php echo $data['title']; ?></h2>
					<p><?php echo $data['description']; ?></p>
					<ul class="card-button">
						<li><a href="<?php echo URLROOT ?>/departments/add" class="btn btn-info">Add New</a></li>
					</ul>
				</div>
				<div class="card-body">
					
					<div class="table-responsive">
						<table class="table table-bordered table-hover" id="deptTable">
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
										echo '<td>' . $dept->deptCode . '</td>';
										echo '<td>' . $dept->deptName . '</td>';
										echo '<td><a href="' . URLROOT. '/departments/edit/' . $dept->id . '" class="btn btn-dark btn-sm"><i class="fa fa-edit"></i> Edit</a></td>';
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
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
