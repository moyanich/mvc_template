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










/**
     * Register User
     * Note that names of private properties or methods must be
     * preceeded by an underscore.
     * @var bool $_good
     */

     /*
    public function validateDeptName($deptName) {
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'deptName' => trim($_POST['deptName']),
            'deptName_err' => ''
        ];
        if ($this->deptModel->findDepartmentByName($data['deptName'])  ) {
            //$data['deptName_err'] =  'Department Name already exists'; 
            echo '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">';
                echo $data['deptName_err'] =  'Department Name already exists';
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        }
    }



/*

select *
from swiftdb.tblDepartments
where deptName not in ("Accounting Dept")
/**
     * Edit Department
     *//*
    public function edit($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            /****************  Process Form *****************/

            /*

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // GET data from Form
            $data = [
                'id' => $id,
                'deptCode' => trim($_POST['deptCode']),
                'deptName' => trim($_POST['deptName']),
                'modified_on' => date("Y-m-d H:i:s"),
                'deptCode_err' => '',
                'deptName_err' => ''
            ]; 

            // Validate deptCode
            if(empty($data['deptCode'])) {
                $data['deptCode_err'] = 'Field cannot be empty!';
                $this->view('departments/edit', $data);
            }
            // Validate deptName
            if(empty($data['deptName'])) {
                $data['deptName_err'] = 'Field cannot be empty!';
                $this->view('departments/edit', $data);
            }



           /*     switch($data['deptName']) {
                case $this->deptModel->checkforChangesInName($data['deptName'], $data['id']) :
                    $data['deptCode_err'] = 'NO CHANGE';
                    $this->view('departments/edit', $data);
                break;

                case $this->deptModel->findDepartmentByName($data['deptName'])  :
                    $data['deptName_err'] = 'Department Name already exists';
                    $this->view('departments/edit', $data);
                break;

            }

        /*    
        
        
        if( $this->deptModel->checkforChangesInName($data['deptName'], $data['id']) ) {
                // Make sure errors are empty
                if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {
                    // Update Department
                    if($this->deptModel->updateDept($data)) {
                        flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                        $this->view('departments/edit', $data);  
                    } else {
                        flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                        $this->view('departments/edit', $data); 
                    }
                }
            } else if( $this->deptModel->findDepartmentByName($data['deptName']) ) {
                $data['deptName_err'] = 'Department Name already exists';
                $this->view('departments/edit', $data);
            }

            // Check for changes in Department Code
            if( $this->deptModel->checkforChangesInCode($data['deptCode'], $data['id'])  ) {
               // Make sure errors are empty
               if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {
                   // Update Department
                   if($this->deptModel->updateDept($data)) {
                       flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                       $this->view('departments/edit', $data);  
                   } else {
                       flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                       $this->view('departments/edit', $data); 
                   }
               }
            } // Check if Department Code Exists
            else if( $this->deptModel->findDepartmentByCode($data['deptCode'])  ) {
                $data['deptCode_err'] = 'Department Code already exists';
                $this->view('departments/edit', $data);
            }
         
            

            // Check for changes in Department Code
             if( $this->deptModel->checkforChangesInCode($data['deptCode'], $data['id']) ||
             $this->deptModel->checkforChangesInName($data['deptName'], $data['id']) ) {
                // Make sure errors are empty
                if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {
                    // Update Department
                    if($this->deptModel->updateDept($data)) {
                        flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                        $this->view('departments/edit', $data);  
                    } else {
                        flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                        $this->view('departments/edit', $data); 
                    }
                }
            } // Check if Department Code Exists
            else {
                if( $this->deptModel->findDepartmentByCode($data['deptCode'])  ) {
                    $data['deptCode_err'] = 'Department Code already exists';
                }
                if( $this->deptModel->findDepartmentByName($data['deptName']) ) {
                    $data['deptName_err'] = 'Department Name already exists';
                }
                $this->view('departments/edit', $data);
            } 
            
            if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {
                // Update Department
                if($this->deptModel->updateDept($data)) {
                    flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                    $this->view('departments/edit', $data);  
                } else {
                    flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                }
            }



            ------


            // Check for changes in Department Code
            if( $this->deptModel->checkforChangesInCode($data['deptCode'], $data['id']) ) {
                // Make sure errors are empty
                if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {
                    // Update Department
                    if($this->deptModel->updateDept($data)) {
                        flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                        $this->view('departments/edit', $data);  
                    } else {
                        flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                        $this->view('departments/edit', $data); 
                    }
                }
            } // Check if Department Code Exists
            else if( $this->deptModel->findDepartmentByCode($data['deptCode']) ) {
                $data['deptCode_err'] = 'Department Code already exists';
                $this->view('departments/edit', $data);
            } 
            else {
                if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {
                    // Update Department
                    if($this->deptModel->updateDept($data)) {
                        flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                        $this->view('departments/edit', $data);  
                    } else {
                        flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                        $this->view('departments/edit', $data); 
                    }
                }
            }

            // Check for changes in Department Name
            if( $this->deptModel->checkforChangesInName($data['deptName'], $data['id']) ) {
                // Make sure errors are empty
                if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {
                    // Update Department
                    if($this->deptModel->updateDept($data)) {
                        flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                        $this->view('departments/edit', $data);  
                    } else {
                        flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                        $this->view('departments/edit', $data); 
                    }
                }
            } // Check if Department Name Exists
            else if( $this->deptModel->findDepartmentByName($data['deptName']) ) {
                $data['deptName_err'] = 'Department Name already exists';
                $this->view('departments/edit', $data);                
            }
       */ 

       /*

        } 
        else {

            // Get existing Department Information from model
            $editDept = $this->deptModel->findDepartmentById($id);

            $data = [
                'id' => $id,
                'deptCode' => $editDept->deptCode,
                'deptName' => $editDept->deptName,
                'deptCode_err' => '',
                'deptName_err' => ''
            ];
    
            $this->view('departments/edit', $data);
        }
    }





 // Check for changes in Department Name
           /* if( $this->deptModel->checkforChangesInName($data['deptName'], $data['id']) ) {
                $data['deptName_err'] = 'Department Name not chnaged';
                $this->view('departments/edit', $data);     
                if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {
                    // Update Department
                    if($this->deptModel->updateDept($data)) {
                        flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                        $this->view('departments/edit', $data);  
                    } else {
                        flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                        $this->view('departments/edit', $data); 
                    }
    
                }
            }
            // Check if Department Name Exists
            else if($this->deptModel->findDepartmentByName($data['deptName']) ) {
                $data['deptName_err'] = 'Department Name already exists';
                $this->view('departments/edit', $data);                
            } */



    /*

    if($this->deptModel->findDepartmentByName($data['deptName'])){
                $data['deptName_err'] = 'Department already exists!';
                $this->view('departments/edit', $data); 
            }  


     */







     /*  else if ( ($data['deptCode'] || $data['deptName']) !== $this->deptModel->checkforChanges($data['deptCode'], $data['deptName'])  ) {
                if($this->deptModel->findDepartmentByCode($data['deptCode']) ) {
                    $data['deptCode_err'] = 'Department Code already exists';
                    $data['deptName_err'] = 'Department Name already exists';
                    $this->view('departments/edit', $data);
                }
            }
                // Make sure errors are empty
            if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {

                // Update Department
                if($this->deptModel->updateDept($data)) {
                    flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                    $this->view('departments/edit', $data);  
                } else {
                    flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                }

            } */
            
           /* partially Works
           
           if( ($data['deptCode'] && $data['deptName']) === $this->deptModel->checkforChanges($data['deptCode'], $data['deptName'])  )  {

                if($this->deptModel->updateDept($data)) {
                    flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                    $this->view('departments/edit', $data);  
                } else {
                    flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                } 
            }
            else if ( ($data['deptCode'] && $data['deptName']) !== $this->deptModel->checkforChanges($data['deptCode'], $data['deptName'])  ) {
                if($this->deptModel->findDepartmentByCode($data['deptCode']) ) {
                    $data['deptCode_err'] = 'Department Code already exists';
                    $data['deptName_err'] = 'Department Name already exists';
                    $this->view('departments/edit', $data);
                }
            }
                // Make sure errors are empty
            if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {

                // Update Department
                if($this->deptModel->updateDept($data)) {
                    flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                    $this->view('departments/edit', $data);  
                } else {
                    flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                }

            } */





    /*


    switch($postedID) {
                        case $this->deptModel->checkforChanges($data['deptCode']) == $postedID :
                            $data['deptCode_err'] = 'same';
                            $this->view('departments/edit', $data);
                        break;
        
                        case $this->deptModel->checkforChanges($data['deptCode']) != $postedID : 
                            $data['deptCode_err'] = 'Department Code already exists';
                            $this->view('departments/edit', $data);  
                        break;
                        
                        default:
                        $data['deptCode_err'] = 'Department';
        
                     }*/
    
     // Make sure errors are empty
              /*  if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {
    
                    flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                            $this->view('departments/edit', $data);  
    
                }
                else {
                    flashMessage('update_failure', 'Error! Please review form!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                } */
    
    
                    // Check for changes in the input compared to the Database
                   /* if($this->deptModel->checkforChanges($data['deptCode'], $data['deptName'])) {
    
                        // Update Department
                        if($this->deptModel->updateDept($data)) {
                            flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                            $this->view('departments/edit', $data);  
                        } else {
                            flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                            $this->view('departments/edit', $data); 
                        }
                    }  */
    
    
                   /* else if($this->deptModel->findDepartmentByCode($data['deptCode'])) {
                        $data['deptCode_err'] = 'Department Code already exists';
                        $this->view('departments/edit', $data);  
                    }
    
                    else if($this->deptModel->findDepartmentByName($data['deptName'])) {
                        $data['deptCode_err'] = 'Department Name already exists';
                        $this->view('departments/edit', $data);  
                        
                    } */
    
    
    
    
                       
                
    
               /* if(empty($data['deptCode'])) {
                    $data['deptCode_err'] = 'Field cannot be empty!';
                    $this->view('departments/edit', $data);
                }
                else {
                    // check if Department Code exists
                    if($this->deptModel->findDepartmentByCode($data['deptCode']) ) {
                       $data['deptCode_err'] = 'Department Code already exists';
                       $this->view('departments/edit', $data);                   
                    } 
                } 
                
                
                // Make sure errors are empty
               if( empty($data['deptCode_err']) ) {
    
                    // Update Department
                    if($this->deptModel->updateDept($data)) {
                        flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                        $this->view('departments/edit', $data);  
                    } else {
                        flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                        $this->view('departments/edit', $data); 
                    }
    
                } 
    
               
    
                if(empty($data['deptName'])) {
                    $data['deptName_err'] = 'Please enter a Department Name';
                    $this->view('departments/edit', $data);
                } 
                else {
                    /// check if Department Name exists
                    if($this->deptModel->findDepartmentByName($data['deptName'])) {
                       $data['deptName_err'] = 'Department Name already exists';
                       $this->view('departments/edit', $data);                   
                    } 
                } */
    
    
            
    
    