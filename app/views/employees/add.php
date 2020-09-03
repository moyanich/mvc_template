<?php require APPROOT . '/views/inc/header.php'; ?>


<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<div class="row">
				<div class="col">
					<h4 class="page-title"><?php echo $data['title']; ?></h4>
				</div>
				<div class="col-auto align-self-center">
					<?php displayDate(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end row--><!-- end page title end breadcrumb -->


<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-header">
		 	<div class="card-header">
				<div class="row">
					<div class="col-12 col-md-8">
						<h4 class="card-title"><?php echo $data['title']; ?></h4>
						<p class="text-muted"><?php echo $data['description']; ?></p>
					</div>
					<div class="col-12 col-md-4 d-flex justify-content-end align-items-center">
						<a href="<?php echo URLROOT ?>/<?php echo $data['title']; ?>/add" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Add <?php echo $data['singlular']; ?></a>
					</div>
				</div>
			</div>
         </div>
         <div class="card-body">
            
			
		 <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="email" type="email" class="validate form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Joining Date" data-dtp="dtp_ccoZY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Designation">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <div class="select-wrapper"><input class="select-dropdown dropdown-trigger" type="text" readonly="true" data-target="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a0"><ul id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a0" class="dropdown-content select-dropdown" tabindex="0"><li class="disabled selected" id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a00" tabindex="0"><span>Gender</span></li><li id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a01" tabindex="0"><span>Male</span></li><li id="select-options-d0806cef-7405-5d0d-a10e-746edecfc2a02" tabindex="0"><span>Female</span></li></ul><svg class="caret" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg><select class="col-12 m-t-20 p-l-0" tabindex="-1">
                                                <option disabled="" selected="">Gender</option>
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Telephone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="datepicker form-control" placeholder="Birth Date" data-dtp="dtp_o05Ha">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="control-label col-md-3">Upload Your Profile Photo</label>
                                    <form action="/" id="frmFileUpload" class="dropzone dz-clickable" method="post" enctype="multipart/form-data">
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">touch_app</i>
                                            </div>
                                            <h3>Drop files here or click to upload.</h3>
                                            <em>(This is just a demo dropzone. Selected files are
                                                <strong>not</strong>
                                                actually uploaded.)</em>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="button" class="btn btn-primary waves-effect m-r-15">Submit</button>
                                <button type="button" class="btn btn-danger waves-effect">Cancel</button>
                            </div>
                        </div>


						
         </div>
      </div>
   </div>
</div>
<!--end row-->


 
<?php require APPROOT . '/views/inc/footer.php'; ?>

