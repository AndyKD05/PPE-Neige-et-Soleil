
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

<h3><strong class="presentation">Liste des contrats de mandat locatif </strong> </h3>
</br>
<form method="post" class="form-inline">
<strong class="presentation">	Mot de recherche: </strong><input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-secondary">
</form>
</br>
<table class="table table-striped table-dark"> 
<tr>
<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	echo"<td> id contrat </td>";
}?>
	<td> Descriptif</td>
	<td> Début du contrat</td>
	<td> Fin du contrat</td>
	<td> Etat du contrat</td>
	<td> Proprietaire</td>
	<td> Habitation</td>

<?php 	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
{
	echo	"<td> Opérations </td>";
} ?>
</tr>

<?php  
foreach ($lesCML as $unCML){
	echo "<tr>";
	if(($unCML['idp']==$_SESSION['id'] and $_SESSION['role']=="prop") or $_SESSION['role']=="emp")
	{
		if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
		{
			echo"<td>".$unCML['idcml']."</td>";
		}
		echo"
			<td>".$unCML['descriptif']."</td>
			<td>".$unCML['date_debut_cml']."</td>
			<td>".$unCML['date_fin_cml']."</td>
			<td>".$unCML['etat_contrat']."</td>
			<td>".$unCML['idp']." ".$unCML['prenom_p']." ".$unCML['nom_p']."</td>
			<td>".$unCML['idh']." ".$unCML['nom_immeuble_h']." ".$unCML['ville_h']."</td>
			";
	}
	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
	{
		echo "
		<td>
		<a href='index.php?page=7&action=sup&idcml=".$unCML['idcml']."'><img src='images/sup.png' height='30' width='30'><a/>
		<a href='index.php?page=7&action=edit&idcml=".$unCML['idcml']."'><img src='images/edit.jpg' height='30' width='30'><a/>
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
