<?php require APPROOT . '/views/inc/header.php'; ?>

TO REDO AND UPDATE CODE
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-4 offset-md-4">
                <div class="card card-departments shadow">
                    <div class="card-header">
                        <h4 class="m-0 font-weight-bold text-primary">Add Departments</h4>

                        <ul class="card-button">
                            <li> <a href="<?php echo URLROOT; ?>/admins/departments" class="btn btn-primary"><i class="fa fa-backward"></i> Back</a></li>
                        </ul>
                    </div> 
                    
                    <div class="card-body">
                        <?php flashMessage('update_failure'); ?>

                        <form  name="addDeptForm" action="<?php echo URLROOT; ?>/admins/add_dept" method="POST">

                            <div class="form-group">
                                <label for="inputdeptID">Department Code<sup>*</sup></label>
                                <input type="text" name="deptID" class="form-control <?php echo (!empty($data['deptID_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptID']; ?>" value="<?php echo $data['deptID']; ?>" placeholder="Department Code"/>
                                <?php echo (!empty($data['deptID_err'])) ? '<span class="invalid-feedback">' . $data['deptID_err'] . '</span>' : '' ; ?>
                            </div> 

                            <div class="form-group">
                                <label for="inputdeptName">Department Name<sup>*</sup></label>
                                <input type="text" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" value="<?php echo $data['deptName']; ?>" placeholder="Department Name" />
                                <?php echo (!empty($data['deptName_err'])) ? '<span class="invalid-feedback">' . $data['deptName_err'] . '</span>' : '' ; ?>
                                
                            </div>
                            

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

                            
                            
                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-success" value="Save" />
                                <a href="<?php echo URLROOT; ?>/admins/departments" class="btn btn-primary">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

  

<?php require APPROOT . '/views/inc/footer.php'; ?>