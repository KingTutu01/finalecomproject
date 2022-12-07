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

  <title>List Products</title>
</head>

<body>
  <?php include("inc/navbar.php"); ?>
  <div class="container">

    <h1>Products</h1>
    <a href='addproduct.php'><button type='button' class='btn btn-primary'>Add Product</button></a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Product Image</th>
          <th scope="col">Product Title</th>
          <th scope="col">Product Price</th>
          <th scope="col">Product Desc.</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php
        foreach ($product as $key => $values) {
          echo "<tr>
          <td><img src='{$values[4]}' width='200' height='200'/></td>
          <td>{$values[2]}</td>
          <td>{$values[6]}</td>
          <td>{$values[3]}</td>
          <td><a href='../view/updateproduct.php?id={$key}'><button type='button' class='btn btn-success'>Update</button></a>\n<a href='../functions/productdeleteprocess.php?id={$key}'><button type='button' class='btn btn-danger'>Delete</button></a></td>
        </tr>";
        
        }
        ?>
        
       
      </tbody>
    </table>

  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>