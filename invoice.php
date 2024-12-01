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
    <link href="style2.css" rel="stylesheet">
    <title>Invoice | Zen Mobiles</title>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

        <div class="container">
            <a class="navbar-brand" href="home.php">Furni<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item ">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class=""><a class="nav-link" href="shop.php">Shop</a></li>
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
                        <h1>Invoice</h1>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->


    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <hr />
            </div>

            <div class="col-12 btn-toolbar justify-content-end">
                <button class="btn btn-dark me-2"><i class="bi bi-printer-fill"></i> Print</button>
                <button class="btn btn-danger me-2"><i class="bi bi-filetype-pdf"></i> Export as PDF</button>
            </div>

            <div class="col-12">
                <hr />
            </div>

            <div class="col-12" id="page">
                <div class="row">

                    <div class="col-6">
                        <div class="ms-5 invoiceHeaderImage"></div>
                    </div>

                    <div class="col-6">
                        <div class="row">
                            <div class="col-12 text-primary text-decoration-underline text-end">
                                <h2>Zen Mobiles</h2>
                            </div>
                            <div class="col-12 fw-bold text-end">
                                <span>No.45, Kandy Road, Kadawatha.</span><br />
                                <span>+9471 8738 028</span><br />
                                <span>zenmobiles@gmail.com</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="border border-1 border-primary" />
                    </div>

                    <div class="col-12 mb-4">
                        <div class="row">

                            <div class="col-6">
                                <h5 class="fw-bold">INVOICE TO :</h5>
                                <h2>Bellamy Blake</h2>
                                <span>Kandy Rd, Gampaha</span><br />
                                <span>bl4ke100@gmail.com</span>
                            </div>

                            <div class="col-6 text-end mt-4">
                                <h1 class="text-primary">INVOICE 3</h1>
                                <span class="fw-bold">Data & Time of Invoice : </span>&nbsp;
                                <span class="fw-bold">2024-06-08 08:30:48</span>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr class="border border-1 border-secondary">
                                    <th>#</th>
                                    <th>Order ID & Product</th>
                                    <th class="text-end">Unit Price</th>
                                    <th class="text-end">Quantity</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr style="height: 72px;">
                                    <td class="bg-primary text-white fs-3">100</td>
                                    <td>
                                        <span class="fw-bold text-primary text-decoration-underline p-2">50</span><br />
                                        <span class="fw-bold text-primary fs-3 p-2">Samsung Galaxy S10 Plus</span>
                                    </td>
                                    <td class="fw-bold fs-6 text-end pt-3 bg-secondary text-white">Rs. 3000 .00</td>
                                    <td class="fw-bold fs-6 text-end pt-3">10</td>
                                    <td class="fw-bold fs-6 text-end pt-3 bg-secondary text-white">Rs. 30000 .00</td>
                                </tr>
                            </tbody>
                            <tfoot>

                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="fs-5 text-end fw-bold">SUBTOTAL</td>
                                    <td class="text-end">Rs. 30000 .00</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="fs-5 text-end fw-bold border-primary">Delivery Fee</td>
                                    <td class="text-end border-primary">Rs. 1000 .00</td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="border-0"></td>
                                    <td class="fs-5 text-end fw-bold border-primary text-primary">GRAND TOTAL</td>
                                    <td class="fs-5 text-end fw-bold border-primary text-primary">Rs. 31000 .00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-4 text-center" style="margin-top: -100px;">
                        <span class="fs-1 fw-bold text-success">Thank You !</span>
                    </div>

                    <div class="col-12 mt-3 mb-3 border-0 border-start border-5 border-primary rounded" style="background-color: #e7f2ff;">
                        <div class="row">
                            <div class="col-12 mt-3 mb-3">
                                <label class="form-label fs-5 fw-bold">NOTICE : </label>
                                <br />
                                <label class="form-label fs-6">Purchased items can return befor 7 days of Delivery.</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="border border-1 border-primary" />
                    </div>

                    <div class="col-12 text-center mb-3">
                        <label class="form-label fs-5 text-black-50 fw-bold">
                            Invoice was created on a computer and is valid without the Signature and Seal.
                        </label>
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