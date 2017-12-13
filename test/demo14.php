<?php 

var_dump(mt_rand(1000,9999));
var_dump(getCode());

/** 
 * 随机生成一个验证码的内容的函数 
 * @param $m :验证码的个数（默认为4） 
 * @param $type : 验证码的类型：0：纯数字 1：数字+小写字母  2：数字+大小写字符 
 */  
function getCode($m=4,$type=0){  
    $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";  
    $t = array(9,35,strlen($str)-1);  
    //随机生成验证码所需内容  
    $c="";  
    for($i=0;$i<$m;$i++){  
        $c.=$str[rand(0,$t[$type])];  
    }  
    return $c;  
}  