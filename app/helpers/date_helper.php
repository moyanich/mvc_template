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



 /*

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<?php 
			/*
			* This requires a couple of things ot be set:
			* 		$homePath = relative path of the site
			*		$crumbCut = number of links to ignore in the trail
			* See the working version here: http://iainjmccallum.com/guides.php
			*/

			/*
			* This get's the location of the config file to include,
			* no matter the location of the working directory.
			* $homePath comes from head.php
            */
            
             /*
			$homePath = URLROOT;

			//$configLocation = (ltrim($homePath,'"')) . 'config.php';
			//include $configLocation;

			/*
			* This gets the path to the current working directory 
			* the string is split into an array where '/' occurs
            */
            
             /*
			$crumbs = explode("/",$_SERVER["REQUEST_URI"]);

			/*
			* I have used $homePath again, this time as the initial 
			* building block for the href from which each breadcrumb
			* link will be built.  Every step into a directory structure
			* will be added.
            */
            
             /*
			$linkPath = $homePath;

			/*
			* Maybe a slightly verbose for loop but it keeps it clear in my head.
			* Also note the foreach is a slow function but in this case the 
			* loop is small enough to be of no worries!
			* I loop through each string in the exploded URI array.
			* The first few (as defined by $crumbCut in config.php) are ignored.
			* This is to account for the varying positions the breadcrumbs may begin from 
			* within varying directories.  For me, I only want to start the trail from 'Guides'
            */
            
             /*
			$crumbCounter = 0;
			foreach($crumbs as $crumb){
				if ($crumbCounter <= $crumbCut) {
					//do nothing, skip over the extended file root so the crumbs only show from 'Guides'
				} else {
					/*
					* This bit is fairly self explanitory, tidy up the string of '.php'
					* echo out the relative url, echo out the name of the breadcrumb
					* add the name + '/' to the $linkPath in preperation for the next loop in 
					* which the next link will require this directory level within it's address.
                    */
                    
                     /*
					$word = str_replace(".php","",$crumb);
					echo '<li class="breadcrumb-item"><a class="text-capitalize" href="' . $word . '.php" >' . $word . '</a></li>';
					$linkPath = $linkPath . $word . '/';
				} 
				//Increment the crumbCounter,
				$crumbCounter++;
			}
		/* Finally add in my litte flourish and bob's your uncle! A dynamic breadcrumb trail!
		* Actually, one final thought: this is done server side, it would be cool to work up a client side JS version
		* Then, somehow have a variable set in config that would indicate whether the server is under load
		* if it is - tell the client machien to do all the wee things like this, if it's not, then do it on the
		* server as it's probably quicker.  Food for thought!  Ideas for when there's time!
        */
        
         /*
		?>
		<li class="guidemap breadcrumb-item"><a href=<?php echo $homePath . 'guides/map.php"' ?>>map</a></li>
	</ol>
</nav>
*/