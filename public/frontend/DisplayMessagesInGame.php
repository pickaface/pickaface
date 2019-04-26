<?php
	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
	defined('P_ROOT') ? null : define('P_ROOT', dirname(dirname(dirname(__FILE__))));
	//dirname(dirname(dirname(__FILE__))) = /media/sf_zebbox/agora which is requied for the
	//following line of code
	//dirname($_SERVER['PHP_SELF'], 3) = /agora which is needed for URI used in redirection
	require_once P_ROOT.DS.'includes'.DS.'init.php';
	// if($_SERVER["HTTPS"] != "on"){//code to switch to https
	//     header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
	//     exit();
	// }

	Chat::DisplayMessagesInGame();
?>
