<?php
session_start();
include "connection.php";
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
    <title>Manage Users | Zen Mobiles</title>



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
                    <li><a class="nav-link" href="manageProducts.php">Products</a></li>
                    <li class="active"><a class="nav-link" href="manageUsers.php">Users</a></li>
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
                        <h1>Manage Users</h1>
                        <p class="mb-4"></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="images/panageuser.png" class="img-fluid" style="height: 400px;">
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
                                    <th class="product-id">User ID</th>
                                    <th class="product-thumbnail">Profile Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Email</th>
                                    <th class="product-quantity">Mobile</th>
                                    <th class="product-total">Registered Date</th>
                                    <th class="product-remove"></th>
                                </tr>
                            </thead>

                            <?php

                            $query = "SELECT * FROM `user`";
                            $pageno;

                            if (isset($_GET["page"])) {
                                $pageno = $_GET["page"];
                            } else {
                                $pageno = 1;
                            }

                            $user_rs = Database::search($query);
                            $user_num = $user_rs->num_rows;

                            $results_per_page = 20;
                            $number_of_pages = ceil($user_num / $results_per_page);

                            $page_results = ($pageno - 1) * $results_per_page; // 0 , 20 , 40
                            $selected_rs = Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

                            $selected_num = $selected_rs->num_rows;

                            for ($x = 0; $x < $selected_num; $x++) {
                                $selected_data = $selected_rs->fetch_assoc();

                            ?>
                                <tbody>
                                    <tr>
                                        <td class="product-id">
                                            <h2 class="h5 text-black"><?php echo $x + 1; ?></h2>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a>

                                                <?php
                                                $profile_img_rs = Database::search("SELECT * FROM `profile_img` WHERE 
                            `user_email`='" . $selected_data["email"] . "'");
                                                $profile_img_num = $profile_img_rs->num_rows;

                                                if ($profile_img_num == 1) {
                                                    $profile_img_data = $profile_img_rs->fetch_assoc();
                                                ?>
                                                    <img src="<?php echo $profile_img_data["path"]; ?>" alt="Image" class="img-fluid">
                                                <?php
                                                } else {
                                                ?>
                                                    <img src="resource/new_user.svg" alt="Image" class="img-fluid">
                                            </a>
                                        <?php
                                                }
                                        ?>
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></h2>
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black"><?php echo $selected_data["email"]; ?></h2>
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black"><?php echo $selected_data["mobile"]; ?></h2>
                                        </td>
                                        <td class="product-name">
                                            <?php
                                            $splitDate = explode(" ", $selected_data["joined_date"]);
                                            ?>
                                            <h2 class="h5 text-black"><?php echo $splitDate[0]; ?></h2>
                                        </td>
                                        <td class="product-name">
                                            <?php
                                            if ($selected_data["status_status_id"] == 1) {
                                            ?>
                                                <button id="ub<?php echo $selected_data["email"]; ?>" onclick="blockUser('<?php echo $selected_data['email']; ?>');" class="btn btn-secondary me-2" style="color: red;">Block</button>
                                            <?php
                                            } else {
                                            ?>
                                                <button id="ub<?php echo $selected_data["email"]; ?>" onclick="blockUser('<?php echo $selected_data['email']; ?>');" class="btn btn-secondary me-2" style="color: green;">Unblock</button>
                                            <?php
                                            }
                                            ?>
                                        </td>

                                    </tr>

                                </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
                            }

?>



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