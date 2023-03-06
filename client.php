<!DOCTYPE html>
<html>
	<head>
		<title>API Key Request Form</title>
		<style>
			label {
            display: block;
            margin-bottom: 5px;
			}
			input, textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
			}
			button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
			}
			button[type="submit"]:hover {
            background-color: #45a049;
			}
			.error {
            color: red;
			}
		</style>
	</head>
	<body>
		<h1>API Key Request Form</h1>
		
		<?php
		
		//initialize apikey with dummy data
		$apikey = bin2hex(random_bytes(16));

			// Check if the form has been submitted
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				// Get the form data
				$userName = $_POST['userName'];
				$userEmail = $_POST['userEmail'];
				$projectTitle = $_POST['projectTitle'];
				
				// Validate the form data
				$errors = array();
				if (empty($userName)) {
					$errors[] = 'Name is required';
				}
				if (empty($userEmail)) {
					$errors[] = 'Email is required';
					} elseif (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
					$errors[] = 'Invalid email format';
				}
				if (empty($projectTitle)) {
					$errors[] = 'Project description is required';
				}
				
				// If there are no errors, save the request to the database
				if (empty($errors)) {
				
					// Save the request to the database
					//TO open A CONNECTIOn.
					DEFINE ('DB_USER', 'root'); 
					DEFINE ('DB_PASSWORD', '');
					DEFINE ('DB_HOST', 'localhost');
					DEFINE ('DB_NAME', 'userapi');
					
					$userEmail = $_POST["userEmail"]; //get user email.
					
					$conn = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
					
					$query = "SELECT * FROM user WHERE userEmail = '".$userEmail."'";
					$result = mysqli_query($conn,$query); 
					
					if(mysqli_num_rows($result) == 0) {
						
						// Generate a unique API key
					    $apiKey = bin2hex(random_bytes(16));
						
						$query = "INSERT INTO user(userName,userEmail,apiKey,status,projectTitle) 
						VALUES ('".$userName.".','".$userEmail."','".$apikey."','Pending','".$projectTitle."')"; 
						
						$result = mysqli_query($conn, $query); //execute the query.
						
						$conn -> close();
						
						echo '<p>Thank you for your request. Your API key will be approved by an administrator and sent to you via email.</p><p style="background-color:black; color:red;width:35%;"><b>'.$apiKey.'</b></p>';
						
						
					}
					else{
						echo '<p style="color:red;"><b>User already registered and API has been Provided!</b></p>';
						$conn -> close();
					}								
					
				
					} else {
					// Display the validation errors
					echo '<div class="error"><ul>';
					foreach ($errors as $error) {
						echo '<li>' . $error . '</li>';
					}
					echo '</ul></div>';
				}
			}
		?>
		
		<form method="post">
			<label for="name">Name:</label>
			<input type="text" name="userName" id="name" required>
			
			<label for="email">Email:</label>
			<input type="email" name="userEmail" id="email" required>
			
			<label for="project">Project description:</label>
			<textarea name="projectTitle" id="projectTitle" required></textarea>
			
			<button type="submit">Request API Key</button>
		</form>
		<br>
		<br>
		<a href="mainhome.php">Go to home</a>
	</body>
</html>
