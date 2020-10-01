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
                'jobDesc_path'  => preg_replace('/\s+/', '-', basename($_FILES['fileUpload']['name'])),
                'job_err'       => '',
                'deptName_err'  => '',
                'jobDesc_err'   => '',
            ];

            //  Validate Job Name
            if(empty($data['job'])) {
                $data['job_err'] = 'Please enter a Designation';
            } else if($this->jobModel->ValidateJob($data['job'], $data['relDeptID']) ) {
                $data['job_err'] = 'Designation already exists in this Department';
            }

            if(!empty($data['jobDesc_path'])) {
                /**** SET FILE UPLOAD ***/
                // Set the destination of the file on the server
                $target_dir = setFilepath("job-descriptions");  
                
               // $target_dir = "files/job-descriptions/";

                // Get file path
                $target_file = $target_dir . $data['jobDesc_path'];

                // Get the file extension
                $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
                // Set Allowed file types
                $allowd_file_ext = array('jpg', 'png', 'jpeg', 'pdf', 'docx', 'doc');
                
                if (!in_array($imageExt, $allowd_file_ext)) {
                    $data['jobDesc_err'] = 'Allowed file formats .jpg, .png, .jpeg, .pdf, .docx and .doc';
                } else if ($_FILES['fileUpload']['size'] > 10000000) { // file shouldn't be larger than 10 Megabytes
                    flashMessage('add_error', 'Filesize limit exceeded!', 'alert alert-warning');
                    $data['jobDesc_err'] = 'Filesize limit exceeded!';
                } 

                if( empty($data['job_err']) && empty($data['jobDesc_err']) ) {
                    // Validated!  Add Designation and/or Save File
                    if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file) ) {
                        if($this->jobModel->insertJobwithAttachment($data) ) {
                            redirect('jobs/index');
                            flashMessage('add_success', 'Designation added successfully!', 'alert alert-success');
                        } 
                    } 
                }
                else {
                    flashMessage('add_error', 'Save Error! Something went wrong!', 'alert alert-warning');
                    $this->view('jobs/add', $data);
                } 
            }
            else if(empty($data['jobDesc_path'])) {
                // Check for errors
                if( empty($data['job_err']) && empty($data['jobDesc_err']) ) {
                    // Validated!  Add Designation and/or Save File
                    if($this->jobModel->insertJob($data) ) {
                        redirect('jobs/index');
                        flashMessage('add_success', 'Designation added successfully!', 'alert alert-success');
                    }
                }
                else {
                    flashMessage('add_error', 'Save Error! Please review form.', 'alert alert-warning');
                    // Load view with errors
                    $this->view('jobs/add', $data);
                }  
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
                'jobDesc_path'  => '',
                'job_err'       => '',
                'deptName_err'  => '',
                'jobDesc_err'   => '',
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

   



}





/*try {
		$newname = $fName . '-' . $LName . '.jpg';
		$newname = preg_replace('/\s+/', '-', $newname);

		if (!isset($_FILES['fileField']['error']) || is_array($_FILES['fileField']['error'])) {
			throw new RuntimeException('Invalid parameters.');
		}

	    // Check $_FILES['upfile']['error'] value.
	    switch ($_FILES['fileField']['error']) {
	        case UPLOAD_ERR_OK:
	            break;
	        //case UPLOAD_ERR_NO_FILE:
	            //throw new RuntimeException('No file sent.');
	        case UPLOAD_ERR_INI_SIZE:
	        case UPLOAD_ERR_FORM_SIZE:
	            throw new RuntimeException('Exceeded filesize limit.');
	        default:
	            throw new RuntimeException('Unknown errors.');
	    }

		// You should also check filesize here. 
	    if ($_FILES['fileField']['size'] > 10000000) {
	        throw new RuntimeException('Exceeded filesize limit.');
	    }

	    // DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
	    // Check MIME Type by yourself.
	    $finfo = new finfo(FILEINFO_MIME_TYPE);
	    if (false === $ext = array_search(
	    	$finfo->file($_FILES['fileField']['tmp_name']),
		        array(
		            'jpg' => 'image/jpeg',
		            'png' => 'image/png',
		        ),
		        true
		    )) {
		    throw new RuntimeException('Invalid file format.');
		}

	    // You should name it uniquely.
	    // DO NOT USE $_FILES['upfile']['name'] WITHOUT ANY VALIDATION !!
	    // On this example, obtain safe unique name from its binary data.

	    if (!move_uploaded_file($_FILES['fileField']['tmp_name'], "../images/staff/$newname")) {
	        throw new RuntimeException('Failed to move uploaded file.');
	    }
	    
	    $file="../images/staff/".$newname;
		echo 'File is uploaded successfully.';

	} catch (RuntimeException $e) {
	   	echo $e->getMessage();
	} 
	*/
    
    

    //1. Prepare statement
	/*if(!($stmt = $mysqli->prepare("INSERT INTO employee (empID, empFirstName, empLastName, deptID, typeID, empPosition, empAddress, empGender, created_date, created_by, empPhoto, empStartDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), '".$_SESSION['superid']."', '$file', '$empStartDate')"))) {
		echo 'statement failed: (' . $mysqli->errno . ') ' . $stmt->error;
	} 

	if(!($stmt = $mysqli->prepare("INSERT INTO employee (empID, empFirstName, empLastName, deptID, typeID, empPosition, empAddress, empGender, created_date, created_by, empStartDate) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), '".$_SESSION['superid']."', '$empStartDate')"))) {
		echo 'statement failed: (' . $mysqli->errno . ') ' . $stmt->error;
	}

    */
    



/*
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $imageURL = 'uploads/'.$row["file_name"];
?>
    <img src="<?php echo $imageURL; ?>" alt="" />
<?php }
}else{ ?>
    <p>No image(s) found...</p>


*/



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