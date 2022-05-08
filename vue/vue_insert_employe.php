

<br/>

<h2>Insertion d'un employe</h2>

<br/>

<form method="post" class="form-inline">
	<table class="table table-striped table-dark">
		<tr>
				<td>Nom</td>
				<td><input type="text" name="nom_emp" value="<?php if($lEmploye != null) echo $lEmploye['nom_emp']; ?>">
				</td>
				<td>Prenom</td>
				<td><input type="text" name="prenom_emp" value="<?php if($lEmploye != null) echo $lEmploye['prenom_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Telephone</td>
				<td><input type="text" name="tel_emp" value="<?php if($lEmploye != null) echo $lEmploye['tel_emp']; ?>">
				</td>
				<td>Adresse mel</td>
				<td><input type="email" name="mail_emp" value="<?php if($lEmploye != null) echo $lEmploye['mail_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Date de naissance</td>
				<td><input type="date" name="date_naiss_emp" value="<?php if($lEmploye != null) echo $lEmploye['date_naiss_emp']; ?>">
				</td>
				<td>Numero de rue</td>
				<td><input type="text" name="numero_emp" value="<?php if($lEmploye != null) echo $lEmploye['numero_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Rue</td>
				<td><input type="text" name="rue_emp" value="<?php if($lEmploye != null) echo $lEmploye['rue_emp']; ?>">
				</td>
				<td>Code postal</td>
				<td><input type="text" name="CP_emp" value="<?php if($lEmploye != null) echo $lEmploye['CP_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Ville</td>
				<td><input type="text" name="ville_emp" value="<?php if($lEmploye != null) echo $lEmploye['ville_emp']; ?>">
				</td>
				<td>Date d'embauche</td>
				<td><input type="date" name="date_embauche" value="<?php if($lEmploye != null) echo $lEmploye['date_embauche']; ?>">
				</td>
		</tr>
		<tr>
				<td>Mot de passe</td>
				<td><input type="text" name="mdp_emp" value="<?php if($lEmploye != null) echo $lEmploye['mdp_emp']; ?>">
				</td>
		</tr>
		<?php
		if ($lEmploye != null)
		{
			echo'
			<tr>
				<td>Date de depart</td>
					<td><input type="date" name="date_depart" value="'; if($lEmploye != null){ echo $lEmploye['date_depart'];} echo'">
				</td>
			</tr>';
		}?>
		<tr>
			<td><input type="reset" name="Annuler" value="Annuler" class="btn btn-danger"></td>
				
				<?php 
				if ($lEmploye != null)
				{
					echo '<tr><td><input type="submit" name ="Modifier" value="Modifier" class="btn btn-secondary">';
					echo '<td><input type="submit" name ="ModifierMDP" value="Modifier mot de passe"></tr>';
				}
				else
				{
					echo ' <td><input type="submit" name="Valider" value="Valider" class="btn btn-success">';
				}
				?>
			</td>
		</tr>		
	</table>
</form>

