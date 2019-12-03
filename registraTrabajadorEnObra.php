<?php
    include_once "conexion.php";
    
    $obra = $_POST['obra'];
    $trabajador = $_POST['trabajador'];
    
    $sql = "SELECT * FROM trabajadores_obra WHERE Usuario_id LIKE '$trabajador'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['Usuario_id'];
            $nom = $row['Usuario_nombre'];
            $nick = $row['Usuario_nick'];                
            echo "<option value='$id'>$nom alias $nick</option>";
        }
    } else {
        //Inserta si no encuentra al trabajador
        $fecha_actual = date("Y-m-d");
        $sql = "INSERT INTO trabajadores_obra(obra_id, usuario_id, fecha_inicio) 
                VALUES ('$obra','$trabajador','$fecha_actual')";
        if ($conn->query($sql) === TRUE) {
            header('Location: perfilAdmin.php');
        } else {          
            echo "Error: " . $sql . "<br>" . $conn->error;
        } 
    }  
    


    

    
    
$conn->close(); 
?>