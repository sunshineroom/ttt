<?php
/**
  * wechat php test
  */

//define your token
define("TOKEN", "yichuandashuaige");

//引入类文件
include './Model/wechatCallbackapiTest.php';

$wechatObj = new wechatCallbackapiTest();
//调用方法验证服务器
// $wechatObj->valid();

//调用方法处理微信用户的请求
$wechatObj->responseMsg();



?>