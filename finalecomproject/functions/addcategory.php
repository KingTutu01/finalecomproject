<?php
require("../controllers/productcontroller.php");
$CategoryErrors = array();

// check if button was clicked
if(isset($_POST['addCategory'])){
    //grab form data
    $CategoryName = $_POST['categoryName'];

    //check for errors
    if(empty($CategoryName)){
        array_push($categoryErrors, "Field Cannot be Empty");
    }
    if(strlen($CategoryName) > 100){
        array_push($CategoryErrors, "Category is too long");
    }

    //if there are no errors
    if (count($CategoryErrors) == 0){
        $insertCategory = addCategory($CategoryName);

        //check if insert worked
        if ($insertCategory){
            $AddSuccess = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  Category Added Successfully
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }else{
            $AddFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Category Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }

    }
}

$Categories = array();
$Categories = DisplayCategories();
?>
