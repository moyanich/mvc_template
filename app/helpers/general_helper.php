<?php

/**
 * How to validate phone number 
 *  
 * @link https://www.codespeedy.com/how-to-validate-phone-number-in-php/
 * @return  true based on phone
 */
function validate_phone_number($phone) {
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
	if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
		return false;
	} else {
		return true;
	}
}


/**
 * Email validation in PHP using FILTER_VALIDATE_EMAIL
 *  
 * @link https://www.codespeedy.com/email-validation-in-php-using-filter_validate_email/
 * @return  true based on email
 */
function validateEmail($email) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return true;
	} else {
		return false;
	}
}


/*
* Format 10 or 7 digit phone number
*/
function phoneFormat($number) {
	if(ctype_digit($number) && strlen($number) == 10) {
  	$number = substr($number, 0, 3) .'-'. substr($number, 3, 3) .'-'. substr($number, 6);
	} else {
		if(ctype_digit($number) && strlen($number) == 7) {
			$number = substr($number, 0, 3) .'-'. substr($number, 3, 4);
		}
	}
	return $number;
}


/**
*  Format TRN
*/
function trnFormat($number) {
	if(ctype_digit($number) && strlen($number) == 9) {
  	    $number = substr($number, 0, 3) .'-'. substr($number, 3, 3) .'-'. substr($number, 6);
	} 
	return $number;
}


/**
 * Calculate the current age of a person
 * 
 * Calculate and returns age based on the date provided by the user.
 * @param   date of birth('Format:yyyy-mm-dd').
 * @return  age based on date of birth
 */
function calcAge($dob){
    if(!empty($dob)){
        $birthdate = new DateTime($dob);
        $today   = new DateTime('today');
        $age = $birthdate->diff($today)->y;
        return $age;
    } else {
        return 0;
    }
}























/*
$fileName = basename($_FILES[$file]["name"]);

	// Get file path
	$target_file = $target_dir . $fileName;

	// Get file extension
	$imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// Allowed file types
	$allowd_file_ext = array('jpg','png','jpeg', 'pdf', '.docx', '.doc');
			
	if(in_array($imageExt, $allowd_file_ext)) {
		return true;
	} else if ($_FILES['fileUpload']['size'] > 10000000) {
		return true;
	}
	else {
		return false;
	}


How to calculate retirement date in php
How do I calculate one's retirement date?, Date Project to calculate retirement date from Date of birth to find last working day of the retirement month. I'm trying to use one's date of birth to calculate when he'll be 50, if he's not 50 already. If person is not 50, add a year to his age then check if it'll be 50. If not, iterate until it's true

MySQL Query for Retirement date calculation based on date of birth , Write a PHP script to calculate the current age of a person. Sample date of birth : 11.4.1987. Sample Solution: PHP Code: <?php $bday = new  print floor( (time() - strtotime("1971-11-20")) / (60*60*24*365)); You only need to put this into a function and replace the date "1971-11-20" with a variable. Please note that precision of the code above is not high because of the leap years, i.e. about every 4 years the days are 366 instead of 365.

PHP Date Exercise: Calculate the current age of a person , $now = new DateTime();. //Calculate the time difference between the two dates. $​difference =  First let us calculate the date of completion of 60 years by adding 60 Years to Date of Birth. For this we will use DATE_ADD() function. select DATE_ADD( '1956-07-15', INTERVAL 60 YEAR ) Output is 2016-07-15 We get the retirement day of the month, but now we will calculate the last day of the same month

*/