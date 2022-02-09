<h2>Insertion d'un employe</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>Nom</td>
				<td><input type="text" name="nom_emp" value="<?php if($lEmploye != null) echo $lEmploye['nom_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Prenom</td>
				<td><input type="text" name="prenom_emp" value="<?php if($lEmploye != null) echo $lEmploye['prenom_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Telephone</td>
				<td><input type="text" name="tel_emp" value="<?php if($lEmploye != null) echo $lEmploye['tel_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Adresse mel</td>
				<td><input type="email" name="mail_emp" value="<?php if($lEmploye != null) echo $lEmploye['mail_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Date de naissance</td>
				<td><input type="date" name="date_naiss_emp" value="<?php if($lEmploye != null) echo $lEmploye['date_naiss_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Numero de rue</td>
				<td><input type="text" name="numero_emp" value="<?php if($lEmploye != null) echo $lEmploye['numero_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Rue</td>
				<td><input type="text" name="rue_emp" value="<?php if($lEmploye != null) echo $lEmploye['rue_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Code postal</td>
				<td><input type="text" name="CP_emp" value="<?php if($lEmploye != null) echo $lEmploye['CP_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Ville</td>
				<td><input type="text" name="ville_emp" value="<?php if($lEmploye != null) echo $lEmploye['ville_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Date d'embauche</td>
				<td><input type="date" name="date_embauche" value="<?php if($lEmploye != null) echo $lEmploye['date_embauche']; ?>">
				</td>
		</tr>
		<tr>
				<td>Mot de passe</td>
				<td><input type="text" name="mdp_emp" value="<?php if($lEmploye != null) echo $lEmploye['mdp_emp']; ?>">
				</td>
		</tr>
		<tr>
				<td>Date de depart</td>
				<td><input type="date" name="date_depart" value="<?php if($lEmploye != null) echo $lEmploye['date_depart']; ?>">
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
				<?php 
				if ($lEmploye != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
