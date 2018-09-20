<?php
	include("connect_login.php");
	session_start();
	
	$usr = mysqli_real_escape_string($dbcon,$_POST['username']);
	$pass = mysqli_real_escape_string($dbcon,$_POST['password']);

	$error = false;

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sql = "SELECT * FROM UserData WHERE username = '$usr'";
		$result = mysqli_query($dbcon,$sql);
		
		$row = mysqli_fetch_array($result);
		$count = mysqli_num_rows($result);
	
		$password = hash('sha512',($pass.$row['salt']));

		if ($count == 1 && $row['password']==$password){
			echo ("<p style='color: green;'>Good login.</p>");
			$_SESSION['user'] = $row['id'];
			header("Location: edit.php");
			
		} else {
			echo ("<p style='color:red;'>Incorrect username or password.</p>");	
		}
	}
?>

<html>
<head>
	<title>Database - Login</title>
	<meta name=viewport content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type="text/css" href='../css/style.css'>
</head>
<body>
<h1>User Login</h1>
<div class="form">
    <h3>Authorized Users Only</h3>
	<form action = "" method = "post">
		<p>Username:</p><input type="text" name="username"><br><br>
		<p>Password:</p><input type="password" name="password"><br><br>
		<input type="submit" value="Login">
	</form>
</div>
</body>
</html>