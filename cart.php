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
	<title>Cart | Zen Mobiles</title>



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
						<h1>Cart</h1>
						<p class="mb-4">Review your selected phones and proceed to checkout for fast and secure mobile shopping.</p>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="hero-img-wrap">
						<img src="images/cart.png" class="img-fluid mb-5 offset-2">
					</div>
				</div>
			</div>
			<div class="col-lg-7">

			</div>
		</div>
	</div>
	</div>
	<!-- End Hero Section -->
	<?php
	if (isset($_SESSION["u"])) {

		$user = $_SESSION["u"]["email"];

		$total = 0;
		$subtotal = 0;
		$shipping = 0;

		$cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user . "'");
		$cart_num = $cart_rs->num_rows;

		if ($cart_num == 0) {
	?>

			<!-- Empty View -->
			<div class="col-12">
				<div class="row">
					<div class="col-12 text-center mb-2">
						<label style="font-weight: bold;" class="mt-5">
							<h1> 
								Nothing in the cart?
							</h1>
						</label>
					</div>
					<div class="offset-lg-4 col-12 col-lg-4 mb-4 d-grid">
						<a href="home.php" class="btn" style="justify-content: center; display: flex; font-weight: bolder; color: white; text-decoration: none;">
							Start Shopping
						</a>
					</div>
				</div>
			</div>
			<!-- Empty View -->
		<?php
		} else {
		?>
			<div class="untree_co-section before-footer-section">
				<div class="container">
					<div class="row mb-5">
						<form class="col-md-12" method="post">
							<div class="site-blocks-table">
								<table class="table">
									<thead>
										<tr>
											<th class="product-thumbnail">Image</th>
											<th class="product-name">Product</th>
											<th class="product-price">Price</th>
											<th class="product-quantity">Quantity</th>
											<th class="product-total">Total</th>
											<th class="product-remove">Remove</th>
										</tr>
									</thead>


									<?php

									for ($x = 0; $x < $cart_num; $x++) {
										$cart_data = $cart_rs->fetch_assoc();

										$product_rs = Database::search("SELECT * FROM `product` INNER JOIN `product_img` ON 
                                        product.id=product_img.product_id WHERE `id`='" . $cart_data["product_id"] . "'");
										$product_data = $product_rs->fetch_assoc();

										$total = $total + ($product_data["price"] * $cart_data["qty"]);

										$address_rs = Database::search("SELECT `district_id` AS did FROM `user_has_address` INNER JOIN `city` ON 
                                    user_has_address.city_city_id=city.city_id INNER JOIN `district` ON 
                                    city.district_district_id=district.district_id WHERE `user_email`='" . $user . "'");
										$address_data = $address_rs->fetch_assoc();

										$ship = 0;

										if ($address_data["did"] == 2) {
											$ship = $product_data["delivery_fee_colombo"];
											$shipping = $shipping + $ship;
										} else {
											$ship = $product_data["delivery_fee_other"];
											$shipping = $shipping + $ship;
										}

										$seller_rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $product_data["user_email"] . "'");
										$seller_data = $seller_rs->fetch_assoc();
										$seller = $seller_data["fname"] . " " . $seller_data["lname"];

									?>
										<tbody>
											<tr>
												<td class="product-thumbnail">
													<a href='<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>'>
														<img src="<?php echo $product_data["img_path"]; ?>" alt="Image" class="img-fluid">
													</a>
												</td>
												<td class="product-name">
													<h2 class="h5 text-black" href='<?php echo "singleProductView.php?id=" . ($product_data["id"]); ?>'><?php echo $product_data["title"]; ?></h2>
												</td>
												<td>Rs. <?php echo $product_data["price"]; ?> .00</td>
												<td>
													<div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
														<input type="number" class="form-control text-center quantity-amount" value="<?php echo $cart_data["qty"]; ?>" onchange="changeQTY(<?php echo $cart_data['cart_id']; ?>);" aria-label="Example text with button addon" aria-describedby="button-addon1" id="qty_num">
													</div>

												</td>
												<td>Rs.<?php echo ($product_data["price"] * $cart_data["qty"]) + $ship; ?>.00</td>
												<td><a href="#" class="btn btn-black btn-sm" onclick="deleteFromCart(<?php echo $cart_data['cart_id']; ?>);">X</a></td>
											</tr>
										<?php

									}

										?>

										</tbody>
								</table>
							</div>
						</form>
					</div>

					<div class="col-md-12 text-right border-bottom mb-5 border-dark">

					</div>

					<div class="row">

						<div class="col-md-6">
							<div class="row justify-content-start">
								<div class="col-md-7">
									<div class="row">
										<div class="col-md-12 text-right border-bottom mb-5">
											<h3 class="text-black h4 text-uppercase">Summary</h3>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-md-6">
											<span class="text-black">Items</span>
										</div>
										<div class="col-md-6 text-right">
											<strong class="text-black"><?php echo $cart_num; ?></strong>
										</div>
									</div>
									<div class="row mb-5">
										<div class="col-md-6">
											<span class="text-black">Subtotal</span>
										</div>
										<div class="col-md-6 text-right">
											<strong class="text-black">Rs. <?php echo $total; ?> .00</strong>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-md-6">
											<span class="text-black">Shipping</span>
										</div>
										<div class="col-md-6 text-right">
											<strong class="text-black">Rs. <?php echo $shipping; ?> .00</strong>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-md-6">
											<span class="text-black">Total</span>
										</div>
										<div class="col-md-6 text-right">
											<strong class="text-black">Rs. <?php echo $total + $shipping; ?> .00</strong>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12 mt-2">
											<button class="btn btn-black btn-lg py-3 btn-block" style="border: none;" onclick="checkout();">Place Order</button>
										</div>
									</div>
								<?php
							}

								?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
	} else {
		echo ("Please Login or Signup first.");
	}
		?>


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