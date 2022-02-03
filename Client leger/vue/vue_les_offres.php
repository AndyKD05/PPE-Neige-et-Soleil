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
		<td>".$uneHabitation['id_type']."</td>
		<td>".$uneHabitation['nbr_soignant_min']."</td>
		<td>".$uneHabitation['descriptif']."</td>
		<td>".$uneHabitation['capa_stock_min']."</td>
		<td>".$uneHabitation['temp_stock']."</td>
		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	echo "
	<td>
	<a href='index.php?page=2&action=sup&id_type=".$unType['id_type']."'><img src='images/sup.png' height='30' width='30'><a/>
	<a href='index.php?page=2&action=edit&id_type=".$unType['id_type']."'><img src='images/edit.jpg' height='30' width='30'><a/>
	</td>
	";
	echo "<tr>";
	}
}
?>
</table>