<?php 

	include './Token.php';
	include './function.php';

	// http请求方式: POST
	// https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=ACCESS_TOKEN
	//https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=ACCESS_TOKEN
	//获取token
	$token = Token::getToken();
	//群发接口
	$url = "https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=".$token;
		
	$data = '{
			   "touser":[
			   	"o4Eq_wkPxFh7fEKlml6Vgf0OOtaQ",
			   	"o4Eq_whgp1gOvgTquGWd0xOvrzzs",
			   	"o4Eq_wlXZbBAmyfECoz1-H-M0EdI",
			   	"o4Eq_wskKFtzI8R7KW7KWDgK9KhE",
			   	"o4Eq_wsmaYVW3Uoc8JJfSm8hTxNc",
			   	"o4Eq_wqTp_SCEG3E8yaXPSmuckr0",
			   	"o4Eq_wj9opA2SGrNMYXwIH3UxFfA",
			   	"o4Eq_wudclaT2LzF_H8Eu0IYAYDY",
			   	"o4Eq_wtLaqElW6D3Z1-4CLDGMINQ",
			   	"o4Eq_wmdSI6eAwNGIZEo1-DkcedI",
			   	"o4Eq_wp55UTVefNJV7lRbHitNoPE",
			   	"o4Eq_wvWP5nMWDBpl1LPQIRnIeAs",
			   	"o4Eq_wj95zmjG8LP-A0wAeyfjtt0",
			   	"o4Eq_whoYqUP-ZC0wv2yWq5aX0OA",
			   	"o4Eq_wk3IE65IDtOwE6dlqZYUDy8",
			   	"o4Eq_wmGrZhKxBIWU4lT40GKAmeM",
			   	"o4Eq_wtdYIZfM9JDq03pGQEO2YV4",
			   	"o4Eq_wo8Uaf149qzymqAxvcSsN0o",
			   	"o4Eq_wov2wds8PcPjiMpn-AzdD94",
			   	"o4Eq_wg3OuCSVVJ2Wc08cv3VpqsQ",
			   	"o4Eq_wgbARcC9QTOnqD1LZYkWcm4",
			   	"o4Eq_wp7bdfO1wfQfVgBmuw_TIFU",
			   	"o4Eq_wtS0M5CUXBZu8GZus9kg9kI",
			   	"o4Eq_wtJTRNSFa3KpxxjZMjj_i9s",
			   	"o4Eq_wrdivrqicUpa54tJbXQhw1I",
			   	"o4Eq_wqgaKyBv9g4SYkyM23fWZQ4",
			   	"o4Eq_wk8TvbhnW9Q-WmOdDNQJH6Y",
			   	"o4Eq_wvdmnXPq3yB9453ut3TuQ8g",
			   	"o4Eq_wgrzDZxyZK2_QwsmaXprvJQ",
			   	"o4Eq_wpvc6ac22BNwSUJIF2o98w0",
			   	"o4Eq_wgxpfngO2a12pe9hcAe5PDQ",
			   	"o4Eq_wogLMw9JONx3cszAvHcD1EE",
			   	"o4Eq_wn6b7bgJOS7EA0L_Q0VeaIE",
			   	"o4Eq_wr-ZJqHSC8ZC0m77y9OIRZI",
			   	"o4Eq_wnJufID7pCKPv9TO1WDfy-0",
			   	"o4Eq_wg5oF8KVu2uifHbbg7HzOdk",
			   	"o4Eq_wj1gr2j4nZQvdy83L4-gc5E",
			   	"o4Eq_wjhHMpUilhIT6Yiglx0k-4M"
			   ],
			    "msgtype": "text",
			    "text": { "content": "约吗."}
			}';


	//开始请求
	$res = post($url,$data);
	var_dump($res);

 ?>