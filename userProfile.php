<?php
session_start();
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


    <?php
    if (isset($_SESSION["u"])) {
        $data = $_SESSION["u"];
    ?>

        <title><?php echo $data["fname"]; ?> | Zen Mobiles</title>

    <?php

    } ?>

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
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li><a class="nav-link" href="shop.php">Shop</a></li>
                    <li><a class="nav-link" href="about.php">About us</a></li>
                    <li><a class="nav-link" href="services.php">Services</a></li>
                    <li><a class="nav-link" href="contact.php">Contact us</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="userProfile.php"><img src="images/user.svg"></a></li>
                    <li><a class="nav-link" href="cart.php"><img src="images/cart.svg"></a></li>
                    <li><a class="nav-link" href="advancedSearch.php"><img src="images/seaarch.png"></a></li>
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
                        <h1>My Profile</h1>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <!-- <img src="images/AdSearch.png" class="img-fluid"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <?php

    include "connection.php";

    if (isset($_SESSION["u"])) {

        $email = $_SESSION["u"]["email"];

        $details_rs = Database::search("SELECT * FROM `user` INNER JOIN `gender` ON 
                user.gender_gender_id=gender.gender_id WHERE `email`='" . $email . "'");

        $image_rs = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $email . "'");

        $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON 
                user_has_address.city_city_id=city.city_id INNER JOIN `district` ON 
                city.district_district_id=district.district_id INNER JOIN `province` ON 
                district.province_province_id=province.province_id WHERE `user_email`='" . $email . "'");

        $user_details = $details_rs->fetch_assoc();
        $image_details = $image_rs->fetch_assoc();
        $address_details = $address_rs->fetch_assoc();

    ?>



        <div class="col-12 ">
            <div class="row g-2">

                <div class="col-md-3 border-end">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                        <?php

                        if (empty($image_details["path"])) {
                        ?>
                            <img src="resource/new_user.png" class="rounded mt-5" style="width: 150px;" id="img" />
                        <?php
                        } else {
                        ?>
                            <img src="<?php echo $image_details["path"]; ?>" class="rounded mt-5" id="img" style="width: 150px;" />
                        <?php
                        }

                        ?>

                        <span class="fw-bold"><?php echo $user_details["fname"] . " " . $user_details["lname"] ?></span>
                        <span class="fw-bold text-black-50"><?php echo $email; ?></span>

                        <input type="file" class="d-none" id="profileimage" />
                        <label for="profileimage" class="btn btn-black-outline" onclick="changeProfileImg();">Update Profile Image</label>

                    </div>
                </div>

                <div class="col-md-5 border-end">
                    <div class="p-3 py-5">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="fw-bold">Edit Your Profile Details</h4>
                        </div>

                        <div class="row mt-4">

                            <div class="col-6">
                                <label class="form-label">First Name</label>
                                <input id="fname" type="text" class="form-control" value="<?php echo $user_details["fname"]; ?>" />
                            </div>

                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <input id="lname" type="text" class="form-control" value="<?php echo $user_details["lname"]; ?>" />
                            </div>

                            <div class="col-12">
                                <label class="form-label">Mobile</label>
                                <input id="mobile" type="text" class="form-control" value="<?php echo $user_details["mobile"]; ?>" />
                            </div>

                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?php echo $user_details["password"]; ?>" readonly />
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" readonly value="<?php echo $user_details["email"]; ?>" />
                            </div>

                            <div class="col-12">
                                <label class="form-label">Registered Date</label>
                                <input type="text" class="form-control" readonly value="<?php echo $user_details["joined_date"]; ?>" />
                            </div>

                            <div class="col-12">
                                <label class="form-label">Address Line 01</label>

                                <?php
                                if (empty($address_details["line1"])) {
                                ?>
                                    <input id="line1" type="text" class="form-control" />
                                <?php
                                } else {
                                ?>
                                    <input id="line1" type="text" class="form-control" value="<?php echo $address_details["line1"]; ?>" />
                                <?php
                                }
                                ?>

                            </div>

                            <div class="col-12">
                                <label class="form-label">Address Line 02</label>
                                <?php
                                if (empty($address_details["line2"])) {
                                ?>
                                    <input id="line2" type="text" class="form-control" />
                                <?php
                                } else {
                                ?>
                                    <input id="line2" type="text" class="form-control" value="<?php echo $address_details["line2"]; ?>" />
                                <?php
                                }
                                ?>
                            </div>

                            <?php
                            $province_rs = Database::search("SELECT * FROM `province`");
                            $district_rs = Database::search("SELECT * FROM `district`");
                            $city_rs = Database::search("SELECT * FROM `city`");
                            ?>

                            <div class="col-6">
                                <label class="form-label">Province</label>
                                <select class="form-select" id="province">
                                    <option value="0">Select Province</option>
                                    <?php
                                    for ($x = 0; $x < $province_rs->num_rows; $x++) {
                                        $province_data = $province_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $province_data["province_id"]; ?>" <?php
                                                                                                        if (!empty($address_details["province_id"])) {
                                                                                                            if ($province_data["province_id"] == $address_details["province_id"]) {
                                                                                                        ?>selected<?php
                                                                                                                }
                                                                                                            }
                                                                                                                    ?>>
                                            <?php echo $province_data["province_name"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-6">
                                <label class="form-label">District</label>
                                <select class="form-select" id="district">
                                    <option value="0">Select District</option>
                                    <?php
                                    for ($x = 0; $x < $district_rs->num_rows; $x++) {
                                        $district_data = $district_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $district_data["district_id"]; ?>" <?php
                                                                                                        if (!empty($address_details["district_id"])) {
                                                                                                            if ($district_data["district_id"] == $address_details["district_id"]) {
                                                                                                        ?>selected<?php
                                                                                                                }
                                                                                                            }
                                                                                                                    ?>>
                                            <?php echo $district_data["district_name"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="col-6">
                                <label class="form-label">City</label>
                                <select class="form-select" id="city">
                                    <option value="0">Select City</option>
                                    <?php
                                    for ($x = 0; $x < $city_rs->num_rows; $x++) {
                                        $city_data = $city_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $city_data["city_id"]; ?>" <?php
                                                                                                if (!empty($address_details["city_id"])) {
                                                                                                    if ($city_data["city_id"] == $address_details["city_id"]) {
                                                                                                ?>selected<?php
                                                                                                        }
                                                                                                    }
                                                                                                            ?>>
                                            <?php echo $city_data["city_name"]; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Postal Code</label>
                                <?php
                                if (empty($address_details["postal_code"])) {
                                ?>
                                    <input id="pcode" type="text" class="form-control" />
                                <?php
                                } else {
                                ?>
                                    <input id="pcode" type="text" class="form-control" value="<?php echo $address_details["postal_code"]; ?>" />
                                <?php
                                }
                                ?>

                            </div>

                            <div class="col-12">
                                <label class="form-label">Gender</label>
                                <input type="text" class="form-control" value="<?php echo $user_details["gender_name"]; ?>" readonly />
                            </div>

                            <div class="col-12 d-grid mt-2">
                                <button class="btn btn-secondary me-2" onclick="updateProfile();">Update My Profile</button>
                            </div>

                            <div class="col-12 d-grid mt-2">
                                <button class="btn btn-danger me-2" onclick="signout();">Sign out</button>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-md-4 text-center">

                    <div class="col-10 offset-1 d-grid mt-5">
                        <a href="purchasingHistory.php">
                            <button class="btn btn-secondary me-2">Purchasing History</button>
                        </a>
                    </div>
                    <div class="col-10 offset-1 d-grid mt-2">
                        <a href="watchlist.php">
                            <button class="btn btn-black me-2">Whishlist</button>
                        </a>
                    </div>

                    <div class="row">
                        <span class="fw-bold text-black-50 mt-5">Display ads</span>
                    </div>
                </div>

            </div>
        </div>

        </div>
        </div>

        <!-- Start Footer Section -->
	<footer class="footer-section">
		<div class="container relative">

			<div class="sofa-img">
				<img src="images/mobile phones/iphone-15-pro.png" alt="Image" class="img-fluid">
			</div>

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
					<p class="mb-4">Welcome to Tech Haven, your go-to shop for the latest mobile phones. We offer a wide range of smartphones to fit every need and budget. Enjoy great prices and excellent customer service. Visit us today!</p>

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
    <?php
    } else {
    ?>

        <script>
            window.location = "login.php";
        </script>

    <?php
    }

    ?>

    <!-- End Footer Section -->


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>
    <script src="script.js"></script>
</body>

</html>