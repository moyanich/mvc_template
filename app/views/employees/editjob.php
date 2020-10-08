<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
                    <h6 class="text-uppercase text-muted font-weight-bold pb-2">JOB ID: <?php echo $data['id']; ?> - <?php echo $data['title']; ?></h6>
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

<div class="row gutters-sm">
    <div class="col-md-6 mb-3">
        <?php 
            /* Flash Messages */
            flashMessage('update_failure');
            flashMessage('update_success'); 
        ?>
    </div>
</div>

<div class="row gutters-sm">
    <div class="col-md-6 mb-3">
        <div class="card card-profile">
            <div class="card-body">
                <form id="foo" action="<?php echo URLROOT; ?>/employees/editjob/<?php echo $data['id'] ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <input type="hidden" name="empNo" class="form-control" value="<?php echo $data['empID']; ?>" />
                        </div>
                       
                        <div class="form-group col-12">
                            <label class="col-form-label" for="Job Title">Job Title<span class="text-danger pl-1">*</span></label>
                            <select name="job" class="custom-select form-control <?php echo (!empty($data['job_err'])) ? 'is-invalid' : '' ; ?>">
                                <option value="<?php echo $data['jobID']; ?>" selected><?php echo $data['position']; ?></option>
                                <?php 
                                foreach ($data['jobs'] as $job) { 
                                    if ($job->id != $data['jobID']) {
                                        echo '<option value="' . $job->id. '">' . $job->title . '</option>';
                                    }
                                } ?>
                            </select>
                            <?php echo (!empty($data['job_err'])) ? '<span class="invalid-feedback">' . $data['job_err'] . '</span>' : '' ; ?>
                        </div>


                        <div class="form-group col-12">
                            <label class="col-form-label" for="date_promoted">From Date:<span class="text-danger">*</span></label>
                            <input type="date" name="date_promoted" class="form-control <?php echo (!empty($data['date_promoted_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['from_date']; ?>">
                            <?php echo (!empty($data['date_promoted_err'])) ? '<span class="invalid-feedback">' . $data['date_promoted_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12">
                            <label class="col-form-label" for="to date">To Date:<span class="text-danger">*</span></label>
                            <input type="date" name="date_to" class="form-control <?php echo (!empty($data['date_to_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['to_date']; ?>">
                            <?php echo (!empty($data['date_to_err'])) ? '<span class="invalid-feedback">' . $data['date_to_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12">
                            <label class="col-form-label" for="Department">Department<span class="text-danger pl-1">*</span></label>
                            <select name="relDeptID" id="department" class="custom-select form-control <?php echo (!empty($data['relDeptID_err'])) ? 'is-invalid' : '' ; ?>">
                                <option value="<?php echo $data['deptID']; ?>" selected><?php echo $data['name']; ?></option>
                                <?php 
                                foreach ($data['deptList'] as $dept) { 
                                    if ($dept->id != $data['deptID']) {
                                        echo '<option value="' . $dept->id. '">' . $dept->name . '</option>';
                                    }
                                } ?>
                            </select>
                            <?php echo (!empty($data['relDeptID_err'])) ? '<span class="invalid-feedback">' . $data['relDeptID_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="<?php echo URLROOT; ?>/employees/profile/<?php echo $data['empID']; ?>" class=" btn btn-secondary cancel-btn">Cancel</a>
                        <input type="submit" name="jobSave" class="btn btn-primary btn-shadow text-uppercase empSave" value="Update" />
                    </div>
                </form>
            </div><!-- . card-body -->
        </div>
    </div>
   
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>






<!-- Modal Edit Job -->
<?php /* foreach ($data['fullJobHistory'] as $job) { ?>
    <div class="modal custom-modal fade" id="updateJobModal-<?php echo $job->id; ?>" tabindex="-1" aria-labelledby="updateJobModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="background-color: #C9DDFF;">
                    <form action="<?php echo URLROOT; ?>/employees/editjob/<?php echo $job->id ?>" method="post">
                        <div class="form-row">
                            <input type="hidden" name="empID" class="form-control" value="<?php echo $data['empID']; ?>" />
                        
                            <div class="form-group col-12">
                                <label class="col-form-label" for="Job Title">Job Title<span class="text-danger pl-1">*</span></label>
                                <select name="job" class="custom-select form-control <?php echo (!empty($data['job_err'])) ? 'is-invalid' : '' ; ?>">
                                    <option value="<?php echo $data['job']; ?>" selected><?php echo $data['job']; ?></option>
                                    <?php 
                                    foreach ($data['jobs'] as $job) { 
                                    echo '<option value="' . $job->id. '">' . $job->title . '</option>';
                                    } ?>
                                </select>
                                <?php echo (!empty($data['job_err'])) ? '<span class="invalid-feedback">' . $data['job_err'] . '</span>' : '' ; ?>
                            </div>



                            <select name="gender" id="gender" class="custom-select">
                                            <option value="<?php echo $data['gender']; ?>" selected><?php echo $data['gender']; ?></option>
                                            <?php 
                                            foreach ($data['gendersList'] as $empGender) { 
                                                if ($empGender->gender != $data['gender']) {
                                                    echo '<option value="' . $empGender->gender . '">' . $empGender->gender . '</option>';
                                                }
                                            } ?>
                                        </select>


                            <div class="form-group col-12">
                                <label class="col-form-label" for="date_promoted">From Date:<span class="text-danger">*</span></label>
                                <input type="date" name="date_promoted" class="form-control <?php echo (!empty($data['date_promoted_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['from_date']; ?>">
                                <?php echo (!empty($data['date_promoted_err'])) ? '<span class="invalid-feedback">' . $data['date_promoted_err'] . '</span>' : '' ; ?>
                            </div>

                            <div class="form-group col-12">
                                <label class="col-form-label" for="to date">To Date:<span class="text-danger">*</span></label>
                                <input type="date" name="date_to" class="form-control <?php echo (!empty($data['date_to_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['to_date']; ?>">
                                <?php echo (!empty($data['date_to_err'])) ? '<span class="invalid-feedback">' . $data['date_to_err'] . '</span>' : '' ; ?>
                            </div>

                            <div class="form-group col-12">
                                <label class="col-form-label" for="Department">Department<span class="text-danger pl-1">*</span></label>
                                <select name="relDeptID" id="department" class="custom-select form-control <?php echo (!empty($data['relDeptID_err'])) ? 'is-invalid' : '' ; ?>">
                                    <option value="" selected>Choose a Department</option>
                                    <?php 
                                    foreach ($data['deptList'] as $dept) { 
                                    echo '<option value="' . $dept->id. '">' . $dept->name . '</option>';
                                    } ?>
                                </select>
                                <?php echo (!empty($data['relDeptID_err'])) ? '<span class="invalid-feedback">' . $data['relDeptID_err'] . '</span>' : '' ; ?>
                            </div>
                        </div>



                        <input type="submit" value="Update" class="btn btn-warning update-btn modal-btn">
                        <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn modal-btn">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } */ ?>