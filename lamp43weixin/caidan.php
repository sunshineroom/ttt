<?php 

	include './Token.php';
	include './function.php';


	// http请求方式：POST（请使用https协议） 
	// https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN
	//获取token
	$token = Token::getToken();
	//群发接口
	$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$token;
		
	$data = '{
			    "button": [
			        {
			            "name": "扫码", 
			            "sub_button": [
			                {
			                    "type": "sao", 
			                    "name": "扫码带提示", 
			                    "key": "11111", 
			                    "sub_button": [ ]
			                }, 
			                {
			                    "type": "scancode_push", 
			                    "name": "扫码推事件", 
			                    "key": "2222222", 
			                    "sub_button": [ ]
			                }
			            ]
			        } 
			    ]
			}';


	//开始请求
	$res = post($url,$data);
	var_dump($res);

 ?>