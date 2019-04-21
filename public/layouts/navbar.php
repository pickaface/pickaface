<?php
$current_page = basename($_SERVER['PHP_SELF']);

$html = '
        <ul>
        <li><a id="change_text" class="current" href="home.php">PickAFaceAndNick</a></li>
        <li><a class="" href="pick.php">Pick</a></li>
        <li><div class="dropdown"><a href="#" class="dropdownBtn">Game</a><div class="dropdown-content"><a id="gameMini" href="#">Tick Tac Toe</a><a href="#">Chess</a></div></div></li>
        <li><a class="" href="contact.php">Contact</a></li>
        <li><a class="" href="signin.php" id="signin_for_php">Signin</a></li>
        </ul>
        ';

$dom = new DOMDocument();
$dom->loadHTML($html);
$items = $dom->getElementsByTagName('a');

if($current_page === "signup.php"){
  $dom->getElementById("signin_for_php")->nodeValue = "Signup";
  $dom->getElementById("signin_for_php")->setAttribute("href", "signup.php");
  $html = $dom->saveHTML();
}

if($current_page === "signout.php"){
  $dom->getElementById("signin_for_php")->nodeValue = "Signout";
  $dom->getElementById("signin_for_php")->setAttribute("href", "signout.php");
  $html = $dom->saveHTML();
}

foreach ($items as $item) {
  if($item->getAttribute("href") === $current_page){
    $item->setAttribute("class", "thisPage");
    $html = $dom->saveHTML();
  }
}

if(1/*$my_session->is_signed_in()*/){
  $dom->getElementById("signin_for_php")->nodeValue = "Signout";
  $dom->getElementById("signin_for_php")->setAttribute("href", "signout.php");//new
  $html = $dom->saveHTML();
}
//
// //all this if block was newly added probably wrongly that is why commented
// if(!$my_session->is_signed_in()){
//   $dom->getElementById("signin_for_php")->nodeValue = "Signin";
//   $dom->getElementById("signin_for_php")->setAttribute("href", "signin.php");
//   $html = $dom->saveHTML();
// }

?>
