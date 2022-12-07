<?php
//connect to the controller
require("../controllers/customercontroller.php");
$errors = array();

//check if submit button was clicked
if(isset($_POST['customerAdd'])){
    //get user form data
    $uname = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $upass = $_POST['upass'];
    $uconpass = $_POST['uconpass'];
    $ucountry = $_POST['ucountry'];
    $ucity = $_POST['ucity'];
    $ucontact = $_POST['ucontact'];

    //check if fields are empty
    if (empty($uname)){
        array_push($errors, "Full Name is Required");
    }
    if (empty($uemail)){
        array_push($errors, "Email is Required");
    }
    if (empty($upass)){
        array_push($errors, "Password is Required");
    }
    if (empty($uconpass)){
        array_push($errors, "Confirm Password is Required");
    }
    if (empty($ucountry)){
        array_push($errors, "Country is Required");
    }
    if (empty($ucity)){
        array_push($errors, "City is Required");
    }
    if (empty($ucontact)){
        array_push($errors, "Phone Number is Required");
    }

    //check if the lengths are fine
    if (strlen($uname) > 100){
        array_push($errors, "Full Name is Too Long");
    }
    if (strlen($uemail) > 50){
        array_push($errors, "Email is Too Long");
    }
    if (strlen($ucountry) > 30){
        array_push($errors, "Country is Too Long");
    }
    if (strlen($ucity) > 30){
        array_push($errors, "City is Too Long");
    }
    if (strlen($ucontact) > 15){
        array_push($errors, "Phone number is Too Long");
    }

    //check if passwords match
    if ($upass != $uconpass){
        array_push($errors, "Passwords do not match");
    }

    //check if email is valid
    if (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Email is invalid");
    }

    //check if email exists
    $existingEmail = ReturnEmail($uemail);
    if (!empty($existingEmail)){
        array_push($errors, "User already exists");
    }

    // if there are no errors in form
    if (count($errors) == 0){
        $upass = md5($upass);

        //insert new customer
            $insertCustomer = InsertCustomer($uname,$uemail,$upass,$ucountry,$ucity,$ucontact);
            if ($insertCustomer){
                header("location: ../login/login.php");
            }else{
                array_push($errors, "An Error occured please try again later");
            }

    }

}
?>
