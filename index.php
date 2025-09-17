<?php
session_start();
unset($_SESSION["login_token"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">

                <div class="card bg-dark mt-5 p-3" style="width: 800px;">
                    <div class="card-body">
                        <h4 class="card-title text-center text-white">Signup</h4>
                    </div>

                    <?php
                    if (isset($_SESSION["error_msg"])) {
                        ?>

                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong><?=$_SESSION["error_msg"];?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                        <?php
                    }
                    unset($_SESSION["error_msg"]);
                    ?>

                    <?php
                    if (isset($_SESSION["success_msg"])) {
                        ?>

                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong><?=$_SESSION["success_msg"];?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                        <?php
                    }
                    unset($_SESSION["success_msg"]);
                    ?>

                    <form action="config/user_login.php" method="post">
                        <div class="mb-3 mt-3 text-white">
                            <label for="username" class="form-label">Email:</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Username" required>
                        </div>
                        <div class="mb-3 text-white ">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                required>
                        </div>
                        <button type="submit" class="btn btn-success mb-3">Login</button>
                        <a href="sign-up.php" class="btn btn-primary mb-3">Sign-up</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>