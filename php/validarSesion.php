<?php

session_start(); //inicia una nueva sesion o reanuda la existente
$login = $_SESSION['login'];

if(!$login)
{
    header('Location: index.html');
}
else {
    $nickname = $_SESSION['nickname']; // no es estrictamente necesario, pero nos facilitara el codigo mas adelante
}

?>