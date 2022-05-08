

<form method="post" class="form-inline">
	<table class="table table-striped table-dark">
		<?php 
		if ($leProprietaire == null)
		{
		echo'
		<tr>
				<td>Adresse mel</td>
				<td><input type="email" name="mail_p">
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
		if ($leProprietaire != null)
		{
			echo'<tr>
				<td>Nouveau mot de passe</td>
				<td><input type="text" name="mdp_p">
				</td>
				</tr>';
		}
		?>
		
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler" class="btn btn-danger"></td>
				<td><input type="submit" class="btn btn-success"
				<?php 
				if ($leProprietaire != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Verifier" value="Verifier">';
				?>
				</td>
		</tr>	
	</table>
</form>

