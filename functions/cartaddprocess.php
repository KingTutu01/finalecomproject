<?php
require("../controllers/cartcontroller.php");

    //grab get data from links
    $pid = $_GET['pid'];
    $ipadd = $_GET['ipadd'];
    $cid = $_GET['cid'];
    $qty = $_GET['qty'];


        //check for log in
    if (empty($cid)){
        //check for duplicates

        $isDuplicate = CheckDuplicatesNull($pid, $ipadd);
        if ($isDuplicate){
        ?>
        <script type="text/javascript">
        alert("Product is already in cart. Consider increasing qty in your cart");
        window.location.href = "../view/index.php";
        </script>
        <?php
        }else{
            $insertIntoCart = InsertProductIntoCartNull_fxn($pid, $ipadd, $qty);
            if ($insertIntoCart){
                header("location: ../view/index.php");
            }else{
                echo "something went wrong";
            }
        }
    }else{
        $isDuplicate = CheckDuplicates($pid, $cid);
        if ($isDuplicate){
            ?>
            <script type="text/javascript">
            alert("Product is already in cart. Consider increasing qty in your cart");
            window.location.href = "../view/index.php";
            </script>
            <?php
        }else{
            $insertIntoCart = InsertProductIntoCart_fxn($pid, $ipadd, $cid, $qty);

            if ($insertIntoCart){
                header("location: ../view/index.php");
            }else{
                echo "something went wrong";
            }
         }
    }

?>
