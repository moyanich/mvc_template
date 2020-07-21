<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo SITENAME; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@400;500;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;600&display=swap" rel="stylesheet">
  
    <!-- Bootstrap -->
    <link href="<?php echo URLROOT; ?>/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/css/minified/style.min.css" rel="stylesheet">
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header class="header">
        <?php require APPROOT . '/views/inc/navbar.php'; ?>
    </header>
    
