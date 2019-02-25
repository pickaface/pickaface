<?php

if ( isset( $_REQUEST ) && !empty( $_REQUEST ) ) {
 if (
 isset( $_REQUEST['phoneNumber'], $_REQUEST['carrier'], $_REQUEST['smsMessage'] ) &&
  !empty( $_REQUEST['phoneNumber'] ) &&
  !empty( $_REQUEST['carrier'] )
 ) {
  $message = wordwrap( $_REQUEST['smsMessage'], 70 );
  $to = $_REQUEST['phoneNumber'] . '@' . $_REQUEST['carrier'];
  $header = 'From: Zebbox <no-reply@zebbox.zeb>'. "\r\n";
  $header .= 'X-Mailer: PHP/'.phpversion();
  mail( $to, '', $message, $header);
  print 'Message was sent to ' . $to;
 } else {
  print 'Not all information was submitted.';
 }
}

?>
<!DOCTYPE html>
 <head>
   <meta charset="utf-8" />
  </head>
  <body>
   <div id="container">
    <h1>Sending SMS to Mobile</h1>
    <form action="" method="post">
     <ul>
      <li>
       <label for="phoneNumber">Phone Number</label><br>
       <input type="text" name="phoneNumber" id="phoneNumber" /><br></li>
      <li>
      <label for="carrier">Carrier</label><br>
       <input type="text" name="carrier" id="carrier" /><br>
      </li>
      <li>
       <label for="smsMessage">Message</label><br>
       <textarea name="smsMessage" id="smsMessage" cols="30" rows="5"></textarea><br>
      </li>
     <li><input type="submit" name="sendMessage" id="sendMessage" value="Send Message" /><br></li>
    </ul>
   </form>
  </div>
 </body>
