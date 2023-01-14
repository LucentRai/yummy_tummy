<?php
	require_once("../resources/config.php");
	require('../resources/templates/front/header.php');
?>

	<link rel="stylesheet" href="./css/chef-login.css" />
  <link rel="stylesheet" href="./css/chef-signup.css">

</head>
<body>
<!-- Login modal box -->
	<input type="checkbox" id="show-hide-form" hidden>
	<div id="overlay" onclick="hideLoginForm()">
	</div>
	<div class="wrapper" id="login">
		<label for="show-hide-form" class="x-btn">&#10005;</label>
		<div class="logo">
			<img src="https://img.icons8.com/emoji/48/000000/man-cook.png"/>
		</div>
		<div class="text-center mt-4 name"></div>
		<form class="p-3 mt-3" action="login.php" method="post">
			<div class="form-field d-flex align-items-center">
				<span class="far fa-user"></span>
				<input
					type="number"
					name="ph_number"
					placeholder="Phone Number"
				/>
			</div>
			<div class="form-field d-flex align-items-center">
				<span class="fas fa-key"></span>
				<input
					type="password"
					name="password"
					placeholder="Password"
				/>
			</div>
			<input type="submit" class="btn mt-3" name="user-login" value="Log in">
		</form>
		<div class="text-center fs-6">
			<a href="#">Forget password?</a> or <a href="chef-signup.html">Sign up</a>
		</div>
	</div>
<!-- End of Login modal box -->

<!-- Sign up modal box -->
<input type="checkbox" id="show-hide-sign-form" hidden>
<div id="sign-up-overlay" onclick="hideSignUpForm()">
</div>
<div class="signupFrm" id="sign-up">
	<form action="register.php" method="post" class="form">
		<label for="show-hide-sign-form" class="x-btn">&#10005;</label>
		<div class="inputContainer">
			<input type="text" class="input" required name="firstname">
			<label for="firstname" class="label">Firstname</label>
		</div>

		<div class="inputContainer">
			<input type="text" class="input" required name="lastname">
			<label for="lastname" class="label">Lastname</label>
		</div>

		<div class="inputContainer">
			<input type="text" class="input" required name="address">
			<label for="address" class="label">Address</label>
		</div>

		<div class="inputContainer">
			<input type="text" class="input" required name="ph_number">
			<label for="ph_number" class="label">Contact Number</label>
		</div>
		
		<div class="inputContainer">
			<input type="email" class="input" required name="email">
			<label for="email" class="label">Email</label>
		</div>

		<div class="inputContainer">
			<select name="type" class="form-select">
				<option selected value="0">Consumer</option>
				<option value="1">Chef</option>
			</select>
		</div>

		<div class="inputContainer">
			<input type="password" class="input" required name="password">
			<label for="password" class="label">Password</label>
		</div>

		<div class="inputContainer">
			<input type="password" class="input" required name="password1">
			<label for="password1" class="label">Confirm Password</label>
		</div>

		<input type="submit" class="submitBtn" name="user-sign-up" value="Sign Up">
	</form>
</div>
<!-- End of Signup modal box -->

	<!-- nav-bar  -->
	<div class="container">
		<header class="d-flex flex-wrap align-items-center justify-content-around justify-content-md-between py-3  border-bottom">
			<a href="/" class="d-flex align-items-left ">
				<img src="./img/logo.png" class="d-block mx-lg-auto img-fluid" alt="yummy tummy" width="25"
					height="25" loading="lazy">
			</a>
			<div class="col-md-3 text-end">
			<?php
				if(!$is_logged_in){
			?>
				<label type="button" class="btn btn-outline-success me-2" for="show-hide-form">Log in</label>
				<label type="button" class="btn btn-outline-danger" for="show-hide-sign-form">Sign up</label>
			<?php
				}
				else{
					$query = query("SELECT * FROM users WHERE id='{$_SESSION['user']}'");
					confirm($query);
					$user = mysqli_fetch_array($query);
					if($user['type'] == CLIENT_USER){
						$link = 'user.php?id=' . $_SESSION['user'];
					}
					else{
						$link = 'chef.php?id=' . $_SESSION['user'];
					}
					echo <<<DELIMETER
				<a class="link-info" href="{$link}">{$user['firstname']}</a>
				DELIMETER;
				}
			?>
			</div>
		</header>
	</div>

	<!-- mid-section  -->
	<div class="container col-xxl-8 px-4 ">
		<div class="row flex-lg-row-reverse align-items-center g-5 py-5">

			<div class="col-lg-6">
				<h1 class="display-5 fw-bold lh-1 mb-3">Get healthy food in reach community chief !</h1>
				<p class="lead my-4">Enjoy homely and healthy food while enriching housewife and home-chef with opportunity to earn through their cooking skills.</p>

			</div>
			<div class="col-10 col-sm-8 col-lg-6">
				<img src="./img/65648892.png" class="d-block mx-lg-auto img-fluid" alt="yummy tummy" width="700"
					height="500" loading="lazy">
			</div>
		</div>
	</div>

	<!-- Features -->

	<section id="features">

		<div class="row">

			<div class="feature-box col-lg-4">
				<i class=" icon fa-solid fa-circle-check fa-2x"></i>
				<h3>Easy to use.</h3>
				<p>So easy to use, One click and done.</p>
			</div>

			<div class="feature-box col-lg-4 ">
				<i class="icon fa-solid fa-bullseye fa-2x"></i>
				<h3>Elite Clientele</h3>
				<p>We have everything to suite your taste, the best foods.</p>
			</div>

			<div class="feature-box col-lg-4 ">
				<i class="icon fa-solid fa-truck-fast fa-2x"></i>
				<h3>Delivery fast AF.</h3>
				<p>Find what you want to eat, Food at your doorstep.</p>
			</div>
		</div>

	</section>

	<!-- about section  -->
	<div class="px-4 text-center py-5">
		
		<h1 class="display-5 fw-bold">About Us</h1>
		<div class="col-lg-6 mx-auto">
		  <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
		</div>
	  </div>


	<!-- footer -->
	<div class="container">
		<footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
			<div class="col mb-3 my-5">
				<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
					<img src="./img/logo.png" class="d-block mx-lg-auto img-fluid" alt="yummy tummy" width="50" height="50" loading="lazy">
				</a>
				<p class="text-muted my-4">Yummy Tummy</p>
			</div>

			<div class="col mb-3">

			</div>

			<div class="col mb-3">
				<h5>Kathmandu</h5>
				<ul class="nav flex-column">
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Newroad</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Koteshor</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Bouddha</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Kalanki</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Thapathali</a></li>
				</ul>
			</div>

			<div class="col mb-3">
				<h5>Bhaktapur</h5>
				<ul class="nav flex-column">
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Sipadol</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Thimi</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Bhatgaon</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Katunje</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Madhyapur</a></li>
				</ul>
			</div>

			<div class="col mb-3">
				<h5>Lalitpur</h5>
				<ul class="nav flex-column">
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Satdobato</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Balkhu</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Balkumari</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Patan</a></li>
					<li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Lagankhel</a></li>
				</ul>
			</div>
		</footer>
	</div>

	<div class="container">
		<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
			<div class="col-md-4 d-flex align-items-center">
				
				<span class="mb-3 mb-md-0 text-muted">© 2023 Y-ENGINE</span>
			</div>

			<ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
				<li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
							<use xlink:href="#twitter"></use>
						</svg></a></li>
				<li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
							<use xlink:href="#instagram"></use>
						</svg></a></li>
				<li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24">
							<use xlink:href="#facebook"></use>
						</svg></a></li>
			</ul>
		</footer>
	</div>

	<!-- bootstrap script  -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"></script>
</body>

</html>