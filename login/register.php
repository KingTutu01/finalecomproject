<?php
include("../functions/registerprocess.php");
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

    <title>Login</title>
  </head>
  <body>
    <h1 id="title">Welcome To My Shop</h1>
    <h5 id="par">Fill The Form to Register</h5>
    <div class="container">
        <form method="post" name="registerForm" onsubmit="return validateForm()" class="formstyle">
          <div class="form-group">
            <label for="exampleInputName">Full Name</label>
            <input type="text" class="form-control" id="exampleInputName" name="uname">
            <small id="fullNameError"></small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="uemail">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            <small id="emailError"></small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="upass">
            <small id="passwordError"></small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword2">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" name="uconpass">
            <small id="confirmPasswordError"></small>
          </div>
          <div class="form-group">
            <label for="exampleInputCountry">Country</label>
            <input type="text" class="form-control" id="exampleInputCountry" name="ucountry">
            <small id="countryError"></small>
          </div>
          <div class="form-group">
            <label for="exampleInputName">City</label>
            <input type="text" class="form-control" id="exampleInputCity" name="ucity">
            <small id="cityError"></small>
          </div>
          <div class="form-group">
            <label for="exampleInputNumber">Phone Number</label>
            <input type="tel" class="form-control" id="exampleInputNumber" name="ucontact">
            <small id="contactError"></small>
          </div>
          <button type="submit" class="btn btn-primary" name="customerAdd">Submit</button>
        </form>

        <?php
            if($errors){
                foreach($errors as $error){
                        echo "<div class='alert alert-danger' role='alert'>".
                            $error."</div>";
                        }
                    }
       ?>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>
