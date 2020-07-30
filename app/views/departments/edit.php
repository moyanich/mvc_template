<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card card-departments shadow">
				<div class="card-header text-center">
					<h2 class="font-weight-bold text-primary">You are editing</h2>
				</div>
				<div class="card-body">
                    <div class="col-12 col-md-4 offset-md-4">
                        <?php flashMessage('update_failure'); ?>
                        <?php flashMessage('update_sucess'); ?>
                        
                        <form  name="deptEditForm" action="<?php echo URLROOT; ?>/departments/edit/<?php echo $data['id']; ?>" method="POST">
                            <div class="form-group">

                                <label for="inputdeptID">Department ID<sup>*</sup></label>
                                <input type="text" name="deptID" class="form-control <?php echo (!empty($data['deptID_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptID']; ?>" />
                                
                                <?php echo (!empty($data['deptID_err'])) ? '<span class="invalid-feedback">' . $data['deptID_err'] . '</span>' : '' ; ?>
                                
                            </div> 

                            <div class="form-group">
                                <label for="inputDeptName">Department Name<sup>*</sup></label>
                                <input type="text" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" />
                                <?php echo (!empty($data['deptName_err'])) ? '<span class="invalid-feedback">' . $data['deptName_err'] . '</span>' : '' ; ?>
                            </div>

                            <div class="form-group text-center">
                                <input type="submit" name="btn-update" class="btn btn-primary" value="Update">
                                <!--<a href="" class="btn btn-secondary">Cancel</a>-->
                            </div>

                        </form>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>



