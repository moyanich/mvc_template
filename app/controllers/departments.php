<?php

class Departments extends Controller {

    public function __construct() {
        if ( !isUserSuperAdmin() )  {
            redirect('users/login');
        } 
        $this->deptModel = $this->model('Department');
        $this->empModel = $this->model('Employee');
    }

    /*
    * Displays Index
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
     * Add Department
     */
    public function add() {

        $departments = $this->deptModel->recentDepartments();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
            $data = [
                'title'         => 'Add Department',
                'description'   => 'Displays a list of the departments in the company',
                'departments'   => $departments,
                'id'            => trim($_POST['deptCode']),
                'name'          => trim($_POST['deptName']),
                'created_date'  => date("Y-m-d H:i:s"),
                'created_by'    => $_SESSION['userID'],
                'deptName_err'  => '',
                'deptCode_err'  => ''
            ];

            //  Validate Department Name
            if(empty($data['name'])) {
                $data['deptName_err'] = 'Please enter a Department Name';
            } else {
                // Check if email exists
                if($this->deptModel->findDepartmentByName($data['name'])){
                    $data['deptName_err'] = 'Department already exists!';
                } 
            }

            if(empty($data['id'])) {
                $data['deptCode_err'] = 'Please enter a new Department Code';
            } else if(strlen($data['id']) > 6) {
                $data['deptCode_err'] = 'Department Code should be 6 characters or less';
            }
             else {
                // Check if dept name exists
                if($this->deptModel->findDepartmentByID($data['id'])){
                    $data['deptCode_err'] = 'Department ID already exists!';
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

            $data = [
                'title' => 'Add Department',
                'description'     => 'Displays a list of the departments in the company',
                'departments'     => $departments,
                'id'              => '',
                'name'            => '',
                'deptName_err'    => '',
                'deptCode_err'    => ''
            ];

            $this->view('departments/add', $data);
        }
    }

    /**
     * Edit Department
     */
    public function edit($id) {

        $deptHistory = $this->deptModel->recentDepartments();
        $dept = $this->deptModel->findDepartmentByID($id);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            /****************  Process Form *****************/
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // GET data from Form
            $data = [
                'title'         => 'Edit Department',
                'description'   => 'Edit a department record',
                'departments'   => $deptHistory,
                'id'            => $id,
                'name'          => trim($_POST['deptName']),
                'modified_on'   => date("Y-m-d H:i:s"),
                'deptCode_err'  => '',
                'deptName_err'  => ''
            ]; 

            // Validate deptCode
          /*  if(empty($data['id'])) {
                $data['deptCode_err'] = 'Field cannot be empty!';
                $this->view('departments/edit', $data);
            }
            else if($this->deptModel->checkForDuplicateCode($data['deptCode'], $data['id']) ){
                $data['deptCode_err'] = 'Department already exists!';
                $this->view('departments/edit', $data);
            } 

            // Validate deptName
            if(empty($data['name'])) {
                $data['deptCode_err'] = 'Department Code already exists';
                $this->view('departments/edit', $data); 
            }
           // else if($this->deptModel->checkForDuplicateName($data['deptName'], $data['id']) ){
             //   $data['deptName_err'] = 'Department name already exists!';
            //    $this->view('departments/edit', $data);
           // } 
             */

            if( empty($data['deptCode_err']) && empty($data['deptName_err']) ) {
                // Update Department
               if($this->deptModel->editDept($data)) {
                    flashMessage('update_sucess', 'Update Successful!', 'alert alert-success');
                    $this->view('departments/edit', $data);  
                } else {
                    flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                } 
            }
        } 
        else {

            // Get existing Department Information from model
            
            $dept = $this->deptModel->findDepartmentByID($id);

            $data = [
                'title'         => 'Edit Department',
                'description'   => 'Make changes to a department record',
                'departments'   => $deptHistory,
                'id'            => $id,
               // 'name'          => $dept->name,
                'deptCode_err'  => '',
                'deptName_err'  => ''
            ];
    
            $this->view('departments/edit', $data);
        }
    }

    /**
     * Delete Department
    */
    public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
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

}


