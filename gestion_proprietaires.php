
<?php
$pass = '/(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])/';
$nom = '/^[^@&"()!_$*€£`+=\/;?#]+$/';
if (isset($_SESSION['email']) and ($_SESSION['role']=='emp' or $_SESSION['role']=='prop'))
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
		if(preg_match($pass, $_POST['mdp_p']) and preg_match($nom, $_POST['nom_p']) and preg_match($nom, $_POST['prenom_p'])){
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
			'mdp_p'=>hash('sha256',$_POST['mdp_p']),
			'question'=>hash('sha256',$_POST['question']),
			'reponse'=>hash('sha256',$_POST['reponse'])
			);
			$unControleur->insert($tab);
        }else{
            echo 'Critères de nom, prenom ou mot de passe non respecté';
        }
		
	}
	if(isset($_POST['Modifier']))
	{
		if(preg_match($pass, $_POST['mdp_p']) and preg_match($nom, $_POST['nom_p']) and preg_match($nom, $_POST['prenom_p'])){
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
				'mdp_p'=>hash('sha256',$_POST['mdp_p']),
				'question'=>hash('sha256',$_POST['question']),
				'reponse'=>hash('sha256',$_POST['reponse'])
				);
			$where= array("idp"=>$_GET['idp']);
			$unControleur->update($tab,$where);
			header("location: index.php?page=3");
		}else{
            echo 'Critères de nom, prenom ou mot de passe non respecté';
        }
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