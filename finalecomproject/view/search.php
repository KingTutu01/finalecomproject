<?php
require("../controllers/productcontroller.php");
if(!isset($_GET['searchTerm'])){
    header("location: index.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/custom.css">

    <title>Search Products</title>
  </head>
  <body>
    <?php include("inc/navbar.php");?>
    <div class="container">
    <h3>Search Results For: <?= $_GET['searchTerm']?></h3>
    <?php

    $searchTerm = $_GET['searchTerm'] . "%";
    $results = SearchProducts($searchTerm);
    if (!empty($results)){
    foreach($results as $key => $values){
        $ipadd = GetRealIpAddr();
        if(isset($_SESSION['customer_id'])){ $cid = $_SESSION['customer_id']; }
        else{$cid = null;}
        $qty = 1;
        ?>


     <div class="media row-custom">
      <img src="<?= $values[1] ?>" class="align-self-start mr-3" alt="..." height="200px">
      <div class="media-body">
        <h5 class="mt-0"><?= $values[0] ?></h5>
        <p>Price: GHc<?= $values[2] ?></p>
        <a href="<?php echo '../functions/cartaddprocess.php?pid='.$key.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>" class="btn btn-primary">Add To Cart</a>

      </div>
    </div>
    <?php }}else{ echo "<p>Sorry nothing was found. Please try another term</p>"; }?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
