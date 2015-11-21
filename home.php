<?php
session_start();
require_once("connect.php");
require_once("auth.php");
if (!$_SESSION['username']) {
	header("location:$setting->nologin");
}
?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Tervetuloa <?php echo $user->name; ?></title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>

	<div class="container">
		<ul class="nav nav-pills">
  <li role="presentation" ><a href="home.php">Koti</a></li>
  <li role="presentation"><a href="?users">Käyttäjät</a></li>
  <li role="presentation"><a href="?logout">Ulos</a></li>
</ul>
	<div class="panel panel-default">
		<div class="panel-body">
		<?php echo $setting->copy; ?>
		</div>
	</div>
	<?php
	if (isset($_GET['users'])) {
		if ($user->admin) {
			$sql = "SELECT username,permissions FROM $setting->tbl";
			$result = $conn->query($sql);
			while ($users = mysqli_fetch_array($result)) {
				?>
				<ul class="list-group">
				<li class="list-group-item">
				<?php echo  "Nimi - " .$users['username'] ." Taso - ". $users['permissions'] ?>
				<a href="?change=true&username=<?php echo $users['username'] ?>">Vaihda Oikeudet</a></li>
				</ul>
				<?php
			}
		}elseif ($user->mode) {
			$sql = "SELECT username,permissions FROM $setting->tbl";
			$result = $conn->query($sql);
			while ($users = mysqli_fetch_array($result)) {
				?>
				<ul class="list-group">
				<li class="list-group-item">
				<?php echo  "Nimi - " .$users['username'] ." Taso - ". $users['permissions'] ?>
				
				</ul>
				<?php
			}
		}elseif ($user->user) {
			$sql = "SELECT username,permissions FROM $setting->tbl";
			$result = $conn->query($sql);
			while ($users = mysqli_fetch_array($result)) {
				?>
				<ul class="list-group">
				<li class="list-group-item">
				<?php echo  "Nimi - " .$users['username'] ." Taso - ". $users['permissions'] ?>
				</ul>
				<?php
			}
		}
		}
	
	if (isset($_GET['change'])) {
		if ($user->admin) {
			?>
			<form action="" method="post">
			<select name="select_catalog" id="select_catalog">
			<option value="admin">admin</option>
			<option value="mode">mode</option>
			<option value="user">käyttäjä</option>
			</select>
			<input name="submit" type="submit" value="Päivitä">
			</form>
			<?php
			if (isset($_POST['submit'])) {
			
			$user = $_GET['username'];
			$perm = $_POST['select_catalog'];
			$sql = "UPDATE $setting->tbl set permissions='$perm' WHERE username='$user'";
			$result = $conn->query($sql);
			if ($result == 1) {
				echo "Vaihto on onnistunut";
			}else{
				echo "Vaihto epäonnistui!";
			}
		}
	}
	}
	?>
	</div>
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>
