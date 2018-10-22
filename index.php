<!DOCTYPE html>
<html lang="es" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Tabla de multiplicar</title>
    </head>
    <body>
        <?php
        const OP = ["+","-","x",":","%"];

        function selected($op1, $op2){
            return $op1== $op2 ? "selected" : "";
        }

        $num1 = isset($_GET['num1']) ? trim($_GET ['num1']) : '0';
              $num2 = isset($_GET['num2']) ? trim($_GET ['num2']) : '0';
              $op = isset($_GET['op']) ? trim($_GET ['op']) : '+';
               ?>
        <form action="" method="get">
            <label for="num1"Número:>Primer operando:</label>
            <input id="num1" type="text" name="num1" value="<?= $num1 ?>">
            <label for="num2"Número:><br>Segundo operando:</label>
            <input id="num2" type="text" name="num2" value="<?= $num2 ?>">
            <select name="op"> 
            <?php foreach (OP as $o): ?>
            <option value="<?= $o ?>" <?= selected($op, $o) ?>>
            <?= $o ?>
            </option>
            <?php endforeach ?>
            </select><br>
            <input type="submit" value="Calcular">
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
                case '-':
                    $calculo=$num1 - $num2;
                    break;
                case '*':
                    $calculo=$num1 * $num2;
                    break;
                case '/':
                    $calculo=$num1 / $num2;
                    break;
                case '%':
                    $calculo=$num1 / $num2;
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
