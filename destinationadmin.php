<?php 

	session_start();

	$auth = $_SESSION['login'];

	if (!$auth){
		header('Location: /');
	}

?>

<?php 
	
	include '../../includes/templades/headeradmin.php';
	require '../../includes/templades/config/database.php';
?>

<?php

	$query = "SELECT * FROM `destinations`";
	$tablas = mysqli_query(getConnection(), $query);

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$id = $_POST['id'];
			$id = filter_var($id ,FILTER_VALIDATE_INT);
			if($id){
				$query = "DELETE FROM destinations WHERE id = ${id}";
				$result= mysqli_query(getConnection(), $query);
			}
		} 

?>
	
<section class="principal"> 
	<header class="encabezado">
		<a class="titulopagina">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon " width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
				<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
				<line x1="10" y1="14" x2="21" y2="3" />
				<path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
			</svg><h4 class="tituloprincipal">MyNameIsTravel!</h4>
		</a>

		<!-- colocar el nombre de usuarios cunado recien se registra -->
		<a class="adminuser">Administrator</a>
		<a href = "login.php">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-database" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
			<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
			<ellipse cx="12" cy="6" rx="8" ry="3"></ellipse>
			<path d="M4 6v6a8 3 0 0 0 16 0v-6" />
			<path d="M4 12v6a8 3 0 0 0 16 0v-6" />
			</svg>
		</a>	
	</header>
</head>
<body class="body">

	<div class="mymenu">
		<img class="userimage" src="/images/alexmoscu.jpg">
		<nav>
			<a class="columnauser" href="create.php">Contact Me</a> 
			<a class="columnauser" href="aboutadmin.php">About Me</a>
			<a class="columnauser" href="destinationadmin.php">Destinations</a>
			

			<div>
				<?php if($auth): ?>
					<a class="columnauser" href="../../logout.php">Log Out</a>
				<?php endif; ?>
			</div>
			
		</nav>
	</div>

	<div class="bodyadmin">
		<a class="privetadmin">Hi ALEX! </a>
	</div>


	<div>
		<a href="addabout.php"><svg xmlns="http://www.w3.org/2000/svg" class="tabla" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
		<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
		<circle cx="12" cy="12" r="9" />
		<line x1="9" y1="12" x2="15" y2="12" />
		<line x1="12" y1="9" x2="12" y2="15" />
		</svg></a>
	</div>

	
	<div class="tabla">
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>Name of City</th>
					<th>Picture</th>
                    <th>Description</th>
					
				</tr>
			</thead>

			<tbody > <!-- mostrar los resultados -->


			<?php foreach ($tablas as $row): ?>
				<tr class="bodytable">
					<td class="texto"><?= $row['id'] ?></td>
					<td class="texto"><?= $row['namecity'] ?></td>
					<td class="texto"><?= $row['images_des'] ?></td>
                    <td class="texto"><?= $row['description'] ?></td>
					<td class="texto">
                    <form method ="POST" action="">
						
						<input type ="submit"  value= "delete" class="botonu1">
						</form>
						<a class="botonu2" href="updatedestination.php?id=<?php echo $row['id'] ?>">Update</a>
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
	
</body>
</html>