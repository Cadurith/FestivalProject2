<?php require("../private/initialize.php"); ?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Confirm - Musival</title>
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
				<h1>Confirm</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">

					<!-- Register -->

					<?php
						if (!empty($_POST["firstName"]) && !empty($_POST["lastName"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["phoneNMR"]) && !empty($_POST["street"]) && !empty($_POST["houseNMR"]) && !empty($_POST["postal"]) && !empty($_POST["city"]))
						{
							$firstName = $_POST["firstName"];
							$infix = $_POST["infix"];
							$lastName = $_POST["lastName"];
							$email = $_POST["email"];
							$password = $_POST["password"];
							$phoneNMR = $_POST["phoneNMR"];
							$street = $_POST["street"];
							$houseNMR = $_POST["houseNMR"];
							$postal = $_POST["postal"];
							$city = $_POST["city"];

							$sqlRegister = "INSERT INTO gebruikers (voornaam, tussenvoegsel, achternaam, email, wachtwoord, telefoonNMR, straatnaam, huisNMR, postcode, woonplaats)
							VALUES ('{$firstName}', '{$infix}', '{$lastName}', '{$email}', '{$password}', '+31 {$phoneNMR}', '{$street}', '{$houseNMR}', '{$postal}', '{$city}')";

							$queryRegister = mysqli_query($db, $sqlRegister);
							
							if($queryRegister)
							{
								echo "<p>You were succesfully registered!</p>";
								header("refresh:2;url=index.php");
							}
						}
						else
						{
							header("url=register.php");
						}
					?>
					
					<!-- Login -->

					<?php
						if (!empty($_POST["emailLogin"]) && !empty($_POST["passwordLogin"]))
						{
							$emailLogin = $_POST["emailLogin"];
							$passwordLogin = $_POST["passwordLogin"];

							$sqlLogin = "SELECT * FROM gebruikers WHERE email = '{$emailLogin}' AND wachtwoord = '{$passwordLogin}'";

							$queryLogin = mysqli_query($db, $sqlLogin);

							$queryRole = mysqli_query($db, $sqlLogin);
							$resultRole = mysqli_fetch_assoc($queryRole);

							if(mysqli_num_rows($queryLogin) > 0)
							{
								$_SESSION["loginID"] = 1;
								$_SESSION["klant"] = $emailLogin;

								echo "<p>You were succesfully signed in!</p>";
								if($resultRole["rol"] != "admin")
								{
									header("refresh:2;url=profile.php");
								}
								else if($resultRole["rol"] == "admin")
								{
									header("refresh:2;url=admin.php");
								}
							}
						}
						else
						{
							header("url=login.php");
						}
					?>

					<!-- Edit information -->

					<?php
						if(!empty($_POST["firstName"]) || !empty($_POST["lastName"]) || !empty($_POST["email"]) || !empty($_POST["password"]) || !empty($_POST["phoneNMR"]) || !empty($_POST["street"]) || !empty($_POST["houseNMR"]) || !empty($_POST["postal"]) || !empty($_POST["city"]))
						{
							$firstNameProfile = $_POST["firstNameProfile"];
							$infixProfile = $_POST["infixProfile"];
							$lastNameProfile = $_POST["lastNameProfile"];
							$emailProfile = $_POST["emailProfile"];
							$passwordProfile = $_POST["passwordProfile"];
							$phoneNMRProfile = $_POST["phoneNMRProfile"];
							$streetProfile = $_POST["streetProfile"];
							$houseNMRProfile = $_POST["houseNMRProfile"];
							$postalProfile = $_POST["postalProfile"];
							$cityProfile = $_POST["cityProfile"];

							$sqlEdit = "UPDATE gebruikers SET voornaam = '$firstNameProfile', tussenvoegsel = '$infixProfile', achternaam = '$lastNameProfile', email = '$emailProfile',
										telefoonNMR = '+31 $phoneNMRProfile', wachtwoord = '$passwordProfile', straatnaam = '$streetProfile', huisNMR = '$houseNMRProfile', postcode = '$postalProfile', woonplaats = '$cityProfile'";

							$queryEdit = mysqli_query($db, $sqlEdit);
							
							if($queryEdit)
							{
								echo "<p>You're information was succesfully edited!</p>";
								header("refresh:2;url=profile.php");
							}
						}

					?>

					<!-- Tickets -->

					<?php
						if (!empty($_POST["amountTicket"]) && !empty($_POST["typeTicket"]))
						{
							$amount = $_POST["amountTicket"];
							$ticket = $_POST["typeTicket"];

								// Vraag gebruikerID op
								$sqlID = "SELECT gebruikerID FROM gebruikers WHERE email LIKE '{$_SESSION['klant']}'";
								$queryID = mysqli_query($db, $sqlID);
								$resultID = mysqli_fetch_assoc($queryID);

							$gebruiker = $resultID["gebruikerID"];

							$sqlTickets = "INSERT INTO bestellingen (gebruikerID, ticketID, totaal) VALUES ('$gebruiker', '$ticket', '$amount')";
							//$sqlTickets = "INSERT INTO bestellingen SET gebruikerID = '$gebuiker', ticketID = '$ticket';
							$queryTickets = mysqli_query($db, $sqlTickets);

							if(mysqli_affected_rows($db) > 0)
							{
								echo "<p>You're order was placed succesfully!</p>";
								header("refresh:2;url=profile.php");
							}
						}
						else
						{
							header("url=buytickets.php");
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