<?php

function transd($param){

    $arr = array("零","壹","贰","叁","肆","伍","陆","柒","捌","玖");
    $uint = array("拾","佰","仟");
	$mag = "";

	$len = strlen( $param );
	for($index = 0; $index < $len;$index++){
	    $char = (int)substr($param,$index,1);
	    if( $char ){
	        if($index != $len - 1 && $char  != 0 ) {
	        	$uint_index =  $len -2 -$index ;
	        	if($uint_index < 3) {
	        		$mag .= $arr[$char] .  $uint[$uint_index];

	        	}
            } else {
                $mag .= $arr[$char];
            }

	    }
	}

	var_dump($mag);

}

print(transd("78123456"));


