<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/style.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/jquery.selectlist.css" rel="stylesheet"/>
<script src="/Public/Yunzhansystem/js/jquery-1.9.1.min.js" type="text/javascript" language="javascript"></script>
<script src="/Public/Yunzhansystem/js/admin_common.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Yunzhansystem/js/Validform_v5.3.2.js"></script>
<script src="/Public/Yunzhansystem/js/jquery.selectlist.js" type="text/javascript" language="javascript"></script>
</head>
<body>
<form method="post" action="" id="myform" name="myform" class="myform">
<div class="pad-10" style="overflow:visible;">
<div class="col-tab">
<ul class="tabBut cu-li">
<li onclick="SwapTab('setting','on','',6,1);" class="on" id="tab_setting_1">基本选项</li>
<li onclick="SwapTab('setting','on','',6,2);" id="tab_setting_2">SEO 设置</li>
<li onclick="SwapTab('setting','on','',6,3);" id="tab_setting_3">模板设置</li>

</ul>
<div class="contentList" id="div_setting_1">

<table class="table_form " width="100%">
 <tbody>
 <tr>
        <th width="200"><label class="label">模型</label></th>
        <td>
        <select id="modelid" name="type" datatype="*" errormsg="请选择模型！" nullmsg="请选择模型！">
        <option value=" ">请选择模型</option>
        <?php if(is_array($cateType)): $i = 0; $__LIST__ = $cateType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option <?php if($info['type'] == $key): ?>selected="selected"<?php endif; ?> value="<?php echo ($key); ?>" ><?php echo ($val); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select> 
        <span class="Validform_checktip "></span>
         </td>
      </tr>
      <tr>
        <th width="200">上级栏目</th>
        <td>
        <select id="parentid" name="pid" datatype="*" errormsg="请选择上级栏目！" nullmsg="请选择上级栏目！">
        <?php if($catid == ''): ?><option value="0">≡ 作为一级栏目 ≡</option>
        <?php if(is_array($formatTree)): $i = 0; $__LIST__ = $formatTree;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v['id']); ?>" <?php if(($v['id']) == $info['pid']): ?>selected="selected"<?php endif; ?>><?php echo ($v['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php else: ?>
        <option value="<?php echo ($catid); ?>"><?php echo ($catename); ?></option><?php endif; ?>
        </select>     
        <span class="Validform_checktip"></span></td>
      </tr>
     
      <tr>
        <th><label class="label">栏目名称</label></th>
        <td>
        <div id="normal_add" style="float:left;"><input value="<?php echo ($info['title']); ?>" datatype="s1-20" errormsg="栏目名称至少1个字符,最多20个字符！" nullmsg="请填写栏目名称！" class="input-text" id="catname" style="width:298px;" name="title" type="text"><span class="Validform_checktip "></span></div>
        <!--<div style="float:left;margin-left:10px;"><span style="margin-right:10px;">英文标题</span> <input value="<?php echo ($info['english']); ?>" id="english" name="english" type="text"></div>-->
        </td>
      </tr>
      
       <tr>
        <th>排序</th>
        <td>
        <span id="normal_add"><input value="<?php echo ((isset($info['sort']) && ($info['sort'] !== ""))?($info['sort']):'0'); ?>" class="input-text" id="sort" name="sort" type="text"><div id="catnameTip" class="onShow">数值越小越靠前</div></span>
       
        </td>
      </tr>
    <tr>
      <th width="80"> 分类幻灯图</th>
      <td class="upload-row" style="position:relative;"><input type="text" readonly="readonly" name="image" value="<?php echo ($info['image']); ?>" style="width: 312px;" class="input-text"> <input class="button buttonup" value="浏览" name="dosubmit" type="button">
      <?php if($info['image'] != '' ): ?><a href="javascript:void(0);" style="margin-left:10px;" class="imgck"><img src="/Public/Yunzhansystem/images/picture4.png" alt="" width="40" title="查看图片" alt="查看图片"></a>
      <div class="picture">
        <div style="position:relative;"><span><a href="javascript:void(0);" class="imgnck">×</a></span><img src="Uploads/<?php echo ($info['image']); ?>" alt=""></div>
      </div><?php endif; ?>
      </td>
    </tr>
    
    <tr>
        <th>描述</th>
        <td>
        <textarea style="width:95%;height:60px;" maxlength="100" name="description"><?php echo ($info['description']); ?></textarea>
        </td>
      </tr>

      <tr>
        <th>是否启用</th>
        <td>
        <select id="display" name="display">
        <option <?php if($info['display'] == 1): ?>selected="selected"<?php endif; ?> value="1">是</option>
        <option <?php if($info['display'] == 0): ?>selected="selected"<?php endif; ?> value="0">否</option>
        </select>     
        </td>
      </tr>

       <tr>
        <th>导航显示</th>
        <td>
        <select id="nav_display" name="nav_display">
        <option <?php if($info['nav_display'] == 1): ?>selected="selected"<?php endif; ?> value="1">是</option>
        <option <?php if($info['nav_display'] == 0): ?>selected="selected"<?php endif; ?> value="0">否</option>
        </select>     
        </td>
      </tr>
      
      <?php if(($session_system_level) == "1"): ?><tr>
      <th>是否允许添加下级</th>
      <td>
      <input id="is_lower" value="0" <?php if($info['is_lower'] == 0): ?>checked="checked"<?php endif; ?> name="is_lower" type="radio">不允许&nbsp;&nbsp;<input id="is_lower" value="1" <?php if($info['is_lower'] == 1): ?>checked="checked"<?php endif; ?>  name="is_lower" type="radio">允许
      </td>
      </tr>
      <tr>
      <th>是否允许添加删除</th>
      <td>
      <input id="is_delete" <?php if($info['is_delete'] == 0): ?>checked="checked"<?php endif; ?>  value="0" name="is_delete" type="radio">不允许&nbsp;&nbsp; <input id="is_delete" value="1" <?php if($info['is_delete'] == 1): ?>checked="checked"<?php endif; ?>  name="is_delete" type="radio">允许
      </td>
      </tr><?php endif; ?>

</tbody></table>

</div>


<div class="contentList hidden" id="div_setting_2">
<table class="table_form " width="100%">
    <tbody><tr>
      <th width="200"><strong>META Title（栏目标题）</strong><br>针对搜索引擎设置的标题</th>
      <td><input maxlength="60" size="60" value="<?php echo ($info['seo_title']); ?>" id="seo_title" name="seo_title" class="input-text" type="text"></td>
    </tr>
    <tr>
      <th><strong>META Keywords（栏目关键词）</strong><br>关键字中间用半角逗号隔开</th>
      <td><textarea style="width:90%;height:40px" id="seo_keyword" name="seo_keyword"><?php echo ($info['seo_keyword']); ?></textarea></td>
    </tr>
    <tr>
      <th><strong>META Description（栏目描述）</strong><br>针对搜索引擎设置的网页描述</th>
      <td><textarea style="width:90%;height:50px" id="seo_desc" name="seo_desc"><?php echo ($info['seo_desc']); ?></textarea></td>
    </tr>
</tbody></table>
</div>

<div class="contentList hidden" id="div_setting_3">
<table class="table_form " width="100%">
    <tbody><tr>
      <th width="200">列表模板</th>
      <td>
      <select id="lists_tpl"  name="lists_tpl">
        <option value="">使用默认</option>
        <?php if(is_array($lists_tpl)): $i = 0; $__LIST__ = $lists_tpl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option <?php if($info['lists_tpl'] == $val['tpl_name']): ?>selected="selected"<?php endif; ?> value="<?php echo ($val['tpl_name']); ?>" ><?php echo ($val['tpl_title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select> </td>
    </tr>
    <tr>
      <th>单页(详情)模板</th>
      <td>
      <select id="view_tpl"  name="view_tpl">
        <option value="">使用默认</option>
        <?php if(is_array($view_tpl)): $i = 0; $__LIST__ = $view_tpl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option <?php if($info['view_tpl'] == $val['tpl_name']): ?>selected="selected"<?php endif; ?> value="<?php echo ($val['tpl_name']); ?>" ><?php echo ($val['tpl_title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        </td>
    </tr>
</tbody></table>
</div>

 <div class="bk15"></div>
    <input type="hidden" name="id" value="<?php echo ((isset($info['id']) && ($info['id'] !== ""))?($info['id']):''); ?>">
    <input type="hidden" name="catid" value="<?php echo ((isset($catid) && ($catid !== ""))?($catid):0); ?>">
    <input class="button" value="保存并提交" name="dosubmit" type="submit">
    <input class="button input_out" value="取消" name="dosubmit" type="reset">


</div>

</div>
</form>
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

        $('select').selectlist({
          zIndex: 10,
          width: 300,
          height: 40
        }); 

        //表单验证
         $(".myform").Validform({
          tiptype:3
         });
    })
</script>

</body>
</html>