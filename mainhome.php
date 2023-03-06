<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<style>
			* {
			box-sizing: border-box;
			}
			
			body {
			margin: 0;
			}
			
			.navbar {
			overflow: hidden;
			background-color: #333;
			font-family: Arial, Helvetica, sans-serif;
			}
			
			.navbar a {
			float: left;
			font-size: 16px;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			}
			
			.dropdown {
			float: left;
			overflow: hidden;
			}
			
			.dropdown .dropbtn {
			font-size: 16px;  
			border: none;
			outline: none;
			color: white;
			padding: 14px 16px;
			background-color: inherit;
			font: inherit;
			margin: 0;
			}
			
			.navbar a:hover, .dropdown:hover .dropbtn {
			background-color: red;
			}
			
			.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			width: 100%;
			left: 0;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
			}
			
			.dropdown-content .header {
			background: red;
			padding: 16px;
			color: white;
			}
			
			.dropdown:hover .dropdown-content {
			display: block;
			}
			
			/* Create three equal columns that floats next to each other */
			.column {
			float: left;
			width: 33.33%;
			padding: 10px;
			background-color: #ccc;
			height: 250px;
			}
			
			.column a {
			float: none;
			color: black;
			padding: 16px;
			text-decoration: none;
			display: block;
			text-align: left;
			}
			
			.column a:hover {
			background-color: #ddd;
			}
			
			/* Clear floats after the columns */
			.row:after {
			content: "";
			display: table;
			clear: both;
			}
		


		</style>
	</head>
	<body>
		
		<div class="navbar">
		<a class="navbar-brand" href="mainhome.php">
      <div class="logo-image">
            <img style="width:100px" src="images/book_store_logo.jpg" class="img-fluid">
      </div>
</a>
			<a href="mainhome.php">Home</a>
			<a href="mainhome.php">About us</a>
			
			<div class="dropdown">
				<button class="dropbtn">Get API key
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					 <div class="header">
						<h2>Registeration</h2>
					</div>   
					<div class="row">
						<div class="column">						
							<a href="client.php">Request Form</a>
						</div>	
						<div class="column">						
							<a href="home.php">Book Store Details</a>
						</div>		
					</div>
				</div>
			</div> 
			
			
			
			
			<div class="dropdown">
				<button class="dropbtn">Admin Section
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-content">
					 <div class="header">
						<h2>Admin</h2>
					</div>   
					<div class="row">
						<div class="column">						
							<a href="adminDashboard.php">View Request</a>
						</div>	
						<div class="column">						
							<a href="home.php">Book Store Details</a>
						</div>		
					</div>
				</div>
			</div> 
			
		</div>
		
		<div>
			
			<div class="slider" style="background-color:black;">
				<img style="width:1688px; height:727px; background-color:black;" src="images/bookstoreHome.jpg" width="100%" height="100%">				
				
			</div>
			
		</div>
		
	</body>
</html>
