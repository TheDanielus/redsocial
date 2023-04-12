<?php
	include("php/conexion.php"); // el include es para llamar a un archivo
	include("php/validarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buscar</title>
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

	<section id="recuadros">
		<h2>Encuentra nuevos amigos</h2>

		<?php
		$consulta= "Select *
						From persona P
						WHERE P.Nickname!='$nickname' and P.Nickname not in (	Select A.Nickname2
																				From amistad A
																				Where A.Nickname1='$nickname' ) ";
			$datos = mysqli_query($conexion, $consulta);
			
			while($fila=mysqli_fetch_array($datos)){ //con este while podemos eliminar los otros recuadros de amigos y dejar solo uno	
		?>

		<section class="recuadro">
			<img src="<?php echo $fila['FotoPerfil'] ?>" height="150">
			<h2><?php echo $fila['Nombre'] . " " .$fila['Apellidos'] ?></h2>
			
			<a href="<?php echo "perfil.php?nickname=".$fila['Nickname'] ?>" class="boton">Ver Perfil</a>
			<a href="<?php echo "php/agregarAmigo.php?nickname=".$fila['Nickname'] ?>" class="boton">Agregar</a><br><br>
		</section>

		<?php
		}
		?>
	</section>

	<footer>
		<p>Copyright &copy; 2023, The Danielus</p>
	</footer>
</body>
</html>