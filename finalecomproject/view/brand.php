
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/custom.css">

    <title>Brands</title>
  </head>
  <body>

      <?php

      include("../functions/brandprocess.php");
      include("inc/navbar.php");
      if($_SESSION['user_role'] != 1){
          header('location: ../index.php');
      }
      ?>

      <div class="container">
          <h1 id="title" style="text-align: left;">Add a Brand</h1>
          <form method="post" style='padding-bottom: 10px;'>
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" name='brandName' placeholder="Brand Name">
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary" name="addBrand">Submit</button>
            </div>
          </div>

        </form>
        <?php

            if(!empty($brandErrors)){
              foreach($brandErrors as $error){
                  echo "\n<div class='alert alert-danger' role='alert' style='padding-bottom: 10px;'>".$error."</div>";
              }
          }

            if (isset($AddSuccess)){
                echo $AddSuccess;
            }else if(isset($AddFailed)){
                echo $AddFailed;
            }

          echo "<h1 id='title' style='text-align: left;'>View All Brands</h1>";

          if (!empty($brandIDs)){
              foreach($brandIDs as $key => $value){

                  echo "<li class='list-group-item'>". $value ."<a href='../functions/brandupdate.php?bid=$key&bname=$value'> <button type='button' class='btn btn-success'>Update</button> </a>" ."<a href='../functions/branddelete.php?bid=$key'> <button type='button' class='btn btn-danger'>Delete</button> </a> </li>";
              }
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
