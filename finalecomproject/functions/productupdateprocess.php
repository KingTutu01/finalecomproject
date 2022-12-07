<?php
require_once("../controllers/productcontroller.php");
$Categories = array();
$Categories = displayCategories();
$errors = array();

$brands = array();
$brands = returnBrands();
if (isset($_GET['id'])){
    $id = $_GET['id'];

    //create array to store product details
    $productDetails = array();
    $productDetails = returnProduct($id);


//if form has been submitted
if (isset($_POST['submit'])){
    //grab form inputs
    $dname = $_POST['pname'];
    $dprice = $_POST['pprice'];
    $dcat = $_POST['pcat'];
    $dbrand = $_POST['dbrand'];
    $ddesc = $_POST['ddesc'];
    $dkeyword = $_POST['dkeyword'];

    //check if fields aren't empty
    if (empty($dname)){array_push($errors, "Name is required");}
    if (empty($dprice)){array_push($errors, "Price is required");}
    if (empty($dcat)){array_push($errors, "Category is required");}
    if (empty($dbrand)){array_push($errors, "Brand is required");}

    //check if fields are of appropriate length
    if (strlen($dname) > 200){array_push($errors, "Name is too long");}
    if (strlen($ddesc) > 500){array_push($errors, "Description is too long");}
    if (strlen($dkeyword) > 100){array_push($errors, "Keyword is too long");}





    //checking to see if picture is to be updated
    //check if a new file name is set
    if (!empty($_FILES["pimg"]["name"])){
            //image validation
    $target_dir = "../images/product/";
    $Target_file = $target_dir . basename($_FILES["pimg"]["name"]);
    $ImageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    //check if image has been uploaded
    if (empty($_FILES["pimg"]["name"])){
        array_push($errors, "File cannot be empty");
    }else{
        //check if its an actual image
        $check = getimagesize($_FILES["pimg"]["tmp_name"]);
    if ($check == false){
        array_push($errors, "File is not an image");
    }
    //check if file already exists
    if (file_exists($Target_file)){
        array_push($errors, "File already exists");
    }

    //limit file size
    if ($_FILES["pimg"]["size"] > 5000000){
        array_push($errors, "File is too large");
    }

    //limit file type
    if ($ImageFileType != "jpg" && $ImgeFileType != "png" && $ImageFileType != "jpeg" && $ImageFileType != "gif"){
        array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }
    }



    //if form is fine
    if (count($errors) == 0){
        $UploadImage = move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file);
        if ($UploadImage){
            $UpdateProduct = updateProduct($id, $dcat, $dbrand, $dname, $dprice, $ddesc, $Target_file, $dkeyword);

            if ($updateProduct){
                header("location: ../view/listproducts.php");
            }else{
                $AddFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Product Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
            }
        }else{
            $imgfail = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Image Failed to Upload
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }
    }
    }
    //if user isnt uploading new image
    else{
    if (count($errors) == 0){


            $UpdateProduct = updateProduct($id, $pcat, $dbrand, $dname, $dprice, $ddesc, $ProductDetails['product_image'], $dkeyword);

            if ($UpdateProduct){
                header("location: ../view/listproducts.php");
            }else{
                $AddFailed = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Product Addition Failed
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
            }

    }
    }

}
}

?>
