<?php
class mysql {
	var $link = null;
	public function __construct($dbname, $user, $pwd){
		$this->link = new mysqli("127.0.0.1:3306",$user,$pwd,$dbname) or die("mysql open error");
		  
		if(!$this->link){
			$this -> ErrorMsg(mysql_error());
		}
	} 

	public function query($sql) {

		if($this->link == null)
			return;

		if($result = $this->link->query($sql,MYSQLI_USE_RESULT)) {
			return $result;
		}

	}

	public function get_row_num($sql) {
 		$result  = $this->query($sql);

 		if($result == null)
 			return 0;

		$num = $result->num_rows;	
		return $num;
	}


	public function close() {
		
		if(!$this->link)
			return;

		mysql_close($con);
	}

	public function ErrorMsg($msg = '', $sql = '') {
		if($msg) {
			echo "<b>error info</b>: $msg \n\n <br\><br\>";
		} else {

		}
	}
}