<?php
header("Content-Type:text/html; charset=utf-8");

$url = "http://api.map.baidu.com/telematics/v3/weather?location=青岛&output=json&ak=6tYzTvGZSOpYB5Oc2YGGOKt8";

//初始化一个 cURL 对象
$ch  = curl_init();
//设置你需要抓取的URL
curl_setopt($ch, CURLOPT_URL, $url);
// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//是否获得跳转后的页面
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);
//echo $data;


 $weather = json_decode($data,true);
 var_dump($weather["date"]);
 foreach ( $weather["results"] as $key => $value) {
 	var_dump($value["currentCity"]);
 	var_dump($value["index"]);
 	var_dump($value["weather_data"]);
 }

 



// //var_dump($weather);

// var_dump($data->date);




$data = array("name" => "Hagrid", "age" => "36");
$data_string = json_encode($data);     
$ch = curl_init('http://api.local/rest/users');      
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                 
    'Content-Type: application/json',
    'Content-Length: ' . strlen($data_string))         
);                                                                                                                   
$result = curl_exec($ch);
curl_close($ch);
