
<br/>

<h2><strong class="presentation">Insertion d'un contrat de mandat locatif</strong></h2>

<br/>

<form method="post" class="form-inline">
	<table class="table table-striped table-info">
		<tr>
				<td>Descriptif</td>
				<td><input type="text" name="descriptif" value="<?php if($leCML != null) echo $leCML['descriptif']; ?>">
				</td>
		</tr>
		<tr>
				<td>Date de debut</td>
				<td><input type="date" name="date_debut_cml" value="<?php if($leCML != null) echo $leCML['date_debut_cml']; ?>">
				</td>
		</tr>
		<tr>
				<td>Date de fin</td>
				<td><input type="date" name="date_fin_cml" value="<?php if($leCML != null) echo $leCML['date_fin_cml']; ?>">
				</td>
		</tr>
		<tr>
				<td>Etat du contrat</td>
				<td><select name="etat_contrat">
					<option value="actif" <?php if($leCML != null && $leCML['etat_contrat']=='actif') echo "selected"; ?> > Actif </option>
					<option value="inactif" <?php if($leCML != null && $leCML['etat_contrat']=='inactif') echo "selected"; ?> > Inactif </option>
				</select></td>
		</tr>
		<tr>
				<td>Habitation</td>
				<td><select name ="idh">
					<?php 
						foreach($lesHabitations as $uneHabitation){
							echo "<option value='".$uneHabitation['idh']."'>".$uneHabitation['nom_immeuble_h']." ".$uneHabitation['ville_h']." "."</option>";
						}
					 ?>
				</select>
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler" class="btn btn-danger"></td>
				<td><input type="submit" class="btn btn-success"
				<?php 
				if ($leCML != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
