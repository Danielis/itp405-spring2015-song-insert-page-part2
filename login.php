<?php
	require_once __DIR__ . '/Auth.php';
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$auth = new Auth();

		if ($auth->attempt($username, $password)) {
			header("Location: myaccount.php");
		} else {
			header("Location: login.php");
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<form method="post">
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" name="username" class="form-control" id="username" value="student1">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" class="form-control" id="password" value="laravel">
		</div>
		<input type="submit" name="submit" class="btn btn-default" value="Login">
	</form>
</body>
</html>