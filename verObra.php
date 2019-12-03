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

    $sql = "SELECT Obra_id, Obra_nombre, Obra_direccion, Obra_jefe,Obra_latitud, Obra_longitud, Obra_cliente 
            FROM obras;";
    $result = $conn->query($sql);
?>

<div class="container-fluid">
    <h1><?php echo $_SESSION['usu_nick']; ?></h1>
</div>
<div class="container">
    <a class="btn btn-danger" href="gestionObra.php" >Gestion de obras</a>
</div>

<div class="container">
    <table  class='table table-striped'>
        <tr>
            <th scope='col'>ID Obra</th>
            <th scope='col'>Nombre obra</th>
            <th scope='col'>Direccion</th>
            <th scope='col'>Cliente</th>
            <th scope='col'>Jefe</th>
            <th scope='col'>Latitud</th>
            <th scope='col'>Longitud</th>
        </tr>
    
<?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id = $row['Obra_id'];
            $nom = $row['Obra_nombre'];
            $dir = $row['Obra_direccion'];
            $cliente = $row['Obra_cliente'];
            $jefe = $row['Obra_jefe'];
            $latitud = $row['Obra_latitud'];
            $longitud = $row['Obra_longitud'];


            echo "
            <tr>
                <td>$id</td>
                <td>$nom</td>
                <td>$dir</td>
                <td>$cliente</td>
                <td>$jefe</td>
                <td>$latitud</td>
                <td>$longitud</td>

            </tr>";
        }
            echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();

?>
    </table>
    <a class="btn btn-danger" href="perfilAdmin.php">Volver menu</a>
</div>


          <!-- jQuery first, then Tether, then Bootstrap JS. -->
          <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" ></script>
    
</body>
</html>