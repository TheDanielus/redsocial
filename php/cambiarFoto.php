<?php
    include("validarSesion.php");

    $ubicacion= "../img/" . $nickname . "/Perfil.jpg";

    $archivo = $_FILES['archivo']['tmp_name'];

    if(move_uploaded_file($archivo, $ubicacion)) {

        echo "El archivo ha sido subido";

        header('Location: ../fotos.php'); //Redireccionamos a la pagina mi perfil
    }
    else {

    echo "Ha ocurrido un error,trate de nuevo!";
    echo "<a href='../fotos.php'' >Volver.</a></div>";
    }

?>