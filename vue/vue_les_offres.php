<br>
<section class="pricing-table">
	<div class="container">
		<div class="block-heading">
		  <h2>Choisissez de passer des bonnes vacances !</h2>
		</div>
		<br>


		<div class="row justify-content-md-center">
			<?php 
			foreach ($lesHabitations as $uneHabitation) {
			?> 
			<div class="col-md-5 col-lg-4  pt-3 pr-3 pb-3 pl-3"> <!-- pt-3 pr-3 pb-3 pl-3 ==> https://devstory.net/12035/bootstrap-spacing -->
				<div class="card h-100 bg-light">
					<div class="item">
						<div class="heading">
							<h3><?php echo strtoupper($uneHabitation['nom_immeuble_h']);  
							 $image=str_replace(" ","",$uneHabitation['nom_immeuble_h']); ?></h3>
						</div>
						<p><?php echo $uneHabitation['numero_h']." ".$uneHabitation['rue_h']." ".$uneHabitation['CP_h']." ".$uneHabitation['ville_h']; ?></p>						 
						<div class="features">

			<?php echo "
						<div id='{$image}' class='carousel slide' data-bs-ride='carousel'>
							<div class='carousel-indicators'>
								<button type='button' data-bs-target='#{$image}' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
								<button type='button' data-bs-target='#{$image}' data-bs-slide-to='1' aria-label='Slide 2'></button>
								<button type='button' data-bs-target='#{$image}' data-bs-slide-to='2' aria-label='Slide 3'></button>
								<button type='button' data-bs-target='#{$image}' data-bs-slide-to='2' aria-label='Slide 4'></button>
							</div>
							<div class='carousel-inner'>
								<div class='carousel-item active'>
									<img src='images/{$image}_logement.jpeg' class='card-img-top' width='100' height='250'>
								</div>
								<div class='carousel-item'>
									<img src='images/{$image}_chambre.jpeg' class='card-img-top' width='100' height='250'>
								</div>
								<div class='carousel-item'>
									<img src='images/{$image}_soleil.jpeg' class='card-img-top' width='100' height='250'>
								</div>
								<div class='carousel-item'>
									<img src='images/{$image}_neige.jpeg' class='card-img-top' width='100' height='250'>
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
								<h3 class='card-title'>
								<a>".$uneHabitation['type_h']."</a>								
								</h3> 
								<h4 class='card-title'> xxx € / nuit </h4> 
								<div class='card-text'>
									<p class='card-text' align='justify'>
									<!--<a>Adresse :</a> ".$uneHabitation['numero_h']." ".$uneHabitation['rue_h']." ".$uneHabitation['CP_h']." ".$uneHabitation['ville_h']." </br>
									-->
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
							<button class='btn btn-outline-primary btn-lg' style='border-radius:30px'>Select</button>  
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
	//if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
	if (isset($_SESSION['email']) and ($_SESSION['role']=="emp" or $_SESSION['role']=="prop" )) 
	{
		echo'<td> id habitation </td>'; 	?>
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
	<?php 	
	}	
	if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
	{
	echo	"<td> Opérations </td>";
	} 
	?>
</tr>

<?php
if(isset($_SESSION['email']))
{

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
	
}
?>
</table>

