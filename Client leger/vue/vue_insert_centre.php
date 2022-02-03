<h2>Insertion d'un centre</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>nom</td>
				<td><input type="text" name="nom" value="<?php if($leCentre != null) echo $leCentre['nom']; ?>">
				</td>
		</tr>
		<tr>
				<td>adresse</td>
				<td><input type="text" name="adresse" value="<?php if($leCentre != null) echo $leCentre['adresse']; ?>">
				</td>
		</tr>
		<tr>
				<td>ville</td>
				<td><input type="text" name="ville" value="<?php if($leCentre != null) echo $leCentre['ville']; ?>">
				</td>
		</tr>
		<tr>
				<td>cp</td>
				<td><input type="text" name="cp" value="<?php if($leCentre != null) echo $leCentre['cp']; ?>">
				</td>
		</tr>
		<tr>
				<td>nbr_soignant</td>
				<td><input type="number" name="nbr_soignant" value="<?php if($leCentre != null) echo $leCentre['nbr_soignant']; ?>">
				</td>
		</tr>
		<tr>
				<td>capa_stock</td>
				<td><input type="number" name="capa_stock" value="<?php if($leCentre != null) echo $leCentre['capa_stock']; ?>">
				</td>
		</tr>
		<tr>
				<td>type</td>
				<td><select name ="id_type">
					<?php 
						foreach($lesTypes as $unType){
							echo "<option value='".$unType['id_type']."'>".$unType['descriptif']."</option>";
						}
					 ?>
				</select>
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
				<?php 
				if ($leCentre != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
