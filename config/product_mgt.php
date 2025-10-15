<?php

include "db_con.php";

if(isset($_POST["add_product"])){
    $targetDir = "../assets/img/product/";
    $fileName = basename($_FILES["product_img"]["name"]);

    $targetedFilePath = $targetDir . $fileName;

    if(!move_uploaded_file($_FILES["product_img"]["tmp_name"], $targetedFilePath)){
        die("Unable to upload Image due to error");
    }

    $product_name = $_POST["product_name"];
    $product_img = $fileName;
    $product_qty = $_POST["product_qty"];
    $product_price = $_POST["product_price"];

    $sqlQuery = "INSERT INTO `tbl_products`(`product_name`, `price`, `quantity`, `img`) VALUES ('$product_name',$product_price,$product_qty,'$product_img')";

    if(mysqli_query($conn, $sqlQuery)){
        header("location: ../admin/Product_Mgt.php");
    }
}