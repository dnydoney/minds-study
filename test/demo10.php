<?php

$str =  '<?php echo "test"; ?>'; 

eval($str);
eval('?>'.$str.'<?php;'); // outputs test 
 

