<?php
require_once("connect.php");

 $logged = false;

      if(isset($_SESSION["username"])) { 
			
			  $queryuser1 = $connect->prepare("SELECT * FROM $setting->tbl WHERE username = ?");
              $queryuser1->execute(array($_SESSION["username"]));
              $lineuser1 = $queryuser1->fetch();
			
			      if($_SESSION["username"] == $lineuser1["username"]) {
                    $logged = true;
                  }
            }
      
  
  $user->admin      = 0;
  $user->mode       = 0;
  $user->user   = 0;
  
      if(!$logged) {
        $user->id = 0;
      }else {
	    $user->id = $lineuser1["id"];
        $user->name = $lineuser1["username"];
            if($lineuser1["permissions"] == "admin") { $user->admin = 1; $user->mode = 1; }
			if($lineuser1["permissions"] == "mode") $user->mode = 1;
			if($lineuser1["permissions"]) $user->user = 1;
	  }

	  if (isset($_GET['logout'])) {
	  	session_start();
	  	session_destroy();
	  	header("location: $setting->nologin");
	  }
