<?php


require_once("PHPMailer/src/Exception.php");
require_once ('PHPMailer/src/PHPMailer.php');
require_once ('PHPMailer/src/SMTP.php');

// GMAIL AREA -------------------------

function phpMailerGMAIL(){


// $UserEmail = $_SESSION['email'];
  $UserEmail = $_SESSION['em'];

    
    $email = "bertandmarie3@gmail.com";
    $pass = "09215564209";
    
    $mail = new  PHPMailer\PHPMailer\PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
    $mail->IsSMTP(); // telling the class to use SMTP
      $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
      $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
      $mail->Port       = 587;   // set the SMTP port for the GMAIL server
      
      $mail->Username   = $email;  // GMAIL username
      $mail->Password   = $pass;            // GMAIL password
      
      $mail->AddAddress($UserEmail);
      $mail->SetFrom($email, 'iMart Grocery Shopper');
      $mail->Subject = 'Confirm your account!';
    //   $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically

      $body = '
Thank your for registering in <b>iMart!<b><br>Your confirmation code is : <b>'.$_SESSION['token'].'</b>
<br><br>
Thanks,<br>
iMart
';
        $mail->MsgHTML($body);
        $mail->Send();
      
}
function phpMailerGMAIL1(){


// $UserEmail = $_SESSION['email'];
  $UserEmail = $_SESSION['forgot_email'];
  $forgottenEmail = $_SESSION['forgot_email'];


    
    $email = "bertandmarie3@gmail.com";
    $pass = "09215564209";
    
    $mail = new  PHPMailer\PHPMailer\PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
    $mail->IsSMTP(); // telling the class to use SMTP
      $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
      $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
      $mail->Port       = 587;   // set the SMTP port for the GMAIL server
      
      $mail->Username   = $email;  // GMAIL username
      $mail->Password   = $pass;            // GMAIL password
      
      $mail->AddAddress($UserEmail);
      $mail->SetFrom($email, 'iMart Grocery Shopper');
      $mail->Subject = 'Forgot Password!';
    //   $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically

      $db = mysqli_connect('localhost','root','','imart');
  $get = mysqli_query($db,"SELECT * from tbl_users WHERE email = '$forgottenEmail'");
  if ($res = mysqli_fetch_array($get)) {
      $body = '
Your iMart password is '.$res['pass'].'</br>
<br><br>
Thanks,<br>
iMart
';
}
        $mail->MsgHTML($body);
        $mail->Send();
      
      
}
?>