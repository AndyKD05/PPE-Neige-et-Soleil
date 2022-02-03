<h3> Liste des personnes </h3>
</br>
<form method="post">
	Mot de recherche: <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
</br>
<table border="1"> 
<tr>
	<td> Numero de sécurité sociale </td>
	<td> Nom </td>
	<td> Prenom </td>
	<td> date de naissance </td>
	<td> adresse </td>
	<td> code postal </td>
	<td> email </td>
	<td> allergies </td>
	<td> statut </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesPersonnes as $unePersonne){
	echo "<tr>";
	echo"
		<td>".$unePersonne['numsecu']."</td>
		<td>".$unePersonne['nom']."</td>
		<td>".$unePersonne['prenom']."</td>
		<td>".$unePersonne['datenaiss']."</td>
		<td>".$unePersonne['adresse']."</td>
		<td>".$unePersonne['cp']."</td>
		<td>".$unePersonne['email']."</td>
		<td>".$unePersonne['allergies']."</td>
		<td>".$unePersonne['statut']."</td>
		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	echo "
	<td>
	<a href='index.php?page=3&action=sup&numsecu=".$unePersonne['numsecu']."'><img src='images/sup.png' height='30' width='30'><a/>
	<a href='index.php?page=3&action=edit&numsecu=".$unePersonne['numsecu']."'><img src='images/edit.jpg' height='30' width='30'><a/>
	</td>
	";
	echo "<tr>";
	}
}
?>
</table>