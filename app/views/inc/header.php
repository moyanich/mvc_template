<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo SITENAME; ?></title>

    <!--<link href="<?php echo URLROOT; ?>/vendor/dataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet">  -->

    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  
    <!-- Bootstrap -->
    <link href="<?php echo URLROOT; ?>/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo URLROOT; ?>/vendor/fontawesome/css/all.css" rel="stylesheet">
    <link href="<?php echo URLROOT; ?>/css/style.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css" integrity="sha512-SUJFImtiT87gVCOXl3aGC00zfDl6ggYAw5+oheJvRJ8KBXZrr/TMISSdVJ5bBarbQDRC2pR5Kto3xTR0kpZInA==" crossorigin="anonymous" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="<?php echo URLROOT; ?>/vendor/fontawesome/js/all.js"></script> <!--load all styles -->
</head>

<body>

    <div id="main_wrapper">

        <?php if(isUserSuperAdmin()) : ?>

        <div class="layoutSidenav" id="wrapper">
            <?php require APPROOT . '/views/inc/sidebar.php'; ?>
    
            <!-- Page Content -->
            <div id="main-content">
                <nav class="topnav navbar navbar-expand-lg navbar-light bg-white">
                   <!-- <a class="navbar-brand" href="<?php echo URLROOT; ?>/admins/index"><?php echo SITENAME; ?></a>-->
                
                    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="menu-toggle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>

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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucwords($_SESSION['username']); ?></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-header noti-title"><h6 class="text-overflow m-0">Welcome!</h6></div>
                                    <a href="#!" class="dropdown-item"><i class="ni ni-single-02"></i><span>My profile</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ni ni-settings-gear-65"></i><span>Settings</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ni ni-calendar-grid-58"></i><span>Activity</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ni ni-support-16"></i><span>Support</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?php echo URLROOT; ?>/users/logout" class="dropdown-item"><i class="ni ni-user-run"></i><span>Logout</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>  
                <div class="page-content">
                    <div class="container-fluid"> 
        <?php else :

            require APPROOT . '/views/inc/navbar.php';
    
        endif; ?>










<?php /*  ORG
<body <?php echo $nav_class = isUserSuperAdmin() ? 'class="nav-fixed"' : ''; ?>>

    <div id="main_wrapper">

        <?php if(isUserSuperAdmin()) : ?>

            <nav class="topnav navbar navbar-expand-lg navbar-light border-bottom fixed-top shadow bg-white">
                <a class="navbar-brand" href="<?php echo URLROOT; ?>/admins/index"><?php echo SITENAME; ?></a>
            
                <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="menu-toggle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>

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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo ucwords($_SESSION['username']); ?></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-header noti-title"><h6 class="text-overflow m-0">Welcome!</h6></div>
                                    <a href="#!" class="dropdown-item"><i class="ni ni-single-02"></i><span>My profile</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ni ni-settings-gear-65"></i><span>Settings</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ni ni-calendar-grid-58"></i><span>Activity</span></a>
                                    <a href="#!" class="dropdown-item"><i class="ni ni-support-16"></i><span>Support</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a href="<?php echo URLROOT; ?>/users/logout" class="dropdown-item"><i class="ni ni-user-run"></i><span>Logout</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="layoutSidenav" id="wrapper">
                    <?php require APPROOT . '/views/inc/sidebar.php'; ?>
            
                    <!-- Page Content -->
                    <div id="main-content">
                            
        <?php else :

            require APPROOT . '/views/inc/navbar.php';
    
        endif; ?>



*/?>