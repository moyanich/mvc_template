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

<body <?php echo $nav_class = isset($_SESSION['user_admin']) ? 'class="nav-fixed"' : ''; ?>>

    <?php if(isset($_SESSION['user_admin']) ) : ?>
        <nav class="topnav navbar navbar-expand-lg navbar-light border-bottom shadow bg-white">
            <a class="navbar-brand" href="<?php echo URLROOT; ?>/admin/index"><?php echo SITENAME; ?></a>
           

            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="menu-toggle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>



           <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="d-flex layoutSidenav" id="wrapper">
                <?php require APPROOT . '/views/inc/sidebar.php'; ?>
        
                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <main>
                        
                
        <?php 

        else :

            require APPROOT . '/views/inc/navbar.php';
    
        endif; ?>



