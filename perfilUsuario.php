<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <title>Perfil admin</title>
    <style>
        a {
            width: 100%;
        }
        h1 {
            text-align: center;
            font-size: 100px;
        }
    </style>
</head>
<body>

<?php

    include_once "conexion.php";
    session_start();

    $nick = $_SESSION['usu_nick'];

    $sql = "SELECT Usuario_nombre, Usuario_apellido1, Usuario_apellido2, Usuario_domicilio, Usuario_poblacion, Usuario_provincia, Usuario_nif, Usuario_numero_telefono 
            FROM usuarios
            WHERE Usuario_nick LIKE '$nick'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $usu_nombre = $row['Usuario_nombre'];
            $usu_apellido1 = $row['Usuario_apellido1'];
            $usu_apellido2 = $row['Usuario_apellido2'];                
            $usu_domicilio = $row['Usuario_domicilio'];
            $usu_poblacion = $row['Usuario_poblacion'];
            $usu_provincia = $row['Usuario_provincia'];                
            $usu_nif = $row['Usuario_nif'];
            $usu_numero_telefono = $row['Usuario_numero_telefono'];
        }
    } else {
        echo "0 results";
    }
    $conn->close();

?>


<div class="container-fluid">
    <h1><?php echo $_SESSION['usu_nick']; ?></h1>
</div>
<div class="container justify-align-center">
    <a class="btn btn-danger" href="desconectar.php" >Salir</a>
</div>

<div class="container justify-align-center">
    <h4>Datos personales</h4>
    <form action="modidficarInformacion.php" method="post">
        <div class="form-group">
            <label>Nombre: </label> 
            <input class="form-control" type="text" name="nombre" value='<?php echo $usu_nombre ?>' />  
        </div>                    
        <div class="form-group">
            <label>Apellidos: </label> 
            <div class="container">
                <div class="row">
                <input class="col-6 form-control" type="text" name="apellido1" value='<?php echo $usu_apellido1  ?>' />  
                <input class="col-6 form-control" type="text" name="apellido2" value='<?php echo $usu_apellido2  ?>' />  
                </div>
            </div>
        </div>                    
        <div class="form-group">
            <label>Domicilio: </label> 
            <input class="form-control" type="text" name="domicilio" value='<?php echo $usu_domicilio ?>' />  
        </div>                    
        <div class="form-group">
            <label>Poblacion: </label> 
            <input class="form-control" type="text" name="poblacion" value='<?php echo $usu_poblacion ?>' />  
        </div>                    
        <div class="form-group">
            <label>Provincia: </label> 
            <input class="form-control" type="text" name="provincia" value='<?php echo $usu_provincia ?>' />  
        </div>                    
        <div class="form-group">
            <label>NIF: </label> 
            <input class="form-control" type="text" name="nif" value='<?php echo $usu_nif ?>' />  
        </div>                    
        <div class="form-group">
            <label>Telefono: </label> 
            <input class="form-control" type="text" name="telefono" value='<?php echo $usu_numero_telefono ?>' />  
        </div>                    

        <input class="d-flex justifi-content-end btn btn-danger" type="submit" value="Modificar" />
    </form>                            
</div>

          <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" ></script>
</body>
</html>