<h2>Insertion d'une exception</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>Date debut</td>
				<td><input type="date" name="date_debute" value="<?php if($lException != null) echo $lException['date_debute']; ?>">
				</td>
		</tr>
		<tr>
				<td>Date fin</td>
				<td><input type="date" name="date_fine" value="<?php if($lException != null) echo $lException['date_fine']; ?>">
				</td>
		</tr>
		<tr>
				<td>Contrat concerné</td>
				<td><select name ="idcml">
					<?php 
						foreach($lesCML as $unCML){
							echo "<option value='".$unCML['idcml']."'>".$unCML['idcml']." ".$unCML['descriptif']."</option>";
						}
					 ?>
				</select>
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
				<?php 
				if ($lException != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
