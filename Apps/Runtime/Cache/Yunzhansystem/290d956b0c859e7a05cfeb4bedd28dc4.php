<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文件上传</title>
</head>
<body>
<div style="margin:30px;">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo ($id); ?>" />
        <input type="hidden" name="imgurl" value="<?php echo ($imgurl); ?>" />
        <input type="file" name="img" id="img" />
        <input type="submit" name="submit" value="提交" />
    </form>
</div>
</body>
</html>