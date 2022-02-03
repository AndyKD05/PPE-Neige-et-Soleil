<h2>Insertion d'un vaccin</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>nom_vac</td>
				<td><input type="text" name="nom_vac" value="<?php if($leVaccin != null) echo $leVaccin['nom_vac']; ?>">
				</td>
		</tr>
		<tr>
				<td>temp_stock_req</td>
				<td><input type="number" name="temp_stock_req" value="<?php if($leVaccin != null) echo $leVaccin['temp_stock_req']; ?>">
				</td>
		</tr>
		<tr>
				<td>doses_stock</td>
				<td><input type="number" name="doses_stock" value="<?php if($leVaccin != null) echo $leVaccin['doses_stock']; ?>">
				</td>
		</tr>
		<tr>
				<td>centre</td>
				<td><select name ="id_centre">
					<?php 
						foreach($lesCentres as $unCentre){
							echo "<option value='".$unCentre['id_centre']."'>".$unCentre['nom']."</option>";
						}
					 ?>
				</select>
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
				<?php 
				if ($leVaccin != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
