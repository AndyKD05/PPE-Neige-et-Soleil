<h2>Gestion des employes</h2>
<?php
if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	$unControleur->setTable("employes");
	$lEmploye= null;
	if(isset($_GET['action']) and isset($_GET['idemp']))
	{
		$idemp = $_GET['idemp'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('idemp'=>$idemp);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('idemp'=>$idemp);
			$lEmploye=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_employe.php");
	if(isset($_POST['Valider']))
	{
		$tab= array('nom_emp'=>$_POST['nom_emp'],
			'prenom_emp'=>$_POST['prenom_emp'],
			'tel_emp'=>$_POST['tel_emp'],
			'mail_emp'=>$_POST['mail_emp'],
			'date_naiss_emp'=>$_POST['date_naiss_emp'],
			'numero_emp'=>$_POST['numero_emp'],
			'rue_emp'=>$_POST['rue_emp'],
			'CP_emp'=>$_POST['CP_emp'],
			'ville_emp'=>$_POST['ville_emp'],
			'date_embauche'=>$_POST['date_embauche'],
			'mdp_emp'=>$_POST['mdp_emp'],
			'date_depart'=>$_POST['date_depart']
		);
		$unControleur->insert($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('nom_emp'=>$_POST['nom_emp'],
			'prenom_emp'=>$_POST['prenom_emp'],
			'tel_emp'=>$_POST['tel_emp'],
			'mail_emp'=>$_POST['mail_emp'],
			'date_naiss_emp'=>$_POST['date_naiss_emp'],
			'numero_emp'=>$_POST['numero_emp'],
			'rue_emp'=>$_POST['rue_emp'],
			'CP_emp'=>$_POST['CP_emp'],
			'ville_emp'=>$_POST['ville_emp'],
			'date_embauche'=>$_POST['date_embauche'],
			'mdp_emp'=>$_POST['mdp_emp'],
			'date_depart'=>$_POST['date_depart']
		);
		$where= array("idemp"=>$_GET['idemp']
	);
		$unControleur->update($tab,$where);
		header("location: index.php?page=5");
	}
}
	$unControleur->setTable("employes");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("idemp",
			"nom_emp",
			"prenom_emp",
			"tel_emp",
			"mail_emp",
			"date_naiss_emp",
			"numero_emp",
			"rue_emp",
			"CP_emp",
			"ville_emp",
			"date_embauche",
			"mdp_emp",
			"date_depart"
		);
		$lesEmployes = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesEmployes = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_employes.php");
?>