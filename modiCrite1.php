<?php
require("sesionJefe.php");
require("classphp/criteriosEvaluativos.php");
require("classphp/evaluaciones.php");
$idCriterio= $_GET["no"];
$obje = new criteriosEvaluativos();
$data = $obje->consultarIdCri($idCriterio);
foreach ($data as $row) {
    $cri=$row["CriPregunta"];
    $val=$row["CriValorPreg"];
    $eval=$row["CriForeEvaluacion"];
}
if (isset($_POST["actualizar"])) {
    $cri1=$_POST["criterio"];
    $val1=$_POST["valor"];
    $obje1= new criteriosEvaluativos();
    $data1 = $obje1->modificarPregunta($cri1,$val1,$idCriterio);
    $obje2 = new evaluaciones();
    $data2 = $obje2 ->consultarPorId($eval);
    $dataR = $data2-> fetch_array();
    header("Location: modifEva.php?no=$dataR[0]");
}
if (isset($_POST["volver"])) {
    header("Location: modifEva.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion criterio</title>
</head>
<body>
    <?php
    include("cabecera.php");
    ?>
    <h1>Modificación del criterio</h1>
    <form action="" method="post">
        <label for="criterio">Criterio evaluativo:</label>
        <input type="text" name="criterio" value="<?php echo $cri;?>"><br>
        <label for="valor">Valor o peso del criterio</label>
        <input type="number" name="valor" value="<?php echo $val;?>"><br>
        <button name="actualizar">Guardar y volver</button>
        <button name="volver">Volver sin guardar</button>
    </form>

    <?php
    include("pie.php");
    ?>
</body>
</html>