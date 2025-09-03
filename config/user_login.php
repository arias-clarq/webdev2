<?php
include "db_con.php";

$password = $_POST["password"];
$email = $_POST["email"];


$sqlQuery = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sqlQuery);

print_r($result);

if (mysqli_num_rows($result) <= 0){
    $_SESSION["error_msg"] = "Incorrect Username or Password";
    header("location: ../loginForm.php");
    exit();
}

header("location: ../admin/Dashboard.php");
$_SESSION["success_msg"] = "Welcome To Dashboard";
$_SESSION["login_token"] = true;