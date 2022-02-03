<h3> Liste des vaccinations </h3>
</br>
<form method="post">
	Mot de recherche: <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
</br>
<table border="1"> 
<tr>
	<td> vaccin </td>
	<td> prenom</td>
	<td>nom</td>
	<td>numero</td>
	<td> date </td>
	<td> centre </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesVaccinations as $uneVaccination){
	echo "<tr>";
	echo"
		<td>".$uneVaccination['nom_vac']."</td>
		<td>".$uneVaccination['prenom']."</td>
		<td>".$uneVaccination['nom']."</td>
		<td>".$uneVaccination['numsecu']."</td>
		<td>".$uneVaccination['date_vac']."</td>
		<td>".$uneVaccination['nom_centre']."</td>
		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	echo "
	<td>
	<a href='index.php?page=5&action=sup&id_vac=".$uneVaccination['id_vac']."&numsecu=".$uneVaccination['numsecu']."&date_vac=".$uneVaccination['date_vac']."&id_centre=".$uneVaccination['id_centre']."'><img src='images/sup.png' height='30' width='30'><a/>
	<a href='index.php?page=5&action=edit&id_vac=".$uneVaccination['id_vac']."&numsecu=".$uneVaccination['numsecu']."&date_vac=".$uneVaccination['date_vac']."&id_centre=".$uneVaccination['id_centre']."'><img src='images/edit.jpg' height='30' width='30'><a/>
	</td>
	";
	echo "<tr>";
	}
}
?>
</table>