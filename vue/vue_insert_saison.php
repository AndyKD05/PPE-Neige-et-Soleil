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

<h2><strong class="presentation">Insertion d'une saison</strong></h2>

<br />

<form method="post" class="form-inline">
	<table class="table table-striped table-dark">
		<tr>
				<td>Saison</td>
				<td><select name="saison">
					<option value="haute" <?php if($laSaison != null && $laSaison['saison']=='haute') echo "selected"; ?> > Haute </option>
					<option value="moyenne" <?php if($laSaison != null && $laSaison['saison']=='moyenne') echo "selected"; ?> > Moyenne </option>
					<option value="basse" <?php if($laSaison != null && $laSaison['saison']=='basse') echo "selected"; ?> > Basse </option>
				</select></td>
		</tr>
		<tr>
				<td>debut saison</td>
				<td><input type="date" name="debut_saison" value="<?php if($laSaison != null) echo $laSaison['debut_saison']; ?>">
				</td>
		</tr>
		<tr>
				<td>fin saison</td>
				<td><input type="date" name="fin_saison" value="<?php if($laSaison != null) echo $laSaison['fin_saison']; ?>">
				</td>
		</tr>
		<tr>
				<td>Année</td>
				<td><input type="text" name="annee_s" value="<?php if($laSaison != null) echo $laSaison['annee_s']; ?>">
				</td>
		</tr>
		<tr>
				<td><input type="reset" name="Annuler" value="Annuler" class="btn btn-danger"></td>
				<td><input type="submit" class="btn btn-success"
				<?php 
				if ($laSaison != null)
					echo ' name ="Modifier" value="Modifier">'; 
				else
					echo ' name="Valider" value="Valider">';
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
