<h2>Insertion d'une saison</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>Saison</td>
				<td><input type="text" name="saison" value="<?php if($laSaison != null) echo $laSaison['saison']; ?>">
				</td>
		</tr>
		<tr>
				<td>debut saison</td>
				<td><input type="date" name="debut_saison" value="<?php if($laSaison != null) echo $laSaison['debut_saison']; ?>">
				</td>
		</tr>
		<tr>
				<td>fin saison</td>
				<td><input type="date" name="fin_saison" value="<?php if($laSaison != null) echo $laSaison['fin_saison']; ?>">
				</td>
		</tr>
		<tr>
				<td>Année</td>
				<td><input type="text" name="annee_s" value="<?php if($laSaison != null) echo $laSaison['annee_s']; ?>">
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
				<?php 
				if ($laSaison != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
