<?php
include "db_con.php";

$password = $_POST["password"];
$email = $_POST["email"];


$sqlQuery = "SELECT * FROM tbl_users WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sqlQuery);
$row = mysqli_fetch_assoc($result);

print_r($result);

if (mysqli_num_rows($result) <= 0){
    $_SESSION["error_msg"] = "Incorrect Username or Password";
    header("location: ../index.php");
    exit();
}

header("location: ../admin/Dashboard.php");
$_SESSION["success_msg"] = "Welcome {$row['last_name']},{$row['first_name']} To Dashboard";
$_SESSION["login_token"] = true;

$_SESSION["current_user"] = "{$row['last_name']},{$row['first_name']}";
$_SESSION["current_user_id"] = $row['user_id'];
$_SESSION["current_role"] = $row['role'];