
<h2> <strong class="presentation">Modification et insertion manuelle d'un contrat de location </strong></h2>

<form method="post" class="form-inline">
	<table class="table table-striped table-info">
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
				<td><input type="reset" name="Annuler" value="Annuler" class="btn btn-danger"></td>
				<td><input type="submit" class="btn btn-success"
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

