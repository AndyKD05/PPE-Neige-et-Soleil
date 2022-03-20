<h2>Gestion des tarifs</h2>
<?php
	$unControleur->setTable("saison");
	$lesSaisons = $unControleur->selectAll();
	$unControleur->setTable("contrat_mandat_locatif");
	$lesCML = $unControleur->selectAll();

if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	$unControleur->setTable("tarification");
	$leTarif= null;
	if(isset($_GET['action']) and isset($_GET['idcml']) and isset($_GET['saison']) and isset($_GET['annee_s']))
	{
		
		$idcml = $_GET['idcml'];
		$saison = $_GET['saison'];
		$annee_s = $_GET['annee_s'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('idcml'=>$idcml,'saison'=>$saison,'annee_s'=>$annee_s);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('idcml'=>$idcml,'saison'=>$saison,'annee_s'=>$annee_s);
			$leTarif=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_tarif.php");
	if(isset($_POST['Valider']))
	{
		$unControleur->setTable("tarification");
		$tab= array('tarif' =>$_POST['tarif'],
			'idcml'=>$_POST['idcml'],
			'saison'=>$_POST['saison'],
			'annee_s'=>$_POST['annee_s']
		);
		$unControleur->insertnonull($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('tarif' =>$_POST['tarif'],
			'idcml'=>$_POST['idcml'],
			'saison'=>$_POST['saison'],
			'annee_s'=>$_POST['annee_s']
		);
		$where = array('idcml'=>$idcml,'saison'=>$saison,'annee_s'=>$annee_s);
		$unControleur->update($tab,$where);
		header("location: index.php?page=11");
	}
}
	$unControleur->setTable("viewTarifs");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("tarif", "idcml", "descriptif", "date_debut_cml", "date_fin_cml", "idh", "nom_immeuble_h", "ville_h", "idp", "prenom_p", "nom_p", "saison", "debut_saison","fin_saison","annee_s");
		$lesTarifs = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesTarifs = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_tarifs.php");
?>