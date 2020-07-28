<?php include('server.php'); ?>
<html>
<head>
<title>Login </title>
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
<h2>Login</h2>
</div>
<form method="post" action="login.php">

<?php include('errors.php'); ?>





<div class="input-group">
<label>Username</label>
<input type="text" name="username">
</div>

<div class="input-group">
<label>Password</label>
<input type="password" name="password">
</div>

<div class="input-group">
<button type="submit" name="login" class="btn">Login </button>
</div>
<p>
Not yet a member?<a href="register.php">Sign up</a>
</p>
</form>
</body>
</html>