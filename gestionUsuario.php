<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <title>Document</title>
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

    $nick = $_SESSION['usu_nick'];

    $sql = "SELECT Usuario_id, Usuario_nombre, Usuario_apellido1, Usuario_apellido2, Usuario_nick, Usuario_perfil, Usuario_bloqueado
            FROM usuarios 
            WHERE Usuario_nick NOT LIKE '$nick'";
    $result = $conn->query($sql);
?>
<div class="container-fluid">
    <h1><?php echo $_SESSION['usu_nick']; ?></h1>
</div>

<div class="container">
    <form action="modifica-borra_Usuarios.php" method="post">
    <table  class='table table-striped'>
        <tr>
            <th scope='col'>ID Usuario</th>
            <th scope='col'>Nombre</th>
            <th scope='col'>Apellidos</th>
            <th scope='col'>Nick</th>
            <th scope='col'>Perfil</th>
            <th scope='col'>Bloqueado</th>
            <th scope='col'><input class='btn btn-danger' type='submit' name='btnEliminar' value='Eliminar' /></th>
            <th scope='col'><input class='btn btn-danger' type='submit' name='btnDesbloquear' value='Desbloquear' /></th>
        </tr>
    
<?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['Usuario_id'];
            $nom = $row['Usuario_nombre'];
            $ape = $row['Usuario_apellido1']." ".$row['Usuario_apellido2'];
            $nick = $row['Usuario_nick'];
            $perfil = $row['Usuario_perfil'];
            $bloqueado = $row['Usuario_bloqueado'];

            if ($bloqueado=="0") {
                $cadena = "No";
            } else if ($bloqueado=="1") {
                $cadena = "Si";
            }

            echo "
            <tr>
                <td>$id</td>
                <td>$nom</td>
                <td>$ape</td>
                <td>$nick</td>
                <td>$perfil</td>
                <td>$cadena</td>
                <td><input type='checkbox' name='idEliminar[]' value='$id' /></td>
                <td><input type='checkbox' name='idModificar[]' value='$id' /></td>
            </tr>";
        }
            echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();

?>
    </table>
    </form>
    <a class="btn btn-danger" href="perfilAdmin.php">Volver menu</a>
</div>


          <!-- jQuery first, then Tether, then Bootstrap JS. -->
          <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" ></script>
    
</body>
</html>