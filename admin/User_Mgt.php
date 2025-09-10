<?php
include "../config/db_con.php";
$current_role = $_SESSION['current_role'];

if ($_SESSION["login_token"] != true) {
    header("location: ../index.php");
}
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
    <div class="container mt-3 p-2">
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
    </div>
    <div class="row mt-2 m-2 p-3">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Full Name</th>
                    <th>Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <form action="../config/user_mgt.php" method="post">
                    <tr>
                        <td></td>
                        <td><input type="text" class="form-control-md" name="email" placeholder="Enter Email" required>
                        </td>
                        <td><input type="password" class="form-control-md" name="password" placeholder="Enter Password"
                                required></td>
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control-md" name="first_name"
                                        placeholder="Enter First Name" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control-md" name="last_name"
                                        placeholder="Enter Last Name" required>
                                </div>
                            </div>
                        </td>
                        <td>
                            <select class="form-select form-select-sm" name="role">
                                <option disabled>Please Select A Role</option>
                                <?php
                                if ($current_role != 2) {
                                    ?>
                                    <option value="1">Admin</option>
                                <?php } ?>
                                <option value="2">Staff</option>
                            </select>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                data-bs-target="#new">New User</button>

                            <div class="modal fade text-dark" id="new">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">New User</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            are you sure you want to create new user?
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" name="new_user" class="btn btn-success btn-sm">New
                                                User</button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                </form>
                <?php
                $current_user = $_SESSION["current_user_id"];
                $sqlQuery = "SELECT * FROM tbl_users WHERE user_id != $current_user ";
                $result = mysqli_query($conn, $sqlQuery);
                $counter = 0;

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $counter++;
                        ?>
                        <form action="../config/user_mgt.php" method="post">
                            <tr>
                                <td><?= $counter ?></td>
                                <td><input type="text" class="form-control-md" name="email" value="<?= $row['email'] ?>"></td>
                                <td><input type="password" class="form-control-md" name="password"
                                        value="<?= $row['password'] ?>"></td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" class="form-control-md" name="first_name"
                                                value="<?= $row['first_name'] ?>">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control-md" name="last_name"
                                                value="<?= $row['last_name'] ?>">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    if ($current_role != 2) {
                                        ?>

                                        <select class="form-select form-select-sm" name="role">
                                            <option disabled>Please Select A Role</option>
                                            <option value="1" <?php if ($row['role'] == 1) {
                                                echo "selected";
                                            } ?>>Admin</option>
                                            <option value="2" <?php if ($row['role'] == 2) {
                                                echo "selected";
                                            } ?>>Staff</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td>
                                    <input type="number" name="user_id" value="<?= $row['user_id'] ?>" hidden>
                                    <div class="row">
                                        <div class="col">
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#update<?= $row['user_id'] ?>">Update</button>

                                            <div class="modal fade text-dark" id="update<?= $row['user_id'] ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Update User</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            are you sure you want to update user info?
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="submit" name="update_user"
                                                                class="btn btn-primary btn-sm">Update</button>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <?php
                                        if ($current_role != 2) {
                                            ?>
                                            <div class="col">
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete<?= $row['user_id'] ?>">Delete</button>

                                                <div class="modal fade text-dark" id="delete<?= $row['user_id'] ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete User</h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                are you sure you want to delete this user?
                                                            </div>

                                                            <!-- Modal footer -->
                                                            <div class="modal-footer">
                                                                <button type="submit" name="delete_user"
                                                                    class="btn btn-danger btn-sm">Delete</button>
                                                                <button type="button" class="btn btn-primary btn-sm"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>

                                </td>
                            </tr>
                        </form>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>