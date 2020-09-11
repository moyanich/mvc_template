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
               <p><?php echo $data['description']; ?></p>
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
  //  flashMessage('update_failure');
  //  flashMessage('update_sucess');
?>

<div class="row gutters-sm">
    <div class="col-md-4 mb-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                    <p class="text-muted font-size-sm mb-0">ID: <?php echo $data['empID']; ?></p>
                    <h4><?php echo $data['first_name'] . ' ' .  $data['middle_name'] . ' ' .  $data['last_name']; ?></h4>
                    <p class="text-secondary mb-1">Full Stack Developer</p>
                    <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
        stuff
        </div>
    </div>
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                <h4 class="card-title">Personal Information</h4>
                <p class="text-muted mb-0"><?php echo $data['retirement'] ; ?></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="row">
                            <div class="col-sm-3 mb-3 d-flex align-items-end"><h6 class="mb-0">Full Name:</h6></div>
                            <div class="col-sm-9 text-secondary mb-3 d-flex align-items-end"><?php echo $data['first_name'] . ' ' .  $data['middle_name'] . ' ' .  $data['last_name']; ?></div>
                            
                            <div class="col-sm-3 mb-3"><h6 class="mb-0">Email:</h6></div>
                            <div class="col-sm-9 text-secondary mb-3"><a href="mailto:<?php echo $data['empEmail']; ?>"><?php echo $data['empEmail']; ?></a></div>

                            <div class="col-sm-3 mb-3"><h6 class="mb-0">DOB:</h6></div>
                            <div class="col-sm-9 text-secondary mb-3"><?php echo $data['empDOB']; ?></div>

                            <div class="col-sm-3 mb-3"><h6 class="mb-0">Gender:</h6></div>
                            <div class="col-sm-9 text-secondary mb-3"><?php echo $data['gender']; ?></div>

                            

                        </div><!-- .row -->
                    </div><!-- .col-12 .col-sm-6 -->

                    <div class="col-12 col-sm-6">
2
                    </div><!-- .col-12 .col-sm-6 -->



              
                </div><!-- .row -->
               

                
                
            </div><!-- .card-body -->
        </div>
        <div class="row gutters-sm">
        <div class="col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    gssgd
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    sgshs
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>





            <?php /*<form action="<?php echo URLROOT; ?>/employees/edit/<?php echo $data['id']; ?>" method="POST">
                 <div class="form-group">
                        <label for="deptCode">Department Code<sup>*</sup></label>
                        <input type="text" name="deptCode" class="form-control <?php echo (!empty($data['deptCode_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptCode']; ?>"/>
                        
                        <?php echo (!empty($data['deptCode_err'])) ? '<span class="invalid-feedback">' . $data['deptCode_err'] . '</span>' : '' ; ?>                                
                    </div> 

                    <div class="form-group">
                        <label for="inputDeptName">Department Name<sup>*</sup></label>
                        <input type="text" id="deptName" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" onkeyup="validateDeptName(this.value)" />

                        <span id="deptName-feedback" class=""></span>

                        <?php echo (!empty($data['deptName_err'])) ? '<span class="invalid-feedback">' . $data['deptName_err'] . '</span>' : '' ; ?>
                    </div>

                    <div class="form-group text-center">
                        <div class="col-lg-12 p-t-20 text-center">
                            <a href="<?php echo URLROOT; ?>/departments" class="btn btn-danger btn-shadow text-uppercase mr-4">Cancel</a>
                            <input type="submit" name="btn-update" class="btn btn-primary btn-shadow text-uppercase" value="Update" />
                        </div>
                    </div> */ ?>
                </form>
          

 
</div>
<!--end row-->


<?php require APPROOT . '/views/inc/footer.php'; ?>

