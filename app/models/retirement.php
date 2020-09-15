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

        $this->db->bind(':gender', $gender]);
        $this->db->bind(':maleYears', $data['male_retirement']);
        $this->db->bind(':femaleYears', $data['female_retirement']);

        if($this->db->execute()) {
            return true;
        } 
        return false;
    }



    /*
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
   */

    /* option 1 */
   // $retirement = $this->adminModel->calcRetirement($id, $employeeData->gender, $retireFemale->years, $retireMale->years);
   // 'retirement'        => $retirement->retirementDate
   
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
    public function updateMaleRetirement($empID, $gender, $empDOB, $maleYears) {
        $this->db->query('UPDATE tblemployees SET 
        retirementDate = DATE_ADD( :empDOB, INTERVAL :maleYears YEAR )
        WHERE empID = :empID AND gender = :gender');

        // Bind values
        $this->db->bind(':empID', $empID);
        $this->db->bind(':gender', $gender);
        $this->db->bind(':empDOB', $empDOB);
        $this->db->bind(':maleYears', $maleYears);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function updateFemaleRetirement($empID, $gender, $empDOB, $femaleYears) {
        $this->db->query('UPDATE tblemployees SET 
        retirementDate = DATE_ADD( :empDOB, INTERVAL :femaleYears YEAR )
        WHERE empID = :empID AND gender = :gender');

        // Bind values
        $this->db->bind(':empID', $empID);
        $this->db->bind(':gender', $gender);
        $this->db->bind(':empDOB', $empDOB);
        $this->db->bind(':femaleYears', $femaleYears);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function runProcedureMaleRetirement($maleYears) {
        $this->db->query('CALL updateMaleRetirement(:maleYears)');
        $this->db->bind(':maleYears', $maleYears);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }

    public function runFemaleRetirement($femaleYears) {
        $this->db->query('CALL updatefemaleRetirement(:femaleYears)');
        $this->db->bind(':femaleYears', $femaleYears);
        if($this->db->execute()) {
            return true;
        } 
        return false;
    }


   


}




