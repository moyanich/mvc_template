<?php


/*
* Calculate Retirement by Gender
*/

/*
function calcRetirement($gender, $dob, $femaleYears, $maleYears) { 
    if($gender == "Male") {
        $dateOfBirth = $dob;
        $retirementDate = date('Y-m-d', strtotime($dateOfBirth + $maleYears));
        // current date
       return $retirementDate;
    }

    else if($gender == "Female") {
        $dateOfBirth = $dob;
        $retirementDate = date('Y-m-d', strtotime($dateOfBirth + $femaleYears));
        return $retirementDate;
    }
    
}

*/

/*
How to calculate retirement date in php
How do I calculate one's retirement date?, Date Project to calculate retirement date from Date of birth to find last working day of the retirement month. I'm trying to use one's date of birth to calculate when he'll be 50, if he's not 50 already. If person is not 50, add a year to his age then check if it'll be 50. If not, iterate until it's true

MySQL Query for Retirement date calculation based on date of birth , Write a PHP script to calculate the current age of a person. Sample date of birth : 11.4.1987. Sample Solution: PHP Code: <?php $bday = new  print floor( (time() - strtotime("1971-11-20")) / (60*60*24*365)); You only need to put this into a function and replace the date "1971-11-20" with a variable. Please note that precision of the code above is not high because of the leap years, i.e. about every 4 years the days are 366 instead of 365.

PHP Date Exercise: Calculate the current age of a person , $now = new DateTime();. //Calculate the time difference between the two dates. $​difference =  First let us calculate the date of completion of 60 years by adding 60 Years to Date of Birth. For this we will use DATE_ADD() function. select DATE_ADD( '1956-07-15', INTERVAL 60 YEAR ) Output is 2016-07-15 We get the retirement day of the month, but now we will calculate the last day of the same month

*/