<?php 
  ob_start();
  include('server.php');

  $sql = mysqli_query($db,"SELECT * FROM tbl_products");
  $num = mysqli_num_rows($sql);

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
        <a class="navbar-brand js-scroll-trigger" href="#page-top">iMart</a>
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
              <a class="nav-link js-scroll-trigger btn btn-warning" href="order.php">Order</a>
            </li>
            <?php   
              if (empty($_SESSION['cart'])) {
                $c_cart = 0;
              }
              else{
                $c_cart=count($_SESSION['cart']);
              }
             ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="mycart.php">Cart - <?= $c_cart; ?></a>
            </li>
            <?php 
              if (empty($_SESSION['email'])) {
                ?>
                <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
            </li>
                <?php
              }
              else{}
             ?>
            
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
            <a class="list-group-item"><button name="bread" class="btn btn-warning btn-block">Breads</button></a>
            <a class="list-group-item"><button name="beverages" class="btn btn-warning btn-block">Beverages</button></a>
            <a class="list-group-item"><button name="protein"class="btn btn-warning btn-block">Protein</button></a>
            <a class="list-group-item"><button name="dairy" class="btn btn-warning btn-block">Dairy</button></a>
            <a class="list-group-item"><button name="grains" class="btn btn-warning btn-block">Grains</button></a>
            <a class="list-group-item"><button name="snacks" class="btn btn-warning btn-block">Snacks</button></a>
            <a class="list-group-item"><button name="others" class="btn btn-warning btn-block">Others</button></a>
            <?php if (!empty($_SESSION['email'])) {
              # code...?>
            <a class="list-group-item"><button name="saved" class="btn btn-warning fa fa-heart btn-block"> View Saved Items</button></a>
            <a class="list-group-item"><button name="history" class="btn btn-warning btn-block">History (Orders)</button></a>
              <a class="list-group-item"><button name="logout" class="btn btn-warning btn-block">Logout</button></a>
              <?php
            } ?>
            
            </form>
          </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="img/portfolio/fruits.jpg" style="width: 100%;height: 350px;" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/portfolio/vege.jpg" style="width: 100%;height: 350px;" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/portfolio/protein.jpg" style="width: 100%;height: 350px;" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/portfolio/dairy.jpg" style="width: 100%;height: 350px;" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/portfolio/grains.jpg" style="width: 100%;height: 350px;" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/portfolio/snacks.jpg" style="width: 100%;height: 350px;" alt="First slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>


          
          <form action="" method="post" class="form-group">
            <div class="row">
              <div class="col-md-10">
                <input type="text" name="search" class="form-control" placeholder="Search">
              </div>
              <div class="col-md-2">
                <button class="btn btn-info " name="btn_search">Search</button>
              </div>
            </div>
          </form>
          <div class="row">

             
            <?php 
            $sql = '';
            if (empty($_SESSION['category'])) {
              $_SESSION['category'] = "all";
            }
              if ($_SESSION['category'] == "all") {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products WHERE stock != 0");
                $_SESSION['col'] = "btn-danger";
              }
              if ($_SESSION['category'] == "bread") {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products WHERE Category = 'Bread' AND stock != 0");
                $_SESSION['col'] = "btn-danger";
              }
              elseif ($_SESSION['category'] == "beverages") {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products WHERE Category = 'Beverages' AND stock != 0");
                $_SESSION['col'] = "btn-danger";
              }
              elseif ($_SESSION['category'] == "protein") {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products WHERE Category = 'Protein' AND stock != 0");
                $_SESSION['col'] = "btn-danger";
              }
              elseif ($_SESSION['category'] == "dairy") {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products WHERE Category = 'Dairy' AND stock != 0");
                $_SESSION['col'] = "btn-danger";
              }
              elseif ($_SESSION['category'] == "grains") {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products WHERE Category = 'Grain' AND stock != 0 ");
                $_SESSION['col'] = "btn-danger";
              }
              elseif ($_SESSION['category'] == "snacks") {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products WHERE Category = 'Snack' AND stock != 0");
                $_SESSION['col'] = "btn-danger";
              }
               elseif ($_SESSION['category'] == "others") {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products WHERE Category = 'Others' AND stock != 0");
              }
              else{


              if (isset($_POST['btn_search'])) {
                $search = $_POST['search'];
                $sql = mysqli_query($db, "SELECT * FROM tbl_products WHERE name LIKE '%{$search}%'");
              }
             if (isset($_POST['one'])) {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products LIMIT 1,10");
              }
              elseif (isset($_POST['two'])) {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products LIMIT 11,10");
              }
              elseif (isset($_POST['three'])) {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products LIMIT 21,10");
              }
              elseif (isset($_POST['four'])) {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products LIMIT 31,10");
              }
              elseif (isset($_POST['five'])) {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products LIMIT 41,10");
              }
              elseif (isset($_POST['six'])) {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products LIMIT 51,10");
              }
              elseif (isset($_POST['seven'])) {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products LIMIT 61,10");
              }
              elseif (isset($_POST['eight'])) {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products LIMIT 71,10");
              }
              elseif (isset($_POST['nine'])) {
                $sql = mysqli_query($db, "SELECT * FROM tbl_products LIMIT 80,10");
              }

              else{
                $sql = mysqli_query($db, "SELECT * FROM tbl_products WHERE stock != 0");
              }
              }
              while ($row = mysqli_fetch_assoc($sql)) {


                $string = $row['image'];
                $img = str_replace('data:image/jpeg;base64,', '', $string);
                $data = base64_decode($img);
             ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" style="height: 150px;width: 100%" src="<?= 'data:image/jpeg;base64,'.base64_encode( $data ).'' ?>" alt=""></a>
                <div class="card-body">
                  <p style="text-align: center;"><?= "IMGS - 00000".$row['id'] ?></p>
                  <h4 class="card-title">
                    <a href="#"><?= $row['name']; ?></a>
                  </h4>
                  <h5>₱ <?= $row['price'] . " / " .$row['unit']; ?></h5>
                  <small><?= $row['Category']; ?></small>
                  <p class="card-text"><?= $row['description']; ?></p>
                </div>
                <div class="card-footer" align="center">

                  <!-- -==================== Reserve =================== -->
                  <form action="" method="post">
                    <input type="hidden" name="itemID" value="<?= $row['id']; ?>">
                    <button name="reserve" class="btn btn-warning fa fa-heart btn-block"> Save Item</button><br><hr>
                  </form>

                  <form action="" method="GET">
                    <a class="btn btn-warning btn-block" href="mycart.php?id=<?php echo $row['id']; ?>&action=add&atc=1" name="atc" id="atc">Add to cart</a>
                  </form>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>
          <!-- /.row -->
          <form action="" method="post">
          <div class="row" align="center" style="margin-bottom: 10px">
            <div class="col-md-12">
              <button class="btn btn-info" name="one">1</button>
              <?php if ($num > 10 && $num < 100) { ?>
              <button class="btn btn-info" name="two">2</button>
            <?php }else{}
            if ($num > 21 && $num < 100) { ?>
              <button class="btn btn-info" name="three">3</button>
              <?php }else{}
            if ($num > 31 && $num < 100) { ?>
              <button class="btn btn-info" name="four">4</button>
              <?php }else{}
            if ($num > 41 && $num < 100) { ?>
              <button class="btn btn-info" name="five">5</button>
              <?php }else{}
            if ($num > 51 && $num < 100) { ?>
              <button class="btn btn-info" name="six">6</button>
              <?php }else{}
            if ($num > 61 && $num < 100) { ?>
              <button class="btn btn-info" name="seven">7</button>
              <?php }else{}
            if ($num > 71 && $num < 100) { ?>
              <button class="btn btn-info" name="eight">8</button>
              <?php }else{}
            if ($num > 81 && $num < 100) { ?>
              <button class="btn btn-info" name="nine">9</button>
            <?php }else{} ?>
            </div>          
          </div>
          </form>
        </div>
        <!-- /.col-lg-9 -->
      </div>
      <!-- /.row -->
    </div>
   

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; iMart</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript">
$(function() {
    $('#text-search').bind('keyup change', function(ev) {
        // pull in the new value
        var searchTerm = $(this).val();

        // remove any old highlighted terms
        $('body').removeHighlight();

        // disable highlighting if empty
        if ( searchTerm ) {
            // highlight the new term
            $('body').highlight( searchTerm );
        }
    });
});
</script>
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
<?php ob_flush(); ?>