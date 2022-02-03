<h2>Insertion d'un type</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>Nombre de soignants minimum</td>
				<td><input type="number" name="nbr_soignant_min" value="<?php if($leType != null) echo $leType['nbr_soignant_min']; ?>">
				</td>
		</tr>
		<tr>
				<td>descriptif</td>
				<td><input type="text" name="descriptif" value="<?php if($leType != null) echo $leType['descriptif']; ?>">
				</td>
		</tr>
		<tr>
				<td>capa_stock_min</td>
				<td><input type="number" name="capa_stock_min" value="<?php if($leType != null) echo $leType['capa_stock_min']; ?>">
				</td>
		</tr>
		<tr>
				<td>temp_stock</td>
				<td><input type="number" name="temp_stock" value="<?php if($leType != null) echo $leType['temp_stock']; ?>">
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
				<?php 
				if ($leType != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
