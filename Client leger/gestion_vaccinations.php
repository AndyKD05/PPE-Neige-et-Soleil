<h2>Gestion des vaccinations</h2>
<?php
	$unControleur->setTable("centre");
	$lesCentres = $unControleur->selectAll();
	$unControleur->setTable("lesVaccins");
	$lesVaccins = $unControleur->selectAll();
	$unControleur->setTable("personne");
	$lesPersonnes = $unControleur->selectAll();

if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	$unControleur->setTable("vacciner");
	$laVaccination= null;
	if(isset($_GET['action']) and isset($_GET['id_vac']) and isset($_GET['numsecu']) and isset($_GET['date_vac']) and isset($_GET['id_centre']))
	{
		
		$id_vac = $_GET['id_vac'];
		$numsecu = $_GET['numsecu'];
		$date_vac = $_GET['date_vac'];
		$id_centre = $_GET['id_centre'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('id_vac'=>$id_vac,'numsecu'=>$numsecu,'date_vac'=>$date_vac, 'id_centre'=>$id_centre);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('id_vac'=>$id_vac,'numsecu'=>$numsecu,'date_vac'=>$date_vac, 'id_centre'=>$id_centre);
			$laVaccination=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_vaccination.php");
	if(isset($_POST['Valider']))
	{
		$unControleur->setTable("vacciner");
		$tab= array('id_vac' =>$_POST['id_vac'],
			'numsecu'=>$_POST['numsecu'],
			'date_vac'=>$_POST['date_vac'],
			'id_centre'=>$_POST['id_centre']

		);
		$unControleur->insertnonull($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('id_vac' =>$_POST['id_vac'],
			'numsecu'=>$_POST['numsecu'],
			'date_vac'=>$_POST['date_vac'],
			'id_centre'=>$_POST['id_centre'],
		);
		$where = array('id_vac'=>$id_vac,'numsecu'=>$numsecu,'date_vac'=>$date_vac, 'id_centre'=>$id_centre);
		$unControleur->update($tab,$where);
		header("location: index.php?page=5");
	}
}
	$unControleur->setTable("lesVaccinations");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("id_vac","numsecu","nom","prenom","nom_vac","date_vac","nom_centre");
		$lesVaccinations = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesVaccinations = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_vaccinations.php");
?>