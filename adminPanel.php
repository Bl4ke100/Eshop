<?php

session_start();
include "connection.php";

if (isset($_SESSION["au"])) {

?>

    <!DOCTYPE html>
    <html>

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
        <title>Admin Panel | Zen Mobiles</title>

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
                        <li class="nav-item active">
                            <a class="nav-link" href="adminPanel.php">Dashboard</a>
                        </li>
                        <li><a class="nav-link" href="manageProducts.php">Products</a></li>
                        <li><a class="nav-link" href="manageUsers.php">Users</a></li>
                    </ul>

                </div>
            </div>

        </nav>
        <!-- End Header/Navigation -->

        <!-- Start Hero Section -->
        <div class="hero">
            <div class="container">
                <div class="row justify-content-between col-12">
                    <div class="col-lg-5">
                        <div class="intro-excerpt">
                            <h1>Dashboard</h1>
                            <p><a href="manageUsers.php" class="btn btn-secondary me-2">Manage Users</a>
                                <a href="manageProducts.php" class="btn btn-secondary me-2">Manage Products</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-7">


                        <div class="col-lg-12 ">
                            <div class="row">
                                <div class="col-12 col-lg-10 text-end my-3 justify-content-end offset-2">
                                    <label class="col-12 col-lg-10 text-end my-3 form-label fs-4 fw-bold text-white">Total Active Time:</label>

                                    <?php

                                    $start_date = new DateTime("2024-05-09 07:00:00");

                                    $tdate = new DateTime();
                                    $tz = new DateTimeZone("Asia/Colombo");
                                    $tdate->setTimezone($tz);
                                    $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

                                    $difference = $end_date->diff($start_date);

                                    ?>

                                    <label class="form-label fs-4 fw-bold text-warning">
                                        <?php
                                        echo $difference->format('%Y') . " Years " . $difference->format('%m') . " Months " .
                                            $difference->format('%d') . " Days " . $difference->format('%H') . " Hours " .
                                            $difference->format('%i') . " Minutes " . $difference->format('%s') . " Seconds";
                                        ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- End Hero Section -->



        <div class="container-fluid">
            <div class="row">

                <div class="col-12 col-lg-12">
                    <div class="row">

                        <div class="col-12 mt-4">
                            <div class="row g-1">

                                <div class="col-6 col-lg-4 px-1 shadow">
                                    <div class="row g-1">

                                        <div class="col-12 hero text-white text-center rounded">
                                            <a href=""><img src="images/sellingsmonthly.png" alt="" style="height: 200px;"></a>
                                            <br />
                                            <span class="fs-4 fw-bold">Daily Earnings</span>

                                            <?php

                                            $today = date("Y-m-d");
                                            $thismonth = date("m");
                                            $thisyear = date("Y");

                                            $a = "0";
                                            $b = "0";
                                            $c = "0";
                                            $e = "0";
                                            $f = "0";

                                            $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                            $invoice_num = $invoice_rs->num_rows;

                                            for ($x = 0; $x < $invoice_num; $x++) {
                                                $invoice_data = $invoice_rs->fetch_assoc();

                                                $f = $f + $invoice_data["qty"]; //total qty

                                                $d = $invoice_data["date"];
                                                $splitDate = explode(" ", $d); //separate the date from time
                                                $pdate = $splitDate["0"]; //sold date

                                                if ($pdate == $today) {
                                                    $a = $a + $invoice_data["total"];
                                                    $c = $c + $invoice_data["qty"];
                                                }

                                                $splitMonth = explode("-", $pdate); //separate date as year,month & day
                                                $pyear = $splitMonth["0"]; //year
                                                $pmonth = $splitMonth["1"]; //month

                                                if ($pyear == $thisyear) {
                                                    if ($pmonth == $thismonth) {
                                                        $b = $b + $invoice_data["total"];
                                                        $e = $e + $invoice_data["qty"];
                                                    }
                                                }
                                            }

                                            ?>

                                            <br />
                                            <span class="fs-5">Rs. <?php echo $a; ?> .00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 hero text-white text-center rounded">
                                            <a href=""><img src="images/sellingdaily.png" alt="" style="height: 200px;"></a>
                                            <br />
                                            <span class="fs-4 fw-bold">Monthly Earnings</span>
                                            <br />

                                            <span class="fs-5">Rs. <?php echo $b; ?> .00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 hero text-white text-center rounded">
                                            <a href=""><img src="images/daily income.png" alt="" style="height: 200px;"></a>
                                            <br />
                                            <span class="fs-4 fw-bold">Today Sellings</span>
                                            <br />
                                            <span class="fs-5"><?php echo $c; ?> Items</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 hero text-white text-center rounded">
                                            <a href=""><img src="images/monthincome.png" alt="" style="height: 200px;"></a>
                                            <br />
                                            <span class="fs-4 fw-bold">Monthly Sellings</span>
                                            <br />
                                            <span class="fs-5"><?php echo $e; ?> Items</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1">
                                    <div class="row g-1">
                                        <div class="col-12 hero text-white text-center rounded">
                                            <a href=""><img src="images/total sellings.png" alt="" style="height: 200px;"></a>
                                            <br />
                                            <span class="fs-4 fw-bold">Total Sellings</span>
                                            <br />
                                            <span class="fs-5"><?php echo $f; ?> Items</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-lg-4 px-1 shadow">
                                    <div class="row g-1">
                                        <div class="col-12 hero text-white text-center rounded">
                                            <a href=""><img src="images/engagement.png" alt="" style="height: 200px;"></a>
                                            <br />
                                            <span class="fs-4 fw-bold">Total Engagements</span>
                                            <br />
                                            <?php
                                            $user_rs = Database::search("SELECT * FROM `user`");
                                            $user_num = $user_rs->num_rows;
                                            ?>
                                            <span class="fs-5"><?php echo $user_num; ?> Members</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-12">
                            <hr />
                        </div>



                        <div class="offset-1 col-10 col-lg-4 my-3 rounded bg-body">
                            <div class="row g-1">
                                <div class="col-12 text-center">
                                    <label class="form-label fs-4 fw-bold text-decoration-underline">Mostly Sold Item</label>
                                </div>

                                <?php

                                $freq_rs = Database::search("SELECT `product_id`,COUNT(`product_id`) AS `value_occurence` FROM `invoice` 
                                WHERE `date` LIKE '%" . $today . "%' GROUP BY `product_id` ORDER BY `value_occurence` DESC LIMIT 1");

                                $freq_num = $freq_rs->num_rows;

                                if ($freq_num > 0) {

                                    $freq_data = $freq_rs->fetch_assoc();

                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $freq_data["product_id"] . "'");
                                    $product_data = $product_rs->fetch_assoc();

                                    $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $freq_data["product_id"] . "'");
                                    $image_data = $image_rs->fetch_assoc();

                                    $qty_rs = Database::search("SELECT SUM(`qty`) AS `qty_total` FROM `invoice` WHERE 
                                    `product_id`='" . $freq_data["product_id"] . "' AND `date` LIKE '%" . $today . "%'");
                                    $qty_data = $qty_rs->fetch_assoc();

                                ?>
                                    <div class="col-12 text-center shadow">
                                        <img src="<?php echo $image_data["img_path"]; ?>" class="img-fluid rounded-top" style="height: 250px;" />
                                    </div>
                                    <div class="col-12 text-center my-3">
                                        <span class="fs-5 fw-bold"><?php echo $product_data["title"]; ?></span><br />
                                        <span class="fs-6"><?php echo $qty_data["qty_total"]; ?> items</span><br />
                                        <span class="fs-6">Rs. <?php echo $qty_data["qty_total"] * $product_data["price"]; ?> .00</span>
                                    </div>
                                <?php

                                } else {
                                ?>
                                    <!-- empty product -->
                                    <div class="col-12 text-center shadow">
                                        <img src="resource/empty.svg" class="img-fluid rounded-top" style="height: 250px;" />
                                    </div>
                                    <div class="col-12 text-center my-3">
                                        <span class="fs-5 fw-bold">-----</span><br />
                                        <span class="fs-6">--- items</span><br />
                                        <span class="fs-6">Rs. ----- .00</span>
                                    </div>
                                    <!-- empty product -->
                                <?php
                                }

                                ?>

                                <div class="col-12">
                                    <div class="first-place"></div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

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

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php

} else {
    echo ("You are not a valid user.");
}

?>