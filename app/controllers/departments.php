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
      // $departments = $this->deptModel->getDepartments();
        $departments = $this->deptModel->getDepartmentSupervisorandMaanger();
       // $supervisor = $this->deptModel->getSupervisors();
       // $manager = $this->deptModel->getManagers());

        $data = [
            'title'         => 'Departments',
            'singlular'     => 'Department',
            'description'   => 'Displays a list of the departments in the company',
            'departments'   =>  $departments
        ];
        $this->view('departments/index', $data);
    }

    /**
     * Add Department
     */
    public function add() {

        $departments = $this->deptModel->recentDepartments();
        $employees = $this->empModel->getEmployees();

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
                'employees'     => $employees,
                'id'            => trim($_POST['deptCode']),
                'name'          => trim($_POST['deptName']),
                'created_date'  => date("Y-m-d H:i:s"),
                'created_by'    => $_SESSION['userID'],
                'supervisor'    => trim($_POST['supervisor']),
                'manager'       => trim($_POST['manager']),
                'deptName_err'  => '',
                'deptCode_err'  => '',
                'manager_err'  => '',
                'supervisor_err'  => ''
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
            } else {
                // Check if dept name exists
                if($this->deptModel->findDepartmentByID($data['id'])){
                    $data['deptCode_err'] = 'Department ID already exists!';
                } 
            } 

            //validate empID
            if(!empty($data['manager'])) {
                if($this->empModel->findDuplicateEmpID($data['manager']) == false) {
                    $data['manager_err'] = 'Invalid Employee';
                }
            }

            if(!empty($data['supervisor'])) {
                if($this->empModel->findDuplicateEmpID($data['manager']) == false) {
                    $data['supervisor_err'] = 'Invalid Employee';
                }
            }
           
            // Make sure errors are empty
            if( empty($data['deptName_err']) && empty($data['deptCode_err']) && empty($data['supervisor_err']) && empty($data['manager_err']) ) {
                // Validated, then Add Department
                if($this->deptModel->addDept($data) ) {
                    if(!empty($data['supervisor'])) {
                       $this->deptModel->addSupervisor($data);
                    } 
                    if(!empty($data['manager']) ) {
                        $this->deptModel->addManager($data);
                    }
                    flashMessage('add_success', 'Department added successfully!', 'alert alert-success');
                    redirect('departments/add');
                } else {
                    flashMessage('add_error', 'Something went wrong!', 'alert alert-warning');
                    $this->view('departments/add', $data);
                }
            } else {
                flashMessage('add_error', 'Something went wrong!', 'alert alert-warning');
                $this->view('departments/add', $data);
            }

        } else {

            $data = [
                'title' => 'Add Department',
                'description'     => 'Displays a list of the departments in the company',
                'departments'     => $departments,
                'employees'       => $employees,
                'id'              => '',
                'name'            => '',
                'deptName_err'    => '',
                'deptCode_err'    => '',
                'manager_err'     => '',
                'supervisor_err'  => ''
            ];

            $this->view('departments/add', $data);
        }
    }

    /**
     * Edit Department
     */
    public function edit($id) {

        $deptHistory = $this->deptModel->recentDepartments();
        $employees = $this->empModel->getEmployees();
        $dept = $this->deptModel->showDepartmentbyID($id);
        $supervisor = $this->deptModel->showSupervisor($id);
        $manager = $this->deptModel->showManager($id);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            /****************  Process Form *****************/
            // Sanitize POST array

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // GET data from Form
            $data = [
                'title'         => 'Edit Department',
                'description'   => 'Edit a department record',
                'departments'   => $deptHistory,
                'employees'     => $employees,
                'id'            => $id,
                'name'          => trim($_POST['deptName']),
                'supID'         => trim($_POST['supervisor']),
                'mgmtID'        => trim($_POST['manager']),
                'supervisor'    => $supervisor->fullname,
                'manager'       => $manager->manager,
                'supEmpID'      => $supervisor->empID,
                'mngrEmpID'     => $manager->empID,
                'modified_on'   => date("Y-m-d H:i:s"),
                'deptName_err'  => '',
                'manager_err'   => '',
                'supervisor_err'=> ''
            ]; 

            // Validate Name
            if(empty($data['name'])) {
                $data['deptName_err'] = 'Please enter a department name';
                $this->view('departments/edit', $data); 
            }
            else if($this->deptModel->checkForDuplicateName($data['name'], $data['id']) ){
                $data['deptName_err'] = 'Department name already exists!';
                $this->view('departments/edit', $data);
            } 
             
            if( empty($data['deptName_err']) ) {
                // Update Department
                /* ORINGAL
                if($this->deptModel->updateDept($data)) {
                    flashMessage('update_success', 'Update Successful!', 'alert alert-success');
                    $this->view('departments/edit', $data);  
                } else {
                    flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                } */

                if($this->deptModel->updateDept($data)) {
                    $this->deptModel->updateSupervisor($data);
                    $this->deptModel->updateManager($data);
                    flashMessage('update_success', 'Update Successful!', 'alert alert-success');
                    $this->view('departments/edit', $data);  
                } else {
                    flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                }
            }
        } 
        else {
            // Get existing Department Information from model
            $data = [
                'title'         => 'Edit Department',
                'description'   => 'Make changes to a department record',
                'departments'   => $deptHistory,
                'employees'     => $employees,
                'id'            => $id,
                'name'          => $dept->name,
                'supervisor'    => $supervisor->fullname,
                'manager'       => $manager->manager,
                'supEmpID'      => $supervisor->empID,
                'mngrEmpID'     => $manager->empID,
                'deptName_err'  => '',
                'manager_err'   => '',
                'supervisor_err' => ''
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










              /*  if($this->deptModel->addDept($data)) {
                    if(isset($data['manager'])) {
                        if($this->deptModel->addManager($data)) {
                            flashMessage('add_success', 'Department added successfully!', 'alert alert-success');
                            redirect('departments/add');
                        }
                    }
                    else if (isset($data['supervisor'])) {
                        if($this->deptModel->addSupervisor($data)) {
                            flashMessage('add_success', 'Department added successfully!', 'alert alert-success');
                            redirect('departments/add');
                        }
                    }
                    else {
                        flashMessage('add_success', 'Department added successfully!', 'alert alert-success');
                        redirect('departments/add');
                    }
                } else {
                    flashMessage('add_error', 'Something went wrong!', 'alert alert-warning');
                } */