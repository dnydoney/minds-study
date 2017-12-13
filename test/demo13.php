<?php 

//json_decode(json)
//json_encode(value)
//base64_encode(data)
//base64_decode(data)

$str = base64_encode(json_encode($_POST));
var_dump($str);
$ab = base64_decode($str);
var_dump($ab);
$a = json_decode($ab,true);
var_dump($a);

// var_dump($a -> name);
// var_dump($a -> age);
// var_dump($a -> pos);
var_dump($a["name"]);
