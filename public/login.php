<?php require("../private/initialize.php"); ?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Sign In - Musival</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="../private/assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="index.php">Musival</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.php">Home</a></li>
					<?php if(isset($_SESSION["klant"]))
						{	?>
							<li><a href="profile.php">Profile</a></li>
							<?php
						}
						else
						{	?>
							<li><a href="login.php">Sign in</a></li>
							<?php
						}	
						?>
					<?php if(isset($_SESSION["klant"])) 
						{	?>
							<li><a href="logout.php">Log out</a></li>
							<?php
						}
					?>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<h1>Sign In</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<form method="POST" action="confirm.php">
							<label for="email">Email: </label>
							<input type="email" name="emailLogin">
							<label for="password">Password: </label>
							<input type="password" name="passwordLogin">
							<input type="submit" value="Sign In">
							<p>If you do not have a account you can register <a href="register.php">here</a>!</p>
						</form>
					</div>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						<section>
							<h3>About Musival</h3>
							<p>Musival is upcoming hardstyle festival hosted in The Netherlands, we provide some of the best hardstyle dj's and producers on our line-up every year. The festival takes place over a weekend, friday to sunday. With the ability to buy tickets for the camping and stay here. Happiness and joy is our top priority, we hope that is yours too so we can give you the time of your live.</p>
						</section>
						<section>
							<h4>Partners</h4>
							<ul class="alt">
								<li><a href="#">Grolsch</a></li>
								<li><a href="#">Coca-Cola</a></li>
								<li><a href="#">Bacardi</a></li>
								<li><a href="#">Timp</a></li>
							</ul>
						</section>
						<section>
							<h4>Social Media</h4>
							<ul class="plain">
								<li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
								<li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
								<li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
								<li><a href="#"><i class="icon fa-youtube">&nbsp;</i>YouTube</a></li>
							</ul>
						</section>
					</div>
					<div class="copyright">
						&copy; Musival 2020.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="../private/assets/js/jquery.min.js"></script>
			<script src="../private/assets/js/browser.min.js"></script>
			<script src="../private/assets/js/breakpoints.min.js"></script>
			<script src="../private/assets/js/util.js"></script>
			<script src="../private/assets/js/main.js"></script>

	</body>
</html>