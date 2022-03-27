<?php
	$unControleur->setTable("proprietaire");
	$lesProprietaires = $unControleur->selectAll();
	$tab=null;
	$unControleur->callproc('cleandispo',$tab);
	if(isset($_GET['action']))
	{
		$idh = $_GET['idh'];
		$tab= array('nb_personnes_r' =>$_SESSION['select_nb_personne'],
			'date_r'=>date('Y-m-d'),
			'date_dr'=>$_SESSION['select_debut'],
			'date_fr'=>$_SESSION['select_fin'],
			'etat_r'=>'en attente',
			'idc'=>$_SESSION['id'],
			'idh'=>$idh,
			'saison'=>'basse',
			'annee_s'=>''
		);
		$unControleur->setTable("reservation");
		$unControleur->insert($tab);
		echo 'reservation effectuée';


	}

	if (isset($_SESSION['email']))
	{
		$unControleur->setTable("habitation_dispo");
		require_once("vue/vue_select_catalogue.php");
		if(isset($_POST['Filtrer']))
		{
			$tab= array($_POST['debut'],$_POST['fin'],$_POST['nb_personne']
			);
			$_SESSION['select_nb_personne'] = $_POST['nb_personne'];
			$_SESSION['select_debut'] = $_POST['debut'];
			$_SESSION['select_fin'] = $_POST['fin'];
			$unControleur->callproc('selectdispo',$tab);
		}
	}
	$unControleur->setTable("habitation_dispo");

	$lesHabitations_dispo = $unControleur->selectAll ();
	require_once("vue/vue_le_catalogue.php");
?>