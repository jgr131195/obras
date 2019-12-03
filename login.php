<?php

include_once "conexion.php";

    $nick = $_POST['nick'];
    $pass = $_POST['pass'];

    
$sql = "SELECT Usuario_id, Usuario_clave, Usuario_email, Usuario_perfil, Usuario_nombre, Usuario_apellido1, Usuario_apellido2, Usuario_nick, Usuario_nif 
        FROM usuarios
        WHERE Usuario_nick LIKE '$nick'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $usu_id = $row['Usuario_id'];
            $usu_clave = $row['Usuario_clave'];
            $usu_email = $row['Usuario_email'];
            $usu_perfil = $row['Usuario_perfil'];
            $usu_nombre = $row['Usuario_nombre'];
            $usu_apellido1 = $row['Usuario_apellido1'];
            $usu_apellido2 = $row['Usuario_apellido2'];
            $usu_nick = $row['Usuario_nick'];
            $usu_nif = $row['Usuario_nif'];

            if (password_verify($pass, $usu_clave)) {

                session_start();
                $_SESSION["usu_id"] = $usu_id;
                $_SESSION['usu_clave'] = $usu_clave ;
                $_SESSION['usu_email'] = $usu_email ;
                $_SESSION['usu_perfil'] = $usu_perfil ;
                $_SESSION['usu_nombre'] = $usu_nombre ;
                $_SESSION['usu_apellido1'] = $usu_apellido1 ;
                $_SESSION['usu_apellido2'] = $usu_apellido2 ;
                $_SESSION['usu_nick'] = $usu_nick ;
                $_SESSION['usu_nif'] = $usu_nif ;

                if ($usu_perfil=="admin") {
                    header('Location: perfilAdmin.php');    
                } else if ($usu_perfil=="trabajador") {
                    header('Location: perfilUsuario.php');    
                } else if ($usu_perfil=="cliente") {
                    header('Location: perfilUsuario.php');    
                }
            } else {
                header('Location: errorLogin.html');
            }//pass
            
        }//while
    } else {
        header('Location: usuarioNoRegistrado.html');
    }//consulta
    $conn->close();

?>