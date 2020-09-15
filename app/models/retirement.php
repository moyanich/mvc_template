<?php

class Retirement {

    private $db;

    public function __construct() {
        $this->db = new Database;
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

    public function updateRetirement($gender, $data) {
        $this->db->query('UPDATE tblretirement 
            SET years = CASE :gender
                WHEN "Male" THEN :maleYears
                WHEN "Female" THEN :femaleYears
            ELSE years
        END ');

        $this->db->bind(':gender', $gender);
        $this->db->bind(':maleYears', $data['male_retirement']);
        $this->db->bind(':femaleYears', $data['female_retirement']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    public function setMaleRetirementYears($data) {
        $this->db->query('UPDATE tblretirement SET years = :years WHERE gender = "Male"');
        $this->db->bind(':years', $data['male_retirement']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    public function runProcedureMaleRetirement($data) {
        $this->db->query('CALL updateMaleRetirement(:years)');
        $this->db->bind(':years', $data['male_retirement']);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    public function setFemaleRetirementYears($data) {
        $this->db->query('UPDATE tblretirement SET years = :years WHERE gender = "Female"');
        $this->db->bind(':years', $data['female_retirement']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    public function runFemaleRetirement($data) {
        $this->db->query('CALL retireFemale(:years)');
        $this->db->bind(':years', $data['female_retirement']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    public function getUpcomingRetirements() {
        $this->db->query('SELECT empID, CONCAT_WS(" ", first_name, last_name) AS full_name, empDOB, retirementDate FROM tblemployees WHERE retirementDate BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 2 YEAR)');
        $results = $this->db->resultsGet();
        return $results; 
    }

    
   
}






/* public function setRetirementYears($data) {
    $this->db->query('UPDATE tblretirement SET years = :years WHERE gender = :gender');

    //UPDATE `tblretirement` SET `years`= 45 WHERE gender = "Female";
    $this->db->bind(':years', $data['years']);
    $this->db->bind(':gender', $data['gender']);
    if($this->db->execute()) {
        return true;
    } 
    return false;
} */

/*
public function setMaleRetirement($data) {
    $this->db->query('UPDATE tblretirement SET years = :years WHERE gender = "Male"');
    $this->db->bind(':years', $data['male_retirement']);

    if($this->db->execute()) {
        return true;
    } 
    return false;
}
*/

/* option 1 
// $retirement = $this->adminModel->calcRetirement($id, $employeeData->gender, $retireFemale->years, $retireMale->years);
// 'retirement'        => $retirement->retirementDate */

/*  public function calcRetirement($id, $gender, $femaleYears, $maleYears) {
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
*/


/*
public function calcRetirement($id) {
    $this->db->query('SELECT gender, empDOB,
    CASE
        WHEN gender = "Female" THEN DATE_ADD( empDOB, INTERVAL 60 YEAR )
        WHEN gender = "Male" THEN DATE_ADD( empDOB, INTERVAL 65 YEAR )
        ELSE " "
    END AS retirementDate
    FROM tblemployees 
    WHERE id = :id
     ');
    $this->db->bind(':id', $id);
    $row = $this->db->singleResult();
    return $row;
} */



/*public function calcRetirementMale($data) {
    $this->db->query('SELECT DATE_ADD(empDOB, INTERVAL :maleYears YEAR ) AS retirementDate 
    FROM tblemployees WHERE empID = empID
    
    ');
    $this->db->bind(':empID', $data['empID']);
    $this->db->bind(':empDOB', $data['empDOB']);
    $this->db->bind(':maleYears', $data['maleYears']);
    $row = $this->db->singleResult();
    return $row;
}

public function addRetirementDate($retirement, $data) {
    $this->db->query('CALL addRetirementDate(:retirementDate, :empID)');
    $this->db->bind(':retirementDate', $retirement);
    $this->db->bind(':empID', $data['empID']);
    if($this->db->execute()) {
        return true;
    } 
    return false;
}
*/
/*public function calcRetirement($gender, $femaleYears, $maleYears) {
    $this->db->query('SELECT 
    CASE
        WHEN :gender = "Female" THEN DATE_ADD( empDOB, INTERVAL :femaleYears YEAR )
        WHEN :gender = "Male" THEN DATE_ADD( empDOB, INTERVAL :maleYears YEAR )
        ELSE " "
    END AS retirementDate
    ');
    $this->db->bind(':gender', $gender);
    $this->db->bind(':femaleYears', $femaleYears);
    $this->db->bind(':maleYears', $maleYears);
    

    $row = $this->db->singleResult();
    return $row;
} */

   
   