<?php

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
	<title>Sign up | Zen Mobiles</title>
</head>

<body>

	<!-- header -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

		<div class="container">
			<a class="navbar-brand" href="home.php">Zen<span>.</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>


		</div>

	</nav>
	<!-- header -->



	<!-- content -->

	<div class="hero">
		<div class="row">

			<!-- signupbox -->

			<div class="offset-3 col-12 col-lg-6 fw-bold " id="signUpBox" style="color: black;">
				<div class="row ">

					<div class="intro-excerpt">
						<h1>Create a new account</h1>
					</div>

					<div class="col-12 d-none" id="msgdiv">
						<div class="alert alert-danger" role="alert" id="msg">

						</div>
					</div>

					<div class="col-6 mb-2">
						<label class="form-label">First Name</label>
						<input type="text" class="form-control" placeholder="ex:- John" id="fname" />
					</div>

					<div class="col-6 mb-2">
						<label class="form-label">Last Name</label>
						<input type="text" class="form-control" placeholder="ex:- Doe" id="lname" />
					</div>

					<div class="col-12 mb-2">
						<label class="form-label">Email</label>
						<input type="email" class="form-control" placeholder="ex:- john@gmail.com" id="email" />
					</div>

					<div class="col-12 mb-2">
						<label class="form-label">Password</label>
						<input type="password" class="form-control" placeholder="ex:- **********" id="password" />
					</div>

					<div class="col-6 mb-2">
						<label class="form-label">Mobile</label>
						<input type="text" class="form-control" placeholder="ex:- 0771234568" id="mobile" />
					</div>

					<div class="col-6">
						<label class="form-label">Gender</label>
						<select class="form-control" id="gender">

							<?php

							$rs = Database::search("SELECT * FROM `gender`");
							$num = $rs->num_rows;

							for ($x = 0; $x < $num; $x++) {
								$data = $rs->fetch_assoc();
							?>

								<option value="<?php echo $data["gender_id"]; ?>">
									<?php echo $data["gender_name"]; ?>
								</option>

							<?php
							}

							?>

						</select>
					</div>

					<div class="col-12 col-lg-6 d-grid mt-2">
						<button class="btn btn-secondary me-2" onclick="signup();">Sign Up</button>
					</div>

					<div class="col-12 col-lg-6 d-grid mt-2">
						<button class="btn btn-white-outline" onclick="changeView();">Already have an account?</button>
					</div>

				</div>
			</div>

			<!-- signupbox -->

			<!-- signinbox -->

			<div class="col-12 col-lg-6 d-none offset-3" id="signInBox">
				<div class="row g-2 fw-bold" style="color: black;">
					<div class="intro-excerpt">
						<h1>Sign In</h1>
					</div>

					<div class="col-12 d-none" id="msgdiv1">
						<div class="alert alert-danger" role="alert" id="msg1">

						</div>
					</div>

					<?php
					$email = "";
					$password = "";

					if (isset($_COOKIE["email"])) {
						$email = $_COOKIE["email"];
					}

					if (isset($_COOKIE["password"])) {
						$password = $_COOKIE["password"];
					}
					?>

					<div class="col-12 mb-2">
						<label class="form-label">Email</label>
						<input type="email" class="form-control" id="email2" value="<?php echo $email; ?>" />
					</div>
					<div class="col-12 mb-2">
						<label class="form-label">Password</label>
						<input type="password" class="form-control" id="password2" value="<?php echo $password; ?>" />
					</div>
					<div class="col-6 mb-2">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="rememberme" />
							<label class="form-check-label">Remember Me</label>
						</div>
					</div>
					<div class="col-6 text-end">
						<a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
					</div>
					<div class="col-12 col-lg-6 d-grid">
						<button class="btn btn-secondary me-2" onclick="signin();">Sign In</button>
					</div>
					<div class="col-12 col-lg-6 d-grid">
						<button class="btn btn-white-outline" onclick="changeView();">New to Zen? Join Now</button>
					</div>
				</div>
			</div>

			<!-- signinbox -->

		</div>
	</div>

	<!-- content -->

	<!-- modal -->
	<div class="modal" tabindex="-1" id="fpmodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Forgot Password</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<div class="row g-3">

						<div class="col-6">
							<label class="form-label">New Password</label>
							<div class="input-group mb-3">
								<input type="password" class="form-control" id="np" />
								<button id="npb" class="btn btn-outline-secondary" type="button" onclick="showPassword1();">Show</button>
							</div>
						</div>

						<div class="col-6">
							<label class="form-label">Re-type Password</label>
							<div class="input-group mb-3">
								<input type="password" class="form-control" id="rnp" />
								<button id="rnpb" class="btn btn-outline-secondary" type="button" onclick="showPassword2();">Show</button>
							</div>
						</div>

						<div class="col-12">
							<label class="form-label">Verification Code</label>
							<input type="text" class="form-control" id="vcode" />
						</div>

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
				</div>
			</div>
		</div>
	</div>
	<!-- modal -->

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
	<script src="bootstrap.js"></script>
</body>

</html>