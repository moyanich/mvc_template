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
            companyname = :companyname
        ');

        $this->db->bind(':compUrl', $data['compUrl']);
        $this->db->bind(':companyname', $data['companyname']);
       
        if($this->db->execute()) {
            return true;
        } 
        return false;
    } 

    public function parishes() {
        $this->db->query('SELECT * FROM tblparish');
        $results = $this->db->resultsGet();
        return $results;  
      
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