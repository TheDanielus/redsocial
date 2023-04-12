<?php
	include("php/conexion.php"); // el include es para llamar a un archivo
	include("php/validarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi Perfil</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
	<header>
		<div id="logo">
			<img src="img/fotoPerfil.jpg" alt="logo"></a>
		</div>

		<nav class="menu">
			<ul>
				<li><a href="index.html">Inicio</a></li>
				<li><a href="miperfil.php">Mi Perfil</a></li>
				<li><a href="amigos.php">Mis Amigos</a></li>
				<li><a href="fotos.php">Mis Fotos</a></li>
				<li><a href="buscar.php">Buscar Amigos</a></li>
				<li><a href="php/CerrarSesion.php">Cerrar Sesion</a></li>
			</ul>
		</nav>
	</header>

	<section id="perfil">
		<img src="<?php echo " $_SESSION[fotoPerfil]" ?>" >
		<h1> <?php echo "$_SESSION[nombre] $_SESSION[apellidos]" ?> </h1>
		<p> <?php echo " $_SESSION[descripcion]" ?> </p>
	</section>

	<section id="recuadros">
		<h2>Mis Amigos</h2>

		<?php
		$consulta= "Select *
						From persona P
						WHERE P.Nickname in (Select A.Nickname2
											From amistad A
											Where A.Nickname1='$nickname' )
						Limit 3";
			$datos = mysqli_query($conexion, $consulta);
			
			while($fila=mysqli_fetch_array($datos)){ //con este while podemos eliminar los otros recuadros de amigos y dejar solo uno	
		?>
		<section class="recuadro">
			<img src="<?php echo $fila['FotoPerfil'] ?>" height="150">
			<h2><?php echo $fila['Nombre'] . " " .$fila['Apellidos'] ?></h2>
			<p class="parrafo">
				<?php echo $fila['Descripcion'] ?>
			</p>
			<a href=" <?php echo "perfil.php?nickname=".$fila['Nickname'] ?> " class="boton">Ver Perfil</a><br><br>
		</section>
		<?php
	}
		?>
		<!--<section class="recuadro">
			<img src="img/amigo2.jpg" height="150">
			<h2>Amigo2</h2>
			<p class="parrafo">
				Descripcion Descripcion Descripcion Descripcion
			</p>
			<a href="" class="boton">Ver Perfil</a><br><br>
		</section>

		<section class="recuadro">
			<img src="img/amigo3.jpg" height="150">
			<h2>Amigo3</h2>
			<p class="parrafo">
				Descripcion Descripcion Descripcion Descripcion
			</p>
			<a href="" class="boton">Ver Perfil</a><br><br>
		</section>-->
	</section>


	<section id="recuadros">
		<h2>Mis Fotos</h2>

		<?php
			$consulta="Select *
						From fotos F
						Where F.Nickname='$nickname'
						LIMIT 3";
			$datos = mysqli_query($conexion, $consulta);
			while($fila=mysqli_fetch_array($datos)){
		?>

		<section class="recuadro">
			<img src="<?php echo $fila['NombreFoto'] ?>" height="200" width="280">
		</section>

		<?php
			}
			?>
		<!--<section class="recuadro">
			<img src="img/foto2.jpg" height="200" width="280">
		</section>

		<section class="recuadro">
			<img src="img/foto3.jpg" height="200" width="280">
		</section>-->
	</section>

	<footer>
		<p>Copyright &copy; 2023, The Danielus</p>
	</footer>
</body>
</html>