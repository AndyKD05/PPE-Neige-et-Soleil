<h2>Modification et insertion manuelle d'un contrat de location</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>prix total</td>
				<td><input type="number" step="0.01" name="prix_total" value="<?php if($leCDL != null) echo $leCDL['prix_total']; ?>">
				</td>
		</tr>
		<tr>
				<td>Reservation</td>
				<td><select name ="idr">
					<?php 
						foreach($lesReservations as $uneReservation){
							echo "<option value='".$uneReservation['idr']."'>".$uneReservation['date_dr']." - ".$uneReservation['date_fr']." ".$uneReservation['etat_r']."</option>";
						}
					 ?>
				</select>
				</td>
		</tr>
		<tr>
				<td>Etat des lieux</td>
				<td><input type="text" name="etat_des_lieux" value="<?php if($leCDL != null) echo $leCDL['etat_des_lieux']; ?>">
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
				<?php 
				if ($leCDL != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
