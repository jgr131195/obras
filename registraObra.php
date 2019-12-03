<?php
    include_once "conexion.php";
    
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $latitud = $_POST['latitud'];
    $altitud = $_POST['altitud']; 
    $cliente = $_POST['cliente'];
    $jefe = $_POST['trabajador'];
    
    echo $nombre." ".$direccion." ".$latitud." ".$altitud." ".$cliente." ".$jefe;
    
    $sql = "INSERT INTO obras (Obra_nombre, Obra_direccion, Obra_jefe, Obra_latitud, Obra_longitud, Obra_cliente) VALUES ('$nombre','$direccion','$jefe','$latitud','$altitud','$cliente')";
    if ($conn->query($sql) === TRUE) {
        header('Location: perfilAdmin.php');
    } else {          
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    
$conn->close(); 
?>