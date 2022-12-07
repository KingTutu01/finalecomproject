<?php
require_once("../controllers/cartcontroller.php");
function GetRealIpAddr(){
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
session_start();
if(isset($_GET['id'])){

    $pid = $_GET['id'];
    $ipadd = GetRealIpAddr();

    if(isset($_SESSION['customer_id'])){
       $cid = $_SESSION['customer_id'];
        $delete = DeleteCart_fxn($cid,$pid);
        if($delete){
            header("location: ../view/cart.php");
        }else{
            echo "something went wrong";
        }
    }else{
       $delete = DeleteCartNull_fxn($ipadd,$pid);
        if($delete){
            header("location: ../view/cart.php");
        }else{
            echo "something went wrong";
        }
    }

}else{
    header("location: ../view/index.php");
}

?>
