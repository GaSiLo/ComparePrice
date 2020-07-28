<?php
session_start();
$username="";
$email="";
$errors=array();

$db=mysqli_connect('localhost','root','','registration') or die($db);

if(isset($_POST['register'])){
	$username=mysqli_real_escape_string($db,$_POST['username']);
	$password_1=mysqli_real_escape_string($db,$_POST['password_1']);
	//$password_2=mysqli_real_escape_string($db,$_POST['password_2']);
	$email=mysqli_real_escape_string($db,$_POST['email']);

if(empty($username)){
array_push($errors,"Username is Required");}
if(empty($password_1)){
array_push($errors,"Password is Required");}
if(empty($email)){
	array_push($errors,"Email is Required");
}
//if($password_1=$password_2){
//	array_push($errors,"The two password do not match");}
if(count($errors)==0){
	$password=md5($password_1);
	
	$sql="INSERT INTO users(username,password,email) VALUES('$username','$password','$email')";
	mysqli_query($db,$sql);
    $_SESSION['username']= $username;
	$_SESSION['id']= $id;
			$_SESSION['email']= $email;
			$_SESSION['password']= $password;
			
			session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['id'] = $id;
	
	
	
//	$_SESSION['success']="You are now logged in";
	header('location:index.php');
}
}
if(isset($_POST['login'])){
	$username=mysqli_real_escape_string($db,$_POST['username']);
	$password=mysqli_real_escape_string($db,$_POST['password']);

if(empty($username)){
array_push($errors,"Username is Required");}
if(empty($password)){
array_push($errors,"Password is Required");}

if(count($errors)==0){
	$password=md5($password);
	$query="SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result=mysqli_query($db,$query);
	if(mysqli_num_rows($result)==1){
		    $_SESSION['username']= $username;
			$_SESSION['id']= $id;
			$_SESSION['email']= $email;
			$_SESSION['password']= $password;

	//        $_SESSION['success']="You are now logged in";
	session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['id'] = $id;
			header('location: index.php');
	}else{
		array_push($errors,"wrong username and password");
	}
}	
}
if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('location: login.php');
}
?>