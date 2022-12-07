<?php
require_once("../controllers/productcontroller.php");
//get item to delete
$delItem = $_GET['id'];

//delete item
$delete = DeleteProduct($delItem);

if ($delete){
    header("location: ../view/listproducts.php");
}else{
    echo "Delete failed";
}
?>
