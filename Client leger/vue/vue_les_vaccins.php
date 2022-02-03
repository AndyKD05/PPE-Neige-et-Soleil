<h3> Liste des vaccins </h3>
</br>
<form method="post">
	Mot de recherche: <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
</br>
<table border="1"> 
<tr>
	<td> id vaccin </td>
	<td> nom vaccin </td>
	<td> temp_stock_req </td>
	<td> doses_stock </td>
	<td> centre </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesVaccins as $unVaccin){
	echo "<tr>";
	echo"
		<td>".$unVaccin['id_vac']."</td>
		<td>".$unVaccin['nom_vac']."</td>
		<td>".$unVaccin['temp_stock_req']."</td>
		<td>".$unVaccin['doses_stock']."</td>
		<td>".$unVaccin['nom_centre']."</td>
		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	echo "
	<td>
	<a href='index.php?page=4&action=sup&id_vac=".$unVaccin['id_vac']."'><img src='images/sup.png' height='30' width='30'><a/>
	<a href='index.php?page=4&action=edit&id_vac=".$unVaccin['id_vac']."'><img src='images/edit.jpg' height='30' width='30'><a/>
	</td>
	";
	echo "<tr>";
	}
}
?>
</table>