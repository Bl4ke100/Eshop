<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Manage Products | Zen Mobiles</title>



</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="home.php">Zen<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="adminPanel.php">Dashboard</a>
                    </li>
                    <li class="active"><a class="nav-link" href="manageProducts.php">Products</a></li>
                    <li><a class="nav-link" href="manageUsers.php">Users</a></li>
                </ul>

            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Manage Products</h1>
                        <p>
                            <a href="myProducts.php" class="btn btn-secondary me-2">Update Products</a>
                            <a href="sellingHistory.php" class="btn btn-secondary me-2">Selling History</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 mb-5">
                    <div class="hero-img-wrap">
                        <img src="images/manageproducts.png" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-id">Produc ID</th>
                                    <th class="product-thumbnail">Product Image</th>
                                    <th class="product-name">Title</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Registered Date</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>


                            <?php
                            include "connection.php";

                            $query = "SELECT * FROM `product`";
                            $pageno;

                            if (isset($_GET["page"])) {
                                $pageno = $_GET["page"];
                            } else {
                                $pageno = 1;
                            }

                            $product_rs = Database::search($query);
                            $product_num = $product_rs->num_rows;

                            $results_per_page = 8;
                            $number_of_pages = ceil($product_num / $results_per_page);

                            $page_results = ($pageno - 1) * $results_per_page; // 0 , 20 , 40
                            $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                            $selected_num = $selected_rs->num_rows;

                            for ($x = 0; $x < $selected_num; $x++) {
                                $selected_data = $selected_rs->fetch_assoc();
                            ?>
                                <tbody>
                                    <tr>
                                        <td class="product-id">
                                            <h2 class="h5 text-black"><?php echo $selected_data["id"]; ?></h2>
                                        </td>
                                        <td class="product-thumbnail" onmouseenter="viewProductModal('<?php echo $selected_data['id']; ?>');">

                                            <?php
                                            $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $selected_data["id"] . "'");
                                            $image_num = $image_rs->num_rows;

                                            if ($image_num == 0) {
                                            ?>

                                                <a>
                                                    <img src="" alt="Image" class="img-fluid">
                                                </a>
                                            <?php
                                            } else {
                                                $image_data = $image_rs->fetch_assoc();
                                            ?>

                                                <a>
                                                    <img src="<?php echo $image_data["img_path"]; ?>" alt="Image" class="img-fluid">
                                                </a>
                                            <?php
                                            }
                                            ?>


                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black"><?php echo $selected_data["title"]; ?></h2>
                                        </td>
                                        <td>Rs. <?php echo $selected_data["price"]; ?> .00</td>
                                        <td class="product-quantity">
                                            <h2 class="h5 text-black"><?php echo $selected_data["qty"]; ?></h2>
                                        </td>
                                        <td class="product-total">
                                            <h2 class="h5 text-black"><?php echo $selected_data["datetime_added"]; ?></h2>
                                        </td>

                                        <td>

                                            <?php

                                            if ($selected_data["status_status_id"] == 1) {
                                            ?>

                                                <a id="pb<?php echo $selected_data['id']; ?>" onclick="blockProduct('<?php echo $selected_data['id']; ?>');">Block</a>

                                            <?php
                                            } else {
                                            ?>
                                                <a id="pb<?php echo $selected_data['id']; ?>" onclick="blockProduct('<?php echo $selected_data['id']; ?>');">Unblock</a>

                                            <?php
                                            }
                                            ?>
                                        </td>
                                        </td>
                                    </tr>
                                <?php

                            }

                                ?>

                                </tbody>
                        </table>
                    </div>
                </form>
            </div>


            <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-lg justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="
                            <?php if ($pageno <= 1) {
                                echo ("#");
                            } else {
                                echo "?page=" . ($pageno - 1);
                            } ?>
                            " aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php
                        for ($x = 1; $x <= $number_of_pages; $x++) {
                            if ($x == $pageno) {
                        ?>
                                <li class="page-item active">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                            <?php
                            } else {
                            ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
                                </li>
                        <?php
                            }
                        }
                        ?>

                        <li class="page-item">
                            <a class="page-link" href="
                            <?php if ($pageno >= $number_of_pages) {
                                echo ("#");
                            } else {
                                echo "?page=" . ($pageno + 1);
                            } ?>
                            " aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!--  -->

    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">


            <div class="row">
                <div class="col-lg-8">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

                        <form action="#" class="row g-3">
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="col-auto">
                                <input type="email" class="form-control" placeholder="Enter your email">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Zen<span>.</span></a></div>
                    <p class="mb-4">Welcome to Zen Mobiles, your go-to shop for the latest mobile phones. We offer a wide range of smartphones to fit every need and budget. Enjoy great prices and excellent customer service. Visit us today!</p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="about.php">About us</a></li>
                                <li><a href="services.php">Services</a></li>
                                <li><a href="contact.php">Contact us</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Knowledge base</a></li>
                                <li><a href="#">Live chat</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Our team</a></li>
                                <li><a href="#">Leadership</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>


                    </div>
                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved.
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- End Footer Section -->


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>
    <script src="script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>


    <script>
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    </script>


</body>

</html>