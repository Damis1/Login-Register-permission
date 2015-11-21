<?php
session_start();
require_once("connect.php");
if ($setting->register == 0) {
	echo "Tunnusten luonti on otettu pois päältä!";
	exit;
}
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tunnusten luonti!</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<div class="container">
		
	
	<body>
		<form action="" method="POST" role="form">
			<legend>Luo tunnukset!</legend>
		
			<div class="form-group">
				<label for="">Käyttäjänimi</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="syötä käyttäjätunnus">
			</div>
			<div class="form-group">
				<label for="">Salasana</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="syötä salasana">
			</div>
		
			
		
			<button type="submit" name="submit" class="btn btn-primary">Luo Tunnukset!</button>
		</form>
	</body>
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	
	</body>

</html>

<?php

if (isset($_POST['submit'])) {
	$user = $_POST['username'];
	$pass = $_POST['password'];
	if (empty($user)) {
		echo "Käyttäjä-tunnus on pakollinen!";
		exit;
	}
	if (empty($pass)) {
		echo "Salasana on pakollinen!";
		exit;
	}
	$pass = hash("sha256", $pass);
	$sql = "SELECT * FROM $setting->tbl";
	$result = $conn->query($sql);
	while ($users = mysqli_fetch_array($result)) {
		if ($user == $users['username']) {
			echo "Käyttäjänimi on jo käytössä!";
			exit;
		}
	}
	$check = mysqli_num_rows($result);
	if ($check == 1) {
		$sql = "INSERT INTO $setting->tbl (username,password,permissions) VALUES ('$user','$pass','user')";
		$result = $conn->query($sql);
		if ($result == 1) {
		$_SESSION['username'] = $user;
		header("location:$setting->home");
		}else{
			echo "Jokin meni pieleen Tunnusten luonissa";
		}
	}else{
		$sql = "INSERT INTO $setting->tbl (username,password,permissions) VALUES ('$user','$pass','admin')";
		$result = $conn->query($sql);
		if ($result == 1) {
		$_SESSION['username'] = $user;
		header("location:$setting->home");
		}else{
			echo "Jokin meni pieleen Tunnusten luonissa";
		}
}
	}
	

