<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link rel="stylesheet" href="/Public/Yunzhansystem/css/style.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/style.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/laydate.css" rel="stylesheet"/>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/Validform_v5.3.2.js"></script>
<script type="text/javascript" src="/Public/Yunzhansystem/js/laydate.js"></script>
</head>
<body>
<div class="pad-10">
<form enctype="multipart/form-data" method="post" action="" id="myform" name="myform" class="myform">
<div class="main_head">
<h6>
<div class="fl">广告位信息</div>
<div class="fr">
<a href="<?php echo U('Yunzhansystem/Ads/index?catid='.$catid);?>"><em>管理广告位</em></a>
<a href="<?php echo U('Yunzhansystem/Ads/add?catid='.$catid);?>"><em>添加广告位</em></a>
</div>
</h6>
</div>
<table class="table_form" cellspacing="0" width="100%">
<tbody>
    <tr>
        <th width="100"><label class="label">广告标题</label></th>
        <td><input datatype="*1-20" errormsg="广告标题至少1个字符,最多20个字符！" nullmsg="请填写广告标题！" size="25" class="input-text" id="title" name="title" type="text" value="<?php echo ($info['title']); ?>"><span class="Validform_checktip "></span></td>
    </tr>
    <tr>
        <th width="100"><label class="label">地区拼音</label></th>
        <td><input  size="25" class="input-text" id="pinyin" name="pinyin" type="text" value="<?php echo ($info['pinyin']); ?>"><span class="Validform_checktip "></span></td>
    </tr>
    <tr>
        <th>所属版位</th>
        <td><b style="color:#F60;">
            <?php echo get_row('版位',$catid,'title');?>(<?php echo get_row('版位',$catid,'width');?>*<?php echo get_row('版位',$catid,'height');?>)<input id="catid" name="catid" value="<?php echo ($info['catid']); ?>" type="hidden">
        </b></td>
    </tr>
    
    <tr>
        <th>上线时间</th>
        <td>
        <?php if($info['startdate'] == '' || $info['startdate'] == 0 ): ?><input readonly="" class="laydate-icon input-text" size="21" value="<?php echo date('Y-m-d h:i:s',time());?>" id="startdate" name="startdate" type="text">
        <?php else: ?>
        <input readonly="" class="laydate-icon input-text" size="21" value="<?php echo date('Y-m-d h:i:s',$info['startdate']);?>" id="startdate" name="startdate" type="text"><?php endif; ?>
        &nbsp;
            <div id="startdateTip" class="onShow">请选择上线时间</div></td>
    </tr>
    <tr>
        <th>下线时间</th>
        <td>
        <?php if($info['enddate'] == '' || $info['enddate'] == 0 ): ?><input readonly="" class="laydate-icon input-text" size="21" value="<?php echo date('Y-m-d h:i:s',strtotime('+1 month'));?>" id="enddate" name="enddate" type="text">
        <?php else: ?>
        <input readonly="" class="laydate-icon input-text" size="21" value="<?php echo date('Y-m-d h:i:s',$info['enddate']);?>" id="enddate" name="enddate" type="text"><?php endif; ?>
        &nbsp;<div id="enddateTip" class="onShow">默认为一个月</div></td>
    </tr>
    <?php if(($info['id']) == "33"): ?><tr>
        <th width="100"><label class="label">会场地址</label></th>
        <td><input class="input-text" id="address" name="address" type="text" value="<?php echo ($info['address']); ?>"><span class="Validform_checktip "></span></td>
    </tr>
    <tr>
        <th width="100"><label class="label">联系电话</label></th>
        <td><input class="input-text" id="cnumber" name="cnumber" type="text" value="<?php echo ($info['cnumber']); ?>"><span class="Validform_checktip "></span></td>
    </tr>
    <tr>
        <th width="100"><label class="label">巴士路线</label></th>
        <td><input class="input-text" id="busroute" name="busroute" type="text" value="<?php echo ($info['busroute']); ?>"><span class="Validform_checktip "></span></td>
    </tr>
    <tr>
        <th width="100"><label class="label">地铁路线</label></th>
        <td><input class="input-text" id="subwayroute" name="subwayroute" type="text" value="<?php echo ($info['subwayroute']); ?>"><span class="Validform_checktip "></span></td>
    </tr>
    <tr>
        <th width="100"><label class="label">行车路线</label></th>
        <td><input class="input-text" id="drivingroute" name="drivingroute" type="text" value="<?php echo ($info['drivingroute']); ?>"><span class="Validform_checktip "></span></td>
    </tr><?php endif; ?>
    <tr>
        <th><strong>广告描述</strong></th>
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
    <td class="y-bg"><input value="<?php echo ((isset($info['url']) && ($info['url'] !== ""))?($info['url']):'http://'); ?>" size="30" id="url" name="url" class="input-text" type="text"></td>
    <td rowspan="2" class="upload-row">
     <input name="image" value="<?php echo ($info['image']); ?>" id="image" size="35" type="hidden" class="input-text">
    <a href="javascript:void(0);" class="buttonup"><img id="imgurl" src="<?php echo thumb($info['image']);?>" height="88" width="105"></a></td>
  </tr>
  <tr>
    <th>文字提示</th>
    <td class="y-bg"><input size="30" id="alt" name="alt" value="<?php echo ($info['alt']); ?>" class="input-text" type="text"></td>
  </tr>
  </tbody>
</table>
</fieldset></div>


<input type="hidden" name="id" value="<?php echo ((isset($info['id']) && ($info['id'] !== ""))?($info['id']):''); ?>">
<input type="hidden" name="catid" value="<?php echo ($catid); ?>">
<input class="button" value=" 保存并提交 " id="dosubmit" name="dosubmit" type="submit">&nbsp;
<input  class="button input_out" value=" 取消 " type="reset">

</form>
</div>
<script>
$(function(){
    $(".upload-row").each(function(i){
      $(this).find(".buttonup").click(function(){
        window.open('<?php echo U('Tool/uploadImage', '', '');?>&id='+ i + '&imgurl=imgurl', '文件上传', 'height=100, width=400, top='+(screen.availHeight-100)/2+', left='+(screen.availWidth-400)/2+', toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no');
        })
    })
    //表单验证
     $(".myform").Validform({
      tiptype:1
      });
});

</script>
<script type="text/javascript">
var start = {
  elem: '#startdate',
  format: 'YYYY-MM-DD hh:mm:ss',
  min: '1900-01-01', //设定最小日期为当前日期
  max: '2099-06-16', //最大日期
  istime: true,
  istoday: false,
  choose: function(datas){
       end.min = datas; //开始日选好后，重置结束日的最小日期
       end.start = datas //将结束日的初始值设定为开始日
  }
};

var end = {
  elem: '#enddate',
  format: 'YYYY-MM-DD hh:mm:ss',
  min: '1900-01-01',
  max: '2099-06-16',
  istime: true,
  istoday: false,
  choose: function(datas){
      start.max = datas; //结束日选好后，充值开始日的最大日期
  }
};
laydate(start);
laydate(end);
</script>
</body>
</html>