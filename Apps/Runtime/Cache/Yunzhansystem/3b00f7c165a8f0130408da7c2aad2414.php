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
<div class="fl">友情链接信息</div>
<div class="fr">
<a href="<?php echo U('Yunzhansystem/Links/index');?>"><em>管理友情链接</em></a>
</div>
</h6>
</div>
<table class="table_form" cellspacing="0" width="100%">
<tbody>
    <tr>
        <th width="100"><label class="label">友链标题</label></th>
        <td><input datatype="s1-20" errormsg="友链标题至少1个字符,最多20个字符！" nullmsg="请填写友链标题！" size="25" class="input-text" id="title" name="title" type="text" value="<?php echo ($info['title']); ?>"><span class="Validform_checktip "></span></td>
    </tr>
    <tr>
        <th>所属版位</th>
        <td>
        <select id="catid" name="catid" datatype="*" errormsg="请选择版位！" nullmsg="请选择版位！">
        <option value=" ">请选择版位</option>
        <?php if(is_array($cateType)): $i = 0; $__LIST__ = $cateType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option <?php if($info['catid'] == $val['id']): ?>selected="selected"<?php endif; ?> value="<?php echo ($val['id']); ?>" ><?php echo ($val['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        </td>
    </tr>
    
    
    <tr>
        <th>友链描述</th>
        <td><textarea name="description" id="description" class="input-textarea" cols="100" rows="4"><?php echo ($info['description']); ?></textarea></td>
    </tr>
    </tbody>
    </table><div style="display:; padding-left:0px;padding-right:0px;" id="imagesdiv" class="pad-10">
    <fieldset>
    <legend>图片设置</legend>
    <table class="table_form" width="100%">
    <tbody>
  <tr>
    <th width="80">链接地址</th>
    <td class="y-bg"><input value="http://" size="30" id="url" name="url" class="input-text" type="text"></td>
    <td rowspan="2" class="upload-row">
     <input name="image" value="<?php echo ($info['image']); ?>" id="image" size="35" type="hidden" class="input-text">
    <a href="javascript:void(0);" class="buttonup"><img id="imgurl0" src="<?php echo thumb($info['image']);?>" height="88" width="105" alt="友情链接图片" title="友情链接图片"></a>
   
    </td>
  </tr>
  <tr>
    <th>文字提示</th>
    <td class="y-bg"><input size="30" id="alt" name="alt" value="<?php echo ($info['alt']); ?>" class="input-text" type="text"></td>
  </tr>
  </tbody>
</table>
</fieldset></div>


<input type="hidden" name="id" value="<?php echo ((isset($info['id']) && ($info['id'] !== ""))?($info['id']):''); ?>">
<input class="button" value=" 确定 " id="dosubmit" name="dosubmit" type="submit">&nbsp;
<input  class="button input_out" value=" 取消 " type="reset">

</form>
</div>
<script>
$(function(){
    $(".upload-row").each(function(i){
      $(this).find(".buttonup").click(function(){
        var imgurl = $(this).find('img').attr('id');
        window.open('<?php echo U('Tool/uploadImage', '', '');?>&id='+ i + '&imgurl='+imgurl, '文件上传', 'height=100, width=400, top='+(screen.availHeight-100)/2+', left='+(screen.availWidth-400)/2+', toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no');
        })
    })
    //表单验证
     $(".myform").Validform({
      tiptype:1
      });
});
</script>
</body>
</html>