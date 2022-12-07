<?php
require_once("../controllers/productcontroller.php");
$errors = array();

if (isset($_POST['submit'])){
    //grab form inputs
    $dname = $_POST['dname'];
    $dprice = $_POST['dprice'];
    $dcat = $_POST['dcat'];
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

    //image validation
    $Target_dir = "../images/product/";
    $Target_file = $target_dir . basename($_FILES["pimg"]["name"]);
    $ImageFileType = strtolower(pathinfo($Target_file, PATHINFO_EXTENSION));


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
    if ($ImageFileType != "jpg" && $ImageFileType != "png" && $ImageFileType != "jpeg" && $ImageFileType != "gif"){
        array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }
    }



    //if form is fine
    if (count($errors) == 0){
        echo "file to be uploaded: ". $_FILES["pimg"]["tmp_name"];
        echo "<br>";
        echo "target file: " . $Target_file;
        echo "<br>";

        $UploadImage = move_uploaded_file($_FILES["pimg"]["tmp_name"], $target_file);
        echo "return value move uploaded: ". $UploadImage;
       
        if ($UploadImage){
            $AddProduct = AddProduct($dcat, $dbrand, $dname, $dprice, $ddesc, $Target_file, $dkeyword);

            if ($AddProduct){
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
            $Imgfail = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Image Failed to Upload
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
  </button>
</div>\n";
        }
    }

}
