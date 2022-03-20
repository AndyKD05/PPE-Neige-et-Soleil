

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


<h3><strong class="presentation"> Liste des tarifs </strong></h3>
</br>
<form method="post" class="form-inline">
<strong class="presentation">Mot de recherche: </strong> <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-secondary">
</form>
</br>
<table class="table table-striped table-dark"> 
<tr>
	<td> Tarif </td>
	<td> Contrat concerné </td>
	<td> Debut et fin du contrat </td>
	<td> Habitation </td>
	<td> Proprietaire </td>
	<td> Saison</td>
	<td> Debut et fin de la saison </td>
	<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesTarifs as $unTarif){
	echo "<tr>";
	if(($unTarif['idp']==$_SESSION['id'] and $_SESSION['role']=="prop") or $_SESSION['role']=="emp")
	{
		echo"
		<td>".$unTarif['tarif']."</td>
		<td>".$unTarif['idcml']." - ".$unTarif['descriptif']."</td>
		<td>".$unTarif['date_debut_cml']." ".$unTarif['date_fin_cml']."</td>
		<td>".$unTarif['idh']." ".$unTarif['nom_immeuble_h']." ".$unTarif['ville_h']."</td>
		<td>".$unTarif['idp']." ".$unTarif['prenom_p']." ".$unTarif['nom_p']."</td>
		<td>".$unTarif['saison']." ".$unTarif['annee_s']."</td>
		<td>".$unTarif['debut_saison']." ".$unTarif['fin_saison']."</td>
		";
	}
	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
	{
		echo "
		<td>
		<a href='index.php?page=11&action=sup&idcml=".$unTarif['idcml']."&saison=".$unTarif['saison']."&annee_s=".$unTarif['annee_s']."'><img src='images/sup.png' height='30' width='30'><a/>
		<a href='index.php?page=11&action=edit&idcml=".$unTarif['idcml']."&saison=".$unTarif['saison']."&annee_s=".$unTarif['annee_s']."'><img src='images/edit.jpg' height='30' width='30'><a/>
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