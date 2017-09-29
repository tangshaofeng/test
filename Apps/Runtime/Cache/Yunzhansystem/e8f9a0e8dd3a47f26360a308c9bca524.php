<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link rel="stylesheet" href="/Public/Yunzhansystem/css/style.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/style.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/jquery.selectlist.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/laydate.css" rel="stylesheet"/>
<script src="/Public/Yunzhansystem/js/jquery-1.9.1.min.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/Validform_v5.3.2.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/Common/ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="/Public/Yunzhansystem/js/jquery.selectlist.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="/Public/Yunzhansystem/js/laydate.js"></script>
<script type="text/javascript" src="/Public/Yunzhansystem/js/admin_common.js"></script>
</head>
<body>
<div class="pad-10">
<div class="col-tab">
<ul class="tabBut cu-li">
<li onclick="SwapTab('setting','on','',3,1);" class="on" id="tab_setting_1">基本选项</li>
<li onclick="SwapTab('setting','on','',3,2);" id="tab_setting_2">详细信息</li>
<li onclick="SwapTab('setting','on','',3,3);" id="tab_setting_3">SEO 设置</li>

</ul>

<form class="myform" name="myform" id="myform" action="" method="post" enctype="multipart/form-data">
<div class="contentList" id="div_setting_1">
<table width="100%" cellspacing="0" class="table_form">
    <tbody> 
    <tr>
      <th width="80"> <font color="red">*</font> 栏目   </th>
      <td>
      <select name="catid" id="catid" datatype="*" errormsg="请选择信息栏目！" nullmsg="请选择信息栏目！">
      <option value="">请选择栏目</option>
      <?php if(is_array($formatTree)): $i = 0; $__LIST__ = $formatTree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v['id']); ?>" <?php if(($v['id']) == $info['catid']): ?>selected="selected"<?php endif; ?>><?php echo ($v['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
      </td>
    </tr>
    <tr>
      <th width="80"> <font color="red">*</font> <label class="label">标题</label>      </th>
      <td><input type="text" style="width:400px;" name="title" id="title" value="<?php echo ($info['title']); ?>" class="input-text" datatype="*2-100" errormsg="标题至少2个字符,最多100个字符！" nullmsg="请填写信息标题！">
          <input type="text" style="width:50px;" name="sort" id="sort" value="<?php echo ((isset($info['sort']) && ($info['sort'] !== ""))?($info['sort']):'0'); ?>" class="input-text">
          <span class="Validform_checktip "></span></td>
    </tr>
    <tr>
      <th width="80">缩略图</th>
      <td class="upload-row" style="position:relative;"><input type="text" readonly="readonly" name="thumb" value="<?php echo ($info['thumb']); ?>" style="width: 300px;" class="input-text"> <input class="button buttonup" value="浏览" name="dosubmit" type="button">
      <?php if($info['thumb'] != '' ): ?><a href="javascript:void(0);" style="margin-left:10px;" class="imgck"><img src="/Public/Yunzhansystem/images/picture4.png" alt="" width="40" title="查看图片" alt="查看图片"></a>
      <div class="picture">
        <div style="position:relative;"><span><a href="javascript:void(0);" class="imgnck">×</a></span><img src="Uploads/<?php echo ($info['thumb']); ?>" alt=""></div>
      </div><?php endif; ?>
      </td>
    </tr>
    <tr>
      <th width="80">摘要</th>
      <td><textarea maxlength="300" name="description" id="description" style="width:98%;height:100px;"><?php echo ($info['description']); ?></textarea><br/>摘要长度为<b><span id="description_len">1-200</span></b> 个任意字符<span class="Validform_checktip "></span> </td>
    </tr>
   
     <tr>
      <th width="80"> 发布时间    </th>
      <td>
      <input type="text" readonly="" id="create_time" name="create_time" value="<?php echo ((isset($info['create_time']) && ($info['create_time'] !== ""))?($info['create_time']):date('Y-m-d h:i:s',time())); ?>" style="width: 280px;" class="input-text laydate-icon">
      </td>
    </tr>
    </tbody></table>
    </div>
    <div class="contentList hidden" id="div_setting_2">
    <table width="100%" cellspacing="0" class="table_form">
    <tbody> 
     <tr>
      <th width="80"> <font color="red">*</font> 内容</th>
      <td><script id="container" name="content" type="text/plain"><?php echo (html_entity_decode((isset($info['content']) && ($info['content'] !== ""))?($info['content']):'')); ?></script></td>
    </tr>
    </tbody>
    </table>
    </div>

    <div class="contentList hidden" id="div_setting_3">
    <table width="100%" cellspacing="0" class="table_form">
    <tbody> 
    <tr>
      <th width="200"><strong>META Keywords（栏目关键词）</strong><br>关键字中间用半角逗号隔开</th>
      <td><input type="text" name="seo_keyword" id="seo_keyword" value="<?php echo ($info['seo_keyword']); ?>" style="width:280px" class="input-text"></td>
    </tr>
    <tr>
      <th width="200"><strong>META Description（栏目描述）</strong><br>针对搜索引擎设置的网页描述</th>
      <td><textarea maxlength="200" name="seo_desc" id="seo_desc" style="width:98%;height:50px;"><?php echo ($info['seo_desc']); ?></textarea><span class="Validform_checktip "></span> </td>
    </tr>
    </tbody>
    </table>
    </div>
     <div class="bk15"></div>
     <input type="hidden" name="id" value="<?php echo ((isset($info['id']) && ($info['id'] !== ""))?($info['id']):''); ?>">
    <input class="submit" value="保存并提交" name="dosubmit" type="submit">
    <input class="button input_out" value="取消" name="dosubmit" type="reset">
      </form>
   </div>
</div>
<script>
    var ue = UE.getEditor('container',{
    initialFrameWidth : 1000,
    initialFrameHeight : 450
    });
    var ue1 = UE.getEditor('container1',{
    initialFrameWidth : 1000,
    initialFrameHeight : 450
    });
    var ue2 = UE.getEditor('container2',{
    initialFrameWidth : 1000,
    initialFrameHeight : 450
    });
    var ue3 = UE.getEditor('container3',{
    initialFrameWidth : 1000,
    initialFrameHeight : 450
    });
    var ue4 = UE.getEditor('container4',{
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
           var html = '<div class="upload-row" style="margin-bottom:5px;">';
            html += '<span onclick="Tool.uploadDel(this)">[-]</span>  ';
            html += '<input type="text" name="images[]" value="" readonly="readonly" class="input-text" style="width: 300px;">';
            html += '<input type="button" class="button buttonup" value="浏览">';
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
          tiptype:3
          });

        $('select').selectlist({
          zIndex: 10,
          width: 300,
          height: 40
        }); 
    })
</script>
<script>
    window.top.$('#display_center_id').css('display','none');
    function SwapTab(name,cls_show,cls_hide,cnt,cur){
        for(i=1;i<=cnt;i++){
            if(i==cur){
                 $('#div_'+name+'_'+i).show();
                 $('#tab_'+name+'_'+i).attr('class',cls_show);
            }else{
                 $('#div_'+name+'_'+i).hide();
                 $('#tab_'+name+'_'+i).attr('class',cls_hide);
            }
        }
    }

</script>
 <script type="text/javascript">
          var create_time = {
              elem: '#create_time',
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
          laydate(create_time);
</script>
</body>
</html>