<?php   ob_start();
  include('server.php');
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iMart</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  </head>

  <body>

     <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: #000;opacity: 0.9">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Online Grocery</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#portfolio">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="order.php">Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn btn-warning">Cart</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container" style="margin-top: 50px">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">iMart</h1>
          <div class="list-group">
            <form action="" method="post">
            <a class="list-group-item"><button name="all" class="btn btn-warning">All</button></a>
            <a class="list-group-item"><button name="bread" class="btn btn-warning">Breads</button></a>
            <a class="list-group-item"><button name="beverages" class="btn btn-warning">Beverages</button></a>
            <a class="list-group-item"><button name="protein"class="btn btn-warning">Protein</button></a>
            <a class="list-group-item"><button name="dairy" class="btn btn-warning">Dairy</button></a>
            <a class="list-group-item"><button name="grains" class="btn btn-warning">Grains</button></a>
            <a class="list-group-item"><button name="snacks" class="btn btn-warning">Snacks</button></a>
            <a class="list-group-item"><button name="others" class="btn btn-warning">Others</button></a>
            <a class="list-group-item"><button name="saved" class="btn btn-warning fa fa-heart"> View Saved Items</button></a>
            <a class="list-group-item"><button name="history" class="btn btn-warning">History (Orders)</button></a>
            <?php if (!empty($_SESSION['email'])) {
              # code...?>
              <a class="list-group-item"><button name="logout" class="btn btn-warning">Logout</button></a>
              <?php
            } ?>
            
            </form>
            
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9 mt-5">

        <div class="row">
         <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">History</h4>
                                <div class="table-responsive table table-hover">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Orders</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                
                                        </tr>
                                      </thead>
                                        <tbody>
                                       
                                            <?php 
                                             $sid = $_SESSION['user_id'] ;
                                              $sql = mysqli_query($db, "SELECT * FROM tbl_orders WHERE userID = '$sid' ORDER BY id DESC");
                                              while ($r = mysqli_fetch_assoc($sql)) {
                                             ?>
                                             <tr>
                                             <td><?= $r['id']; ?></td>
                                             <td><?= $r['email']; ?></td>
                                             <td><?= 

                                             $items = $r['order_items'];

                                              ?></td>
                                             <td><?= $r['total']; ?></td>
                                             <td><?= $r['date']; ?></td>
                                             <td><?= $r['time']; ?></td>
                                           
                                             </tr>
                                             <?php 
                                                }
                                              ?>
                                        
                                    </tbody>    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
     
        </div>
        <!-- /.col-lg-9 -->

      </div> 
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <div class="modal fade" id="cart" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Cart</h4>
        </div>
        <div class="modal-body">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark" style="margin-top: 10%;">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; iMart</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

  </body>

</html>
<?php ob_end_flush(); ?>