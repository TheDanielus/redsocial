<?php

Include("conexion.php"); //el include es para llamar a un archivo, en este caso el de conexion.php

session_start(); //inicia una nueva sesion o reanuda la existente
$_SESSION['login'] = false;

// declarando variables para recibir y guardar los datos enviados desde el formulario
$nickname = $_POST["nickname"];
$password = $_POST["contraseña"];

//Evaluamos el nickname ingresado
$consulta = "SELECT *
            FROM `persona`
            WHERE Nickname= '$nickname' ";

$consulta = mysqli_query($conexion, $consulta); // ejecutamos la consulta
$consulta = mysqli_fetch_array($consulta);

if($consulta)
{
    if(password_verify($password, $consulta['Password'])){

        $_SESSION[login]        = true;
        $_SESSION[nickname]     =   $consulta['Nickname']; //$_SESSION es una variable superglobal
        $_SESSION[nombre]       =   $consulta['Nombre'];
        $_SESSION[apellidos]    =   $consulta['Apellidos'];
        $_SESSION[edad]         =   $consulta['Edad'];
        $_SESSION[descripcion]  =   $consulta['Descripcion'];
        $_SESSION[fotoPerfil]   =   $consulta['FotoPerfil'];

        header('Location: ../miPerfil.php'); //Redireccionamos a la pagina mi perfil
        

    }else {
        echo "Contraseña Incorrecta";
        echo "<br><a href='../index.html' >Intentalo de nuevo.</a></div>";
    }
}else { //Si la consulta esta vacia entonces significa que no existe el nickname
        echo "El usuario no existe.";
        echo "<br><a href='../index.html' >Intentalo de nuevo.</a></div>";
    
}

//Cerrando la conexion
mysqli_close($conexion);

?>