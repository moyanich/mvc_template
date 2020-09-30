<?php

class Jobs extends Controller {

    public function __construct() {
        if ( !isUserSuperAdmin() )  {
            redirect('users/login');
        } 
        $this->jobModel = $this->model('Job');
        $this->deptModel = $this->model('Department');
    }

    /*
    * Displays Index
    */
    public function index() {
        $departments = $this->deptModel->getDepartments();
        $jobs = $this->jobModel->allJobs();

        $data = [
            'title'         => 'Job Listing',
            'singlular'     => 'Positions',
            'description'   => 'Displays a list of the positions in the company',
            'positions'     => $jobs,
            'deptList'      => $departments,
        ];
        $this->view('jobs/index', $data);
    }


    /**
     * Add Job
    */
    public function add() {
        $jobs = $this->jobModel->allJobs();
        $departments = $this->deptModel->getDepartments();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /** Process Form **/
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title'         => 'Enter Job',
                'singlular'     => 'Positions',
                'description'   => 'Displays a list of the positions in the company',
                'job'           => trim($_POST['job']),
                'relDeptID'     => trim($_POST['relDeptID']),
                'created_date'  => date("Y-m-d H:i:s"),
                'positions'     => $jobs,
                'deptList'      => $departments,
                'job_err'       => '',
                'deptName_err'  => ''
            ];

            //  Validate Job Name
            if(empty($data['job'])) {
                $data['job_err'] = 'Please enter a Designation';
            } 
            else if($this->jobModel->ValidateJob($data['job'], $data['relDeptID']) )  {
                $data['job_err'] = 'Designation already exists in this Department';
            }

            if( empty($data['job_err']) ) {
                // Validated, then Add Designation
                if($this->jobModel->insertJob($data)) {
                    redirect('jobs/index');
                    flashMessage('add_success', 'Designation added successfully!', 'alert alert-success');
                   // $this->view('jobs/add', $data);
                } else {
                    flashMessage('add_error', 'Something went wrong!', 'alert alert-warning');
                } 
            }
            else {
                flashMessage('add_error', 'Save Error! Please review form.', 'alert alert-warning');
                // Load view with errors
                $this->view('jobs/add', $data);
            }  

        } else {

            $data = [
                'title'         => 'Enter Job',
                'singlular'     => 'Positions',
                'description'   => 'Displays a list of the positions in the company',
                'job'           => '',
                'deptName'      => '',
                'positions'     => $jobs,
                'deptList'      => $departments,
                'job_err'       => '',
                'deptName_err'  => '',
            ];

            $this->view('jobs/add', $data);

        }
    }

    /**
     * Delete Designation
    */
    public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            if($this->jobModel->deleteJob($id)) {
                flashMessage('delete_success', 'Designation Deleted!', 'alert alert-success mt-3');
                redirect('jobs');
            } else {
                flashMessage('delete_failure', 'An error occured', 'alert alert-warning mt-3');
            }
        } else {
            redirect('jobs');
        } 
    } 

    /* public function delete($id) {
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
    } */





    /* public function add() {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $deptHistory = $this->deptModel->getLastID();

            $data = [
                //'title' => 'Add Department',
                //'description' => 'Displays a list of the departments in the company',
                //'departments' => $deptHistory,
                'job'           => trim($_POST['job']),
                //'deptName' => trim($_POST['deptName']),
                //'deptCode' => trim($_POST['deptCode']),
                'created_date' => date("Y-m-d H:i:s"),
                'job_err' => '',
                //'deptCode_err' => ''
            ];

            //  Validate Department Name
            if(empty($data['job'])) {
                $data['job_err'] = 'Please enter a Designation';
            } 

            $this->view('jobs/index', $data);
            
            
            /*else {
                // Check if email exists
                if($this->deptModel->findDepartmentByName($data['deptName'])){
                    $data['deptName_err'] = 'Department already exists!';
                } 
            }

            if(empty($data['deptCode'])) {
                $data['deptCode_err'] = 'Please enter a new Department Code';
            } else if(strlen($data['deptCode']) > 6) {
                $data['deptCode_err'] = 'Department Code should be 6 characters or less';
            }
             else {
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

           // $deptHistory = $this->deptModel->getLastID();
            $data = [
               // 'title' => 'Add Department',
               // 'description' => 'Displays a list of the departments in the company',
               // 'departments' => $deptHistory,
                'job' =>' ',
                //'deptCode' => ' ',
               // 'deptName_err' => '',
                'job_err' => ''
            ];
            $this->view('jobs/index', $data);

        }
    }

    /**
     * Delete Department
    */
    /*  public function delete($id) {
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
    } */

    /**
     * Edit Department
     */
   /* public function edit($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            /****************  Process Form *****************/

            // Sanitize POST array  
            /* 
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $deptHistory = $this->deptModel->getLastID();
    
            // GET data from Form
            $data = [
                'title'         => 'Edit Department',
                'description'   => 'Edit a department record',
                'departments'   => $deptHistory,
                'id'            => $id,
                'deptCode'      => trim($_POST['deptCode']),
                'deptName'      => trim($_POST['deptName']),
                'modified_on'   => date("Y-m-d H:i:s"),
                'deptCode_err'  => '',
                'deptName_err'  => ''
            ]; 

            // Validate deptCode
            if(empty($data['deptCode'])) {
                $data['deptCode_err'] = 'Field cannot be empty!';
                $this->view('departments/edit', $data);
            }
            else if($this->deptModel->checkForDuplicateCode($data['deptCode'], $data['id']) ){
                $data['deptCode_err'] = 'Department already exists!';
                $this->view('departments/edit', $data);
            } 

            // Validate deptName
            if(empty($data['deptName'])) {
                $data['deptCode_err'] = 'Department Code already exists';
                $this->view('departments/edit', $data);
            }
            else if($this->deptModel->checkForDuplicateName($data['deptName'], $data['id']) ){
                $data['deptName_err'] = 'Department name already exists!';
                $this->view('departments/edit', $data);
            } 
            

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
            $editDept = $this->deptModel->findDepartmentById($id);
            $deptHistory = $this->deptModel->getLastID();

            $data = [
                'title' => 'Edit Department',
                'description' => 'Make changes to a department record',
                'departments' => $deptHistory,
                'id' => $id,
                'deptCode' => $editDept->deptCode,
                'deptName' => $editDept->deptName,
                'deptCode_err' => '',
                'deptName_err' => ''
            ];
    
            $this->view('departments/edit', $data);
        }
    } */

}


