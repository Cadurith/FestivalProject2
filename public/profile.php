<?php require("../private/initialize.php"); ?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Profile - Musival</title>
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

		<!-- Heading -->
			<div id="heading" >
				<h1>Profile</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">

					<!-- Profile -->
						
						<?php
							if(isset($_SESSION['klant']))
							{
								?>
								<!-- Information -->

								<div id="left">
									<h3>Profile information</h3>
								<?php
								
								$sql =  "SELECT * FROM gebruikers WHERE email = '{$_SESSION["klant"]}'";

								$query = mysqli_query($db, $sql);
		
								$result = mysqli_fetch_assoc($query);

								$gebruikerID = $result["gebruikerID"];

								$klantEmail = $result["email"];
								$vnaam = $result["voornaam"];
								$tvoegsel = $result["tussenvoegsel"];
								$anaam = $result["achternaam"];
								$straat = $result["straatnaam"];
								$huis = $result["huisNMR"];
								$postcode = $result["postcode"];
								$woonplaats = $result["woonplaats"];
								$tel = $result["telefoonNMR"];

								if ($_SESSION["klant"] == $klantEmail)
								{
									echo "<form id='editProfileInfo' method='POST' action='confirm.php'>
											<table id='profileInfo'>
												<tr>
													<th>First name</th>
													<td><input name='firstNameProfile' type='text' placeholder='{$vnaam}'></td>
												</tr>
												<tr>
													<th>Infix</th>
													<td><input name='infixProfile' type='text' placeholder='{$tvoegsel}'></td>
												</tr>
												<tr>
													<th>Last name</th>
													<td><input name='lastNameProfile' type='text' placeholder='{$anaam}'></td>
												</tr>
												<tr>
													<th>Email</th>
													<td><input name='emailProfile' type='email' placeholder='{$klantEmail}'></td>
												</tr>
												<tr>
													<th>Password</th>
													<td><input name='passwordProfile' type='email' placeholder='●●●●●●●●'></td>
												</tr>
												<tr>
													<th>Street</th>
													<td><input name='streetProfile' type='text' placeholder='{$straat}'></td>
												</tr>
												<tr>
													<th>Adress</th>
													<td><input name='houseNMRProfile' type='text' placeholder='{$huis}'></td>
												</tr>
												<tr>
													<th>Postal</th>
													<td><input name='postalProfile' type='text' placeholder='{$postcode}'></td>
												</tr>
												<tr>
													<th>City</th>
													<td><input name='cityProfile' type='text' placeholder='{$woonplaats}'></td>
												</tr>
												<tr>
													<th>Phone number</th>
													<td><input name='phoneNMRProfile' type='text' placeholder='{$tel}'></td>
												</tr>
											</table>
											<input type='submit' value='Gegevens wijzigen'>
										</form>";
								}
								?>
								</div>
								
								<div id="split"></div>
								<!-- Orders -->

								<div id="right">
									<h3>Orders</h3>
									<table id='profileOrders'>
										<tr>
											<th>Ticket</th>
											<th>Prijs</th>
											<th>Aantal</th>
											<th>Totaal</th>
										</tr>
									<?php
									
									$sqlBestelling = "SELECT * FROM bestellingen WHERE gebruikerID = {$gebruikerID}";

									$queryBestelling = mysqli_query($db, $sqlBestelling);

									while($resultBestelling = mysqli_fetch_assoc($queryBestelling))
									{
									$ticketID = $resultBestelling['ticketID'];

									$sqlTicket = "SELECT * FROM tickets WHERE ticketID = '$ticketID'";
									$queryTicket = mysqli_query($db, $sqlTicket);
									$resultTicket = mysqli_fetch_assoc($queryTicket);

									$totaalBestelling = $resultBestelling['totaal'] * $resultTicket['prijs'];
										echo "<tr>
												<td>{$resultTicket['naam']}</td>
												<td>&euro; {$resultTicket['prijs']}</td>
												<td>{$resultBestelling['totaal']}</td>
												<td>&euro; {$totaalBestelling}</td>
										";
									}

									?>
									</table>
								</div>
								<?php
							}
							else if(!isset($_SESSION['klant']))
							{
								echo "<p>You have to sign in to visit this page!</p>";
								header("refresh:2;url=login.php");
							}
						?>

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