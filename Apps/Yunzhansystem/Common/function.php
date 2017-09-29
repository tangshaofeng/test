<?php
/**
 * @Author: anchen
 * @Date:   2015-12-02 09:49:19
 * @Last Modified by:   xiaochenchen
 * @Last Modified time: 2017-03-28 11:43:29
 * 
 */


/**
 * 检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户ID
 */
function is_login(){
    $user = session('user_auth');
    if (empty($user)) {
        return 0;
    } else {
        return $user['uid'];
    }
}

/*获取用户名*/
function get_username(){
    $user = session('user_auth');
    if (empty($user)) {
        return 0;
    } else {
        return $user['username'];
    }
}

/*获取会员信息*/
function get_member($uid,$map=array(),$result=''){
   $member = D('Member')->where($map)->field($result)->find();
   return $member[$result];
}

 /**
  * 检测输入的验证码是否正确
  * @param  string  $code 为用户输入的验证码字符串
  * @return bool
  */
 function check_verify($code, $id = ''){
     $verify = new \Think\Verify();
     return $verify->check($code, $id);
 }

  /*检测是否已登录*/
  function check_login()
  {
      if(!defined('UID')) {
      define('UID', is_login());
      }
      // 还没登录 跳转到登录页面
      if(!UID ){
      header('location:/index.php?m=Yunzhansystem&c=Public&a=login');
      //$this->redirect('Public/login');
      }
  }
  
  /*统计栏目下文章数量*/
  function total_count($type='',$catid=0)
  {
    if ($type=="单页"){
       $count=D('Pages')->where('catid='.$catid)->count();
    }
    if ($type=="新闻" || $type=="产品"){
       $count=D('Article')->where('catid='.$catid)->count();
    }
    if ($type=="版位"){
       $count=D('Ads')->where('catid='.$catid)->count();
    }
    
    return $count;

  }


    /*统计模块下信息总数*/
  function M_total_count($model='Article',$where='')
  {
    $count=D($model)->where($where)->count();
    return $count;
  }

  //获取分类名称 
  function get_row($type='',$catid=0,$returnchar='')
  {
    if ($type=="栏目"){
       $return=D('Category')->where('id='.$catid)->find();
    }

    if ($type=="版位"){
       $return=D('Adstype')->where('id='.$catid)->find();
    }

    if ($type=="友链"){
       $return=D('Linkstype')->where('id='.$catid)->find();
    }

    if ($type=="地区"){
       $return=D('Area')->where('id='.$catid)->find();
    }

    return $return[$returnchar];

  }



  /**
 * 删除目录和文件
 */
function delete_dir($path = '') {
    if(is_dir($path)) {
        $file_list= scandir($path);
        foreach ($file_list as $file) {
            if( $file!='.' && $file!='..') {
                delete_dir($path.'/'.$file);
            }
        }
        rmdir($path);
    } else {
        unlink($path);
    }
}

/*跳转地址*/
function gohref($action,$href=''){
  if ($action == '-1'){
    echo '<script>history.go(-1);</script>';
  }else{
    echo '<script>window.location.href="'.$href.'"</script>';
  }
}


function menu_tree($pid=0){
  $list= M('Menu')->where('pid='.$pid.' and display=1')->order('sort asc,id desc')->select();
  return $list;
}


/**
 * 获取图片
 * @param
 * @return  string
 */
function thumb($img = '', $width = 0, $height = 0) {
    if (empty($img)) {
        return __ROOT__ . '/Uploads/nopic_small.gif';
    }
    $Uploads = '/Uploads/';
    $file = '.' . $Uploads . $img;
    if (file_exists($file)) {
        if (empty($width)) {
            return __ROOT__ . substr($file, 1);
        } else {
            $pathinfo = pathinfo($file);
            $thumb_file = $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '_' . $width . '-' . $height . '.' . $pathinfo['extension'];
            if (file_exists($thumb_file)) {
                return __ROOT__ . substr($thumb_file, 1);
            } else {
                $image = new \Think\Image();
                $image->open($file);
                if (empty($height)) {
                    $height = $image->height();
                }
                $image->thumb($width, $height,\Think\Image::IMAGE_THUMB_CENTER)->save($thumb_file);
                return __ROOT__ . substr($thumb_file, 1);
            }
        }
    }
    return __ROOT__ . '/Uploads/nopic_small.gif';
}

/* 分类格式化操作操作 */
function Format_Tree ($lists = array(), $level = 0 , $ext = '└', &$formatStr=array()) {
    if (empty($lists)) {return array();}
    $str = str_repeat('&nbsp', $level * 4);
    foreach ($lists as $key => $val) {
        $val['title'] = $str . $ext . $val['title'];
        if(array_key_exists('child', $val)){
            $child = $val['child'];
            unset($val['child']);
            array_push($formatStr, $val);
            Format_Tree($child, $level+1,'└',$formatStr);
        } else {
            array_push($formatStr, $val);
        }
    }
    return $formatStr;
}
