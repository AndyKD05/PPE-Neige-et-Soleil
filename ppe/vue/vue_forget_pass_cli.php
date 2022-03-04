
<form method="post">
	<table border="0">
<?php 
		if ($leClient == null)
		{
		echo'
		<tr>
				<td>Adresse mel</td>
				<td><input type="email" name="mail_c" >
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
		</tr>';
		}
		if ($leClient != null)
		{
			echo'<tr>
				<td>Nouveau mot de passe</td>
				<td><input type="text" name="mdp_c">
				</td>
				</tr>';
		}
		?>
		
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
				<?php 
				if ($leClient != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Verifier" value="Verifier">';
				?>
				</td>
		</tr>	
	</table>
</form>