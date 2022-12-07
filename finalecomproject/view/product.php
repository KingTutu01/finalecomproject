<?php
require("../controllers/productcontroller.php");

if(isset($_GET['pid'])){
    $pid = $_GET['pid'];
    $ProductDetails = returnProduct($pid);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Single Product</title>
  </head>
  <body>
    <?php include("inc/navbar.php");
        $ipadd = GetRealIpAddr();
        //get customer id
        if(isset($_SESSION['customer_id'])){ $cid = $_SESSION['customer_id']; }
        else{$cid = null;}
        $qty = 1;

    ?>

    <div class="container">
    <img src="<?= $ProductDetails['product_image'] ?>" width="200">
    <h3><?= $ProductDetails['product_title'] ?></h3>
    <h6>Price: Ghc <?= $ProductDetails['product_price'] ?></h6>

    <p>Description: <?= $ProductDetails['product_desc'] ?></p>
    <p>Brand: <?= $ProductDetails['brand_name'] ?></p>
    <p>Category: <?= $ProductDetails['cat_name'] ?></p>
    <a href="<?php echo '../functions/cartaddprocess.php?pid='.$pid.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>" class="btn btn-primary">Add To Cart</a>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
