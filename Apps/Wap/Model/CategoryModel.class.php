<?php
namespace Wap\Model;
use Think\Model;
class CategoryModel extends Model {

    protected $order = 'sort asc, id asc'; //统一排序

    /* 获取所有栏目 */
    public function getAll() {

    $categorys = $this->where('1=1')->order($this->order)->select();
    foreach ($categorys as $key => $val) {
        $data[$val['id']] = $val;
            if ($val['is_jump'] == 1){
                $data[$val['id']]['url'] = $val['jump_url'];
            }else{
                $data[$val['id']]['url'] = U('index', array('catid'=>$val['id']));
            }
    }
    return $data;
    }


}
