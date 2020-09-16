<?php require APPROOT . '/views/inc/header.php'; ?>


<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
                    <h4 class="page-title"><?php echo $data['title']; ?></h4>
                    <p class="text-muted mb-0">Employee Registration Details</p>
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
    flashMessage('update_failure');
    flashMessage('add_error');
    flashMessage('add_sucess'); 
?>

<div class="row">
    <div class="col-12 pr-2">
        <form name="addEmployee" name="empForm" action="<?php echo URLROOT; ?>/employees/add" method="POST">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pre-registration Information</h4>
                </div>
                <div class="card-body">
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
                            <a href="<?php echo URLROOT; ?>/employees" class="btn btn-danger btn-shadow text-uppercase mr-4">Cancel</a>
                            <input type="submit" class="btn btn-primary btn-shadow text-uppercase" value="Save" />
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-md-5">
    <?php 
    /* Flash Messages */
    flashSection('complete_reg'); 
?>
    </div>
</div>
<!--end row-->



<?php require APPROOT . '/views/inc/footer.php'; ?>



<?php /*

<div class="col-12 col-md-5 pr-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Company Information</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="empNo">Employee Number:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="empID" class="form-control text-uppercase <?php echo (!empty($data['empID_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empID']; ?>" />
                            <?php echo (!empty($data['empID_err'])) ? '<span class="invalid-feedback">' . $data['empID_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>

                    

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="department">Department:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">

                            <select name="relDeptID" class="custom-select <?php echo (!empty($data["relDeptID_err"])) ? 'is-invalid check' : '' ; ?>">
                                <option value='0' selected>Select Department</option>
                                <?php
                                    foreach ($data['departments'] as $dept ) {
                                        echo '<option class="" value="' . $dept->id . '">' . $dept->deptName  . '</option>';
                                        echo (!empty($data['relDeptID_err'])) ? '<span class="invalid-feedback">' . $data['relDeptID_err'] . '</span>' : '' ; 
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                







foreach ($data['genders'] as $gender ) { ?>
                                <div class="form-check">
                                    <input type="radio" name="gender" id="<?php echo $gender->genderName; ?>" value="<?php echo $gender->genderName; ?>" class="form-check-input <?php echo (!empty($data['gender_err'])) ? 'is-invalid check' : '' ; ?>" value="<?php echo $data['empDOB']; ?>">
                                    <label class="form-check-label" for="<?php echo $gender->genderName; ?>"><?php echo $gender->genderName ?></label>
                                    <?php echo (!empty($data['gender_err'])) ? '<div class="invalid-feedback">' . $data['gender_err'] . '</div>' : '' ; ?>
                                </div>

                            <?php } */ ?>







<?php /* <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" name="gender" id="<?php echo $gender->genderName; ?>" value="<?php echo $gender->genderName; ?>" class="custom-control-input <?php echo (!empty($data['gender_err'])) ? 'is-invalid check' : '' ; ?>" value="<?php echo $data['empDOB']; ?>">
    <?php echo (!empty($data['gender_err'])) ? '<div class="invalid-feedback">' . $data['gender_err'] . '</div>' : '' ; ?>
    <label class="custom-control-label" for="<?php echo $gender->genderName; ?>"><?php echo $gender->genderName ?></label> 
</div>*/?>


<?php /*

<div class="form-group">
                        <label for="gender">DOB:(MM/DD/YYYY)<span class="text-danger">*</span></label>
                        <input class="form-control" type="date" value="2011-08-19">
                    </div>

 <form  name="addEmployee" action="<?php echo URLROOT; ?>/employees/add" method="POST">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Personal Details</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li>
                </ul>
                <div class="tab-content" id="myEmployeeTab">
                    <div class="tab-pane fade show active  pt-4" id="details" role="tabpanel" aria-labelledby="details-tab">
                    
                      
                            <div class="row">
                                <!-- COLUMN-1 -->
                                <div class="col">

                                <fieldset><h2>Step 1: Create your account</h2>

                                    <div class="form-group">
                                        <label for="firstName" class="">First Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" class="form-control" id="firstName">
                                    </div>

                                    <div class="form-group">
                                        <label for="lasttName">Last Name:<span class="text-danger">*</span></label>
                                        <input type="text" name="lname" class="form-control" id="lasttName">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email:<span class="text-danger">*</span></label>
                                        <input type="email" name="empEmail" class="form-control" id="emailAddress">
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">DOB:<span class="text-danger">*</span></label>
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">Gender:<span class="text-danger">*</span></label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="gender" id="male" class="custom-control-input">
                                            <label class="custom-control-label" for="male">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" id="female" name="gender" class="custom-control-input">
                                            <label class="custom-control-label" for="female">Female</label>
                                        </div>
                                    </div>


                                    </fieldset>
                                    
                                    
                                    <div class="form-group">

                                    </div>

                                    <div class="form-group">

                                    </div>

                                    <div class="form-group">

                                    </div>

                                    <div class="form-group">

                                    </div>


                                    <input type="button" name="password" class="next btn btn-info" value="Next" />

                                   
                                    
                                    
                                </div>


                                <!-- COLUMN-2 -->
                                <div class="col">

                                    <div class="form-group row">
                                        <label for="empNo" class="col-12 col-sm-12 col-md-4 col-form-label">Employee Number:<span class="text-danger">*</span></label>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            <input type="text" name="empNo" class="form-control" id="empNo">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="empNo" class="col-12 col-sm-12 col-md-4 col-form-label">Department:<span class="text-danger">*</span></label>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            
                                            <select name="roleID" class="custom-select">
                                                <option value='0' selected>Department</option>
                                                <?php
                                                    foreach ($data['department'] as $role ) {
                                                        echo '<option value="' . $role->roleID . '">' . $role->roleName . '</option>';
                                                    }
                                                ?>
                                            </select>
                                        



                                        </div>
                                    </div>
                                    
                                    col 2
                                </div>


                            </div>
                            
                            



                        
                        




                       
                    
                    
                    </div>




                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                    <input type="button" name="previous" class="previous btn btn-default" value="Previous" />
    <input type="button" name="next" class="next btn btn-info" value="Next" />


                    </div>








                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>

            

                        </form>



                                <!-- COLUMN-2 -->
                                <div class="col">

                                    <div class="form-group row">
                                        <label for="empNo" class="col-12 col-sm-12 col-md-4 col-form-label">Employee Number:<span class="text-danger">*</span></label>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            <input type="text" name="empNo" class="form-control" id="empNo">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="empNo" class="col-12 col-sm-12 col-md-4 col-form-label">Department:<span class="text-danger">*</span></label>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            
                                            <select name="roleID" class="custom-select">
                                                <option value='0' selected>Department</option>
                                                <?php
                                                    foreach ($data['department'] as $role ) {
                                                        echo '<option value="' . $role->roleID . '">' . $role->roleName . '</option>';
                                                    }
                                                ?>
                                            </select>
                                        



                                        </div>
                                    </div>

                                    col 2
                                    </div>







































 <select name="gender" class="gender form-control">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>


<div class="form-group">
					<label for="inputdeptCode">Employee ID<sup>*</sup></label>
					<input type="text" name="deptCode" class="form-control <?php echo (!empty($data['deptCode_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptCode']; ?>" value="<?php echo $data['deptCode']; ?>" placeholder="Department Code"/>
					<?php echo (!empty($data['deptCode_err'])) ? '<span class="invalid-feedback">' . $data['deptCode_err'] . '</span>' : '' ; ?>
				</div> 

			<div class="form-group">
					<label for="inputdeptName">Department Name<sup>*</sup></label>
					<input type="text" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" value="<?php echo $data['deptName']; ?>" placeholder="Department Name" />
					<?php echo (!empty($data['deptName_err'])) ? '<span class="invalid-feedback">' . $data['deptName_err'] . '</span>' : '' ; ?>
				</div>

				<div class="form-group">
					<div class="col-lg-12 p-t-20 text-center">
						<a href="<?php echo URLROOT; ?>/emplpoyees" class="btn btn-danger btn-shadow text-uppercase mr-4">Cancel</a>
						<input type="submit" class="btn btn-primary btn-shadow text-uppercase" value="Submit" />
					</div>
				</div>
				
				
				

            
			
		 <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="email" type="email" class="validate form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Joining Date" data-dtp="dtp_ccoZY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Designation">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <div class="select-wrapper"><input class="select-dropdown dropdown-trigger" type="text" readonly="true" data-target="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a0"><ul id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a0" class="dropdown-content select-dropdown" tabindex="0"><li class="disabled selected" id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a00" tabindex="0"><span>Gender</span></li><li id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a01" tabindex="0"><span>Male</span></li><li id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a02" tabindex="0"><span>Female</span></li></ul><svg class="caret" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg><select class="col-12 m-t-20 p-l-0" tabindex="-1">
                                                <option disabled="" selected="">Gender</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Telephone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Birth Date" data-dtp="dtp_o05Ha">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label col-md-3">Upload Your Profile Photo</label>
                                    <form action="/" id="frmFileUpload" class="dropzone dz-clickable" method="post" enctype="multipart/form-data">
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">touch_app</i>
                                            </div>
                                            <h3>Drop files here or click to upload.</h3>
                                            <em>(This is just a demo dropzone. Selected files are
                                                <strong>not</strong>
                                                actually uploaded.)</em>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="button" class="btn btn-primary waves-effect m-r-15">Submit</button>
                                <button type="button" class="btn btn-danger waves-effect">Cancel</button>
                            </div>
                        </div>


*/ ?>
	