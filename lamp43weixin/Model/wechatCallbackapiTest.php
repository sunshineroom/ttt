<?php 

	class wechatCallbackapiTest
	{
		//进行服务器验证
		public function valid()
	    {
	        //接收来自微信服务器的随机字符串
	        $echoStr = $_GET["echostr"];

	        //valid signature , option
	        if($this->checkSignature()){
	            //如果签名校验成功,把随机字符串返回给微信服务器
	        	echo $echoStr;
	        	exit;
	        }
	    }

	    //从微信服务器接收用户发送的消息,并处理
	    public function responseMsg()
	    {
			//get post data, May be due to the different environments
			//用来接收xml数据包
			$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

	      	//extract post data
			if (!empty($postStr)){
	                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
	                   the best way is to check the validity of xml by yourself */
	                libxml_disable_entity_loader(true);
	                // 函数把 XML 字符串载入对象中。 如果失败,则返回 false。
	              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
	               
	                $msgtype = $postObj->MsgType;//接收用户发送消息的类型

	                //判断用户发送的消息类型
	                switch ($msgtype) {
	                	case 'text':
	                		$this->TextType($postObj);
	                		break;
	                	case 'image':
	                		$this->ImageType($postObj);
	                		break;
	                	case 'event':
	                		$this->EventType($postObj);
	                		break;

	                	
	                	default:
	                		# code...
	                		break;
	                }
	        }else {
	        	echo "";
	        	exit;
	        }
	    }


	    //封装处理事件的方法
	    public function EventType($postObj){
	    	$fromUsername = $postObj->FromUserName;//发送方的openid
	    	$toUsername = $postObj->ToUserName;//接收方公众账号
	    	$key = $postObj->EventKey;
	    	$time = time();//创建时间
            $textTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Content><![CDATA[%s]]></Content>
						<FuncFlag>0</FuncFlag>
						</xml>";
			$msgType = "text";
        	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $key);
        	echo $resultStr;
	    }


	    //封装方法来处理用户发送的文本消息
	    public function TextType($postObj){
	    	$fromUsername = $postObj->FromUserName;//发送方的openid
	    	$toUsername = $postObj->ToUserName;//接收方公众账号
            $keyword = trim($postObj->Content);//用户发送的内容
            $time = time();//创建时间
            $textTpl = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<Content><![CDATA[%s]]></Content>
						<FuncFlag>0</FuncFlag>
						</xml>";

			if(!empty( $keyword ))
            {
            	switch ($keyword) {
            		case '你好':
            				$contentStr = '你好,我好,大家好';
            			break;
            		case '约不约':
            				$contentStr = '你约我就约';
            			break;
            		case '现在几点了':
            				$contentStr = date('Y-m-d H:i:s');
            			break;
            		case '音乐':
            				$this->MusicType($postObj);
            			break;
            		
            		
            		default:
            			$contentStr = '请再说一遍,我没理解你的意思';
            			break;
            	}
          		$msgType = "text";
            	$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            	echo $resultStr;
            }
	    }

	     //封装方法来处理用户发送的图片消息
	    public function ImageType($postObj){
	    	$fromUsername = $postObj->FromUserName;//发送方的openid
	    	$toUsername = $postObj->ToUserName;//接收方公众账号
            $media_id = $postObj->MediaId;//用户发送的图片id
            $time = time();//创建时间
    //         $textTpl = "<xml>
				// <ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
				// <FromUserName><![CDATA[".$toUsername."]]></FromUserName>
				// <CreateTime>".$time."</CreateTime>
				// <MsgType><![CDATA[image]]></MsgType>
				// <Image>
				// <MediaId><![CDATA[".$media_id."]]></MediaId>
				// </Image>
				// </xml>";
			
			$textTpl = "<xml>
				<ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
				<FromUserName><![CDATA[".$toUsername."]]></FromUserName>
				<CreateTime>".$time."</CreateTime>
				<MsgType><![CDATA[music]]></MsgType>
				<Music>
				<Title><![CDATA[小情歌]]></Title>
				<Description><![CDATA[这是一首简单的小情歌]]></Description>
				<MusicUrl><![CDATA[http://bd.kuwo.cn/yinyue/2838051]]></MusicUrl>
				<HQMusicUrl><![CDATA[http://bd.kuwo.cn/yinyue/2838051]]></HQMusicUrl>
				<ThumbMediaId><![CDATA[".$media_id."]]></ThumbMediaId>
				</Music>
				</xml>";
			echo $textTpl;

	    }

	    public function MusicType(){
	    	$fromUsername = $postObj->FromUserName;//发送方的openid
	    	$toUsername = $postObj->ToUserName;//接收方公众账号
            
            $time = time();//创建时间

	    	$textTpl = "<xml>
				<ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
				<FromUserName><![CDATA[".$toUsername."]]></FromUserName>
				<CreateTime>".$time."</CreateTime>
				<MsgType><![CDATA[music]]></MsgType>
				<Music>
				<Title><![CDATA[小情歌]]></Title>
				<Description><![CDATA[这是一首简单的小情歌]]></Description>
				<MusicUrl><![CDATA[http://bd.kuwo.cn/yinyue/2838051]]></MusicUrl>
				<HQMusicUrl><![CDATA[http://bd.kuwo.cn/yinyue/2838051]]></HQMusicUrl>
				<ThumbMediaId><![CDATA[media_id]]></ThumbMediaId>
				</Music>
				</xml>";
			echo $textTpl;
	    }






		/*
	        进行加密校验
	        1）将token、timestamp、nonce三个参数进行字典序排序

	        2）将三个参数字符串拼接成一个字符串进行sha1加密

	        3）开发者获得加密后的字符串可与signature对比，标识该请求来源于微信

	    */
		private function checkSignature()
		{
	        // you must define TOKEN by yourself
	        if (!defined("TOKEN")) {
	            throw new Exception('TOKEN is not defined!');
	        }
	        
	        //接收的微信发过来加密签名
	        $signature = $_GET["signature"];
	        //微信发过来的时间戳
	        $timestamp = $_GET["timestamp"];
	        //微信发过来的随机数
	        $nonce = $_GET["nonce"];
	        //获取本地的token
			$token = TOKEN;
	        //压入数组
			$tmpArr = array($token, $timestamp, $nonce);
	        // use SORT_STRING rule
	        //进行字典排序
			sort($tmpArr, SORT_STRING);
	        //变成字符串
			$tmpStr = implode( $tmpArr );
	        //进行哈希加密
			$tmpStr = sha1( $tmpStr );
			
			if( $tmpStr == $signature ){
				return true;
			}else{
				return false;
			}
		}
	}




 ?>