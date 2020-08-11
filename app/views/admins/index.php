<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flashMessage('login_sucess'); ?>

<?php flashMessage('cookie_sucess'); ?>


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

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>