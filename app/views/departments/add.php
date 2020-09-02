<?php require APPROOT . '/views/inc/header.php'; ?>

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title"><?php echo $data['title']; ?></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dastyle</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">FAQs</li>
                    </ol>
                </div>
                <!--end col-->
                <div class="col-auto align-self-center">
                   <?php  displayDate(); ?>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
<!--end row--><!-- end page title end breadcrumb -->

<?php 
    /* Flash Messages */
    flashMessage('update_failure');
    flashMessage('add_error');
    flashMessage('add_sucess'); 
?>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Department</h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
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

                    <div class="form-group">
                        <div class="col-lg-12 p-t-20 text-center">
                            <a href="<?php echo URLROOT; ?>/departments" class="btn btn-danger btn-shadow text-uppercase mr-4">Cancel</a>
                            <input type="submit" class="btn btn-primary btn-shadow text-uppercase" value="Submit" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end col-->

    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="<?php echo URLROOT; ?>/departments" class="btn btn-primary btn-sm">View All</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Department ID</th>
                                <th scope="col">Department Code</th>
                                <th scope="col">Department Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($data['departments'] as $dept) {
                                echo '<tr>';
                                    echo '<td>' . $dept->id . '</td>';
                                    echo '<td>' . $dept->deptCode . '</td>';
                                    echo '<td>' . $dept->deptName . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->


           

<?php require APPROOT . '/views/inc/footer.php'; ?>


<?php /*


<ul class="card-button">
                    <li> <a href="<?php echo URLROOT; ?>/departments" class="btn btn-primary"><i class="fa fa-backward"></i> Back</a></li>
                </ul>


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