<?php
    include_once "conexion.php";
    
    $obra = $_POST['obra'];
    $trabajador = $_POST['trabajador'];
    
    $sql = "SELECT * FROM trabajadores_obra WHERE Usuario_id LIKE '$trabajador'";

    //UPDATE trabajadores_obra SET fecha_fin='2019-12-05' WHERE obra_id='1' AND usuario_id='2'
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $obra_id = $row['obra_id'];
            $usuario_id = $row['usuario_id'];
            $fecha_inicio = $row['fecha_inicio'];
            $fecha_fin = $row['fecha_fin'];
        }
        $fecha_actual = date("Y-m-d");
        



        

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