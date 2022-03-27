<h2>Mot de passe propriétaire oublié</h2>
<?php
$pass = '/(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])/';
$nom = '/^[^@&"()!_$*€£`+=\/;?#]+$/';

	
	$unControleur->setTable("proprietaire");
	$leProprietaire= null;
	
	if(isset($_POST['Verifier']))
	{

		$where = array('mail_p'=>$_POST['mail_p'],'question'=>hash('sha256',$_POST['question']),'reponse'=>hash('sha256',$_POST['reponse']));
		$leProprietaire=$unControleur->selectWhere($where);
		if($leProprietaire==null)
		{
			echo'informations incorrectes';
		}else
		{
			$_SESSION['oubliemail']=$_POST['mail_p'];
		}
	}
	if(isset($_POST['Modifier']))
	{
		if(preg_match($pass, $_POST['mdp_p']))
		{
			$tab= array(
				'mdp_p'=>hash('sha256',$_POST['mdp_p'])
			);
			$where= array("mail_p"=>$_SESSION['oubliemail']);
			$unControleur->update($tab,$where);
			echo'Mot de passe modifié';
			sleep(1);
			header("location: index.php?page=0");
		}else{
            echo 'Critères de complexité de mot de passe non respecté';
        }
	}
	require_once("vue/vue_forget_pass_prop.php");
?>