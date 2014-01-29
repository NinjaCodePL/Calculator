<?php

/*
 * It is a simple php code using Calculate Class
 * @author Wojciech Dasiukiewicz <wojciech.dasiukiewicz@gmail.com> www.ninjacode.pl
 */

require_once '../lib/ninjacode/Calculator.php';

$calculate = new Calculator();
echo $calculate->calculate($_POST['request']);

?>
