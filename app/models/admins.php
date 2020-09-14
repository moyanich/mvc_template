<?php

class Admins {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCompany() {
        $this->db->query('SELECT * FROM tbloptions LIMIT 1');
        $row = $this->db->singleResult();
        return $row;
    } 
 
    public function updateCompany($data) {
        $this->db->query('UPDATE tbloptions SET 
            compUrl = :compUrl, 
            compName = :compName,
            compTRN = :compTRN,
            compNIS = :compNIS,
            contactPerson = :contactPerson,
            address = :address,
            city = :city,
            parish = :parish,
            email = :email,
            main_phone = :main_phone,
            secondary_phone = :secondary_phone
        ');

        $this->db->bind(':compUrl', $data['compUrl']);
        $this->db->bind(':compName', $data['compName']);
        $this->db->bind(':compTRN', $data['compTRN']);
        $this->db->bind(':compNIS', $data['compNIS']);
        $this->db->bind(':contactPerson', $data['contactPerson']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':parish', $data['parish']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':main_phone', $data['main_phone']);
        $this->db->bind(':secondary_phone', $data['secondary_phone']);
        
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 

    public function getParishes() {
        $this->db->query('SELECT * FROM tblparish');
        $results = $this->db->resultsGet();
        return $results;  
    } 

    public function getMaleRetirement() {
        $this->db->query('SELECT years FROM tblretirement WHERE gender = "Male"');
        $row = $this->db->singleResult();
        return $row;
    } 

    public function getFemaleRetirement() {
        $this->db->query('SELECT years FROM tblretirement WHERE gender = "Female"');
        $row = $this->db->singleResult();
        return $row;
    } 

    public function setMaleRetirement($data) {
        $this->db->query('UPDATE tblretirement SET years = :years WHERE gender = "Male"');
        $this->db->bind(':years', $data['male_retirement']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }
    
    public function setfemaleRetirement($data) {
        $this->db->query('UPDATE tblretirement SET years = :years WHERE gender = "Female"');
        $this->db->bind(':years', $data['female_retirement']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 

    public function calcRetirement($id, $gender, $femaleYears, $maleYears) {
        $this->db->query('SELECT gender, empDOB,
        CASE
            WHEN :gender = "Female" THEN DATE_ADD( empDOB, INTERVAL :femaleYears YEAR )
            WHEN :gender = "Male" THEN DATE_ADD( empDOB, INTERVAL :maleYears YEAR )
            ELSE " "
        END AS retirementDate
        FROM tblemployees 
        WHERE id = :id
         ');
        $this->db->bind(':id', $id);
        $this->db->bind(':gender', $gender);
        $this->db->bind(':femaleYears', $femaleYears);
        $this->db->bind(':maleYears', $maleYears);
        

        $row = $this->db->singleResult();
        return $row;
    }

   


}








 /*   
 
 
 $row = $wpdb->get_row( $wpdb->prepare( "SELECT option_value FROM $wpdb->options WHERE option_name = %s LIMIT 1", '_transient_doing_cron' ) );
        
          //  $this->db->query('INSERT IGNORE INTO tblcompany (option_name, option_value) VALUES (' . $key .  ', ' . $val . ') ');

 
 if ( is_object( $row ) ) {
			$value = $row->option_value;
        }
        

        if ( get_option( 'siteurl' ) !== $url ) {
            update_option( 'siteurl', $url );
        }

        $options = array(
			'timeout'   => $parsed_args['timeout'],
			'useragent' => $parsed_args['user-agent'],
			'blocking'  => $parsed_args['blocking'],
			'hooks'     => new WP_HTTP_Requests_Hooks( $url, $parsed_args ),
        );
        
        if ( ! isset( $alloptions['siteurl'] ) ) {
		$installed = $wpdb->get_var( "SELECT option_value FROM $wpdb->options WHERE option_name = 'siteurl'" );
	} else {
		$installed = $alloptions['siteurl'];
    }
    

    $lock   = "revision-upgrade-{$post->ID}";
	$now    = time();
    $result = $wpdb->query( $wpdb->prepare( "INSERT IGNORE INTO `$wpdb->options` (`option_name`, `option_value`, `autoload`) VALUES (%s, %s, 'no') /* LOCK */  /*  ", $lock, $now ) );
    

    // Upgrade this revision.
		$result = $wpdb->update( $wpdb->posts, $update, array( 'ID' => $this_revision->ID ) );


    */















 /* BEGIN Departments 

    public function getDepartments() {
        $this->db->query('SELECT deptID, deptName FROM tblDepartments');
        
        $results = $this->db->resultsGet();
        return $results;  
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

    public function findDepartmentByID($deptID) {
        $this->db->query('SELECT * FROM tblDepartments WHERE deptID = :deptID'); 
        $this->db->bind(':deptID', $deptID);
        $row = $this->db->singleResult();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function editDept($data) {
       
    }  

   return false;
    }   

   */

    /* END Departments */