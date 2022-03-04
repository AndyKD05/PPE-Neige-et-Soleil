<h3> Liste des exceptions </h3>
</br>
<form method="post">
	Mot de recherche: <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
</br>
<table border="1"> 
<tr>
<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	echo" <td> id exception </td>";
}?>
	<td> date de debut</td>
	<td> date de fin </td>
	<td> contrat concerné </td>
	<td> proprietaire concerné </td>
<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	echo "<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesExceptions as $uneException){
	echo "<tr>";
	if(($uneException['idp']==$_SESSION['id'] and $_SESSION['role']=="prop") or $_SESSION['role']=="emp")
	{
		if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
		{
			echo"<td>".$uneException['idde']."</td>";
		}
		echo"
			<td>".$uneException['date_debute']."</td>
			<td>".$uneException['date_fine']."</td>
			<td>".$uneException['idcml']." ".$uneException['descriptif']."</td>
			<td>".$uneException['idp']." ".$uneException['prenom_p']." ".$uneException['nom_p']."</td>
			";
	}
	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
	{
		echo "
		<td>
		<a href='index.php?page=8&action=sup&idde=".$uneException['idde']."'><img src='images/sup.png' height='30' width='30'><a/>
		<a href='index.php?page=8&action=edit&idde=".$uneException['idde']."'><img src='images/edit.jpg' height='30' width='30'><a/>
		</td>
		";
	}
	echo "</tr>";
}
?>
</table>