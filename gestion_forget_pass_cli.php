<h2>Mot de passe client oublié</h2>
<?php
$pass = '/(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])/';
$nom = '/^[^@&"()!_$*€£`+=\/;?#]+$/';

	
	$unControleur->setTable("client");
	$leClient= null;
	
	if(isset($_POST['Verifier']))
	{

		$where = array('mail_c'=>$_POST['mail_c'],'question'=>hash('sha256',$_POST['question']),'reponse'=>hash('sha256',$_POST['reponse']));
		$leClient=$unControleur->selectWhere($where);
		if($leClient==null)
		{
			echo'informations incorrectes';
		}else
		{
			$_SESSION['oubliemail']=$_POST['mail_c'];
		}
	}
	if(isset($_POST['Modifier']))
	{
		if(preg_match($pass, $_POST['mdp_c']))
		{
			$tab= array(
				'mdp_c'=>hash('sha256',$_POST['mdp_c'])
			);
			$where= array("mail_c"=>$_SESSION['oubliemail']);
			$unControleur->update($tab,$where);
			echo'Mot de passe modifié';
			sleep(1);
			header("location: index.php?page=0");
		}else{
            echo 'Critères de complexité de mot de passe non respecté';
        }
	}
	require_once("vue/vue_forget_pass_cli.php");
?>