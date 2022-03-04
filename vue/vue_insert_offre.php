<h2>Insertion d'une offre</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>numero de rue</td>
				<td><input type="text" name="numero_h" value="<?php if($lhabitation != null) echo $lhabitation['numero_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>nom de la rue</td>
				<td><input type="text" name="rue_h" value="<?php if($lhabitation != null) echo $lhabitation['rue_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Ville</td>
				<td><input type="text" name="ville_h" value="<?php if($lhabitation != null) echo $lhabitation['ville_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Code Postal</td>
				<td><input type="text" name="CP_h" value="<?php if($lhabitation != null) echo $lhabitation['CP_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Nom de l'immeuble</td>
				<td><input type="text" name="nom_immeuble_h" value="<?php if($lhabitation != null) echo $lhabitation['nom_immeuble_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Superficie</td>
				<td><input type="number" step="0.01" name="superficie_h" value="<?php if($lhabitation != null) echo $lhabitation['superficie_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Type</td>
				<td><input type="text" name="type_h" value="<?php if($lhabitation != null) echo $lhabitation['type_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Capacité d'accueil</td>
				<td><input type="number" name="capacite_acceuil_h" value="<?php if($lhabitation != null) echo $lhabitation['capacite_acceuil_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Surface habitable</td>
				<td><input type="number" step="0.1" name="surface_habitable_h" value="<?php if($lhabitation != null) echo $lhabitation['surface_habitable_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Surface balcon</td>
				<td><input type="number" step="0.1" name="surface_balcon_h" value="<?php if($lhabitation != null) echo $lhabitation['surface_balcon_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Distance des pistes en kilometre</td>
				<td><input type="number" step="0.1" name="distance_piste_h" value="<?php if($lhabitation != null) echo $lhabitation['distance_piste_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Exposition</td>
				<td><input type="text" name="exposition_h" value="<?php if($lhabitation != null) echo $lhabitation['exposition_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Cave</td>
				<td><input type="text" name="cave_h" value="<?php if($lhabitation != null) echo $lhabitation['cave_h']; ?>">
				</td>
		</tr>
		<tr>
				<td>Local a ski</td>
				<td><input type="text" name="local_a_ski_h" value="<?php if($lhabitation != null) echo $lhabitation['local_a_ski_h']; ?>">
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
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
