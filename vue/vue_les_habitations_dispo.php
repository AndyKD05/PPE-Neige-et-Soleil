


<h3><strong class="presentation"> Liste des bien disponibles </strong> </h3>
</br>
<form method="post" class="form-inline">
<strong class="presentation">Mot de recherche: </strong> <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-secondary">
</form>
</br>
<table class="table table-striped table-dark"> 
<tr>
	<td> Adresse </td>
	<td> Descriptif </td>
	<td> Superficie </td>
	<td> Type </td>
	<td> Capacite d'acceuil </td>
	<td> Surface </td>
	<td> Balcon </td>
	<td> Distance piste </td>
	<td> Exposition </td>
	<td> Cave </td>
	<td> Local à ski </td>
	<td> Proprietaire </td>
<td> Opérations </td>
</tr>

<?php  
foreach ($lesHabitations_dispo as $uneHabitation_dispo){
	echo "<tr>
		<td>".$uneHabitation_dispo['numero_h']." ".$uneHabitation_dispo['rue_h']." ".$uneHabitation_dispo['CP_h']." ".$uneHabitation_dispo['ville_h']."</td>
		<td>".$uneHabitation_dispo['nom_immeuble_h']."</td>
		<td>".$uneHabitation_dispo['superficie_h']."</td>
		<td>".$uneHabitation_dispo['type_h']."</td>
		<td>".$uneHabitation_dispo['capacite_acceuil_h']."</td>
		<td>".$uneHabitation_dispo['surface_habitable_h']."</td>
		<td>".$uneHabitation_dispo['surface_balcon_h']."</td>
		<td>".$uneHabitation_dispo['distance_piste_h']."</td>
		<td>".$uneHabitation_dispo['exposition_h']."</td>
		<td>".$uneHabitation_dispo['cave_h']."</td>
		<td>".$uneHabitation_dispo['local_a_ski_h']."</td>
		<td>".$uneHabitation_dispo['idp']."</td>
		";
	if (isset($_SESSION['email']))
	{
		echo '
		<td><input type="submit"  name ="Reserver" value="Reserver"></td>
		';
	}
	echo "</tr>";
}
?>
</table>

