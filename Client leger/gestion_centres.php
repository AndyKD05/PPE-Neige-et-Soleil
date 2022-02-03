<h2>Gestion des centres</h2>
<?php
	$unControleur->setTable("type_centre");
	$lesTypes = $unControleur->selectAll();

if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	$unControleur->setTable("centre");
	$leCentre= null;
	if(isset($_GET['action']) and isset($_GET['id_centre']))
	{
		
		$id_centre = $_GET['id_centre'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('id_centre'=>$id_centre);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('id_centre'=>$id_centre);
			$leCentre=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_centre.php");
	if(isset($_POST['Valider']))
	{
		$tab= array('nom' =>$_POST['nom'],
			'adresse'=>$_POST['adresse'],
			'ville'=>$_POST['ville'],
			'cp'=>$_POST['cp'],
			'nbr_soignant'=>$_POST['nbr_soignant'],
			'capa_stock'=>$_POST['capa_stock'],
			'id_type'=>$_POST['id_type']
		);
		$unControleur->insert($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('nom' =>$_POST['nom'],
			'adresse'=>$_POST['adresse'],
			'ville'=>$_POST['ville'],
			'cp'=>$_POST['cp'],
			'nbr_soignant'=>$_POST['nbr_soignant'],
			'capa_stock'=>$_POST['capa_stock'],
			'id_type'=>$_POST['id_type']
		);
		$where= array("id_centre"=>$_GET['id_centre']);
		$unControleur->update($tab,$where);
		header("location: index.php?page=1");
	}
}
	$unControleur->setTable("lescentres");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("id_type","nbr_soignant_min","descriptif","capa_stock_min","temp_stock");
		$lesCentres = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesCentres = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_centres.php");
?>