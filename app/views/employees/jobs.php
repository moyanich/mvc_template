<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
                    <h6 class="text-uppercase font-weight-bold"><?php echo $data['first_name']; ?> <?php echo $data['last_name']; ?> - <?php echo $data['title']; ?></h6>
                    <h4 class="page-title pb-2"></h4>
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
    <div class="col-12 col-md-6 mb-3">
        <?php 
            /* Flash Messages */
            flashMessage('add_failure');
            flashMessage('add_error');
            flashMessage('add_success'); 
        ?>
    </div>
</div>


<div class="row gutters-sm">
    <div class="col-md-6 mb-3">
        <div class="card card-profile">
            <div class="card-header">
                <h4 class="card-title">Add New Job Title</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/employees/jobs/<?php echo $data['empID'] ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <input type="hidden" name="empNo" class="form-control" value="<?php echo $data['empID']; ?>" />
                        </div>
                       
                        <div class="form-group col-12">
                            <label class="col-form-label" for="Job Title">Job Title<span class="text-danger pl-1">*</span></label>
                            <select name="job" id="id" class="custom-select form-control <?php echo (!empty($data['job_err'])) ? 'is-invalid' : '' ; ?>">
                                <option value="" selected>Choose a Job Title</option>
                                <?php foreach ($data['jobs'] as $job) { 
                                   echo '<option value="' . $job->id. '">' . $job->title . '</option>';
                                } ?>
                            </select>
                            <?php echo (!empty($data['job_err'])) ? '<span class="invalid-feedback">' . $data['job_err'] . '</span>' : '' ; ?>

                            <?php echo (!empty($data['job_title'])) ? $data['job_title']  : '' ; ?>

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
                                <option value="" selected>Choose a Department</option>
                                <?php 
                                foreach ($data['deptList'] as $dept) { 
                                   echo '<option value="' . $dept->id. '">' . $dept->name . '</option>';
                                } ?>
                            </select>
                            <?php echo (!empty($data['relDeptID_err'])) ? '<span class="invalid-feedback">' . $data['relDeptID_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="<?php echo URLROOT; ?>/employees/profile/<?php echo $data['empID']; ?>" class=" btn btn-secondary cancel-btn">Cancel</a>
                        <input type="submit" name="jobSave" class="btn btn-primary btn-shadow text-uppercase empSave" value="Save" />
                    </div>
                   
                </form>
               
            </div><!-- . card-body -->
        </div>
    </div>
   
</div>





<?php require APPROOT . '/views/inc/footer.php'; ?>


<script>/*
$(document).on('change', 'select', function(e) {
    var jobID = $('#jobID').val();
    console.log(jobID);

    $.ajax({
        //type: 'GET',
        type: 'POST',
        url: 'getJobTitle',
        data: {
            jobID: jobID
        },
        success: function(response) {
            $( '#jobTitle').html(response);
        }
    });


    e.preventDefault(); 


});
*/
</script>

<script>
    /*
function jobSelect(str) {
    $(document).change(function(e) {
        var id = $('#id').val();
        console.log(id);

        // debug
       // console.log(gender);
        //console.log(dob);

        $.ajax({
            type: 'POST',
            url: 'getJobTitle',
            success: function(response) {
                alert(response);
            }
        });

        e.preventDefault(); 

    });  
}

/*

data: {
            id: id
        },
        success: function(response) {
            $( '#jobTitle').html(response);
        }

        */
</script>