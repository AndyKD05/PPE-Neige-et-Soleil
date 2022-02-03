<h3> Liste des centres </h3>
</br>
<form method="post">
	Mot de recherche: <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
</br>
<table border="1"> 
<tr>
	<td> id centre </td>
	<td> nom </td>
	<td> adresse </td>
	<td> ville </td>
	<td> cp </td>
	<td> nbr_soignant </td>
	<td> capa_stock </td>
	<td> type </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesCentres as $unCentre){
	echo "<tr>";
	echo"
		<td>".$unCentre['id_centre']."</td>
		<td>".$unCentre['nom']."</td>
		<td>".$unCentre['adresse']."</td>
		<td>".$unCentre['ville']."</td>
		<td>".$unCentre['cp']."</td>
		<td>".$unCentre['nbr_soignant']."</td>
		<td>".$unCentre['capa_stock']."</td>
		<td>".$unCentre['description']."</td>
		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	echo "
	<td>
	<a href='index.php?page=1&action=sup&id_centre=".$unCentre['id_centre']."'><img src='images/sup.png' height='30' width='30'><a/>
	<a href='index.php?page=1&action=edit&id_centre=".$unCentre['id_centre']."'><img src='images/edit.jpg' height='30' width='30'><a/>
	</td>
	";
	echo "<tr>";
	}
}
?>
</table>