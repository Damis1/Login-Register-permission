<?php
session_start();
require_once("connect.php");
if (isset($_POST['submit'])) {
	$user = $_POST['username'];
	$password = $_POST['password'];
	$password = hash("sha256", $password);
$sql = "SELECT username, password FROM $setting->tbl WHERE username='$user' AND password='$password'";
	$result = $conn->query($sql);
	if ($result == 1) {
			$_SESSION['username'] = $user;
		header("location:$setting->home");
		
	}else{
		echo "Pahoitelut jokin menii vikaan kirjautuessa";
	}
}
