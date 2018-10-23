<?php
/**
* @author Arturo Barba Rodríguez
* @copyright Copyright (c) 2018 Arturo Barba Rodríguez
* @license https://www.gnu.org/licenses/gpl.txt
*/
/**
* Muestra un mensaje de error.
* @param  string $err El mensaje de error.
*/
function mostrarError($err)
{
    echo "<h3>Error: $err</h3>";
}
function selected($op1, $op2)
{
    return $op1==$op2 ? 'selected' : '';
}
/**
* Muestra el resultado de la operacion.
* @param  string $p1 Primer operador.
* @param  string $p2 Segundo operador.
* @param  string $op Operando.
*/
function opera($p1, $p2, $op)
{
    switch ($op) {
        case '+':
        $res = $p1+$p2;
        break;
        case '-':
        $res = $p1-$p2;
        break;
        case '*':
        $res = $p1*$p2;
        break;
        case '/':
        $res = $p1/$p2;
        break;
        default:
        mostrarError("fallo de programacion");
        break;
    }
    return $res;
}
function form($p1, $p2, $op)
{ ?>
    <form action="" method="get">
        <label for="p1">Primer operando*: </label>
        <input id="p1" type="text" name="p1" value="<?= $p1 ?>"><br>
        <label for="p2">Segundo operando*: </label>
        <input id="p2" type="text" name="p2" value="<?= $p2 ?>"><br>
        <label for="op">Operacion*: </label>
        <select name="op">
            <?php foreach (OP as $o) { ?>
                <option value="<?= $o ?>" <?= selected($op, $o) ?>><?= $o ?></option>
            <?php } ?>
        </select><br>
        <input type="submit" value="Calcular">
    </form>
<?php } ?>
