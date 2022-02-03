<h2>Gestion des vaccins</h2>
<?php
	$unControleur->setTable("centre");
	$lesCentres = $unControleur->selectAll();

if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	$unControleur->setTable("vaccin");
	$leVaccin= null;
	if(isset($_GET['action']) and isset($_GET['id_vac']))
	{
		
		$id_vac = $_GET['id_vac'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('id_vac'=>$id_vac);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('id_vac'=>$id_vac);
			$leVaccin=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_vaccin.php");
	if(isset($_POST['Valider']))
	{
		$tab= array('nom_vac' =>$_POST['nom_vac'],
			'temp_stock_req'=>$_POST['temp_stock_req'],
			'doses_stock'=>$_POST['doses_stock'],
			'id_centre'=>$_POST['id_centre'],
		);
		$unControleur->insert($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('nom_vac' =>$_POST['nom_vac'],
			'temp_stock_req'=>$_POST['temp_stock_req'],
			'doses_stock'=>$_POST['doses_stock'],
			'id_centre'=>$_POST['id_centre'],
		);
		$where= array("id_vac"=>$_GET['id_vac']);
		$unControleur->update($tab,$where);
		header("location: index.php?page=4");
	}
}
	$unControleur->setTable("lesVaccins");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("id_vac","nom_vac","temp_stock_req","doses_stock","nom_centre");
		$lesVaccins = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesVaccins = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_vaccins.php");
?>