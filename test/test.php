<?php
namespace namespace_demo;
include 'namespace_demo.php';

$t = new demo();

$t->test();
$t->woe();
var_dump("------------------");


echo "string",__NAMESPACE__;

$a = 1;
echo ++$a + $a++; 



if ($a == 5):
    echo "a equals 5";
    echo "...";
elseif ($a == 6):
    echo "a equals 6";
    echo "!!!";
else:
    echo "a is neither 5 nor 6";
endif;

