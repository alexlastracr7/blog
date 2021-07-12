
<?php 
	
	// $auth = $_SESSION['login'];
	// if(!$auth){
	// 	header('Location /index.php');
	// }
				

//DATABASES conection 
	
	require 'includes/templades/config/database.php';
	include './includes/templades/headerprinpical.php';
?>


<?php
	$rowsDestinations = function() {
		$query = "SELECT * FROM `destinations`";
		return mysqli_fetch_all(mysqli_query(getConnection(), $query), MYSQLI_ASSOC);
	}
?>

<body>
	
	<section class="hero">

		<div class="contenido-hero">
			<div>
			<img src="images/a.png" alt="" width="100%">
			</div>

		</div>

		</section>
	</section>
	
	<section>
		<p class="tituloafter" >TOPICS</p>
	</section>
	

<section>
	<div class="simbolo">
	<div class="avion">
		<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plane" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
			<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			<path d="M16 10h4a2 2 0 0 1 0 4h-4l-4 7h-3l2 -7h-4l-2 2h-3l2 -4l-2 -4h3l2 2h4l-2 -7h3z" />
		</svg>
	</div>
	
	<div class="nombre">
		<img src="images/nombre.png.png">
	</div>
</div>
</section>

<div class="imagenes">
<?php foreach ($rowsDestinations() as $row) : ?>
			<a><img class="a1" src="<?= $row['images_des'] ?>" >
			<span>
			<?= $row['namecity']  ?>
		</span>
		</a> 
<?php endforeach; ?>
</div>

<div>
	
</div>

<?php 
include './includes/templades/footers.php' 
?>

</html>
