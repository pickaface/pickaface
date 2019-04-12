<?php
  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('P_ROOT') ? null : define('P_ROOT', dirname(dirname(dirname(__FILE__))));
  require_once P_ROOT.DS.'includes'.DS.'init.php';


  if(isset($_SESSION["message"])){
    $session_message = $_SESSION["message"];
    echo "<script>function sessionAlert(){alert('" . $session_message . "');}</script>";
  }

  require_once '../layouts/navbar.php';
  ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>pick-a-face-and-nick</title>
      <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
      <link rel="shortcut icon" href=<?php echo "..".DS."assets".DS."vitalimages".DS."user.png";?> type="image/x-icon">
      <link rel="stylesheet" href=<?php echo "..".DS."styles".DS."mediaflex.css";?>>
      <link rel="stylesheet" href=<?php echo "..".DS."styles".DS."master.css";?>>
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131410677-1"></script> -->
      <script>
        // window.dataLayer = window.dataLayer || [];
        // function gtag(){dataLayer.push(arguments);}
        // gtag('js', new Date());
        // gtag('config', 'UA-131410677-1');
      </script>
      <!-- End Global site tag (gtag.js) - Google Analytics -->
    </head>

    <body <?php echo (isset($session_message) ? 'onload="sessionAlert()"' : null );?> >
      <div class="container">
        <!-- navigation -->
        <div class="wrapper">

            <!-- <div id="dialog"><div id="dialog_head">Testing</div><div id="dialog_body"> <button type="button" name="button" onclick="ok()">OK</button> </div></div> -->

            <header>
                <nav>
                    <div class="toggle"><i class="fas fa-bars"></i></div>
                    <div class="logo"><a href="home.php"><img src="../assets/vitalimages/logo.gif" alt="logo..." width="30" height="40"></a></div>
                    <div class="menu">
                        <?php echo $html;?>
                    </div>
                    <div class="user">
                        <ul>
                            <input type="text" name="search" placeholder="Search">
                            <i class="fas fa-search"></i>
                            <li>
                              <a href="#"> Welcome, Admin</a>
                            </li>

                            <li><a href="../frontend/home.php">SignOut</a></li>

                        </ul>
                    </div>
                </nav>
            </header>
        </div>
