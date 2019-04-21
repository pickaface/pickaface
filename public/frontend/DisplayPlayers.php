<?php
		defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
		defined('P_ROOT') ? null : define('P_ROOT', dirname(dirname(dirname(__FILE__))));

		require_once P_ROOT.DS.'includes'.DS.'init.php';
		// if($_SERVER["HTTPS"] != "on"){//code to switch to https
		//     header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		//     exit();
		// }

  // if(isset($_SESSION["message"])){
  //   $session_message = $_SESSION["message"];
  //   echo "<script>function sessionAlert(){alert('" . $session_message . "');}</script>";
  // }

 	// require_once 'navbar.php';
	// _set_username($_SESSION['username']);
	// _set_userid($_SESSION['userid']);
	DisplayAvailablePlayers();
?>
