<div class="row gutters-sm">
    <div class="col-md-6 mb-3">
        <div class="card card-profile">
            <div class="card-header">
                <h4 class="card-title">Add New Job Title</h4>
            </div>
            <div class="card-body">
                <form id="foo" action="<?php echo URLROOT; ?>/employees/jobs/<?php echo $data['empID'] ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <input type="hidden" name="empID" class="form-control" value="<?php echo $data['empID']; ?>" />
                        </div>
                       
                        <div class="form-group col-12">
                            <label class="col-form-label" for="Job Title">Job Title<span class="text-danger pl-1">*</span></label>
                            <select name="job" class="custom-select form-control <?php echo (!empty($data['job_err'])) ? 'is-invalid' : '' ; ?>">
                                <option value="" selected>Choose a Job Title</option>
                                <?php 
                                foreach ($data['jobs'] as $job) { 
                                   echo '<option value="' . $job->id. '">' . $job->title . '</option>';
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


<script>
/*
$(document).ready(function() {
    // Variable to hold request
    var request;

    // Bind to the submit event of our form
    $("#foo").submit(function(event){

        // Prevent default posting of form - put here to work in case of errors
        event.preventDefault();


        // Abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);

        // Let's select and cache all the fields
        var $inputs = $form.find("input, select, button");

        // Serialize the data in the form
        var serializedData = $form.serialize();

        // Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);

        // Fire off the request to /form.php
        request = $.ajax({
            url: "validateJob",
            type: "post",
            data: serializedData
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            console.log("Hooray, it worked!");

            $('.invalid-feedback').html(response);
            if($.trim(response)) {
                $('#job').addClass('is-invalid');
            }
            else if (!$.trim(response)) {
                $('#job').removeClass('is-invalid');
            }
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });

        event.stopPropogation();

    });
}); */
</script>
