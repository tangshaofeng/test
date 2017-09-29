<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link rel="stylesheet" href="/Public/Yunzhansystem/css/style.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/style.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/js/calendar/jscal2.css" type="text/css" rel="stylesheet">
<link href="/Public/Yunzhansystem/js/calendar/border-radius.css" type="text/css" rel="stylesheet">
<link href="/Public/Yunzhansystem/js/calendar/win2k.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/Validform_v5.3.2.js"></script>
<script src="/Public/Yunzhansystem/js/calendar/calendar.js" type="text/javascript"></script>
<script src="/Public/Yunzhansystem/js/calendar/lang/en.js" type="text/javascript"></script>
</head>
<body>
<div class="pad-10">
<form enctype="multipart/form-data" method="post" action="" id="myform" name="myform" class="myform">
<div class="main_head">
<h6>
<div class="fl">管理员信息</div>
<div class="fr">
<a href="<?php echo U('Yunzhansystem/Admin/add');?>"><em>添加管理员</em></a>
</div>
</h6>
</div>
<table class="table_form" cellspacing="0" width="100%">
<tbody>
    <tr>
        <th width="100"><label class="label">用户名</label></th>
        <td><input datatype="s1-20" errormsg="用户名至少1个字符,最多20个字符！" nullmsg="请填写用户名！" size="25" class="input-text" id="username" name="username" type="text" value="<?php echo ($info['username']); ?>" <?php if($info['id'] == 1): ?>readonly="readonly"<?php endif; ?>><span class="Validform_checktip "></span></td>
    </tr>
    <tr>
        <th width="100"><label class="label">密码</label></th>
        <td><input datatype="*6-16" nullmsg="请设置密码！" errormsg="密码范围在6~16位之间！" size="25" class="input-text" id="userpwd" name="userpwd" type="password" value=""><span class="Validform_checktip "></span></td>
    </tr>
    </tbody>
    </table>

<div style="margin:10px 0px 0px 10px;">
<input type="hidden" name="id" value="<?php echo ((isset($info['id']) && ($info['id'] !== ""))?($info['id']):''); ?>">
<input class="submit" value=" 保存并提交 " id="dosubmit" name="dosubmit" type="submit">
<input class="button input_out" value=" 取消 " type="reset" >
</div>
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