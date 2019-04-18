<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('P_ROOT') ? null : define('P_ROOT', dirname(dirname(dirname(__FILE__))));
//dirname(dirname(dirname(__FILE__))) = /media/sf_zebbox/agora which is requied for the
//following line of code
//dirname($_SERVER['PHP_SELF'], 3) = /agora which is needed for URI used in redirection
// require_once P_ROOT.DS.'includes'.DS.'init.php';
?>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require_once P_ROOT.DS.'email'.DS.'vendor'.DS.'autoload.php';//Load Composer's autoloader

function send_my_mail($email , $subject , $body_text){
  $mail = new PHPMailer(true);
  try {

      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'phani.sidhanthi03@gmail.com';//Enter your username
      $mail->Password = 'padsnk786';//Enter your password
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom('phani.sidhanthi03@gmail.com');
      $mail->addAddress($email, 'Phani');//$mail->addAddress($email, 'Mzeb');
      $mail->addReplyTo('phani.sidhanthi03@gmail.com', 'Information');

      $mail->isHTML(true);
      $mail->Subject = $subject;
      $mail->Body    = $body_text;
      $mail->AltBody = $body_text;

      $mail->send();
      return 'Message has been sent';
  } catch (Exception $e) {
      // throw new Exception('Message could not be sent. Mailer Error: (Give your your username password)');
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
  }
}

 send_my_mail("4153737545@tmomail.net" , "Testing through PHPMailer " , "Hello!!!This is Phani! If you get this msg. Whatsapp me. ");
 ?>
