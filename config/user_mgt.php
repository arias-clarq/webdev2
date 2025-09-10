<?php

include "db_con.php";

if(isset($_POST["new_user"])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $role = $_POST['role'];


    $sqlQuery = "INSERT INTO tbl_users (email, password, first_name, last_name, role) VALUES 
    ('$email', '$password', '$first_name', '$last_name', $role);";

    $result = mysqli_query($conn, $sqlQuery);

    if($result){
        $_SESSION["success_msg"] = "Successfuly Created New User";
        header("location: ../admin/User_Mgt.php");  
    }
}

if(isset($_POST["delete_user"])){
    $user_id = $_POST['user_id'];

    $sqlQuery = "DELETE FROM tbl_users WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sqlQuery);

    if($result){
        $_SESSION["success_msg"] = "Successfuly Deleted A User";
        header("location: ../admin/User_Mgt.php");  
    }
}

if(isset($_POST["update_user"])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_id = $_POST['user_id'];
    $role = $_POST['role'];


    $sqlQuery = "UPDATE tbl_users SET
    email = '$email',
    password = '$password',
    first_name = '$first_name',
    last_name = '$last_name',
    role = $role
    WHERE user_id = $user_id
    ";

    $result = mysqli_query($conn, $sqlQuery);

    if($result){
        $_SESSION["success_msg"] = "Successfuly Updated User Information";
        header("location: ../admin/User_Mgt.php");  
    }
}