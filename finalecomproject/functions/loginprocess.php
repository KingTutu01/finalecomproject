<?php
//connect to the controller
require("../controllers/customercontroller.php");
require_once("../controllers/cartcontroller.php");
$errors = array();
function GetRealIpAddr_(){
 if ( !empty($_SERVER['HTTP_CLIENT_IP']) ) {
  // Check IP from internet.
  $ip = $_SERVER['HTTP_CLIENT_IP'];
 } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
  // Check IP is passed from proxy.
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 } else {
  // Get IP address from remote address.
  $ip = $_SERVER['REMOTE_ADDR'];
 }
 return $ip;
}

$ip_add = GetRealIpAddr_();

//check if submit button was clicked
if(isset($_POST['customerLogin'])){
    //get user data
    $LoginEmail = $_POST['loginEmail'];
    $LoginPassword = $_POST['loginPassword'];

    //check if fields are empty
    if(empty($LoginEmail)){
        array_push($errors, "Email is Required");
    }
    if(empty($LoginPassword)){
        array_push($errors, "Password is Required");
    }

    //check if email is valid
    if (!filter_var($LoginEmail, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Email is invalid");
    }

    //if there are errors in form
    if(count($errors) == 0){
        $LoginPassword = md5($LoginPassword);

        //return login info
        $LoginInfo = array();
        $LoginInfo = ReturnCustomerLoginInfo($LoginEmail);

        //check if email is in the db
        if($LoginInfo){
        //check if they are equal:

        if($LoginPassword == $LoginInfo['customer_pass']){

            session_start();
            $_SESSION['user_id'] = $LoginInfo['customer_id'];
            $_SESSION['user_email'] = $LoginInfo['customer_email'];
            $_SESSION['user_role'] = $LoginInfo['user_role'];
            $updateCart = UpdateCartWithCID_fxn($_SESSION['user_id'], $ip_add);
            header("location: ../view/index.php");


        }else{

            array_push($errors, "Email or Password is wrong");

        }
        }else{
            array_push($errors, "Email or Password is wrong");
        }



    }

}

?>
