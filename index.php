<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Calculadora</title>
</head>
<body>
    <?php
    //refactorizas para no recibir 3 parametros sino 1 en un array
    require './aux.php';
    const OP = ["+", "-", "*", "/"];
    const PAR = ["op"=>"+", "p1"=>"0", "p2"=>"0"];

    $err = [];

    try {
        extract(compruebaParametros(PAR, $error)); //Crea variables con los contenidos del array
        compruebaValores($p1, $p2, $op, OP, $err);
        form($p1, $p2, $op);
        mostrarResultado($p1, $p2, $op, $err);
    } catch (Exception $e) {
        mostrarErrores($err);
    }
    ?>
</body>
</html>
