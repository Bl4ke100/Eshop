<?php
session_start();
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
    <title>Add New Product | Zen Mobiles</title>

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
                        <h1>Add New Products</h1>
                        <p>
                            <a href="manageProducts.php" class="btn btn-secondary me-2">Back To Manage Products</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="images/addnewproduct.png" class="img-fluid offset-4">
                    </div>
                </div>
            </div>
            <div class="col-lg-7">

            </div>
        </div>
    </div>
    </div>
    <!-- End Hero Section -->

    <div class="col-12 col-lg-6 fw-bold offset-3 set-bg" data-setbg="img/breadcumber2.png">
        <div class="row g-2">

            <div class="col-12 text-center mt-5">
                <h2 class="h2 text-primary fw-bold">Add a New Product</h2>
            </div>

            <div class="container-fluid">
                <div class="row gy-3">
                    <?php

                    if (isset($_SESSION["u"])) {

                        include "connection.php";

                    ?>

                        <div class="col-12">
                            <div class="row">



                                <div class="col-12">
                                    <div class="row">

                                        <div class="col-12 col-lg-12">
                                            <div class="row">

                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Select Product Category</label>
                                                </div>

                                                <div class="col-12">
                                                    <select class="form-select text-center" id="category">
                                                        <?php
                                                        $category_rs = Database::search("SELECT * FROM `category`");
                                                        $category_num = $category_rs->num_rows;

                                                        for ($x = 0; $x < $category_num; $x++) {
                                                            $category_data = $category_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $category_data["cat_id"]; ?>">
                                                                <?php echo $category_data["cat_name"]; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="col-12 col-lg-12">
                                            <div class="row">

                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Select Product Brand</label>
                                                </div>

                                                <div class="col-12">
                                                    <select class="form-select text-center" id="brand">
                                                        <option value="0">Select Brand</option>
                                                        <?php
                                                        $brand_rs = Database::search("SELECT * FROM `brand`");
                                                        $brand_num = $brand_rs->num_rows;

                                                        for ($x = 0; $x < $brand_num; $x++) {
                                                            $brand_data = $brand_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $brand_data["brand_id"]; ?>">
                                                                <?php echo $brand_data["brand_name"]; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr class="border-dark" />
                                        </div>

                                        <div class="col-12 col-lg-12">
                                            <div class="row">

                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Select Product Model</label>
                                                </div>

                                                <div class="col-12">
                                                    <select class="form-select text-center" id="model">
                                                        <option value="0">Select Model</option>
                                                        <?php
                                                        $model_rs = Database::search("SELECT * FROM `model`");
                                                        $model_num = $model_rs->num_rows;

                                                        for ($x = 0; $x < $model_num; $x++) {
                                                            $model_data = $model_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $model_data["model_id"]; ?>">
                                                                <?php echo $model_data["model_name"]; ?>
                                                            </option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr class="border-dark" />
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">
                                                        Add a Title
                                                    </label>
                                                </div>
                                                <div class=" col-12 col-lg-12">
                                                    <input type="text" class="form-control" id="title" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr class="border-dark" />
                                        </div>

                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Condition</label>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-check form-check-inline mx-5">
                                                                <input class="form-check-input" type="radio" name="c" id="b" checked />
                                                                <label class="form-check-label fw-bold" for="b">Brandnew</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="c" id="u" />
                                                                <label class="form-check-label fw-bold" for="u">Used</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <hr class="border-dark" />
                                                </div>

                                                <div class="col-12 col-lg-12">
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <label class="form-label fw-bold" style="font-size: 20px;">Select Product Colour</label>
                                                        </div>

                                                        <div class="col-12">

                                                            <select class="col-12 form-select" id="clr">
                                                                <option value="0">Select Colour</option>
                                                                <?php
                                                                $clr_rs = Database::search("SELECT * FROM `color`");
                                                                $clr_num = $clr_rs->num_rows;

                                                                for ($x = 0; $x < $clr_num; $x++) {
                                                                    $clr_data = $clr_rs->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo $clr_data["clr_id"]; ?>">
                                                                        <?php echo $clr_data["clr_name"]; ?>
                                                                    </option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>

                                                        </div>

                                                        <div class="col-12">
                                                            <div class="input-group mt-2 mb-2">
                                                                <input type="text" class="form-control" placeholder="Add new Colour" />
                                                                <button class="btn btn-outline-primary" type="button">+ Add</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <hr class="border-dark" />
                                                </div>

                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="number" class="form-control" value="0" min="0" id="qty" />
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr class="border-dark" />
                                        </div>

                                        <div class="col-12">
                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                                        </div>
                                                        <div class="col-12 col-lg-12">
                                                            <div class="input-group mb-2 mt-2">
                                                                <span class="input-group-text">Rs.</span>
                                                                <input type="text" class="form-control" id="cost" />
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr class="border-dark" />
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-12 offset-lg-1 col-lg-3">
                                                            <label class="form-label">Delivery cost Within Colombo</label>
                                                        </div>
                                                        <div class="col-12 col-lg-8">
                                                            <div class="input-group mb-2 mt-2">
                                                                <span class="input-group-text">Rs.</span>
                                                                <input type="text" class="form-control" id="dwc" />
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-12">
                                                    <div class="row">
                                                        <div class="col-12 offset-lg-1 col-lg-3">
                                                            <label class="form-label">Delivery cost out of Colombo</label>
                                                        </div>
                                                        <div class="col-12 col-lg-8">
                                                            <div class="input-group mb-2 mt-2">
                                                                <span class="input-group-text">Rs.</span>
                                                                <input type="text" class="form-control" id="doc" />
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr class="border-dark" />
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
                                                </div>
                                                <div class="col-12">
                                                    <textarea cols="30" rows="15" class="form-control" id="desc"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr class="border-dark" />
                                        </div>

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                                </div>
                                                <div class="offset-lg-1 col-12 col-lg-10">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <img src="images/addProduct.png" class="img-fluid" style="width: 250px;" id="i0" />
                                                        </div>
                                                        <div class="col-4">
                                                            <img src="images/addProduct.png" class="img-fluid" style="width: 250px;" id="i1" />
                                                        </div>
                                                        <div class="col-4">
                                                            <img src="images/addProduct.png" class="img-fluid" style="width: 250px;" id="i2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                                    <input type="file" class="d-none" multiple id="imageuploader" />
                                                    <label for="imageuploader" class="col-12 btn btn-dark me-2" style="justify-content: center; display: flex;" onclick="changeProductImage();">Upload Images</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr class="border-dark" />
                                        </div>


                                        <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                            <button class="btn btn-secondary me-2" onclick="addProduct();">Save Product</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php

                    } else {
                        header("Location: adminSignin.php");
                    }

                    ?>

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