<?php 
	/**
	 * 用来获取access_token
	 */
	class Token
	{
		//成员属性
		public static $tokenFile = './token.txt';//缓存文件
		public static $tokenExpireTime = 3600;//缓存的有效时间

		//获取
		public static function getToken(){
			//检测缓存文件是否ok
			if(!self::checkTokenFileExists() || self::checkTokenExpire()){
				//请求token
				$res = self::requestToken();
				//写入token
				self::writeToken($res);
				//返回结果
				return $res;
			}
			//如果合法 又存在
			return self::readToken();
		}

		//请求获取token的接口
		public static function requestToken(){
			//设置获取token的接口地址
			$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxd051c5e8934e2826&secret=57912d3fe2921113415466e06d927cc1';
			//发送请求
			$res = get($url);
			//解析结果 json_encode();
			$data = json_decode($res, true);
			if(!empty($data['access_token'])){
				//返回
				return $data['access_token'];
			}else{
				return false;
			}
		}

		//将token写入缓存中
		public static function writeToken($token){
			
			//写入
			file_put_contents(self::$tokenFile, $token);
		}

		//读取token
		public static function readToken(){
			return file_get_contents(self::$tokenFile);
		}

		//检测缓存是否已经过期
		public static function checkTokenExpire(){
			//文件的最后修改时间   有效期   当前时间
			return filemtime(self::$tokenFile) + self::$tokenExpireTime < time();
		}

		//检测缓存文件是否存在
		public static function checkTokenFileExists(){
			return file_exists(self::$tokenFile);
		}

	}





 ?>