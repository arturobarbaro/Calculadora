<?php
/**
 * @author Arturo Barba Rodriguez
 * @copyright Copyright (c) 2018 Francisco Barba García
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
/**
* Muestra la tabla de multiplicar.
* @param  string|int $num El numero del cual sacar la tabla.
*/
function calcular($num1, $num2)
{
    $calculo=$num1 + $num2;
    echo "El resultado es: $calculo";
}
