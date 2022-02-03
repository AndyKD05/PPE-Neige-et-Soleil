<?php

$pseudo = $_POST["pseudo"];
$password = $_POST["password"];
$level = $_POST["level"];

$con  = mysqli_connect("localhost","root","","belletable");
$req = "select * from user where pseudo = '$pseudo' and password = '$password'";


	$resultat = mysqli_query($con,$req);

  if(mysqli_num_rows($resultat) > 0)
  {
    header("location:index.html");
	}
	else {

    header("location:pagedeconnexion.php?erreur=1");

  }










?>
