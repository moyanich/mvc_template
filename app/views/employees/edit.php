<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
                    <h4 class="page-title pb-2"><?php echo $data['title']; ?></h4>
                    <a href="<?php echo URLROOT; ?>/employees/profile/<?php echo $data['empID']; ?>" class="btn-link btn-sm text-uppercase"><i class="fas fa-backward"></i> Go back to profile</a>
                </div>
                <div class="col-auto align-self-center">
                    <?php displayDate(); ?>
				</div>
            </div>
		</div>
    </div>
</div>
<!--end row--><!-- end page title end breadcrumb -->

<div class="row">
    <div class="col-12 col-md-8">
        <?php 
            /* Flash Messages */
            flashMessage('update_failure');
            flashMessage('update_success');
        ?>
    </div>
</div>

<div class="row">
    <!-- end Profile Info -->
    <div class="col-12 col-md-8">
        <div class="card profile-edit" id="emp-profile">
            <div class="card-body">
                <form id="profileForm" action="<?php echo URLROOT; ?>/employees/edit/<?php echo $data['empID']; ?>" method="POST">
                    <div class="card-header">
                        <h4 class="card-title">Profile Information</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 col-sm-4">
                            <label for="firstName" class="col-form-label">First Name:<span class="text-danger pl-1">*</span></label>
                            <input type="text" name="first_name" class="form-control <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : '' ; ?>"  value="<?php echo $data['first_name']; ?>">
                            <?php echo (!empty($data['first_name_err'])) ? '<span class="invalid-feedback">' . $data['first_name_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label for="middleName" class="col-form-label">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control <?php echo (!empty($data['middle_name_err'])) ? 'is-invalid' : '' ; ?>"  value="<?php echo $data['middle_name']; ?>">
                            <?php echo (!empty($data['middle_name_err'])) ? '<span class="invalid-feedback">' . $data['middle_name_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="lastName">Last Name:<span class="text-danger pl-1">*</span></label>
                            <input type="text" name="last_name" class="form-control <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : '' ; ?>" id="lastName" value="<?php echo $data['last_name']; ?>">
                            <?php echo (!empty($data['last_name_err'])) ? '<span class="invalid-feedback">' . $data['last_name_err'] . '</span>' : '' ; ?>
                        </div>
                    </div> 

                    <div class="form-row">
                        <div class="form-group col-12 col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="gender">Gender<span class="text-danger pl-1">*</span></label>
                                
                                <select name="gender" id="gender" class="custom-select">
                                    <option value="<?php echo $data['gender']; ?>" selected><?php echo $data['gender']; ?></option>
                                    <?php 
                                    foreach ($data['gendersList'] as $empGender) { 
                                        if ($empGender->gender != $data['gender']) {
                                            echo '<option value="' . $empGender->gender . '">' . $empGender->gender . '</option>';
                                        }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="empDOB">DOB:<span class="text-danger pl-1">*</span></label>
                            <input type="date" id="dob" name="empDOB" class="form-control datepicker <?php echo (!empty($data['empDOB_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empDOB']; ?>">
                            <?php echo (!empty($data['empDOB_err'])) ? '<span class="invalid-feedback">' . $data['empDOB_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="trn">RetirementDate:</label>
                            <input type="text" name="retirementDate" class="form-control" value="<?php echo $data['retirementDate']; ?>" disabled />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="trn">TRN:</label>
                            <input type="number" name="trn" class="form-control <?php echo (!empty($data['trn_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['trn']; ?>">
                            <?php echo (!empty($data['trn_err'])) ? '<span class="invalid-feedback">' . $data['trn_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="nis">NIS:</label>
                            <input type="text" name="nis" class="form-control text-uppercase <?php echo (!empty($data['nis_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['nis']; ?>">
                            <?php echo (!empty($data['nis_err'])) ? '<span class="invalid-feedback">' . $data['nis_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="email">Email (Personal):</label>
                            <input type="email" name="externalEmail" class="form-control text-lowercase <?php echo (!empty($data['externalEmail_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['externalEmail']; ?>">
                            <?php echo (!empty($data['externalEmail_err'])) ? '<span class="invalid-feedback">' . $data['externalEmail_err'] . '</span>' : '' ; ?>
                        </div> 

                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="phoneOne">Phone Number (555-555-5555):</label>
                            <input type="tel" name="phoneOne" class="form-control <?php echo (!empty($data['phoneOne_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['phoneOne']; ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                            <?php echo (!empty($data['phoneOne_err'])) ? '<span class="invalid-feedback">' . $data['phoneOne_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="mobile">Mobile Phone: (555-555-5555):</label>
                            <input type="tel" name="mobile" class="form-control <?php echo (!empty($data['phoneTwo_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['mobile']; ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">

                            <!--  <input type="tel" name="mobile" class="form-control" value="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"> -->
                            <?php echo (!empty($data['phoneTwo_err'])) ? '<span class="invalid-feedback">' . $data['phoneTwo_err'] . '</span>' : '' ; ?>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label class="col-form-label" for="city">City</label>
                            <input type="text" name="city" class="form-control <?php echo (!empty($data['city_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['city']; ?>">
                            <?php echo (!empty($data['city_err'])) ? '<span class="invalid-feedback">' . $data['city_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="col-form-label" for="parish">Parish:</label>
                            <select name="parish" class="custom-select">  
                                <option value="<?php echo $data['parish']; ?>" selected><?php echo $data['parish']; ?></option>
                                <?php foreach ($data['parishName'] as $parish ) {
                                    if ( $parish->parishName != $data['parish']) {
                                        echo '<option value="' . $parish->parishName . '">' . $parish->parishName . '</option>';
                                    }
                                } ?>
                            </select> 
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="col-form-label" for="address">Address</label>
                            <textarea class="form-control <?php echo (!empty($data['address_err'])) ? 'is-invalid' : '' ; ?>" name="address" cols="50" rows="10" id="address"><?php echo $data['address']; ?></textarea>
                            <?php echo (!empty($data['address_err'])) ? '<span class="invalid-feedback">' . $data['address_err'] . '</span>' : '' ; ?>
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <div class="col-lg-12 pt-1 text-center">
                            <a href="<?php echo URLROOT; ?>/employees/profile/<?php echo $data['empID']; ?>" class="btn btn-danger btn-shadow text-uppercase mr-3">Cancel</a>
                            <input type="submit" id="updateProfile" name="updateProfile" class="btn btn-primary btn-shadow text-uppercase" value="Update" />
                        </div>
                    </div>
                </form>

            </div>
       </div>
    </div>
    <!-- end Profile Info -->
</div>
<!--end row-->


<?php require APPROOT . '/views/inc/footer.php'; ?>















<?php /*

<div class="form-row">
                                <div class="form-group col-12">
                                    <label class="col-form-label" for="Job Title">Job Title</label>
                                    <input type="text" name="job" class="form-control" value="<?php // foreach ($data['jobs'] as $job) {echo $job->job; }?>">
                                </div> 
                            </div> 

                            <div class="form-group">
                                <label class="col-form-label" for="department">Job Title<span class="text-danger pl-1">*</span></label>
                                <select name="deptID" id="department" class="custom-select">
                                    <?php 
                                    foreach ($data['jobs'] as $jobitem) { 
                                        echo '<option value="' . $jobitem->id. '">' . $jobitem->title . '</option>';
                                    } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label" for="department">Department:<span class="text-danger pl-1">*</span></label>
                                <select name="deptID" id="department" class="custom-select">
                                    <?php 
                                    if(!empty($data['relDeptID'])) {
                                        echo '<option value="' . $data['relDeptID'] . '" selected>'.  $data['deptName'] . '</option>';
                                    }
                                    if(empty($data['relDeptID'])) {
                                        echo '<option value="' . $data['relDeptID'] . '" selected></option>';
                                    }
                                    foreach ($data['departmentsList'] as $dept) { 
                                        if ($dept->id != $data['relDeptID']) {
                                            echo '<option value="' . $dept->id. '">' . $dept->name . '</option>';
                                        }
                                   } ?>
                                </select>
                            </div>




*/ ?>