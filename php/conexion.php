<?php

//declarando variables para la conexion
$servidor = "localhost"; //el servidor que utilizaremos, en este caso sera el localhost
$usuario = "root"; //el usuario de la base de datos
$contrasenha = ""; //la contraseña del usuario que utilizaremos.
$BD = "redsocial"; //El nombre de la base de datos.

// Creando la conexion
$conexion = mysqli_connect($servidor, $usuario, $contrasenha, $BD);

//Verificando la conexion
if(!$conexion){
    echo "Fallo de conexion <br>";
    die("Connection failed: " . mysqli_connect_error());
}
/*else {
    echo "Conexion exitosa";
}*/
?>