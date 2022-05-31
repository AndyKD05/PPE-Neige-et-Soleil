
<h2><strong class="presentation"> Liste des bien disponibles </strong> </h2>
</br>
<form method="post" class="form-inline">
<strong class="presentation">Mot de recherche:</strong> <input type="text" name="mot">
	<input type="submit" name="Rechercher" value="Rechercher" class="btn btn-secondary">
</form>
</br>

<?php
if(!isset($i))
{
	$i=1;
}

foreach ($lesHabitations_dispo_total as $unehabitation_dispo_total)
{
echo'
<div id="myCarousel'.$i.'" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">';
$j=1;
   foreach ($lesimages as $uneImage)
   {
        if($uneImage['idh']==$unehabitation_dispo_total['idh'])
        {
        	 if($j==1)
	        {
	        echo'
		    <div class="carousel-item active">
		        <img class="img-fluid" src="images/'.$uneImage['path_im'].'">

		        <div class="container">
		          <div class="carousel-caption text-start">
		            <h1>'.$unehabitation_dispo_total['nom_immeuble_h'].'.</h1>
		            <p>
		            	Adresse :'.$unehabitation_dispo_total['numero_h']." ".$unehabitation_dispo_total['rue_h']." ".$unehabitation_dispo_total['CP_h']." ".$unehabitation_dispo_total['ville_h'].'</br>
		            	Superficie :'.$unehabitation_dispo_total['superficie_h'].'.</br>
		            	Type :'.$unehabitation_dispo_total['type_h'].'.</br>
		            	Capacite d\'acceuil :'.$unehabitation_dispo_total['capacite_acceuil_h'].'.</br>
		            	Surface :'.$unehabitation_dispo_total['surface_habitable_h'].'.</br>
		            	Balcon :'.$unehabitation_dispo_total['surface_balcon_h'].'.</br>
		            	Distance des piste :'.$unehabitation_dispo_total['distance_piste_h'].'.</br>
		            	Exposition :'.$unehabitation_dispo_total['exposition_h'].'.</br>
		            	Cave :'.$unehabitation_dispo_total['cave_h'].'.</br>
		            	Local à ski :'.$unehabitation_dispo_total['local_a_ski_h'].'.</br>
		            	Prix :'.$unehabitation_dispo_total['prix_total'].'.</br>';
		            	echo "<a href='index.php?page=9&action=res&idh=".$unehabitation_dispo_total['idh']."'>Reserver<a/>";
		            echo'</p>
		          </div>
		        </div>
		      </div>
		        ';
	        }else
	        {
	        	 echo'
		    <div class="carousel-item">
		        <img class="img-fluid" src="images/'.$uneImage['path_im'].'">

		        <div class="container">
		          <div class="carousel-caption">
		            <h1>'.$unehabitation_dispo_total['nom_immeuble_h'].'.</h1>
		            <p>
		            	Adresse :'.$unehabitation_dispo_total['numero_h']." ".$unehabitation_dispo_total['rue_h']." ".$unehabitation_dispo_total['CP_h']." ".$unehabitation_dispo_total['ville_h'].'</br>
		            	Superficie :'.$unehabitation_dispo_total['superficie_h'].'.</br>
		            	Type :'.$unehabitation_dispo_total['type_h'].'.</br>
		            	Capacite d\'acceuil :'.$unehabitation_dispo_total['capacite_acceuil_h'].'.</br>
		            	Surface :'.$unehabitation_dispo_total['surface_habitable_h'].'.</br>
		            	Balcon :'.$unehabitation_dispo_total['surface_balcon_h'].'.</br>
		            	Distance des piste :'.$unehabitation_dispo_total['distance_piste_h'].'.</br>
		            	Exposition :'.$unehabitation_dispo_total['exposition_h'].'.</br>
		            	Cave :'.$unehabitation_dispo_total['cave_h'].'.</br>
		            	Local à ski :'.$unehabitation_dispo_total['local_a_ski_h'].'.</br>
		            	Prix :'.$unehabitation_dispo_total['prix_total'].'.</br>';
		            	echo "<a href='index.php?page=9&action=res&idh=".$unehabitation_dispo_total['idh']."'>Reserver<a/>";
		            echo'</p>
		          </div>
		        </div>
		      </div>
		      </br>
		        ';
	        }
	        
		    $j++;

        }
       
   }
echo'
</div>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel'.$i.'" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel'.$i.'" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
  </div>

';
echo $i;
echo '<h1>'.$unehabitation_dispo_total['nom_immeuble_h'].'.</h1>
		            <p>
		            	Adresse :'.$unehabitation_dispo_total['numero_h']." ".$unehabitation_dispo_total['rue_h']." ".$unehabitation_dispo_total['CP_h']." ".$unehabitation_dispo_total['ville_h'].'</br>
		            	Superficie :'.$unehabitation_dispo_total['superficie_h'].'.</br>
		            	Type :'.$unehabitation_dispo_total['type_h'].'.</br>
		            	Capacite d\'acceuil :'.$unehabitation_dispo_total['capacite_acceuil_h'].'.</br>
		            	Surface :'.$unehabitation_dispo_total['surface_habitable_h'].'.</br>
		            	Balcon :'.$unehabitation_dispo_total['surface_balcon_h'].'.</br>
		            	Distance des piste :'.$unehabitation_dispo_total['distance_piste_h'].'.</br>
		            	Exposition :'.$unehabitation_dispo_total['exposition_h'].'.</br>
		            	Cave :'.$unehabitation_dispo_total['cave_h'].'.</br>
		            	Local à ski :'.$unehabitation_dispo_total['local_a_ski_h'].'.</br>
		            	Prix :'.$unehabitation_dispo_total['prix_total'].'.</br>';
		            	echo "<a href='index.php?page=9&action=res&idh=".$unehabitation_dispo_total['idh']."'>Reserver<a/>";
		            echo'</p>';
$i++;
}
?>
<table class="table table-striped table-info"> 
<tr>
	<td> Adresse </td>
	<td> Descriptif </td>
	<td> Superficie </td>
	<td> Type </td>
	<td> Capacite d'acceuil</td>
	<td> Surface</td>
	<td> Balcon </td>
	<td> Distance des piste</td>
	<td> Exposition</td>
	<td> Cave</td>
	<td> Local à ski</td>
	<td> Prix total</td>
  <td>Opérations</td>
</tr>
<?php  
foreach ($lesHabitations_dispo_total as $uneHabitation_dispo){
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
		<td>".$uneHabitation_dispo['prix_total']."</td>
		";
	if (isset($_SESSION['email']))
	{
		echo "<td><a href='index.php?page=9&action=res&idh=".$uneHabitation_dispo['idh']."'>Reserver<a/></td>";
	}
	echo "</tr>";
}
?>
</table>

