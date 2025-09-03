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
    <?php include "../assets/bootstrap/bootstrap.php";?>
</head>

<body>

    <?php include "module/navbar.php";?>

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