<?php
include "../config/db_con.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <?php include "../assets/bootstrap/bootstrap.php"; ?>
</head>

<body>
    <?php include "module/navbar.php"; ?>
    <div class="container mt-3 p-5">
        <table class="table table-dark table-hover table-sm">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Full Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlQuery = "SELECT * FROM tbl_users";
                $result = mysqli_query($conn, $sqlQuery);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?=$row['user_id']?></td>
                        <td><?=$row['email']?></td>
                        <td><?=$row['password']?></td>
                        <td><?=$row['last_name']?>, <?=$row['first_name']?></td>
                        <td></td>
                    </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>