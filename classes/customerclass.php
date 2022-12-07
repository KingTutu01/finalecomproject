<?php
//connect to database class
require_once("../settings/db_class.php");

/**
*Customer class to handle everything customer related
*/
/**
 *@author Allotei Pappoe
 *
 */

class customerClass extends db_connection
{
    /**
	*method to insert new customer
	*takes the name, email, password, country, city, phone
	*/

    public function AddNewCustomer($name, $email, $password, $country, $city, $phone){
        //sql query
        $sql = "INSERT INTO `customer`(`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `user_role`) VALUES ('$name','$email','$password','$country','$city','$phone',2)";

        //return the executed the query
        return $this->db_query($sql);
    }

    public function CheckForExistCustomer($email){
        //sql query
        $sql = "SELECT `customer_email` FROM `customer` WHERE `customer_email` = '$email'";

        //return the executed query
        return $this->db_query($sql);
    }

    /**
	*methods to edit customer details
	*takes the name, email, password, country, city, phone
	*/

    public function EditCustomerName($name, $email){
        //sql query
        $sql = "UPDATE `customer` SET `content` = '$name' WHERE `customer_email` = '$email'";
        //run the sql query
        return $this->db_query($sql);
    }

    /**
	*method to return customer role, email and password
	*takes the email entered
	*/

    public function ReturnCustomerLoginInfo($email){
        //sql query
        $sql = "SELECT `customer_id`, `user_role`, `customer_email`, `customer_pass` FROM `customer` WHERE `customer_email` = '$email'";

        //run the sql query
        return $this->db_query($sql);
    }
}

?>
