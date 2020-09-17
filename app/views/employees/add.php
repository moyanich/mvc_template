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
        <form id="addEmployee" name="empForm" action="<?php echo URLROOT; ?>/employees/add" method="POST">
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

                        <div class="form-group col-12 col-sm-4">
                            <label for="firstName" class="col-form-label">First Name:<span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : '' ; ?>" id="firstName" value="<?php echo $data['first_name']; ?>">
                            <?php echo (!empty($data['first_name_err'])) ? '<span class="invalid-feedback">' . $data['first_name_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12 col-sm-4">
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
                            <label class="col-form-label" for="gender">Gender:<span class="text-danger">*</span></label>
                            <select name="gender" id="gender" class="custom-select" onBlur="calcRetirement(this.value)">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <span id="retire"></span>
                        </div>

                        <div class="form-group col-12 col-sm-4">
                            <label class="col-form-label" for="empDOB">DOB:<span class="text-danger">*</span></label>
                            <input type="date" id="dob" name="empDOB" class="form-control <?php echo (!empty($data['empDOB_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empDOB']; ?>" onBlur="calcRetirement(this.value)">
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
                            <input type="submit" id="empSave" class="btn btn-primary btn-shadow text-uppercase empSave" value="Save" />
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
<!--end row-->


<?php require APPROOT . '/views/inc/footer.php'; ?>



<script>
function calcRetirement(str) {
	$(document).change(function() {
        var gender = $('#gender').val();
        var dob = $('#dob').val();

        // debug
       // console.log(gender);
        //console.log(dob);

        if(gender == "Male") {
            $.ajax({
                //type: 'GET',
                type: 'POST',
                url: 'getMaleRetire',
                data: {
                    gender: gender,
                    dob: dob
                },
                success: function(response) {
                    $( '#retire').html(response);

                }
            });
        }
        else if(gender == "Female") {
            //document.getElementById("#retirementDate").value = 'no';

            $.ajax({
                type: 'POST',
                url: 'getFemaleRetire',
                data: {
                    gender: gender,
                    dob: dob
                },
                success: function(response) {
                    $( '#retire').html(response);
                }
            });
        }

        e.preventDefault(); 
    });  
}






// WORKS
/*
$(document).on('change', 'select', function(e) {
    var gender = $('#gender').val();
    console.log(gender);

    if(gender == "Male") {
        $.ajax({
            type: 'GET',
            url: 'getMaleRetire',
            // url: 'code_query.php',
            //data: {'product_code': id },
            success: function (response) {
            // We get the element having id of display_info and put the response inside it
            $( '#records' ).html(response);
            console.log(response);

            }
        });
        

    }

});
*/
    
    // We get the element having id of display_info and put the response inside it
                   // console.log(response);

                    //$(this).find("#retirementDate").value = data;

                    //$this.closest("input").find("#retirementDate").val(response); // a number? +data to make numeric 

                  /*  var $input = $(this).find("#retirementDate");
                    if (!$input.val()) {
                      
                        //document.getElementById("#retirementDate").html = response;
                 } */

                    //$( '#records' ).html(response);


// For debugging purposes
    /*$(document).on('change', 'select', function(e) {
    var id = $('#gender').val();
    console.log(gender);
   if(id) {
        $.ajax({
            type: 'GET',
            url: 'empRecordQuery.php?id=' + id,
            // url: 'code_query.php',
            //data: {'product_code': id },
            success: function (response) {
            // We get the element having id of display_info and put the response inside it
            $( '#records' ).html(response);
            //console.log('here' + id);

            }
        });
    }
    e.preventDefault(); 
});*/

/* 

function getGender(str) {
	$(document).ready(function() {
        var gender = $('#gender').val();
        
        if(gender == "Male") {
            console.log(gender);
            var $input = $(this).find("input[name=retirementDate]");
            if (!$input.val()) {
            Value is falsey (i.e. null), lets set a new one
     

                $date = "2020-01-06";
                        echo date('Y-m-d', strtotime($date. ' + 1 year'));
                    $input.val("whatever you want"); 
                }
        }
        else if(gender == "Female") {
            console.log("no");
        }
        
    });  
}
*/



</script>

<?php /*

<datalist id="answers">
    <select name="employee">
        <?php
        /*
        * Queries employees who are still employed
        
        $emp = "SELECT empID, empFirstName, empLastName FROM employee WHERE empStatus IS NULL OR empStatus = 'No' ORDER BY empFirstName ASC";
        if ($stmt = $mysqli->prepare($emp)) {
            $stmt->execute();
            //$stmt->bind_result($name);
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {	 ?>
                <option data-value="<?php echo $row['empID']; ?>" value="<?php echo $row['empFirstName'] .' ' . $row['empLastName']; ?>"><?php echo $row['empFirstName']; ?> <?php echo $row['empLastName']; ?></option>
            <?php
            }
            $stmt->close();
        }
        ?>
    </select>
</datalist>
<input type="hidden" name="answer" id="answer-hidden">
<small class="form-text text-muted">Enter and/or Select name from dropdown</small>
                                                  

<script type="text/javascript">			

    $('input[list]').on('input', function(e) {
        var $input = $(e.target),
            $options = $('#' + $input.attr('list') + ' option'),
            $hiddenInput = $('#' + $input.attr('id') + '-hidden'),
            label = $input.val();

        $hiddenInput.val(label);

        for(var i = 0; i < $options.length; i++) {
            var $option = $options.eq(i);

            if($option.text() === label) {
                $hiddenInput.val( $option.attr('data-value') );
                break;
            }
        }
    });

    // For debugging purposes
    $(document).on('change', 'input', function(e) {
        var id = $('#answer-hidden').val();
        if(id) {
            $.ajax({
                type: 'GET',
                url: 'empRecordQuery.php?id=' + id,
                // url: 'code_query.php',
                //data: {'product_code': id },
                success: function (response) {
                // We get the element having id of display_info and put the response inside it
                $( '#records' ).html(response);
                //console.log('here' + id);

                }
            });
        }
        e.preventDefault();
    });
</script>

    */ ?>  