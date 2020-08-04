<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="container-fluid">
   <div class="row">
    <div class="col-md-6 offset-md-3">
            <div class="card form-card shadow">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-primary">Add Departments</h4>

                    <ul class="card-button">
                        <li> <a href="<?php echo URLROOT; ?>/departments" class="btn btn-primary"><i class="fa fa-backward"></i> Back</a></li>
                    </ul>
                    
                </div>
                <div class="card-body">
                    <?php flashMessage('update_failure'); ?>
                    <?php flashMessage('add_sucess'); ?>

                    <form  name="addDeptForm" action="<?php echo URLROOT; ?>/departments/add" method="POST">
                        <div class="form-group">
                            <label for="inputdeptCode">Department Code<sup>*</sup></label>
                            <input type="text" name="deptCode" class="form-control <?php echo (!empty($data['deptCode_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptCode']; ?>" value="<?php echo $data['deptCode']; ?>" placeholder="Department Code"/>
                            <?php echo (!empty($data['deptCode_err'])) ? '<span class="invalid-feedback">' . $data['deptCode_err'] . '</span>' : '' ; ?>
                        </div> 

                        <div class="form-group">
                            <label for="inputdeptName">Department Name<sup>*</sup></label>
                            <input type="text" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" value="<?php echo $data['deptName']; ?>" placeholder="Department Name" />
                            <?php echo (!empty($data['deptName_err'])) ? '<span class="invalid-feedback">' . $data['deptName_err'] . '</span>' : '' ; ?>
                            
                        </div>

                        <div class="form-group text-center">
                            <input type="submit" class="btn btn-success" value="Save" />
                            <a href="<?php echo URLROOT; ?>/departments" class="btn btn-primary">Cancel</a>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
     </div>
</div>


           

<?php require APPROOT . '/views/inc/footer.php'; ?>


<?php /*

<div class="form-group">
    <label for="inputdeptName">Department Supervisor</label>
    <input type="text" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" value="<?php echo $data['deptName']; ?>" placeholder="Department Name" />
    <?php echo (!empty($data['deptName_err'])) ? '<span class="invalid-feedback">' . $data['deptName_err'] . '</span>' : '' ; ?>
    
</div>

<div class="form-group">
    <label for="inputdeptName">Department Manager</label>
    <input type="text" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" value="<?php echo $data['deptName']; ?>" placeholder="Department Name" />
    <?php echo (!empty($data['deptName_err'])) ? '<span class="invalid-feedback">' . $data['deptName_err'] . '</span>' : '' ; ?>
    
</div>

*/ ?>