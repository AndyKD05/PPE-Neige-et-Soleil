<h2>Insertion d'un vaccination</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>vaccin et centre</td>
				<td><select name ="id_vac">
					<?php 
						foreach($lesVaccins as $unVaccin){
							echo "<option value='".$unVaccin['id_vac']."'>".$unVaccin['nom_vac']." ".$unVaccin['nom_centre']."</option>";
						}
					 ?>
				</select>
				</td>
		</tr>
			<tr>
				<td>numero patient</td>
				<td><select name ="numsecu">
					<?php 
						foreach($lesPersonnes as $unePersonne){
							echo "<option value='".$unePersonne['numsecu']."'>".$unePersonne['prenom']." ".$unePersonne['nom']." ".$unePersonne['numsecu']."</option>";
						}
					 ?>
				</select>
				</td>
			</tr>
		</tr>
			<tr>
				<td>Centre</td>
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
				<td>date vaccination</td>
				<td><input type="date" name="date_vac" value="<?php if($laVaccination != null) echo $laVaccination['date_vac']; ?>">
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
				<?php 
				if ($laVaccination != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
