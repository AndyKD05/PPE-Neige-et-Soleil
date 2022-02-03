<?php
	session_start();
	require_once("controleur/config_bdd.php");
	require_once("controleur/controleur.class.php");
	$unControleur = new Controleur($serveur,$bdd,$user,$mdp);
?>


<!DOCTYPE html>
<html>
<head>
	<title>site de gestion vaccination</title>
</head>
<body>
	<center>
		<h1> Gestion de la maintenance au sein de la société F-Val</h1>
		<?php 
		if (! isset($_SESSION['email']))
		{
			require_once("vue/vue_connexion.php");
		}
		if(isset($_POST['seConnecter']))
		{
			$email= $_POST['email'];
			$mdp= $_POST['mdp'];
			$where = array('email'=>$email ,'mdp'=>$mdp);
			$unControleur->setTable("user");
			$unUser = $unControleur->selectWhere($where);
			if(isset($unUser['email']))
			{
				$_SESSION['email'] = $unUser['email'];
				$_SESSION['nom'] = $unUser['nom'];
				$_SESSION['prenom'] = $unUser['prenom'];
				$_SESSION['role'] = $unUser['role'];
				header("Location: index.php");
			}else{
				echo "<br/> Vérifiez vos identifiants";
			}
		}
		if(isset($_SESSION['email']))
		{
			echo '
		

		<a href="index.php?page=0">
			<img src="images/home.png" height="100" width="100">
		</a>
		<a href="index.php?page=1">
			<img src="images/centre.png" height="100" width="100">
		</a>
		<a href="index.php?page=2">
			<img src="images/type.png" height="100" width="100">
		</a>
		<a href="index.php?page=3">
			<img src="images/patient.png" height="100" width="100">
		</a>
		<a href="index.php?page=4">
			<img src="images/vaccin.png" height="100" width="100">
		</a>
		<a href="index.php?page=5">
			<img src="images/vaccination.png" height="100" width="100">
		</a>
		<a href="index.php?page=6">
			<img src="images/deconnection.jpg" height="100" width="100">
		</a>
		';

			if(isset($_GET['page']))
			{
				$page = $_GET['page'];
			}else{
				$page = 0;
			}
			switch ($page) {
				case 0: require_once ("home.php"); break;
				case 1: require_once ("gestion_centres.php"); break;
				case 2: require_once ("gestion_types.php"); break;
				case 3: require_once ("gestion_personnes.php"); break;
				case 4: require_once ("gestion_Vaccins.php"); break;
				case 5: require_once ("gestion_Vaccinations.php"); break;
				case 6: unset($_SESSION);
						session_destroy();
						header("Location: index.php");
						 break;
			}
		}
		?>
	</center>
</body>
</html>
