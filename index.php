<?php
	session_start();
	require_once("controleur/config_bdd.php");
	require_once("controleur/controleur.class.php");
	$unControleur = new Controleur($serveur,$bdd,$user,$mdp);
?>


<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Neige et Soleil</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="/css/style.css"> 

  </head>

  <body>

    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="logo navbar-brand" href="index.php">Neige et soleil</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item active">

                <a class="nav-link" href="index.php">Home</a>

            </li>
			<!--
			<li class="nav-item active">
				<a class="nav-link" href="/vue/vue_connexion_cli.php">Connexion<span class="sr-only">(current)</span></a>
			</li>

			<li class="nav-item active">
				<a class="nav-link" href="/vue/vue_inscription_Client.php">Inscription<span class="sr-only">(current)</span></a>
			</li>
-->
			
			<?php

			if(!isset($_SESSION['email']))
			{
				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=2">Offres</a>
				</li>';

				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=18">Sign In</a>
				</li>';

				echo
				'<li class="nav-item">
					<a class="btn btn-primary" href="index.php?page=17">Sign Up</a>
				</li>';
				
				
			}

			if(isset($_SESSION['email']))
			{

				if($_SESSION['role']=="prop" or $_SESSION['role']=="emp")
				{

					echo
					'<li class="nav-item">
						<a class="nav-link" href="index.php?page=2">Offres</a>
					</li>';
				}
				if($_SESSION['role']=="cli" or $_SESSION['role']=="emp")
				{
					echo
					'<li class="nav-item">
						<a class="nav-link" href="index.php?page=4">Client</a>
					</li>';

					echo
					'<li class="nav-item">
						<a class="nav-link" href="index.php?page=11">Tarifs</a>
					</li>';
				}
				if($_SESSION['role']=="emp")
				{
					echo
					'<li class="nav-item">
						<a class="nav-link" href="index.php?page=5">Employé</a>
					</li>';
				}

				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=6">Saisons</a>
				</li>';
				if($_SESSION['role']=="prop" or $_SESSION['role']=="emp")
				{

					echo
					'<li class="nav-item">
						<a class="nav-link" href="index.php?page=7">CML</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link" href="index.php?page=8">Exception</a>
					</li>';
				}
				if($_SESSION['role']=="cli" or $_SESSION['role']=="emp")
				{
					echo
					'<li class="nav-item">
						<a class="nav-link" href="index.php?page=10">Location</a>
					</li>';
				}
				if($_SESSION['role']=="cli")
				{
					echo
					'<li class="nav-item">
						<a class="nav-link" href="index.php?page=9">Réservation</a>
					</li>';
				}
				if($_SESSION['role']=="emp")
				{

					echo
					'<li class="nav-item">
						<a class="nav-link" href="index.php?page=11">Tarifs</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link" href="index.php?page=12">Réservation</a>
					</li>';
				}

				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=20">Déconnexion</a>
				</li>';

				if(isset($_GET['page']))
				{
					$page = $_GET['page'];
				}else{
					$page = 0;
				}
					
			}
			?>
            
          </ul>
        </div>
      </div>
    </nav>

    
    <header class="tete">
       <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <h1 class="text-uppercase">
              <strong class="presentation">Bienvenue sur Neige et Soleil</strong>
            <hr width="50%" color="#FFA07A" />
            </h1>
			</div>
			<div class="col-lg-8 mx-auto">
				<p class="texto text-faded mb-5">Nous sommes une entreprise de prestation de services qui met en locations des appartements. Partez à la montagne avec nous !</p>
				<a class="btn btn-dark btn-xl" href="#">Apprenez-en plus sur nous !</a>
			</div>
          </div>
        </div>
      </div>

    </header>
		</br>
		
	<center>

		<?php
		require_once("home.php");
		if (! isset($_SESSION['email']))
		{
			
			/*
			echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=2">Offres</a>
				</li>';
			*/
			if(isset($_POST['seConnecterEmp']))
			{
				$email= $_POST['email']."|emp";
				$mdp= hash('sha256',$_POST['mdp']);
				$where = array('email'=>$email ,'mdp'=>$mdp);
				$unControleur->setTable("user");
				$unUser = $unControleur->selectWhere($where);
				if(isset($unUser['email']))
				{
					$id_role = explode('|', $unUser['id']);
					$_SESSION['email'] = $unUser['email'];
					$_SESSION['id'] = $id_role[0];
					$_SESSION['role'] = $id_role[1];
					header("Location: index.php");
				}else{
					echo "<br/> Vérifiez vos identifiants";
				}
			}
			if(isset($_POST['seConnecterProp']))
			{
				$email= $_POST['email']."|prop";
				$mdp= hash('sha256',$_POST['mdp']);
				$where = array('email'=>$email ,'mdp'=>$mdp);
				$unControleur->setTable("user");
				$unUser = $unControleur->selectWhere($where);
				if(isset($unUser['email']))
				{
					$id_role = explode('|', $unUser['id']);
					$_SESSION['email'] = $unUser['email'];
					$_SESSION['id'] = $id_role[0];
					$_SESSION['role'] = $id_role[1];
					header("Location: index.php");
				}else{
					echo "<br/> Vérifiez vos identifiants";
				}
			}
			
			if(isset($_POST['seConnecterCli']))
			{
				$email= $_POST['email']."|cli";
				$mdp= hash('sha256',$_POST['mdp']);
				$where = array('email'=>$email ,'mdp'=>$mdp);
				$unControleur->setTable("user");
				$unUser = $unControleur->selectWhere($where);
				if(isset($unUser['email']))
				{
					$id_role = explode('|', $unUser['id']);
					$_SESSION['email'] = $unUser['email'];
					$_SESSION['id'] = $id_role[0];
					$_SESSION['role'] = $id_role[1];
					header("Location: index.php");
				}else{
					echo "<br/> Vérifiez vos identifiants";
				}
			}
			
			if(isset($_GET['page']))
			{
				$page = $_GET['page'];
			}else{
				$page = 0;
			}
			switch ($page) {
				case 0: require_once ("home.php"); break;
				case 1: require_once ("sign_in.php"); break;
				case 2: require_once ("gestion_offres.php"); break;
				case 3: require_once ("sign_up.php"); break;
				case 13: require_once ("gestion_forget_pass_prop.php"); break;
				case 14: require_once ("gestion_forget_pass_cli.php"); break;
				case 15: require_once ("vue/vue_connexion_emp.php"); break;
				case 16: require_once ("vue/vue_connexion_prop.php"); break;
				case 17: require_once ("vue/vue_connexion_cli.php"); break;
				case 18: require_once ("gestion_inscription_client.php"); break;
				case 19: require_once ("gestion_inscription_proprietaire.php"); break;
			}

		}
		
		if(isset($_SESSION['email']))
		{

			if(isset($_GET['page']))
			{
				$page = $_GET['page'];
			}else{
				$page = 0;
			}
			switch ($page) {
				case 0: require_once ("home.php"); break;
				case 2: require_once ("gestion_offres.php"); break;
				case 3: require_once ("gestion_proprietaires.php"); break;
				case 4: require_once ("gestion_clients.php"); break;
				case 5: require_once ("gestion_employes.php"); break;
				case 6: require_once ("gestion_saisons.php"); break;
				case 7: require_once ("gestion_CML.php"); break;
				case 8: require_once ("gestion_exceptions.php"); break;
				case 9: require_once ("gestion_catalogue.php"); break;
				case 10: require_once ("gestion_CDL.php"); break;
				case 11: require_once ("gestion_tarifs.php"); break;
				case 12: require_once ("gestion_reservations.php"); break;
				case 20: unset($_SESSION);
						session_destroy();
						header("Location: index.php");
						 break;
			}
		}
		?>
	</center>
	<footer class="py-2 fixed-bottom">
		<p class="m-1 text-center text-white">Copyright &copy; Félix Millon & Théo Chesnais & Andy Kadiambu</p>
	</footer>
</body>

</html>
