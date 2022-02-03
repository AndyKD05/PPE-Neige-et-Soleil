<h2>Gestion des personnes</h2>
<?php
if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	$unControleur->setTable("personne");
	$laPersonne= null;
	if(isset($_GET['action']) and isset($_GET['numsecu']))
	{
		
		$numsecu = $_GET['numsecu'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('numsecu'=>$numsecu);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('numsecu'=>$numsecu);
			$laPersonne=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_personne.php");
	if(isset($_POST['Valider']))
	{
		$tab= array('nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'datenaiss'=>$_POST['datenaiss'],'adresse'=>$_POST['adresse'],'cp'=>$_POST['cp'],'tel'=>$_POST['tel'],'email'=>$_POST['email'],'mdp'=>$_POST['mdp'],'allergies'=>$_POST['allergies'],'statut'=>$_POST['statut'],'role'=>$_POST['role']);
		$unControleur->insert($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'datenaiss'=>$_POST['datenaiss'],'adresse'=>$_POST['adresse'],'cp'=>$_POST['cp'],'tel'=>$_POST['tel'],'email'=>$_POST['email'],'mdp'=>$_POST['mdp'],'allergies'=>$_POST['allergies'],'statut'=>$_POST['statut'],'role'=>$_POST['role']);
		$where= array("numsecu"=>$_GET['numsecu']);
		$unControleur->update($tab,$where);
		header("location: index.php?page=3");
	}
}
	$unControleur->setTable("personne");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("nom","prenom","datenaiss","adresse","cp","tel","email","allergies","statut","role");
		$lesPersonnes = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$lesPersonnes = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_personnes.php");
?>