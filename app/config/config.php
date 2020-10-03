<?php


	define('DB_HOST', 'localhost'); // database host *** use IP address to avoid DNS lookup
	define('DB_USER', 'root');
	define('DB_PASS', '');
	define('DB_NAME', 'swiftdb2');
	define('DB_PORT', '8889'); 

	/* Stores root links */

	// App Root
	define('APPROOT', dirname(dirname(__FILE__)));
	// URL Root
	define('URLROOT', 'http://localhost/swiftmanager'); // set this to '/' for a live server.
	// Site Name
	define('SITENAME', 'Swift Manager'); // This will be used if no site title is set
	// App Version
	define('APPVERSION', '1.0.1');

	date_default_timezone_set('America/Bogota');


	