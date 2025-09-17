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
                        <h4 class="card-title text-center text-white">Signup Form</h4>
                    </div>

                    <?php
                    if (isset($_SESSION["error_msg"])) {
                        ?>

                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong><?= $_SESSION["error_msg"]; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                        <?php
                    }
                    unset($_SESSION["error_msg"]);
                    ?>

                    <form action="config/user_signup.php" method="post">
                        <div class="mb-3 mt-3 text-white">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">First Name:</label>
                                    <input type="text" class="form-control" name="first_name"
                                        placeholder="Enter First Name" value="<?php if (isset($_SESSION["first_name"])) {
                                            echo $_SESSION["first_name"];
                                        } ?>" required>
                                </div>
                                <div class="col">
                                    <label class="form-label">Last Name:</label>
                                    <input type="text" class="form-control" name="last_name"
                                        placeholder="Enter Last Name" value="<?php if (isset($_SESSION["last_name"])) {
                                            echo $_SESSION["last_name"];
                                        } ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 mt-3 text-white">
                            <label for="username" class="form-label">Email:</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Username"
                                value="<?php if (isset($_SESSION["email"])) {
                                    echo $_SESSION["email"];
                                } ?>" required>
                        </div>
                        <div class="mb-3 text-white ">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                required>
                        </div>
                        <div class="mb-3 text-white ">
                            <label for="password" class="form-label">Confirm Password:</label>
                            <input type="password" class="form-control" placeholder="Enter Password" name="c-password"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Signup</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>