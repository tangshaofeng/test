<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link rel="stylesheet" href="/Public/Yunzhansystem/css/style.css?v=3">
</head>
<body>
<div class="pad-10">
<!--
<div class="explain-col">友情提示:images目录不写可，请检查服务器当前目录权限！</div>-->
<?php if(!empty($error_Arr)): if(is_array($error_Arr)): $i = 0; $__LIST__ = $error_Arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="explain-col"><?php echo ($val['error_tit']); echo ($val['error_msg']); ?></div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
<div class="welcome-section">
  <h1><?php echo ($Config['title']); ?></h1>
  <p>欢迎使用云栈互联内容管理系统，上次登录时间：<?php echo (session('last_login_time')); ?></p>
</div>
<div class="quick_block">
<a href="<?php echo U('Yunzhansystem/Config/index');?>" class="a1"><img src="/Public/Yunzhansystem/images/st_ico.png" alt=""><span>网站设置</span></a>
<a href="<?php echo U('Yunzhansystem/Article/add');?>" class="a2"><img src="/Public/Yunzhansystem/images/add_ico.png" alt=""><span>信息发布</span></a>
<a href="<?php echo U('Yunzhansystem/Tongji/index');?>" class="a3"><img src="/Public/Yunzhansystem/images/tj_ico.png" alt=""><span>统计分析</span></a>
<a href="<?php echo U('Yunzhansystem/Attachment/index');?>" class="a4"><img src="/Public/Yunzhansystem/images/enter_ico.png" alt=""><span>附件管理</span></a>
</div>
<div class="clear"></div>
<div class="new-section">
  <div class="new-box1">
    <h3>服务器信息</h3>
    <p>服务器操作系统： <?php echo (PHP_OS); ?><br/>
    CMS版本： V2.1 <br/>
    运行环境： <?php echo ($_SERVER['SERVER_SOFTWARE']); ?><br/>
    MYSQL版本： <?php $system_info_mysql = M()->query("select version() as v;"); echo ($system_info_mysql["0"]["v"]); ?><br/>
    上传限制： <?php echo ini_get('upload_max_filesize');?></p>
  </div>
  <div class="new-box1">
    <h3>技术支持</h3>
    <p>北京云栈互联科技有限公司 <br/>
    开发与支持团队： 技术部<br/>
    官网网站：<a href="http://www.yunzhannet.com/">http://www.yunzhannet.com</a><br/>
    客户服务热线：010-57016405   010-57016406</p>
  </div>
  <div style="clear:both;"></div>
</div>

</div>
</body>
</html>