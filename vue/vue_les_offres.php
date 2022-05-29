

     <!-- pour faciliter l’ergonomie de l’utilisateur : 
  Tableau avec lignes colorées alternativement, etc.
  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
 <!-- pour faciliter l’ergonomie de l’utilisateur : utilisation des librairie de styles du plugin DataTables de CDN en plus de la librairie jQuery 
      - la possibilité de trier ces données à la volé (sur une ou plusieurs colonnes), 
	    mettre au pied de ce tableau une pagination, insérer une boite de recherche dynamique, etc.
	  - la possibilité de copier, imprimer ou d’exporter votre tableau sous format PDF, CSV ou Excel.
	  - il faut ajouter un id au table
	    
      Le réseau de distribution de contenu DataTables (CDN : Content Delivery Network) est un magasin permanent du logiciel publié dans le cadre du projet DataTables 
	  que vous pouvez utiliser sur votre site sans avoir à l'héberger vous-même.
	  Exemples :
	   https://www.datatables.net/examples/advanced_init/dt_events.html
	   https://www.nicolas-verhoye.com/mettez-de-la-vie-dans-vos-tableaux-avec-jquery-datatables.html 	 
  -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
  <script type="text/javascript">
			$(document).ready(function() {
				$('#Tableau').dataTable();
			} );
  </script>

<br>
<section class="pricing-table">
	<div class="container">
		<div class="block-heading">
		  <h2>Choisissez de passer des bonnes vacances !</h2>
		</div>
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
								<button type='button' data-bs-target='#{$image}' data-bs-slide-to='3' aria-label='Slide 4'></button>
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
								<h4 class='card-title'>
								<a>".$uneHabitation['type_h']."</a>								
								<br> xxx € / nuit 
								</h4> 
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
<div class="container_fluid p-3 my-3 bg-light">
	<!-- https://www.w3schools.com/bootstrap5/bootstrap_tables.php -->

<table class="table table-light table-striped table-hover " id="Tableau"> 
<thead>
<tr class="table-dark">
	<?php
	//if (isset($_SESSION['email']) and $_SESSION['role']=="emp")	 
	{  ?>
	<th> id </th>
	<th> Adresse </th>
	<th> Descriptif </th> 
	<th> Type </th>
	<th> Capacite </th>
	<th> Surface </th>
	<th> Balcon </th>
	<th> Distance piste </th>
	<th> Exposition </th>
	<th> Cave </th>
	<th> Local à ski </th>
	<th> Proprietaire </th>
	
	<?php 	
	}	
	if  (isset($_SESSION['email']) and $_SESSION['role']=="emp")
	{
	echo	"<th> Opérations </th>";
	} 
	?> 
	
</tr>
</thead>
<tbody>
<?php
//if(isset($_SESSION['email']))
{

	foreach ($lesHabitations as $uneHabitation){
		echo "<tr>";
		//if(($uneHabitation['idp']==$_SESSION['id'] and $_SESSION['role']=="prop") or $_SESSION['role']=="emp" or !isset($_SESSION['email']))
		{
			//if (isset($_SESSION['email']) and $_SESSION['role']=="emp")
			{
				echo"<td>".$uneHabitation['idh']."</td>";
			}
			echo"
			<td>".$uneHabitation['numero_h']." ".$uneHabitation['rue_h']." ".$uneHabitation['CP_h']." ".$uneHabitation['ville_h']."</td>
			<td>".$uneHabitation['nom_immeuble_h']."</td> 
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
			<p  class = 'text-center'>
			<a href='index.php?page=2&action=sup&idh=".$uneHabitation['idh']."'><img src='images/delete.png' height='20' width='20' title='Delete'><a/>
			<a href='index.php?page=2&action=edit&idh=".$uneHabitation['idh']."'><img src='images/edit.jpg' height='20' width='20' title='Edit'><a/>
			</p>
			</td>
			";
		}
		echo "</tr>";
	}
	
}
?>
 </tbody>
</table> 
</div>

