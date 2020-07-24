<?php require APPROOT . '/views/inc/header.php'; ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="card card-departments shadow">
                    <div class="card-header">
                        <h4 class="m-0 font-weight-bold text-primary"><?php echo $data['title']; ?></h4>

                        <ul class="card-button">
                            <li> <a href="<?php echo URLROOT; ?>/admins/departments" class="btn btn-primary"><i class="fa fa-backward"></i> Back</a></li>
                        </ul>
                    </div> 
                    
                    <div class="card-body">
                        <?php flashMessage('update_failure'); ?>

                        <form  name="addDeptForm" action="<?php echo URLROOT; ?>/admins/add_dept" method="POST">
                            <div class="form-group">
                                <label for="inputdeptName" class="sr-only">Department Name<sup>*</sup></label>
                                <input type="text" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" value="<?php echo $data['deptName']; ?>" placeholder="Department Name"/>
                                <?php echo (!empty($data['deptName_err'])) ? '<span class="invalid-feedback">' . $data['deptName_err'] . '</span>' : '' ; ?>
                                
                            </div>

                            <div class="form-group">
                                <label for="inputdeptCode" class="sr-only">Department Code<sup>*</sup></label>
                                <input type="text" name="deptCode" class="form-control <?php echo (!empty($data['deptCode_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptCode']; ?>" value="<?php echo $data['deptCode']; ?>" placeholder="Department Code"/>
                                <?php echo (!empty($data['deptCode_err'])) ? '<span class="invalid-feedback">' . $data['deptCode_err'] . '</span>' : '' ; ?>
                                
                            </div>
                            
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