<?php
require_once("../controllers/cartcontroller.php");
$ord_id = $_GET['ord_id'];
$ord_arr = GetOrder_fxn($ord_id);
$ord_details_arr = GetOrderDetails_fxn($ord_id);
print_r($ord_details_arr);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Payment Success</title>
  </head>
  <body>
    <div class="container">
      <h1>Payment Accepted</h1>
      <h8>Your Order is being processed!</h8>
      <p>Invoice Number: <?php echo $ord_arr['invoice_no'] ?></p>
      <h8>Order Details</h8>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Sub-Total</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $counter = 1;
        $totals = 0;
        foreach($ord_details_arr as $key => $value){
    ?>
    <tr>
      <th scope="row"><?php echo $counter; ?></th>
      <td><?php echo $value['product_title'] ?></td>
      <td><?php echo $value['product_price'] ?></td>
      <td><?php echo $value['qty']; ?></td>
      <td><?php echo $value['result']; ?></td>
    </tr>

    <?php
            $totals += $value['result'];
            $counter++;
        } ?>
  </tbody>
</table>
    <p>Totals: <?php  echo $totals; ?></p>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
