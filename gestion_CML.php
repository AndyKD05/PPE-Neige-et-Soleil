
<?php
	$unControleur->setTable("proprietaire");
	$lesProprietaires = $unControleur->selectAll();
	$unControleur->setTable("habitation");
	$lesHabitations = $unControleur->selectAll();

if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	$unControleur->setTable("contrat_mandat_locatif");
	$leCML= null;
	if(isset($_GET['action']) and isset($_GET['idcml']))
	{
		
		$idcml = $_GET['idcml'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('idcml'=>$idcml);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('idcml'=>$idcml);
			$leCML=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_CML.php");
	if(isset($_POST['Valider']))
	{
		$tab= array('descriptif' =>$_POST['descriptif'],
			'date_debut_cml'=>$_POST['date_debut_cml'],
			'date_fin_cml'=>$_POST['date_fin_cml'],
			'etat_contrat'=>$_POST['etat_contrat'],
			'idh'=>$_POST['idh']
		);
		$unControleur->insert($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('descriptif' =>$_POST['descriptif'],
			'date_debut_cml'=>$_POST['date_debut_cml'],
			'date_fin_cml'=>$_POST['date_fin_cml'],
			'etat_contrat'=>$_POST['etat_contrat'],
			'idh'=>$_POST['idh']
		);
		$where= array("idcml"=>$_GET['idcml']);
		$unControleur->update($tab,$where);
		header("location: index.php?page=7");
	}
}
	$unControleur->setTable("viewCML");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("idcml",
			"date_debut_cml",
			"date_fin_cml",
			"etat_contrat",
			"idp","prenom_p",
			"nom_p",
			"idh",
			"nom_immeubl_h",
			"ville_h"
		);
		$lesCML = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesCML = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_CML.php");
?>