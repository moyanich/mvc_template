<?php

class Departments extends Controller {

    public function __construct() {
        if ( !isUserSuperAdmin() )  {
            redirect('users/login');
        } 
        $this->deptModel = $this->model('Department');
    }

    /*


    */
    public function index() {
        $departments = $this->deptModel->getDepartments();
        $data = [
            'title' => 'Departments',
            'singlular' => 'Department',
            'description' => 'Displays a list of the departments in the company',
            'departments' => $departments
        ];
        $this->view('departments/index', $data);
    }

    /**
     * Register User
     * Note that names of private properties or methods must be
     * preceeded by an underscore.
     * @var bool $_good
     */
    

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

    /**
     * Add Department
     */
    public function add() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $deptHistory = $this->deptModel->getLastID();

            $data = [
                'title' => 'Add Department',
                'description' => 'Displays a list of the departments in the company',
                'departments' => $deptHistory,
                'deptName' => trim($_POST['deptName']),
                'deptCode' => trim($_POST['deptCode']),
                'created_date' => date("Y-m-d H:i:s"),
                'created_by' => $_SESSION['userID'],
                'deptName_err' => '',
                'deptCode_err' => ''
            ];

            //  Validate Department Name
            if(empty($data['deptName'])) {
                $data['deptName_err'] = 'Please enter a Department Name';
            } else {
                // Check if email exists
                if($this->deptModel->findDepartmentByName($data['deptName'])){
                    $data['deptName_err'] = 'Department already exists!';
                } 
            }

            if(empty($data['deptCode'])) {
                $data['deptCode_err'] = 'Please enter a new Department Code';
            } else {
                // Check if dept name exists
                if($this->deptModel->findDepartmentByCode($data['deptCode'])){
                    $data['deptCode_err'] = 'Department Code already exists!';
                } 
            } 
            // Make sure errors are empty
            if( empty($data['deptName_err']) && empty($data['deptCode_err']) ) {
                // Validated, then Add Department
                if($this->deptModel->addDept($data)) {
                    flashMessage('add_sucess', 'Department added successfully!', 'alert alert-success');
                    redirect('departments/add');
                } else {
                    flashMessage('add_error', 'Something went wrong!', 'alert alert-warning');
                } 
            }
            else {
                flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                // Load view with errors
                $this->view('departments/add', $data);
            }

        } else {

            $deptHistory = $this->deptModel->getLastID();
            $data = [
                'title' => 'Add Department',
                'description' => 'Displays a list of the departments in the company',
                'departments' => $deptHistory,
                'deptName' =>' ',
                'deptCode' => ' ',
                'deptName_err' => '',
                'deptCode_err' => ''
            ];
            $this->view('departments/add', $data);

        }
    }

    /**
     * Delete Department
    */
    public function delete($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Get existing post from model
            $deptID = $this->deptModel->getDeptById($id);
          
            // Check for owner
            if($deptID->created_by != $_SESSION['userID']){
                redirect('departments');
            }
  
            if($this->deptModel->deleteDept($id)) {
                flashMessage('delete_success', 'Department Deleted!', 'alert alert-success mt-3');
                redirect('departments');
            } else {
                flashMessage('delete_failure', 'An error occured', 'alert alert-warning mt-3');
            }
        } else {
            redirect('departments');
        }
    }




    public function edit($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            /****************  Process Form *****************/

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

        } 
        else {

            // Get existing Department Information from model
            $editDept = $this->deptModel->getDeptById($id);

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
    
    
            
    
    