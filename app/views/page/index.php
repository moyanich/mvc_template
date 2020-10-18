<?php require APPROOT . '/views/inc/header.php'; ?>

	<!-- Masthead -->
	<header class="masthead text-left">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-12 col-md-4 col-lg-6 order-lg-2 text-white header-image"></div>
				<div class="col-12 col-md-8 col-lg-6 order-lg-1 my-auto showcase-text">
					<h6><?php echo $data['title']; ?></h6>
					<h1 class="heading">Human Resource Management</h1>
					<p class="lead mb-0"><?php echo $data['description']; ?></p>
					<div class="pt-4">
						<a href="<?php echo URLROOT; ?>/users/login" class="btn btn-primary btn-lg">Sign in</a>
					</div>
				</div>
			</div>
		</div>
	</header>


<?php require APPROOT . '/views/inc/footer.php'; ?>