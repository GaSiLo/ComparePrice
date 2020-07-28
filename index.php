<?php 


include('server.php');
if(empty($_SESSION['username'])){
	header('location: login.php');
}
?>
<html>
<head>
<title>Home page </title>
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

<li><a href="profile.php">Profile</a></li>
<li><a href="logout.php">Logout</a></li>

</ul>
</div>
</div>
</div><br><br>
<div class="content">
<?php
 if(isset($_SESSION['success'])): 
 ?>
<div class="error_success">
<h3>
<?php
echo $_SESSION['success'];
unset($_SESSION['success']);
?>
</h3>
</div>
  <?php endif ?>
  

<?php if(isset($_SESSION['username'])): 
//<a href="index.php?logout='1'" style="color:red;">Logout</a>
?>
<p><center>Welcome  <strong><?php echo $_SESSION['username']; ?></strong></center></p>

  <?php endif ?>
</div>


</body>
</html>