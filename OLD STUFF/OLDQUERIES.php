
<?php sanitize strings
function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}
?>
/*

http://www.beansoftware.com/T-SQL-FAQ/Get-Last-Inserted-ID.aspx#:~:text=To%20get%20an%20ID%20of,as%20an%20ad%2Dhoc%20query.


//How To Get Last Inserted ID On SQL Server

INSERT INTO empmanagedb.tblemployees (emp_no, first_name, middle_name,last_name) VALUES ('B290', 'Mary', 'S', 'Chold');
INSERT INTO empmanagedb.tblPhoneNumbers (eid_fk, phone_no, phone_type) VALUES ((SELECT eid FROM tblemployees WHERE eid = @@Identity), '471 815 4330', 'Cellphone');

SELECT *
FROM tblemployees
LEFT JOIN tblPhoneNumbers 
ON tblemployees.eid = tblPhoneNumbers.eid_fk
WHERE tblPhoneNumbers.eid_fk = 1;



 // $this->db->query('SELECT idDept, dept_id, deptName, deptSupervisor, emp_no, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME FROM tbldepartments LEFT JOIN tblemployees ON tbldepartments.deptSupervisor = tblemployees.emp_no');
        

SELECT * FROM empmanagedb.tblDeptSupervisor
RIGHT JOIN tbldepartments
ON tblDeptSupervisor.dep_no = tbldepartments.iddept;

*/


  /* $this->db->query('INSERT INTO tbldepartments (deptName, deptCode) VALUES(:deptName, :deptCode)'); 
        $this->db->bind(':deptName', $data['deptName']);
        $this->db->bind(':deptCode', $data['deptCode']);   */

 /* $this->db->query('SELECT idDept, deptName, deptSupervisor, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME
        FROM tbldepartments, tblEmployees 
        
        '); */

 /*   
        
      SELECT tbldepartments.idDept, tbldepartments.deptName, tbldepartments.deptCode, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME
FROM tbldepartments
        LEFT JOIN tblemployees
        ON  tbldepartments.idDept =  tblemployees.idDepartment_fk


        
        $this->db->query('SELECT *, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS SUPERVISOR FROM tbldepartments
        LEFT JOIN tblEmployees
        ON  tbldepartments.idDept =  tblEmployees.idDepartment_fk');  */




 /*

    public function findUserByUsername($username) {
        $this->db->query('SELECT * FROM users WHERE username = :username'); // Taking in a named parameter :email
        $this->db->bind(':username', $username);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    
    
    public function findDepartmentByCode($$deptcode) {

        $this->db->query('SELECT * FROM users WHERE username = :username'); // Taking in a named parameter :email
        $this->db->bind(':username', $username);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    } */




       /*

      $this->db->query('SELECT idEmployee, emp_no, hire_date, phone, job, tbldepartments.idDept,
        CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME 
        FROM tblEmployees, tbldepartments 
        WHERE  tblEmployees.idDepartment_fk = tbldepartments.idDept');


'SELECT idEmployee, emp_no, first_name, middle_name, last_name, hire_date, phone, job, idDepartment_fk, CONCAT_WS(" ", tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME 
FROM tblEmployees'

        SELECT idEmployee, emp_no, first_name, middle_name, last_name, hire_date, phone, job, idDepartment_fk,
CONCAT_WS(' ', tblEmployees.first_name, tblEmployees.middle_name, tblEmployees.last_name) AS NAME 
FROM tblEmployees
INNER JOIN tbldepartments 
ON tbldepartments.idDept 
WHERE tblEmployees.idDepartment_fk = tbldepartments.idDept 

;



        SELECT
        tbldepartments.idDept,
        tbldepartments.department_name,
        tbldepartments.departmentCode,
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS SUPERVISOR,
        CONCAT(tblEmployees.first_name, " ", tblEmployees.last_name) AS MANAGER
        
        FROM tbldepartments, tblSupervisor,  tbldepartmentsManager, tblEmployees
        WHERE
            tblSupervisor.idEmployee_fk = tblEmployees.idEmployee AND 
			tbldepartmentsManager.idemployee_fk = tblEmployees.idEmployee
        ORDER by 
            tbldepartments.idDept ASC

        SELECT customerName, customercity, customermail, salestotal
FROM onlinecustomers AS oc
   INNER JOIN
   orders AS o
   ON oc.customerid = o.customerid
   INNER JOIN
   sales AS s
   ON o.orderId = s.orderId



   
(SELECT supervisor_id
            FROM tblEmployees)
        $this->db->query('SELECT * FROM tbldepartments 
        INNER JOIN tblSupervisor
        ON tbldepartments.idDept = tblSupervisor.idDept_fk 
        ORDER BY tbldepartments.idDept DESC
        
        ')

        posts.id as postId,
        users.id as userId,
        posts.created_at as postCreated,
        users.created_at as userCreated
        FROM posts
        INNER JOIN users
        ON posts.user_id = users.id
        ORDER BY posts.created_at DESC
        
        */


http://www.beansoftware.com/T-SQL-FAQ/Get-Last-Inserted-ID.aspx#:~:text=To%20get%20an%20ID%20of,as%20an%20ad%2Dhoc%20query.


//How To Get Last Inserted ID On SQL Server

INSERT INTO empmanagedb.tblemployees (emp_no, first_name, middle_name,last_name) VALUES ('B290', 'Mary', 'S', 'Chold');
INSERT INTO empmanagedb.tblPhoneNumbers (eid_fk, phone_no, phone_type) VALUES ((SELECT eid FROM tblemployees WHERE eid = @@Identity), '471 815 4330', 'Cellphone');

SELECT *
FROM tblemployees
LEFT JOIN tblPhoneNumbers 
ON tblemployees.eid = tblPhoneNumbers.eid_fk
WHERE tblPhoneNumbers.eid_fk = 1;



https://www.codexworld.com/store-retrieve-image-from-database-mysql-php/



Image Upload Form
Create an HTML form with a file input field to select an image file for upload. Make sure the <form> tag contains the following attributes.

method="post"
enctype="multipart/form-data"
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>
Store Image File in Database (upload.php)
The upload.php file handles the image upload and database insertion process.

Check whether the user selects an image file to upload.
Retrieve the content of image file by the tmp_name using PHP file_get_contents() function.
Insert the binary content of the image in the database using PHP and MySQL.
Show the image uploading status to the user.
<?php 
// Include the database configuration file  
require_once 'dbConfig.php'; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $db->query("INSERT into images (image, uploaded) VALUES ('$imgContent', NOW())"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>
Retrieve image from database (view.php)
In the view.php file, we will retrieve the image content from the MySQL database and list them on the web page.

The data, charset, and base64 parameters in the src attribute, are used to display image BLOB from MySQL database.
<?php 
// Include the database configuration file  
require_once 'dbConfig.php'; 
 
// Get image data from database 
$result = $db->query("SELECT image FROM images ORDER BY uploaded DESC"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
Upload Multiple Images and Store in Database using PHP and MySQL








 /* Add New User */ /*
 protected function addUser($username, $password, $email, $group, $activation) { 
        
    //hash the password
    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

    //create the activation code
    $activation = md5(uniqid(rand(),true));

    $sql = "INSERT INTO users (username, password, email, `group`, active) VALUES (?, ?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username, $passwordHash, $email, $group, $activation]);

    $id = $this->connect()->lastInsertId('user_id');
} 

 /* Fetch Username */      /*
protected function getUser($username, $password) {

    $sql = "SELECT * FROM users WHERE username = ? LIMIT 1";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindValue('username', $username);
    $stmt->execute([$username]);
    $results = $stmt->fetchAll();
    return $results; 

}


/*
protected function userExists($username, $email, $group) {

    try {
        $sql = "SELECT 1 FROM users WHERE username = ? OR email = ? AND group = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email, $group]);
        $results = $stmt->fetchAll();

       

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} */
 /*
protected function logSession($username, $password, $email, $group) { 
    
    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
    $sql = "INSERT INTO users (username, password, email, `group`) VALUES (?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username, $passwordHash, $email, $group]);

    /*INSERT INTO `users`(`username`, `password`, `email`, `group`) VALUES ('samman', 'pass', 'sam@email.com', '2' ) */
 /*
} 



public function createUser($username, $password, $email, $group, $activation) {
    $results = $this->addUser($username, $password, $email, $group, $activation);
}






public function showUser($username, $password) {
    
    $results = $this->getUser($username, $password);

    foreach ($results as $result ) {
       // if (password_verify($password, $result['password'])) {
        if ($result['password']) {
           // $_SESSION['admin_session'] = $result['user_id'];
            //$_SESSION['csrf_token'] = $result['user_id'];

            // regenerate session id
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['admin_session'] = $results['user_id'];
            $_SESSION['last_login'] = time();
            
            return true;
            
        } else {
            return false;
        }
    }
}

/* public function userLoggedIn() {
    if(isset($_SESSION['admin_session'])) {
        return true;
    }
} */
 /*
public function is_logged_in() {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        return true;
    }
}



public function redirect($url) {
    header("Location: $url");
}

public function logout() {
    session_destroy();
    unset($_SESSION['admin_session']);
    return true;
}

public function validateEmail($email) {
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email]);
    $results = $stmt->fetchAll();

    foreach($results as $row) {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">';
            echo '<small><em>Email already exisits</em>. Please try another email or <a href="login.php">login into your account</a></small>';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }  
}

/*public function checkUsername($username) {

    if(strlen($username) < 3){
        echo '<div class="alert alert-warning alert-dismissible fade show mt-1" role="alert">';
            echo '<small>Username is too short.</small>';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    } 
}*/   /*

public function checkPassword($password, $confirmpass) {
    
    if($password != $confirmpass) {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">';
            echo '<small>Passwords do not match.</small>';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
}

public function validateUsername($username) {
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$username]);
    $results = $stmt->fetchAll();

    foreach($results as $row) {
        echo '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">';
            echo '<small><em>Username</em> already exisits. Please try another username or <a href="login.php">login into your account</a></small>';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }  
}
}


if(isset($_POST['email'])) {   // Registration Form
$email = $_POST['email'];
$UserObj = new Validation();
$UserObj->validateEmail($email);
} 

if(isset($_POST['username'])) {   // Registration Form
$username = $_POST['username'];
$UserObj = new Validation();
$UserObj->validateUsername($username);
} 

if(isset($_POST['password']) ) {
$password = $_POST['password'];
$confirmpass = $_POST['passwordConfirm'];
$passObj = new Validation();
$passObj->checkPassword($password, $confirmpass);
}



/* public function addSession($user_id, $sess_token) {

    $results = $this->logSessions($user_id, $sess_token); 

} */






/*
 *
 * Page: Login library
 * 
*/ /*

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Database connection
	require 'config.php';
	
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$username = check_input($_POST['username']);
	
	if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
		$_SESSION['msg'] = "Username should not contain space and special characters!"; 
		header('Location: ../index.php');
	} 

	else {
		$username = check_input($_POST['username']);			
		$pwd = check_input($_POST["loginPassword"]);
		$encrypt_pass = md5($pwd);


		//$encrypt_pass = password_hash($pwd, PASSWORD_DEFAULT);
		//$encrypt_pass = md5($pwd, PASSWORD_DEFAULT);

		//$encrypt_pass = password_hash($pwd, PASSWORD_BCRYPT, ["cost"=>8]);
		

		$sql = "SELECT * FROM user WHERE username=? AND password=?";
		$stmt = $mysqli->prepare($sql);
		
		if(!$stmt) {
			header('Location: ../index.php?error=sqlerror');
			exit();
		} 
		
		else {
			// Bind parameters
			$stmt->bind_param("ss", $username, $encrypt_pass); //pass user data into database
			// Execute query
			$stmt->execute();
			$result = $stmt->get_result();

			if($result->num_rows === 0) { 
				echo '<script>';
					echo 'window.alert("Login Failed, Invalid Input!");';
					echo 'window.location.href = "../index.php"';
				echo '</script>'; 
			}

			else {

				while ($row = $result->fetch_assoc()) {
			
					//$pwdCheck = password_verify($encrypt_pass, $pwd); //check password of user to one in database
					
					if ($encrypt_pass  == false) { 
						header('Location: ../index.php?error=pwd_nouser');
						exit(); 
					}

					else if ($encrypt_pass  == true) {
						echo 'password true';

						if ($row['access']==0 || $row['access']==1 ) { //Super Admin
							session_start();
							$_SESSION['superid']=$row['userid'];	
							
							/* Update user log */   /*
							$loginStmt = $mysqli->prepare("UPDATE user SET last_login = now() WHERE userid=?");
							$loginStmt->bind_param("i", $_SESSION['superid']);
							$loginStmt->execute();
							$loginStmt->close();
							
							header('Location: ../admin/dashboard.php');	
							exit();		
						} 

						if ($row['access']==1) { //HR Admin
							session_start();
							$_SESSION['adminid']=$row['userid'];	
							
							/* Update user log */    /*
							$loginStmt = $mysqli->prepare("UPDATE user SET last_login = now() WHERE userid=?");
							$loginStmt->bind_param("i", $_SESSION['adminid']);
							$loginStmt->execute();
							$loginStmt->close();
							
							header('Location: ../admin_user/dashboard.php');	
							exit();		
						} 

						else if ($row['access']==2) { 	//Security
							session_start();
							$_SESSION['sid']=$row['userid'];	
							
							/* Update user log */     /*
							$loginStmt = $mysqli->prepare("UPDATE user SET last_login = now() WHERE userid=?");
							$loginStmt->bind_param("i", $_SESSION['sid']);
							$loginStmt->execute();
							$loginStmt->close();
							
							header('Location: ../security/dashboard.php');
							exit();		
						} 


						else if ($row['access']==3) { 	//Security
							session_start();
							$_SESSION['disabledid']=$row['userid'];	

							echo '<script>';
								echo 'window.alert("User Account is Disabled. Please contact the Administrator");';
								echo 'window.location.href = "../index.php"';
							echo '</script>'; 
							exit();		
						} 
					}

					else {
						header('Location: ../index.php?error=nouser_exists');
						exit();					
					} 
				}
			}  
			$stmt->close();
		} 
	} 
}

else {
	header('Location: ../index.php');
	exit();
}








<?php 

/*
 $(document).ready(function() {
     var gender = $('#gender').val();
     var dob = $('#dob').val();

     // debug
     console.log(gender);
     console.log(dob);

     if(gender == "Male") {
         $.ajax({
             //type: 'GET',
             type: 'POST',
             url: 'getMaleRetire',
             data: {
                 gender: gender,
                 dob: dob
             },
             success: function(response) {
                 console.log(response); //=== Show Success Message==
                 $( '#retirement').html(response);
             }
         });
     }
     else if(gender == "Female") {
         $.ajax({
             type: 'POST',
             url: 'getFemaleRetire',
             data: {
                 gender: gender,
                 dob: dob
             },
             success: function(response) {

                 console.log(response); //=== Show Success Message==
                 $( '#retirement').html(response);
             }
         });
     }
 });  */


 ?>


<?php /*



 $(document).change(function() {
 var dob = $("#dob").val();
 var gender = $('#gender').val();


console.log(gender);
     console.log(dob);


 if(gender == "Male") {
     $.ajax({
         type: 'POST',
         url: 'updateMaleRetire',
         data: {
             gender: gender,
             dob: dob
         },

         success:function(data) {
             console.log(data); //=== Show Success Message==
         },
         error:function(data){
             console.log("error occured"); //===Show Error Message====
         }


        /* success: function(response) {
             $( '#retirement').html(response);
         } 
     });
 }
 else if(gender == "Female") {
         console.log(dob);
         console.log("FEMne");

         /*  $.ajax({
             type: 'POST',
             url: 'getFemaleRetire',
             data: {
                 gender: gender,
                 dob: dob
             },
             success: function(response) {
                 $( '#retirement').html(response);
             }
         }); 
         } 

     //e.preventDefault(); 
 }); 



// var gender = $("#gender option:selected").val();

<!--<div class="form-group col-12 col-sm-4">
                         <label class="col-form-label" for="trn">RetirementDate:</label>
                         <input type="date" name="retirementDate" class="form-control" value="<?php echo $data['retirementDate']; ?>" disabled>
                         <span id="retirement"></span>
                        
                     </div>-->

     //var gender = $("input[name='gender']:checked").val();
         
     // debug
    // console.log(dob);
   // console.log(gender);

 <form id="profileForm" action="<?php echo URLROOT; ?>/employees/edit/<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">

<label class="col-form-label" for="email">Email (Company):</label>
                         <input type="email" name="internalEmail" class="form-control <?php echo (!empty($data['internalEmail_err'])) ? 'is-invalid' : '' ; ?> id="emailAddress" value="<?php echo $data['internalEmail']; ?>">
                         <?php echo (!empty($data['internalEmail_err'])) ? '<span class="invalid-feedback">' . $data['internalEmail_err'] . '</span>' : '' ; ?>

                         */ ?>



<?php /* <div class="selectgroup w-100">
                                 <?php if ($data['gender'] == 'Male') { ?>
                                     <label class="selectgroup-item">
                                         <input type="radio" name="gender" value="Male" class="selectgroup-input gender" onBlur="getRetirement(this.value)" checked>
                                         <span class="selectgroup-button">Male</span>
                                     </label>
                                     <label class="selectgroup-item">
                                         <input type="radio" name="gender" value="Female" class="selectgroup-input">
                                         <span class="selectgroup-button">Female</span>
                                     </label>

                                 <?php 
                                 } else if ($data['gender'] == 'Female') { ?>
                                     <label class="selectgroup-item">
                                         <input type="radio" name="gender" value="Male" class="selectgroup-input gender">
                                         <span class="selectgroup-button">Male</span>
                                     </label>
                                     <label class="selectgroup-item">
                                         <input type="radio" name="gender" value="Female" class="selectgroup-input" checked onBlur="getRetirement(this.value)">
                                         <span class="selectgroup-button">Female</span>
                                     </label>

                                 <?php } ?>

                                 <span id="retirement"></span> 
                             </div>


                             <?php /*

                             <label class="selectgroup-item">
                                     <input type="radio" id="gender" name="gender" value="<?php echo $data['gender']; ?>" class="selectgroup-input gender" onBlur="getRetirement(this.value)" checked>
                                     <span class="selectgroup-button"><?php echo $data['gender']; ?></span>
                                 </label>
                                 
                                 <?php foreach ($data['gendersList'] as $empGender) { ?>
                                     <label class="selectgroup-item">
                                         <input type="radio" id="gender" name="gender" value="<?php echo $empGender->gender ; ?>" class="selectgroup-input gender" onBlur="getRetirement(this.value)">
                                         <span class="selectgroup-button"><?php echo $empGender->gender ; ?></span>
                                     </label>
                                <?php } 

                             <select name="parish" class="custom-select">  
                                 <option value="<?php echo $data['parish']; ?>" selected><?php echo $data['parish']; ?></option>
                                 <?php foreach ($data['parishName'] as $parish ) {
                                     echo '<option value="' . $parish->parishName. '">' . $parish->parishName . '</option>';
                                 } ?>
                             </select> 





                             <div class="selectgroup w-100">
                                 <label class="selectgroup-item">
                                     <input type="radio" name="gender" value="Male" class="selectgroup-input gender" <?php if ($data['gender'] == "Male") { echo 'checked' ; } else { echo ''; } ?>  onBlur="getRetirement(this.value)">
                                     <span class="selectgroup-button">Male</span>
                                 </label>
                                 <label class="selectgroup-item">
                                     <input type="radio" name="gender" value="Female" class="selectgroup-input" <?php if ($data['gender'] == "Female") { echo 'checked=""'; } ?>>
                                     <span class="selectgroup-button">Female</span>
                                 </label>
                             </div>
                             <span id="retirement"></span>  */?>










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







<script>
/*
    $(document).ready(function() {
        $('#gender').keyup(function(){
            var gender2 = $('#gender').val();
            console.log(gender2);

            $.ajax({
                type: 'POST',
                url: 'getRetire',
                data: {
                    gender: gender2        
                },
                success: function(data){
                    console.log(data);
                }
            }); 
        }); 
    }); */
</script>



