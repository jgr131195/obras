<?php

    include_once "conexion.php";
    
    $nick = $_POST['nick'];
    $mail = $_POST['mail'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $perfil = $_POST['perfil'];    
    
    if ($pass1==$pass2) {
        $pass_cod = password_hash($pass1, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios(Usuario_nick, Usuario_email, Usuario_clave, Usuario_perfil) 
        VALUES ('$nick','$mail','$pass_cod','$perfil')";

        if ($conn->query($sql) === TRUE) {
            header('Location: registrado.html');            
        } else {
            header('Location: errorLogin.html');
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
    } else {
        header('Location: errorLogin.html');
    }//contraseña =



$conn->close();
?>