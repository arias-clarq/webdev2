<?php
session_start();
$host = "localhost";
$database = "db_ordering_system";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_errno()){
    die("". mysqli_connect_errno());
}