<?php
require("../controllers/productcontroller.php");

//get item to delete
$delItem = $_GET['bid'];

//delete item
$delete = DeleteBrandName($delItem);

if ($delete){
    header("location: ../view/brand.php");
}else{
    echo "Delete failed";
}
?>
