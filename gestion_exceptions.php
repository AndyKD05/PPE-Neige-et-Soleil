
<?php
	$unControleur->setTable("proprietaire");
	$lesProprietaires = $unControleur->selectAll();
	$unControleur->setTable("contrat_mandat_locatif");
	$lesCML = $unControleur->selectAll();

if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	$unControleur->setTable("date_exception");
	$lException= null;
	if(isset($_GET['action']) and isset($_GET['idde']))
	{
		
		$idde = $_GET['idde'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('idde'=>$idde);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('idde'=>$idde);
			$lException=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_exception.php");
	if(isset($_POST['Valider']))
	{
		$tab= array('date_debute' =>$_POST['date_debute'],
			'date_fine'=>$_POST['date_fine'],
			'idcml'=>$_POST['idcml']
		);
		$unControleur->insert($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('date_debute' =>$_POST['date_debute'],
			'date_fine'=>$_POST['date_fine'],
			'idcml'=>$_POST['idcml']
		);
		$where= array("idde"=>$_GET['idde']);
		$unControleur->update($tab,$where);
		header("location: index.php?page=8");
	}
}
	$unControleur->setTable("viewExceptions");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("idde",
			"date_debute",
			"date_fine",
			"idcml",
			"descriptif",
			"idp",
			"prenom_p",
			"nom_p"
		);
		$lesExceptions = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesExceptions = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_Exceptions.php");
?>