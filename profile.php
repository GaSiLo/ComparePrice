<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'registration';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM users WHERE username = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $_SESSION['username']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="register.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="navbar">
<div class="container">
<div class="logo_div">
<img src="logo.png" alt="" class="logo">
</div>
<div class="navbar_links">
<ul class="menu">

<li><a href="index.php">Account </a></li>
<li><a href="logout.php">Logout</a></li>

</ul>
</div>
</div>
</div><br><br><br>


		<div class="content">
			
				<table border = "0" width = "100%">
         
         
		 <tr>
    <td><center><img width="30%"  src="acc.png" /><br><br><h2>Profile Page</h2></center></td>
</tr>
           	<tr>
						<td style="padding:10px"><h4>Username: <?=$_SESSION['username']?></h4></td>
						
					</tr>
					<tr>
					
						<td style="padding:10px"><h4>Password: <?=$password?></h4></td>
						
					</tr>
					<tr>
						<td style="padding:10px"><h4>Email:  <?=$email?></h4></td>
					</tr>
         
    </table> 
			</div>
		
	</body>
</html>