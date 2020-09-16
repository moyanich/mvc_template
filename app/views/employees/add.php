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


                        <!--<div class="form-group col-12 col-sm-2">
                            <label for="title" class="col-form-label">Title:</label>
                            <select class="custom-select" name="empTitle">
                                <option value="Mr." selected>Mr.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Miss">Miss</option>
                                <option value="Ms.">Ms.</option>
                            </select>
                        </div>-->

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
</div>
<!--end row-->



<?php require APPROOT . '/views/inc/footer.php'; ?>


