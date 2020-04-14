<?php require("../private/initialize.php"); ?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Home - Musival</title>
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
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>Musival</h1>
					<p>One of the biggest upcoming festivals<br />
					brought to you by <a href="#">VW-Events</a></p>
				</div>
				<video autoplay loop muted playsinline src="../private/images/banner.mp4"></video>
			</section>

		<!-- Tickets -->
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>Tickets</h2>
						<p>Listed below are the different type of tickets we offer for the festival.</p>
					</header>
					<div class="highlights">
						<section>
							<div class="content">
								<header>
									<h3>Basic</h3>
								</header>
								<p>The cheapest ticket we offer, you can enjoy one day of great music when purchasing this ticket.</p>
								<form method="POST" action="buytickets.php">
									<table>
										<input type="submit" value="Buy" name="basic">
									</table>
								</form>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<h3>Premium</h3>
								</header>
								<p>The second ticket. You can enjoy two days of great music, without sleeping here.</p>
								<form method="POST" action="buytickets.php">
									<table>
										<input type="submit" value="Buy" name="premium">
									</table>
								</form>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<h3>VIP</h3>
								</header>
								<p>The best ticket we offer. The full weekend experience, sleep and stay here.</p>
								<form method="POST" action="buytickets.php">
									<table>
										<input type="submit" value="Buy" name="vip">
									</table>
								</form>
							</div>
						</section>
					</div>
				</div>
			</section>

		<!-- Quote -->
			<section id="cta" class="wrapper">
				<div class="inner">
					<h2>QUOTE</h2>
					<p>"For me the best feeling is seeing someone else be happy, especially if i gave them that joy by creating this festival" ~ CEO <a href="#">VW-Events</a></p>
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