<?php
include 'vendor/autoload.php';
use Twilio\Rest\Client;

if(isset($_POST['mobile']) && isset($_POST['msg'])) {

  //twilio
  $sid = 'ACf68fc243fa4ffc6dfa5c9374cfdfd170';
  $token = '4fe61b1b22969e7c70fb6912c768656e';

  try {
    $client = new Client($sid, $token);
    $message = $client->messages->create(
        $_POST['mobile'], array(
              'from' => '+13612283190',
              'body' => $_POST['msg']
        )
    );

    if ($message->sid) {
      echo "Message Sent!";
    }
  } catch (\Exception $e) {
        echo $e->getMessage();
  }
}
 ?>

 <h2> Send SMS to play Game </h2>

 <form action="" method="post">
   Enter Mobile: <br><br>
   <input type="text" placeholder="Mobile Number" name="mobile"><br><br>
   Message: <br><br>
   <textarea placeholder="Message" name="msg"></textarea><br><br>
   <button type="submit" value="Send" name="Submit">Send</button>
 </form>
