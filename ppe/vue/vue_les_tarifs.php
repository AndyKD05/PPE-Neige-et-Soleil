<h3> Liste des tarifs </h3>
</br>
<form method="post">
	Mot de recherche: <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher">
</form>
</br>
<table border="1"> 
<tr>
	<td> Tarif </td>
	<td> Contrat concerné </td>
	<td> Debut et fin du contrat </td>
	<td> Habitation </td>
	<td> Proprietaire </td>
	<td> Saison</td>
	<td> Debut et fin de la saison </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesTarifs as $unTarif){
	echo "<tr>";
	echo"
		<td>".$unTarif['tarif']."</td>
		<td>".$unTarif['idcml']." ".$unTarif['descriptif']."</td>
		<td>".$unTarif['date_debut_cml']." ".$unTarif['date_fin_cml']."</td>
		<td>".$unTarif['idh']." ".$unTarif['nom_immeuble_h']." ".$unTarif['ville_h']."</td>
		<td>".$unTarif['idp']." ".$unTarif['prenom_p']." ".$unTarif['nom_p']."</td>
		<td>".$unTarif['ids']." ".$unTarif['saison']." ".$unTarif['annee_s']."</td>
		<td>".$unTarif['debut_saison']." ".$unTarif['fin_saison']."</td>
		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="admin")
{
	echo "
	<td>
	<a href='index.php?page=11&action=sup&idcml=".$unTarif['idcml']."&ids=".$unTarif['ids']."'><img src='images/sup.png' height='30' width='30'><a/>
	<a href='index.php?page=11&action=edit&idcml=".$unTarif['idcml']."&ids=".$unTarif['ids']."'><img src='images/edit.jpg' height='30' width='30'><a/>
	</td>
	";
	echo "<tr>";
	}
}
?>
</table>