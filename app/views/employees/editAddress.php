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
    <div class="col-12 col-md-4">
        <?php 
            /* Flash Messages */
            flashMessage('update_failure');
            flashMessage('update_success');
        ?>
    </div>
</div>

<div class="row">
    <!-- end Profile Info -->
    <div class="col-12 col-md-4">
        <div class="card profile-edit" id="emp-profile">
            <div class="card-body">
                <form id="profileForm" action="<?php echo URLROOT; ?>/employees/editAddress/<?php echo $data['empID']; ?>" method="POST">
                    <div class="card-header">
                        <h4 class="card-title">Employee Address</h4>
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


                        <div class="form-group col-12 col-md-6">
                            <label class="col-form-label" for="parish">Parish:</label>
                            <select name="parish" class="custom-select">  
                                <option value="<?php echo $data['parishID']; ?>" selected><?php echo $data['parish']; ?></option>
                                <?php foreach ($data['parishName'] as $parish ) {
                                    if ( $parish->parishName != $data['parish']) {
                                        echo '<option value="' . $parish->id . '">' . $parish->parishName . '</option>';
                                    }
                                } ?>
                            </select> 
                        </div>

                        <div class="form-group col-12 col-md-6">
                       
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
