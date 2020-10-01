<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
               <h4 class="page-title"><?php echo $data['title']; ?></h4>
               <p><?php echo $data['description']; ?></p>
				</div>
				<div class="col-auto align-self-center">
					<?php displayDate(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end row--><!-- end page title end breadcrumb -->

<?php 
    /* Flash Messages */
    flashMessage('update_failure');
    flashMessage('update_sucess');
?>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"></h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/jobs/edit/<?php echo $data['id']; ?>" method="POST">
                   <?php /* <div class="form-group">
                        <label for="deptCode">Department Code<sup>*</sup></label>
                        <input type="text" name="deptCode" class="form-control <?php echo (!empty($data['deptCode_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptCode']; ?>"/>
                        <?php echo (!empty($data['deptCode_err'])) ? '<span class="invalid-feedback">' . $data['deptCode_err'] . '</span>' : '' ; ?>                                
                    </div> 

                    <div class="form-group">
                        <label for="inputDeptName">Department Name<sup>*</sup></label>
                        <input type="text" id="deptName" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" onkeyup="validateDeptName(this.value)" />

                        <span id="deptName-feedback" class=""></span>

                        <?php echo (!empty($data['deptName_err'])) ? '<span class="invalid-feedback">' . $data['deptName_err'] . '</span>' : '' ; ?>
                    </div>

                    <div class="form-group text-center">
                        <div class="col-lg-12 p-t-20 text-center">
                            <a href="<?php echo URLROOT; ?>/departments" class="btn btn-danger btn-shadow text-uppercase mr-4">Cancel</a>
                            <input type="submit" name="btn-update" class="btn btn-primary btn-shadow text-uppercase" value="Update" />
                        </div>
                    </div> */ ?>
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

