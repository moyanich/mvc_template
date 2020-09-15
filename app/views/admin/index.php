<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flashMessage('login_success'); ?>


<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
					<h4 class="page-title">Dashboard</h4>
				</div>
				<div class="col-auto align-self-center">
					<?php displayDate(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end row--><!-- end page title end breadcrumb -->

<div class="row mt-5">
	<div class="col-12 col-sm-4">
		<div class="card">
			<img src="..." class="card-img-top" alt="...">
			<div class="card-body">
				<h4 class="card-title">Welcome <?php echo ucwords($_SESSION['username']); ?>!</h4>
				<p class="text-muted mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</p>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-4">

	<div class="card">
				<div class="card-header">
				<h4 class="card-title">card</h4>
				<p class="text-muted mb-0">Retiring </p>
			</div>
			<div class="card-body">

			</div>
		</div>




	</div>

	<div class="col-12 col-sm-4">
		<div class="row">
			<div class="col-12">
				<div class="card card-stats card-blue">
					<div class="card-body text-center text-white">
						<h2 class="my-2 font-weight-bold"><?php foreach ($data['employees'] as $emp) { echo $emp->totalEmployees; } ?></h2>
						<p class="mb-1 font-weight-semibold">Total Employees</p>
					</div><!--end card-body-->
				</div><!--end card--->
			</div>
			<div class="col-12">
				<div class="card card-stats card-light-blue">
					<div class="card-body text-center text-white">
						<h2 class="my-2 font-weight-bold"><?php foreach ($data['departments'] as $dept) { echo $dept->totalDepts; } ?></h2>
						<p class="mb-1 font-weight-semibold">Departments</p>
					</div><!--end card-body-->
				</div><!--end card--->
			</div>
		</div>
	</div>

</div>


<div class="row">

	<div class="col-12 col-sm-7">
		<div class="card">
				<div class="card-header">
				<h4 class="card-title">card</h4>
				<p class="text-muted mb-0">Retiring </p>
			</div>
			<div class="card-body">

			</div>
		</div>
	</div>
	

	<div class="col-12 col-sm-5">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Employees Retiring Soon</h4>
				<p class="text-muted mb-0">Retiring in the next 2 years</p>
			</div>
			<div class="card-body">
				<table class="table table-hover" id="retTable">
					<thead>
						<tr>
							<th scope="col">Name</th>
							<th scope="col">D.O.B</th>
							<th scope="col">Retirement Date</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach ($data['retirements'] as $retirement) { 
								echo '<tr>';
									echo '<td>' . $retirement->full_name . '</td>';
									echo '<td>' . $retirement->empDOB . '</td>';
									echo '<td>' . $retirement->retirementDate . '</td>';
									echo '<td class="actions"><a href="' . URLROOT . '/employees/edit/' . $retirement->id . '" class="mr-3"><i class="far fa-edit"></i>Edit</a></td>';
								echo '</tr>';
							} 
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="row">

	<div class="col-12 col-sm-4">
		<div class="card">
				<div class="card-header">
				<h4 class="card-title">card</h4>
				<p class="text-muted mb-0">Retiring </p>
			</div>
			<div class="card-body">

			</div>
		</div>


	</div>
	
	<div class="col-12 col-sm-4">

	<div class="card">
				<div class="card-header">
				<h4 class="card-title">card</h4>
				<p class="text-muted mb-0">Retiring </p>
			</div>
			<div class="card-body">

			</div>
		</div>
		
	</div>

	<div class="col-12 col-sm-4">
		<div class="card activity-card">
			<div class="card-header">
				<h4 class="card-title">Activity Feed</h4>
			</div>
			<div class="card-body">
				<?php 
				/* 
				* Display the user activity on the Dashbaord 
				*/
				foreach ($data['activity'] as $activity) { 
					echo '<div class="activity-info">';
						echo '<h6 class="activity-heading font-weight-bold">' . $activity->name . '</h6>';
						echo '<p>' . $activity->userAction . '</p>';
						echo '<small class="text-muted">' . timeago($activity->updated) . '</small>';
					echo '</div>';
				} ?>
			</div>
		</div>
	</div>

</div>


<div class="row">

	<div class="col-12 col-sm-4">
	</div>
	
	<div class="col-12 col-sm-4">
		
	</div>

	<div class="col-12 col-sm-4">
		
	</div>
</div>






<div class="row">
	<div class="col-12 col-md-4">
		
	</div>
	
	<div class="col-12 col-md-3">

	</div>


	<div class="col-12 col-md-5">
		
	</div>
</div>
<!--end row-->



<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h6 class="card-title">Most Commonly Asked Questions</h6>
				<p class="text-muted mb-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</p>
			</div>
			<div class="card-body">
				
				
			</div>
		</div>
	</div>
</div>
<!--end row-->




<?php require APPROOT . '/views/inc/footer.php'; ?>




<?php /*

<div class="col-md-6 col-lg-3">
		<div class="card card-stats">
			<div class="card-body">
				<div class="row d-flex justify-content-center">
					<div class="col">
						<p class="text-dark mb-1 font-weight-semibold">Total Employees</p>
						<h3 class="my-2"><?php foreach ($data['employees'] as $emp) { echo $emp->totalEmployees; } ?></h3>
						<p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span> New Sessions Today</p>
					</div>
					<div class="col-auto align-self-center">
						<div class="sm-icon">
						<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-friends" class="svg-inline--fa fa-user-friends fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="currentColor" d="M192 256c61.9 0 112-50.1 112-112S253.9 32 192 32 80 82.1 80 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C51.6 288 0 339.6 0 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zM480 256c53 0 96-43 96-96s-43-96-96-96-96 43-96 96 43 96 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592c26.5 0 48-21.5 48-48 0-61.9-50.1-112-112-112z"></path></svg>
						</div>
					</div>
				</div>
			</div><!--end card-body-->
		</div><!--end card--->


<canvas id="myChart"></canvas>


<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
	<div class="container">
		<div class="page-header-content pt-4">
			<div class="row align-items-center justify-content-between">
				<div class="col-auto mt-4">
					<h1 class="page-header-title">
						<div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg></div>
						Charts
					</h1>
					<div class="page-header-subtitle">Interactive charts to display your data, powered by Chart.js, customized for SB Admin Pro</div>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="container">

	<h1><?php echo $data['title']; ?></h1>
	<p><?php echo $data['description']; ?></p>
	Hey, <?php // echo $_SESSION['user_name']; ?> <?php // echo $_SESSION['userRole']; ?>.. You are logged in.

</div>

https://mannatthemes.com/dastyle/default/crm-index.html
<br/>
http://midone-vue.left4code.com/



<?php  /*
 print_r($_COOKIE);    //output the contents of the cookie array variable
echo $_SESSION['login']; 
echo '<br/>';
echo $_SESSION['userID'];
echo '<br/>';
echo $_SESSION['userRole'];
echo '<br/>';
//echo $_SESSION['last_login'];
echo '<br/>';
//echo $_SESSION['csrf_token']; */  ?>