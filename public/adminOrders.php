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
				<a class="logo" href="admin.php">Admin - Orders</a>
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
								<th>Order ID</th>
								<th>User ID</th>
								<th>Ticket ID</th>
								<th>Amount</th>
								<th>Order date</th>
							</tr>
							<?php
								$sql = "SELECT * FROM bestellingen";
								$query = mysqli_query($db, $sql);

								while($result = mysqli_fetch_assoc($query))
								{
									echo "
									<tr>
										<td>{$result['bestellingID']}</td>
										<td>{$result['gebruikerID']}</td>
										<td>{$result['ticketID']}</td>
										<td>{$result['totaal']}</td>
										<td>{$result['datum']}</td>
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