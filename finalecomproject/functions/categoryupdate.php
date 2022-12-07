<?php
require("../controllers/productcontroller.php");
$Categoryid = $_GET['cid'];
$Categoryname = $_GET['cname'];
$CategoryErrors = array();


//if button is clicked
if(isset($_POST['updateCategory'])){
    $newName = $_POST['categoryName'];
    //validate form
    if (empty($newName)){
        array_push($CategoryErrors, "Category Name is required");
    }

    if (strlen($newName) > 100){
        array_push($CategoryErrors, "Category Name is too long");
    }

    //update brand
    if (count($CategoryErrors) == 0){
        //update brand name
        $UpdateCategory = UpdateCategory($Categoryid, $newName);

        if($UpdateCategory){
            header("location: ../admin/category.php");
        }else{
            $UpdateFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Category Update Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }
    }
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
    <link rel="stylesheet" href="../css/custom.css">

    <title>Category</title>
  </head>
  <body>

      <?php

      // redirect if user isn't admin
      session_start();
      if($_SESSION['user_role'] != 1){
          header('location: ../index.php');
      }
      ?>

      <div class="container">
          <h1 id="title" style="text-align: left;">Update Category</h1>
          <?php echo "<h5 id='title' style='text-align: left;'>Update ".$categoryname. "</h5>" ?>
          <form method="post" style='padding-bottom: 10px;'>
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" name='categoryName' placeholder="Category Name">
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary" name="updateCategory">Submit</button>
            </div>
          </div>

        </form>
        <?php

          if(!empty($categoryErrors)){
              foreach($categoryErrors as $error){
                  echo "\n<div class='alert alert-danger' role='alert' style='padding-bottom: 10px;'>".$error."</div>";
              }
          }

            if(isset($updateFailed)){
                echo $updateFailed;
            }

        ?>

     </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
