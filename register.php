<?php
include('server.php');
?>
<html>
<head>
<title>Registration Form</title>
<link rel="stylesheet" type="text/css" href="register.css">
</head>
<body>

<div class="navbar">
<div class="container">
<div class="logo_div">
<img src="logo.png" alt="" class="logo">
</div>
<div class="navbar_links">
<ul class="menu">
<li><a href="new.php">Home </a></li>
<li><a href="about.html">About Us</a></li>
<li><a href="Serv.html">Services</a></li>
<li><a href="login.php">Login</a></li>
</ul>
</div>
</div>
</div>



<div class="header">
<h2>Register</h2>
</div>
<form method="post" action="register.php">

<?php include('errors.php'); 


//<div class="input-group">
//<label>Confirm Password</label>
//<input type="password" name="password_2">
//</div>
?>

<div class="input-group">
<label>Username</label>
<input type="text" name="username" value="<?php echo $username;?>">
</div>
<div class="input-group">
<label>Email</label>
<input type="text" name="email" value="<?php echo $email;?>">
</div>
<div class="input-group">
<label>Password</label>
<input type="password" name="password_1">
</div>

<div class="input-group">
<button type="submit" name="register" class="btn">Register </button>
</div>
<p>
Already a member?<a href="login.php">Log in</a>
</p>
</form>
</body>
</html>

