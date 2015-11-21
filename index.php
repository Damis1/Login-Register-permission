<?php require_once("connect.php"); ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
	<div class="container">
		<form action="login.php" method="POST" role="form">
			<legend>Kirjaudu Palveluun jatkaksesi</legend>
		
			<div class="form-group">
				<label for="">Käyttäjänimi</label>
				<input type="text" class="form-control" id="username"  name="username" placeholder="ole hyvä ja syötä käyttäjänimi">
			</div>
			<div class="form-group">
				<label for="">salasana</label>
				<input type="password" name="password" id="password" class="form-control"  placeholder="ole hyvä ja syötä salasana">
			</div>
	
			<button type="submit" name="submit" id="submit" class="btn btn-primary">Kirjaudu</button>   
			<?php  if ($setting->register == 1 ) { echo " || <a href='register.php'>Luo tunnukset</a>"; } ?>
		</form>
		<?php echo $setting->copy; ?>
		</div>
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	</body>
</html>
