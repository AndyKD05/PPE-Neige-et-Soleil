<h2>Gestion des reservations</h2>
<?php
	$unControleur->setTable("client");
	$lesClients = $unControleur->selectAll();
	$unControleur->setTable("habitation");
	$lesHabitations = $unControleur->selectAll();
	$unControleur->setTable("saison");
	$lesSaisons = $unControleur->selectAll();

if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	$unControleur->setTable("reservation");
	$laReservation= null;
	if(isset($_GET['action']) and isset($_GET['idr']))
	{
		$idr = $_GET['idr'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('idr'=>$idr);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('idr'=>$idr);
			$laReservation=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_reservation.php");
	if(isset($_POST['Valider']))
	{
		$tab= array('nb_personnes_r' =>$_POST['nb_personnes_r'],
			'date_r'=>date('Y-m-d'),
			'date_dr'=>$_POST['date_dr'],
			'date_fr'=>$_POST['date_fr'],
			'etat_r'=>'en attente',
			'idc'=>$_POST['idc'],
			'idh'=>$_POST['idh'],
			'saison'=>'basse',
			'annee_s'=>''
		);
		$unControleur->insert($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('nb_personnes_r' =>$_POST['nb_personnes_r'],
			'date_r'=>$_POST['date_r'],
			'date_dr'=>$_POST['date_dr'],
			'date_fr'=>$_POST['date_fr'],
			'etat_r'=>$_POST['etat_r'],
			'idc'=>$_POST['idc'],
			'idh'=>$_POST['idh']
		);
		$where= array("idr"=>$_GET['idr']);
		$unControleur->update($tab,$where);
		header("location: index.php?page=12");
	}
}
	$unControleur->setTable("viewReservations");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("idr",
			"nb_personnes_r",
			"date_r",
			"date_dr",
			"date_fr",
			"etat_r",
			"idc",
			"prenom_c",
			"nom_c",
			"idh",
			"nom_immeubl_h",
			"ville_h",
			"saison",
			"debut_saison",
			"fin_saison"
		);
		$lesReservations = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesReservations = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_reservations.php");
?>