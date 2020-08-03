<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-6 offset-md-3">
			<div class="card form-card shadow">
				<div class="card-header text-center">
                    <h2 class="font-weight-bold text-white">Edit Department</h2>
				</div>
				<div class="card-body">
                    <?php flashMessage('update_failure'); ?>
                    <?php flashMessage('update_sucess'); ?>

                    <?php /* <form  name="deptEditForm" action="<?php echo URLROOT; ?>/departments/edit/<?php echo $data['id']; ?>" method="POST"> */ ?>
                        
                    <form  name="deptEditForm" action="" method="POST">
                        <div class="form-group">
                            <label for="deptCode">Department Code<sup>*</sup></label>
                            <input type="text" name="deptCode" class="form-control <?php echo (!empty($data['deptCode_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptCode']; ?>"/>
                            
                            <?php echo (!empty($data['deptCode_err'])) ? '<span class="invalid-feedback">' . $data['deptCode_err'] . '</span>' : '' ; ?>                                
                        </div> 

                        <div class="form-group">
                            <label for="inputDeptName">Department Name<sup>*</sup></label>
                            <input type="text" id="deptName" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" onBlur="validateDeptName()" />

                            <span id="deptName-feedback" class="invalid-feedback"></span>

                            <?php echo (!empty($data['deptName_err'])) ? '<span class="invalid-feedback">' . $data['deptName_err'] . '</span>' : '' ; ?>
                        </div>

                        <div class="form-group text-center">
                            <input type="submit" name="btn-update" class="btn btn-primary" value="Update">
                            <a href="<?php echo URLROOT; ?>/departments" class="btn btn-secondary">Cancel</a>
                            
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>

<script>
function validateDeptName() {
    var deptName = $('#deptName').val();
   
    $.ajax({
        type: 'POST',
        data: {
            deptName: deptName
        }, 
        url: '<?php echo URLROOT; ?>/app/controllers/departments.php',
        
        success: function(data) {
           // $("#deptName-feedback").html(data);
           $('#deptName-feedback').html('Department Name already exists');
        },
        error:function() {
            // just in case posting your form failed
            alert( "Validation Failed." );

        }
    }); 
}
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>



