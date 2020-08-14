<?php require APPROOT . '/views/inc/header.php'; ?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<?php flashMessage('login_sucess'); ?>
			<h1 class="display-4"><?php echo $data['title']; ?></h1>
			<p class="lead"><?php echo $data['description']; ?></p>

			<?php echo $_SESSION['userRole']; ?>.
		</div>
	</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>