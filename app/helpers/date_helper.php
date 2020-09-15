<?php


/*
* Simple Date display
* link https://phppot.com/php/php-time-ago-function/
*/
function displayDate() { ?>
    <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
        <span class="day-name" id="Day_Name">Today:</span>&nbsp; <span class="" id="Select_date"><?php echo date("l - F j, Y"); ?></span> 
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar align-self-center icon-xs ml-1">
        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
        <line x1="16" y1="2" x2="16" y2="6"></line>
        <line x1="8" y1="2" x2="8" y2="6"></line>
        <line x1="3" y1="10" x2="21" y2="10"></line>
        </svg>
    </a>
<?php
    
}

/*
* Source: phppot
* Converts the given date into a time ago string like 2 hours age, 3 years ago
* link https://phppot.com/php/php-time-ago-function/
* @var timeago() 
* Function the given date is converted into timestamp using PHP built-in strtotime(). 
*/
function timeago($date) {
	$timestamp = strtotime($date);	
	
	$strTime = array("second", "minute", "hour", "day", "month", "year");
	$length = array("60","60","24","30","12","10");

	$currentTime = time();
	if($currentTime >= $timestamp) {
		$diff = time()- $timestamp;
		
		for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
		}

		$diff = round($diff);
		return $diff . " " . $strTime[$i] . "(s) ago ";
	}
}

function isRealDate($date) { 
    if (false === strtotime($date)) { 
        return false;
    } 
	list($year, $month, $day) = explode('-', $date); 
	//list($month, $day, $year) = explode('-', $date); 
    return checkdate($month, $day, $year);
}

