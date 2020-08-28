<?php 
require APPROOT . '/views/inc/header.php'; 
?>

<div class="row">
   <div class="col-sm-12">
      <div class="page-title-box">
         <div class="row">
            <div class="col">
               <h4 class="page-title">Edit Department</h4>
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0);">Dastyle</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                  <li class="breadcrumb-item active">Calendar</li>
               </ol>
            </div>
            <!--end col-->
            <div class="col-auto align-self-center">
               <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                  <span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class="" id="Select_date">Aug 28</span> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-self-center icon-xs ml-1">
                     <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                     <line x1="16" y1="2" x2="16" y2="6"></line>
                     <line x1="8" y1="2" x2="8" y2="6"></line>
                     <line x1="3" y1="10" x2="21" y2="10"></line>
                  </svg>
               </a>
               <a href="#" class="btn btn-sm btn-outline-primary">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-download align-self-center icon-xs">
                     <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                     <polyline points="7 10 12 15 17 10"></polyline>
                     <line x1="12" y1="15" x2="12" y2="3"></line>
                  </svg>
               </a>
            </div>
            <!--end col-->
         </div>
         <!--end row-->
      </div>
      <!--end page-title-box-->
   </div>
   <!--end col-->
</div>


	<div class="row">
		<div class="col-12 col-md-6 offset-md-3">
			<div class="card form-card shadow">
				<div class="card-header text-center">
                    <h2 class="font-weight-bold">Form</h2>
				</div>
				<div class="card-body">
                    <?php flashMessage('update_failure'); ?>
                    <?php flashMessage('update_sucess'); ?>

                    <?php /* <form action="<?php echo URLROOT; ?>/departments/edit/<?php echo $data['id']; ?>" method="POST"> 
                    
                    <input type="text" id="deptName" name="deptName" class="form-control <?php echo (!empty($data['deptName_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['deptName']; ?>" onBlur="validateDeptName()" />
                    */ ?>

        

                    <form action="<?php echo URLROOT; ?>/departments/edit/<?php echo $data['id']; ?>" method="POST">
                        <div class="form-group">
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
                            <input type="submit" name="btn-update" class="btn btn-primary btn-sm" value="Update">
                            <a href="<?php echo URLROOT; ?>/departments" class="btn btn-secondary btn-sm">Cancel</a>
                            
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>


<script>
function validateDeptName(str) {
    /*console.log(str);
    var deptName = $('#deptName').val(); */

   /* if(str.length == 0){
		document.getElementById('deptName-feedback').innerHTML = '';
	} else {
		// AJAX REQUEST
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				document.getElementById('deptName-feedback').innerHTML = this.responseText;
			}
		}
		xmlhttp.open("GET", "<?php echo URLROOT; ?>/app/helpers/validation_helper.php?q="+str, true);
		xmlhttp.send();
    }
    
   */
   
    $.ajax({
        type: 'POST',
        data: {
            deptName: str
        }, 
        url: '<?php echo URLROOT; ?>/app/helpers/validation_helper.php',
        
        success: function(data) {
           // $("#deptName-feedback").html(data);
           //$('#deptName-feedback').html('Department Name already exists');
           document.getElementById('deptName-feedback').innerHTML = this.responseText;
        },
        error:function() {
            // just in case posting your form failed
            alert( "Validation Failed." );

        }
      

    }); 
}
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>

