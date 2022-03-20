

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

<h3> Vos contrats de location </h3>
</br>
<form method="post" class="form-inline">
<strong class="presentation">	Mot de recherche: </strong> <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-success">
</form>
</br>
<table class="table table-striped table-dark"> 
<tr>
	<td> id contrat </td>
	<td> Prix total</td>
	<td> Reservation </td>
	<td> Date debut </td>
	<td> Date fin </td>
	<td> Client</td>
	<td> Habitation </td>


</tr>

<?php  
	echo "<tr>
		<td>".$leCDL['idcl']."</td>
		<td>".$leCDL['prix_total']."</td>
		<td>".$leCDL['idr']."</td>
		<td>".$leCDL['date_dr']."</td>
		<td>".$leCDL['date_fr']."</td>
		<td>".$leCDL['idc']." ".$leCDL['prenom_c']." ".$leCDL['nom_c']."</td>
		<td>".$leCDL['idh']." ".$leCDL['nom_immeuble_h']." ".$leCDL['ville_h']."</td>
		<tr>";
?>
</table>

<footer class="py-5">
<div class="container">
  <p class="m-1 text-center text-white">Copyright &copy;Félix Millon & Théo Chesnais & Andy Kadiambu</p>
</div>
</footer>

  </body>

</html>
