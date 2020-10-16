
<?php 

 /***************************************
     *  SELECT QUERIES WITH CRITIERIA
    ****************************************/

    // Find Employee by ID ORG QUERY
   /* public function getEmployeeByID($empID) {
        $this->db->query('SELECT * FROM tblemployees
        WHERE empID = :empID');
        $this->db->bind(':empID', $empID);
        $row = $this->db->singleResult();
        return $row;
    } */


    /* public function getEmployeeByID($empID) {
        $this->db->query('SELECT tblemployees.first_name, tblemployees.last_name FROM tblemployees
        LEFT JOIN tbldepartment_employee ON tblemployees.empID = tbldepartment_employee.empID
        LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
        LEFT JOIN tbljobtitles ON tbljobtitles.id = tbldepartment_employee.jobID
        WHERE tblemployees.empID = :empID
        ORDER BY tbldepartment_employee.from_date DESC 
        
        ');
        $this->db->bind(':empID', $empID);
        $row = $this->db->singleResult();
        return $row;
    } */




   /* PROCEDURE
   
   public function addSupervisors($data) {
        $this->db->query('CALL GetSupervisors(:empID, :deptID, :from_date, :to_date)');
        $this->db->bind(':empID', $data['empID']);
        $this->db->bind(':deptID', $data['deptID']);
        $this->db->bind(':from_date', $data['from_date']);
        $this->db->bind(':to_date', $data['to_date']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } */




    
      /*  $this->db->query('SELECT  tbldepartment_employee.jobID, tbldepartment_employee.deptID, tblemployees.empID
        FROM tbldepartment_employee 
        LEFT JOIN tbljobtitles ON tbldepartment_employee.jobID = tbljobtitles.id
        LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
        LEFT JOIN tblemployees ON tbldepartment_employee.empID = tblemployees.empID
        WHERE tbldepartment_employee.deptID = :deptID AND tbljobtitles.title = "Supervisor"'); */
        //$this->db->bind(':empID', $empID);
   	
  /*

  SELECT empID, jobID, deptID FROM tbldepartment_employee 
LEFT join tbljobtitles
ON tbldepartment_employee.jobID = tbljobtitles.id
LEFT join tbldepartment
ON tbldepartment_employee.deptID = tbldepartment.id
WHERE tbljobtitles.title = "Supervisor" AND tbldepartment_employee.deptID = "dep6";
*/

  

}



   
/*  BEGIN
  SELECT title, jobID, deptID, empID, tbldepartment_employee.from_date, tbldepartment_employeeto.to_date from tbljobtitles LEFT JOIN 
tbldepartment_employee ON tbljobtitles.id = tbldepartment_employee.jobID
WHERE title = "Supervisor";


INSERT into tbldepartment_supervisor (empID, deptID, jobID, from_date, to_date) VALUES (empID, deptID, jobID, from_date, to_date);

END


SELECT title, jobID, deptID, empID from tbljobtitles LEFT JOIN 
tbldepartment_employee ON tbljobtitles.id = tbldepartment_employee.jobID
WHERE title = "Supervisor" AND empID = 94

BEGIN
SELECT empID, jobID, deptID, from_date, to_date from  tbldepartment_employee
LEFT JOIN tbljobtitles ON tbldepartment_employee.jobID = tbljobtitles.id
WHERE tbljobtitle.title = "Supervisor" AND empID = empID;
END

*/

/*
SELECT title, jobID, deptID, empID from tbljobtitles LEFT JOIN 
tbldepartment_employee ON tbljobtitles.id = tbldepartment_employee.jobID
WHERE title = "Supervisor"


  */



// Add email 
 /* public function addEmail($data) {
      $this->db->query('CALL insertEmail(UPPER(:empID), :empEmail, :created_date)');
      $this->db->bind(':empID', $data['empID']);
      $this->db->bind(':empEmail', $data['empEmail']);
      $this->db->bind(':created_date', $data['created_date']);
      if($this->db->execute()) {
          return true;
      } 
      return false;
  }

  // Add Department     
  public function addDept($data) {
      $this->db->query('CALL EmployeeDept(UPPER(:empID), :relDeptID, :created_date)');
      $this->db->bind(':empID', $data['empID']);
      $this->db->bind(':relDeptID', $data['relDeptID']);
      $this->db->bind(':created_date', $data['created_date']);
      if($this->db->execute()) {
          return true;
      } 
      return false;
  } */

 

  


   /*


    // Update Employee Profile
  public function updateProfile($data) {
      $this->db->query('UPDATE tblemployees 
      SET
          first_name = :first_name,
          middle_name = :middle_name,
          last_name = :last_name,
          empDOB = :empDOB,
          gender = :gender,
          trn = :trn,
          nis = UPPER(:nis),
          phoneOne = :phoneOne,
          mobile = :mobile,
          relDeptID = :relDeptID,
          internalEmail = LOWER(:internalEmail),
          externalEmail = LOWER(:externalEmail),
          address = :address,
          city = :city,
          parish = :parish,
          hire_date = :hire_date,
          
          modified_at = :modified_at
      WHERE empID = :empID AND id = :id');

      $this->db->bind(':id', $data['id']);
      $this->db->bind(':empID', $data['empID']);
      $this->db->bind(':first_name', $data['first_name']);
      $this->db->bind(':middle_name', $data['middle_name']);
      $this->db->bind(':last_name', $data['last_name']);
      $this->db->bind(':empDOB', $data['empDOB']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':trn', $data['trn']);
      $this->db->bind(':nis', $data['nis']);
      $this->db->bind(':phoneOne', $data['phoneOne']);
      $this->db->bind(':mobile', $data['mobile']);
      $this->db->bind(':internalEmail', $data['internalEmail']);
      $this->db->bind(':externalEmail', $data['externalEmail']);
      $this->db->bind(':address', $data['address']);
      $this->db->bind(':city', $data['city']);
      $this->db->bind(':parish', $data['parish']);
      $this->db->bind(':hire_date', $data['hire_date']);
      $this->db->bind(':relDeptID', $data['relDeptID']);
      $this->db->bind(':modified_at', $data['modified_at']); 
         
      if($this->db->execute()) {
          return true;
      } 
      return false;
  }

  */



   // Get Employee most recent Job History
  /* public function updatejobHistory($id) {
     $this->db->query('SELECT * 
      FROM tblempjobhistory
      LEFT JOIN tbldepartments ON tblempjobhistory.relDeptID = tbldepartments.id
      WHERE relEmpID = :id 
      ORDER BY tblempjobhistory.created_date DESC');

      //$this->db->query('SELECT *, tbldepartments.id FROM tblempjobhistory, tbldepartments WHERE relEmpID = :id order by tblempjobhistory.created_date DESC LIMIT 1');
      $this->db->bind(':id', $id);
      $row = $this->db->resultsGet();
      return $row; 
  } */




/*  // Get Employee most recent Job History
  public function getjobHistory($id) {
      $this->db->query('SELECT * 
      FROM tbljobtitles
      LEFT JOIN tbldepartments ON tblempjobhistory.relDeptID = tbldepartments.id
      WHERE relEmpID = :id 
      ORDER BY tblempjobhistory.created_date 
      DESC LIMIT 1');

      //$this->db->query('SELECT *, tbldepartments.id FROM tblempjobhistory, tbldepartments WHERE relEmpID = :id order by tblempjobhistory.created_date DESC LIMIT 1');
      $this->db->bind(':id', $id);
      $row = $this->db->resultsGet();
      return $row;
  }


   // Get Employee most recent Job History
   public function empjobHistory($id) {
      $this->db->query('SELECT * 
      FROM tblempjobhistory
      LEFT JOIN tbldepartments ON tblempjobhistory.relDeptID = tbldepartments.id
      WHERE relEmpID = :id 
      ORDER BY tblempjobhistory.created_date DESC');

      //$this->db->query('SELECT *, tbldepartments.id FROM tblempjobhistory, tbldepartments WHERE relEmpID = :id order by tblempjobhistory.created_date DESC LIMIT 1');
      $this->db->bind(':id', $id);
      $row = $this->db->resultsGet();
      return $row;
  } */




/* public function getEmpCompInfoByID($id) {
      $this->db->query('SELECT tblempjobhistory.id, tblempjobhistory.job, tblempjobhistory.relEmpID, tbldepartments.id, tbldepartments.deptName FROM 
      tbldepartments, tblempjobhistory
      WHERE relEmpID = :id');
      $this->db->bind(':id', $id);

      $results = $this->db->singleResult();
      return $results;
  }

  public function updateEmpCompInfo($data) {
      $this->db->query('UPDATE tblempjobhistory 
              SET
              job = :job,
              relDeptID = :relDeptID
          WHERE relEmpID = :id
      ');

      $this->db->bind(':id', $data['id']);
      $this->db->bind(':job', $data['job']);
      $this->db->bind(':relDeptID', $data['relDeptID']);

      
    //  $this->db->bind(':empID', $data['empID']);
     // $this->db->bind(':modified_at', $data['modified_at']); 
          
      if($this->db->execute()) {
          return true;
      } 
      return false;
  } 
*/









/*

public function getEmpDepartment($empID) {
      $this->db->query('SELECT empID, depID, tbldepartment.name 
      FROM tbldepartment_employee
      LEFT JOIN tbldepartment ON tbldepartment_employee.deptID = tbldepartment.id
      WHERE tbldepartment_employee.empID = :empID 
      ORDER BY from_date DESC 
      LIMIT 1');
      $this->db->bind(':empID', $empID);
      $row = $this->db->singleResult();
      return $row;
  }

  public function getEmpJobTitle($empID) {
      $this->db->query('SELECT empID, tbljobtitles.title, tbldepartment_employee.jobID, tbldepartment_employee.deptID FROM tbldepartment_employee 
      LEFT JOIN tbljobtitles ON tbldepartment_employee.jobID = tbljobtitles.id
      WHERE tbldepartment_employee.empID = :empID 
      ORDER BY tbldepartment_employee.from_date DESC 
      LIMIT 1');
      $this->db->bind(':empID', $empID);
      $row = $this->db->singleResult();
      return $row;
  }


  */


  


 

     /* $this->db->query('SELECT *
      FROM tblEmployees, tblempjobhistory
      WHERE tblempjobhistory.relEmpID = tblEmployees.id');

      //SELECT * FROM tblEmployees, tblempjobhistory WHERE tblempjobhistory.relEmpID = tblEmployees.id 


      SELECT *, tblempjobhistory.job, tblempjobhistory.id

      SELECT *
      FROM tblEmployees 
      LEFT JOIN tblempjobhistory ON tblempjobhistory.relEmpID = tblEmployees.empID


      SELECT employee.first_name, employee.last_name, call.start_time, call.end_time, call_outcome.outcome_text
      FROM employee
      INNER JOIN call ON call.employee_id = employee.id
      INNER JOIN call_outcome ON call.call_outcome_id = call_outcome.id
      ORDER BY call.start_time ASC; */


      /*

      $this->db->query('SELECT *, tbldepartments.deptName AS department FROM tblempjobhistory
      INNER JOIN tbldepartments
      ON tblempjobhistory.relDeptID = tbldepartments.ID
      WHERE relEmpID = :id');
      $this->db->bind(':id', $id);

      $results = $this->db->singleResult();
      return $results;

      */
 
 
  
  

 


       /*  $this->db->query('SELECT *, tbljobtitles.empID, tbldepartment.id, tbldepartments.deptName FROM tblemployees
      LEFT JOIN tbljobtitles ON tblemployees.id = tbljobtitles.empID
      LEFT JOIN tbldepartment ON tblemployees.relDeptID = tbldepartment.id
      WHERE tblemployees.id = :id'); */
 

  


/*  $this->db->query('SELECT *, tbldepartments.deptName AS department FROM tblempjobhistory
      INNER JOIN tbldepartments
      ON tblempjobhistory.relDeptID = tbldepartments.ID
      WHERE relEmpID = :id'); */

 /* 
 
 
 
  public function updateEmpCompProfile($data) {
      $this->db->query('UPDATE tblemployees 
      SET
          hire_date = :hire_date,
          internalEmail = :internalEmail,
          modified_at = :modified_at
      WHERE id = :id AND empID = :empID');

      $this->db->bind(':id', $data['id']);
      $this->db->bind(':empID', $data['empID']);
      $this->db->bind(':hire_date', $data['hire_date']);
      $this->db->bind(':internalEmail', $data['internalEmail']);
      $this->db->bind(':modified_at', $data['modified_at']); 
         
      if($this->db->execute()) {
          return true;
      } 
      return false;

      //UPDATE `tblemployees` SET `hire_date` = '2002-06-07' WHERE `tblemployees`.`id` = 94 AND `tblemployees`.`empID` = 'EUM'
  } 
 
 

 
 
 
 public function setNewRetirement($data) {
      $this->db->query('SELECT years AS DATEADD(:empDOB, INTERVAL years YEAR ) FROM tblretirement WHERE gender = :gender');
      $this->db->bind(':empDOB', $data['empDOB']);
      $this->db->bind(':gender', $data['gender']);
      $row = $this->db->singleResult();
      return $row;
     
  }  */





 /* public function addEmpRetirement($data) {
      $this->db->query('CALL addEmpRetirement(UPPER(:empID))');
      $this->db->bind(':empID', $data['empID']);
      if($this->db->execute()) {
          return true;
      } 
      return false;
  } */




  




/*


  SELECT * FROM tblempdepartment 
  INNER JOIN tbldepartments
  ON tblempdepartment.relDeptID = tbldepartments.ID
  WHERE relEmpID = "ESTEX"



public function getEmployeebyID($id) {
      $this->db->query('SELECT * FROM tblEmployees INNER JOIN tblemails
      ON tblEmployees.empID = tblemails.relEmpID WHERE ID = :id');
      $this->db->bind(':id', $id);
      $row = $this->db->singleResult();
      return $row;
  } 

public function getEmpDOB($id) {
      $this->db->query('SELECT empDOB FROM tblemployees WHERE id = :id');
      $this->db->bind(':id', $id);
      $row = $this->db->singleResult();
      return $row;
  }
  public function getLastID() {
      $this->db->query('SELECT empID FROM tblemployees ORDER BY id LIMIT 1');
      
      $results = $this->db->resultsGet();
      return $results;
  }


  //INSERT INTO tblemployees(id, empID, title, first_name, last_name, middle_name, suffix, trn, nis, gender, photo, created_at, modified_at) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13])s


public function addEmployee($data) {
      $this->db->query('INSERT INTO tblemployees (empID, first_name, middle_name, last_name, gender, created_date) VALUES (:empID, :first_name, :middle_name, :last_name, :gender, :created_date)');
      $this->db->bind(':empID', $data['empID']);
      $this->db->bind(':first_name', $data['first_name']);
      $this->db->bind(':middle_name', $data['middle_name']);
      $this->db->bind(':last_name', $data['last_name']);
      
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':created_date', $data['created_date']);
     
      if($this->db->execute()) {
          return true;
      } 
      return false;
  }  
  
    public function addEmployee($data) {
      $this->db->query('INSERT INTO tblemployees (empID, empTitle, first_name, middle_name, last_name, empDOB, gender, hire_date, created_date) VALUES (UPPER(:empID), :empTitle, :first_name, :middle_name, :last_name, :empDOB, :gender, :hire_date, :created_date)');
      $this->db->bind(':empID', $data['empID']);
      $this->db->bind(':empTitle', $data['empTitle']);
      $this->db->bind(':first_name', $data['first_name']);
      $this->db->bind(':middle_name', $data['middle_name']);
      $this->db->bind(':last_name', $data['last_name']);
      $this->db->bind(':empDOB', $data['empDOB']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':hire_date', $data['hire_date']);

      


      $this->db->bind(':created_date', $data['created_date']);
     
      if($this->db->execute()) {
          return true;
      } 
      return false;
  } 
  
  */

























   /*
   // Add Supervisor to table
  public function updateSupervisors($data) {
      $this->db->query('UPDATE tbldepartment_supervisor SET
      empID = :empID, 
      deptID = :deptID, 
      from_date = :from_date, 
      to_date = :to_date WHERE  empID = :empID AND  deptID = :deptID');
      $this->db->bind(':empID', $data['empID']);
      $this->db->bind(':deptID', $data['deptID']);
      $this->db->bind(':from_date', $data['from_date']);
      $this->db->bind(':to_date', $data['to_date']);
      if($this->db->execute()) {
          return true;
      } 
      return false;
  }

  */

  

/*



BEGIN
 INSERT INTO archives_employees (empID, first_name, middle_name, last_name, empDOB, retirementDate, gender, hire_date, created_date, created_by, action)
    VALUES (OLD.empID, OLD.first_name, OLD.middle_name, OLD.last_name,  OLD.empDOB, OLD.retirementDate, OLD.gender, OLD.hire_date, OLD.created_date,  OLD.created_by, "delete");
    
END



<!-- Modal -->
<div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployee" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?php echo $data['newtitle']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form name="addEmployee" name="empForm" action="<?php echo URLROOT; ?>/employees/add" method="POST">	
					<div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="empNo">Employee Number:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="empID" class="form-control text-uppercase <?php echo (!empty($data['empID_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empID']; ?>" />
                            <?php echo (!empty($data['empID_err'])) ? '<span class="invalid-feedback">' . $data['empID_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="empTitle">Title</label>
                        <div class="col-sm-8">
                            <select class="custom-select" name="empTitle">
                                <option selected>Mr.</option>
                                <option value="1">Mrs.</option>
                                <option value="2">Miss</option>
                                <option value="3">Ms.</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="firstName" class="col-sm-4 col-form-label">First Name:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="first_name" class="form-control <?php echo (!empty($data['first_name_err'])) ? 'is-invalid' : '' ; ?>" id="firstName" value="<?php echo $data['first_name']; ?>">
                            <?php echo (!empty($data['first_name_err'])) ? '<span class="invalid-feedback">' . $data['first_name_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="middleName">Middle Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="middle_name" class="form-control" id="middleName">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="lastName">Last Name:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="last_name" class="form-control <?php echo (!empty($data['last_name_err'])) ? 'is-invalid' : '' ; ?>" id="lastName" value="<?php echo $data['last_name']; ?>">
                            <?php echo (!empty($data['last_name_err'])) ? '<span class="invalid-feedback">' . $data['last_name_err'] . '</span>' : '' ; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="empDOB">DOB:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="date" name="empDOB" class="form-control <?php echo (!empty($data['empDOB_err'])) ? 'is-invalid' : '' ; ?>" value="<?php echo $data['empDOB']; ?>">
                        </div>
                        <?php echo (!empty($data['empDOB_err'])) ? '<span class="invalid-feedback">' . $data['empDOB_err'] . '</span>' : '' ; ?>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="gender">Gender:<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <select name="gender" class="custom-select">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="email">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" name="empEmail" class="form-control <?php echo (!empty($data['empEmail_err_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['empEmail']; ?>">
                            <?php echo (!empty($data['empEmail_err'])) ? '<span class="invalid-feedback">' . $data['empEmail_err'] . '</span>' : '' ; ?>
                        </div>
					</div>

					<div class="form-group">
						<div class="col-lg-12 p-t-20 text-center">
							<a href="<?php echo URLROOT; ?>/emplpoyees" class="btn btn-danger btn-shadow text-uppercase mr-4">Cancel</a>
							<input type="submit" class="btn btn-primary btn-shadow text-uppercase" value="Save" />
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>



$empList = "";

	foreach ( $data['employees'] as $emp ) {

		$empList .= "<tr>";

		$empList .= '<td>' . $emp->idEmployee . '</td>';
		
		$empList  .= '<td>' . $emp->NAME . '</td>';

		$empList .= '<td>' . $emp->emp_no . '</td>';
		
		$empList  .= '<td>' . $emp->phone . '</td>';

		$empList  .= '<td>' . $emp->hire_date . '</td>';

		$empList  .= '<td>' . $emp->job .'</td>';

		$empList  .= '<td>' . $emp->deptName . '</td>';

		$empList  .= '<td class="text-center"><a class="btn btn-outline-secondary btn-sm" href="pageEmployeeProfile.php?employeeID=' . $emp->idEmployee .'"><i class="fa fa-edit"></i></a></td>';

		 /*	if (isset($_GET['employeeID'])) {
		 		include('modal_delEmployee.php'); 
		 	} */
		 	/*
		$empList  .= "</tr>";

		$empList  .= "</tr>";



	}  */


/*


/**
     * Edit Employee Profile
  

    public function edit($id) {
        $empData = $this->empModel->getEmployeeByID($id);
        
       // $depInfo = $this->empModel->getCompanyInfo($id);
        $parish = $this->adminModel->getParishes();
        $genders = $this->empModel->listGenders();

        $retireMale = $this->retirementModel->getMaleRetirement();
        $retireFemale =  $this->retirementModel->getFemaleRetirement();
        
        // Employee Profile
        if(isset($_POST["updateProfile"]) && $_SERVER['REQUEST_METHOD'] == 'POST') {

         

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //$deptHistory = $this->deptModel->getLastID();
           
            // GET data from Form
            $data = [
                'title'             => 'You are editing the profile for ' . $empData->first_name . ' ' . $empData->last_name,
                'id'                => $id,
                'empID'             => $empData->empID,
                'first_name'        => trim($_POST['first_name']),
                'middle_name'       => trim($_POST['middle_name']),
                'last_name'         => trim($_POST['last_name']),
                'gender'            => trim($_POST['gender']),
                'empDOB'            => trim($_POST['empDOB']),
                'retirementDate'    => formatDate($empData->retirementDate),
                'maleYears'         => $retireMale->years,
                'femaleYears'       => $retireFemale->years,
                'trn'               => trim($_POST['trn']),
                'nis'               => trim($_POST['nis']),
                'externalEmail'     => trim($_POST['externalEmail']),
                'phoneOne'          => trim($_POST['phoneOne']),
                'mobile'          => trim($_POST['mobile']),
                'address'           => trim($_POST['address']),
                'city'              => trim($_POST['city']),
                'parish'            => trim($_POST['parish']),
                'departments'       => '',
                'gendersList'       => $genders,
                'parishName'        => $parish,
                'modified_at'       => date("Y-m-d H:i:s"),
                
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'phoneOne_err'      => '',
                'phoneTwo_err'      => '',
                'address_err'       => '',
                'city_err'          => '',
                'trn_err'           => '',
                'nis_err'           => ''
            ]; 

            // Validate First Name
            if(empty($data['first_name'])) :
                $data['first_name_err'] = 'Please enter a First Name';
            endif;

            // Validate Last Name
            if(empty($data['last_name'])) :
                $data['last_name_err'] = 'Please enter a Last Name';
            endif;

            // Validate Date
            if(isRealDate($data['empDOB'] ) ) :
                $data['empDOB_err'] = 'invalid date format';
            endif; 

            // Validate City
            if(strlen($data['city']) > 20) :
                $data['city_err'] = 'Text is too long';
            endif; 

            // Validate trn
            if(empty($data['trn'])) {
                $data['trn_err'] = 'Please enter TRN';
            }
            else if(strlen($data['trn']) > 9) {
                $data['trn_err'] = 'TRN is too long';
            }
            else if($this->empModel->checkForDuplicateTRN($data['trn'], $data['id']) ) :
                $data['trn_err'] = 'TRN already exists';
            endif; 

            // Validate nis
            if(empty($data['nis'])) {
                $data['nis_err'] = 'Please enter NIS';
            }
            else if(strlen($data['nis']) > 9) {
                $data['nis_err'] = 'NIS is too long';
            }
            else if($this->empModel->checkForDuplicateNIS($data['nis'], $data['id']) ) :
                $data['nis_err'] = 'NIS already exists';
            endif; 
          
            if(!empty($data['phoneOne']) ) {
                if(validate_phone_number($data['phoneOne']) == false ) {
                    $data['phoneOne_err'] = 'Invalid Phone Number';
                }
            }
            
            if(!empty($data['mobile']) ) {
                if(validate_phone_number($data['mobile']) == false ) {
                    $data['phoneTwo_err'] = 'Invalid Phone Number';
                }
            }

            // Filter Email
            if(!empty($data['externalEmail']) ) {
                if (validateEmail($data['externalEmail']) == false) :
                    $data['externalEmail_err'] = 'Invalid Email Address';
                endif; 
            }
          
            // Make sure errors are empty
            if(empty($data['first_name_err']) 
                && empty($data['last_name_err']) 
                && empty($data['empDOB_err']) 
                && empty($data['phoneOne_err']) 
                && empty($data['phoneTwo_err']) 
                && empty($data['address_err']) 
                && empty($data['city_err']) 
                && empty($data['trn_err']) 
                && empty($data['nis_err']) 
                && empty($data['gender_err']) ) {
                
                if($data['gender'] == "Male" && $this->retirementModel->calcRetirementMale($data) ) { 
                    $retirementDate = $this->retirementModel->calcRetirementMale($data);
                    if($this->empModel->updateProfile($data) && $this->empModel->updateRetirementbyID($retirementDate->result, $data) ) {

                        flashMessage('update_success', 'Profile Update Successful!', 'alert alert-success bg-primary text-white');
                        redirect('employees/edit/' . $id . ''); 
                    } else {
                        flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                        // Load view with errors
                        $this->view('employees/edit/' . $id . '', $data);
                    }
                } 

                else if ($data['gender'] == "Female" && $this->retirementModel->calcRetirementFemale($data) ) { 
                    $retirementDate = $this->retirementModel->calcRetirementFemale($data);
                    if($this->empModel->updateProfile($data) && $this->empModel->updateRetirementbyID($retirementDate->femaleResult, $data) ) {

                        flashMessage('update_success', 'Update Successful!', 'alert alert-success bg-primary text-white');
                        redirect('employees/edit/' . $id . ''); 
                    } else {
                        flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                        // Load view with errors
                        $this->view('employees/edit/' . $id . '', $data);
                    }
                } 
                
                else {
                    flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                    // Load view with errors
                    $this->view('employees/edit/' . $id . '', $data);
                }
            } else {
                // Load view with errors
                $this->view('employees/edit', $data);
            }
        } 
        // Company Profile
        else if(isset($_POST["compProfile"]) && $_SERVER['REQUEST_METHOD'] == 'POST') {

           

            $data = [
                'id'                => $id,
                'empID'             => $empData->empID,
                'hire_date'         => trim($_POST['hire_date']),
                'internalEmail'     => trim($_POST['internalEmail']),
                'modified_at'       => date("Y-m-d H:i:s")
            ]; 

             // Validate Date
             if(isRealDate($data['hire_date'] ) ) :
                $data['hire_date_err'] = 'invalid date format';
            endif;

            $this->empModel->updateEmpCompProfile($data);


            flashMessage('companyUpdate_success', 'Company information updated!', 'alert alert-success bg-primary text-white');
            redirect('employees/edit/' . $id . ''); 


           
        }
        else {
            $retireMale = $this->retirementModel->getMaleRetirement();
            $retireFemale =  $this->retirementModel->getFemaleRetirement();

            $data = [
                'title'             => 'You are editing the profile for ' . $empData->first_name . ' ' . $empData->last_name,
                'employee'          => $empData->first_name . $empData->last_name,
                'id'                => $id,
                'empID'             => $empData->empID,
                'first_name'        => $empData->first_name,
                'middle_name'       => $empData->middle_name,
                'last_name'         => $empData->last_name,
                'gender'            => $empData->gender,
                'gendersList'       => $genders,
                'empDOB'            => $empData->empDOB,
                'retirementDate'    => formatDate($empData->retirementDate),
                'trn'               => $empData->trn,
                'nis'               => $empData->nis,
                'hire_date'         => $empData->hire_date,
                'phoneOne'          => $empData->phoneOne,
                'mobile'          => $empData->mobile,
                'externalEmail'     => $empData->externalEmail,
                'internalEmail'     => $empData->internalEmail,
                'address'           => $empData->address,
                'city'              => $empData->city,
                'parish'            => $empData->parish,
                'parishName'        => $parish,
                'modified_at'       => '',

                
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'phoneOne_err'      => '',
                'phoneTwo_err'      => '',
                'address_err'       => '',
                'city_err'          => '',
                'trn_err'           => '',
                'nis_err'           => '',
                'hire_date_err'     => '',
                'internalEmail_err' => ''
            ];

            $this->view('employees/edit', $data);
        }   
    } 




    */





 /**
     * Edit Employee Company Profile
    */
   /* public function editCompany() {

       // $compInfo = $this->empModel->getCompanyInfo($id);
    

        // UpdateCompanyProfile
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

        

            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //$deptHistory = $this->deptModel->getLastID();
           
            // GET data from Form
            $data = [
                'id'                => trim($_POST['id']),
                'empID'             => trim($_POST['empID']),
                'hire_date'         => trim($_POST['hire_date']),
                'modified_at'       => date("Y-m-d H:i:s")
            ]; 

            $this->empModel->updateCompanyProfile($data);
            $this->view('employees/edit/' . $id . '', $data);

        }

    } */





 /* 'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'phoneOne_err'      => '',
                'phoneTwo_err'      => '',
                'address_err'       => '',
                'city_err'          => '',
                'trn_err'           => '',
                'nis_err'           => '' */


                /* $data = [
                // 'id'                => $id,
                    //'hire_date'         => $compInfo->hire_date,
                // 'internalEmail'     => $compInfo->internalEmail,


                    /* 'first_name_err'    => '',
                    'last_name_err'     => '',
                    'empDOB_err'        => '',
                    'phoneOne_err'      => '',
                    'phoneTwo_err'      => '',
                    'address_err'       => '',
                    'city_err'          => '',
                    'trn_err'           => '',
                    'nis_err'           => '' 
                ];

                $this->view('employees/edit', $data);*/














 /* 
              
              WORKS
              
              if($this->empModel->updateProfile($data) ) {

                    if($data['gender'] == "Male" && $this->empModel->calcRetirements($data) ){  
                        $retirementDate = $this->empModel->calcRetirements($data);
                        if($this->empModel->updateRetirement($retirementDate->result, $data) ) {
                            flashMessage('update_success', 'Update Successful!', 'alert alert-success bg-primary text-white');
                            redirect('employees/edit/' . $id . ''); 
                           
                        }

    
                    } else {
                        flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                        // Load view with errors
                        $this->view('employees/edit/' . $id . '', $data);
                    }
                    
                } else {
                    flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                    // Load view with errors
                    $this->view('employees/edit/' . $id . '', $data);
                } */







  /*

  //Validate Phones
          if (strlen($data['phoneOne']) < 7 || strlen($data['phoneOne']) > 10) {
                $data['phoneOne_err'] = 'Invalid Phone Number';
            } 



           /*   // GET data from Form
           $data = [
            'title'             => 'Edit Profile',
            'employee'          => $profileData->first_name . '"  "' . $profileData->last_name,
            'empID'             => '',
            'first_name'        => trim($_POST['first_name']),
            
            'last_name'         => trim($_POST['last_name']),
            
            
            'phoneOne'          => trim($_POST['phoneOne']),
            'first_name_err'    => '',
            'phoneOne_err'      => ''
           'retirement'        => $retirement->retirementDate
           'departments' => $deptHistory,
            'id' => $id,
            'deptCode' => trim($_POST['deptCode']),
            'deptName' => trim($_POST['deptName']),
            'modified_on' => date("Y-m-d H:i:s"),
            'deptCode_err' => '',
            'deptName_err' => '' 
        ]; */









 /*
            $data = [
                
                'retirement'        => date("F j, Y", strtotime($profileData->retirementDate)), 
                //'empEmail'          => $profileData->emailAddress,
                'hire_date'         => date("F j, Y", strtotime($profileData->hire_date)),
                'phoneOne'          => phoneFormat($profileData->phoneOne),
                'mobile'          => phoneFormat($profileData->mobile),
                'phoneOne_err'      => ''
                
            ]; */

    /*

    public function validateFemaleRetirement() {
        if(isset($_POST['female_retirement']) ) {  
            $female_retirement = $_POST['female_retirement'];
            if(is_numeric($female_retirement) < 1) {
               echo 'Please enter a number greater than 1';
            }
            else if($female_retirement < 0) {
                echo 'Please enter a positive number';
             }
            else if (empty($female_retirement)) {
                echo 'Field cannot be empty';
            }
        } 
    }
*/





 // $retirement = calcRetirement($data['gender'], $data['empDOB'], $retireFemale->years, $retireMale->years);
            
            //$retirement = $this->empModel->calcRetirementMale($data);



                    // Add Retirement Date by Gender
                   /* if ($data['gender'] = "Male") :
                        
                       // $this->retirementModel->setNewEmpRetirement($data['empID'], $data['gender'], $data['empDOB'], $retireMale->years);

                        //$this->retirementModel->updateMaleRetirement($data['empID'], $data['gender'], $data['empDOB'], $retireMale->years);
                        //$this->empModel->addDept($data);
                        flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                        redirect('employees/add');

                    elseif ($data['gender'] = "Female") :

                        if($this->retirementModel->setNewFemaleEmpRetirement($data));

                       // $this->retirementModel->updateFemaleRetirement($data['empID'], $data['gender'], $data['empDOB'], $retireFemale->years);
                       //$this->empModel->addDept($data);
                        flashMessage('add_sucess', 'Employee registered successfully! <a class="text-white" href="' . URLROOT . '/employees">Click here</a> to complete registration', 'alert alert-success bg-primary text-white');
                        redirect('employees/add');
                    endif; */



























































/*
    // your date of birth
    $dateOfBirth = '1950-11-26';
    // date when he'll turn 50
    $dateToFifty = date('Y-m-d', strtotime($dateOfBirth . '+50 Years'));
    // current date
    $currentDate = date('Y-m-d');
    $result = 'retired';



    // checks if already fifty
    if($currentDate <= $dateToFifty) {
        $result = $dateToFifty;
    }
    echo $result;
*/





  // Get existing Department Information from model
           /* $editDept = $this->deptModel->findDepartmentById($id);
            $deptHistory = $this->deptModel->getLastID(); */

            //$empDemographic = $this->empModel->getGenderDOB();

            /*if($employeeData->gender == "Female") {
                $retirement = $this->adminModel->getFemaleRetirement();
                $employeeData->empDOB;
                $dateToFifty = date('Y-m-d', strtotime($employeeData->empDOB));
            }
            if($employeeData->gender == "Male") {
                $retirement = $this->adminModel->getMaleRetirement();
            } */

















 /**
     * Add Employee
     */ /*
    public function add() {
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            /*
             * Process Form
            */
            // Sanitize POST data   
            /*
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $departments = $this->deptModel->getDepartments();
            
            $data = [
                'title'             => 'Employee Registration',
                'singular'          => 'Employee Details',
                'description'       => 'Add Employee',
                'departments'       => $departments,
                'empID'             => trim($_POST['empID']),
                'empTitle'          => trim($_POST['empTitle']),
                'first_name'        => trim($_POST['first_name']),
                'middle_name'       => trim($_POST['middle_name']),
                'last_name'         => trim($_POST['last_name']),
                'empDOB'            => trim($_POST['empDOB']),
                'gender'         => trim($_POST['gender']),
                'empEmail'          => trim($_POST['empEmail']),
                'hire_date'         => trim($_POST['hiredOn']),
                'relDeptID'         => trim($_POST['relDeptID']),

                'empID_err'         => '',
                'empTitle_err'      => '',
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'gender_err'     => '',
                'empEmail_err'      => '',
                'relDeptID_err'     => '',
                
                'created_date' => date("Y-m-d H:i:s"),



                'created_by' => $_SESSION['userID']
                
                
            ];


            // Validate empID
            if(empty($data['empID'])) :
                $data['empID_err'] = 'Please enter an employee ID';
            elseif (strlen($data['empID']) > 6) :
                $data['empID_err'] = 'Employee ID should be 6 characters or less';
            else :
                if($this->empModel->findEmpByID($data['empID'])) :
                    $data['empID_err'] = 'Employee ID already exists';
                endif;
            endif;

            // Validate First Name
            if(empty($data['first_name'])) :
                $data['first_name_err'] = 'Please enter a First Name';
            endif;

            // Validate Last Name
            if(empty($data['last_name'])) :
                $data['last_name_err'] = 'Please enter a Last Name';
            endif;

            // Validate empDOB
            if(empty($data['empDOB'])) :
                $data['empDOB_err'] = 'Please enter Date';
            elseif (!isRealDate($data['empDOB'])) :
                $data['empDOB_err'] = 'Invalid Date';
            endif;

            // Validate Hired Date
            if(empty($data['hiredOn'])) :
                $data['hiredOn_err'] = 'Please enter Date';
            elseif (!isRealDate($data['hiredOn'])) :
                $data['hiredOn_err'] = 'Invalid Date';
            endif;

            // Filter Email
            if (filter_var($data['empEmail'], FILTER_VALIDATE_EMAIL)) :
                $data['empEmail_err'] = 'Invalid Email Address';
            endif;

            // Validate Gender
            if (!isset($_POST['gender']  ) ) :
                $data['gender_err'] = 'Choose one';
            endif;

            if(!isset($_POST['relDeptID']) || ($data['relDeptID'] == 0) ) :
                $data['relDeptID_err'] = 'Please select a Department';
            endif;



         

            // Make sure errors are empty
            
            if( empty($data['empID_err']) && empty($data['first_name_err']) 
                && empty($data['last_name_err']) && empty($data['empDOB_err']) 
                && empty($data['gender_err']) && empty($data['relDeptID_err'])   ) :

                // Validated, then Add Employee
                if($this->empModel->addEmployee($data)) :
                    $this->empModel->addEmail($data);
                    $this->empModel->addDept($data);

                    flashMessage('add_sucess', 'Employee added successfully!', 'alert alert-success');
                    redirect('employees/add');
                else :
                    flashMessage('add_error', 'Something went wrong!', 'alert alert-warning');
                endif;
            else :
                flashMessage('update_failure', 'Save Error! Please review form.', 'alert alert-warning');
                // Load view with errors
                $this->view('employees/add', $data);
            endif;

        } 
        else {

            $employees = $this->empModel->getEmployees();
            $departments = $this->deptModel->getDepartments();
           
            $data = [
                'title'             => 'Employee Registration',
                'singular'          => 'Employee Details',
                'description'       => 'Add Employee',
                'departments'       => $departments,
                'empID'             => '',
                'empTitle'          => '',
                'first_name'        => '',
                'middle_name'       => '',
                'last_name'         => '',
                'empDOB'            => '',
                'gender'         => '',
                'empEmail'          => '',
                'hire_date'         => '',
                'relDeptID'         => '',


                
                'empID_err'         => '',
                'empTitle_err'      => '',
                'first_name_err'    => '',
                'last_name_err'     => '',
                'empDOB_err'        => '',
                'gender_err'     => '',
                'empEmail_err'      => '',
                'relDeptID_err'     => ''

                
                
            ];

            $this->view('employees/add', $data);

        }
    }



    */

   /*  
            
            // Validate Title
            if (strlen($data['empTitle']) > 5) :
                $data['empTitle_err'] = 'Title should 5 characters or less';
            endif;
            
            // Validate Email
              if(empty($data['email'])) {
                $data['email_err'] = 'Please enter an email';
            } else {
                /// check if email exists
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email already exists! Please try another email or <a href="login">login into your account</a>';
                }
            }
*/



/*


     * Edit Department
   
    public function edit($id) {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

          
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $deptHistory = $this->deptModel->getLastID();
    
            // GET data from Form
            $data = [
                'title' => 'Edit Department',
                'description' => 'Edit a department record',
                'departments' => $deptHistory,
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
    }


    */