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
    <title>Purchasing History | Zen Mobiles</title>
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
                <h1>Add New Products</h1>
                <p>
                    <a href="userProfile.php" class="btn btn-secondary me-2">Back To Your Profile</a>
                </p>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="hero-img-wrap">
                <img src="images/perchasehistory.png" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-lg-7">

    </div>
</div>
</div>
</div>
<!-- End Hero Section -->

    <div class="container-fluid">
        <div class="row">

           

            <div class="col-12 text-center mt-5">
                <span class="fs-1 fw-bold text-primary">Purchasing History</span>
            </div>

            <!-- empty view -->
            <div class="col-12 text-center bg-body" style="height: 450px;">
                <span class="fs-1 fw-bold text-black-50 d-block" style="margin-top: 200px;">
                    You have not purchased any item yet...
                </span>
            </div>
            <!-- empty view -->

            <!-- Have Product -->
            <!-- <div class="col-12">
                <div class="row">

                    <div class="col-12 d-none d-lg-block">
                        <div class="row">
                            <div class="col-1 bg-light">
                                <label class="form-label fw-bold">#</label>
                            </div>
                            <div class="col-3 bg-light">
                                <label class="form-label fw-bold">Order Details</label>
                            </div>
                            <div class="col-1 bg-light text-end">
                                <label class="form-label fw-bold">Quantity</label>
                            </div>
                            <div class="col-2 bg-light text-end">
                                <label class="form-label fw-bold">Amount</label>
                            </div>
                            <div class="col-2 bg-light text-end">
                                <label class="form-label fw-bold">Purchased Date & Time</label>
                            </div>
                            <div class="col-3 bg-light"></div>
                            <div class="col-12">
                                <hr />
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 col-lg-1 bg-info text-center text-lg-start">
                                <label class="form-label text-white fs-6 py-5">01</label>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="row">
                                    <div class="card mx-0 mx-lg-3 my-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">

                                                <img src="resource/mobile_images/iphone12.jpg"
                                                    class="img-fluid rounded-start" />
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">

                                                    <h5 class="card-title">Apple iPhone 12</h5>
                                                    <p class="card-text"><b>Seller : </b>Sahan Perera</p>
                                                    <p class="card-text"><b>Price : </b>Rs. 100000 .00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-1 text-center text-lg-end">
                                <label class="form-label fs-4 py-5">01</label>
                            </div>
                            <div class="col-12 col-lg-2 text-center text-lg-end bg-info">
                                <label class="form-label fs-5 py-5 text-white">Rs. 100000 .00</label>
                            </div>
                            <div class="col-12 col-lg-2 text-center text-lg-end">
                                <label class="form-label fs-5 px-3 py-5">2023-12-30 08:30:40</label>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="row">
                                    <div class="col-6 d-grid">
                                        <button
                                            class="btn btn-secondary rounded border border-1 border-primary mt-5 fs-5">
                                            <i class="bi bi-info-circle-fill"></i> Feedback
                                        </button>
                                    </div>
                                    <div class="col-6 d-grid">
                                        <button class="btn btn-danger rounded mt-5 fs-5">
                                            <i class="bi bi-trash3-fill"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <hr />
                    </div>

                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="offset-lg-10 col-12 col-lg-2 d-grid">
                                <button class="btn btn-danger rounded mt-5 fs-5">
                                    <i class="bi bi-trash3-fill"></i> Delete All Records
                                </button>
                            </div>
                        </div>
                    </div> -->

                    <!-- model -->
                    <div class="modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Add New Feedback</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label class="form-label fw-bold">Type</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="type"
                                                                id="type1" />
                                                            <label class="form-check-label text-success fw-bold"
                                                                for="type1">
                                                                Positive
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="type"
                                                                id="type2" checked />
                                                            <label class="form-check-label text-warning fw-bold"
                                                                for="type2">
                                                                Neutral
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="type"
                                                                id="type3" />
                                                            <label class="form-check-label text-danger fw-bold"
                                                                for="type3">
                                                                Negative
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label class="form-label fw-bold">User's Email</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control" id="mail" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label class="form-label fw-bold">Feedback</label>
                                                    </div>
                                                    <div class="col-9">
                                                        <textarea class="form-control" cols="50" rows="8"
                                                            id="feed"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-outline-primary">Save Feedback</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <!-- model -->

                </div>
            </div>
            <!-- Have Product -->


        </div>
    </div>

    <!-- Start Footer Section -->
	<footer class="footer-section">
		<div class="container relative">

			<div class="sofa-img">
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

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>