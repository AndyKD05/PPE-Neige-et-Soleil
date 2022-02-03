<h2>Insertion d'une personne</h2>

<form method="post">
	<table border="0">
		<tr>
				<td>nom</td>
				<td><input type="text" name="nom" value="<?php if($laPersonne != null) echo $laPersonne['nom']; ?>">
				</td>
		</tr>
		<tr>
				<td>prenom</td>
				<td><input type="text" name="prenom" value="<?php if($laPersonne != null) echo $laPersonne['prenom']; ?>">
				</td>
		</tr>
		<tr>
				<td>datenaiss</td>
				<td><input type="date" name="datenaiss" value="<?php if($laPersonne != null) echo $laPersonne['datenaiss']; ?>">
				</td>
		</tr>
		<tr>
				<td>adresse</td>
				<td><input type="text" name="adresse" value="<?php if($laPersonne != null) echo $laPersonne['adresse']; ?>">
				</td>
		</tr>
		<tr>
				<td>cp</td>
				<td><input type="text" name="cp" value="<?php if($laPersonne != null) echo $laPersonne['cp']; ?>">
				</td>
		</tr>
		<tr>
				<td>tel</td>
				<td><input type="text" name="tel" value="<?php if($laPersonne != null) echo $laPersonne['tel']; ?>">
				</td>
		</tr>
		<tr>
				<td>email</td>
				<td><input type="email" name="email" value="<?php if($laPersonne != null) echo $laPersonne['email']; ?>">
				</td>
		</tr>
		<tr>
				<td>mdp</td>
				<td><input type="password" name="mdp" value="<?php if($laPersonne != null) echo $laPersonne['mdp']; ?>">
				</td>
		</tr>
		<tr>
				<td>allergies</td>
				<td><input type="text" name="allergies" value="<?php if($laPersonne != null) echo $laPersonne['allergies']; ?>">
				</td>
		</tr>
		<tr>
				<td>Statut</td>
				<td><select name="statut">
					<option value="patient" <?php if($laPersonne != null && $laPersonne['statut']=='patient') echo "selected"; ?> > Patient </option>
					<option value="aide soignant" <?php if($laPersonne != null && $laPersonne['statut']=='aide soignant') echo "selected"; ?> > aide soignant </option>
					<option value="infirmier" <?php if($laPersonne != null && $laPersonne['statut']=='infirmier') echo "selected"; ?> > infirmier </option>
					<option value="medecin" <?php if($laPersonne != null && $laPersonne['statut']=='medecin') echo "selected"; ?> > medecin </option>
					<option value="chirugien" <?php if($laPersonne != null && $laPersonne['statut']=='chirugien') echo "selected"; ?> > chirugien </option>
					<option value="agent d'entretient" <?php if($laPersonne != null && $laPersonne['statut']=="agent d'entretient") echo "selected"; ?> > agent d'entretient </option>
				</select></td>
		</tr>
		<tr>
				<td>Roles</td>
				<td><select name="role">
					<option value="admin" <?php if($laPersonne != null && $laPersonne['role']=='admin') echo "selected"; ?> > admin </option>
					<option value="user" <?php if($laPersonne != null && $laPersonne['role']=='user') echo "selected"; ?> > user </option>
				</select></td>
		</tr>	
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler"></td>
				<td><input type="submit" 
				<?php 
				if ($laPersonne != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
				?>
				</td>
		</tr>		
	</table>
</form>
