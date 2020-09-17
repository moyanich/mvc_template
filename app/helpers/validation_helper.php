<?php

class Validation_helper extends Controller {
    public function __construct() {
        if ( !isUserSuperAdmin() )  {
            redirect('users/login');
        } 
        $this->valModel = $this->model('Department');
    }

    public function validateDeptName($deptName) {
        if(isset($_POST['deptName'])) { 
            $results = $this->deptModel->findDepartmentByName($deptName);

            foreach($results as $row) {
                echo '<div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">';
                    echo '<small><em>Email already exisits</em>. Please try another email or <a href="login.php">login into your account</a></small>';
                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
            }  
        }
    }


    




}



?>
