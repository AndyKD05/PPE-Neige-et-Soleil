<h2>Gestion des types</h2>
<?php
if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	$unControleur->setTable("habitation");
	$lhabitation= null;
	if(isset($_GET['action']) and isset($_GET['idh']))
	{
		
		$idh = $_GET['idh'];
		$action = $_GET['action'];
		switch ($action)
		{
			case "sup" :
			$where = array('idh'=>$idh);
			$unControleur->delete($where);
			break;
			case "edit" :
			$where = array('idh'=>$idh);
			$leType=$unControleur->selectWhere($where);
			break;
		}
	}
	require_once("vue/vue_insert_offre.php");
	if(isset($_POST['Valider']))
	{
		$tab= array('numero_h'=>$_POST['numero_h'],
			'rue_h'=>$_POST['rue_h'],
			'ville_h'=>$_POST['ville_h'],
			'CP_h'=>$_POST['CP_h'],
			'nom_immeuble_h'=>$_POST['nom_immeuble_h'],
			'superficie_h'=>$_POST['superficie_h'],
			'type_h'=>$_POST['type_h'],
			'capacite_acceuil_h'=>$_POST['capacite_acceuil_h'],
			'surface_habitable_h'=>$_POST['surface_habitable_h'],
			'surface_balcon_h'=>$_POST['surface_balcon_h'],
			'distance_piste_h'=>$_POST['distance_piste_h'],
			'exposition_h'=>$_POST['exposition_h'],
			'cave_h'=>$_POST['cave_h'],
			'local_a_ski_h'=>$_POST['local_a_ski_h']
		);
		$unControleur->insert($tab);
	}
	if(isset($_POST['Modifier']))
	{
		$tab= array('numero_h'=>$_POST['numero_h'],
			'rue_h'=>$_POST['rue_h'],
			'ville_h'=>$_POST['ville_h'],
			'CP_h'=>$_POST['CP_h'],
			'nom_immeuble_h'=>$_POST['nom_immeuble_h'],
			'superficie_h'=>$_POST['superficie_h'],
			'type_h'=>$_POST['type_h'],
			'capacite_acceuil_h'=>$_POST['capacite_acceuil_h'],
			'surface_habitable_h'=>$_POST['surface_habitable_h'],
			'surface_balcon_h'=>$_POST['surface_balcon_h'],
			'distance_piste_h'=>$_POST['distance_piste_h'],
			'exposition_h'=>$_POST['exposition_h'],
			'cave_h'=>$_POST['cave_h'],
			'local_a_ski_h'=>$_POST['local_a_ski_h']
		);
		$where= array("id_type"=>$_GET['id_type']
	);
		$unControleur->update($tab,$where);
		header("location: index.php?page=2");
	}
}
	$unControleur->setTable("habitation");
	if (isset($_POST['Rechercher']))
	{
		$mot=$_POST['mot'];
		$tab = array("idh",
			"numero_h",
			"rue_h",
			"ville_h",
			"nom_immeuble_h",
			"superficie_h",
			"type_h",
			"capacite_acceuil_h",
			"surface_habitable_h",
			"surface_balcon_h",
			"distance_piste_h",
			"exposition_h",
			"cave_h",
			"local_a_ski_h"
		);
		$leshabitations = $unControleur->selectSearch($tab,$mot);
	}else
	{
		$leshabitations = $unControleur->selectAll ();
	}

	
	require_once("vue/vue_les_offres.php");
?>