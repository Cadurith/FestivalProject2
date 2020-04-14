<?php require("../private/initialize.php"); ?>

<?php
	$user = $_SESSION["klant"];

	$sqlRole = "SELECT * FROM gebruikers WHERE email = '{$user}'";
	$queryRole = mysqli_query($db, $sqlRole);
	$resultRole = mysqli_fetch_assoc($queryRole);

	if($resultRole["rol"] == "admin")
	{
	?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin - Musival</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="../private/assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="admin.php">Admin - Users</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="admin.php">Users</a></li>
					<li><a href="adminOrders.php">Orders</a></li>
					<?php if(isset($_SESSION["klant"])) 
						{	?>
							<li><a href="logout.php">Log out</a></li>
							<?php
						}
					?>
				</ul>
			</nav>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<table>
							<tr>
								<th>User ID</th>
								<th>Firstname</th>
								<th>Infix</th>
								<th>Lastname</th>
								<th>Email</th>
								<th>Phone number</th>
								<th>Street</th>
								<th>House number</th>
								<th>Postal code</th>
								<th>City</th>
								<th>Role</th>
							</tr>
							<?php
								$sql = "SELECT * FROM gebruikers";
								$query = mysqli_query($db, $sql);

								while($result = mysqli_fetch_assoc($query))
								{
									echo "
									<tr>
										<td>{$result['gebruikerID']}</td>
										<td>{$result['voornaam']}</td>
										<td>{$result['tussenvoegsel']}</td>
										<td>{$result['achternaam']}</td>
										<td>{$result['email']}</td>
										<td>{$result['telefoonNMR']}</td>
										<td>{$result['straatnaam']}</td>
										<td>{$result['huisNMR']}</td>
										<td>{$result['postcode']}</td>
										<td>{$result['woonplaats']}</td>
										<td>{$result['rol']}</td>
									</tr>";
								}
							?>
						</table>
					</div>
				</div>
			</section>

		<!-- Scripts -->
			<script src="../private/assets/js/jquery.min.js"></script>
			<script src="../private/assets/js/browser.min.js"></script>
			<script src="../private/assets/js/breakpoints.min.js"></script>
			<script src="../private/assets/js/util.js"></script>
			<script src="../private/assets/js/main.js"></script>

	</body>
</html>
<?php
	}
	else
	{
		echo "You don't have the permision to view this page";
	}
?>