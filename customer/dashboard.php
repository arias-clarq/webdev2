<?php
session_start();

if($_SESSION["login_token"] != true){
    header("location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

    <?php include "module/navbar.php";?>
    <h1>Welcome to Customer Dashboard</h1>
    <?php
    if (isset($_SESSION["success_msg"])) {
        ?>

        <div class="alert alert-success alert-dismissible" role="alert">
            <strong><?= $_SESSION["success_msg"]; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>

        <?php
    }
    unset($_SESSION["success_msg"]);
    ?>
</body>

</html>