<?php
//connect to the customer class
require_once("../classes/customerclass.php");

//insert customer function
//takes name, email, password, country, city, contact
function InsertCustomer($name, $email, $password, $country, $city, $contact)
{
    //create an instance
    $newCustomerObject = new customerClass();

    //run the add customer method
    $addCustomer = $newCustomerObject->AddNewCustomer($name, $email, $password, $country, $city, $contact);

    if ($addCustomer){
        //return the query result
        return $addCustomer;
    }else{
        return false;
    }
}

//return if email exists
//takes email
function ReturnEmail($email){
    //create an instance
    $newCustomerObject = new customerClass();

    //run the return email method
    $returnEmail = $newCustomerObject->CheckForExistCustomer($email);

    if ($returnEmail){
        $existingEmail = $newCustomerObject->db_fetch();
        return $existingEmail;
    }else{
        return false;
    }
}

//return customer login details
//takes email
function ReturnCustomerLoginInfo($email){
    //create an instance
    $newCustomerObject = new customerClass();

    //run the return customer login details method
    $returnLoginInfo = $newCustomerObject->ReturnCustomerLoginInfo($email);

    //check if query run successful
    if ($returnLoginInfo){

        //create an array
        $Credentials = array();
        $Credentials = $newCustomerObject->db_fetch();

        if (empty($Credentials)){
            return false;
        }else{
            return $Credentials;
        }

    }else{
        return false;
    }
}
?>
