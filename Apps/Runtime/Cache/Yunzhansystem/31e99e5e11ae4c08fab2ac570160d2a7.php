<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/style.css" rel="stylesheet"/>
<script src="/Public/Yunzhansystem/js/jquery.min.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/Validform_v5.3.2.js"></script>
<style type="text/css">
 html{_overflow-y:scroll;}
.radio-label{ border-top:1px solid #e4e2e2; border-left:1px solid #e4e2e2;}
.radio-label td{ border-right:1px solid #e4e2e2; border-bottom:1px solid #e4e2e2;background:#f6f9fd;}
</style>
</head>
<body>
<div class="pad-10">
<form action="" method="post" id="myform" class="myform">
<fieldset>
    <legend>基本配置</legend>
    <table class="table_form" width="100%">
  <tbody>
    <tr>
      <th width="80"><label class="label">底部版权</label></th>
      <td class="y-bg"><textarea  style="width:95%;height:100px;" id="content" name="content" class="textarea"><?php echo ($info['content']); ?></textarea></td>
    </tr>

</tbody></table>
</fieldset>
<div class="bk10"></div>
<fieldset>
    <legend>SEO配置</legend>
    <table class="table_form" width="100%">
  <tbody>
 <tr>
    <th width="80"><label class="label">站点地址</label></th>
    <td class="y-bg"><input datatype="url" errormsg="请填写正确的网址！" nullmsg="请填写正确的网址！" class="input-text" name="site_url" id="site_url" size="30" value="<?php echo ($info['site_url']); ?>" type="text">
    <div class="onShow" id="catnameTip">例如：http://www.yunzhannet.com/</div><span class="Validform_checktip "></span></td>
  </tr>
  <tr>
    <th width="80"><label class="label">站点标题</label></th>
    <td class="y-bg"><input datatype="*2-100" errormsg="标题至少2个字符,最多100个字符！" nullmsg="请填写产品标题！" class="input-text" name="title" id="title" size="30" value="<?php echo ($info['title']); ?>" type="text" style="width:95%;"><span class="Validform_checktip " ></span></td>
  </tr>
  <tr>
    <th><label class="label">关键词</label></th>
    <td class="y-bg"><textarea  name="keyword" cols="30" class="input-text" id="keyword" style="width:95%;height:100px;"><?php echo ($info['keyword']); ?></textarea></td>
  </tr>
    <tr>
    <th><label class="label">描述</label></th>
    <td class="y-bg"><textarea  name="description" cols="30" class="input-text" id="description" style="width:95%;height:100px;"><?php echo ($info['description']); ?></textarea></td>
  </tr>
</tbody></table>
</fieldset>
<div class="bk10"></div>
 <input name="id" id="id" value="1" type="hidden">
<input class="button" id="dosubmit" name="dosubmit" value="保存并提交" type="submit">
</form></div>
<script>
  $(function(){
     //表单验证
         $(".myform").Validform({
          tiptype:3
         });
  });
</script>
</body>
</html>