<?php
	require_once("vue/vue_connexion_cli.php");
			if(isset($_POST['seConnecterCli']))
			{
				echo'test';
				$email= $_POST['email']."|cli";
				$mdp= hash('sha256',$_POST['mdp']);
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
					echo "<br/> Vérifiez vos identifiants";
				}
			}


?>
