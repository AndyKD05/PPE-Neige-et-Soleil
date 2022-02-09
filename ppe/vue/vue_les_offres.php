<h3> Liste des offres </h3>
</br>
<form method="post">
	Mot de recherche: <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
</br>
<table border="1"> 
<tr>
	<td> id habitation </td>
	<td> adresse </td>
	<td> descriptif </td>
	<td> superficie </td>
	<td> type </td>
	<td> capacite_acceui </td>
	<td> surface_habitable </td>
	<td> surface_balcon </td>
	<td> distance_piste </td>
	<td> exposition </td>
	<td> cave </td>
	<td> local_a_ski </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesHabitations as $uneHabitation){
	echo "<tr>";
	echo"
		<td>".$uneHabitation['idh']."</td>
		<td>".$uneHabitation['numero_h']." ".$uneHabitation['rue_h']." ".$uneHabitation['CP_h']." ".$uneHabitation['ville_h']."</td>
		<td>".$uneHabitation['nom_immeuble_h']."</td>
		<td>".$uneHabitation['superficie_h']."</td>
		<td>".$uneHabitation['type_h']."</td>
		<td>".$uneHabitation['capacite_acceuil_h']."</td>
		<td>".$uneHabitation['surface_habitable_h']."</td>
		<td>".$uneHabitation['surface_balcon_h']."</td>
		<td>".$uneHabitation['distance_piste_h']."</td>
		<td>".$uneHabitation['exposition_h']."</td>
		<td>".$uneHabitation['cave_h']."</td>
		<td>".$uneHabitation['local_a_ski_h']."</td>
		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	echo "
	<td>
	<a href='index.php?page=2&action=sup&idh=".$uneHabitation['idh']."'><img src='images/sup.png' height='30' width='30'><a/>
	<a href='index.php?page=2&action=edit&idh=".$uneHabitation['idh']."'><img src='images/edit.jpg' height='30' width='30'><a/>
	</td>
	";
	echo "<tr>";
	}
}
?>
</table>