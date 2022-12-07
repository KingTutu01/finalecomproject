<?php

require("../functions/productdisplayprocess.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom.css">

    <title>Shopping</title>
  </head>
  <body>
      <?php include("inc/navbar.php");
        $ipadd = GetRealIpAddr();
        if(isset($_SESSION['user_id'])){ $cid = $_SESSION['user_id']; }
        else{$cid = null;}
        $qty = 1;
      ?>



<div class="container">

    <div class="row">
        <?php

            //loop through products array
            foreach($product as $key => $values){

        ?>
    <div class="col-sm row-custom">
              <div class="card" style="width: 20rem;">
              <img src="<?= $values[4]; ?>" class="card-img-top" height="200" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $values[2]; ?></h5>
                <p class="card-text">Ghc <?= $values[6]; ?></p>
                  <p class="card-text"><?= $values[3]; ?></p>
                <a href="product.php?pid=<?= $key; ?>" class="btn btn-primary">View Product</a>
                <a href="<?php echo '../functions/cartaddprocess.php?pid='.$key.'&ipadd='.$ipadd.'&cid='.$cid.'&qty='.$qty ?>" class="btn btn-primary" class="btn btn-primary">Add to Cart</a>
              </div>
              </div>
        </div>
        <?php  }; ?>
        </div>

    <nav aria-label="Page navigation example">
<?php
    if($pages>1){
        ?>
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <?php
        for($i = 1; $i <= $pages; $i++){
        ?>

    <!--<li class="page-item"><a class="page-link" href="">Next</a></li>-->
    <li class="page-item"><a class="page-link" href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>
  </ul>
<?php }}?>
</nav>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
