<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card card-departments shadow">
				<div class="card-header text-center">
					<h2 class="font-weight-bold text-primary"><?php echo $data['title']; ?></h2>
					
				</div>
				<div class="card-body">
                    <div class="col-12 col-md-4 offset-md-4">
                        <?php flashMessage('add_sucess'); ?>
                        

                        <form action="<?php echo URLROOT; ?>/admins/edit_dept/<?php //echo $data['id']; ?>" method="POST">

                            <div class="form-group">
                                <label for="inputUsername">Department ID<sup>*</sup></label>
                                <input type="text" name="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['username']; ?>" value="<?php echo $data['username']; ?>" />
                                <?php echo (!empty($data['username_err'])) ? '<span class="invalid-feedback">' . $data['username_err'] . '</span>' : '' ; ?>
                                
                            </div>

                            <div class="form-group">
                                <label for="inputUsername">Department ID<sup>*</sup></label>
                                <input type="text" name="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['username']; ?>" value="<?php echo $data['username']; ?>" />
                                <?php echo (!empty($data['username_err'])) ? '<span class="invalid-feedback">' . $data['username_err'] . '</span>' : '' ; ?>
                                
                            </div>

                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary" value="Update" />
                                <a href="" class="btn btn-secondary">Cancel</a>
                            </div>


                        </div>
                    </form>


				</div>
			</div>
		</div>
	</div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>



