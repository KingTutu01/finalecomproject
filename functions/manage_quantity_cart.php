<?php
require_once("../controllers/cartcontroller.php");
$pid = $_GET['pid'];
$qty = $_GET['qty'];
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
if (isset($_SESSION['customer_id'])){
    $cid = $_SESSION['customer_id'];
    $UpdateCart = UpdateCart_fxn($cid, $pid, $qty);
    if($UpdateCart){
        header("location: ../view/cart.php");
    }else{
        echo "something went wrong";
    }
}else{
    $ipadd = GetRealIpAddr();
    $UpdateCart = UpdateCartNull_fxn($ipadd, $pid, $qty);
    if($UpdateCart){
        header("location: ../view/cart.php");
    }else{
        echo "something went wrong";
    }
}
?>
