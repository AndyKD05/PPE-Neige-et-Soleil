<h2>Insertion d'un proprietaire</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>Nom</td>
				<td><input type="text" name="nom_p" value="<?php if($leProprietaire != null) echo $leProprietaire['nom_p']; ?>">
				</td>
		</tr>
		<tr>
				<td>Prenom</td>
				<td><input type="text" name="prenom_p" value="<?php if($leProprietaire != null) echo $leProprietaire['prenom_p']; ?>">
				</td>
		</tr>
		<tr>
				<td>Telephone</td>
				<td><input type="text" name="tel_p" value="<?php if($leProprietaire != null) echo $leProprietaire['tel_p']; ?>">
				</td>
		</tr>
		<tr>
				<td>Adresse mel</td>
				<td><input type="email" name="mail_p" value="<?php if($leProprietaire != null) echo $leProprietaire['mail_p']; ?>">
				</td>
		</tr>
		<tr>
				<td>Date de naissance</td>
				<td><input type="date" name="date_naiss_p" value="<?php if($leProprietaire != null) echo $leProprietaire['date_naiss_p']; ?>">
				</td>
		</tr>
		<tr>
				<td>Numero de rue</td>
				<td><input type="text" name="numero_p" value="<?php if($leProprietaire != null) echo $leProprietaire['numero_p']; ?>">
				</td>
		</tr>
		<tr>
				<td>Rue</td>
				<td><input type="text" name="rue_p" value="<?php if($leProprietaire != null) echo $leProprietaire['rue_p']; ?>">
				</td>
		</tr>
		<tr>
				<td>Code postal</td>
				<td><input type="text" name="CP_p" value="<?php if($leProprietaire != null) echo $leProprietaire['CP_p']; ?>">
				</td>
		</tr>
		<tr>
				<td>Ville</td>
				<td><input type="text" name="ville_p" value="<?php if($leProprietaire != null) echo $leProprietaire['ville_p']; ?>">
				</td>
		</tr>
		<tr>
				<td>Pays</td>
				<td><input type="text" name="pays_p" value="<?php if($leProprietaire != null) echo $leProprietaire['pays_p']; ?>">
				</td>
		</tr>
		<tr>
				<td>Rib</td>
				<td><input type="text" name="rib_p" value="<?php if($leProprietaire != null) echo $leProprietaire['rib_p']; ?>">
				</td>
		</tr>
		<tr>
				<td>Mot de passe</td>
				<td><input type="text" name="mdp_p" value="<?php if($leProprietaire != null) echo $leProprietaire['mdp_p']; ?>">
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
				<?php 
				if ($leProprietaire != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
