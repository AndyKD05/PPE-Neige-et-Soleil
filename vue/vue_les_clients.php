<h3> Liste des clients </h3>
</br>
<form method="post">
	Mot de recherche: <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
</br>
<table border="1"> 
<tr>
	<td> id client </td>
	<td> nom et prenom</td>
	<td> tel </td>
	<td> email </td>
	<td> date de naissance </td>
	<td> adresse </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesClients as $unCLient){
	echo "<tr>";
	echo"
		<td>".$unCLient['idc']."</td>
		<td>".$unCLient['nom_c']." ".$unCLient['prenom_c']."</td>
		<td>".$unCLient['tel_c']."</td>
		<td>".$unCLient['mail_c']."</td>
		<td>".$unCLient['date_naiss_c']."</td>
		<td>".$unCLient['numero_c']." ".$unCLient['rue_c']." , ".$unCLient['cp_c']." , ".$unCLient['ville_c']."</td>
		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	echo "
	<td>
	<a href='index.php?page=4&action=sup&idc=".$unCLient['idc']."'><img src='images/sup.png' height='30' width='30'><a/>
	<a href='index.php?page=4&action=edit&idc=".$unCLient['idc']."'><img src='images/edit.jpg' height='30' width='30'><a/>
	</td>
	";
	echo "<tr>";
	}
}
?>
</table>