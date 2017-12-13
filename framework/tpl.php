<?php
class TPL {


	var $_val = array();
	function output($key, $name) {
		$this->_val[$key] = $name;
	}

 	function display($filename) {
 		$source = file_get_contents($filename);
		$content =  preg_replace("/{([^\}\{\n]*)}/e", "\$this->select('\\1');", $source);	
  	 	ob_start();
        eval('?' . '>' . trim($content));
        $out = ob_get_contents();
        ob_end_clean();

        $this->gzip_out($out);
 	}

 	function select($tag) {
 	  $tag = stripslashes(trim($tag)); 	 
 	  if($tag{0} == '$'){
 	  	if(!array_key_exists(substr($tag, 1), $this->_val)) 
 	  		return ' ';
 	  	return $this->_val[substr($tag, 1)]; 	  
 	  } elseif($tag{0} == '#') {
 	  	 return " <?php echo '" . $this->_val[substr($tag, 1)] ."' ;?>";
 	  } else {
 	  	return ' ';
 	  }
 	  
 	} 

    function gzip_out($content)
    {
        header("Content-type: text/html; charset=utf-8");
        header("Cache-control: private");  //支持页面回跳
        echo $content;     
        
    }
    
}