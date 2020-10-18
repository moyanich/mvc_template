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
				<h4 class="card-title">Male Retirement Settings</h4>
				<button type="button" class="btn btn-light btn-sm btn-edit" data-toggle="modal" data-target="#retireMale"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" viewBox="0 0 576 512"><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg></button>
			</div>
			
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Male:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['male_retirement']; ?> years</div>
				</div>
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Female Retirement Settings</h4>
				<button type="button" class="btn btn-light btn-sm btn-edit" data-toggle="modal" data-target="#retireFemale"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="edit" class="svg-inline--fa fa-edit fa-w-18" role="img" viewBox="0 0 576 512"><path fill="currentColor" d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z"/></svg></button>
			</div>
			
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-sm-4 mb-3 d-flex align-items-end"><h6 class="mb-0">Female:</h6></div>
					<div class="col-12 col-sm-8 text-secondary mb-3 d-flex align-items-end"><?php echo $data['female_retirement']; ?> years</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!--end row-->

<!-- Modal Male Retirement-->
<div class="modal fade" id="retireMale" tabindex="-1" aria-labelledby="retire" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title font-weight-bold" id="exampleModalLabel">Edit Male Retirement Settings</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form name="retirementForm" action="<?php echo URLROOT; ?>/admin/editMaleRetirement" method="POST">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Male Retirement<span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input id="male_retirement" class="form-control" type="number" name="male_retirement" value="<?php echo $data['male_retirement']; ?>" onBlur="validateRetirement()">
							<span class="invalid-feedback"></span> 
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

<!-- Modal Female Retirement-->
<div class="modal fade" id="retireFemale" tabindex="-1" aria-labelledby="retire" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title font-weight-bold" id="exampleModalLabel">Edit Female Retirement Settings</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form name="retirementForm" action="<?php echo URLROOT; ?>/admin/editFemaleRetirement" method="POST">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Female Retirement<span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input id="female_retirement" class="form-control" type="number" name="female_retirement" value="<?php echo $data['female_retirement']; ?>" onBlur="validateRetirementFemale()">
							<span class="invalid-feedback"></span> 
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

<!--<script>validateRetirement();</script>-->





























