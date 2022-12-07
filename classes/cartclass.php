<?php
//connect to database class
require_once("../settings/db_class.php");

/**
*Product class to handle everything cart related
*/
/**
 *@author Allotei Pappoe
 *
 */

class cartClass extends db_connection
{
    //method to insert into the cart
    public function InsertProductIntoCrt($pid, $ipadd, $cid, $qty){
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_id`, `qty`) VALUES ('$pid', '$ipadd', '$cid', '$qty')";

        //run the query
        return $this->db_query($sql);
    }

    //for customers who haven't logged in.
    public function InsertProductIntoCartNll($pid, $ipadd, $qty){
        $sql = "INSERT INTO `cart`(`p_id`, `ip_add`, `qty`) VALUES ('$pid', '$ipadd', '$qty')";

        //run the query
        return $this->db_query($sql);
    }

    //check for duplicate
    //logged in customers
    public function CheckDuplicate($pid, $cid){
        $sql = "SELECT `p_id`, `c_id` FROM `cart` WHERE `p_id`='$pid' AND `c_id`='$cid'";

        return $this->db_query($sql);
    }

    //not logged in customers
    public function CheckDuplicateNll($pid, $ipadd){
        $sql = "SELECT `ip_add`, `p_id` FROM `cart` WHERE `ip_add`='$ipadd' AND `p_id`='$pid'";

        return $this->db_query($sql);
    }
    //display cart
    //logged in customers
    public function DisplayCrt($cid){
        $sql = "SELECT `cart`.`p_id`, `cart`.`c_id`, `cart`.`qty`, `products`.`product_title`, `products`.`product_price`, `products`.`product_image` FROM `cart`
        JOIN `products` on (`cart`.`p_id` = `products`.`product_id`)
        WHERE `cart`.`c_id` = '$cid'";

        //run the query
        return $this->db_query($sql);
    }

    //not logged in customers
    public function DisplayCrtNll($ipadd){
        $sql = "SELECT `cart`.`p_id`, `cart`.`ip_add`, `cart`.`qty`, `products`.`product_title`, `products`.`product_price`, `products`.`product_image` FROM `cart`
        JOIN `products` on (`cart`.`p_id` = `products`.`product_id`)
        WHERE `cart`.`ip_add` = '$ipadd'";

        //run the query
        return $this->db_query($sql);
    }

    //get cart totals
    //logged and not logged in customers
    public function CartTotal($cid){
        $sql = "SELECT count(`c_id`) AS `count` FROM `cart` WHERE `c_id`='$cid'";
        return $this->db_query($sql);
    }

    public function CartTotalNll($ipadd){
        $sql = "SELECT count(`ip_add`) AS `count` FROM `cart` WHERE `ip_add`='$ipadd'";
        return $this->db_query($sql);
    }

    //update cart
    //logged in customers
    public function UpdateCart($cid, $pid, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `c_id`='$cid' AND `p_id`='$pid'";

        //run the query
        return $this->db_query($sql);
    }

    //not logged in customers
    public function UpdateCartNll($ipadd, $pid, $qty){
        $sql = "UPDATE `cart` SET `qty`='$qty' WHERE `ip_add`='$ipadd' AND `p_id`='$pid'";

        //run the query
        return $this->db_query($sql);
    }

    //delete from cart
    //logged in customers
    public function DeleteCrt($cid,$pid){
        $sql = "DELETE FROM `cart` WHERE `c_id`='$cid' AND `p_id`='$pid'";

        //run the query
        return $this->db_query($sql);
    }

    //not logged in customers
    public function DeleteCrtNll($ipadd, $pid){
        $sql = "DELETE FROM `cart` WHERE `ip_add`='$ipadd' AND `p_id`='$pid'";

        //run the query
        return $this->db_query($sql);
    }

    //get cart total
    //logged in customers
    public function CartValue($cid){
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`c_id`='$cid'";

        return $this->db_query($sql);
    }

    //not logged in customers
    public function CartValueNll($ipadd){
        $sql="SELECT SUM(`products`.`product_price`*`cart`.`qty`) as Result
FROM `cart` JOIN `products` ON (`products`.`product_id` = `cart`.`p_id`) WHERE `cart`.`ip_add`='$ipadd'";

        return $this->db_query($sql);
    }

    public function UpdateCartWithCID($cid, $ip_add){
        $sql = "UPDATE `cart` SET `c_id`='$cid' WHERE `ip_add`='$ip_add'";
        return $this->db_query($sql);
    }

    //function to add to orders
    public function AddOrder($cid, $inv_no, $ord_date, $ord_stat){
        $sql = "INSERT INTO `orders`(`customer_id`, `invoice_no`, `order_date`, `order_status`) VALUES ('$cid','$inv_no','$ord_date','$ord_stat')";
        return $this->db_query($sql);
    }

    //function to add to order details
    public function AddOrderDetails($ord_id, $prod_id, $qty){
        $sql = "INSERT INTO `orderdetails`(`order_id`, `product_id`, `qty`) VALUES ('$ord_id','$prod_id','$qty')";
        return $this->db_query($sql);
    }

    public function AddPayment($amt, $cid, $ord_id, $currency, $pay_date){
        $sql = "INSERT INTO `payment`(`amt`, `customer_id`, `order_id`, `currency`, `payment_date`) VALUES ('$amt','$cid','$ord_id','$currency','$pay_date')";
        return $this->db_query($sql);
    }

    public function RecentOrder(){
        $sql = "SELECT MAX(`order_id`) as recent FROM `orders`";
        return $this->db_query($sql);
    }

    public function DeleteWholeCrt($cid){
        $sql = "DELETE FROM `cart` WHERE `c_id`='$cid'";
        return $this->db_query($sql);
    }

    public function GetOrder($ord_id){
        $sql = "SELECT  `customer`.`customer_name`, `orders`.`order_id`, `orders`.`invoice_no`, `orders`.`order_date`, `orders`.`order_status` FROM `orders` JOIN `customer` ON (`customer`.`customer_id` = `orders`.`customer_id`) WHERE `orders`.`order_id` = '$ord_id'";
        return $this->db_query($sql);
    }

    public function GetOrderDtls($ord_id){
        $sql = "SELECT `products`.`product_title`, 	`products`.`product_price`, `orderdetails`.`qty`, `orderdetails`.`qty`*`products`.`product_price` as result FROM `orderdetails` JOIN `products` ON (`orderdetails`.`product_id` = `products`.`product_id`) WHERE `order_id`='$ord_id'";
        return $this->db_query($sql);
    }

}
?>
