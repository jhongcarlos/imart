<?php 
  session_start();
  $db = mysqli_connect('localhost','root','','imart');
  if (isset($_POST['all'])) {
    $_SESSION['category'] = "all";
    header('location: order.php');
  }
  if (isset($_POST['bread'])) {
    $_SESSION['category'] = "bread";
    header('location: order.php');
  }
  if (isset($_POST['beverages'])) {
    $_SESSION['category'] = "beverages";
    header('location: order.php');
  }
  if (isset($_POST['protein'])) {
    $_SESSION['category'] = "protein";
    header('location: order.php');
  }
  if (isset($_POST['dairy'])) {
    $_SESSION['category'] = "dairy";
    header('location: order.php');
  }
  if (isset($_POST['grains'])) {
    $_SESSION['category'] = "grains";
    header('location: order.php');
  }
  if (isset($_POST['snacks'])) {
    $_SESSION['category'] = "snacks";
    header('location: order.php');
  }
  if (isset($_POST['others'])) {
    $_SESSION['category'] = "others";
    header('location: order.php');
  }
  if (isset($_POST['history'])) {
    $_SESSION['category'] = "history";
    header('location: history.php');
  }



  if (isset($_POST['reserve'])) {

      $userid = $_SESSION["user_id"];
      $itemID = $_POST["itemID"];

      $selitem = mysqli_query($db,"SELECT * FROM tbl_reserveitem WHERE userid = '$userid' AND prod_id = '$itemID'");

      if(mysqli_num_rows($selitem) == 1){
        //if item already added
      }
      else{
      mysqli_query($db,"INSERT into tbl_reserveitem VALUES ('','$userid','$itemID')");
      }

      echo "<script>alert('Item Reserved')</script>";
      header('location: saveditems.php');

  }


  if (isset($_POST['saved'])) {
    
    if(empty($_SESSION["user_id"])){    
      header('location: login.php');
    }
    else{ 
      $_SESSION['category'] = "saveditem";
      header('location: saveditems.php');
    }
  }

  //LOGIN

  if(isset($_POST["btnlogin"])){
                  $email = $_POST["email"];
                  $password = $_POST["password"];


                $login = mysqli_query($db,"SELECT * FROM tbl_users WHERE email = '$email' AND pass = '$password' AND status = 'Confirmed'");

                if($num = mysqli_num_rows($login) == 1){
                    $_SESSION["email"] = $email;

                    header("location: billing.php");

                    while ($r = mysqli_fetch_assoc($login)) {
                    $_SESSION['user_id'] = $r["id"];
                  }

                }
                else{
                    echo "Try again";
                }
                
    }
    
    if(isset($_POST["btnloginPage"])){
                  $email = $_POST["email"];
                  $password = $_POST["password"];


                $login = mysqli_query($db,"SELECT * FROM tbl_users WHERE email = '$email' AND pass = '$password' AND status = 'Confirmed'");

                if($num = mysqli_num_rows($login) == 1){
                    $_SESSION["email"] = $email;

                    header("location: index.php");

                    while ($r = mysqli_fetch_assoc($login)) {
                    $_SESSION['user_id'] = $r["id"];
                  }

                }
                else{
                    echo "Try again";
                }
                
    }

                // REGISTER

          if(isset($_POST["register"])){
            
          $_SESSION['token'] = substr(str_shuffle(str_repeat("01234567890", 4)), 0, 4);
          $fname = $_POST["first_name"];
          $lname = $_POST["last_name"];
          $phone = $_POST["phone"];
          $email = $_POST["email"];
          $pass = $_POST["password"];
          $address = $_POST["address"];

          $_SESSION['em'] = $email;
          
          $_SESSION['numb'] = $phone;

          $reg = mysqli_query($db, "INSERT into tbl_users VALUES ('','$fname','$lname','$email','$pass','$phone','$address','Not Confirmed')");
            header("location: confirm.php");

        }


    if(isset($_POST["unsaved"])){
      $savedID = $_POST["item_id"];

      $uns = mysqli_query($db,"DELETE FROM tbl_reserveitem WHERE id = '$savedID'");

    }
    if (isset($_POST['logout'])) {
      $_SESSION['email'] = "";
      $_SESSION['user_id'] = "";
    }


    if (isset($_POST['verify'])) {
      $e = $_SESSION['em'];
      $num = $_POST['conf_num'];
      if ($num == $_SESSION['token']) {
      $sql = mysqli_query($db, "UPDATE tbl_users SET status = 'Confirmed' WHERE email = '$e'");
      if ($sql) {
        header("location: loginPage.php");
      }
      else{
        echo "<script>alert('Error')</script>";
      }
    }
    else{
      echo "<script>alert('Not matched')</script>";
    }  
  }
// if (isset($_POST['reserve'])) {
//     if(is_null($_SESSION["email"])){
//      header("location: order.php");
//     }
//     else{
//      $email = $_SESSION["email"];
//      $prod_id = $_POST['itemID'];
//    $seluser = mysqli_query($db,"SELECT * FROM tbl_users WHERE email = '$email'");
//         $userID = 0;
//         $prodID = 0;
//    if($u = mysqli_fetch_assoc($seluser)){
//               $userID = $u["id"];
//        }
//      $check = mysqli_query($db, "SELECT * FROM tbl_reserveitem WHERE userid = '$userID' && prod_id = '$prod_id'");
//      if (mysqli_num_rows($check) < 1) {
//          $sql = mysqli_query($db, "INSERT INTO `tbl_reserveitem` (`id`, `userid`, `prod_id`) VALUES (NULL, '$userID', '$prod_id')");
//          if ($sql) {
//            echo "<script>alert('Item Reserved')</script>";
//          }
//      }
//    else{
//        echo "<script>alert('Item Already Reserved')</script>";
//      }
//  }
// }                          
 ?>