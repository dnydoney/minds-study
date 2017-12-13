<?php 


//邮件
require_once "mail.php";
$mail = new mail_sender();
$mail->AddAddress("1749211769@qq.com");
$mail->IsHTML(true); 		
// 设置邮件格式为 HTML
$mail->Subject = "验证码测试文件";   
// 标题
$mail->Body = "Hello World";  
// 内容
$is_success = $mail->Send();
$result = $mail->ErrorInfo;
