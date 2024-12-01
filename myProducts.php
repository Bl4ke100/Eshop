<?php

session_start();
include "connection.php";

if (isset($_SESSION["u"])) {
    $email = $_SESSION["u"]["email"];
    $pageno;

?>
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
        <link href="style2.css" rel="stylesheet">
        <title>Update Products | Zen Mobiles</title>
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
                            <h1>Update Products</h1>
                            <p>
                                <a href="manageProducts.php" class="btn btn-secondary me-2">Back to Manage Products</a>
                                <a href="addProduct.php" class="btn btn-secondary me-2 mt-2">Add Product</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="hero-img-wrap">
                            <img src="images/updateproduct.png" class="img-fluid" style="height: 400px;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
        </div>
        <!-- End Hero Section -->


        <!-- filter -->
        <div class="col-12 col-lg-10 hero mt-5 offset-1">
            <div class="row">
                <div class="col-12 mt-3 fs-5">
                    <div class="row">

                        <div class="col-12 offset-1">
                            <label class="form-label fw-bold fs-3" style="color: white;">Sort Products</label>

                            <div class="row">
                                <div class="col-10">
                                    <input type="text" placeholder="" class="form-control" id="s" />
                                </div>
                                <div class="col-1 p-1">
                                    <label class="form-label"><i class="bi bi-search fs-5"></i></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row offset-1 mt-3" style="color: black;">
                        <div class="col-lg-4">
                            <label class="form-label fw-bold">Active Time</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r1" id="n">
                                <label class="form-check-label" for="n">Newest to oldest</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r1" id="o">
                                <label class="form-check-label" for="o">Oldest to newest</label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label class="form-label fw-bold">By quantity</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r2" id="h">
                                <label class="form-check-label" for="h">High to low</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r2" id="l">
                                <label class="form-check-label" for="l">Low to high</label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label class="form-label fw-bold">By condition</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r3" id="b">
                                <label class="form-check-label" for="b">Brandnew</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="r3" id="u">
                                <label class="form-check-label" for="u">Used</label>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 text-center mt-3 mb-3">
                        <div class="row g-2">
                            <div class="col-12 col-lg-4 d-grid  offset-1">
                                <button class="btn btn-success fw-bold" onclick="sort1(0);">Sort</button>
                            </div>
                            <div class="col-12 col-lg-4 d-grid offset-1">
                                <button class="btn btn-secondary fw-bold" onclick="clearSort();">Clear</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- filter -->


        <div class="untree_co-section product-section before-footer-section">
            <div class="container">
                <div class="row" id="sort">
                    <?php

                    if (isset($_GET["page"])) {
                        $pageno = $_GET["page"];
                    } else {
                        $pageno = 1;
                    }

                    $product_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "'");
                    $product_num = $product_rs->num_rows;

                    $results_per_page = 12;
                    $number_of_pages = ceil($product_num / $results_per_page);

                    $page_results = ($pageno - 1) * $results_per_page;
                    $selected_rs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $email . "' 
                    LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                    $selected_num = $selected_rs->num_rows;
                    for ($x = 0; $x < $selected_num; $x++) {
                        $selected_data = $selected_rs->fetch_assoc();
                    ?>

                        <!-- Start Column -->
                        <div class="col-12 col-md-4 col-lg-3 mb-5">
                            <a style="height: 400px;" class="product-item">
                                <?php
                                $product_img_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $selected_data["id"] . "'");
                                $product_img_data = $product_img_rs->fetch_assoc();
                                ?>
                                <img src="<?php echo $product_img_data["img_path"]; ?>" class="img-fluid product-thumbnail">
                                <h3 class="product-title"><?php echo $selected_data["title"]; ?></h3>
                                <strong class="product-price">Rs. <?php echo $selected_data["price"]; ?> .00</strong>
                                <?php if ($selected_data["qty"] > 0) { ?>
                                    <h4 class="product-title"></h4>
                                <?php } else { ?>
                                    <h4 class="product-title" style="color: red;">Sold Out!</h4>
                                <?php } ?>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row g-1">
                                            <div class="col-12 d-grid">
                                                <button class="btn btn-success fw-bold" onclick="sendid(<?php echo $selected_data['id']; ?>);">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- End Column -->
                    <?php } ?>
                </div>
                <!-- Pagination -->
                <nav>
                    <ul class="pagination justify-content-center">
                        <!-- Previous Button -->
                        <?php if ($pageno > 1) { ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $pageno - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item disabled">
                                <a class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        <?php } ?>

                        <!-- Page Numbers -->
                        <?php for ($i = 1; $i <= $number_of_pages; $i++) { ?>
                            <li class="page-item <?php if ($pageno == $i) echo 'active'; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>

                        <!-- Next Button -->
                        <?php if ($pageno < $number_of_pages) { ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $pageno + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="page-item disabled">
                                <a class="page-link" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>

            </div>
        </div>


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
    </body>

    </html>

    <?php

}

    ?>ෆ