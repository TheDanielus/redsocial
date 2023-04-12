<?php

Include("conexion.php"); //el include es para llamar a un archivo, en este caso el de conexion.php


//declarando variables para recibir y guardar los datos enviados desde el formulario.
$nickname       = $_POST["nickname"]; //la primera es nuestra variable, la segunda despues de POST, es donde guardamos los datos en el formulario.
$nombre         = $_POST["nombre"]; 
$apellidos      = $_POST["apellidos"];
$edad           = $_POST["edad"];
$descripcion    = $_POST["descripcion"];
$email          = $_POST["correo"];
$password       = $_POST["contraseña"];

$passwordHash = password_hash($password, PASSWORD_BCRYPT); //BCRYPT es el algoritmo de encriptacion, devuelve una cadena de 60 caracteres,
$fotoPerfil   = "img/$nickname/perfil.jpg"; //ingresamos el nombre de la foto de perfil por defecto.


//Evaluamos si el nickname ingresado ya existe
$consultaID = "SELECT Nickname
                FROM persona
                WHERE Nickname= '$nickname' ";

$consultaID = mysqli_query($conexion, $consultaID); //Ejecutara la consulta y Devuelve un objeto con el resultado, false si hay error, true si es ejecutado.
$consultaID = mysqli_fetch_array($consultaID); //devuelve un array o NULL (fetch array= extraer fila)

if(!$consultaID) { //si la consulta esta vacia entonces significa que no existe el nickname, y creamos el nuevo usuario

    $sql = "INSERT INTO persona VALUES ( '$nickname', '$nombre', '$apellidos', '$edad', '$descripcion', '$fotoPerfil', '$email', '$passwordHash')";

    //Ejecutamos y verificamos si se guardaron los datos
    if (mysqli_query($conexion, $sql)) {

        mkdir("../img/$nickname"); //Creamos una carpeta en imagenes para el usuario
        copy("../img/default.jpg", "../img/$nickname/perfil.jpg"); //copiamos nuestra foto por default

        echo "Tu cuenta ha sido creada.";
        echo "<br><a href='../index.html'>Iniciar Sesion</a></div>";

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

}else {
    echo "El Nickname ya existe.";
    echo "<a href='index.html' Intentalo de nuevo.</a></div>";
}

//Cerrando la conexion
mysqli_close($conexion);
?>