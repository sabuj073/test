<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Dashbord</title>
	<link rel="shortcut icon" type="image/x-icon" href="image/logo.png" />
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="main.css">

	<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="main.js"></script>

	<style>
		.ad {
			position: absolute;
			width: 300px;
			height: 250px;
			border: 1px solid #ddd;
			left: 50%;
			transform: translateX(-50%);
			top: 250px;
			z-index: 10;
		}
		.ad .close {
			position: absolute;
			font-family: 'ionicons';
			width: 20px;
			height: 20px;
			color: #fff;
			background-color: #999;
			font-size: 20px;
			left: -20px;
			top: -1px;
			display: table-cell;
			vertical-align: middle;
			cursor: pointer;
			text-align: center;
		}
	</style>
	<script type="text/javascript">
		$(function() {
			$('.close').click(function() {
				$('.ad').css('display', 'none');
			})
		})
	</script>

</head>
<body>
	<div class="header">
		<a href="index.php"><div class="logo">
			<!-- <i class="fa fa-tachometer"></i> -->
			<img src="image/logo.png" style="width: 50px;">
			<span>Loan</span>
		</div>
	</a>
	<a href="#" class="nav-trigger"><span></span></a>
</div>
<div class="side-nav">
	<a href="index.php"><div class="logo">
		<!-- <i class="fa fa-tachometer"></i> -->
		<img src="image/logo.png" style="width: 50px;">
		<span>Loan</span>
	</div>
</a>
<nav>

	<ul>
		<li>
			<a href="index.php">

				<span><i class="fa fa-home"></i></span>
				<span>Home</span>
			</a>
		</li>
		<li>
			<a href="index.php">
				<span><i class="fa fa-user"></i></span>
				<span>Users</span>
			</a>
		</li>
		<li>
			<a href="autoresponsedata.php">
				<span><i class="fa fa-envelope"></i></span>
				<span>Email Response</span>
			</a>
		</li>
		<li>
			<a href="confirmation.php">
				<span><i class="fa fa-envelope"></i></span>
				<span>Confirmation</span>
			</a>
		</li>
		<li>
			<a href="logout.php">
				<span><i class="fa fa-power-off"></i></span>
				<span>Logout</span>
			</a>
		</li>
			<!--<li>
				<a href="#">
					<span><i class="fa fa-user"></i></span>
					<span>Home</span>
				</a>
			</li>
			<li>
				<a href="#">
		
					<span><i class="fa fa-envelope"></i></span>
					<span>User Data</span>
				</a>
			</li>
			<li class="active">
				<a href="#">
					<span><i class="fa fa-bar-chart"></i></span>
					<span>Analytics</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span><i class="fa fa-credit-card-alt"></i></span>
					<span>Payments</span>
				</a>
			</li>-->
		</ul>
	</nav>
</div>
</body>
</html>

<style type="text/css">
	* {
		box-sizing: border-box;
	}
	body {
		margin: 0;
		padding: 0;
		font-family: 'Source Sans Pro', sans-serif;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		height: 100%;
		overflow-y: scroll;
	}
	.header {
		position: absolute;
		width: 100%;
		z-index: 3;
		height: 44px;
		background-color: #fff;
		border-bottom: 3px solid #2d3d51;
	}
	/* logo in header(mobile version) and side-nav (tablet & desktop) */
	.logo {
		height: 44px;
		padding: 10px;
		font-weight: 700;
	}
	.header .logo {
		color: #233245;
	}
	.side-nav .logo {
		background-color: #233245;
		color: #fff;
	}
	.header .logo {
		float: left;
	}
	.header .logo {
		height: 44px;
		z-index: 1;
		padding: 10px;
		font-weight: 700;
		color: #233245;
	}
	.logo  i {
		font-size: 22px;
	}
	.logo span {
		margin-left: 5px;
		text-transform: uppercase;
	}
	.nav-trigger {
		position: relative;
		float: right;
		width: 20px;
		height: 44px;
		right: 30px;
		display: block;	
	}
	.nav-trigger span, .nav-trigger span:before, span:after {
		width: 20px;
		height: 2px;
		background-color: #35475e;
		position: absolute;
	}
	.nav-trigger span {
		top: 50%;
	}
	.nav-trigger span:before, .nav-trigger span:after {
		content: '';
	}
	.nav-trigger span:before {
		top: -6px;
	}
	.nav-trigger span:after {
		top: 6px;
	}
	/* side navigation styles */
	.side-nav {
		position: absolute;
		width: 100%;
		height: 100%;
		background-color: #35475e;
		z-index: 1;
		top: 0;
		bottom: 0;
		display: none;
	}
	.side-nav.visible {
		display: block;
	}
	.side-nav ul {
		margin: 0;
		padding: 0;
	}
	.side-nav ul li {
		padding: 16px 16px;
		border-bottom: 1px solid #3c506a;
		position: relative;
	}
	.side-nav ul li.active:before {
		content: '';
		position: absolute;
		width: 4px;
		height: 100%;
		top: 0;
		left: 0;
		background-color: #fff;
	}
	.side-nav ul li a {
		color: #fff;
		display: block;
		text-decoration: none;
	}
	.side-nav ul li i {
		color: #0497df;
		min-width: 20px;
		text-align: center;
	}
	.side-nav ul li span:nth-child(2) {
		margin-left: 10px;
		font-size: 14px;
		font-weight: 600;
	}
	/* main content styles */
	.main-content {
		margin-top: 0;
		padding: 0;
		height: 100%;
	}
	.main-content .title {
		background-color: #eef1f7;
		border-bottom: 1px solid #b8bec9;
		padding: 10px 20px;
		font-weight: 700;
		color: #333;
		font-size: 18px;
	}
	/* set element styles to fit tablet and higher(desktop) */
	@media screen and (min-width: 600px) {
		.header {
			background-color: #35475e;
			z-index: 1;
		}
		.header .logo {
			display: none;
		}
		.nav-trigger {
			display: none;
		}
		.nav-trigger span, .nav-trigger span:before, span:after {
			background-color: #fff;
		}
		.side-nav {
			display: block;
			width: 70px;
			z-index: 2;
		}
		.side-nav ul li span:nth-child(2) {
			display: none;
		}
		.side-nav .logo i {
			padding-left: 12px;
		}
		.side-nav .logo span {
			display: none;
		}
		.side-nav ul li i {
			font-size: 26px;
		}
		.side-nav ul li a {
			text-align: center;
		}
		.main-content {
			margin-left: 70px;
		}
	}
	/* set element styles for desktop */
	@media screen and (min-width: 800px) {
		.side-nav {
			width: 200px;
		}
		.side-nav ul li span:nth-child(2) {
			display: inline-block;
		}
		.side-nav ul li i {
			font-size: 16px;
		}
		.side-nav ul li a {
			text-align: left;
		}
		.side-nav .logo i {
			padding-left: 0;
		}
		.side-nav .logo span {
			display: inline-block;
		}
		.main-content {
			margin-left: 200px;
		}
	}

	/* main box container */
	.main {
		display: flex;
		flex-flow: row wrap;
	}
	.widget {
		flex-basis: 300px;
		flex-grow: 10;
		height: 300px;
		margin: 15px;
		border-radius: 6px;
		background-color: #ffffff;
		position: relative;
	}
	.widget .title {
		background-color: #eef1f7;
		border-bottom: 1px solid #dfe4ec;
		padding: 10px;
		border-top-left-radius: 6px;
		border-top-right-radius: 6px;
		color: #617085;
		font-weight: 600;
	}
	.ad {
		width: 350px;
		height: 300px;
		border: 1px solid #ddd;
	}


</style>

<script type="text/javascript">
	$(document).ready(function() {
		$('.nav-trigger').click(function() {
			$('.side-nav').toggleClass('visible');
		});
	});
</script>