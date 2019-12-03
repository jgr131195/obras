<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
            <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <style>

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
?>




<!-- Inicio form -->
    <div class="container">
        <h1>Nueva obra</h1>
        <form action="registraObra.php" method="post">
            <div class="form-group container">
                <div class="row">
                    <input class="form-control col-6" type="text" name="nombre" placeholder="Nombre" required />  
                    <input class="form-control col-6" type="text" name="direccion" placeholder="Direccion" required />  
                </div>
            </div>
            <div class="form-group container">
                <div class="row">
                    <input class="form-control col-6" type="text" name="latitud" placeholder="latitud" required />  
                    <input class="form-control col-6" type="text" name="altitud" placeholder="altitud" required />  
                </div>
            </div>                                  
       
            <div class="container">
                <div class="row">
                    <select class="form-control col-6" name="cliente">
                    <?php
                        $sql = "SELECT Usuario_id, Usuario_nombre, Usuario_nick FROM usuarios WHERE Usuario_perfil LIKE 'cliente'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $id = $row['Usuario_id'];
                                $nom = $row['Usuario_nombre'];
                                $nick = $row['Usuario_nick'];                
                                echo "<option value='$id'>$nom alias $nick</option>";
                            }
                        } else {
                            echo "0 results";
                        }
                        
                    ?>
                    </select>
                    <select class="form-control col-6" name="trabajador">
                    <?php
                        $sql = "SELECT Usuario_id, Usuario_nombre, Usuario_nick FROM usuarios WHERE Usuario_id NOT IN (SELECT Obra_jefe FROM obras) AND Usuario_perfil LIKE 'trabajador' ";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                $id = $row['Usuario_id'];
                                $nom = $row['Usuario_nombre'];
                                $nick = $row['Usuario_nick'];                
                                echo "<option value='$id'>$nom alias $nick</option>";
                            }
                        } else { 
                            echo "0 results";
                        }
                        $conn->close();
                    ?>
                    </select>                    
                </div>
            </div>
    <!-- Fin form -->
            <input class="d-flex justifi-content-end btn btn-danger" type="submit" value="Entrar" />
        </form>   
        <a class="btn btn-danger" href="perfilAdmin.php">Volver menu</a>                         
    </div>



    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" ></script>
</body>
</html>