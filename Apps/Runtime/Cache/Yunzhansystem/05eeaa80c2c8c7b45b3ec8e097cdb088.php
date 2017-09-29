<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link rel="stylesheet" href="/Public/Yunzhansystem/css/style.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/Validform_v5.3.2.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<div class="pad-10">

<form class="myform" name="myform" id="myform" action="" method="post" enctype="multipart/form-data">
    <div class="col-auto">
        <div class="col-1" style="border:0px;">
            
<table width="100%" cellspacing="0" class="table_form">
    <tbody> 
    <tr>
      <th width="80" height="30"> <font color="red">*</font> <label class="label">标题</label></th>
      <td><?php echo ($info['title']); ?></td>
    </tr>
    <tr>
      <th width="80"> 关键词     </th>
      <td><input type="text" name="seo_keyword" id="seo_keyword" value="<?php echo ($info['seo_keyword']); ?>" style="width:280px" class="input-text">  多关键词之间用空格或者","隔开</td>
    </tr>
   <tr>
      <th width="80"> 摘要      </th>
      <td><textarea maxlength="200" name="description" id="description" style="width:98%;height:50px;"><?php echo ($info['description']); ?></textarea><br/>摘要长度为<b><span id="description_len">1-200</span></b> 个任意字符<span class="Validform_checktip "></span> </td>
    </tr>
    <tr>
      <th width="80"> <font color="red">*</font> 内容</th>
      <td><script id="container" name="content" type="text/plain"><?php echo (html_entity_decode((isset($info['content']) && ($info['content'] !== ""))?($info['content']):'')); ?></script></td>
    </tr>
    </tbody></table>
               
            </div>
        </div>
     <div class="bk15"></div>
     <input type="hidden" name="id" value="<?php echo ((isset($info['id']) && ($info['id'] !== ""))?($info['id']):''); ?>">
    <input class="submit" value="保存并提交" name="dosubmit" type="submit">
    <input class="button input_out" value="取消" type="reset">
</form>
</div>
<script>
    var ue = UE.getEditor('container',{
    initialFrameWidth : 1000,
    initialFrameHeight : 450
    });
</script>
</body>
</html>