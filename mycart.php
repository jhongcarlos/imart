
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
    <div style="display: none;">
<?php ob_start();
  include('server.php');

  if($_GET["atc"] == "1"){
      header("location: order.php");
  }
  
 ?></div>
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
              <a class="nav-link js-scroll-trigger" href="order.php">Order</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger btn btn-warning">Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login.php">Login</a>
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
            <?php if (!empty($_SESSION['email'])) {
              # code...?>
            <a class="list-group-item"><button name="saved" class="btn btn-warning fa fa-heart"> View Saved Items</button></a>
            <a class="list-group-item"><button name="history" class="btn btn-warning">History (Orders)</button></a>
              <a class="list-group-item"><button name="logout" class="btn btn-warning">Logout</button></a>
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

          <div class="row">
            <form action="" method="POST">
           <table class="table table-hover">

<div style="display: none;">
         <?php 
         class Item{
           var $id;
           var $img;
           var $prod_name;
           var $brand;
           var $price;
           var $unit;
           var $quantity;
          } 

if(isset($_GET['id']) && !isset($_POST['update']))  { 

    $sql = "SELECT * FROM tbl_products WHERE id = ".$_GET['id'];

    while ($asd = mysqli_fetch_array($sql)) {
      $_SESSION['qq'] = $asd['unit'];
    }
    $result = mysqli_query($db, $sql);
    $product = mysqli_fetch_object($result); 
    $item = new Item();
    $item->id = $product->id;
    $item->image = $product->image;
    $item->name = $product->name;
    $item->Category = $product->Category;
    $item->unit = $product->unit;
    $item->price = $product->price;
    $iteminstock = $product->stock;
    $item->quantity = 1;
    // Check product is existing in cart
    $index = -1;
    $cart = unserialize(serialize($_SESSION['cart'])); // set $cart as an array, unserialize() converts a string into array
    for($i=0; $i<count($cart);$i++)
        if ($cart[$i]->id == $_GET['id']){
            $index = $i;
            break;
        }
        if($index == -1) 
            $_SESSION['cart'][] = $item; // $_SESSION['cart']: set $cart as session variable
        else {
            
            if (($cart[$index]->quantity) < $iteminstock)
                 
                 $_SESSION['cart'] = $cart;
        }
}
// Delete product in cart
if(isset($_GET['index']) && !isset($_POST['update'])) {
    $cart = unserialize(serialize($_SESSION['cart']));
    unset($cart[$_GET['index']]);
    $cart = array_values($cart);
    $_SESSION['cart'] = $cart;
}
// Update quantity in cart

if(isset($_POST['update'])) {
  $arrQuantity = $_POST['quantity'];
  $cart = unserialize(serialize($_SESSION['cart']));
  for($i=0; $i<count($cart);$i++) {
     $cart[$i]->quantity = $arrQuantity[$i]; 
     $_SESSION['cart'] = $cart;
  }
 
    
}


?> 
</div>

            <tr>
              <th>Product Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Unit</th>
              <th>Category</th>
              <th>Sub-Total</th>
              <th>Action</th>
            </tr>
<div style="display: none;">
            <?php 

     $cart = unserialize(serialize($_SESSION['cart']));
     $s = 0;
     $index = 0;
    for($i=0; $i<count($cart); $i++){
        $s += $cart[$i]->price * $cart[$i]->quantity;
        $_SESSION['c_cart'] = count($cart);
        
 ?> 
</div>
   <tr>
        
        <td> <?php echo $cart[$i]->name; ?> </td>
        <td>
        <?php 
           $sel = mysqli_query($db,"SELECT * from tbl_products where id = '".$cart[$i]->id."' " );
           $r = mysqli_fetch_array($sel);



                $string = $r['image'];
                $img = str_replace('data:image/jpeg;base64,', '', $string);
                $data = base64_decode($img);

          echo '<img src="data:image/jpeg;base64,'.base64_encode( $data ).'" style="width:150px">'; ?> 



        </td>
        
        <td><?php echo "₱".$cart[$i]->price; ?></td>
        <td> <input type="number" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]" style="width: 50px;"> </td>  

        <td><?php echo $cart[$i]->unit; ?></td>
        <td><?php echo $cart[$i]->Category; ?></td>
        <td>
        <?php 
        $sel = mysqli_query($db,"SELECT * from tbl_products where id = '".$cart[$i]->id."' " );
        $row = mysqli_fetch_array($sel);
            $_SESSION['tot'] = $cart[$i]->price * $cart[$i]->quantity;
            echo "₱".$cart[$i]->price * $cart[$i]->quantity; 
        
        ?> </td> 
        <td><a class="btn btn-danger" href="mycart.php?index=<?php echo $index; ?>" onclick="return confirm('Are you sure?')" >Remove</a> </td>
   </tr>
    <?php 
        $index++;
    } ?>
    <tr>
        <td colspan="5" style="text-align:right; font-weight:bold">Total
         <input id="saveimg" type="image" src="images/save.png" name="update" alt="">
         <input type="hidden" name="update">
        </td>
        <td> <?php $_SESSION["final_total"] = $s; echo "₱".$s; ?> </td>

        <?php if ($_SESSION['final_total'] < 300) {}else{ ?>
          <td><button class="btn btn-warning" type="submit" name="btnproceed">Proceed</button></td>
        <?php } ?>
      
    </tr>

          </table>
</form>
          </div>
          <!-- /.row -->

          <?php 
            if(isset($_POST["btnproceed"])){

              if(is_null($_SESSION["email"])){
                header("location: login.php");
              }else{
                  if ($_SESSION['final_total'] <= 50000 && $_SESSION['final_total'] > 300) {
                    if($_SESSION["user_id"] == ""){
                        header("location: login.php");
                    }else{
                  header("location: billing.php");
                  }   
                }
                  else{
                    echo "<script>alert('Purchase must be 300-50,000 only!')</script>";
                  }
              }
            }

          ?>

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
    <footer class="py-5 bg-dark" style="margin-top: 100px;">
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