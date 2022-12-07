<?php

require_once("../classes/cartclass.php");
/*
*cart controller to handle everything about the cart
*/

function InsertProductIntoCart_fxn($pid, $ipadd, $cid, $qty){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->InsertProductIntoCrt($pid, $ipadd, $cid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

function InsertProductIntoCartNull_fxn($pid, $ipadd, $qty){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->InsertProductIntoCartNll($pid, $ipadd, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

//check for duplicates
//logged in customer
function CheckDuplicates($pid, $cid){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->CheckDuplicate($pid, $cid);

    if ($runQuery){
        $record = $newCartObject->db_fetch();
        if (!empty($record['p_id']) && !empty($record['c_id'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }

}

//check for duplicates
// not logged in customer
function CheckDuplicatesNull($pid, $ipadd){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->CheckDuplicateNll($pid, $ipadd);

    if ($runQuery){
        $record = $newCartObject->db_fetch();
        if (!empty($record['p_id']) && !empty($record['ip_add'])){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function DisplayCrt_fxn($cid){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->DisplayCrt($cid);

    //check if query run
    if ($runQuery){
        //create array to start product details
        $prodArray = array();
        while ($record = $newCartObject->db_fetch()){
            $prodArray[$record['p_id']] = [
                $record['c_id'],
                $record['qty'],
                $record['product_title'],
                $record['product_price'],
                $record['product_image']
            ];

            /*
            $prodArray['p_id'] = $record['p_id'];
            $prodArray['c_id'] = $record['c_id'];
            $prodArray['qty'] = $record['qty'];
            $prodArray['product_title'] = $record['product_title'];
            $prodArray['product_price'] = $record['product_price'];
            $prodArray['product_image'] = $record['product_image'];*/
        }

        return $prodArray;
    }else{
        return false;
    }
}

function DisplayCartNull_fxn($ipadd){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->DisplayCrtNll($ipadd);

    //check if query run
    if ($runQuery){
        //create array to start product details
        $prodArray = array();
        while ($record = $newCartObject->db_fetch()){
            $prodArray[$record['p_id']] = [
                $record['ip_add'],
                $record['qty'],
                $record['product_title'],
                $record['product_price'],
                $record['product_image']
            ];

        }

        return $prodArray;
    }else{
        return false;
    }
}

function cartTotal_fxn($cid){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->cartTotal($cid);

    //check if query run
    if($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

function CartTotalNll_fxn($ipadd){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->CartTotalNll($ipadd);

    //check if query run
    if($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

//update cart functions
//logged in customers
function UpdateCart_fxn($cid, $pid, $qty){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->UpdateCart($cid, $pid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

//not logged in customers
function UpdateCartNull_fxn($ipadd, $pid, $qty){
    //create a new object
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->UpdateCartNll($ipadd, $pid, $qty);

    //if query run successfully
    if ($runQuery){
        //return query result
        return $runQuery;
    }else{
        return false;
    }
}

//delete from cart functions
//logged in customer
function DeleteCart_fxn($cid,$pid){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->DeleteCrt($cid,$pid);

    //if query run successfully
    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

//not logged in customers
function DeleteCartNull_fxn($ipadd,$pid){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->DeleteCrtNll($ipadd,$pid);

    //if query run successfully
    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

//cart value functions
//logged in customer
function CartValue_fxn($cid){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->CartValue($cid);

    if ($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

function CartValueNll_fxn($ipadd){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->CartValueNll($ipadd);

    if ($runQuery){
        $total = $newCartObject->db_fetch();
        return $total;
    }else{
        return false;
    }
}

function UpdateCartWithCID_fxn($cid, $ip_add){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->UpdateCartWithCID($cid, $ip_add);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function AddOrder_fxn($cid, $inv_no, $ord_date, $ord_stat){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->AddOrder($cid, $inv_no, $ord_date, $ord_stat);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function AddOrderDetails_fxn($ord_id, $prod_id, $qty){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->AddOrderDetails($ord_id, $prod_id, $qty);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function AddPayment_fxn($amt, $cid, $ord_id, $currency, $pay_date){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->addPayment($amt, $cid, $ord_id, $currency, $pay_date);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function RecentOrder_fxn(){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->RecentOrder();
    if($runQuery){
        $recent = $newCartObject->db_fetch();
        return $recent;
    }else{
        return false;
    }
}

function DeleteWholeCart_fxn($cid){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->DeleteWholeCrt($cid);

    if ($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function GetOrder_fxn($ord_id){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->GetOrder($ord_id);
    if($runQuery){
        $ord_arr = $newCartObject->db_fetch();
        return $ord_arr;
    }else{
        return false;
    }
}

function GetOrderDetails_fxn($ord_id){
    $newCartObject = new cartClass();

    $runQuery = $newCartObject->GetOrderDtls($ord_id);
    if($runQuery){
        while($record = $newCartObject->db_fetch()){
            $ord_arr[] = $record;
        }
        return $ord_arr;
    }else{
        return false;
    }
}

?>
