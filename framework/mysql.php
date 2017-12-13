<?php 
class mysql {
	public $link = null;
	public function __construct($dbname, $user, $pwd){
		$link = mysql_connect($dbname, $user, $pwd)
		if(!$link){
			ErrorMsg(mysql_error());
		}
	} 


	public function close() {
		
		if(!$link)
			return;

		mysql_close($con);
	}

	public function ErrorMsg($msg = '', $sql = '') {
		if($msg) {
			echo "<b>error info</b>: $msg \n\n <br\><br\>"
		} else {

		}
	}
}