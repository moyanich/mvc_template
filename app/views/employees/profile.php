<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
               <h4 class="page-title"><?php echo $data['title']; ?></h4>
               <p><?php echo $data['description']; ?></p>
				</div>
				<div class="col-auto align-self-center">
					<?php displayDate(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end row--><!-- end page title end breadcrumb -->

<div class="row gutters-sm">
    <div class="col-md-12 mb-3">
        <div class="card card-profile emp-profile">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-2 profile__img">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    </div>
                    <div class="col-12 col-md-5 my-3">
                        <div class="profile__info">
                            <h4 class="font-weight-bold"><?php echo $data['first_name'] . ' ' .  $data['middle_name'] . ' ' .  $data['last_name']; ?></h4>
                            <ul class="profile_lists">
                                <li>
                                    <div class="title">Employee ID:</div>
                                    <div class="text"><?php echo $data['empID']; ?></div>
                                </li>
                                <li>
                                    <div class="title">Hire Date:</div>
                                    <div class="text"><?php echo $data['hire_date']; ?></div>
                                </li>

                                <li>
                                    <div class="title">Email Address (Company):</div>
                                    <div class="text"><a class="link" href="mailto:<?php echo $data['internalEmail']; ?>"><?php echo $data['internalEmail']; ?></a></div>
                                </li>
                                <li>
                                    <div class="title">Job Title</div>
                                    <div class="text"><?php echo $data['position']; ?></div>
                                </li>
                                <li>
                                    <div class="title">Department:</div>
                                    <div class="text"><?php echo $data['deptName']; ?></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12 col-md-5 my-3">
                        <ul class="profile_lists">
                            <li>
                                <div class="title">Gender:</div>
                                <div class="text"><?php echo $data['gender']; ?></div>
                            </li>
                            <li class="d-flex">
                                <div class="title">TRN:</div>
                                <div class="text"><?php echo $data['trn']; ?></div>
                            </li>
                            <li class="d-flex">
                                <div class="title">NIS:</div>
                                <div class="text"><?php echo $data['nis']; ?></div>
                            </li>
                            <li class="d-flex">
                                <div class="title">Phone:</div>
                                <div class="text"><?php echo $data['phoneOne']; ?></div>
                            </li>
                            <li class="d-flex">
                                <div class="title">Mobile Phone:</div>
                                <div class="text"><?php echo $data['mobile']; ?></div>
                            </li>
                            <li>
                                <div class="title">Email (Personal):</div>
                                <div class="text"><a href="mailto:<?php echo $data['externalEmail']; ?>"><?php echo $data['externalEmail']; ?></a></div>
                            </li>
                            <li>
                                <div class="title">D.O.B.:</div>
                                <div class="text"><?php echo date("F j, Y", strtotime($data['empDOB'])); ?></div>
                            </li>
                            <li>
                                <div class="title">Age:</div>
                                <div class="text"><?php echo $data['empAge']; ?> years</div>
                            </li>
                            <li>
                                <div class="title">Retirement Date:</div>
                                <div class="text"><?php echo date("F j, Y", strtotime($data['retirement'])); ?></div>
                            </li>
                            <li>
                                <div class="title">Address:</div>
                                <div class="text"><?php echo $data['address']; ?></div>
                            </li>
                            <li>
                                <div class="title">City:</div>
                                <div class="text"><?php echo $data['city']; ?></div>
                            </li>
                            <li>
                                <div class="title">Parish:</div>
                                <div class="text"><?php echo $data['parish']; ?></div>
                            </li>
                            <li>
                                <div class="title">Reports to:</div>
                                <div class="text">
                                    <div class="avatar-box">
                                        <div class="avatar avatar-xs">
                                            <img src="assets/img/profiles/avatar-16.jpg" alt="">
                                        </div>
                                    </div>
                                    <a href="profile.html"> NAME </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="emp-edit"><a href="<?php echo URLROOT ?>/employees/edit/<?php echo $data['id'] ?>" type="button" class="edit-icon"><i class="fas fa-pencil-alt"></i></a></div>

                    <!--<div class="emp-edit"><button type="button" class="edit-icon" data-toggle="modal" data-target="#profileModal"><i class="fas fa-pencil-alt"></i></button></div>-->

                </div><!-- .row -->
            </div><!-- . card-body -->
        </div>
    </div>
</div>



<div class="row gutters-sm">
    <div class="col-md-6 mb-3">
        <div class="card card-profile">
            <div class="card-header">
                <h4 class="card-title">Company Information</h4>
            </div>
            <div class="card-body">
                <ul class="profile_lists">
                    
                </ul>
                <div class="emp-edit"><a href="<?php echo URLROOT ?>/employees/edit/<?php echo $data['id'] ?>#compForm" type="button" class="edit-icon"><i class="fas fa-pencil-alt"></i></a></div>
            </div><!-- . card-body -->
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card comp-profile">
            <div class="card-header">
                <h4 class="card-title">Cssvs</h4>
            </div>
            <div class="card-body">
                <div class="row">
                   
                  

                </div><!-- .row -->
            </div><!-- . card-body -->
        </div>
    </div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>








<?php 
/*

 <?php
                                // foreach ( $data['departments'] as $dept ) {
                                   // echo $dept->department;
                                    echo $data['department'];
                                //}
                                ?>



 <div class="form-group col-12 col-sm-4">
                        <label class="col-form-label" for="hiredOn">Hire Date:<span class="text-danger">*</span></label>
                        <input type="date" name="hiredOn" class="form-control <?php echo (!empty($data['hiredOn_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['hire_date']; ?>" />
                        <?php echo (!empty($data['hiredOn_err'])) ? '<span class="invalid-feedback">' . $data['hiredOn_err'] . '</span>' : '' ; ?>
                    </div>


<div class="row gutters-sm">
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                        <p class="text-muted font-size-sm mb-0">ID: <?php echo $data['empID']; ?></p>
                        <h4><?php echo $data['first_name'] . ' ' .  $data['middle_name'] . ' ' .  $data['last_name']; ?></h4>
                        <p class="text-secondary mb-1">Full Stack Developer</p>
                        <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
        stuff
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                <h4 class="card-title">Personal Information</h4>
                <p class="text-muted mb-0">Employee will retire on: </p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="row">
                            <div class="col-sm-3 mb-3 d-flex align-items-end"><h6 class="mb-0">Full Name:</h6></div>
                            <div class="col-sm-9 text-secondary mb-3 d-flex align-items-end"><?php echo $data['first_name'] . ' ' .  $data['middle_name'] . ' ' .  $data['last_name']; ?></div>
                            
                            <div class="col-sm-3 mb-3"><h6 class="mb-0">Email:</h6></div>
                            <div class="col-sm-9 text-secondary mb-3"><a href="mailto:<?php echo $data['empEmail']; ?>"><?php echo $data['empEmail']; ?></a></div>

                            <div class="col-sm-3 mb-3"><h6 class="mb-0">DOB:</h6></div>
                            <div class="col-sm-9 text-secondary mb-3"><?php echo $data['empDOB']; ?></div>

                            <div class="col-sm-3 mb-3"><h6 class="mb-0">Gender:</h6></div>
                            <div class="col-sm-9 text-secondary mb-3"><?php echo $data['gender']; ?></div>

                        </div><!-- .row -->
                    </div><!-- .col-12 .col-sm-6 -->

                    <div class="col-12 col-sm-6">
2
                    </div><!-- .col-12 .col-sm-6 -->


              
                </div><!-- .row -->
               

                
                
            </div><!-- .card-body -->
        </div>
        <div class="row gutters-sm">
        <div class="col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    gssgd
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    sgshs
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>

*/ ?>
          