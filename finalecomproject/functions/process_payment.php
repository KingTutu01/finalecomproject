<?php
require_once("../controllers/cartcontroller.php");
session_start();
//check for status
if(isset($_GET['status'])){
    $status = $_GET['status'];

    $reference = $_GET['reference'];

if ($reference === "") {
    echo "<script>window.history.back</script>";
}


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer sk_test_6d4f5a1f22357a340de12247059b454ca6b39bdf", //sk_live_497a3a223893acf3ff8ecfd4dce1158b2fc9b088
        // "Authorization: Bearer sk_test_6d4f5a1f22357a340de12247059b454ca6b39bdf", //sk_live_497a3a223893acf3ff8ecfd4dce1158b2fc9b088
        "Cache-Control: no-cache",
    ),
));


    if($status == 'completed'){
        // ..code
        $cid = $_SESSION['user_id'];
        $inv_no = mt_rand(10,5000);
        $ord_date = date("Y/m/d");
        $ord_stat = 'unfulfilled';
        $addOrder = addOrder_fxn($cid, $inv_no, $ord_date, $ord_stat);
        if($addOrder){
            $recent = RecentOrder_fxn();
            $cart = DisplayCartNull_fxn($cid);
            foreach($cart as $key => $value){

                $addDetails = addOrderDetails_fxn($recent['recent'], $key, $value[1]);
            }

            $amt = CartValue_fxn($cid);
            $currenct = "USD";
            $addPayment = AddPayment_fxn($amt['Result'], $cid, $recent['recent'], "USD", $ord_date);

            if($addPayment){
                $delete = DeleteWholeCart_fxn($cid);
                if($delete){
                    header("location: ../view/payment_success.php?ord_id=" .$recent['recent']);
                }
            }else{
                echo "payment failed";
            }


        }else{
            echo "order went wrong";
        }

    }else if ($status == 'failed'){
        echo "failed";
    }
}else{
    echo "payment cancelled";
}

?>
