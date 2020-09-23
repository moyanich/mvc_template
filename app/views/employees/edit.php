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
    flashMessage('update_failure');
    flashMessage('update_success');
?>


<div class="row">
   <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile Information</h4>
            </div>
            <div class="card-body">
                <form id="profileForm" action="<?php echo URLROOT; ?>/employees/edit/<?php echo $data['id']; ?>" method="POST">
                    
                    <div class="form-row d-none">
                        <div class="form-group">
                            <input type="hidden" name="maleYears" class="form-control" value="<?php echo $data['maleYears']; ?>">
                            <input type="hidden" name="femaleYears" class="form-control" value="<?php echo $data['femaleYears']; ?>">
                        </div>
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
                                <label class="col-form-label" for="gender">Gender</label><span class="text-danger pl-1">*</span>
                                <select name="gender" id="gender" class="custom-select" onBlur="getRetirement()">
                                    <option value="<?php echo $data['gender']; ?>" selected><?php echo $data['gender']; ?></option>
                                    <?php foreach ($data['gendersList'] as $empGender) { 
                                        if ($empGender->gender != $data['gender']) {
                                            echo '<option value="' . $empGender->gender . '">' . $empGender->gender . '</option>';
                                        }
                                    } ?>
                                </select> 
                            </div>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="empDOB">DOB:<span class="text-danger pl-1">*</span></label>
                            <input type="text" id="dob" name="empDOB" class="form-control datepicker <?php echo (!empty($data['empDOB_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empDOB']; ?>" onBlur="getRetirement()">
                            <?php echo (!empty($data['empDOB_err'])) ? '<span class="invalid-feedback">' . $data['empDOB_err'] . '</span>' : '' ; ?>

                            
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="trn">RetirementDate:</label>
                            <input type="date" name="retirementDate" class="form-control" value="<?php echo $data['retirementDate']; ?>" disabled>
                            <span id="retirement"></span>
                           
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="trn">TRN:</label>
                            <input type="text" name="trn" class="form-control <?php echo (!empty($data['trn_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['trn']; ?>">
                            <?php echo (!empty($data['trn_err'])) ? '<span class="invalid-feedback">' . $data['trn_err'] . '</span>' : '' ; ?>
                        </div>

                    </div>

                    <div class="form-row">
                        
                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="nis">NIS:</label>
                            <input type="text" name="nis" class="form-control text-uppercase <?php echo (!empty($data['nis_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['nis']; ?>">
                            <?php echo (!empty($data['nis_err'])) ? '<span class="invalid-feedback">' . $data['nis_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="phoneOne">Phone Number (555-555-5555):</label>
                            <input type="tel" name="phoneOne" class="form-control <?php echo (!empty($data['phoneOne_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['phoneOne']; ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                            <?php echo (!empty($data['phoneOne_err'])) ? '<span class="invalid-feedback">' . $data['phoneOne_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="phoneTwo">Phone Number: (555-555-5555):</label>
                            <input type="tel" name="phoneTwo" class="form-control <?php echo (!empty($data['phoneTwo_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['phoneTwo']; ?>" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">

                            <!--  <input type="tel" name="phoneTwo" class="form-control" value="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"> -->
                            <?php echo (!empty($data['phoneTwo_err'])) ? '<span class="invalid-feedback">' . $data['phoneTwo_err'] . '</span>' : '' ; ?>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-12 col-sm-6">
                            <label class="col-form-label" for="email">Email (Personal):</label>
                            <input type="email" name="externalEmail" class="form-control text-lowercase <?php echo (!empty($data['externalEmail_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['externalEmail']; ?>">
                            <?php echo (!empty($data['externalEmail_err'])) ? '<span class="invalid-feedback">' . $data['externalEmail_err'] . '</span>' : '' ; ?>
                        </div> 
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
                                <option value="<?php echo $data['parish']; ?>" selected><?php echo $data['parish']; ?></option>
                                <?php foreach ($data['parishName'] as $parish ) {
                                    echo '<option value="' . $parish->parishName. '">' . $parish->parishName . '</option>';
                                } ?>
					        </select> 
				        </div>
                    </div>          

                    <div class="form-group">
                        <div class="col-lg-12 pt-5 mt-5 text-center">
                            <input type="submit" id="updateProfile" class="btn btn-primary btn-sm btn-shadow text-uppercase" value="Update" />
                        </div>
                    </div>

                </form>
            </div>
       </div>
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

<script>


function getRetirement() {
	$(document).ready(function() {
    var dob2 = $("#dob").val();
    var gender2 = $("#gender option:selected").val();
      
    if(gender2 == "Male") {
        console.log(gender2);
        console.log(dob2);

        $.ajax({
            type: 'POST',
            url: 'getMaleRetire',
            data: {
                gender2: gender,
                dob2: dob
            },
            success: function(response) {
                $( '#retirement').html(response);
            }
        });
    }
   else if(gender2 == "Female") {
            console.log(dob);
            console.log("FEMne");

            /*  $.ajax({
                type: 'POST',
                url: 'getFemaleRetire',
                data: {
                    gender: gender,
                    dob: dob
                },
                success: function(response) {
                    $( '#retirement').html(response);
                }
            }); */
            } 

        //e.preventDefault(); 
    }); 

}


</script>










<?php /*



        //var gender = $("input[name='gender']:checked").val();
            
        // debug
       // console.log(dob);
      // console.log(gender);

    <form id="profileForm" action="<?php echo URLROOT; ?>/employees/edit/<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">

 <label class="col-form-label" for="email">Email (Company):</label>
                            <input type="email" name="internalEmail" class="form-control <?php echo (!empty($data['internalEmail_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['internalEmail']; ?>">
                            <?php echo (!empty($data['internalEmail_err'])) ? '<span class="invalid-feedback">' . $data['internalEmail_err'] . '</span>' : '' ; ?>

                            */ ?>



<?php /* <div class="selectgroup w-100">
                                    <?php if ($data['gender'] == 'Male') { ?>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="gender" value="Male" class="selectgroup-input gender" onBlur="getRetirement(this.value)" checked>
                                            <span class="selectgroup-button">Male</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="gender" value="Female" class="selectgroup-input">
                                            <span class="selectgroup-button">Female</span>
                                        </label>

                                    <?php 
                                    } else if ($data['gender'] == 'Female') { ?>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="gender" value="Male" class="selectgroup-input gender">
                                            <span class="selectgroup-button">Male</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="gender" value="Female" class="selectgroup-input" checked onBlur="getRetirement(this.value)">
                                            <span class="selectgroup-button">Female</span>
                                        </label>

                                    <?php } ?>

                                    <span id="retirement"></span> 
                                </div>


                                <?php /*

                                <label class="selectgroup-item">
                                        <input type="radio" id="gender" name="gender" value="<?php echo $data['gender']; ?>" class="selectgroup-input gender" onBlur="getRetirement(this.value)" checked>
                                        <span class="selectgroup-button"><?php echo $data['gender']; ?></span>
                                    </label>
                                    
                                    <?php foreach ($data['gendersList'] as $empGender) { ?>
                                        <label class="selectgroup-item">
                                            <input type="radio" id="gender" name="gender" value="<?php echo $empGender->gender ; ?>" class="selectgroup-input gender" onBlur="getRetirement(this.value)">
                                            <span class="selectgroup-button"><?php echo $empGender->gender ; ?></span>
                                        </label>
                                   <?php } 

                                <select name="parish" class="custom-select">  
                                    <option value="<?php echo $data['parish']; ?>" selected><?php echo $data['parish']; ?></option>
                                    <?php foreach ($data['parishName'] as $parish ) {
                                        echo '<option value="' . $parish->parishName. '">' . $parish->parishName . '</option>';
                                    } ?>
                                </select> 





                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="Male" class="selectgroup-input gender" <?php if ($data['gender'] == "Male") { echo 'checked' ; } else { echo ''; } ?>  onBlur="getRetirement(this.value)">
                                        <span class="selectgroup-button">Male</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="gender" value="Female" class="selectgroup-input" <?php if ($data['gender'] == "Female") { echo 'checked=""'; } ?>>
                                        <span class="selectgroup-button">Female</span>
                                    </label>
                                </div>
                                <span id="retirement"></span>  */?>








