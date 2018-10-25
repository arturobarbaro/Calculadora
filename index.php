<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Calculadora</title>
</head>
<body>
    <?php
    //refactorizas para no recibir 3 parametros sino 1 en un array
    //compact contrario al extract
    require './aux.php';
    const OP = ["+", "-", "*", "/"];
    const PAR = ["op"=>"+", "p1"=>0, "p2"=>0];
    
    $array = PAR;
    $err = [];

    // Comprobacion de parametros
    extract(compruebaParametros($array, $error)); //Crea variables con los contenidos del array

    // Comprobacion de valores
    compruebaValores($array, OP, $err);

    form($array);

    if (empty($err)){
        mostrarResultado($array, $err);
    } else {
        mostrarErrores($err);
    }
    ?>
</body>
</html>
