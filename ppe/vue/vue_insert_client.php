<h2>Insertion d'un client</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>Nom</td>
				<td><input type="text" name="nom_c" value="<?php if($leClient != null) echo $leClient['nom_c']; ?>">
				</td>
		</tr>
		<tr>
				<td>Prenom</td>
				<td><input type="text" name="prenom_c" value="<?php if($leClient != null) echo $leClient['prenom_c']; ?>">
				</td>
		</tr>
		<tr>
				<td>Telephone</td>
				<td><input type="text" name="tel_c" value="<?php if($leClient != null) echo $leClient['tel_c']; ?>">
				</td>
		</tr>
		<tr>
				<td>Adresse mel</td>
				<td><input type="email" name="mail_c" value="<?php if($leClient != null) echo $leClient['mail_c']; ?>">
				</td>
		</tr>
		<tr>
				<td>Date de naissance</td>
				<td><input type="date" name="date_naiss_c" value="<?php if($leClient != null) echo $leClient['date_naiss_c']; ?>">
				</td>
		</tr>
		<tr>
				<td>Numero de rue</td>
				<td><input type="text" name="numero_c" value="<?php if($leClient != null) echo $leClient['numero_c']; ?>">
				</td>
		</tr>
		<tr>
				<td>Rue</td>
				<td><input type="text" name="rue_c" value="<?php if($leClient != null) echo $leClient['rue_c']; ?>">
				</td>
		</tr>
		<tr>
				<td>Code postal</td>
				<td><input type="text" name="cp_c" value="<?php if($leClient != null) echo $leClient['cp_c']; ?>">
				</td>
		</tr>
		<tr>
				<td>Ville</td>
				<td><input type="text" name="ville_c" value="<?php if($leClient != null) echo $leClient['ville_c']; ?>">
				</td>
		</tr>
		<tr>
				<td>Mot de passe</td>
				<td><input type="text" name="mdp_c" value="<?php if($leClient != null) echo $leClient['mdp_c']; ?>">
				</td>
		</tr>
		<tr>
				<td>Question secrète</td>
				<td><select name="question">
					<option value="ecoleprimaire"> Ecole primaire </option>
					<option value="nomjeunefille"> Nom de jeune fille de votre mère </option>
					<option value="premieramour"> Premier amour </option>
					<option value="profprefere"> Professeur préféré </option>
					<option value="villerencontreparent"> Ville de rencontre de vos parents </option>
				</select></td>
		</tr>
		<tr>
				<td>Réponse secrète</td>
				<td><input type="text" name="reponse"></td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<?php 
				if($_SESSION['role']=='emp')
				{
					if ($leClient != null)
					{
						echo '<td><input type="submit" name ="Modifier" value="Modifier">'; 
					}
					else
					{
						echo '<td><input type="submit" name="Valider" value="Valider">';
					}
				}elseif($_SESSION['role']=='cli' and $leClient != null)
				{
					echo '<td><input type="submit" name ="Modifier" value="Modifier">'; 
				}
				?>
				</td>
		</tr>		
	</table>
</form>
