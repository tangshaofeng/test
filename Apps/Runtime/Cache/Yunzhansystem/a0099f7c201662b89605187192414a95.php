<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>云栈互联网站内容管理系统</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="stylesheet" type="text/css" href="/Public/Yunzhansystem/css/style_login.css" />
<script src="/Public/Yunzhansystem/js/jquery-1.9.1.min.js"></script>
<script src="/Public/Yunzhansystem/js/layer/layer.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="layout">
  <div class="main">
    <div class="login_form fl">
      <h2>管理员登录</h2>
      <form action="" method="post" id="loginform" name="loginform">
        <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td>
            <div class="input_box">
              <img src="/Public/Yunzhansystem/images/luser_icon.png" alt="">
              <input type="text" value="" placeholder="请输入管理员账号" id="username" name="username">
            </div></td>
          </tr>
          <tr>
            <td>
            <div class="input_box">
              <img src="/Public/Yunzhansystem/images/lpass_icon.png" alt="">
              <input type="password" value="" placeholder="请输入密码" id="password" name="password">
            </div></td>
          </tr>
          <tr>
            <td>
            <div class="input_box fl" style="width:150px;">
              <input type="text" value="" placeholder="验证码" id="txt_code" name="verify">
            </div>
            <div class="verify fl">
              <img id="verify" src="<?php echo U('verify');?>" height="40" class="img" />
              <span id="ck_verify">换一个</span></div>
            </td>
          </tr>
          <tr>
            <td><input type="submit" id="login_submit" class="login_btn" value="登录" placeholder=""></td>
          </tr>
        </tbody>
        </table>
      </form>
    </div>
    <div class="login_other fr"><br/><br/><br/>
    <a href="http://www.yunzhannet.com/" target="_blank"><img src="/Public/Yunzhansystem/images/yz_logo.png" alt="" width="100"></a><br/><br/>
    <a href="http://www.yunzhannet.com/" target="_blank"><img src="/Public/Yunzhansystem/images/yz_logo2.png" alt="" width="150"></a><br/><br/>客服热线：010-57016406
    </div>
    <div class="clear"></div>
      <div class="copyright">&copy; 2015-2016 YunZhanNet,Inc.All rights reserved.</div>
  </div>
</div>

<script type="text/javascript">
$(function(){
  $("#ck_verify").click(function(){
      $("#verify").attr("src", "<?php echo U('verify');?>&cache=" + Math.random());
  });
  $("#login_submit").click(function(){
     var username=$.trim($('#username').val());
     var password=$.trim($('#password').val());
     var txt_code=$.trim($('#txt_code').val());
     if (username==""){
      layer.msg('请输入管理员账号!');
      $('#username').focus();
      return false;
     }
     if (password==""){
      layer.msg('请输入密码!');
      $('#password').focus();
      return false;
     }
     if (txt_code==""){
      layer.msg('请输入验证码!');
      $('#txt_code').focus();
      return false;
     }
     return true;
  });

})
</script>
</body>
</html>