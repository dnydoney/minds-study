<?php

class registerAction extends Action {

	public function doInsert($param) {

		var_dump($param["mobile"]);
		var_dump($param["pwd"]);
		var_dump($param["code"]);

	}

	public function doInsert2() {

		// var_dump($GLOBALS["param"]["mobile"]);
		// var_dump($GLOBALS["param"]["pwd"]);
		// var_dump($GLOBALS["param"]["code"]);
		var_dump($this->param);
	}

	public function doInsert3($mobile, $code, $pwd) {
				
		// 动态参数
	}


	public function index () {
		
		// 01 获取用户提供的密码，手机号码，code
		$mobile = $_GET["mobile"] ? trim($_GET["mobile"]) : output("0004");
		$code = $_GET["code"] ? trim($_GET["code"]) : output("0004");
		$pwd = $_GET["pwd"] ? md5(trim($_GET["pwd"])) : output("0004");

		// 02 校验数据（密码，手机）
		


		// 03 判断code是否过期
		// 04 判断code是否一致
		// 05 判断是否已经注册过 
		

		// Step 3 讲验证码存入数据库
		
		// 该手机号码是否注册过，如果注册过，返回注册失败，

		$is_used_sql = "SELECT code as mobile_count FROM `mt_code` WHERE is_used = 1 and code = '$code' and mobile ='$mobile'";	    
		$num  = $GLOBALS["db"]->get_row_num($is_used_sql);
		if(intval($num) > 0) {
			output("10001");
		} 
		

		// 06 完成功能注册
		$time = time();
		$insert_sql = " insert into mt_users (mobile,pwd,create_time)";
		$insert_sql .= " values ( '{$mobile}', '{$pwd}', '{$time}');";

		 if(!$GLOBALS["db"]->query($insert_sql)) {
			//output("get code error");
			 $return["statue"] = "10004";
		 	 $return["msg"] = "register fail";
		 	 output(json_encode($return));
		 }		 
		 
		// 07 作废code		
		 $update_code  = "update mt_code set is_used = 1 ";
		 $update_code .= " where mobile = '{$mobile}'";
		 if(!$result = $GLOBALS["db"]->query($insert_sql)) {
			//output("get code error");
			 $return["statue"] = "20001";
		 	 $return["msg"] = "register sucess";
		 	 output(json_encode($return));
		 }	

	 	 $return["statue"] = "20000";
		 $return["msg"] = "register sucess";
		 output(json_encode($return));
	}


	public function index2 () {
		
		// 01 获取用户提供的密码，手机号码，code
		$mobile = $_GET["mobile"] ? trim($_GET["mobile"]) : output("0004");
		$code = $_GET["code"] ? trim($_GET["code"]) : output("0004");
		$pwd = $_GET["pwd"] ? md5(trim($_GET["pwd"])) : output("0004");

		// 02 校验数据（密码，手机）
		


		// 03 判断code是否过期
		// 04 判断code是否一致
		// 05 判断是否已经注册过 
		

		// Step 3 讲验证码存入数据库
		$mysql = new mysqli("127.0.0.1:3306","root","root","mshop") or die("mysql open error");
		  

		// 该手机号码是否注册过，如果注册过，返回注册失败，

		$is_used_sql = "SELECT code as mobile_count FROM `mt_code` WHERE is_used = 1 and code = '$code' and mobile ='$mobile'";
	    $result  = $mysql->query($is_used_sql);
		$num = $result->num_rows;	
		if(intval($num) > 0) {
			output("10001");
		} 
		

		// 06 完成功能注册
		$time = time();
		$insert_sql = " insert into mt_users (mobile,pwd,create_time)";
		$insert_sql .= " values ( '{$mobile}', '{$pwd}', '{$time}');";
		 if(!$result = $mysql->query($insert_sql,MYSQLI_USE_RESULT)) {
			//output("get code error");
			 $return["statue"] = "10004";
		 	 $return["msg"] = "register fail";
		 	 output(json_encode($return));
		 }		 
		 
		// 07 作废code		
		 $update_code  = "update mt_code set is_used = 1 ";
		 $update_code .= " where mobile = '{$mobile}'";
		 if(!$result = $mysql->query($insert_sql,MYSQLI_USE_RESULT)) {
			//output("get code error");
			 $return["statue"] = "20001";
		 	 $return["msg"] = "register sucess";
		 	 output(json_encode($return));
		 }	

	 	 $return["statue"] = "20000";
		 $return["msg"] = "register sucess";
		 output(json_encode($return));
	}

}