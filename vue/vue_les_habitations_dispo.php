

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

<h3><strong class="presentation"> Liste des bien disponibles </strong> </h3>
</br>
<form method="post" class="form-inline">
<strong class="presentation">Mot de recherche: </strong> <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-secondary">
</form>
</br>
<table class="table table-striped table-dark"> 
<tr>
	<td> Adresse </td>
	<td> Descriptif </td>
	<td> Superficie </td>
	<td> Type </td>
	<td> Capacite d'acceuil </td>
	<td> Surface </td>
	<td> Balcon </td>
	<td> Distance piste </td>
	<td> Exposition </td>
	<td> Cave </td>
	<td> Local à ski </td>
	<td> Proprietaire </td>
<td> Opérations </td>
</tr>

<?php  
foreach ($lesHabitations_dispo as $uneHabitation_dispo){
	echo "<tr>
		<td>".$uneHabitation_dispo['numero_h']." ".$uneHabitation_dispo['rue_h']." ".$uneHabitation_dispo['CP_h']." ".$uneHabitation_dispo['ville_h']."</td>
		<td>".$uneHabitation_dispo['nom_immeuble_h']."</td>
		<td>".$uneHabitation_dispo['superficie_h']."</td>
		<td>".$uneHabitation_dispo['type_h']."</td>
		<td>".$uneHabitation_dispo['capacite_acceuil_h']."</td>
		<td>".$uneHabitation_dispo['surface_habitable_h']."</td>
		<td>".$uneHabitation_dispo['surface_balcon_h']."</td>
		<td>".$uneHabitation_dispo['distance_piste_h']."</td>
		<td>".$uneHabitation_dispo['exposition_h']."</td>
		<td>".$uneHabitation_dispo['cave_h']."</td>
		<td>".$uneHabitation_dispo['local_a_ski_h']."</td>
		<td>".$uneHabitation_dispo['idp']."</td>
		";
	if (isset($_SESSION['email']))
	{
		echo '
		<td><input type="submit"  name ="Reserver" value="Reserver"></td>
		';
	}
	echo "</tr>";
}
?>
</table>

<footer class="py-5">
<div class="container">
  <p class="m-1 text-center text-white">Copyright &copy;Félix Millon & Théo Chesnais & Andy Kadiambu</p>
</div>
</footer>

  </body>

</html>
