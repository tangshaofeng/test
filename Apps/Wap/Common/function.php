<?php


/**
 * 获取图片
 * @param
 * @return  string
 */
function thumb($img = '', $width = 0, $height = 0) {
    if (empty($img)) {
        return __ROOT__ . '/default.jpg';
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
    return __ROOT__ . '/default.jpg';
}

/**
 * 获取内容信息
 * @param   string       $content  内容
 * @return  string
 */
function get_content($content = ''){
    if ($content) {
        //return preg_replace('/src="(.*?)"/', 'src="'.__ROOT__.'$1"', html_entity_decode($content));
        return html_entity_decode($content);
    } else {
        return '';
    }
}

/**
 * 获取单页内容
 * @param  int  $catid
 * @return  string
 */
function get_page($catid = 0){
    if ($catid) {
        return M('Pages')->where(array('catid'=>$catid))->getField('content');
    } else {
        return '';
    }
}


function get_childs($catid){
	$cates = get_category($catid);
	if ($cates) {
		$str = '';
		foreach($cates as $key => $val){
			$str .= $val['id'] . ',';
			//$str .= get_childs($key);
		}
        $str .= $catid . ',';
		return $str;
	} else {
        $str = $catid . ',';
		return $str;
	}
}

/**
 * 获取父级栏目
 * @param   int       $catid  栏目catid
 * @return  array
 */
function get_category($catid = 0, $num = 0) {
    $data = array();
    $array = D('Category')->where(array('pid'=>$catid,'display'=>1))->select();
    foreach ($array as $key=>$val) {
        $data[$key] = $val;
        $data[$key]['url']=U('index',array('catid'=>$val['id']));
    }
    return $data;
}

/**
 * 获取广告位
 * @param   int         $id   广告位id
 * @param   int/string  $limit   数量
 * @return  array
 */
function get_ads($catid = 0, $limit = 0){
    if (empty($catid)) {
        return array();
    } else {
        $model = D('Ads');
        $map = array();
        $map['catid'] = $catid;
        $map['startdate']=array('ELT',time());
        $map['enddate']=array('EGT',time());
        
        if (empty($limit)) {
            $limit = '';
        }
        $lists = $model->where($map)->order('sort desc, id asc')->limit($limit)->select();
        if ($lists) {
            return $lists;
        } else {
            return array();
        }
    }
}

/**
 * 获取广告位
 * @return  array
 */
function get_position($field = 'position_1', $type = 'News', $catid = 0, $limit = 0){
    $model = M('News');
    $map = array(
        'type' => $type,
        'status' => 1,
        $field => 1,
    );
    if ($catid) {
        $map['catid'] = $catid;
    }
    if (empty($limit)) {
        $limit = '';
    }
    $lists = $model->cache(true, 60)->where($map)->order('sort desc, id desc')->limit($limit)->select();
    if ($lists) {
        foreach ($lists as $k=> $v) {
            $lists[$k]['url'] = U('show', array('catid'=>$v['catid'],'id'=>$v['id']));
        }
        return $lists;
    } else {
        return array();
    }
}

/**
 * 获取列表
 * @return  array
 */
function get_lists($Model = '',$where = array(),$field = '', $limit = ''){

    if ($Model == 'Article'){
        $where['status'] = 1;
        $sort = 'sort asc,create_time asc,id desc';
    }else{
        $sort = 'sort asc,id desc';
    }
    $MModel = M($Model);
    $lists = $MModel->where($where)->field($field)->order($sort)->limit($limit)->select();
    if ($Model == 'Article' || $Model == 'Service' || $Model == 'Case'){
        foreach ($lists as $key=>$val){
            $lists[$key]['url'] = U('view',array('catid'=>$val['catid'],'id'=>$val['id']));
        }
    }
    return $lists;
    
}

/**
 * 当前路径
 * 返回指定栏目路径层级
 * @param $catid 栏目id
 * @param $ext 栏目间隔符
 */
function catpos($catid = 0, $ext = ' &gt; ',$index=1) {
    $categorys = D('Category')->getAll();
    $html = '';
    if ($catid == 0) {
        $html = '<a href="'. U('Index/index') .'">首页</a>' . $html;
        return $html;
    } else {
        if($index==1){
            $html = $ext . '<span>' . $categorys[$catid]['title'] . '</span>' . $html;
        }else{
            $html = $ext . '<a href="' . $categorys[$catid]['url'] . '">' . $categorys[$catid]['title'] . '</a>' . $html;
        }
        $index++;
        $html = catpos($categorys[$catid]['pid'], $ext,$index) . $html;
    }
    return $html;
}

/*定时清理统计数据*/
function clear_stats(){
    $time = time();
    $lastmoth_time = date("Y-m-d",strtotime("-1 month - day"));
    M('stats')->where('access_time < '.$lastmoth_time)->delete();
}


/*获取网站导航栏目*/
function get_Navigation($catid = 0){
    $nav_list = M('Category')->where(array('pid'=>0,'display'=>1,'nav_display'=>1))->select();
    foreach ($nav_list as $key=>$val){
        $nav_list[$key] = $val;
        $nav_list[$key]['url'] = U('Wap/'.$val['type'].'/index/catid/'.$val['id']);
        if ($catid == $val['id']){
            $nav_list[$key]['active'] = 1;
        }else{
            $nav_list[$key]['active'] = 0;
        }
      }
    return $nav_list;
}


/**
 * 获取下级栏目
 * @param   int       $catid  栏目catid
 * @return  array
 */
function category_tree($catid = 0) {
    $data = array();
    $array = D('Category')->where(array('pid'=>$catid,'display'=>1))->select();
    if(!empty($array)){
        foreach ($array as $key=>$val) {
            $data[$key] = $val;
            $data[$key]['url']=U('index',array('catid'=>$val['id']));
        }
    }else{
        $smalltree=D('Category')->where('id='.$catid)->find();
        $data[0]=D('Category')->find($catid);
    }
    return $data;
}

/**
 * 获取下级栏目
 * @param   int       $catid  栏目catid
 * @return  array
 */
function category_tree2($catid = 0) {
    $data = array();
    $array1 = D('Category')->where(array('pid'=>0))->select();
    $array = D('Category')->where(array('pid'=>$catid,'display'=>1))->select();
        foreach ($array as $key=>$val) {
            $data[$key] = $val;
            $data[$key]['url']=U('view',array('catid'=>$val['id']));
        }
    return $data;
}