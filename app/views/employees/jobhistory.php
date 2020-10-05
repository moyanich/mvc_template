<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
                    <h6 class="text-uppercase text-muted font-weight-bold"><?php echo $data['description']; ?></h6>
                    <h4 class="page-title"><?php echo $data['title']; ?></h4>
                </div>
                <div class="col-auto align-self-center">
					<?php displayDate(); ?>
				</div>
            </div>
		</div>
    </div>
    <div class="col-sm-12 d-flex justify-content-end mb-4">
        <a href="<?php echo URLROOT; ?>/employees/profile/<?php echo $data['id']; ?>" class="btn btn-info btn-sm btn-shadow text-uppercase"><i class="fas fa-backward"></i> Go back to profile</a>
    </div>
</div>
<!--end row--><!-- end page title end breadcrumb -->

<?php 
    /* Flash Messages */
    flashMessage('update_failure');
    flashMessage('add_error');
    flashMessage('add_success'); 
?>


<div class="row gutters-sm">
    <div class="col-md-6 mb-3">
        <div class="card card-profile">
            <div class="card-header">
                <h4 class="card-title">Add New Job Title</h4>
            </div>
            <div class="card-body">
                <form id="foo" action="<?php echo URLROOT; ?>/employees/jobhistory/<?php echo $data['id'] ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <input type="hidden" name="empID" class="form-control" value="<?php echo $data['id']; ?>" />
                        </div>

                        <div class="form-group col-12">
                            <label class="col-form-label" for="job">Job:<span class="text-danger">*</span></label>
                            <input type="text" name="job" class="form-control <?php echo (!empty($data['job_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['job']; ?>">
                            <?php echo (!empty($data['job_err'])) ? '<span class="invalid-feedback">' . $data['job_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12">
                            <label class="col-form-label" for="date_promoted">Date Promoted:<span class="text-danger">*</span></label>
                            <input type="date" name="date_promoted" class="form-control datepicker <?php echo (!empty($data['date_promoted_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['date_promoted']; ?>">
                            <?php echo (!empty($data['date_promoted_err'])) ? '<span class="invalid-feedback">' . $data['date_promoted_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group col-12">
                            <label class="col-form-label" for="Department">Department<span class="text-danger pl-1">*</span></label>
                            <select name="relDeptID" id="department" class="custom-select form-control <?php echo (!empty($data['relDeptID_err'])) ? 'is-invalid' : '' ; ?>">
                                <?php 
                                foreach ($data['deptList'] as $dept) { 
                                   echo '<option value="' . $dept->id. '">' . $dept->deptName . '</option>';
                                } ?>
                            </select>
                            <?php echo (!empty($data['relDeptID_err'])) ? '<span class="invalid-feedback">' . $data['relDeptID_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class=" btn btn-secondary cancel-btn modal-btn" data-dismiss="modal">Close</button>
                        <input type="submit" name="jobSave" class="btn btn-primary btn-shadow text-uppercase empSave" value="Save" />
                    </div>
                   
                </form>
               
            </div><!-- . card-body -->
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card card-profile">
            <div class="card-header">
                <h4 class="card-title">Employment History</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover" id="deptTable" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Position</th>
                            <th scope="col">Department</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($data['fullJobHistory'] as $jobs) {
                            echo '<tr>';
                                echo '<td>' . $jobs->job . '</td>';
                                echo '<td>' . $jobs->deptName . '</td>';
                                echo '<td class="actions"><a href="' . URLROOT. '/employee/edit/' . $jobs->id . '" class="mr-3" data-toggle="tooltip" data-placement="top" title="Edit ' . $data['title'] . '"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#delModal-' . $jobs->id . '"><i class="far fa-trash-alt"></i></a></td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <div class="emp-edit"><a href="<?php echo URLROOT ?>/employees/jobhistory/<?php echo $data['id'] ?>" type="button" class="edit-icon"><i class="fas fa-plus"></i></a></div>
            </div><!-- . card-body -->
        </div>
    </div>


    <div class="col-md-6 mb-3">
        <div class="card card-profile">
            <div class="card-header">
                <h4 class="card-title">Company Information</h4>
            </div>
            <div class="card-body">
            

                <div class="emp-edit"><a href="<?php echo URLROOT ?>/employees/edit/<?php echo $data['id'] ?>#compForm" type="button" class="edit-icon"><i class="fas fa-pencil-alt"></i></a></div>
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



<?php /*

 <!--<form action="<?php echo URLROOT; ?>/employees/addJob" method="post">--->
                <form action="<?php echo URLROOT; ?>/employees/profile/<?php echo $data['id'] ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <input type="hidden" name="empID" class="form-control" value="<?php echo $data['id']; ?>" />
                        </div>
                        <div class="form-group col-12">
                            <label class="col-form-label" for="job">Job:<span class="text-danger">*</span></label>
                            <input type="text" name="job" id="job" class="form-control" value="<?php echo $data['job']; ?>" onBlur="validateJobModal()">
					        <span class="invalid-feedback"></span> 

                        </div>
                       <div class="form-group">
                            <label class="col-form-label" for="Department">Position<span class="text-danger pl-1">*</span></label>
                            <select name="relDeptID" id="department" class="custom-select">
                                <?php 
                                foreach ($data['positions'] as $jobs) { 
                                   echo '<option value="' . $jobs->id. '">' . $jobs->job . '</option>';
                                } ?>
                            </select>
                        </div> 
                        <div class="form-group col-12">
                            <label class="col-form-label" for="Department">Department<span class="text-danger pl-1">*</span></label>
                            <select name="relDeptID" id="department" class="custom-select">
                                <?php 
                                foreach ($data['deptList'] as $dept) { 
                                   echo '<option value="' . $dept->id. '">' . $dept->deptName . '</option>';
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class=" btn btn-secondary cancel-btn modal-btn" data-dismiss="modal">Close</button>
                        <input type="submit" name="jobSave" class="btn btn-primary btn-shadow text-uppercase empSave" value="Save" />
                    </div>
                   
                </form> 

*/?>