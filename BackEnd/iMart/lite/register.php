<?php include('server.php');
if (!isset($_SESSION['email'])) {
    header('location: login.php');
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>iMart</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
   </head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->
                            <img src="../assets/images/groceries.png" alt="homepage" class="light-logo" />
                        </b><span>
                         <b class="text-white">iMart</b></span> </a>
                </div>
                 </nav>
        </header>
          <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="fa fa-database"></i><span class="hide-menu">Products</span></a>
                        </li>
                        <?php if ($_SESSION['position'] == "Staff") {}
                            else{ ?>
                        <li> <a class="waves-effect waves-dark" href="users.php" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Users</span></a>
                        </li>
                    <?php }?>

                       
                    <?php if ($_SESSION['position'] == "Staff") {}
                            else{?>
                        <li> <a class="waves-effect waves-dark" href="addproduct.php" aria-expanded="false"><i class="fa fa-plus"></i><span class="hide-menu">Add Products</span></a>
                        </li>
                    <?php } ?>
                        <li> <a class="waves-effect waves-dark" href="orders.php" aria-expanded="false"><i class="fa fa-shopping-cart"></i><span class="hide-menu">Orders</span></a>
                        </li>

                        <?php 
                            if ($_SESSION['email'] == "admin") {
                                ?>
                                <li> <a class="waves-effect waves-dark" href="register.php" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Add Staff/Manager</span></a></li>
                                <?php
                            }
                         ?>
                         <li> <a class="waves-effect waves-dark" href="feedback.php" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Feedbacks</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <div class="sidebar-footer">
                <a href="login.php" class="link" data-toggle="tooltip" title="Logout"><button class="btn btn-info">Logout</button></i></a> </div>
            <!-- End Bottom points-->
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Add Staff/Manager</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
                <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header" style="text-align: center;"><h2>Register an Account</h2></div>
      <div class="card-body">
        <form method="post" action="register.php" style="padding: 20px">
          <?= $errors; ?>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="fname">First Name</label>
                <input class="form-control" name="fname" type="text" required placeholder="First Name">
              </div>
              <div class="col-md-6">
                <label for="lname">Last Name</label>
                <input class="form-control" name="lname" type="text" required placeholder="Last Name">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-12">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" name="email" type="email" required aria-describedby="emailHelp" placeholder="Enter email">
          </div></div></div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-12">
            <label for="exampleInputEmail1">Position</label>
            <select class="form-control" name="position">
              <option>Staff</option>
              <option>Manager</option>
            </select>
          </div></div></div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" minlength="8" maxlength="16" required name="password_1" type="password" placeholder="Password">
              </div>
              <div class="col-md-6" style="margin-bottom: 10px">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" minlength="8" maxlength="16" required name="password_2" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <div class="col-md-12">
          <button type="submit" class="btn btn-info btn-block" name="reg_user" ">Register</button></div>
        </form>
        </div>
    </div>
  </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
                </div>
                 <footer class="footer">
                © 2018 iMart
            </footer>
           </div>
    </div>
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>
