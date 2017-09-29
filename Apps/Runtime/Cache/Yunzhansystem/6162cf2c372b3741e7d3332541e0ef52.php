<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link rel="stylesheet" href="/Public/Yunzhansystem/css/style.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/style.css" rel="stylesheet"/>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/Validform_v5.3.2.js"></script>
<style type="text/css">
    html{_overflow-y:scroll;}
    .Validform_wrong{ color:#ff0000;}
</style>
</head>
<body>
<div class="pad-10">
<form method="post" action="" name="myform" id="myform" class="myform">
<table class="table_form" cellspacing="0" width="100%">
<tbody>
    <tr>
        <th width="80"><strong><label class="label">版位名称</label></strong></th>
        <td><input datatype="s1-20" errormsg="版位名称至少1个字符,最多20个字符！" nullmsg="请填写版位名称！" name="title" id="title" class="input-text" size="25" type="text" value="<?php echo ($info['title']); ?>"><span class="Validform_checktip "></span></td>
    </tr>
    <tr>
        <th width="80"><strong>排序</strong></th>
        <td><input name="sort" id="sort" class="input-text" size="5"  datatype="n" errormsg="排序只能为数字！" nullmsg="请填写版位排序！" value="<?php echo ((isset($info['sort']) && ($info['sort'] !== ""))?($info['sort']):'0'); ?>" type="text"></td>
    </tr>
    <tr id="SizeFormat" style="display: ;">
        <th><strong><label>版位尺寸</label></strong></th>
        <td><label>宽：</label><input name="width" datatype="n" errormsg="版位尺寸宽度只能为数字！" nullmsg="请填写版位尺寸宽度大小！" id="width" class="input-text" size="10"  value="<?php echo ((isset($info['width']) && ($info['width'] !== ""))?($info['width']):'0'); ?>" onkeyup="value=value.replace(/[^\d]/g,'')" type="text"> px &nbsp;&nbsp;&nbsp;&nbsp;<label>高：</label><input name="height" id="height" datatype="n" errormsg="版位尺寸高度只能为数字！" nullmsg="请填写版位尺寸高度大小！" value="<?php echo ((isset($info['height']) && ($info['height'] !== ""))?($info['height']):'0'); ?>" class="input-text" size="10" onkeyup="value=value.replace(/[^\d]/g,'')" type="text"> px  </td>
    </tr>
    <tr>
        <th><strong>版位描述：</strong></th>
        <td><textarea name="description" id="description" class="input-textarea" cols="45" rows="4"><?php echo ($info['description']); ?></textarea></td>
    </tr></tbody>
  </table>
<div class="bk15"></div>
<input type="hidden" name="id" value="<?php echo ((isset($info['id']) && ($info['id'] !== ""))?($info['id']):''); ?>">
 <input name="dosubmit" value="保存并提交" class="button" type="submit">
  <input name="doreset" value="取消" class="button input_out" type="reset">

</form>
</div>
<script>
$(function(){
    //表单验证
     $(".myform").Validform({
      tiptype:1
      });
});
</script>
</body>
</html>