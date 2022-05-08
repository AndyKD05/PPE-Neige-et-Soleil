
<h2><strong class="presentation">Insertion d'une offre</strong></h2>

<br />

<form method="post" class="form-inline">
	<table class="table table-striped table-dark" id="tableau">
		<tr>
				<td>Numero de rue</td>
				<td><input type="text" name="numero_h" value="<?php if($lhabitation != null) echo $lhabitation['numero_h']; ?>">
				</td>
				<td>Nom de la rue</td>
				<td><input type="text" name="rue_h" value="<?php if($lhabitation != null) echo $lhabitation['rue_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Ville</td>
				<td><input type="text" name="ville_h" value="<?php if($lhabitation != null) echo $lhabitation['ville_h']; ?>">
				</td>
				<td>Code Postal</td>
				<td><input type="text" name="CP_h" value="<?php if($lhabitation != null) echo $lhabitation['CP_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Nom de l'immeuble</td>
				<td><input type="text" name="nom_immeuble_h" value="<?php if($lhabitation != null) echo $lhabitation['nom_immeuble_h']; ?>">
				</td>
				<td>Superficie</td>
				<td><input type="number" step="0.01" name="superficie_h" value="<?php if($lhabitation != null) echo $lhabitation['superficie_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Type</td>
				<td><select name="type_h">
					<option value="maison" <?php if($lhabitation != null && $lhabitation['type_h']=='maison') echo "selected"; ?> > Maison </option>
					<option value="appartement" <?php if($lhabitation != null && $lhabitation['type_h']=='appartement') echo "selected"; ?> > Appartement </option>
					<option value="chalet" <?php if($lhabitation != null && $lhabitation['type_h']=='chalet') echo "selected"; ?> > Chalet </option>
					<option value="villa" <?php if($lhabitation != null && $lhabitation['type_h']=='villa') echo "selected"; ?> > Villa </option>
				</select></td>
				<td>Capacité d'accueil</td>
				<td><input type="number" name="capacite_acceuil_h" value="<?php if($lhabitation != null) echo $lhabitation['capacite_acceuil_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Surface habitable</td>
				<td><input type="number" step="0.1" name="surface_habitable_h" value="<?php if($lhabitation != null) echo $lhabitation['surface_habitable_h']; ?>">
				</td>
				<td>Surface balcon</td>
				<td><input type="number" step="0.1" name="surface_balcon_h" value="<?php if($lhabitation != null) echo $lhabitation['surface_balcon_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Distance des pistes en kilometre</td>
				<td><input type="number" step="0.1" name="distance_piste_h" value="<?php if($lhabitation != null) echo $lhabitation['distance_piste_h']; ?>">
				</td>
				<td>Exposition</td>
				<td><input type="text" name="exposition_h" value="<?php if($lhabitation != null) echo $lhabitation['exposition_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Cave</td>
				<td><select name="cave_h">
					<option value="non" <?php if($lhabitation != null && $lhabitation['cave_h']=='non') echo "selected"; ?> > Non </option>
					<option value="oui" <?php if($lhabitation != null && $lhabitation['cave_h']=='oui') echo "selected"; ?> > Oui </option>
				</select></td>
				<td>Local a ski</td>
				<td><select name="local_a_ski_h">
					<option value="non" <?php if($lhabitation != null && $lhabitation['local_a_ski_h']=='non') echo "selected"; ?> > Non </option>
					<option value="oui" <?php if($lhabitation != null && $lhabitation['local_a_ski_h']=='oui') echo "selected"; ?> > Oui </option>
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
				<td><input type="reset" name="Annuler" value="Annuler" class="btn btn-danger"></td>
				<td><input type="submit" class="btn btn-success"
				<?php 
				if ($lhabitation != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>

