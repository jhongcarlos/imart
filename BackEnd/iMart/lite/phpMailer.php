<?php
require_once("PHPMailer/src/Exception.php");
require_once ('PHPMailer/src/PHPMailer.php');
require_once ('PHPMailer/src/SMTP.php');

// GMAIL AREA -------------------------

function phpMailerGMAIL(){


// $UserEmail = $_SESSION['email'];
  $UserEmail = $_SESSION['email'];

    
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
      $mail->Subject = 'Your order has been approved!';
    //   $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically

$db = mysqli_connect('localhost','root','','imart');
$getord = mysqli_query($db,"SELECT * from tbl_orders WHERE id = '".$_SESSION["id"]."'");

    if($g = mysqli_fetch_assoc($getord)){

    $orders = $g["order_items"];

      $body = '
This is iMart Grocery Shopper
<br>
Your order has been approved!<br>
We are delivering your order. Please prepare cash for payment. These are your orders:<br><br>

<table align="center" border="1">
                                                                <tr>
                                                                <th><b>Orders</b></th>
                                                                <th><b>Quantity</b></th>
                                                                <th><b>Price</b></th>
                                                                <th><b>Subtotal</b></th>
                                                                </tr>
                                                                <tr>
                                                                <td>'.$g["order_items"].'</td> 
                                                                <td>'.$g["qty"].'</td> 
                                                                <td>'.$g["price"].'</td>
                                                                <td>'.$g['subtotal'].'</td>
                                                                </tr>
                                                                <tr>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td><h2><b>Total</b>: '.$g["total"].'</h2> </td>
                                                                </tr>
                                                                </table>

<br>
Your order id is: IMGS - 00000'.$_SESSION['id'].' 
<br><br>

Thanks,<br>
iMart
';
}

        $mail->MsgHTML($body);
        $mail->Send();
      
}
function phpMailerGMAIL1(){


// $UserEmail = $_SESSION['email'];
  $UserEmail = $_SESSION['email'];

    
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
      $mail->Subject = 'Your order has been processed!';
    //   $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically

$db = mysqli_connect('localhost','root','','imart');
$getord = mysqli_query($db,"SELECT * from tbl_orders WHERE id = '".$_SESSION["id"]."'");

    if($g = mysqli_fetch_assoc($getord)){

    $orders = $g["order_items"];

      $body = '
This is iMart Grocery Shopper
<br>
Your order has been processed!<br>

These are your orders : <br><br>

'.$orders.'

<br>
Your order id is: IMGS - 00000'.$_SESSION['id'].' 
<br><br>

Thanks,<br>
iMart
';
}

        $mail->MsgHTML($body);
        $mail->Send();
      
}
function phpMailerGMAIL2(){


// $UserEmail = $_SESSION['email'];
  $UserEmail = $_SESSION['email'];

    
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
      $mail->Subject = 'Your order has been rejected!';
    //   $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically

$db = mysqli_connect('localhost','root','','imart');

      $body = '
This is iMart Grocery Shopper
<br>
Your order has been declined because of this possible reasons:<br><br>

-Location is out of coverage <br>
-No available shopper <br>

<br><br>

Thanks,<br>
iMart
';

        $mail->MsgHTML($body);
        $mail->Send();
      
}
?>