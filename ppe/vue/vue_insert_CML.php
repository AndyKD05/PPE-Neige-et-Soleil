<h2>Insertion d'un contrat de mandat locatif</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>descriptif</td>
				<td><input type="text" name="descriptif" value="<?php if($leCML != null) echo $leCML['descriptif']; ?>">
				</td>
		</tr>
		<tr>
				<td>date de debut</td>
				<td><input type="date" name="date_debut_cml" value="<?php if($leCML != null) echo $leCML['date_debut_cml']; ?>">
				</td>
		</tr>
		<tr>
				<td>date de fin</td>
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
				<td>Proprietaire</td>
				<td><select name ="idp">
					<?php 
						foreach($lesProprietaires as $unProprietaire){
							echo "<option value='".$unProprietaire['idp']."'>".$unProprietaire['idp']." ".$unProprietaire['prenom_p']." ".$unProprietaire['nom_p']."</option>";
						}
					 ?>
				</select>
				</td>
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
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
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
