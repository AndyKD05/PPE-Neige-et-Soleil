

<h3> Vos contrats de location </h3>
</br>
<form method="post" class="form-inline">
<strong class="presentation">	Mot de recherche: </strong> <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-success">
</form>
</br>
<table class="table table-striped table-info"> 
<tr>
	<td> id contrat </td>
	<td> Prix total</td>
	<td> Reservation </td>
	<td> Date debut </td>
	<td> Date fin </td>
	<td> Client</td>
	<td> Habitation </td>


</tr>

<?php  
	echo "<tr>
		<td>".$leCDL['idcl']."</td>
		<td>".$leCDL['prix_total']."</td>
		<td>".$leCDL['idr']."</td>
		<td>".$leCDL['date_dr']."</td>
		<td>".$leCDL['date_fr']."</td>
		<td>".$leCDL['idc']." ".$leCDL['prenom_c']." ".$leCDL['nom_c']."</td>
		<td>".$leCDL['idh']." ".$leCDL['nom_immeuble_h']." ".$leCDL['ville_h']."</td>
		<tr>";
?>
</table>
