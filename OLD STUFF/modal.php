
<!--<div class="emp-edit"><button type="button" class="edit-icon" data-toggle="modal" data-target="#profileModal"><i class="fas fa-pencil-alt"></i></button></div>-->
<!-- Modal Profile -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleprofileModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile for Employee ID: <strong><?php echo $data['empID']; ?></strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="profileForm" action="<?php echo URLROOT; ?>/employees/editProfile/<?php echo $data['id']; ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group d-none">
                            <input type="hidden" name="maleYears" class="form-control" value="<?php echo $data['maleYears']; ?>">
                            <input type="hidden" name="femaleYears" class="form-control" value="<?php echo $data['femaleYears']; ?>">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-sm-4">
                            <label for="firstName" class="col-form-label">First Name:<span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control" id="firstName" value="<?php echo $data['first_name']; ?>" onBlur="validateFirstName(this.value)">
                            <span class="invalid-feedback" id="namefeedback"></span>

                            <?php /*echo (!empty($data['first_name_err'])) ? '<span class="invalid-feedback">' . $data['first_name_err'] . '</span>' : '' ; ?>

                            <input type="text" id="deptName" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" onkeyup="validateDeptName(this.value)" onBlur="validateRetirement()" /> */?>

                        </div>
                
                        <div class="form-group col-12 col-sm-4">
                            <label for="middleName" class="col-form-label">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control <?php echo (!empty($data['middle_name_err'])) ? 'is-invalid' : '' ; ?>" id="firstName" value="<?php echo $data['middle_name']; ?>">
                            <?php echo (!empty($data['middle_name_err'])) ? '<span class="invalid-feedback">' . $data['middle_name_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="lastName">Last Name:<span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : '' ; ?>" id="lastName" value="<?php echo $data['last_name']; ?>">
                            <?php echo (!empty($data['last_name_err'])) ? '<span class="invalid-feedback">' . $data['last_name_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="gender">Gender:<span class="text-danger">*</span></label>
                            <select name="gender" class="custom-select">
                                <?php 
                                echo '<option value="' . $data['gender'] . '">' . $data['gender']. '</option>';
                                if ($data['gender'] == "Female") { 
                                    echo '<option value="Male">Male</option>';
                                }
                                else {
                                    echo '<option value="Female">Female</option>';
                                }
                                ?> 
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
                            <label class="col-form-label" for="phoneOne">Phone Number:</label>
                            <!--  <input type="text" id="phoneOne" name="phoneOne" class="form-control" value="<?php echo $data['phoneOne']; ?>" onBlur="validatePhone()">
                            <span class="invalid-feedback" id="phoneOne-feedback"></span>-->

                           
                            <input type="text" name="phoneOne" class="form-control <?php echo (!empty($data['phoneOne_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['phoneOne']; ?>">
                            <?php echo (!empty($data['phoneOne_err'])) ? '<span class="invalid-feedback">' . $data['phoneOne_err'] . '</span>' : '' ; ?>

                            <label class="col-form-label" for="mobile">Phone Number:</label>
                            <input type="text" name="mobile" class="form-control <?php echo (!empty($data['phoneTwo_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['mobile']; ?>">
                            <?php echo (!empty($data['phoneTwo_err'])) ? '<span class="invalid-feedback">' . $data['phoneTwo_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="email">Email (Company):</label>
                            <input type="email" name="internalEmail" class="form-control <?php echo (!empty($data['internalEmail_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['internalEmail']; ?>">
                            <?php echo (!empty($data['internalEmail_err'])) ? '<span class="invalid-feedback">' . $data['internalEmail_err'] . '</span>' : '' ; ?>

                            <label class="col-form-label" for="email">Email (Personal):</label>
                            <input type="email" name="externalEmail" class="form-control <?php echo (!empty($data['externalEmail_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['externalEmail']; ?>">
                            <?php echo (!empty($data['externalEmail_err'])) ? '<span class="invalid-feedback">' . $data['externalEmail_err'] . '</span>' : '' ; ?>
                        </div>
                        
                    
                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-sm-4">
                           
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            
                        </div>
                    </div>

                    <div class="form-row">
                    
                    </div>

                    <div class="form-group">
                        <div class="col-lg-12 p-t-20 text-center">
                            <button type="button" class="btn btn-danger btn-shadow text-uppercase mr-4" data-dismiss="modal" aria-label="Close">Cancel</button>
                            <input type="submit" id="updateProfile" class="btn btn-primary btn-shadow text-uppercase" value="Save" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

