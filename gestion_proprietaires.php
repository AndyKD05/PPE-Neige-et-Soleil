<h2>Gestion des proprietaires</h2>
<?php
if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	$unControleur->setTable("proprietaire");
	$leProprietaire= null;
	if(isset($_GET['action']) and isset($_GET['idp']))
	{
		
		$idp = $_GET['idp'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('idp'=>$idp);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('idp'=>$idp);
			$leProprietaire=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_proprietaire.php");
	if(isset($_POST['Valider']))
	{
		$tab= array('nom_p'=>$_POST['nom_p'],
			'prenom_p'=>$_POST['prenom_p'],
			'tel_p'=>$_POST['tel_p'],
			'mail_p'=>$_POST['mail_p'],
			'date_naiss_p'=>$_POST['date_naiss_p'],
			'numero_p'=>$_POST['numero_p'],
			'rue_p'=>$_POST['rue_p'],
			'CP_p'=>$_POST['CP_p'],
			'ville_p'=>$_POST['ville_p'],
			'pays_p'=>$_POST['pays_p'],
			'rib_p'=>$_POST['rib_p'],
			'mdp_p'=>$_POST['mdp_p']
		);
		$unControleur->insert($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('nom_p'=>$_POST['nom_p'],
			'prenom_p'=>$_POST['prenom_p'],
			'tel_p'=>$_POST['tel_p'],
			'mail_p'=>$_POST['mail_p'],
			'date_naiss_p'=>$_POST['date_naiss_p'],
			'numero_p'=>$_POST['numero_p'],
			'rue_p'=>$_POST['rue_p'],
			'CP_p'=>$_POST['CP_p'],
			'ville_p'=>$_POST['ville_p'],
			'pays_p'=>$_POST['pays_p'],
			'rib_p'=>$_POST['rib_p'],
			'mdp_p'=>$_POST['mdp_p']
		);
		$where= array("idp"=>$_GET['idp']
	);
		$unControleur->update($tab,$where);
		header("location: index.php?page=3");
	}
}
	$unControleur->setTable("proprietaire");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("idp",
			"nom_p",
			"prenom_p",
			"tel_p",
			"mail_p",
			"date_naiss_p",
			"numero_p",
			"rue_p",
			"CP_p",
			"ville_p",
			"pays_p",
			"rib_p",
			"mdp_p"
		);
		$lesProprietaires = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesProprietaires = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_proprietaires.php");
?>