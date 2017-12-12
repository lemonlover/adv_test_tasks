<?php
/**
 * Created by PhpStorm.
 * User: ilakronberg
 * Date: 12.12.2017
 * Time: 22:19
 */

/* test_1 */
$input = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
function convertToWaterfall(&$x)
{
    $current = $x[count($x) - 1];
    unset($x[count($x) - 1]);
    if (count($x) - 1 >= 0)
        return $x = array($current => convertToWaterfall($x));
    else {
        return array($current => '');
    }
}
print_r(convertToWaterfall($input));
/* test_1 */
