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

<h2><strong class="presentation">Insertion d'une reservation</strong></h2>

<br />

<form method="post" class="form-inline">
	<table class="table table-striped table-dark">
		<tr>
				<td>Nombre de personne</td>
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
				<td>Date de debut</td>
				<td><input type="date" name="date_dr" value="<?php if($laReservation != null) echo $laReservation['date_dr']; ?>">
				</td>
		</tr>
		<tr>
				<td>Date de fin</td>
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
				<td><input type="reset" name="Annuler" value="Annuler" class="btn btn-danger"></td>
				<td><input type="submit" class="btn btn-success"
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

<!--
<footer class="py-5">
<div class="container">
  <p class="m-1 text-center text-white">Copyright &copy;Félix Millon & Théo Chesnais & Andy Kadiambu</p>
</div>
</footer>
					-->
  </body>

</html>
