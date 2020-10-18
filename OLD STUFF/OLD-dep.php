<?php

public function showSupervisor($id) {
    $this->db->query('SELECT tbldepartment_supervisor.empID, CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname
    FROM tbldepartment_supervisor 
    LEFT JOIN tblemployees ON tbldepartment_supervisor.empID = tblemployees.empID
    WHERE deptID = :deptID ');
    $this->db->bind(':deptID', $id);
    $row = $this->db->singleResult();
    return $row;
}

public function showManager($id) {
    $this->db->query('SELECT tbldepartment_manager.empID, CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS manager
    FROM tbldepartment_manager
    LEFT JOIN tblemployees ON tbldepartment_manager.empID = tblemployees.empID
    WHERE deptID = :deptID');
    $this->db->bind(':deptID', $id);
    $row = $this->db->singleResult();
    return $row;
}


     /* 
    public function getDepartmentSupervisorandMaanger() {
        $this->db->query('SELECT tbldepartment.id, tbldepartment.name, tbldepartment_supervisor.empID as sup, tbldepartment_manager.empID as mgmt, (SELECT 
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname FROM tblemployees WHERE empID = tbldepartment_supervisor.empID ) AS supervisor, (SELECT 
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname2 FROM tblemployees WHERE empID = tbldepartment_manager.empID ) AS manager
        FROM tbldepartment
        LEFT JOIN tbldepartment_supervisor ON tbldepartment_supervisor.deptID = tbldepartment.id
        LEFT JOIN tbldepartment_manager ON tbldepartment_manager.deptID = tbldepartment.id
        ');
        $results = $this->db->resultsGet();
        return $results;  
    } 
    
    */


    public function getDepartmentSupervisorandMaanger() {
        $this->db->query('SELECT tbldepartment.id, tbldepartment.name, tbldepartment_supervisor.empID as sup, tbldepartment_manager.empID as mgmt, (SELECT 
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname FROM tblemployees WHERE empID = tbldepartment_supervisor.empID ) AS supervisor, (SELECT 
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname2 FROM tblemployees WHERE empID = tbldepartment_manager.empID ) AS manager
        FROM tbldepartment
        LEFT JOIN tbldepartment_supervisor ON tbldepartment_supervisor.deptID = tbldepartment.id
        LEFT JOIN tbldepartment_manager ON tbldepartment_manager.deptID = tbldepartment.id
        ');
        $results = $this->db->resultsGet();
        return $results;  
     } 




     
     /*


     SELECT tbldepartment.id, tbldepartment.name, tbldepartment_supervisor.empID as sup, tbldepartment_manager.empID as mgmt, (SELECT 
           first_name FROM tblemployees WHERE empID = tbldepartment_supervisor.empID ) AS diff
        FROM tbldepartment
LEFT JOIN tbldepartment_supervisor ON tbldepartment_supervisor.deptID = tbldepartment.id
LEFT JOIN tbldepartment_manager ON tbldepartment_manager.deptID = tbldepartment.id



 SELECT tbldepartment.id, tbldepartment.name, tbldepartment_manager.empID, tblEmployees.first_name, tblEmployees.last_name
        FROM tbldepartment
        LEFT JOIN tbldepartment_supervisor ON tbldepartment_supervisor.deptID = tbldepartment.id
        LEFT JOIN tbldepartment_manager ON tbldepartment_manager.deptID = tbldepartment.id
        JOIN tblemployees ON tblemployees.empID = tbldepartment_supervisor.empID OR tblemployees.empID = tbldepartment_manager.empID



      tbldepartment.*, tbldepartment_manager.*, tbldepartment_supervisor.*, tblemployees.empID, CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS fullname
        FROM tbldepartment 
            LEFT JOIN `tbldepartment_manager` ON `tbldepartment_manager`.`deptID` = `tbldepartment`.`id` 
            LEFT JOIN `tbldepartment_supervisor` ON `tbldepartment_supervisor`.`deptID` = `tbldepartment`.`id` 
            LEFT JOIN `tblemployees` ON `tbldepartment_manager`.`empID` = `tblemployees`.`empID`;

     SELECT `tbldepartment`.*, `tbldepartment_manager`.*, `tbldepartment_supervisor`.*, `tblemployees`.*
FROM `tbldepartment` 
	LEFT JOIN `tbldepartment_manager` ON `tbldepartment_manager`.`deptID` = `tbldepartment`.`id` 
	LEFT JOIN `tbldepartment_supervisor` ON `tbldepartment_supervisor`.`deptID` = `tbldepartment`.`id` 
	LEFT JOIN `tblemployees` ON `tbldepartment_manager`.`empID` = `tblemployees`.`empID`; */
   

    /* $this->db->query('SELECT  tbldepartment_employee.jobID, tbldepartment_employee.deptID, tblemployees.empID
     FROM tbldepartment_employee 
     LEFT JOIN tbljobtitles ON tbldepartment_employee.jobID = tbljobtitles.id
     LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
     LEFT JOIN tblemployees ON tbldepartment_employee.empID = tblemployees.empID
     WHERE tbldepartment_employee.deptID = :deptID AND tbljobtitles.title = "Supervisor"'); */
     //$this->db->bind(':empID', $empID); */





/*
 try{
 
            //We start our transaction.
            $dsn->beginTransaction();
         
         
            //Query 1: Attempt to insert the payment record into our database.
            $sql = "INSERT INTO payments (user_id, amount) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                    $userId, 
                    $paymentAmount,
                )
            );
            
            //Query 2: Attempt to update the user's profile.
            $sql = "UPDATE users SET credit = credit + ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                    $paymentAmount, 
                    $userId
                )
            );
            
            //We've got this far without an exception, so commit the changes.
            $pdo->commit();
            
        } 
        //Our catch block will handle any exceptions that are thrown.
        catch(Exception $e){
            //An exception has occured, which means that one of our database queries
            //failed.
            //Print out the error message.
            echo $e->getMessage();
            //Rollback the transaction.
            $pdo->rollBack();
        }

        */








    


// OLD CODE

   /**************************************
     *  SELECT QUERIES 
    ****************************************/

    //Get Departments
   /* public function getDepartments() {
        $this->db->query('SELECT *
         FROM tbldepartment');
         $results = $this->db->resultsGet();
         return $results;  
     } 
 
     /* $this->db->query('SELECT tblDepartments.id, tblDepartments.deptCode, tblDepartments.deptName, tblemployees.id, tblemployees.first_name, tblemployees.last_name 
     FROM tblDepartments 
     lEFT JOIN tblemployees ON tblDepartments.relSupID = tblemployees.id */
 
     //tblSupervisor
     //OR tblDepartments.relManagerID = tblemployees.id
 
     /**************************************
      *  SELECT QUERIES WITH CRITIERIA
     ****************************************/
 
    /*  public function getLastID() {
         $this->db->query('SELECT * FROM tblDepartments ORDER BY id DESC LIMIT 3');
         $results = $this->db->resultsGet();
         return $results;
     }
 
     public function findDepartmentByCode($deptCode) {
         $this->db->query('SELECT * FROM tblDepartments WHERE deptCode = :deptCode'); 
         $this->db->bind(':deptCode', $deptCode);
         $row = $this->db->singleResult();
 
         // Check row
         if ($this->db->rowCount() > 0) {
             return true;
         }
         else {
             return false;
         }
     }
 
     public function findDepartmentByName($deptName) {
         $this->db->query('SELECT * FROM tblDepartments WHERE deptName = :deptName'); 
         $this->db->bind(':deptName', $deptName);
         $row = $this->db->singleResult();
 
         // Check row
         if ($this->db->rowCount() > 0) {
             return true;
         }
         else {
             return false;
         }
     }
 
     public function findDepartmentById($id) {
         $this->db->query('SELECT * FROM tblDepartments WHERE id = :id');
         $this->db->bind(':id', $id);
         $row = $this->db->singleResult();
         return $row;
     }
 
        
 
     public function checkForDuplicateCode($deptCode, $id) {
         $this->db->query('SELECT * FROM tblDepartments WHERE deptCode = :deptCode AND id != :id'); 
         $this->db->bind(':deptCode', $deptCode);
         $this->db->bind(':id', $id);
         $row = $this->db->resultsGet();
         // Check row
         if ($this->db->rowCount() > 0) {
             return true;
         }
         else {
             return false;
         }
     }
 
     public function checkForDuplicateName($deptName, $id) {
         $this->db->query('SELECT * FROM tblDepartments WHERE deptName = :deptName AND id != :id'); 
         $this->db->bind(':deptName', $deptName);
         $this->db->bind(':id', $id);
         $row = $this->db->resultsGet();
         // Check row
         if ($this->db->rowCount() > 0) {
             return true;
         }
         else {
             return false;
         }
     } */
 
 
     /**************************************
      *  SELECT QUERIES WITH CALCULATIONS
     ****************************************/
 
     /* public function countDepartments() {
         $this->db->query('SELECT count(*) AS totalDepts FROM tbldepartment');
         $results = $this->db->resultsGet();
         return $results;
     } 
 
 
     /**************************************
      *  INSERT QUERIES
     ****************************************/
 
     // Add Department
     /*public function addDept($data) {
         $this->db->query('INSERT INTO tblDepartments (deptCode, deptName, relSupID, relManagerID, created_by) 
         VALUES (UPPER(:deptCode), :deptName, :relSupID, :relManagerID, :created_by)');
         $this->db->bind(':deptCode', $data['deptCode']);
         $this->db->bind(':deptName', $data['deptName']);
         $this->db->bind(':relSupID', $data['relSupID']);
         $this->db->bind(':relManagerID', $data['relManagerID']);
         $this->db->bind(':created_by', $data['created_by']);
 
         if($this->db->execute()) {
             return true;
         } 
         return false;
     }  */
 
 
     /**************************************
      *  UPDATE QUERIES 
     ****************************************/
 
     // Update Department Table
     /* public function editDept($data) {
         // Get existing post from model
         $this->db->query('UPDATE tblDepartments SET 
             deptCode = :deptCode, 
             deptName = :deptName, 
             relSupID = :relSupID,
             relManagerID = :relManagerID,
             modified_on = :modified_on 
             WHERE id = :id 
         ');
 
         // Bind values
         $this->db->bind(':id', $data['id']);
         $this->db->bind(':deptCode', $data['deptCode']);
         $this->db->bind(':deptName', $data['deptName']);
         $this->db->bind(':relSupID', $data['relSupID']);
         $this->db->bind(':relManagerID', $data['relManagerID']);
         $this->db->bind(':modified_on', $data['modified_on']);
 
         // Execute
         if($this->db->execute()){
             return true;
         } else {
             return false;
         }
     } 
     */
 
     /**************************************
      *  DELETE QUERIES
     ****************************************/
 
    /* public function deleteDept($id) {
         $this->db->query('DELETE FROM tblDepartments WHERE id = :id');
         $this->db->bind(':id', $id);
         // Execute
         if($this->db->execute()){
             return true;
         } else {
             return false;
         }
     } */
 


 public function addSupervisor($data) {
    $this->db->query('CALL update_tbl_DEPARTMENT_SUPERVISOR(:empID, :deptID)');
    $this->db->bind(':empID', $data['supervisor']);
    $this->db->bind(':deptID', $data['id']);
    $this->db->execute();
} 

public function addManager($data) {
    $this->db->query('CALL update_tbl_DEPARTMENT_MANAGER(:empID, :deptID)');
    $this->db->bind(':empID', $data['manager']);
    $this->db->bind(':deptID', $data['id']);
    $this->db->execute();
} 

/* public function updateSupervisor($data) {
    $this->db->query('CALL update_SUPERVISOR(:empID, :deptID)');
    $this->db->bind(':empID', $data['supID']);
    $this->db->bind(':deptID', $data['id']);
    $this->db->execute();
} */



public function updateManager($data) {
    $this->db->query('CALL update_MANAGER(:empID, :deptID)');
    $this->db->bind(':empID', $data['mgmtID']);
    $this->db->bind(':deptID', $data['id']);
    $this->db->execute();
} 

/* public function traxs($data) {

        try{
 
            //We start our transaction.
            $this->db->beginTransaction();
         
         
            //Query 1: Attempt to insert the payment record into our database.
            $sql = "INSERT INTO payments (user_id, amount) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                    $userId, 
                    $paymentAmount,
                )
            );
            
            //Query 2: Attempt to update the user's profile.
            $sup = $this->db->query('UPDATE tbldepartment_supervisor SET empID = :empID WHERE deptID = :id ');

            $sql = "UPDATE users SET credit = credit + ? WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                    $paymentAmount, 
                    $userId
                )
            );
            
            //We've got this far without an exception, so commit the changes.
            $pdo->commit();
            
        } 
        //Our catch block will handle any exceptions that are thrown.
        catch(Exception $e){
            //An exception has occured, which means that one of our database queries
            //failed.
            //Print out the error message.
            echo $e->getMessage();
            //Rollback the transaction.
            $pdo->rollBack();
        }


        


        $sql  = 'INSERT INTO members SET
        first_name = :firstName,
        last_name = :lastName,
        user_name = :userName' ;

        $s = $pdo->prepare($sql);
        $s->bindValue(':firstName', $firstName);
        $s->bindValue(':lastName', $lastName);
        $s->bindValue(':userName', $userName);
        $s->execute();


        

        // Bind values
        $this->db->bind(':empID', $data['supID']);
        $this->db->bind(':deptID', $data['id']);
        $s$this->db->execute();
        $pdo->commit();
    } */
   



/**
     * Add Department
     */
    public function add() {

        $departments = $this->deptModel->recentDepartments();
       // $employees = $this->empModel->getEmployees();

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
              //  'employees'     => $employees,
                'id'            => trim($_POST['deptCode']),
                'name'          => trim($_POST['deptName']),
                'created_date'  => date("Y-m-d H:i:s"),
                'created_by'    => $_SESSION['userID'],
               /* 'supervisor'    => trim($_POST['supervisor']),
                'manager'       => trim($_POST['manager']), */
                'deptName_err'  => '',
                'deptCode_err'  => '',
               // 'manager_err'  => ''
               // 'supervisor_err'  => ''
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
           /* if(!empty($data['manager'])) {
                if($this->empModel->findDuplicateEmpID($data['manager']) == false) {
                    $data['manager_err'] = 'Invalid Employee';
                }
            }

            if(!empty($data['supervisor'])) {
                if($this->empModel->findDuplicateEmpID($data['manager']) == false) {
                    $data['supervisor_err'] = 'Invalid Employee';
                }
            } */
           
            // Make sure errors are empty
            /*if( empty($data['deptName_err']) && empty($data['deptCode_err']) && empty($data['supervisor_err']) && empty($data['manager_err']) ) { */
            if( empty($data['deptName_err']) && empty($data['deptCode_err'])  ) {
                // Validated, then Add Department
                if($this->deptModel->addDept($data) ) {
                   /* if(!empty($data['supervisor'])) {
                       $this->deptModel->addSupervisor($data);
                    } 
                    if(!empty($data['manager']) ) {
                        $this->deptModel->addManager($data);
                    } */
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
              //  'employees'       => $employees,
                'id'              => '',
               // 'name'            => '',
                'deptName_err'    => '',
                'deptCode_err'    => '',
               // 'manager_err'     => '',
               // 'supervisor_err'  => ''
            ];

            $this->view('departments/add', $data);
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




                /**
     * Edit Department
     */
    public function edit($id) {

        $deptHistory = $this->deptModel->recentDepartments();
        $employees = $this->empModel->getEmployees();
      //  $dept = $this->deptModel->showDepartmentbyID($id);
      //  $supervisor = $this->deptModel->showSupervisor($id);
      //  $manager = $this->deptModel->showManager($id);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            /****************  Process Form *****************/
            // Sanitize POST array

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // GET data from Form
            $data = [
                'title'         => 'Edit Department',
                'description'   => 'Edit a department record',
                'departments'   => $deptHistory,
              //  'employees'     => $employees,
                'id'            => $id,
                'name'          => trim($_POST['deptName']),
               // 'supID'         => trim($_POST['supervisor']),
               // 'mgmtID'        => trim($_POST['manager']),
              //  'supervisor'    => $supervisor->fullname,
               // 'manager'       => $manager->manager,
              //  'supEmpID'      => $supervisor->empID,
              //  'mngrEmpID'     => $manager->empID,
                'modified_on'   => date("Y-m-d H:i:s"),
                'deptName_err'  => '',
              //  'manager_err'   => '',
               // 'supervisor_err'=> ''
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
               
                if($this->deptModel->updateDept($data)) {
                    flashMessage('update_success', 'Update Successful!', 'alert alert-success');
                    $this->view('departments/edit', $data);  
                } else {
                    flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                }

               /* if($this->deptModel->updateDept($data)) {
                    $this->deptModel->updateSupervisor($data);
                    $this->deptModel->updateManager($data);
                    flashMessage('update_success', 'Update Successful!', 'alert alert-success');
                    $this->view('departments/edit', $data);  
                } else {
                    flashMessage('update_failure', 'Update Failed!', 'alert alert-warning');
                    $this->view('departments/edit', $data); 
                } */
            }
        } 
        else {
            // Get existing Department Information from model
            $data = [
                'title'         => 'Edit Department',
                'description'   => 'Make changes to a department record',
                'departments'   => $deptHistory,
               // 'employees'     => $employees,
                'id'            => $id,
               // 'name'          => $dept->name,
               // 'supervisor'    => $supervisor->fullname,
               // 'manager'       => $manager->manager,
               // 'supEmpID'      => $supervisor->empID,
               // 'mngrEmpID'     => $manager->empID,
                'deptName_err'  => '',
               // 'manager_err'   => '',
               // 'supervisor_err' => ''
            ];
    
            $this->view('departments/edit', $data);
        }
    }
