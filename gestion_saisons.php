
<?php
if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	$unControleur->setTable("saison");
	$laSaison= null;
	if(isset($_GET['action']) and isset($_GET['saison'])  and isset($_GET['annee_s']))
	{
		$saison = $_GET['saison'];
		$annee_s = $_GET['annee_s'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('saison'=>$saison,'annee_s'=>$annee_s);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('saison'=>$saison,'annee_s'=>$annee_s);
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
		$unControleur->insertnonull($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('saison'=>$_POST['saison'],
			'debut_saison'=>$_POST['debut_saison'],
			'fin_saison'=>$_POST['fin_saison'],
			'annee_s'=>$_POST['annee_s']
		);
		$where= array("saison"=>$_GET['saison'],"annee_s"=>$_GET['annee_s']);
		$unControleur->update($tab,$where);
		header("location: index.php?page=6");
	}
}
	$unControleur->setTable("saison");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array(
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