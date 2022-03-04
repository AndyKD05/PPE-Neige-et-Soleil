<h3> Liste des saisons </h3>
</br>
<form method="post">
	Mot de recherche: <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
</br>
<table border="1"> 
<tr>
	<td> id saison </td>
	<td> Saison</td>
	<td> debut saison </td>
	<td> fin saison </td>
	<td> Année </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesSaisons as $uneSaison){
	echo "<tr>";
	echo"
		<td>".$uneSaison['ids']."</td>
		<td>".$uneSaison['saison']."</td>
		<td>".$uneSaison['debut_saison']."</td>
		<td>".$uneSaison['fin_saison']."</td>
		<td>".$uneSaison['annee_s']."</td>
		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	echo "
	<td>
	<a href='index.php?page=6&action=sup&ids=".$uneSaison['ids']."'><img src='images/sup.png' height='30' width='30'><a/>
	<a href='index.php?page=6&action=edit&ids=".$uneSaison['ids']."'><img src='images/edit.jpg' height='30' width='30'><a/>
	</td>
	";
	echo "<tr>";
	}
}
?>
</table>