<h2>Gestion des clients</h2>
<?php
if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	$unControleur->setTable("saison");
	$laSaison= null;
	if(isset($_GET['action']) and isset($_GET['ids']))
	{
		$ids = $_GET['ids'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('ids'=>$ids);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('ids'=>$ids);
			$laSaison=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_saison.php");
	if(isset($_POST['Valider']))
	{
		$tab= array('saison'=>$_POST['saison'],
			'debut_saison'=>$_POST['debut_saison'],
			'fin_saison'=>$_POST['fin_saison'],
			'annee_s'=>$_POST['annee_s']
		);
		$unControleur->insert($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('saison'=>$_POST['saison'],
			'debut_saison'=>$_POST['debut_saison'],
			'fin_saison'=>$_POST['fin_saison'],
			'annee_s'=>$_POST['annee_s']
		);
		$where= array("ids"=>$_GET['ids']
	);
		$unControleur->update($tab,$where);
		header("location: index.php?page=6");
	}
}
	$unControleur->setTable("saison");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("ids",
			"saison",
			"debut_saison",
			"fin_saison",
			"annee_s"
		);
		$lesSaisons = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesSaisons = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_saisons.php");
?>