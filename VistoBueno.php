<?php
require("sesionJefe.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/plantillaConten.css">
    <title>Menu jefe</title>
</head>

<body>
<?php
    include("cabecera.php");
?>



<?php
require("conexionBD.php");
$valor = $_GET["id"];
if (isset($_POST["runEstado"])) {
    $estado=$_POST["estadoNew"];
    $senteciaSQL="UPDATE tblausencias SET AusEstado='$estado' WHERE AusCodigo=$valor;";
    $runComandSQL= $conexion->query($senteciaSQL);
    ?>
    <script>
        alert("Se genero el cambio de la ausencia");
        window.location.href="menuJefeVistosBuenos.php";
    </script>
    <?php
}

?>

<form action="" method="post">
    <label for="">Nuevo estado</label>
    <select name="estadoNew" id="">
        <option value="VistoBueno">Dar visto bueno</option>
        <option value="Denegado">Demegar el visto bueno</option>
    </select>
    <button name="runEstado">Aceptar</button>
    <button><a href="menuJefeVistosBuenos.php">Cancelar</a></button>
</form>

<?php
    include("pie.php");
    ?>
</body>

</html>