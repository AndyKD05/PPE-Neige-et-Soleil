<h2>Insertion d'une reservation</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>nombre de personne</td>
				<td><input type="number" name="nb_personnes_r" value="<?php if($laReservation != null) echo $laReservation['nb_personnes_r']; ?>">
				</td>
		</tr>
		<?php
		if($laReservation != null) echo
			'<tr>
				<td>date de reservation</td>
					<td><input type="date" name="date_r" value="'.$laReservation['date_r'].'"
					</td>
			</tr>'
		?>
		<tr>
				<td>date de debut</td>
				<td><input type="date" name="date_dr" value="<?php if($laReservation != null) echo $laReservation['date_dr']; ?>">
				</td>
		</tr>
		<tr>
				<td>date de fin</td>
				<td><input type="date" name="date_fr" value="<?php if($laReservation != null) echo $laReservation['date_fr']; ?>">
				</td>
		</tr>
		<?php
		if ($laReservation != null) echo
	    '<tr>
				<td>Etat de la reservation</td>
				<td><select name="etat_r">
					<option value="en attente"  if($laReservation["etat_r"]=="en attente") echo "selected"  > En attente </option>
					<option value="validee" if($laReservation["etat_r"]=="validee") echo "selected" > Validee </option>
					<option value="refusee" if($laReservation["etat_r"]=="refusee") echo "selected" > Refusee </option>
				</select></td>
		</tr>';
		?>
		<tr>
				<td>Client</td>
				<td><select name ="idc">
					<?php 
						foreach($lesClients as $unClient){
							echo "<option value='".$unClient['idc']."'>".$unClient['idc']." ".$unClient['prenom_c']." ".$unClient['nom_c']."</option>";
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
				if ($laReservation != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
