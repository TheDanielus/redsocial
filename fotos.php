<?php
	include("php/conexion.php"); // el include es para llamar a un archivo
	include("php/validarSesion.php");
?>
<!DOCTYPE html>
<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Fotos</title>
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
		 		<img src="<?php echo " $_SESSION[fotoPerfil]" ?>" />
				<h1><?php echo "$_SESSION[nombre] $_SESSION[apellidos]" ?></h1>

				<form action="php/cambiarFoto.php" method="POST" enctype="multipart/form-data"/> <!--enctype="multipart/form-data"es necesario para subir archivos,crea la forma que permite subir archivos 	-->		 
					Cambiar Foto De Perfil: <input name="archivo" type="file" accept=".jpg, .jpeg, .png" required />
					<input type="submit" name="subir" value="Subir"/>
				</form>
		 </section>

	<section id="recuadros">
		 	<h2>Mis fotos</h2>
		 	<h3><form action="php/subirFoto.php" method="POST" enctype="multipart/form-data"/>
		 		Añadir imagen: <input name="archivo" id="archivo" type="file" accept=".jpg, .jpeg, .png" required />
		 		<input type="submit" name="subir" value="Subir">
		 	</form></h3>
			 <?php
			$consulta="Select *
						From fotos F
						Where F.Nickname='$nickname' ";
			$datos = mysqli_query($conexion, $consulta);
			while($fila=mysqli_fetch_array($datos)){

			
		?>

		<section class="recuadro">
			<img src="<?php echo $fila['NombreFoto'] ?>" height="200" width="280">
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