<?php

define("CODE_ERROR", "100");
define("CODE_GET_MORE", "101");
define("MOBILE_ERROR", "102");
define("MOBILE_NO_MATCH", "103");
define("CODE_SUCESS", "200");

class getCodeAction extends Action {

	public function index () {

		$this->getCode();
	 	
	}


	/**
	 *  输入参数：手机号码
	 *  输出参数：验证码
	 */
	function getCode() {

		$return = array("statue" => "" ,"msg" => "");

	 	if(!array_key_exists("mobile", $_GET))
	 	{
	 	   //output("no mobile param");
	 	   $return["statue"] = MOBILE_ERROR;
	 	   $return["msg"] = "no mobile param";
	 	   output(json_encode($return));
	 	}
	 	
	 	$mobile = $_GET["mobile"] ? trim($_GET["mobile"]) : output("no param");

		// Step 1 验证手机号码是否有效、合法
		if(!preg_match("/^1[34578]\d{9}$/", $mobile)) {

			//output("no match");
		   $return["statue"] = MOBILE_NO_MATCH;
	 	   $return["msg"] = "no match";
	 	   output(json_encode($return));
		}

		// Step 2 通过接口生成验证码	
		$code = mt_rand(1000,9999); 

		// Step 3 讲验证码存入数据库
		$mysql = new mysqli("127.0.0.1:3306","root","root","mshop") or die("mysql open error");
		  

		// 该手机号码是否注册过，如果注册过，返回注册失败，

		$is_used_sql = "SELECT mobile as mobile_count FROM `mt_code` WHERE mobile ='$mobile'";
	  
	    $result  = $mysql->query($is_used_sql);
		$num = $result->num_rows;
		if( $num ) {
			 $return["statue"] = CODE_ERROR;
			 $return["msg"] = "get code more";
			 output(json_encode($return));
		}


		// 	while($obj = $is_used_result->fetch_object()){ 
		// 		$count = $obj -> mobile_count;
		// 		if($count) {
		// 			//output("get code more");
		// 			 $return["statue"] = CODE_ERROR;
		// 		 	 $return["msg"] = "get code more";
		// 		 	 output(json_encode($return));
		// 		}
		// 	}
		// }
		
		 $nowtime = time();
		 $sql = 'insert into mt_code (mobile,code,send_time,send_num,is_used,tag) values ';
		 $sql .= "({$mobile},{$code},{$nowtime},1,0,1)";

		 if(!$result = $mysql->query($sql,MYSQLI_USE_RESULT)) {
			//output("get code error");
			 $return["statue"] = CODE_ERROR;
		 	 $return["msg"] = "get code more";
		 	 output(json_encode($return));
		 }
	    // Step 4 返回验证码  JSON
	    //output($code);
	     $return["code"] = $code;
	     $return["mobile"] = $mobile;
	     $return["statue"] = CODE_SUCESS;
		 $return["msg"] = "get code sucess";


		// 邮件通知用户验证码
		 $this->sendMail($code);
		// 短信通知用户验证码
		 $this->sendMobile($code, $mobile);
		 output(json_encode($return));


	}


	function sendMail($code) {
		//邮件
		@include_once "mail.php";
		$mail = new mail_sender();
		$mail->AddAddress("2870029552@qq.com");
		$mail->IsHTML(true); 		
		// 设置邮件格式为 HTML
		$mail->Subject = "考拉海购验证码通知";   
		// 标题
		$mail->Body = "验证码：" . $code;  
		// 内容
		$is_success = $mail->Send();	
	}

	/**
	 * 
	 * 
	 * @param  [type] $code   [description]
	 * @param  [type] $mobile [description]
	 * @return [type]         [description]
	 */
	function sendMobile($code,$mobile) {
		// send 
	}


	/** 
	 * 随机生成一个验证码的内容的函数 
	 * @param $m :验证码的个数（默认为4） 
	 * @param $type : 验证码的类型：0：纯数字 1：数字+小写字母  2：数字+大小写字符 
	 */  
	function getRandCode($m=4,$type=0){  
	    $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";  
	    $t = array(9,35,strlen($str)-1);  
	    //随机生成验证码所需内容  
	    $c="";  
	    for($i=0;$i<$m;$i++){  
	        $c.=$str[rand(0,$t[$type])];  
	    }  
	    return $c;  
	}  


}