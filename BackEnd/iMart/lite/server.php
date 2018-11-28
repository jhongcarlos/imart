<?php 
session_start();
$db = mysqli_connect('localhost','root','','imart');
$errors = '';

if (isset($_POST['addstock'])) {
  $product = $_POST['product'];
  $add = $_POST['number'];
  $sum = $_SESSION['sum'] + $add;
  $sql = mysqli_query($db, "UPDATE tbl_products SET stock = '$sum' WHERE name = '$product'");
  if ($sql) {
    echo "<script>alert('Stock Added!')</script>";
  }
  else{
    echo "<script>alert('Error!')</script>";
  }
}
if (isset($_POST['addproduct'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $brand = $_POST['brand'];
  $category = $_POST['category'];
  $unit = $_POST['unit'];
  $stock = $_POST['stock'];

  $image = $_FILES['file']['tmp_name'];
    $get = file_get_contents($image);
    $data = base64_encode($get);

    $sql = mysqli_query($db, "INSERT INTO `tbl_products` (`id`, `name`, `description`, `price`, `image`,`brand`, `Category`,`unit`, `stock`) VALUES (NULL, '$name', '$description', '$price', '$data','$brand', '$category','$unit', '$stock');");
    if ($sql) {
      echo "<script>alert('Product Added!')</script>";
    }
    else{
      echo "<script>alert('Error!')</script>";
    }
}
if (isset($_POST['approve'])) {
  require_once('phpMailer.php');
  $id = $_POST['id'];
  $_SESSION["id"] = $id;
  $_SESSION['email'] = $_POST['email'];

  $sql = mysqli_query($db, "UPDATE tbl_orders SET status = 'Ok' WHERE id = '$id'");
   phpMailerGMAIL();
} 
  //echo '<script>parent.window.location.reload(true);</script>';

if (isset($_POST['process'])) {
  require_once('phpMailer.php');
  $id = $_POST['id'];

  $_SESSION["id"] = $id;

  $_SESSION['email'] = $_POST['email'];

  $sql = mysqli_query($db, "UPDATE tbl_orders SET status = 'Processing' WHERE id = '$id'");
  phpMailerGMAIL1();
  // echo '<script>parent.window.location.reload();</script>';

}
if (isset($_POST['reject'])) {
  require_once('phpMailer.php');
  $id = $_POST['id'];

  $_SESSION["id"] = $id;

  $_SESSION['email'] = $_POST['email'];

  $sql = mysqli_query($db, "UPDATE tbl_orders SET status = 'Rejected' WHERE id = '$id'");
  phpMailerGMAIL2();
  // echo '<script>parent.window.location.reload();</script>';

}
if (isset($_POST['prod_delete'])) {
  $id = $_POST['id'];
  $sql = mysqli_query($db, "DELETE FROM `tbl_products` WHERE id = '$id'");
  if ($sql) {
    echo "<script>alert('Product deleted')</script>";
  }
}

if (isset($_POST['reg_user'])) {

  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $position = mysqli_real_escape_string($db, $_POST['position']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  if ($password_1 != $password_2) {
  $errors = "<small class='text-danger'>Password does not match</small";
  }

  $user_check_query = "SELECT * FROM tbl_backend_users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['email'] === $email) {
      array_push($errors, "<small class='text-danger'>Email already exists</small>");
    }
  }
    $password = md5($password_1);
    

    $query = "INSERT INTO tbl_backend_users (fname, lname, email, position,status, password) 
          VALUES('$fname', '$lname', '$email','$position','Approved', '$password');";
          $ins = mysqli_query($db, $query);
          if ($ins) {
            $_SESSION['email'] = $email;
             header('location: index.php');
          }
      // $query= "INSERT INTO tblaudit VALUES('$auditname','$time','$date','Registered')";
   
  }
  if (isset($_POST['login_user'])) {
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password = mysqli_real_escape_string($db, $_POST['password']);

      $password = md5($password);
      $query = "SELECT * FROM tbl_backend_users WHERE email='$email' and password = '$password' AND status = 'Approved'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
      $_SESSION['email'] = $email;
      $sql = mysqli_query($db, "SELECT * FROM tbl_backend_users WHERE email = '".$_SESSION['email']."'");
            while ($r= mysqli_fetch_assoc($sql)) {
              $_SESSION['n'] = $r['fname'] . " " . $r['lname'] . " (" . $r['position'] . ") " . "  IMGS - 00000".$r['id'];
              $_SESSION['position'] = $r['position'];
    }
    header('location: index.php');
    
}
else{
      $errors = "<code>Invalid email or password</code>";
    }
}
if (isset($_POST['login_admin'])) {
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password = mysqli_real_escape_string($db, $_POST['password']);

    //   $password = md5($password);
      $query = "SELECT * FROM tbl_admin WHERE email='$email' and password = '$password'";
      $results = mysqli_query($db, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['n'] = "Admin";
    $_SESSION['email'] = "admin";
    $_SESSION['position'] = "Admin";
    header('location: index.php');
    
}
else{
      $errors = "<code>Invalid email or password</code>";
    }
}
if (isset($_POST['up_price'])) {
  $product = $_POST['product'];
  $price = $_POST['update_price'];

  $sql = mysqli_query($db, "UPDATE tbl_products SET price = '$price' WHERE name = '$product'");
  if ($sql) {
    echo "<script>alert('Product Price Updated!')</script>";
  }
}
if (isset($_POST['user_approve'])) {
  $id = $_POST['id'];

  $sql = mysqli_query($db, "UPDATE tbl_backend_users SET status = 'Approved' WHERE id = '$id'");
  if ($sql) {
    echo "<script>alert('Approved!')</script>";
  }
}
 ?>