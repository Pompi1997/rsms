<?php 
if (isset($_POST['send_message_btn'])) {
  $receiver = $_POST['receiver'];
  $subject = $_POST['subject'];
  $body = $_POST['body'];
  $sender = "From:cmsjec46@gmail.com";
  if (mail( $receiver, $subject, $body,$sender)) {
  //  echo "Email sent";
   echo '<script>alert("Response Sent to customer.")</script>';
   header('location:approved-bookings.php');
  }else{
   echo "Failed to send email. Please try again later";
  }
}
?>
		