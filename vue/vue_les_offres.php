

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
    <link rel="stylesheet" type="text/css" href="/CSS/style.css"> 

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

<h3> <strong class="presentation">Liste des habitations</strong> </h3>
</br>
<form method="post" class="form-inline">
<strong class="presentation">Mot de recherche: </strong> <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-secondary">
</form>
</br>
<table class="table table-striped table-dark"> 
<tr>
	<?php
	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
	{
		echo'<td> id habitation </td>';
	}
	?>
	<td> Adresse </td>
	<td> Descriptif </td>
	<td> Superficie </td>
	<td> Type </td>
	<td> Capacite d'acceuil </td>
	<td> Surface habitable </td>
	<td> Balcon </td>
	<td> Distance_piste </td>
	<td> Exposition </td>
	<td> Cave </td>
	<td> Local à ski </td>
	<td> Proprietaire </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesHabitations as $uneHabitation){
	echo "<tr>";
	if(($uneHabitation['idp']==$_SESSION['id'] and $_SESSION['role']=="prop") or $_SESSION['role']=="emp")
	{
		if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
		{
			echo"<td>".$uneHabitation['idh']."</td>";
		}
		echo"
		<td>".$uneHabitation['numero_h']." ".$uneHabitation['rue_h']." ".$uneHabitation['CP_h']." ".$uneHabitation['ville_h']."</td>
		<td>".$uneHabitation['nom_immeuble_h']."</td>
		<td>".$uneHabitation['superficie_h']."</td>
		<td>".$uneHabitation['type_h']."</td>
		<td>".$uneHabitation['capacite_acceuil_h']."</td>
		<td>".$uneHabitation['surface_habitable_h']."</td>
		<td>".$uneHabitation['surface_balcon_h']."</td>
		<td>".$uneHabitation['distance_piste_h']."</td>
		<td>".$uneHabitation['exposition_h']."</td>
		<td>".$uneHabitation['cave_h']."</td>
		<td>".$uneHabitation['local_a_ski_h']."</td>
		<td>".$uneHabitation['idp']."</td>
		";
	}
	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
	{
		echo "
		<td>
		<a href='index.php?page=2&action=sup&idh=".$uneHabitation['idh']."'><img src='images/sup.png' height='30' width='30'><a/>
		<a href='index.php?page=2&action=edit&idh=".$uneHabitation['idh']."'><img src='images/edit.jpg' height='30' width='30'><a/>
		</td>
		";
	}
	echo "</tr>";
}
?>
</table>

<!--
<footer class="py-5">
<div class="container">
  <p class="m-1 text-center text-white">Copyright &copy;Félix Millon & Théo Chesnais & Andy Kadiambu</p>
</div>
</footer>
-->
  </body>

</html>
