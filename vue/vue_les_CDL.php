<h3> Liste des contrats de location </h3>
</br>
<form method="post">
	Mot de recherche: <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
</br>
<table border="1"> 
<tr>
	<td> id contrat </td>
	<td> Prix total</td>
	<td> Reservation </td>
	<td> Date debut </td>
	<td> Date fin </td>
	<td> Client</td>
	<td> Habitation </td>
	<td> Etat des lieux </td>

	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesCDL as $unCDL){
	echo "<tr>";
	echo"
		<td>".$unCDL['idcl']."</td>
		<td>".$unCDL['prix_total']."</td>
		<td>".$unCDL['idr']."</td>
		<td>".$unCDL['date_dr']."</td>
		<td>".$unCDL['date_fr']."</td>
		<td>".$unCDL['idc']." ".$unCDL['prenom_c']." ".$unCDL['nom_c']."</td>
		<td>".$unCDL['idh']." ".$unCDL['nom_immeuble_h']." ".$unCDL['ville_h']."</td>
		<td>".$unCDL['etat_des_lieux']."</td>
		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	echo "
	<td>
	<a href='index.php?page=10&action=sup&idcl=".$unCDL['idcl']."'><img src='images/sup.png' height='30' width='30'><a/>
	<a href='index.php?page=10&action=edit&idcl=".$unCDL['idcl']."'><img src='images/edit.jpg' height='30' width='30'><a/>
	</td>
	";
	echo "<tr>";
	}
}
?>
</table>