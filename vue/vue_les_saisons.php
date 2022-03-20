
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

<h3><strong class="presentation"> Liste des saisons </strong> </h3>
</br>
<form method="post" class="form-inline">
<strong class="presentation">Mot de recherche: </strong> <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-secondary">
</form>
</br>
<table class="table table-striped table-dark"> 
<tr>
	<td> Saison</td>
	<td> Début saison </td>
	<td> Fin saison </td>
	<td> Année </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesSaisons as $uneSaison){
	echo "<tr>";
	echo"
		<td>".$uneSaison['saison']."</td>
		<td>".$uneSaison['debut_saison']."</td>
		<td>".$uneSaison['fin_saison']."</td>
		<td>".$uneSaison['annee_s']."</td>
		";
	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
	{
		echo "
		<td>
		<a href='index.php?page=6&action=sup&saison=".$uneSaison['saison']."&annee_s=".$uneSaison['annee_s']."'><img src='images/sup.png' height='30' width='30'><a/>
		<a href='index.php?page=6&action=edit&saison=".$uneSaison['saison']."&annee_s=".$uneSaison['annee_s']."'><img src='images/edit.jpg' height='30' width='30'><a/>
		</td>
		";
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
