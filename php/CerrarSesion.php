<?php

session_start(); //inicia una nueva sesion o reanuda la existente

//Destruir todas las variables de sesion.
$_SESSION = array();

            //Si se desea destruir la sesion completamente, borre tambien las cookies de sesion.
            //NOTA: !Esto destruira la sesion, y no la informacion de la sesion!.

            /*if (ini_get("session.use_cookies")){
                $params = session_get_cookie_params();
                setcookies(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
            }*/


//Finalmente, destruir la sesion.
    session_destroy();
    header('Location: ../index.html');
?>