<?php require APPROOT . '/views/inc/header.php'; ?>



<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
               <h4 class="page-title"><?php echo $data['title']; ?></h4>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0);">Dastyle</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                  <li class="breadcrumb-item active">FAQs</li>
               </ol>
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
flashMessage('add_success'); 
flashMessage('save_error'); 

?>

<div class="row">

	<!-- Company Informations -->
   	<div class="col-12 col-md-6">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Company Information</h4>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-light btn-sm btn-edit" data-toggle="modal" data-target="#compInfo"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" viewBox="0 0 576 512"><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg>Edit</button>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Company Name:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['compName']; ?></div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Contact Person:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['contactPerson']; ?></div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Company TRN:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['compTRN']; ?></div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Company NIS:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['compNIS']; ?></div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Address:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['address']; ?></div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">City:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['city']; ?></div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Parish:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['parish']; ?></div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Email:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['email']; ?></div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Main Phone Number:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['main_phone']; ?></div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Secondary Phone Number:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['secondary_phone']; ?></div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Site URL:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['compUrl']; ?></div>
				</div>

			</div>
		</div>
	</div>

	<div class="col-12 col-md-3">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Re</h4>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-light btn-sm btn-edit" data-toggle="modal" data-target="#re"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" viewBox="0 0 576 512"><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg>Edit</button>
			</div>
			<div class="card-body">
				

			</div>
		</div>
	</div>

	<!-- Retirement Settings -->
	<div class="col-12 col-md-3">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Retirement Settings</h4>
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-light btn-sm btn-edit" data-toggle="modal" data-target="#retire"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" viewBox="0 0 576 512"><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg>Edit</button>
			</div>
			
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Male:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['male_retirement']; ?> years</div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Female:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['female_retirement']; ?> years</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!--end row-->

<!-- Modal Retirement-->
<div class="modal fade" id="retire" tabindex="-1" aria-labelledby="retire" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title font-weight-bold" id="exampleModalLabel">Edit Retirement Settings</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form name="retirementForm" action="<?php echo URLROOT; ?>/admin/editRetirement" method="POST">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Male Retirement<span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input id="male_retirement" class="form-control" type="number" name="male_retirement" value="<?php echo $data['male_retirement']; ?>">
							<span class="invalid-feedback"></span> 
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Female Retirement<span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input id="female_retirement" class="form-control" type="number" name="female_retirement" value="<?php echo $data['female_retirement']; ?>">
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-12 p-t-20 text-center">
							<button type="button" class="btn btn-danger btn-shadow text-uppercase mr-4" data-dismiss="modal">Close</button>
							<input type="submit" class="btn btn-primary btn-shadow text-uppercase" value="Save" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Modal Company -->
<div class="modal fade" id="compInfo" tabindex="-1" aria-labelledby="compInfo" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title font-weight-bold" id="exampleModalLabel">Edit <?php echo $data['title']; ?></h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form name="compForm" action="<?php echo URLROOT; ?>/admin/editCompany" method="POST">
				<div class="form-group">
					<label>Company Name <span class="text-danger">*</span></label>
					<input id="compName" class="form-control" type="text" name="compName" value="<?php echo $data['compName']; ?>" onBlur="validatecompName()">
					<span class="invalid-feedback"></span> 
				</div>

				<div class="form-group">
					<label>Contact Person:</label>
					<input class="form-control" type="text" name="contactPerson" value="<?php echo $data['contactPerson']; ?>">
				</div>

				<div class="form-group">
					<label>Company TRN:</label>
					<input id="compTRN" class="form-control" type="text" name="compTRN" value="<?php echo $data['compTRN']; ?>" onBlur="validateTRN()">
					<span class="invalid-feedback"></span> 
				</div>

				<div class="form-group">
					<label>Company NIS:</label>
					<input id="compNIS" class="form-control" type="text" name="compNIS" value="<?php echo $data['compNIS']; ?>" onBlur="validateNIS()">
					<span class="invalid-feedback"></span> 
				</div>

				<div class="form-group">
					<label>Address:</label>
					<textarea class="form-control" name="address"><?php echo $data['address']; ?></textarea>
				</div>

				<div class="form-group">
					<label>City:</label>
					<input class="form-control" type="text" name="city" value="<?php echo $data['city']; ?>">
				</div>

				<div class="form-group">
					<label>Parish:</label>
					<select name="parish" class="custom-select">
						<option value="<?php echo $data['parish']; ?>"><?php echo $data['parish']; ?></option>
						<?php foreach ($data['parishName'] as $parish ) {
							echo '<option value="' . $parish->parishName. '">' . $parish->parishName . '</option>';
						} ?>
					</select>
				</div>

				<div class="form-group">
					<label>Email:</label>
      				<input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>">
				</div>

				<div class="form-group">
					<label>Main Phone Numnber<span class="text-danger">*</span></label>
					<input class="form-control" type="tel" name="main_phone" value="<?php echo $data['main_phone']; ?>">
				</div>

				<div class="form-group">
					<label>Secondary Phone Numnber<span class="text-danger">*</span></label>
					<input class="form-control" type="tel" name="secondary_phone" value="<?php echo $data['secondary_phone']; ?>">
				</div>

				<div class="form-group">
					<label>Site URL<span class="text-danger">*</span></label>
					<input class="form-control" type="url" name="compUrl" value="<?php echo $data['compUrl']; ?>">
				</div>

				<div class="form-group">
					<div class="col-lg-12 p-t-20 text-center">
						<button type="button" class="btn btn-danger btn-shadow text-uppercase mr-4" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-primary btn-shadow text-uppercase" value="Save" />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>


<script>
    function validatecompName() {
		var compName = $('#compName').val();
				
        $.ajax({
            type: 'POST',
            data: {
                compName: compName
            },
            url: '<?php echo URLROOT; ?>/admin/validatecompName',
            success: function(response) {
				$('.invalid-feedback').html(response);
				if($.trim(response)) {
					$('#compName').addClass('is-invalid');
				}
				else if (!$.trim(response)) {
					$('#compName').removeClass('is-invalid');
				}
            },
            error:function() {}
        }); 
	}

	function validateTRN() {
		var compTRN = $('#compTRN').val();
        $.ajax({
            type: 'POST',
            data: {
                compTRN: compTRN
            },
            url: '<?php echo URLROOT; ?>/admin/validateTRN',
            success: function(response) {
				$('.invalid-feedback').html(response);
				if($.trim(response)) {
					$('#compTRN').addClass('is-invalid');
				}
				else if (!$.trim(response)) {
					$('#compTRN').removeClass('is-invalid');
				}
            },
            error:function() {}
        }); 
	}

	function validateNIS() {
		var compNIS = $('#compNIS').val();
						
        $.ajax({
            type: 'POST',
            data: {
				compNIS: compNIS
            },
            url: '<?php echo URLROOT; ?>/admin/validateNIS',
            success: function(response) {
				$('.invalid-feedback').html(response);
				if($.trim(response)) {
					$('#compNIS').addClass('is-invalid');
				}
				else if (!$.trim(response)) {
					$('#compNIS').removeClass('is-invalid');
				}
            },
            error:function() {}
        }); 
	}


</script>




<script>
/*
    function validatecompName() {
		var compName = $('#compName').val();
				
        $.ajax({
            type: 'POST',
            data: {
                compName: compName
            },
            url: '<?php echo URLROOT; ?>/admin/validatecompName',
            success: function(response) {
				$('.invalid-feedback').html(response);
				if($.trim(response)) {
					$('#compName').addClass('is-invalid');
				}
				else if (!$.trim(response)) {
					$('#compName').removeClass('is-invalid');
				}
            },
            error:function() {}
        }); 
	}

	var first_call = false;
var second_call = false;

//make the first call
$.ajax({
    url: "/some/page",
    success: function(data){
        //set a success variable
        first_call = true;
    }
});

//make the second call
$.ajax({
    url: "/some/other-page",
    success: function(data){
        //set a success variable
        second_call = true;
    }
});

if(first_call && second_call){
    //we're good to go - do something
}
else{
    //ruh roh - bail out!
}
*/

</script>








<?php
 /* if(str.length == 0){
		document.getElementById('deptName-feedback').innerHTML = '';
	} else {
		// AJAX REQUEST
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById('deptName-feedback').innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET", "<?php echo URLROOT; ?>/app/helpers/validation_helper.php?q="+str, true);
		xmlhttp.send();
    }

   
    $.ajax({
        type: 'POST',
        data: {
            deptName: str
        }, 
        url: '<?php echo URLROOT; ?>/app/helpers/validation_helper.php',
        
        success: function(data) {
           // $("#deptName-feedback").html(data);
           //$('#deptName-feedback').html('Department Name already exists');
           document.getElementById('deptName-feedback').innerHTML = this.responseText;
        },
        error:function() {
            // just in case posting your form failed
            alert( "Validation Failed." );

        }
      

    });     
   */






/*


<div class="row">
   	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Edit Company Information</h4>
			</div>
			<div class="card-body">

			







				<form name="compForm" action="<?php echo URLROOT; ?>/admin/company" method="POST">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								
								<label>Company Name <span class="text-danger">*</span></label>
								<input class="form-control" type="text" name="compName" value="<?php echo $data['compName']; ?>">


								<?PHP /*<div class="form-group">
                        <label for="deptCode">Department Code<sup>*</sup></label>
                        <input type="text" name="deptCode" class="form-control <?php echo (!empty($data['deptCode_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['siteurl']; ?>"/>
                        
                        <?php echo (!empty($data['deptCode_err'])) ? '<span class="invalid-feedback">' . $data['deptCode_err'] . '</span>' : '' ; ?>                            
					</div> 
					

					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Contact Person</label>
						<input class="form-control" name="contactPerson" value=" " type="text">
					</div>
				</div>
			</div>
			<div class="row" data-select2-id="10">
				<div class="col-sm-12">
					<div class="form-group">
						<label>Address</label>
						<input class="form-control " value="3864 Quiet Valley Lane, Sherman Oaks, CA, 91403" type="text">
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3" data-select2-id="9">
					<div class="form-group" data-select2-id="8">
						<label>Country</label>
						<select class="form-control select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
							<option data-select2-id="3">USA</option>
							<option data-select2-id="15">United Kingdom</option>
						</select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-wn37-container"><span class="select2-selection__rendered" id="select2-wn37-container" role="textbox" aria-readonly="true" title="USA">USA</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3">
					<div class="form-group">
						<label>City</label>
						<input class="form-control" value="Sherman Oaks" type="text">
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3">
					<div class="form-group">
						<label>State/Province</label>
						<select class="form-control select select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true">
							<option data-select2-id="6">California</option>
							<option>Alaska</option>
							<option>Alabama</option>
						</select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-yvzt-container"><span class="select2-selection__rendered" id="select2-yvzt-container" role="textbox" aria-readonly="true" title="California">California</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3">
					<div class="form-group">
						<label>Postal Code</label>
						<input class="form-control" value="91403" type="text">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Email</label>
						<input class="form-control" value="danielporter@example.com" type="email">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Phone Number</label>
						<input class="form-control" value="818-978-7102" type="text">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Mobile Number</label>
						<input class="form-control" value="818-635-5579" type="text">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Fax</label>
						<input class="form-control" value="818-978-7102" type="text">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<label>Website Url</label>
						<input class="form-control" name="siteurl" value="https://www.example.com" type="text">
					</div>
				</div>
			</div>
			
		</form>
	</div>
</div>
</div>
</div>

*/?>

