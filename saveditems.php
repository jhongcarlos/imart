<?php   ob_start();
  include('server.php');
  if (empty($_SESSION['email'])) {
    header('Location:login.php');
  }
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
              <a class="nav-link js-scroll-trigger btn btn-warning" href="mycart.php">Cart</a>
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
            <a class="list-group-item"><button name="all" class="btn btn-warning btn-block">All</button></a>
            <a class="list-group-item"><button name="fruit" class="btn btn-warning btn-block">Fruits</button></a>
            <a class="list-group-item"><button name="vegetables" class="btn btn-warning btn-block">Vegetables</button></a>
            <a class="list-group-item"><button name="protein"class="btn btn-warning btn-block">Protein</button></a>
            <a class="list-group-item"><button name="dairy" class="btn btn-warning btn-block">Dairy</button></a>
            <a class="list-group-item"><button name="grains" class="btn btn-warning btn-block">Grains</button></a>
            <a class="list-group-item"><button name="snacks" class="btn btn-warning btn-block">Snacks</button></a>
              <a class="list-group-item"><button name="saved" class="btn btn-warning btn-block fa fa-heart"> View Saved Items</button></a>
                <a class="list-group-item"><button name="history" class="btn btn-warning btn-block">History (Orders)</button></a>
                <a class="list-group-item"><button name="logout" class="btn btn-warning btn-block">Logout</button></a>
            </form>
            
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9 mt-5">

        <div class="row">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Action</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
              </tr>
            </thead>
            <tbody>

              <?php 

               $userid = $_SESSION["user_id"];
              $resItem = mysqli_query($db,"SELECT * FROM tbl_reserveitem WHERE userid = '$userid' ORDER BY id DESC ");

              while($r = mysqli_fetch_assoc($resItem)){

                  $selitem = mysqli_query($db,"SELECT * FROM tbl_products WHERE id = '".$r["prod_id"]."'");
        

        if($i = mysqli_fetch_assoc($selitem)){
                $string = $i['image'];
                $img = str_replace('data:image/jpeg;base64,', '', $string);
                $data = base64_decode($img);

                
              ?>

              <tr>

                <th><form action="" method="POST">
                  <input type="hidden" name="item_id" value="<?php echo $r["id"]; ?>">
                  <button type="submit" name="unsaved" class="btn btn-secondary">Remove</button>
                </form><br>
              <form action="" method="GET">
                    <button class="btn btn-warning" onclick="alert('Added to cart')"><a class="btn btn-warning" href="mycart.php?id=<?php echo $r['prod_id']; ?>&action=add&atc=1" name="atc" id="atc">Add to cart</a></button>
                  </form></th></th>

                <th scope="row"><?php echo $i["name"]; ?></th>
                <td><?php echo $i["price"]; ?></td>
                <td><img class="card-img-top" style="height: 100px;width: 60%" src="<?= 'data:image/jpeg;base64,'.base64_encode( $data ).'' ?>" alt=""></td>
                <td><?php echo $i["Category"]; ?></td>

              </tr>
             
             <?php } } ?>

            </tbody>
          </table>
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