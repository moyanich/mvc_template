<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
                <div class="col">
                    <h6 class="text-uppercase text-muted font-weight-bold pb-2"><?php echo $data['title']; ?> - <?php echo $data['first_name']; ?> <?php echo $data['last_name']; ?></h6>
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
    <div class="col-12 col-md-6">
        <?php 
            /* Flash Messages */
            flashMessage('update_failure');
            flashMessage('update_success');
        ?>
    </div>
</div>

<div class="row">
    <!-- end Profile Info -->
    <div class="col-12 col-md-6">
        <div class="card profile-edit" id="emp-profile">
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/employees/companyinfo/<?php echo $data['empID']; ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="col-form-label" for="hire_date">Employee ID:<span class="text-danger pl-1">*</span></label>
                            <input type="text" name="empID" class="form-control" value="<?php echo $data['empID']; ?>" disabled />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="col-form-label" for="hire_date">Hire Date:<span class="text-danger pl-1">*</span></label>
                            <input type="date" name="hire_date" class="form-control <?php echo (!empty($data['hire_date_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['hire_date']; ?>">
                            <?php echo (!empty($data['hire_date_err'])) ? '<span class="invalid-feedback">' . $data['hire_date_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>
                                            
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label class="col-form-label" for="email">Email (Company):</label>
                            <input type="email" name="internalEmail" class="form-control text-lowercase <?php echo (!empty($data['internalEmail_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['internalEmail']; ?>">
                            <?php echo (!empty($data['internalEmail_err'])) ? '<span class="invalid-feedback">' . $data['internalEmail_err'] . '</span>' : '' ; ?>
                        </div> 
                    </div> 
                
                    <div class="form-group">
                        <div class="col-lg-12 pt-1 text-center">
                            <a href="<?php echo URLROOT; ?>/employees/profile/<?php echo $data['empID']; ?>" class="btn btn-danger btn-shadow text-uppercase mr-3">Cancel</a>
                            <input type="submit" id="updateProfile" name="updateCompanyProfile" class="btn btn-primary btn-shadow text-uppercase" value="Update" />
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

