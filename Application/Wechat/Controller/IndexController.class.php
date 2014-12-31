<?php
namespace Wechat\Controller;

use Think\Controller;
use WeChat\Services\WechatService;

import("Wechat.Services.WechatService");

class IndexController extends Controller
{
  //当前微信请求对象
  private $weObj = null;

  /**
   * 获造函数
   */
  public function __construct()
  {
    parent::__construct();
    
    $options = array(
      'token' => C('TOKEN'), //填写你设定的key
      'appid' => C('APPID'), //填写高级调用功能的app id
      'appsecret' => C('APPSECRET'), //填写高级调用功能的密钥
    );
    $this->weObj = new WechatService($options);
  }

  /**
   * 微信接入消息处理
   */
  public function index()
  {
    $this->weObj->valid();
    $type = $this->weObj->getRev()->getRevType();
    switch ($type) {
      case Wechat::MSGTYPE_TEXT:
        $text = $this->weObj->getRevContent();
        $this->weObj->text($text)->reply();
        exit;
        break;
      case Wechat::MSGTYPE_EVENT:
        //....
        break;
      case Wechat::MSGTYPE_IMAGE:
        //...
        break;
      default:
        $this->weObj->text("help info")->reply();
    }
  }
}