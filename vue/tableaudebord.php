<?php
	$unControleur->setTable("technicien");
	$nbTechniciens = $unControleur->count();

	$unControleur->setTable("client");
	$nbClients = $unControleur->count();

	$unControleur->setTable("categorie");
	$nbCategories = $unControleur->count();

	$unControleur->setTable("intervention");
	$nbInterventions = $unControleur->count();
?>
<table border="1">
	<tr>
		<td>NB Techniciens</td>
		<td>NB Clients</td>
		<td>NB Categories</td>
		<td>NB Interventions</td>
	</tr>
	<tr>
		<td><?= $nbTechniciens['nb'] ?></td>
		<td><?= $nbClients['nb'] ?></td>
		<td><?= $nbCategories['nb'] ?></td>
		<td><?= $nbInterventions['nb'] ?></td>
	</tr>
</table>

<table border="1">
	<tr>
		<td>Categories</td>
		<td>nb Interventions</td>
	</tr>

<?php
	$unControleur->setTable("lescategories");
$lesCats = $unControleur->selectAll();
			foreach($lesCats as $uneCat)
			{
				echo"<tr>
				<td>".$uneCat['libelle']."</td>
				<td>".$uneCat['nb']."</td></tr>";
			}


 ?>
