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
            <?php if ($_SESSION['email'] != "") {
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

          <?php 

          $user_id = $_SESSION["user_id"];

          $seluser = mysqli_query($db,"SELECT * FROM tbl_users WHERE id = '$user_id'");
          $userID = 0;  

          if($u = mysqli_fetch_assoc($seluser)){
              $userID = $u["id"];
              $_SESSION['uid'] = $userID;
          ?>

          <div class="row">
        <div class="col-md-12">

        <form action="" method="post" class="form-horizontal form-group" id="billingform" accept-charset="utf-8">
          <div class="control-group">
            <label for="email" class="control-label"> 
              Billing E-Mail 
            </label>
            <div class="controls">
              <input name="email" type="email" class="form-control" value="<?php echo $u["email"]; ?>" id="email" disabled >
            </div>
          </div>
     
          <div class="control-group">
            <label for="address" class="control-label"> 
              Street Address
            </label>
            <div class="controls"><input name="address" class="form-control" placeholder="Street Name" type="text" value="<?= $u["address"]; ?>" id="address">
            </div>
          </div>
     
          <div class="control-group">
            <label for="city" class="control-label">  
              Contact Number
            </label>
            <div class="controls"><input name="city" class="form-control" value="<?= $u["phone"]; ?>" type="text" value="" id="city">
            </div>
          </div>

        <?php } ?>
     
        
        
      </div> <!-- .span8 -->
          </div>
          
          <div class="row">
            
           <table class="table table-hover">

         <?php 
         class Item{
           var $id;
           var $img;
           var $prod_name;
           var $brand;
           var $price;
           var $quantity;
           var $sub;
          } 

if(isset($_GET['id']) && !isset($_POST['update']))  { 
    $sql = "SELECT * FROM tbl_products WHERE id = ".$_GET['id'];
    $result = mysqli_query($db, $sql);
    $product = mysqli_fetch_object($result); 
    $item = new Item();
    $item->id = $product->id;
    $item->image = $product->image;
    $item->name = $product->name;
    $item->Category = $product->Category;
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
                 $cart[$index]->quantity ++;
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
     $cart[$i]->quantity = $arrQuantity[$i]; $_SESSION['cart'] = $cart;
  }
 
    
}


?>

 <?php echo $ordItems = "";
       echo $qty = "";
       $subTotal = "";
       $price = "";?>

            <tr>
              <th>Product Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Category</th>
              <th>Sub-Total</th>
            </tr>
<div style="display: none;">
            <?php 

     $cart = unserialize(serialize($_SESSION['cart']));
     $s = 0;
     $index = 0;
    for($i=0; $i<count($cart); $i++){
        $s += $cart[$i]->price * $cart[$i]->quantity;

        $ordQty = $ordQty . "";
        $ordItems = $ordItems . "";
        $subTotal = $subTotal . "";
        
 ?> 
</div>
   <tr>
        
        <td> <?php echo $cart[$i]->name; ?> </td>
        <td>
        <?php 
           $sel = mysqli_query($db,"SELECT * from tbl_products where id = '".$cart[$i]->id."' " );
           $r = mysqli_fetch_array($sel);
                $ordItems = $ordItems . "". $cart[$i]->name . "<br>";
                $subTotal = $subTotal . "". $cart[$i]->price * $cart[$i]->quantity . "<br>";
                $price = $price . "". $cart[$i]->price. "<br>";

                $string = $r['image'];
                $img = str_replace('data:image/jpeg;base64,', '', $string);
                $data = base64_decode($img);

          echo '<img src="data:image/jpeg;base64,'.base64_encode( $data ).'" style="width:150px">'; ?> 



        </td>
        
        <td><?php echo "₱".$cart[$i]->price; ?></td>
        <td> <input type="number" max="<?php echo $cart[$i]->stock; ?>" value="<?php echo $cart[$i]->quantity; ?>" name="quantity[]" style="width: 50px;" > </td>  
        <td><?php echo $cart[$i]->Category; ?></td>
        <td>
        <?php 

         $ordQty = $ordQty . "" . $cart[$i]->quantity. "<br>";

        $sel = mysqli_query($db,"SELECT * from tbl_products where id = '".$cart[$i]->id."' " );
        $row = mysqli_fetch_array($sel);
        if($row['stock'] >= $cart[$i]->quantity){
            echo "₱".$cart[$i]->price * $cart[$i]->quantity; 
        }
        else{
          echo "Out of Stock \n Remaining is: <b>".$row['stock']."</b>";
        }
        
        ?> </td> 
   </tr>
    <?php 
        $index++;


    } ?>
    <!--<tr>-->
    <!--    <td colspan="5" style="text-align:right; font-weight:bold">Sub Total-->
    <!--     <input id="saveimg" type="image" src="images/save.png" name="update" alt="">-->
    <!--     <input type="hidden" name="update">-->
    <!--    </td>-->
    <!--    <td> <?php echo "₱".$s; ?> </td>-->

      
    <!--</tr>-->
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>Delivery Fee </td>
      <td>₱100</td>
    </tr>

    <tr>
        <td colspan="5" style="text-align:right; font-weight:bold">Total
         <input id="saveimg" type="image" src="images/save.png" name="update" alt="">
         <input type="hidden" name="update">
        </td><td> <?php $s = $s + 100; echo "₱".$s; ?> </td>

      
    </tr>

    <tr>
          <td><!-- <?php //echo $ordItems = "";?> --></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <?php if (empty($_SESSION['final_total'])) {}
          elseif($_SESSION['final_total'] < 300){}
          else{ ?>
          <td><a class="btn btn-info" data-toggle="modal" data-target="#tac" style="color: #fff">Confirm and Submit</a></td>
        <?php } ?>
        
    </tr>
          </table>
         
          </div>
          <!-- /.row -->

         
          <?php 
            if(isset($_POST["confirm"])){
                // echo "<script>alert('Ordered Successfully!')</script>";
                $stname = $_POST["address"];
                $city = $_POST["city"];
                $email = $_SESSION['email'];

                date_default_timezone_set('Asia/Manila');
                $date = date('Y-m-d');
                $time = date('g:i a');
                $uid = $_SESSION['uid'];

                $ins = mysqli_query($db,"INSERT INTO `tbl_orders` (`id`, `userID`, `email`, `order_items`,`qty`,`price`,`subtotal`, `total`, `date`, `time`, `streetname`, `phone`,`status`) VALUES ('','$uid','$email','$ordItems','$ordQty','$price','$subTotal','$s','$date','$time','$stname','$city','Pending')");

                // $ins = mysqli_query($db,"INSERT INTO `tbl_orders` (`id`, `userID`, `email`, `order_items`, `qty`, `subtotal`, `total`, `date`, `time`, `streetname`, `phone`, `status`) VALUES ('', '', '', '', '', '', '', '', '', '', '', '');");

               

                if($ins){

                  // session_destroy();
                  // unset($_SESSION['cart']);
                  
                  $_SESSION['user_id'] = "";
                  // $_SESSION['email'] = "";
                  $_SESSION['category'] = "All";
                  $_SESSION['success'] = "true";

                  header("location: index.php");
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


  <!-- Modal -->
  <div class="modal fade" id="tac" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4>Terms and Condition</h4>
        </div>
        <div class="modal-body">
          <p>Seller accepts this Order and any amendments by signing the acceptance copy of the Order and returning it to Purchaser promptly. Even without such written acknowledgment, Seller's full or partial performance under this Order will constitute acceptance of these Terms. By acceptance of this Order, Seller agrees to be bound by, and to comply with all these Terms, which include any supplements to it, and all specifications and other documents referred to in this Order. These Terms apply to everything listed in this Order and constitute Purchaser's offer to Seller, which Purchaser may revoke at any time prior to Seller’s acceptance. This Order is not an acceptance by Purchaser of any offer to sell, any quotation, or any proposal. Reference in this Order to any such offer to sell, quotation, or proposal will not constitute a modification of any of these Terms. Terms and conditions different from or in addition to these Terms, whether contained in any acknowledgment of this Order, or with delivery of any goods or services under this Order, or otherwise, will not be binding on Purchaser, whether or not they would materially alter this Order, and Purchaser hereby rejects them. These Terms may be modified only by a written document signed by duly authorized representatives of Purchaser and Seller.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="confirm" class="btn btn-large btn-primary" onsubmit="alert('Ordered Successfully')">Check Out</button>
        </div>
      </div>
      
    </div>
  </div>
</form>
    <!-- Footer -->
    <footer class="py-5 bg-dark" style="margin-top: 10%;">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; iMart 2018</p>
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