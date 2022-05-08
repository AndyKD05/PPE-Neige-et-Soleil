



<h3><strong class="presentation"> Liste des contrats de location </strong></h3>
</br>
<form method="post" class="form-inline">
<strong class="presentation">	Mot de recherche: </strong> <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-secondary">
</form>
</br>
<table class="table table-striped table-dark"> 
<tr>
<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	echo "<td> id contrat </td>";
}?>
	
	<td> Prix total</td>
<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	echo "<td> Reservation </td>";
}?>
	<td> Date debut </td>
	<td> Date fin </td>
	<td> Client</td>
	<td> Habitation </td>
	<td> Etat des lieux </td>

<?php 	if (isset($_SESSION['email']) and ($_SESSION['role']=="emp" or $_SESSION['role']=="cli"))
{
	echo"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesCDL as $unCDL){
	echo "<tr>";
	if(($unCDL['idc']==$_SESSION['id'] and $_SESSION['role']=="cli") or $_SESSION['role']=="emp")
	{
		if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
		{
			echo"<td>".$unCDL['idcl']."</td>";
		}
		echo"
		<td>".$unCDL['prix_total']."</td>";
		if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
		{
			echo"<td>".$unCDL['idr']."</td>";
		}
		echo"
		<td>".$unCDL['date_dr']."</td>
		<td>".$unCDL['date_fr']."</td>
		<td>".$unCDL['idc']." ".$unCDL['prenom_c']." ".$unCDL['nom_c']."</td>
		<td>".$unCDL['idh']." ".$unCDL['nom_immeuble_h']." ".$unCDL['ville_h']."</td>
		<td>".$unCDL['etat_des_lieux']."</td>
		";
	}
	echo "
		<td>";
	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
	{
		echo "
		<a href='index.php?page=10&action=sup&idcl=".$unCDL['idcl']."'><img src='images/sup.png' height='30' width='30'><a/>
		<a href='index.php?page=10&action=edit&idcl=".$unCDL['idcl']."'><img src='images/edit.jpg' height='30' width='30'><a/>";
	}
	if ($unCDL['idc']==$_SESSION['id'] and isset($_SESSION['email']) and ($_SESSION['role']=="emp" or $_SESSION['role']=="cli"))
	{
		echo '
		<a href="" name="download" value="download" onclick="window.print()" id="imprimer" >Télécharger</a>';
	}
	echo "</td></tr>";
}
?>
</table>
