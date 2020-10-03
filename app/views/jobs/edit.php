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
    flashMessage('update_success');
?>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"></h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <form action="<?php echo URLROOT; ?>/jobs/edit/<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">
                   <div class="form-group">
                        <label for="job">Position<span class="text-danger pl-1">*</span></label>
                        <input type="text" name="job" class="form-control <?php echo (!empty($data['job_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['job']; ?>"/>
                        <?php echo (!empty($data['job_err'])) ? '<span class="invalid-feedback">' . $data['job_err'] . '</span>' : '' ; ?>                                
                    </div> 

                    <div class="form-group">
						<label class="col-form-label" for="Department">Department<span class="text-danger pl-1">*</span></label>
                        <select name="relDeptID" id="department" class="custom-select">
                            <?php 
                            if(!empty($data['relDeptID'])) {
                                echo '<option value="' . $data['relDeptID'] . '" selected>'.  $data['deptName'] . '</option>';
                            }
                            if(empty($data['relDeptID'])) {
                                echo '<option value="' . $data['relDeptID'] . '" selected></option>';
                            }
                            foreach ($data['deptList'] as $dept) { 
                                if ($dept->id != $data['relDeptID']) {
                                    echo '<option value="' . $dept->id. '">' . $dept->deptName . '</option>';
                                }
                            } ?>
                        </select>
					</div>

					<div class="form-group">
						<p class="col-form-label" for="chooseFile">Upload Job Description</p>
						<div class="user-image mb-3 text-center" style="display: none;">
							<div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
							    <img src="" class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
							</div>
						</div>
	  
						<div class="custom-file">
							<input name="fileUpload" type="file" class="custom-file-input <?php echo (!empty($data['jobDesc_err'])) ? 'is-invalid' : '' ; ?>" id="chooseFile" value="">
							<label class="custom-file-label" for="customFile">Choose file</label>
							<?php echo (!empty($data['jobDesc_err'])) ? '<span class="invalid-feedback">' . $data['jobDesc_err'] . '</span>' : '' ; ?>
						</div>
					</div>

                    <div class="form-group">
                        Job Description File: <?php echo $jobLink = !empty($data['jobDesc_path']) ? '<a class="d-flex flex-row flex-nowrap black-70" href="' . getFilepath("job-descriptions") . '/' . $data['jobDesc_path'] . '" target="_blank">' . getFilepath("job-descriptions") . '/' . $data['jobDesc_path'] . '</a>' : '' ;?>
                      
                    
                    </div>

					<div class="form-group">
						<div class="col-lg-12 pt-2 text-center">
                        <a href="<?php echo URLROOT; ?>/jobs" class="btn btn-danger btn-shadow text-uppercase mr-4">Cancel</a>
							<input type="submit" class="btn btn-primary btn-shadow text-uppercase" value="Update" />
						</div>
					</div>  
                </form>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->






<?php require APPROOT . '/views/inc/footer.php'; ?>

