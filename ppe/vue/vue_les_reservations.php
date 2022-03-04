<h3> Liste des reservations </h3>
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
		echo"<td> id reservation </td>";
	} ?>
	<td> date de la reservation</td>
	<td> debut de la reservation </td>
	<td> fin de la resservation </td>
	<td> Etat de la reservation </td>
	<td> Nombre de personnes</td>
	<td> Client </td>
	<td> Habitation </td>
	<td> Saison </td>

	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesReservations as $uneReservation){
	if(($uneReservation['idc']==$_SESSION['id'] and $_SESSION['role']=="cli") or $_SESSION['role']=="emp")
	{
		echo "<tr>";
		if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
		{
			echo"<td>".$uneReservation['idr']."</td>";
		}
		echo
		"<td>".$uneReservation['date_r']."</td>
		<td>".$uneReservation['date_dr']."</td>
		<td>".$uneReservation['date_fr']."</td>
		<td>".$uneReservation['etat_r']."</td>
		<td>".$uneReservation['nb_personnes_r']."</td>
		<td>".$uneReservation['idc']." ".$uneReservation['prenom_c']." ".$uneReservation['nom_c']."</td>
		<td>".$uneReservation['idh']." ".$uneReservation['nom_immeuble_h']." ".$uneReservation['ville_h']."</td>
		<td>".$uneReservation['saison']." ".$uneReservation['debut_saison']." ".$uneReservation['fin_saison']."</td>
		";
	}
	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
	{
		echo "
		<td>
		<a href='index.php?page=9&action=sup&idr=".$uneReservation['idr']."'><img src='images/sup.png' height='30' width='30'><a/>
		<a href='index.php?page=9&action=edit&idr=".$uneReservation['idr']."'><img src='images/edit.jpg' height='30' width='30'><a/>
		</td>
		";
	}
	echo "</tr>";
}
?>
</table>