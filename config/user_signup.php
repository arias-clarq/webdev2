<?php
include "db_con.php";

$password = $_POST["password"];
$cpassword = $_POST["c-password"];
$email = $_POST["email"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$role = 3;

if ($password != $cpassword) {
    $_SESSION["error_msg"] = "Password Doesn't Match";
    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["email"] = $email;
    header("location: ../sign-up.php");
    exit();
}

$sqlQuery = "INSERT INTO tbl_users(email, password, first_name, last_name, role) 
VALUES ('$email', '$password', '$first_name', '$last_name', $role)";

$result = mysqli_query($conn, $sqlQuery);

if ($result) {
    $_SESSION["success_msg"] = "Successfuly Created An Account";
    unset($_SESSION["first_name"]);
    unset($_SESSION["last_name"]);
    unset($_SESSION["email"]);
    header("location: ../index.php");
    exit();
}else{
    $_SESSION["error_msg"] = "Something went wrong";
    header("location: ../signup.php");
    exit();
}
