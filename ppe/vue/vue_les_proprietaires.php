<h3> Liste des proprietaires </h3>
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
		echo "<td> id proprietaire </td>";
	}
	?>
	<td> nom et prenom</td>
	<td> tel </td>
	<td> email </td>
	<td> date de naissance </td>
	<td> adresse </td>
	<td> pays </td>
	<td> rib </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesProprietaires as $unProprietaire){
	if(($unProprietaire['idp']==$_SESSION['id'] and $_SESSION['role']=="prop") or $_SESSION['role']=="emp")
	{
		echo "<tr>";
		if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
		{
			echo"<td>".$unProprietaire['idp']."</td>";
		}
		echo"
		<td>".$unProprietaire['nom_p']." ".$unProprietaire['prenom_p']."</td>
		<td>".$unProprietaire['tel_p']."</td>
		<td>".$unProprietaire['mail_p']."</td>
		<td>".$unProprietaire['date_naiss_p']."</td>
		<td>".$unProprietaire['numero_p']." ".$unProprietaire['rue_p']." , ".$unProprietaire['CP_p']." , ".$unProprietaire['ville_p']."</td>
		<td>".$unProprietaire['pays_p']."</td>
		<td>".$unProprietaire['rib_p']."</td>
		";

		if (isset($_SESSION['email']) and ($_SESSION['role']=="emp" or $_SESSION['role']=="prop"))
		{
			echo "
			<td>
			<a href='index.php?page=3&action=sup&idp=".$unProprietaire['idp']."'><img src='images/sup.png' height='30' width='30'><a/>
			<a href='index.php?page=3&action=edit&idp=".$unProprietaire['idp']."'><img src='images/edit.jpg' height='30' width='30'><a/>
			</td>
			";
		}
	}
	echo "</tr>";
}
?>
</table>