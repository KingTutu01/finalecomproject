<?php
require("../controllers/productcontroller.php");
$brandErrors = array();

//check if add brand button is clicked
if (isset($_POST['addBrand'])){

    //grab data
    $brandName = $_POST['brandName'];

    //validate form
    if (empty($brandName)){
        array_push($brandErrors, "Brand Name is required");
    }

    if (strlen($brandName) > 100){
        array_push($brandErrors, "Brand Name is too long");
    }

    //add brand
    if (count($brandErrors) == 0){
        //insert new brand
        $addBrand = AddNewBrand($brandName);

        if ($AddBrand){
            $AddSuccess = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  Brand Added Successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }else{
            $AddFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Brand Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }
    }


};


$brandIDs = array();
$brandIDs = returnBrands();

?>
