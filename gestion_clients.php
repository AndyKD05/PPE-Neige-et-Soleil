
<?php
$pass = '/(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])/';
$nom = '/^[^@&"()!_$*€£`+=\/;?#]+$/';
if (isset($_SESSION['email']) and ($_SESSION['role']=="emp" or $_SESSION['role']=="cli"))
{
	$unControleur->setTable("client");
	$leClient= null;
	if(isset($_GET['action']) and isset($_GET['idc']))
	{
		$idc = $_GET['idc'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('idc'=>$idc);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('idc'=>$idc);
			$leClient=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_client.php");
	if(isset($_POST['Valider']))
	{
        if(preg_match($pass, $_POST['mdp_c']) and preg_match($nom, $_POST['nom_c']) and preg_match($nom, $_POST['prenom_c'])){
            $tab= array('nom_c'=>$_POST['nom_c'],
			'prenom_c'=>$_POST['prenom_c'],
			'tel_c'=>$_POST['tel_c'],
			'mail_c'=>$_POST['mail_c'],
			'date_naiss_c'=>$_POST['date_naiss_c'],
			'numero_c'=>$_POST['numero_c'],
			'rue_c'=>$_POST['rue_c'],
			'cp_c'=>$_POST['cp_c'],
			'ville_c'=>$_POST['ville_c'],
			'mdp_c'=>hash('sha256',$_POST['mdp_c']),
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
		if(preg_match($pass, $_POST['mdp_c']) and preg_match($nom, $_POST['nom_c']) and preg_match($nom, $_POST['prenom_c']))
		{
			$tab= array('nom_c'=>$_POST['nom_c'],
				'prenom_c'=>$_POST['prenom_c'],
				'tel_c'=>$_POST['tel_c'],
				'mail_c'=>$_POST['mail_c'],
				'date_naiss_c'=>$_POST['date_naiss_c'],
				'numero_c'=>$_POST['numero_c'],
				'rue_c'=>$_POST['rue_c'],
				'cp_c'=>$_POST['cp_c'],
				'ville_c'=>$_POST['ville_c'],
				'mdp_c'=>hash('sha256',$_POST['mdp_c']),
				'question'=>hash('sha256',$_POST['question']),
				'reponse'=>hash('sha256',$_POST['reponse'])
			);
			$where= array("idc"=>$_GET['idc']);
			$unControleur->update($tab,$where);
			header("location: index.php?page=4");
		}else{
            echo 'Critères de nom, prenom ou mot de passe non respecté';
        }
	}
}
	$unControleur->setTable("client");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("idc",
			"nom_c",
			"prenom_c",
			"tel_c",
			"mail_c",
			"date_naiss_c",
			"numero_c",
			"rue_c",
			"cp_c",
			"ville_c",
			"mdp_c"
		);
		$lesClients = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesClients = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_clients.php");
?>