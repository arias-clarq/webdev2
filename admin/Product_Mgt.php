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
    <title>Product Managment</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <?php include "module/navbar.php"; ?>

    <div class="row mt-5 m-2 p-3 table-responsive">
        <table class="table table-lg table-dark table-hover text-center">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>

                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#new">New Product</button>

                        <form action="../config/product_mgt.php" method="post" enctype="multipart/form-data">
                            <div class="modal fade text-dark" id="new">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">New Product</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="form-label">Product Name:</label>
                                                    <input type="text" class="form-control" name="product_name"
                                                        placeholder="Enter Product Name" required>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Product Image:</label>
                                                    <input type="file" class="form-control" name="product_img" required>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Product Price:</label>
                                                    <input type="number" class="form-control" name="product_price"
                                                        placeholder="Enter Product Price" min="100" required>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Product Qty:</label>
                                                    <input type="number" min="0" class="form-control" name="product_qty"
                                                        placeholder="Enter Product Quantity" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" name="add_product" class="btn btn-success btn-sm">Add
                                                Product</button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>

                    </td>
                </tr>
                <?php
                $sqlQuery = "SELECT * FROM `tbl_products` ";
                $result = mysqli_query($conn, $sqlQuery);
                $count = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $count++;
                    ?>
                    <tr>
                        <td><?= $count ?></td>
                        <td><?= $row['product_name'] ?></td>
                        <td>
                            <div class="card" style="width:100px; height:100px;">
                                <img class="card-img-top" src="../assets/img/product/<?= $row['img'] ?>">
                            </div>
                        </td>
                        <td>₱<?= $row['price'] ?></td>
                        <td><?= $row['quantity'] ?></td>
                        <td></td>
                    </tr>
                <?php }
                ?>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>

</body>

</html>