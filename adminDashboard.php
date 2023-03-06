<?php use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception; 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Administrator Dashboard</title>
		<style>
			table {
            border-collapse: collapse;
            width: 100%;
			}
			th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
			}
			th {
            background-color: #4CAF50;
            color: white;
			}
			form {
            display: inline-block;
            margin-right: 10px;
			}
			.approved {
            color: green;
			}
			.rejected {
            color: red;
			}
		</style>
	</head>
	<body>
		<h1>Administrator Dashboard</h1>
		
		<?php
			// Open a database connection
			define('DB_HOST', 'localhost');
			define('DB_USER', 'root');
			define('DB_PASSWORD', '');
			define('DB_NAME', 'userapi');
			
			$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			
			// Prepare and execute a query to retrieve user requests from the database
			$stmt = mysqli_prepare($conn, "SELECT * FROM user");
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			
			// Check if there are any rows returned by the query
			if (mysqli_num_rows($result) > 0) {
				// Display the requests in a table
				echo '<table>';
				echo '<tr><th>Name</th><th>Email</th><th>Project</th><th>Status</th><th>API Key</th><th>Action</th></tr>';
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<tr>';
					echo '<td>' . htmlspecialchars($row['userName']) . '</td>';
					echo '<td>' . htmlspecialchars($row['userEmail']) . '</td>';
					echo '<td>' . htmlspecialchars($row['projectTitle']) . '</td>';
					echo '<td>' . htmlspecialchars($row['status']) . '</td>';
					echo '<td>' . htmlspecialchars($row['apiKey']) . '</td>';
					echo '<td>';
					
					
					//accept api button
					echo '<form action="adminDashboard.php" method="post">
					<input type="hidden" name="apiKey" value="' . htmlspecialchars($row['apiKey']) .'" />
					<input type="hidden" name="userEmail" value="' . htmlspecialchars($row['userEmail']) .'" />
					<input type="submit" name="acceptApi" value="Accept" />
					</form>';
					
					
					//reject api button
					echo '<form action="adminDashboard.php" method="post">
					<input type="hidden" name="apiKey" value="' . htmlspecialchars($row['apiKey']) . '" />
					<input type="submit" name="rejectApi" value="Reject" />
					</form>';
					
					echo '</td>';
					echo '</tr>';
					
					
				}
				
				echo '</table>';
				} else {
				echo '<p>There are no pending requests.</p>';
			}
			
			
			// Close the database connection
			mysqli_close($conn);
			
		?>
		
		
		<?php
			
		    //function to perform upon click
			if ($_SERVER['REQUEST_METHOD'] == "POST") {
				if (isset($_POST['acceptApi'])) {
					$apiKey = $_POST['apiKey'];
					$userEmail = $_POST['userEmail'];
					funcAcc($apiKey,$userEmail);
				} 
				elseif (isset($_POST['rejectApi'])) {
					$apiKey = $_POST['apiKey'];
					funcRej($apiKey);
				}
			}
			
			//ACCEPT API and mail 
			function funcAcc($apiKey,$userEmail)
			{
				
				DEFINE ('DB_USER2', 'root'); 
				DEFINE ('DB_PASSWORD2', '');
				DEFINE ('DB_HOST2', 'localhost');
				DEFINE ('DB_NAME2', 'userapi');
				
				$theApiKey = $apiKey;
				$theUserEmail=$userEmail;
				
				$conn = mysqli_connect (DB_HOST2, DB_USER2, DB_PASSWORD2, DB_NAME2) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
				
				//$query = "UPDATE TABLE USER SET status='Accepted' WHERE apiKey = '".$theApiKey."'";
				$query = "UPDATE USER SET status='Accepted' WHERE apiKey = '".$theApiKey."';";
				
				$result = mysqli_query($conn,$query); 				
				$result = mysqli_query($conn, $query); //execute the query.
				
				$conn -> close();
				
				//echo $theUserEmail;
				
				//**********SEND EMAIL TO USER				
				// Include PHPMailer files
				//require_once 'C:\xampp\htdocs\PHPMailer\src\Exception.php';
				//require_once 'C:\xampp\htdocs\PHPMailer\src\PHPMailer.php';
				//require_once 'C:\xampp\htdocs\PHPMailer\src\SMTP.php';
				
				// Check if PHPMailer class exists
				/*if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
					echo 'PHPMailer class not found';
					exit;
					}
					
					// Create a new PHPMailer instance
					$mail = new PHPMailer(true);
					
					try {
					// Enable verbose debug output
					$mail->SMTPDebug = SMTP::DEBUG_SERVER;
					
					// Set SMTP credentials and other settings
					$mail->isSMTP();
					$mail->Host = 'smtp.gmail.com';
					$mail->SMTPAuth = true;
					$mail->Username = 'deveshabilac2101@gmail.com';
					$mail->Password = 'devesh1999yudishtom2101';
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
					$mail->Port = 587;
					
					// Set the email sender and recipient
					$mail->setFrom('123abcyuds@gmail.com', 'yudishh');
					$mail->addAddress('deveshabilac2101@gmail.com', 'deveshh');
					
					// Set the email subject and message body
					$mail->Subject = 'Test Email';
					$mail->Body = 'This is a test email message.';
					
					// Send the email
					$mail->send();
					echo 'Email sent successfully.';
					} catch (Exception $e) {
					echo 'Email could not be sent. Error message: ', $mail->ErrorInfo;
				}*/
				
				
				// the message
				$msg = "First line of text\nSecond line of text";
				
				// use wordwrap() if lines are longer than 70 characters
				$msg = wordwrap($msg,70);
				
				// send email
				mail("deveshabilac2101@gmail.com',"My subject",$msg);
				
				
				
				
				
				
				
				
				
				
				
				
				//***************************
				
				
				
				//echo '<script>alert("updated sucessfully!")</script>';
				//echo "<meta http-equiv='refresh' content='0'>";
				
			}
			
			//REJECT API
			function funcRej($apiKey)
			{
				DEFINE ('DB_USER2', 'root'); 
				DEFINE ('DB_PASSWORD2', '');
				DEFINE ('DB_HOST2', 'localhost');
				DEFINE ('DB_NAME2', 'userapi');
				
				$theApiKey = $apiKey;
				
				$conn = mysqli_connect (DB_HOST2, DB_USER2, DB_PASSWORD2, DB_NAME2) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
				
				//$query = "UPDATE TABLE USER SET status='Pending' WHERE apiKey = '".$theApiKey."'";
				$query = "UPDATE USER SET status='Pending' WHERE apiKey = '".$theApiKey."';";
				
				$result = mysqli_query($conn,$query); 				
				$result = mysqli_query($conn, $query); //execute the query.
				
				$conn -> close();
				
				echo $theApiKey;
				echo '<script>alert("updated sucessfully!")</script>';
				echo "<meta http-equiv='refresh' content='0'>";
			}
			
		?>
		
	</body>
</html>
