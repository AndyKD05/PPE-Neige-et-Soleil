
<?php
	$unControleur->setTable("reservation");
	$lesReservations = $unControleur->selectAll();

if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	$unControleur->setTable("contrat_location");
	$leCDL= null;
	if(isset($_GET['action']) and isset($_GET['idcl']))
	{
		
		$idcl = $_GET['idcl'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('idcl'=>$idcl);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('idcl'=>$idcl);
			$leCDL=$unControleur->selectWhere($where);
			break;
			case "imprimer" :
			$where = array('idcl'=>$idcl);
			$unControleur->setTable("viewReservations");
			$leCDL=$unControleur->selectWhere($where);
			require_once("gestion_imprimer.php");
			break;
		}
	}
	require_once("vue/vue_insert_CDL.php");
	if(isset($_POST['Valider']))
	{
		$tab= array('prix_total' =>$_POST['prix_total'],
			'idr'=>$_POST['idr'],
			'etat_des_lieux'=>$_POST['etat_des_lieux']
		);
		$unControleur->insert($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('prix_total' =>$_POST['prix_total'],
			'idr'=>$_POST['idr'],
			'etat_des_lieux'=>$_POST['etat_des_lieux']
		);
		$where= array("idcl"=>$_GET['idcl']);
		$unControleur->update($tab,$where);
		header("location: index.php?page=10");
	}
}
	$unControleur->setTable("viewCDL");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("idcl",
			"prix_total",
			"idr",
			"etat_des_lieux"
		);
		$lesCDL = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesCDL = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_CDL.php");
?>