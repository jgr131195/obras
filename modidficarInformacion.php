<?php

    include_once "conexion.php";
    session_start();

    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $domicilio = $_POST['domicilio'];
    $poblacion = $_POST['poblacion'];
    $provincia = $_POST['provincia'];
    $nif = $_POST['nif'];
    $telefono = $_POST['telefono'];

    $_SESSION["usu_nombre"] = $nombre;
    $_SESSION['usu_apellido1'] = $apellido1 ;
    $_SESSION['usu_apellido2'] = $apellido2 ;
    $_SESSION['usu_domicilio'] = $domicilio ;
    $_SESSION['usu_poblacion'] = $poblacion ;
    $_SESSION['usu_provincia'] = $provincia ;
    $_SESSION['usu_nif'] = $nif ;
    $_SESSION['usu_telefono'] = $telefono ;
   
$nick = $_SESSION['usu_nick'];
$sql = "UPDATE usuarios 
        SET Usuario_nombre = '$nombre',
        Usuario_apellido1 = '$apellido1',
        Usuario_apellido2 = '$apellido2',
        Usuario_domicilio = '$domicilio',
        Usuario_poblacion = '$poblacion',
        Usuario_provincia = '$provincia',
        Usuario_nif = '$nif',
        Usuario_numero_telefono = '$telefono'
        WHERE Usuario_nick LIKE '$nick'";

if ($conn->query($sql) === TRUE) {
    if ($_SESSION['usu_perfil']=="admin") {
        header('Location: perfilAdmin.php');    
    } else {
        header('Location: perfilUsuario.php');    
    }
    

} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>