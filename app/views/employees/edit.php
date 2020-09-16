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

<?php 
    /* Flash Messages */
  //  flashMessage('update_failure');
  //  flashMessage('update_sucess');
?>

<div class="row gutters-sm">
    <div class="col-md-12 mb-3">
        <div class="card emp-profile">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-2 profile__img">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    </div>
                    <div class="col-12 col-md-4 my-3">
                        <div class="profile__info">
                            <h4 class="font-weight-bold"><?php echo $data['first_name'] . ' ' .  $data['middle_name'] . ' ' .  $data['last_name']; ?></h4>
                            <div class="emp-id font-weight-bold mb-2">Employee ID: <?php echo $data['empID']; ?></div>
                            <h6 class="mb-2">Position: add here</h6>
                            
                            <div class="emp-dob mb-2">Hire Date: <?php echo $data['hire_date']; ?></div>
                            <div class="emp-mail mt-4"><a class="btn btn-primary" href="mailto:<?php echo $data['empEmail']; ?>">Email Employee</a></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 my-3">
                        <ul class="profile__personal">
                            <li class="d-flex">
                                <div class="title">Phone:</div>
                                <div class="text"><a href="">fsssv</a></div>
                            </li>
                            <li>
                                <div class="title">Email:</div>
                                <div class="text"><a href="mailto:<?php echo $data['empEmail']; ?>"><?php echo $data['empEmail']; ?></a></div>
                            </li>
                            <li>
                                <div class="title">D.O.B.:</div>
                                <div class="text"><?php echo $data['empDOB']; ?></div>
                            </li>
                            <li>
                                <div class="title">Retirement Date:</div>
                                <div class="text"><?php echo $data['retirement'] ; ?></div>
                            </li>
                            <li>
                                <div class="title">Address:</div>
                                <div class="text">ACAA</div>
                            </li>
                            <li>
                                <div class="title">Gender:</div>
                                <div class="text"><?php echo $data['gender']; ?></div>
                            </li>
                            <li>
                                <div class="title">Reports to:</div>
                                <div class="text">
                                    <div class="avatar-box">
                                        <div class="avatar avatar-xs">
                                            <img src="assets/img/profiles/avatar-16.jpg" alt="">
                                        </div>
                                    </div>
                                    <a href="profile.html">
                                        NAME
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                   
                    <div class="emp-edit"><button type="button" class="edit-icon" data-toggle="modal" data-target="#profileModal"><i class="fas fa-pencil-alt"></i></button></div>





                </div><!-- .row -->
            </div><!-- . card-body -->
        </div>
    </div>
</div>
              

<!-- Modal Profile -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleprofileModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Profile Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form name="retirementForm" action="<?php echo URLROOT; ?>/admin/editProfile/<?php echo $emp->id; ?>" method="POST">



            <div class="form-row">
                        <div class="form-group d-none">
                            <input type="hidden" name="maleYears" class="form-control" value="<?php echo $data['maleYears']; ?>">
                            <input type="hidden" name="femaleYears" class="form-control" value="<?php echo $data['femaleYears']; ?>">
                        </div>

                        <div class="form-group col-12 col-sm-2">
                            <label for="title" class="col-form-label">Title:</label>
                            <select class="custom-select" name="empTitle">
                                <option value="Mr." selected>Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Miss">Miss</option>
                                <option value="Ms.">Ms.</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-sm-3">
                            <label for="firstName" class="col-form-label">First Name:<span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : '' ; ?>" id="firstName" value="<?php echo $data['first_name']; ?>">
                            <?php echo (!empty($data['first_name_err'])) ? '<span class="invalid-feedback">' . $data['first_name_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-3">
                            <label for="middleName" class="col-form-label">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control" id="middleName">
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="lastName">Last Name:<span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : '' ; ?>" id="lastName" value="<?php echo $data['last_name']; ?>">
                            <?php echo (!empty($data['last_name_err'])) ? '<span class="invalid-feedback">' . $data['last_name_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="email">Email:</label>
                            <input type="email" name="empEmail" class="form-control <?php echo (!empty($data['empEmail_err_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['empEmail']; ?>">
                            <?php echo (!empty($data['empEmail_err'])) ? '<span class="invalid-feedback">' . $data['empEmail_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="gender">Gender:<span class="text-danger">*</span></label>
                            <select name="gender" class="custom-select">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="empDOB">DOB:<span class="text-danger">*</span></label>
                            <input type="date" name="empDOB" class="form-control <?php echo (!empty($data['empDOB_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empDOB']; ?>">
                            <?php echo (!empty($data['empDOB_err'])) ? '<span class="invalid-feedback">' . $data['empDOB_err'] . '</span>' : '' ; ?>
                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="empNo">Employee Number:<span class="text-danger">*</span></label>
                            <input type="text" name="empNo" class="form-control text-uppercase <?php echo (!empty($data['empID_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empID']; ?>" />
                            <?php echo (!empty($data['empID_err'])) ? '<span class="invalid-feedback">' . $data['empID_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-sm-4 col-form-label" for="hiredOn">Hire Date:<span class="text-danger">*</span></label>
                            <input type="date" name="hiredOn" class="form-control <?php echo (!empty($data['hiredOn_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['hire_date']; ?>" />
                            <?php echo (!empty($data['hiredOn_err'])) ? '<span class="invalid-feedback">' . $data['hiredOn_err'] . '</span>' : '' ; ?>
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 p-t-20 text-center">
                            <button type="button" class="btn btn-danger btn-shadow text-uppercase mr-4" data-dismiss="modal" aria-label="Close">Cancel</button>
                            <input type="submit" class="btn btn-primary btn-shadow text-uppercase" value="Save" />
                        </div>
                    </div>


            </form>
        </div>
        
        </div>
    </div>
</div>




<?php require APPROOT . '/views/inc/footer.php'; ?>




<?php 
/*


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
          