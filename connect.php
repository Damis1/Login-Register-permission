<?php
	$servername = "localhost";
	$username   = "";
	$password   = "";
	$dbname     = "";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	//Yhdistetään samalla PDO Kautta!
      try {
        $connect = new PDO("mysql:host=$host; dbname=$dbname",$username, $password);
      }catch (PDOException $e) {
         die("VIRHE: " . $e->getMessage());
      }
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $connect->exec("SET NAMES latin1"); 

$setting->tbl      = "damte_login"; //Tietokanta nimike älä muuta!
$setting->port 	   = "http://"; //Portti 80 on default = 80, https = 443 SSL suojattu yhteys
$setting->path 	   = "kansiosi"; //sivuston pääkansio Jätä tyhjäksi jos pääkansio on root kansiosi!
$setting->nologin  = $setting->port .$_SERVER['HTTP_HOST'] . $setting->path . "/index.php"; //Jos käyttäjä ei ole kirjautunut ja yritää Mennä suojatulle aluelle Tiedosto mihin ohjataan! pääsivu
$setting->home 	   = $setting->port .$_SERVER['HTTP_HOST'] . $setting->path . "/home.php"; //Kirjautumisen jälkeen tuleva default sivusto
$setting->register = 1; //Sulje tunnusten luonti jos et halua lisää tunnuksia tehtäväksi 0 = Suljettu, 1 = Auki
$setting->copy     = "Kaikki oikeudet pidättää &copy <a  href='http://dani.ownchat.eu'>Damtem</a> "; //Oikeudet Tekijälle (Y)
