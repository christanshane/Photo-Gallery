<?php
	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
	defined('SITE ROOT') ? null : define('SITE ROOT', DS.'wamp'.DS.'www'.DS.'burgos.com'.DS.'photo_gallery'); 
	
	defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');
	
	//load config file
	require_once(LIB_PATH.DS."config.php");
	
	//load basic func next
	require_once(LIB_PATH.DS."functions.php");
	
	//load core objects
	require_once(LIB_PATH.DS."session.php");
	require_once(LIB_PATH.DS."database.php");

	//load database-related classes
	require_once(LIB_PATH.DS."user.php");

?>