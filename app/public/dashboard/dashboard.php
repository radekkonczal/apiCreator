<?php
	if(!isset($_SESSION['logged'])){
		header('Location: ../homepage/homepage.php');
		exit();
	}
?>

<!DOCTYPE html>
<html>
	<head>
	 	<meta charset="utf-8" />
	 	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	 	<meta http-equiv="refresh" content="1440;url='../../../src/logout/logout.php'" />
	 	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	 	<title>Dashboard</title>

	 	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	 	<link href="../../../src/dashboard/dashboardStyle.css" rel="stylesheet">
	 	<script src="../../../src/dashboard/dashboardScript.js"></script>
	 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	 	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
 		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
			<button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="collapse_target">
				<span class="navbar-text" id="navbarText">Dashboard</span>

				<ul class="navbar-nav mr-auto nav-flex-icons">
					<li class="nav-item ">
						<a class="nav-link" href="#" id="apiList"><i class="fas fa-align-left"></i>         API list </a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="#" id="apiCreator"></i><i class="fas fa-project-diagram"></i> API creator </a>
					</li>
				</ul>

				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target" href="#"><i class="fas fa-user"></i> User </a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown_target">
							<h6 class="dropdown-header" id="username" name="username" align="right"></h6>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="../../../src/logout/logout.php"><i class="fas fa-sign-out-alt"></i> Logout </a>
						</div>
					</li>
				</ul>
			</div>	
		</nav>
		
		<main>
			<div id="content"></div>
		</main>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>