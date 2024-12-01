<?php
include "connection.php";

if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $product_rs = Database::search("SELECT product.id,product.price,product.qty,product.description,
    product.title,product.datetime_added,product.delivery_fee_colombo,product.delivery_fee_other,
    product.category_cat_id,product.model_has_brand_id,product.condition_condition_id,
    product.status_status_id,product.user_email,model.model_name AS mname,brand.brand_name AS bname FROM 
    `product` INNER JOIN `model_has_brand` ON model_has_brand.id=product.model_has_brand_id INNER JOIN 
    `brand` ON brand.brand_id=model_has_brand.brand_brand_id INNER JOIN `model` ON 
    model.model_id=model_has_brand.model_model_id WHERE product.id='" . $pid . "'");

    $product_num = $product_rs->num_rows;
    if ($product_num == 1) {

        $product_data = $product_rs->fetch_assoc();


?>

        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="author" content="Untree.co">
            <link rel="shortcut icon" href="favicon.png">
            <title><?php echo $product_data["title"]; ?> | Zen Mobiles</title>


            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
            <link href="css/tiny-slider.css" rel="stylesheet">
            <link href="css/style.css" rel="stylesheet">
            <link rel="stylesheet" href="css/style2.css" type="text/css">

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
                            <li class="nav-item ">
                                <a class="nav-link" href="home.php">Home</a>
                            </li>
                            <li><a class="nav-link" href="shop.php">Shop</a></li>
                            <li><a class="nav-link" href="about.php">About us</a></li>
                            <li><a class="nav-link" href="services.php">Services</a></li>
                            <li><a class="nav-link" href="blog.php">Blog</a></li>
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
                                <h1><?php echo $product_data["title"]; ?></h1>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="hero-img-wrap">
                                <!-- <img src="images/cart.png" class="img-fluid"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Product Details Section Begin -->
            <section class="product-details spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="col-12 product__details__pic" style="display: flex;">
                                <div class="col-12 col-lg-4">
                                    <ul>
                                        <?php
                                        $image_rs = Database::search("SELECT * FROM `product_img` WHERE `product_id`='" . $pid . "'");
                                        $image_num = $image_rs->num_rows;
                                        $img = array();

                                        if ($image_num != 0) {
                                            for ($x = 0; $x < $image_num; $x++) {
                                                $image_data = $image_rs->fetch_assoc();
                                                $img[$x] = $image_data["img_path"];
                                        ?>
                                                <li class="d-flex flex-column justify-content-center align-items-center 
                                                    border border-1 border-secondary mb-1">
                                                    <img src="<?php echo $img[$x]; ?>" class="img-thumbnail mt-1 mb-1" id="productImg<?php echo $x; ?>" onclick="showImg(this.src)" />
                                                </li>

                                                <script type="text/javascript">
                                                    let bigImg = document.querySelector('.big-img img');

                                                    function showImg(pic) {
                                                        bigImg.src = pic;
                                                    }
                                                </script>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <li class="d-flex flex-column justify-content-center align-items-center 
                                                border border-1 border-secondary mb-1">
                                                <img src="resource/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                            </li>
                                            <li class="d-flex flex-column justify-content-center align-items-center 
                                                border border-1 border-secondary mb-1">
                                                <img src="resource/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                            </li>
                                            <li class="d-flex flex-column justify-content-center align-items-center 
                                                border border-1 border-secondary mb-1">
                                                <img src="resource/empty.svg" class="img-thumbnail mt-1 mb-1" />
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="col-lg-8 order-2 order-lg-1 d-none d-lg-block">
                                    <div class="row">
                                        <div class="col-12 align-items-center">
                                            <img id="mainImg" class="mainImg" src="<?php echo isset($img[0]) ? $img[0] : 'resource/empty.svg'; ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product__details__text">
                                <h3><?php echo $product_data["title"]; ?><span>Brand: <?php echo $product_data["bname"]; ?></span></h3>
                                <div class="rating">
                                    <i class="bi bi-star-fill text-warning fs-5"></i>
                                    <i class="bi bi-star-fill text-warning fs-5"></i>
                                    <i class="bi bi-star-fill text-warning fs-5"></i>
                                    <i class="bi bi-star-fill text-warning fs-5"></i>
                                    <i class="bi bi-star-fill text-warning fs-5"></i>
                                    <span>( 138 reviews )</span>
                                </div>

                                <?php

                                $price = $product_data["price"];
                                $adding_price = ($price / 100) * 10;
                                $new_price = $price + $adding_price;
                                $difference = $new_price - $price;

                                ?>

                                <div class="product__details__price">Rs. <?php echo $price; ?> .00<span>Rs. <?php echo $new_price; ?> .00</span></div>
                                <p>Save Rs. <?php echo $difference; ?> .00 (10%)</p>
                                <div class="product__details__button">
                                    <div class="border border-1 border-secondary rounded overflow-hidden 
                float-left position-relative product-qty">
                                        <div class="col-12">
                                            <span class="fw-bold">&nbsp; Quantity : </span>
                                            <input onkeyup='check_value(<?php echo $product_data["qty"]; ?>);' type="text" class="border-0 fs-5 fw-bold text-start" style="outline: none;" pattern="[0-9]" value="1" id="qty_input" />

                                            <div class="position-absolute qty-buttons" style="right: 10px; top: 50%; transform: translateY(-50%); display: flex;">
                                                <div class="justify-content-center d-flex flex-column align-items-center qty-inc">
                                                    <i class="bi bi-caret-up-fill text-primary fs-5" onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'></i>
                                                </div>
                                                <div class="justify-content-center d-flex flex-column align-items-center qty-dec">
                                                    <i class="bi bi-caret-down-fill text-primary fs-5" onclick="qty_dec();"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mt-2">
                                        <button class="cart-btn" type="submit" id="payhere-payment" style="border: none;" onclick="payNow(<?php echo $pid; ?>);">Buy Now</button>
                                        <button class="cart-btn" onclick="addToCart(<?php echo $selected_data['id']; ?>);" style="border: none;">Add to Cart</button>
                                    </div>


                                    <button class="cart-btn" style="border: none;" onclick="addToWatchlist(<?php echo $pid; ?>)">
                                        <i class="bi bi-heart-fill"></i>
                                    </button>
                                    </ul>
                                </div>

                                <div class="product__details__widget">
                                    <ul>
                                        <li>
                                            <span>Availability:</span>
                                            <div class="stock__checkbox">
                                                <label>
                                                    <?php echo $product_data["qty"]; ?> Items Available
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <span>Promotions:</span>
                                            <div class="stock__checkbox">
                                                <label>
                                                    Free Shipping
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="product__details__tab">

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <h6>Description</h6>
                                        <p><?php echo $product_data["description"]; ?></p>
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>



                </div>

            </section>
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
            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/jquery.magnific-popup.min.js"></script>
            <script src="js/jquery-ui.min.js"></script>
            <script src="js/mixitup.min.js"></script>
            <script src="js/jquery.countdown.min.js"></script>
            <script src="js/jquery.slicknav.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/jquery.nicescroll.min.js"></script>
            <script src="js/main.js"></script>
            <script src="bootstrap.bundle.js"></script>
            <script src="script.js"></script>
            <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



        </body>

        </html>

<?php

    } else {
        echo ("Sorry for the inconvenience.Please try again later.");
    }
} else {
    echo ("Something Went Wrong.");
}

?>