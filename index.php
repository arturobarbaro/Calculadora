<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Tabla de multiplicar</title>
    </head>
    <body>
        <?php $num1 = isset($_GET['num1']) ? trim($_GET ['num1']) : '';
              $num2 = isset($_GET['num2']) ? trim($_GET ['num2']) : '';
              $op = isset($_GET['op']) ? trim($_GET ['op']) : '';
               ?>
        <form action="" method="get">
            <label for="num1"Número:>Primer operando:</label>
            <input id="num1" type="text" name="num1" value="<?= $num1 ?>">
            <label for="num2"Número:><br>Segundo operando:</label>
            <input id="num2" type="text" name="num2" value="<?= $num2 ?>"> <!--id y name no tienen por qué llamarse igual, pero for e id sí-->
            <label for="operacion"Número:><br>Operacion:</label>
            <input id="operacion" type="text" name="op" value="<?= $op ?>"> <!--id y name no tienen por qué llamarse igual, pero for e id sí-->
            <br>
            <input type="submit" value="Calcular">  <!--Los botones a menos que sea interesante los vamos a hacer sin name-->
        </form>

        <?php
        function mostrarError($err)
        {
          echo "<h3>Error: $err</h3>";
        }
        /**
        * Muestra la tabla de multiplicar.
        * @param  string|int $num El numero del cual sacar la tabla.
        */
        function calcular($num1, $num2, $op)
        {
            switch ($op) {
                case '+':
                    $calculo=$num1 + $num2;
                    break;
                default:
                    mostrarError("operacion erronea");
                    break;
            }

            echo "El resultado es: $calculo";
        }

        if (!empty($num1)) {
            if (!ctype_digit($num1)) {
                mostrarError("por favor introduzca un numero.");
            } else {
                    calcular($num1, $num2, $op);
            }
        }
        ?>
    </body>
</html>
