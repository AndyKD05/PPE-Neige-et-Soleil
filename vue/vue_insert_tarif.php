
<h2><strong class="presentation">Insertion des tarifs</strong></h2>

<br />

<form method="post" class="form-inline">
	<table class="table table-striped table-info">
		<tr>
				<td>tarif</td>
				<td><input type="number" step="0.01" name="tarif" value="<?php if($leTarif != null) echo $leTarif['tarif']; ?>">
				</td>
		</tr>
		<tr>
				<td>Contrat concerné</td>
				<td><select name ="idcml">
					<?php 
						foreach($lesCML as $unCML){
							echo "<option value='".$unCML['idcml']."'>".$unCML['idcml']." - ".$unCML['descriptif']." ".$unCML['etat_contrat']."</option>";
						}
					 ?>
				</select>
				</td>
		</tr>
		<tr>
				<td>Saison</td>
				<td><select name ="saison">
					<?php 
						foreach($lesSaisons as $uneSaison){
							echo "<option value='".$uneSaison['saison']."'>".$uneSaison['saison']."</option>";
						}
					 ?>
				</select>
				</td>
		</tr>
		<tr>
				<td>Annee</td>
				<td><select name ="annee_s">
					<?php 
						foreach($lesSaisons as $uneSaison){
							echo "<option value='".$uneSaison['annee_s']."'>".$uneSaison['annee_s']."</option>";
						}
					 ?>
				</select>
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler" class="btn btn-danger"></td>
				<td><input type="submit" class="btn btn-success"
				<?php 
				if ($leTarif != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>


