<?php
//connect to the product class
require_once("../classes/productclass.php");

//add new brand function
//takes brand name

function AddNewBrand($brandName){
    //create an instance
    $newProductObject = new productClass();

    //run the add new brand method
    $AddBrand = $newProductObject->AddNewBrand($brandName);

    if ($AddBrand){
        //return the query result
        return $AddBrand;
    }else{
        return false;
    }
}

/*
display all brands
*/
function ReturnBrands(){
    //create an instance
    $newProductObject = new productClass();

    //run the select all brands method
    $selectBrands = $newProductObject->DisplayBrands();

    //check if select worked
    if ($selectBrands){

        $brands = array();

        while($record = $newProductObject->db_fetch()){
            $brands[$record['brand_id']] = $record['brand_name'];
        }

        //return the array
        return $brands;

    }else{
        return false;
    }

}


//update brand name
function UpdateBrandName($brandID, $brandName){
    //create an instance
    $newProductObject = new productClass();

    //run the update method
    $updateBrand = $newProductObject->UpdateBrand($brandID, $brandName);

    //check if it worked
    if($updateBrand){
        return $updateBrand;
    }else{
        return false;
    }
}

//delete brand name
function DeleteBrandName($brandID){
    //create an instance
    $newProductObject = new productClass();

    //run the update method
    $deleteBrand = $newProductObject->DeleteBrand($brandID);

    //check if it worked
    if ($deleteBrand){
        return $deleteBrand;
    }else{
        return false;
    }
}

//add a new category
function AddCategory($name){
    //create an instance of the class
    $newProductObject = new productClass();

    //run the add category method
    $addCategory = $newProductObject->AddCategory($name);

    //check if it worked
    if($addCategory){
        return $addCategory;
    }else{
        return false;
    }
}

//view all categories
function DisplayCategories(){
    //create an instance of the class
    $newProductObject = new productClass();

    //run the display categories method
    $displayCategory = $newProductObject->DisplayCategories();

    //check if it worked
    if ($displayCategory){

        $categories = array();

        //loop through the rows
        while($record = $newProductObject->db_fetch()){
            $categories[$record['cat_id']] = $record['cat_name'];
        }

        //return array
        return $categories;
    }else{
        return false;
    }
}

//update a category
function UpdateCategory($id, $name){
    //create an instance of the class
    $newProductObject = new productClass();

    //run the display categories method
    $updateCategory = $newProductObject->UpdateCategory($id, $name);

    //check if it worked
    if($updateCategory){
        return $updateCategory;
    }else{
        return false;
    }
}

//delete a category
function DeleteCategory($id){
    //create an instance of the class
    $newProductObject = new productClass();

    //run the display categories method
    $deleteCategory = $newProductObject->DeleteCategory($id);

    //check if it worked
    if($deleteCategory){
        return $deleteCategory;
    }else{
        return false;
    }
}

/*
*controller functions to add, edit, delete and view all products
*/

//function to add product
function AddProduct($cat, $brand, $title, $price, $desc, $img, $keywords){
    //create an instance of the class
    $newProductObject = new productClass();

    //add product
    $addProduct = $newProductObject->AddProduct($cat, $brand, $title, $price, $desc, $img, $keywords);

    //check if add worked
    if ($addProduct){
        return $addProduct;
    }else{
        return false;
    }
}

//function to list products for editing
function ListProductsID(){
    //create an instance of the class
    $newProductObject = new productClass();

    //run the select query
    $runquery = $newProductObject->ListProductsID();

    //check the query worked
    if($runquery){
        //create array to store ids
        $ids = array();
        //loop through the select result and store the ids in the array
        while($record = $newProductObject->db_fetch()){
            $ids[$record['product_id']] = $record['product_title'];
        }

        //return the array
        return $ids;
    }else{
        return false;
    }

}

//function to update product
function UpdateProduct($id, $cat, $brand, $title, $price, $desc, $img, $keywords){
    //create an instance of the class
    $newProductObject = new productClass();

    //run the update method
    $runQuery = $newProductObject->UpdateProduct($id, $cat, $brand, $title, $price, $desc, $img, $keywords);

    //check if it worked
    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

//function to return a product's details
function ReturnProduct($id){
    //create an instance of the class
    $newProductObject = new productClass();

    //run the select method
    $runQuery = $newProductObject->ReturnProduct($id);

    //if it worked
    if($runQuery){
        //create array
        $productArray = array();
        while($record = $newProductObject->db_fetch()){

            $productArray['cat_name'] = $record['cat_name'];
            $productArray['brand_name'] = $record['brand_name'];
            $productArray['product_title'] = $record['product_title'];
            $productArray['product_price'] = $record['product_price'];
            $productArray['product_desc'] = $record['product_desc'];
            $productArray['product_image'] = $record['product_image'];
            $productArray['product_keywords'] = $record['product_keywords'];
            $productArray['cat_id'] = $record['cat_id'];
            $productArray['brand_id'] = $record['brand_id'];

        }
        return $productArray;
    }else{
        return false;
    }
}

//function to delete product
function DeleteProduct($id){
    //create an instance of the class
    $newProductObject = new productClass();

    //run the select method
    $runQuery = $newProductObject->deleteProduct($id);

    //check if it worked
    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

//function to display products
function DisplayProducts($start, $limit){
    //create an instance of the class
    $newProductObject = new productClass();

    //run the select method
    $runQuery = $newProductObject->DisplayProducts($start, $limit);

    //if it worked
    if($runQuery){
        //create array
        $productArray = array();
        while($record = $newProductObject->db_fetch()){

            $productArray[$record['product_id']] = [$record['brand_name'],
                                                    $record['cat_name'],
                                                    $record['product_title'],
                                                    $record['product_desc'],
                                                    $record['product_image'],
                                                    $record['product_keywords'],
                                                    $record['product_price']];



        }
        return $productArray;
    }else{
        return false;
    }
}

//function to count products
function CountRows(){
    //create an instance of the class
    $newProductObject = new productClass();

    //run the select method
    $runQuery = $newProductObject->CountRows();

    if($runQuery){
        $countProducts = $newProductObject->db_fetch();
        return $countProducts;
    }else{
        return false;
    }
}

//function to search for products
function SearchProducts($searchTerm){
    //create an instance of the class
    $newProductObject = new productClass();

    //run the select method
    $runQuery = $newProductObject->SearchProduct($searchTerm);

    if($runQuery){
        $searchArray = array();
        while ($record = $newProductObject->db_fetch()){
            $searchArray[$record['product_id']] = [ $record['product_title'],
                                                    $record['product_image'],
                                                    $record['product_price']];
        }
        return $searchArray;
    }else{
        return false;
    }
}

?>
