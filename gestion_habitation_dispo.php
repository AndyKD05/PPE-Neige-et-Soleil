
<?php
	$unControleur->setTable("proprietaire");
	$lesProprietaires = $unControleur->selectAll();
	$tab=null;
	$unControleur->callproc('cleandispo',$tab);
	if(isset($_POST['Reserver']))
	{
		$_SESSION['select_idh'] = $_GET['idh'];
		echo 'entrer dans le bouton';
		echo $_SESSION['select_idh'];
		echo $_SESSION['select_nb_personne'];
		//require_once("gestion_reservation.php");
	}

	if (isset($_SESSION['email']))
	{
		$unControleur->setTable("habitation_dispo");
		require_once("vue/vue_select_habitation_dispo.php");
		if(isset($_POST['Filtrer']))
		{
			$tab= array($_POST['debut'],$_POST['fin'],$_POST['nb_personne']
			);
			$_SESSION['select_nb_personne'] = $_POST['nb_personne'];
			$unControleur->callproc('selectdispo',$tab);
		}
	}
	$unControleur->setTable("habitation_dispo");

	$lesHabitations_dispo = $unControleur->selectAll ();
	require_once("vue/vue_les_habitations_dispo.php");
?>