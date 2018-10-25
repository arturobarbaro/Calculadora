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
function mostrarErrores($err){
    foreach ($err as $me): ?>
        <h3>Error : <?= $me ?></h3>
        <?php
    endforeach;
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
function calcular($p1, $p2, $op)
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
        mostrarErrores("fallo de programacion");
        break;
    }
    return $res;
}

/**
 * FORMULARIO HTML
 * @param  [type] $p1 [description]
 * @param  [type] $p2 [description]
 * @param  [type] $op [description]
 * @return [type]     [description]
 */
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
<?php }

/**
 *
 * @param  [type] $error [description]
 * @return [type]        [description]
 */
function compruebaErrores($error){
    if(!empty($error)){
        throw new Exception();
    }
}

/**
 * Comprueba parametros
 * @param  [type] $par   [description]
 * @param  [type] $error [description]
 * @return [type]        [description]
 */
function compruebaParametros($par, &$err){
    if (!empty($_GET)) {
        if (empty(array_diff_key($_GET, $par)) &&
        empty(array_diff_key( $par, $_GET))) {
            return array_map('trim', $_GET);
        } else {
            $err[] = "Los parametros recibidos no son correctos.";
        }
    }
    return $par;
}

/**
 * Comprueba valores
 * @param  [type] $p1  [description]
 * @param  [type] $p2  [description]
 * @param  [type] $op  [description]
 * @param  [type] $ops [description]
 * @param  [type] $err [description]
 * @return [type]      [description]
 */
function compruebaValores($p1, $p2, $op, $ops, &$err){
    if (empty($err)) {
        if (!is_numeric($p1)) {
            $err[] = "El primer operando no es un numero.";
        }
        if (!is_numeric($p2)) {
            $err[] = "El segundo operando no es un numero.";
        }
        if (!in_array($op, $ops)) {
            $err[] = "El operador no es válido.";
        }
    }
    compruebaErrores($err);
}

/**
 * [FmostrarResultado description]
 * @param [type] $p1  [description]
 * @param [type] $p2  [description]
 * @param [type] $op  [description]
 * @param [type] $err [description]
 */
function mostrarResultado($p1, $p2, $op, &$err){
    ?>
    <h3>Resultado: <?= calcular($p1, $p2, $op) ?></h3>
    <?php
}
