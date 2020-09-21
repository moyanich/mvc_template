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
                </div>
                <div class="col-auto align-self-center">
                    <button type="button" class="btn btn-danger btn-shadow text-uppercase mr-4">Cancel</button>
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


<div class="row">
   <div class="col-12 col-md-6">
        <form id="profileForm" action="<?php echo URLROOT; ?>/employees/edit/<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header d-flex">
                    <h4 class="card-title">Profile Information</h4>
                    <div class="ml-auto">
                        <input type="submit" id="updateProfile" class="btn btn-primary btn-sm btn-shadow text-uppercase" value="Update" />
                    </div>
                </div>
                <div class="card-body">
                    
                    <?php /* <div class="form-row">
                        <div class="form-group d-none">
                            <input type="hidden" name="maleYears" class="form-control" value="<?php echo $data['maleYears']; ?>">
                            <input type="hidden" name="femaleYears" class="form-control" value="<?php echo $data['femaleYears']; ?>">
                        </div>
                    </div> */ ?>

                    <div class="form-row">
                        <div class="form-group col-12 col-sm-4">
                            <label for="firstName" class="col-form-label">First Name:<span class="text-danger pl-1">*</span></label>
                            <input type="text" name="first_name" class="form-control <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : '' ; ?>" id="firstName" value="<?php echo $data['first_name']; ?>">
                            <?php echo (!empty($data['first_name_err'])) ? '<span class="invalid-feedback">' . $data['first_name_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label for="middleName" class="col-form-label">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control <?php echo (!empty($data['middle_name_err'])) ? 'is-invalid' : '' ; ?>" id="firstName" value="<?php echo $data['middle_name']; ?>">
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
                            <label class="col-form-label" for="empDOB">DOB:<span class="text-danger pl-1">*</span></label>
                            <input type="text" name="empDOB" class="form-control datepicker <?php echo (!empty($data['empDOB_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empDOB']; ?>">
                            <?php echo (!empty($data['empDOB_err'])) ? '<span class="invalid-feedback">' . $data['empDOB_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="gender">Gender</label>
                                <span class="text-danger pl-1">*</span>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="Male" class="selectgroup-input" <?php if ($data['gender'] == "Male") { echo 'checked=""'; } ?>>
                                        <span class="selectgroup-button">Male</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="Female" class="selectgroup-input" <?php if ($data['gender'] == "Female") { echo 'checked=""'; } ?>>
                                        <span class="selectgroup-button">Female</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">


                    </div>


                    <div class="form-group">
					<label>Company TRN:</label>
					<input id="compTRN" class="form-control" type="text" name="compTRN" value="<?php echo $data['trn']; ?>" onBlur="validateTRN()">
					<span class="invalid-feedback"></span> 
				</div>

				<div class="form-group">
					<label>Company NIS:</label>
					<input id="compNIS" class="form-control" type="text" name="compNIS" value="<?php echo $data['nis']; ?>" onBlur="validateNIS()">
					<span class="invalid-feedback"></span> 
				</div>





                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="col-form-label" for="address">Address</label>
                            <textarea class="form-control <?php echo (!empty($data['address_err'])) ? 'is-invalid' : '' ; ?>" name="address" cols="50" rows="10" id="address"><?php echo $data['address']; ?></textarea>
                            <?php echo (!empty($data['address_err'])) ? '<span class="invalid-feedback">' . $data['address_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-md-6">
                            <label class="col-form-label" for="city">City</label>
                            <input type="text" name="city" class="form-control <?php echo (!empty($data['city_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['city']; ?>">
                            <?php echo (!empty($data['city_err'])) ? '<span class="invalid-feedback">' . $data['city_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="parish">Parish:</label>
                            <select name="parish" class="custom-select">  
                                <option value="<?php echo $data['parish']; ?>" selected><?php echo $data['parish']; ?></option>
                                <?php foreach ($data['parishName'] as $parish ) {
                                    echo '<option value="' . $parish->parishName. '">' . $parish->parishName . '</option>';
                               }  ?>
					        </select> 
				        </div>
                    </div>          



                    <?php /*
                   
                    <div class="form-row">
                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="phoneOne">Phone Number:</label>
                            <!--  <input type="text" id="phoneOne" name="phoneOne" class="form-control" value="<?php echo $data['phoneOne']; ?>" onBlur="validatePhone()">
                            <span class="invalid-feedback" id="phoneOne-feedback"></span>-->

                           
                            <input type="text" name="phoneOne" class="form-control <?php echo (!empty($data['phoneOne_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['phoneOne']; ?>">
                            <?php echo (!empty($data['phoneOne_err'])) ? '<span class="invalid-feedback">' . $data['phoneOne_err'] . '</span>' : '' ; ?>

                            <label class="col-form-label" for="phoneTwo">Phone Number:</label>
                            <input type="text" name="phoneTwo" class="form-control <?php echo (!empty($data['phoneTwo_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['phoneTwo']; ?>">
                            <?php echo (!empty($data['phoneTwo_err'])) ? '<span class="invalid-feedback">' . $data['phoneTwo_err'] . '</span>' : '' ; ?>
                        </div>

                       <?php /* <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="email">Email (Company):</label>
                            <input type="email" name="internalEmail" class="form-control <?php echo (!empty($data['internalEmail_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['internalEmail']; ?>">
                            <?php echo (!empty($data['internalEmail_err'])) ? '<span class="invalid-feedback">' . $data['internalEmail_err'] . '</span>' : '' ; ?>

                            <label class="col-form-label" for="email">Email (Personal):</label>
                            <input type="email" name="externalEmail" class="form-control <?php echo (!empty($data['externalEmail_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['externalEmail']; ?>">
                            <?php echo (!empty($data['externalEmail_err'])) ? '<span class="invalid-feedback">' . $data['externalEmail_err'] . '</span>' : '' ; ?>
                        </div> 
                        
                    
                    </div>*/?>

                    <div class="form-group">
                        <div class="col-lg-12 pt-5 mt-5 text-right">
                           
                        </div>
                    </div>
            
                </div>
            </div>
        </form>
   </div>

   <div class="col-12 col-md-6">
        <form>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Company Information</h4>
                </div>
                <div class="card-body">

                    <div class="form-row">
                        <div class="form-group col-12 col-sm-4">
                           
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            
                        </div>
                    </div>

                    <div class="form-row">
                    
                    </div>

                </div>
            </div>
        </form>
   </div>

                    
</div>
<!--end row-->







<?php require APPROOT . '/views/inc/footer.php'; ?>






























