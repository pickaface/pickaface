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

  if(isset($_SESSION["message"])){
    $session_message = $_SESSION["message"];
    echo "<script>function sessionAlert(){alert('" . $session_message . "');}</script>";
  }

 require_once 'navbar.php';
?>
     <!-- Code for type of Signin -->

<?php

if(isset($_POST['submit'])){

  $email=$_POST['email'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  $type=$_POST['type'];

  // verify_email_and_instantiate($email);
  // User::verify_password_and_instantiate($password);

  // $con=mysqli_connect("localhost","pafanuser",$db_password,"pafandb");
  // $query="SELECT * FROM login WHERE username='$username' AND password='$password' AND type='$type'";
  //
  // $result=mysqli_query($con, $query);
  //
  // while ($row=mysqli_fetch_assoc($result)) {
  //     // var_dump($row);
  //     // exit();
  //     if($row['username']==$username && $row['password']==$password && $row['type']=='Admin'){
  //         // echo '..'.DS."admin".DS."admin.php";
  //          header("Location: ../admin/admin.php");
  //   }elseif ($row['username']==$username && $row['password']==$password && $row['type']=='User') {
  //         echo '..'.DS."frontend".DS."home.php";

  //   }
  // }
  //
  // }


  $query = "SELECT * FROM login WHERE username='$username' AND password='$password' AND type='$type'";
  $result = $db->my_query($query);
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $count = 0;
  while ($row) {
      $count++;
      if($row['username']==$username && $row['password']==$password && $row['type']=='Admin'){
          // echo '..'.DS."admin".DS."admin.php";
          header("Location: ../admin/admin.php");
          echo $count;
          }elseif ($row['username']==$username && $row['password']==$password && $row['type']=='User') {
                  // echo '..'.DS."frontend".DS."home.php";
                  header("Location: ../frontend/home.php");

                }
              }
        }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>pick-a-face-and-nick</title>
    <script defer src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
    <link rel="stylesheet" href=<?php echo "..".DS."styles".DS."onloadstyle.css";?>>
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
                  <div class="logo"><a href="home.php"><img src="../assets/vitalimages/logo.gif" id="logo" alt="logo..." width="50" height="55"></a></div>
                  <div class="menu">
                      <?php echo $html;?>
                  </div>
                  <div class="user">
                      <ul>
                          <input type="text" name="search" placeholder="Search">
                          <i class="fas fa-search"></i>
                          <li>
                            <input type="button" id="signinModalBtn" href="#" value="Signin" />
                          </li>
                          <div id="signinModal" class="signinmodal">
                            <div class="signinmodal-content">
                                <div class="signinmodal-header">
                                    <h4>PickAFace Signin Form</h4>
                                </div>
                                <div class="signinmodal-body">
                                    <form method="POST" >
                                      <input type="email" name="email" placeholder="Email" required id="email"><br><br>
                                      <input type="username" name="username" id="username" required placeholder="nickname.."><br><br>
                                      <input type="password" name="password" id="password" placeholder="Password" required><br><br>
                                      <p>
                                          <select id = "mytype" name="type">
                                            <option value = "User">User</option>
                                            <option value = "Admin">Admin</option>
                                          </select>
                                       </p>
                                      <!-- <input type="number" name="admin_signin_pin" placeholder="PIN" required><br><br> -->
                                      <button type="submit" name="submit"  class="signup-button">Signin</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                          <li><a href="#">SignOut</a></li>

                      </ul>
                  </div>
              </nav>
          </header>

          <!-- Onload function  -->
          <div id="overlay_face" class="onloadClass">
          <div class="onload_content" onload="onloadFunction">
            <div class="onload_header">
              <span id="close" class="onload_close">&times;</span>
              <h2>Pick a Face</h2>
            </div>

          <div class="onload_body">
<!-- slider -->
              <div class="slideshow-container" style="display:grid">
                <div id="mySlides" class="mySlides fade">
                 <div id="face" class="box"><img src="../assets/vitalimages/male_1.png" style="width:100%"></div>
                  <div id="face" class="box"><img src="../assets/vitalimages/female_1.png" style="width:100%"></div>
                  <div id="face" class="box"><img src="../assets/vitalimages/male_2.png" style="width:100%"></div>
                  <div id="face" class="box"><img src="../assets/vitalimages/female_2.png" style="width:100%"></div>
                  <div id="face" class="box"><img src="../assets/vitalimages/male_1.png" style="width:100%"></div>
                </div>

            </div>

            <br>
            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span>
              <span class="dot" onclick="currentSlide(2)"></span>
              <span class="dot" onclick="currentSlide(3)"></span>
              <span class="dot" onclick="currentSlide(3)"></span>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            </div>

            <div class="onload_footer">
              <h2>Footer</h3>
            </div>

            </div>
            </div>

            <!-- Pick a Nick -->
            <div id="overlay_nick" class="overlayNick">
            <div id="content" class="onload_content">
            <div class="onload_header">
              <span id="close" class="nick_close">&times;</span>
              <h2>Pick a Nick</h2>
            </div>

            <div class="onload_body">

                <div class="form">
                  <form id="form" action="index.php" method="post">
                    Pick a Name: <input type="text" id="name" placeholder="Nick...">
                    <input id="button1" type="button" value="submit">
                    <!-- <button id="button" type="button">Pick</button> -->
                  </form>
                </div>
            </div>

            <div class="onload_footer">
              <h2>Footer</h3>
            </div>
            </div>

          <!-- Onload function -->
      </div>

      <!-- <div class="visible-contents">
        <header>
          <div class="top-grid">
            <?php if (isMobileDevice()){ ?>
              <div class="navbar-img-1-div">
                <img id="navbar-img-1" src=<?php echo ".." . DS . "assets" . DS . "vitalimages" . DS . "fcon.png"; ?>  alt="Pick a Face and Nick"
                ><h2><?php $toshow = substr(basename($_SERVER["PHP_SELF"]), 0, -4); if($toshow == "home"){echo "PickAFaceAndNick";}else{echo $toshow;}?></h2>
              </div>
            <?php }else{ ?>
              <div class="navbar-img-1-div">
                <nav>
                  <img id="navbar-img" src=<?php echo ".." . DS . "assets" . DS . "vitalimages" . DS . "logo.png"; ?>  alt="Pick a Face and Nick">
                  <?php echo $html;?>
                </nav>
              </div>
            <?php } ?>



        </header>
      </div> -->
