


<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Neige et Soleil</title>

    <!-- Bootstrap core CSS -->
    <link href="/CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="/CSS/style2.css"> 

  </head>

  <body>

    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="logo navbar-brand" href="index.html">Neige et soleil</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
            <li class="nav-item active">

                <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>

            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="">Nos Offres</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="">La région</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="">Activités de la région</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="">A Propos</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="">Contact</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

<br /><br /><br />

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

<footer class="py-5">
<div class="container">
  <p class="m-1 text-center text-white">Copyright &copy;Félix Millon & Théo Chesnais & Andy Kadiambu</p>
</div>
</footer>

  </body>

</html>