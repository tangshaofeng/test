<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/style.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/laydate.css" rel="stylesheet"/>
<script src="/Public/Yunzhansystem/js/jquery.min.js" type="text/javascript" language="javascript"></script>
<script src="/Public/Yunzhansystem/js/admin_common.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="/Public/Yunzhansystem/js/laydate.js"></script>
</head>
<body>
<div class="pad-10">
<div class="search_style">
      <!--<div class="position l_f">文章管理 / <span>文章列表</span></div>-->
      <form name="searchform" action="<?php echo U('Yunzhansystem/Article/index');?>" method="post">
      <ul class="search_content clearfix">
       <li><label class="l_f"> 信息标题 </label><input type="text" style=" width:250px;margin-left:10px;" placeholder="输入信息标题" class="text_add" name="q"></li>
       <li><label class="l_f"> 发布时间 </label><input style=" margin-left:10px;" id="start_time" name="start_time" class="inline laydate-icon" readonly="readonly"> - <input style=" margin-left:10px;" id="end_time" name="end_time" class="inline laydate-icon" readonly="readonly"></li>
       <li style="width:90px;"><button class="btn_search" type="button" onclick="searchform.action='<?php echo U('Yunzhansystem/Article/index');?>';searchform.submit();"><i class="icon-search"></i>查 询</button></li>
      </ul>
      </form>
      <script type="text/javascript">
          var start = {
              elem: '#start_time',
              format: 'YYYY-MM-DD',
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
              elem: '#end_time',
              format: 'YYYY-MM-DD',
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
</div>

<form name="myform" id="myform" action="" method="post">
<div class="quick_btn clearfix">
<div class="pad-20">
       <span class="l_f">
       <label for="check_box">全选/取消</label>
        <a class="btn-warning " title="排序" href="javascript:void(0);" onclick="myform.action='<?php echo U('Yunzhansystem/Article/more_del?status=1');?>';myform.submit();">排序</a>
        <a class="btn-danger" title="批量删除" href="javascript:void(0)" onclick="myform.action='<?php echo U('Yunzhansystem/Article/more_del?status=2');?>';myform.submit();">批量删除</a>
        
        <a class="btn-info " title="推荐" href="javascript:void(0);" onclick="myform.action='<?php echo U('Yunzhansystem/Article/more_del?status=3');?>';myform.submit();">推荐</a>
        <a class="btn-success " title="取消推荐" href="javascript:void(0);" onclick="myform.action='<?php echo U('Yunzhansystem/Article/more_del?status=4');?>';myform.submit();">取消推荐</a>
        <a class="btn-warning " title="添加信息" href="<?php echo U('Yunzhansystem/Article/add');?>" >添加信息</a>
       </span>
       <span class="r_f">共：<b> <?php echo ($M_count); ?> </b> 条信息</span>
</div>
</div>

<div class="table-list">
<div class="main_head">
<h6>
<div class="fl">当前筛选分类：<?php echo ($catename); ?></div>
<div class="fr">
</div>
</h6>
</div>

<table width="100%">
<thead>
<tr>
    <th width="26" align="center"><input type="checkbox" value="" id="check_box" onclick="selectall('id[]');"></th>
    <th width="47" align="center">排序</th>
    <th width="100" align="center">ID</th>
    <th>标题</th>
    <th width="100">分类</th>
    <th width="80">审核</th>
    <th width="118">更新时间</th>
    <th width="100">管理操作</th>
</tr>
</thead>
<tbody>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
        <td width="26" align="center"><input type="checkbox" class="inputcheckbox " name="id[]" id="id[]" value="<?php echo ($val['id']); ?>"></td>
        <td width="47" align="center"><input type="text" name="listorders[<?php echo ($val['id']); ?>]" size="3" value="<?php echo ($val['sort']); ?>" class="input-text-c input-text"></td>
        <td width="100" align="center"><?php echo ($val['id']); ?></td>
        <td>
        <a href="<?php echo U('Yunzhansystem/Article/edit?id='.$val['id']);?>"><span><?php echo ($val['title']); ?></span></a>
        
        <?php if($val['is_recom'] == 1): ?>&nbsp;&nbsp;<span class="red">[推荐]</span><?php endif; ?>
        <?php if($val['is_hot'] == 1): ?>&nbsp;&nbsp;<span class="green">[热门]</span><?php endif; ?>
        <?php if($val['thumb'] != ''): ?>&nbsp;&nbsp;<span class="blue">[图]</span><?php endif; ?>
        </td>
        <td width="100" align="center"><a href="<?php echo U('Yunzhansystem/Article/index?catid='.$val['catid']);?>"><?php echo ($category[$val['catid']]['title']); ?></a></td>
        <td width="80" align="center"><?php if($val['status'] == 1): ?>已审核<?php else: ?><span class="red">未审核</span><?php endif; ?></td>
        <td width="118" align="center"><?php echo date('Y-m-d h:i',$val['create_time']);?></td>
        <td width="100" align="center">
        <!--<a href="<?php echo U('Home/index/view?id='.$val['id'].'&catid='.$val['catid']);?>" target="_blank">预览</a>-->

        <a href="<?php echo U('Yunzhansystem/Article/edit?id='.$val['id']);?>">修改</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
             </tbody>
     </table>
<div id="pages"><?php echo ($page); ?></div>
<div style="clear:both;"></div>     
</div>
</form>

</div>
</body>
</html>