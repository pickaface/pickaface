<?php
/**
 *The Session class is resposible for fuctions like login
 *logout
 */
 class Session {

   function __construct(){
     session_start();
   }

   public function is_signed_in(){
     return isset($_SESSION["is_signed_in"]) ? $_SESSION["is_signed_in"] : false;
   }

   public function signin($user){
     $_SESSION["is_signed_in"] = true;
     $_SESSION["current_user"] = serialize($user);
   }

   public function signout(){
     unset($_SESSION["is_signed_in"]);
     unset($_SESSION["current_user"]);
     unset($_SESSION["promo_code"]);
     //session_destroy();//this instructon added now
     //session_unset();//this instructon added now
   }
   public function save_last_ativity_time(){
     $_SESSION["last_activity_time"] = time();
   }

   public function trigger_timeout($timeout_value){
     if(!isset($_SESSION["last_activity_time"]) || time() - $_SESSION["last_activity_time"] > $timeout_value){
       $this->signout();
     }
   }



 }
$my_session = new Session();
?>
