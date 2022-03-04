<h3> Liste des employes </h3>
</br>
<form method="post">
	Mot de recherche: <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
</br>
<table border="1"> 
<tr>
	<td> id employe </td>
	<td> nom et prenom</td>
	<td> tel </td>
	<td> email </td>
	<td> date de naissance </td>
	<td> adresse </td>
	<td> date d'embauche </td>
	<td> date de depart </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesEmployes as $unEmploye){
	echo "<tr>";
	echo"
		<td>".$unEmploye['idemp']."</td>
		<td>".$unEmploye['nom_emp']." ".$unEmploye['prenom_emp']."</td>
		<td>".$unEmploye['tel_emp']."</td>
		<td>".$unEmploye['mail_emp']."</td>
		<td>".$unEmploye['date_naiss_emp']."</td>
		<td>".$unEmploye['numero_emp']." ".$unEmploye['rue_emp']." , ".$unEmploye['CP_emp']." , ".$unEmploye['ville_emp']."</td>
		<td>".$unEmploye['date_embauche']."</td>
		<td>".$unEmploye['date_depart']."</td>

		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	echo "
	<td>
	<a href='index.php?page=5&action=sup&idemp=".$unEmploye['idemp']."'><img src='images/sup.png' height='30' width='30'><a/>
	<a href='index.php?page=5&action=edit&idemp=".$unEmploye['idemp']."'><img src='images/edit.jpg' height='30' width='30'><a/>
	</td>
	";
	echo "<tr>";
	}
}
?>
</table>