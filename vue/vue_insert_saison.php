



<h2><strong class="presentation">Insertion d'une saison</strong></h2>

<br />

<form method="post" class="form-inline">
	<table class="table table-striped table-info">
		<tr>
				<td>Saison</td>
				<td><select name="saison">
					<option value="haute" <?php if($laSaison != null && $laSaison['saison']=='haute') echo "selected"; ?> > Haute </option>
					<option value="moyenne" <?php if($laSaison != null && $laSaison['saison']=='moyenne') echo "selected"; ?> > Moyenne </option>
					<option value="basse" <?php if($laSaison != null && $laSaison['saison']=='basse') echo "selected"; ?> > Basse </option>
				</select></td>
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
				<td><input type="reset" name="Annuler" value="Annuler" class="btn btn-danger"></td>
				<td><input type="submit" class="btn btn-success"
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

