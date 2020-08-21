<?php require APPROOT . '/views/inc/header.php'; ?>

<?php flashMessage('login_success'); ?>

https://mannatthemes.com/dastyle/default/crm-index.html
<br/>
http://midone-vue.left4code.com/


<div class="page-header pb-5">
	<div class="container">
		<div class="page-header-content pt-4">
			<div class="row align-items-center justify-content-between">
				<div class="col-auto mt-4">
					<h1 class="page-header-title">Hello <?php echo ucwords($_SESSION['username']); ?></h1>
					<h6>Welcome to your dashboard</h6>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row justify-content-center">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-3">
				<div class="card report-card">
					<div class="card-body">
						<div class="row d-flex justify-content-center">
							<div class="col">
								<p class="text-dark mb-1 font-weight-semibold">Sessions</p>
								<h3 class="my-2">24k</h3>
								<p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i>8.5%</span> New Sessions Today</p>
							</div>
							<div class="col-auto align-self-center">
								<div class="report-main-icon bg-light-alt">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users align-self-center text-muted icon-md"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
								</div>
							</div>
						</div>
					</div><!--end card-body-->
				</div>
			</div>


	<div class="col-xl-3 col-md-6">
		<div class="card card-stats">
			<!-- Card body -->
			<div class="card-body">
				<div class="row">
					<div class="col-12">
						<div class="sm-icon">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-archive" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M2 5v7.5c0 .864.642 1.5 1.357 1.5h9.286c.715 0 1.357-.636 1.357-1.5V5h1v7.5c0 1.345-1.021 2.5-2.357 2.5H3.357C2.021 15 1 13.845 1 12.5V5h1z"/>
								<path fill-rule="evenodd" d="M5.5 7.5A.5.5 0 0 1 6 7h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5zM15 2H1v2h14V2zM1 1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H1z"/>
							</svg>
						</div>
					</div>
					<div class="col d-flex align-items-end">
						<h6 class="card-title text-muted mb-0">Total Departments</h6>
					</div>
					<div class="col-auto d-flex align-items-end">
						<h4 class="font-weight-bold">
							<?php 
							foreach ($data['departments'] as $dept) { 
								echo $dept->totalDepts;
							}
							?>
						</h4>
					</div>
					
				</div>
			</div>
		</div>
	</div>
 </div>
 </div>
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
<?php require APPROOT . '/views/inc/footer.php'; ?>