<h2>Gestion des proprietaires</h2>
<?php
$pass = '/(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])/';
$nom = '/^[^@&"()!_$*€£`+=\/;?#]+$/';

	$unControleur->setTable("proprietaire");
	require_once("vue/vue_inscription_Proprietaire.php");
	if(isset($_POST['Inscrire']))
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
			$email= $_POST['mail_p']."|prop";
			$mdp= hash('sha256',$_POST['mdp_p']);
			$where = array('email'=>$email ,'mdp'=>$mdp);
			$unControleur->setTable("user");
			$unUser = $unControleur->selectWhere($where);
			if(isset($unUser['email']))
			{
				$id_role = explode('|', $unUser['id']);
				$_SESSION['email'] = $unUser['email'];
				$_SESSION['id'] = $id_role[0];
				$_SESSION['role'] = $id_role[1];
				header("Location: index.php");
			}
			else
			{
				echo 'un compte existe déja avec cette adresse mail';
			}
        }else{
            echo 'Critères de nom, prenom ou mot de passe non respecté';
        }
	}
?>