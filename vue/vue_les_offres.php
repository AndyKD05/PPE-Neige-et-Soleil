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
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  </head>

  <body>


    <!-- Navigation -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
      <div class="container">
        <a class="logo navbar-brand" href="index.php">Neige et soleil</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto justify-content-end">
            
            <li class="nav-item active">

                <a class="nav-link" href="index.php">Home</a>

            </li>
            
			<?php
			
			if(!isset($_SESSION['email']))
			{
				echo
				'<li class="nav-item">
					<a class="nav-link" href="index.php?page=2">Offres</a>
				</li>';

				echo
				'<li class="nav-item">
					<a class="nav-link" href="sign_in.php">Sign In</a>
				</li>';

				echo
				'<li class="nav-item">
					<a class="btn btn-primary" href="sign_up.php">Sign Up</a>
				</li>';
			}

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

	<div class='carousel-item active'>
		<div class="container">
			<h3> <strong class="presentation">Liste des habitations</strong> </h3>
			</br>
			<form method="post" class="form-inline">
			<strong class="presentation">Mot de recherche: </strong> <input type="text" name="mot">
				<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-secondary">
			</form>
		</div>
	</div>

<h3> <strong class="presentation">Liste des habitations</strong> </h3>
</br>
<form method="post" class="form-inline">
<strong class="presentation">Mot de recherche: </strong> <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-secondary">
</form>
</br>

<!-- ********************************************************************************* --> 
<!-- ********************************************************************************* --> 
<section class="pricing-table">
	<div class="container">
		<div class="block-heading">
		  <h2>Choisissez !</h2>
		</div>
		<div class="row justify-content-md-center">
			<?php 
			foreach ($lesHabitations as $uneHabitation) {
			?> 
			<div class="col-md-5 col-lg-4">
				<div class="card h-100 bg-dark">
					<div class="item">
						<?php // if($uneHabitation['best_value']) { ?>
							<!-- <div class="ribbon">Best Value</div> -->
						<?php // } ?>
						<div class="heading">
							<h3><?php echo strtoupper($uneHabitation['nom_immeuble_h']); ?></h3>
						</div>
						<p><?php echo $uneHabitation['numero_h']." ".$uneHabitation['rue_h']." ".$uneHabitation['CP_h']." ".$uneHabitation['ville_h']; ?></p>						 
						<div class="features">
							<?php 
							//$featuresArray = preg_split ("/\|\|\|\|/", $uneHabitation['features']);
							//foreach ($featuresArray as $features) {
							?>
							  <!--
								<h4>
								<span class="feature"></span>
								<span class="value"><?php // echo $features; ?></span>
								</h4> 
							   --> 
							<?php //} ?>">

			<?php echo "
				 
						<div id='carouselExampleIndicators' class='carousel slide' data-bs-ride='carousel'>
						<div class='carousel-indicators'>
							<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
							<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='1' aria-label='Slide 2'></button>
							<button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='2' aria-label='Slide 3'></button>
						</div>
						<div class='carousel-inner'>
							<div class='carousel-item active'>
								<img src='css/queyras_soleil.jpg' class='card-img-top' width='100' height='250'>
							</div>
							<div class='carousel-item'>
								<img src='css/queyras_ete.jpg' class='card-img-top' width='100' height='250'>
							</div>
							<div class='carousel-item'>
								<img src='css/spot_queyras.jpg' class='card-img-top' width='100' height='250'>
							</div>
						</div>
						<button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>
							<span class='carousel-control-prev-icon' aria-hidden='true'></span>
							<span class='visually-hidden'>Previous</span>
						</button>
						<button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>
							<span class='carousel-control-next-icon' aria-hidden='true'></span>
							<span class='visually-hidden'>Next</span>
						</button>
					</div>
						
						<div class='card-body'>
							<h4 class='card-title'>
							<a>".$uneHabitation['type_h']."</a>
							</h4>
							<div class='card-text'>
								<p class='card-text' align='justify'>
									<a>Adresse :</a> ".$uneHabitation['numero_h']." ".$uneHabitation['rue_h']." ".$uneHabitation['CP_h']." ".$uneHabitation['ville_h']." </br>
									<a>Superficie :</a> ".$uneHabitation['superficie_h']." m°2</br>
									<a>Capacité :</a> ".$uneHabitation['capacite_acceuil_h']." personne(s) </br>
									<!--
									<a>Surface habitable :</a> ".$uneHabitation['surface_habitable_h']."</br>
									<a>Superficie :</a> ".$uneHabitation['surface_balcon_h'].",</br> -->
									<a>Distance des pistes :</a> ".$uneHabitation['distance_piste_h']."</br>
									<!--
									<a>Exposition :</a> ".$uneHabitation['exposition_h']."</br>
									<a>Cave :</a> ".$uneHabitation['cave_h'].", </br>
									<a>Local a ski</a> : ".$uneHabitation['local_a_ski_h']."
									-->
								</p>
							</div>
						</div>
						<div class='unecarte card-footer'>
					<!--      <small class='text-muted'>&#9733; &#9733; &#9733; &#9733; &#9733;</small> -->
							
						</div>	
									 
			";?>

						</div>
						
					</div>
				</div>
			</div>
			<?php } ?>                 
		</div>
	</div>
</section> 
<!-- ********************************************************************************* --> 
<!-- ********************************************************************************* --> 
							</br>
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
	if(($uneHabitation['idp']==$_SESSION['id'] and $_SESSION['role']=="prop") or $_SESSION['role']=="emp" or !isset($_SESSION['email']))
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