<?php 
	
	//【php中的curl】php中curl的详细解说
	// http://blog.csdn.net/yanhui_wei/article/details/21530811
	/*
		//在脚本中如何向远程服务器发起请求
		// $res = file_get_contents($url);
		// $res = fopen($url,'r');

	
		//1.初始化，创建一个新cURL资源
		$ch = curl_init();
		 
		//2.设置URL和相应的选项
		 
		curl_setopt($ch, CURLOPT_URL, "http://www.lampbrother.net/");
		 
		curl_setopt($ch, CURLOPT_HEADER, 0);
		 
		//3.抓取URL并把它传递给浏览器
		 
		$res = curl_exec($ch);
		 
		//4.关闭cURL资源，并且释放系统资源
		 
		curl_close($ch);
		 
		return $res;
	*/
	include './Model/Curl.class.php';
	function get($url){
		//实例化对象
		$curl = new Curl();
		//调用方法
		$res = $curl->get($url);
		//将结果返回
		return $res;
	}


	//声明函数来发送post请求
	function post($url, $data){

		//实例化对象
		$curl = new Curl();

		//调用方法
		$res = $curl->post($url,$data);

		//将结果返回
		return $res;
	}


	// $url = "https://www.baidu.com";

	// $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxd051c5e8934e2826&secret=57912d3fe2921113415466e06d927cc1';

	// $con = get($url);
	// echo $con;
	// var_dump($con);



 ?>