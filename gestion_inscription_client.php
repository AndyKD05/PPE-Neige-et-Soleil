
<?php
$pass = '/(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])/';
$nom = '/^[^@&"()!_$*€£`+=\/;?#]+$/';

	$unControleur->setTable("client");
	require_once("vue/vue_inscription_client.php");
	if(isset($_POST['Inscrire']))
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
			$email= $_POST['mail_c']."|cli";
			$mdp= hash('sha256',$_POST['mdp_c']);
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
			}else{
				echo 'un compte existe déja avec cette adresse mail';
			}
        }else{
            echo 'Critères de nom, prenom ou mot de passe non respecté';
        }
	}

?>