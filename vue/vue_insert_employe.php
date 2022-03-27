

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
            
			<?php
			
			if(isset($_SESSION['email']))
			{

			if($_SESSION['role']=="prop" or $_SESSION['role']=="emp")
			{

				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=2">Offres</a>
				</li>';
				
			}
			if($_SESSION['role']=="cli" or $_SESSION['role']=="emp")
			{
				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=4">Client</a>
				</li>';

				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=11">Tarifs</a>
				</li>';
			}
			if($_SESSION['role']=="emp")
			{
				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=5">Employé</a>
				</li>';
			}

			echo
			'<li class="nav-item">
                <a class="nav-link" href="index.php?page=6">Saisons</a>
            </li>';
			if($_SESSION['role']=="prop" or $_SESSION['role']=="emp")
			{

				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=7">CML</a>
				</li>';
				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=8">Exception</a>
				</li>';
			}
			if($_SESSION['role']=="cli" or $_SESSION['role']=="emp")
			{
				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=10">Location</a>
				</li>';
			}
			if($_SESSION['role']=="cli")
			{
				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=9">Réservation</a>
				</li>';
			}
			if($_SESSION['role']=="emp")
			{

				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=11">Tarifs</a>
				</li>';
				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=12">Réservation</a>
				</li>';
			}

			echo
			'<li class="nav-item">
                <a class="nav-link" href="index.php?page=20">Déconnexion</a>
            </li>';

				if(isset($_GET['page']))
				{
					$page = $_GET['page'];
				}else{
					$page = 0;
				}
				
			}
			?>
            
          </ul>
        </div>
      </div>
    </nav>

<br />

<h2>Insertion d'un employe</h2>

<br />

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

<!--
<footer class="py-5">
<div class="container">
  <p class="m-1 text-center text-white">Copyright &copy;Félix Millon & Théo Chesnais & Andy Kadiambu</p>
</div>
</footer>
			-->
  </body>

</html>
