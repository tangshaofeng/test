<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<link rel="stylesheet" href="/Public/Yunzhansystem/css/system.css">
<link href="/Public/Yunzhansystem/css/table_form.css" rel="stylesheet"/>
<link href="/Public/Yunzhansystem/css/reset.css" rel="stylesheet"/>
<script src="/Public/Yunzhansystem/js/jquery.min.js" type="text/javascript" language="javascript"></script>
<script src="/Public/Yunzhansystem/js/admin_common.js" type="text/javascript" language="javascript"></script>
</head>
<body>
<div class="pad-10">
<form name="myform" id="myform" action="" method="post">
<div class="table-list">
<div class="main_head">
<h6>
<div class="fl">文件列表</div>
<div class="fr">
<?php if(($flags) == "1"): ?><a href="<?php echo U('index?dir=' . base64_encode(dirname($dir_path)));?>">返回上层目录</a><?php endif; ?>
</div>
</h6>
</div>
<table width="100%">
        <thead>
            <tr>
            <th width="5%">名称</th>
            <th>名称</th>
            <th width="15%">操作</th>
            </tr>
        </thead>
<tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i; if(is_dir($val)): ?><tr>
                <td width="5%"></td>
                <td align="left"><img src="/Public/Yunzhansystem//ico/jia.ico" width="50" /> <?php echo basename($val);?></td>
                <td width="15%" align="center"><a href="<?php echo U('index?dir='. base64_encode($val));?>">打开文件夹</a></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td width="5%"></td>
                    <td align="left"><img src="/Public/Yunzhansystem//ico/<?php echo pathinfo($val, PATHINFO_EXTENSION);?>.ico" width="50" /> <?php echo basename($val);?></td>
                    <td width="15%" align="center">
                        <a href="/<?php echo ($val); ?>" target="BigImg">查看</a>  |
                        <a href="<?php echo U('delFile?dir='. base64_encode($val));?>" onclick="return confirm('文件删除后将无法恢复，确认删除此文件吗？')">删除</a>
                    </td>
                </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
             </tbody>
     </table>

</div>
</form>
</div>
</body>
</html>