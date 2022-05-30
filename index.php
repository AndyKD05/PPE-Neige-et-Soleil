<?php
	session_start();
	ob_start();
	require_once("controleur/config_bdd.php");
	require_once("controleur/controleur.class.php");
	$unControleur = new Controleur($serveur,$bdd,$user,$mdp);
?>
		
<!DOCTYPE html>
<html lang="fr">

  <head>
  <!-- Bootstrap -->
  <link href="css/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <!-- Bootstrap/Javascript-->
    <script src="css/bootstrap/js/bootstrap.min.js"></script>
    <script src="css/bootstrap/js/bootstrap.js"></script>

    <title>Neige et Soleil</title>
  </head>

  <body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-info">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse justify-content-center" id="navbarsExample08">
  	<a class="mx-5" href="index.php?page=0">
  		<img class src="images/logo.png" width="115" height="115" alt="Neige et Soleil" >
  	</a>
    <ul class="navbar-nav text-blod nav-pills">		

	<?php
 
 if(isset($_GET['page']))
 {
	 $page = $_GET['page'];
 }else{
	 $page = 0;
 }
 
 $$page = 'menu'.$page;
 $$$page = " active ";
 
//echo $$$page;

$menuActive0="" ;
$menuActive1="" ;  
$menuActive2="" ;  
$menuActive3="" ;  
$menuActive4="" ; 
$menuActive5="" ;  
$menuActive6="" ; 
$menuActive7="" ;
$menuActive8="" ;  
$menuActive9="" ;   
$menuActive10="" ;   
$menuActive11="" ;  
$menuActive12="" ;  
$menuActive13="" ;  
$menuActive14="" ;  

$menuActive15="" ;   	
$menuActive16="" ;   
$menuActive17="" ;  

$menuActive18="" ;  
$menuActive19="" ;  

$menuActive20="" ;
$menuActive21="" ;  
$menuActive22="" ; 
$menuActive23="" ;  
$menuActive24="" ;   
$menuActive25="" ;   


switch ($page) {
	case 0: $menuActive0=$$$page ; $$$page=""; 
	case 1: $menuActive1=$$$page ; $$$page="";  
	case 2: $menuActive2=$$$page ; $$$page=""; 
	case 3: $menuActive3=$$$page ; $$$page=""; 
	case 4: $menuActive4=$$$page ; $$$page=""; 
	case 5: $menuActive5=$$$page ; $$$page=""; 
	case 6: $menuActive6=$$$page ; $$$page=""; 
	case 7: $menuActive7=$$$page ; $$$page=""; 
	case 8: $menuActive8=$$$page ; $$$page=""; 
	case 9: $menuActive9=$$$page ; $$$page=""; 
	case 10: $menuActive10=$$$page ;  $$$page=""; 
	case 11: $menuActive11=$$$page ;  $$$page=""; 
	case 12: $menuActive12=$$$page ;  $$$page=""; 
	case 13: $menuActive13=$$$page ;  $$$page=""; 
	case 14: $menuActive14=$$$page ;  $$$page=""; 
	case 15: $menuActive15=$$$page ;  $$$page=""; 
	case 16: $menuActive16=$$$page ;  $$$page="";  
	case 17: $menuActive17=$$$page ;  $$$page=""; 
	case 18: $menuActive18=$$$page ; $$$page="";  
	case 19: $menuActive19=$$$page ; $$$page="";  
	case 20: $menuActive20=$$$page ; $$$page=""; 
	case 21: $menuActive21=$$$page ; $$$page=""; 
	case 22: $menuActive22=$$$page ; $$$page=""; 
	case 23: $menuActive23=$$$page ; $$$page=""; 
	case 24: $menuActive24=$$$page ; $$$page=""; 
	case 25: $menuActive25=$$$page ; $$$page=""; 
	}


	if(!isset($_SESSION['email']))
		{
			echo
			'<li class="nav-item px-3 x-5 ">
        		<a class="nav-link '.$menuActive0.'  text-light font-weight-bold " aria-current="page" href="index.php?page=0">Accueil</a>
      		</li>';

     		 echo
			'<li class="nav-item px-3 ">
       			<a class="nav-link '.$menuActive21.'  text-light font-weight-bold" href="index.php?page=21">Activités de la région</a>
      		</li>';

     		echo
			'<li class="nav-item px-3 ">
        		<a class="nav-link '.$menuActive22.'  text-light font-weight-bold" href="index.php?page=22">Partenaire</a>
      		</li>';

			echo
			'<li class="nav-item px-3  ">
       			<a class="nav-link '.$menuActive2.'  text-light font-weight-bold" href="index.php?page=2">Offres</a>
     		</li>';

      		echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';

      		echo'	
    	 	<li class="nav-item dropdown px-4 ">
	        	<a class="nav-link '.$menuActive15.$menuActive16.$menuActive17.'  text-light btn btn-primary   dropdown-toggle " href="#" id="dropdownResultat" role="button" data-bs-toggle="dropdown" aria-expanded="false">Connexion</a>
	        	<div class="dropdown-menu" aria-labelledby="dropdown08">
		          	<a class="dropdown-item" href="index.php?page=16">Connexion propriétare</a>
		          	<a class="dropdown-item" href="index.php?page=17">Connexion client</a>
		          	<a class="dropdown-item" href="index.php?page=15">Connexion employé</a>
	        	</div>
      		</li> ';

         	echo'	
       		<li class="nav-item dropdown px-2 ">
        		<a class="nav-link '.$menuActive18.$menuActive19.'  btn text-black btn-light dropdown-toggle " href="#" id="dropdownResultat" role="button" data-bs-toggle="dropdown" aria-expanded="false">Inscription</a>
	        	<div class="dropdown-menu" aria-labelledby="dropdown08">
		          	<a class="dropdown-item" href="index.php?page=19">Inscription propriétare</a>
		          	<a class="dropdown-item" href="index.php?page=18">Inscritpion client</a>
	        	</div>
      		</li>';
				
				
		}

			if(isset($_SESSION['email']))
			{
				if($_SESSION['role']=="prop")
				{
					echo
					'<li class="nav-item">
<<<<<<< HEAD
						<a class="nav-link '.$menuActive2.' " href="index.php?page=2">Offres</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link '.$menuActive7.' " href="index.php?page=7">CML</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link '.$menuActive8.' " href="index.php?page=8">Exception</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link '.$menuActive11.' " href="index.php?page=11">Tarifs</a>
=======
						<a class="nav-link text-light font-weight-bold" href="index.php?page=2">Offres</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link text-light font-weight-bold" href="index.php?page=7">CML</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link text-light font-weight-bold" href="index.php?page=8">Exception</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link text-light font-weight-bold" href="index.php?page=11">Tarifs</a>
>>>>>>> update
					</li>';
				}

				if($_SESSION['role']=="emp")
				{

					echo
					'<li class="nav-item">
<<<<<<< HEAD
						<a class="nav-link '.$menuActive2.' " href="index.php?page=2">Offres</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link '.$menuActive4.' " href="index.php?page=4">Client</a>
=======
						<a class="nav-link text-light font-weight-bold" href="index.php?page=2">Offres</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link text-light font-weight-bold" href="index.php?page=4">Client</a>
>>>>>>> update
					</li>';

					echo
					'<li class="nav-item">
<<<<<<< HEAD
						<a class="nav-link '.$menuActive11.' " href="index.php?page=11">Tarifs</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link '.$menuActive5.' " href="index.php?page=5">Employé</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link '.$menuActive7.' " href="index.php?page=7">CML</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link '.$menuActive8.' " href="index.php?page=8">Exception</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link '.$menuActive10.' " href="index.php?page=10">Location</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link '.$menuActive11.' " href="index.php?page=11">Tarifs</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link '.$menuActive12.' " href="index.php?page=12">Réservation</a>
=======
						<a class="nav-link text-light font-weight-bold" href="index.php?page=11">Tarifs</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link text-light font-weight-bold" href="index.php?page=5">Employé</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link text-light font-weight-bold" href="index.php?page=7">CML</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link text-light font-weight-bold" href="index.php?page=8">Exception</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link text-light font-weight-bold" href="index.php?page=10">Location</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link text-light font-weight-bold" href="index.php?page=11">Tarifs</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link text-light font-weight-bold" href="index.php?page=12">Réservation</a>
>>>>>>> update
					</li>';
				}
				if($_SESSION['role']=="cli")
				{
					echo
					'<li class="nav-item">
<<<<<<< HEAD
						<a class="nav-link '.$menuActive4.' " href="index.php?page=4">Mes informations</a>
=======
						<a class="nav-link text-light font-weight-bold" href="index.php?page=4">Mes informations</a>
>>>>>>> update
					</li>';

					echo
					'<li class="nav-item">
<<<<<<< HEAD
						<a class="nav-link '.$menuActive10.' " href="index.php?page=10">Location</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link '.$menuActive9.' " href="index.php?page=9">Réservation</a>
=======
						<a class="nav-link text-light font-weight-bold" href="index.php?page=10">Location</a>
					</li>';
					echo
					'<li class="nav-item">
						<a class="nav-link text-light font-weight-bold" href="index.php?page=9">Réservation</a>
>>>>>>> update
					</li>';
				}
				echo
				'<li class="nav-item">
<<<<<<< HEAD
					<a class="nav-link '.$menuActive6.' " href="index.php?page=6">Saisons</a>
				</li>';
				echo
				'<li class="nav-item">
					<a class="nav-link '.$menuActive20.' " href="index.php?page=20">Déconnexion</a>
=======
					<a class="nav-link text-light font-weight-bold" href="index.php?page=6">Saisons</a>
				</li>';
				echo
				'<li class="nav-item">
					<a class="nav-link text-light font-weight-bold" href="index.php?page=20">Déconnexion</a>
>>>>>>> update
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
</nav>
    

<?php
		
		if (! isset($_SESSION['email']))
		{

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
				echo'test';
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
		}
?>


		
<center>


<?php 

if(isset($_GET['page']))
{
	$page = $_GET['page'];
}else{
	$page = 0;
}


			switch ($page) {
				case 0: require_once ("home.php"); break;
				case 1: require_once ("vue/vue_inscription.php"); break;
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
				case 13: require_once ("gestion_forget_pass_prop.php"); break;
				case 14: require_once ("gestion_forget_pass_cli.php"); break;
				case 15: require_once ("vue/vue_connexion_emp.php"); break;
				case 16: require_once ("vue/vue_connexion_prop.php"); break;
				case 17: require_once ("gestion_connexion_cli.php"); break;
				case 18: require_once ("gestion_inscription_client.php"); break;
				case 19: require_once ("gestion_inscription_proprietaire.php"); break;
				case 21: require_once ("vue_vitrine/vue_activite_region.php"); break;
			    case 22: require_once ("vue_vitrine/vue_partenaire.php"); break;
			    case 23: require_once ("vue_vitrine/vue_mention.php"); break;
			 	case 24: require_once ("vue_vitrine/vue_a_propos.php"); break;
			 	case 25: require_once ("vue_vitrine/vue_contact.php"); break;
				default : require_once("vue/erreur.php"); break;
				case 20: unset($_SESSION);
						session_destroy();
						header("Location: index.php");
						 break;

		}
		?>
</center>

<div class="container-expand-lg bg-info">
  <footer class="py-3 my-4">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
	<!--
        <li class="nav-item"><a href="index.php?page=0" class="nav-link px-2 text-light">Accueil</a></li>
		<li class="nav-item"><a href="index.php?page=2" class="nav-link px-2 text-light">Nos offres</a></li>
		<li class="nav-item"><a href="index.php?page=22" class="nav-link px-2 text-light">Partenaire</a></li>
	--> 
        <li class="nav-item"><a href="index.php?page=24" class="nav-link px-2 text-light">A propos de nous</a></li>
        <li class="nav-item"><a href="index.php?page=25" class="nav-link px-2 text-light">Contactez-nous</a></li>
        <li class="nav-item"><a href="index.php?page=23" class="nav-link px-2 text-light">Mentions légales</a></li>		
    </ul>
    <p class="text-center text-light font-weight-bold">&copy; 2021 Neige Soleil, Inc</p>
  </footer>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>
