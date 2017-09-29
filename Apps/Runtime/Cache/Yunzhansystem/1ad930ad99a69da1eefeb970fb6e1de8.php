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
<script type="text/javascript" charset="utf-8" src="/Public/Common/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/ueditor/lang/zh-cn/zh-cn.js"></script>
<style>
  .table_form th{color:#333333; font-weight:bold;}
</style>
</head>
<body>
<div class="pad-10">
<form class="myform" name="myform" id="myform" action="" method="post" enctype="multipart/form-data">
    <div class="col-auto col-box">
    <div class="main_head">
      <h6>
      <div class="fl">留言内容</div>
      <div class="fr">
      </div>
      </h6>
    </div>
        <div class="col-1" style="border:0px;">
            
<table width="100%" cellspacing="0" class="table_form">
    <tbody> 
    <tr>
      <th width="150">姓名/公司名称</th>
      <td><?php echo ($info['company_title']); ?></td>
    </tr>
    <tr>
      <th width="150">手机号码</th>
      <td><?php echo ($info['company_mobile']); ?></td>
    </tr>
    <!--<tr>
      <th width="150">QQ号码</th>
      <td><?php echo ($info['company_qq']); ?></td>
    </tr>-->
    <tr>
      <th width="150">留言内容</th>
      <td><?php echo ($info['company_content']); ?></td>
    </tr>
    <tr>
      <th width="150">留言时间</th>
      <td><?php echo date('Y-m-d h:i',$info['create_time']);?></td>
    </tr>
   
    </tbody></table>
               
            </div>
        </div>
     <div class="bk15"></div>

</form>
</div>
<script>
    var ue = UE.getEditor('container',{
    initialFrameWidth : 1000,
    initialFrameHeight : 450
    });
</script>
<!-- 图片上传 -->
<script type="text/javascript">
    var Tool = {};
    $(function(){
        // 上传处理
        Tool.uploadSend = function(){
            $(".upload-row").each(function(i){
                $(this).find(".buttonup").click(function(){
                    window.open('<?php echo U('Tool/uploadImage', '', '');?>&id='+ i, '文件上传', 'height=100, width=400, top='+(screen.availHeight-100)/2+', left='+(screen.availWidth-400)/2+', toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no');
                })
            })
        }
        // 绑定
        Tool.uploadSend();

        // 增加元素
        Tool.uploadAdd = function(){
            var html = '<div class="upload-row">';
            html += '<span onclick="Tool.uploadDel(this)">[-]</span>  ';
            html += '<input type="text" name="images[]" value="" readonly="readonly" class="inputt input3">  ';
            html += '<input type="button" class="button1 cr" value="上 传">';
            html += '</div>';
            $(".upload-col").append(html);
            // 绑定
            Tool.uploadSend();
        }

        // 删除元素
        Tool.uploadDel = function(obj){
            $(obj).parents('.upload-row').remove();
        }
        //表单验证
         $(".myform").Validform({
          tiptype:1
          });
    })
</script>
</body>
</html>