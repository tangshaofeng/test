<?php
namespace Yunzhansystem\Model;
use Think\Model;
class CategoryModel extends Model {

    private $_formatTree = array();

    //修改表名称
    protected $tableName = 'category';

    /* 获取所有栏目 */
    public function getAll($map = array(), $order = '', $field = true) {
        $cates = $this->where($map)->field($field)->order($order)->select();
        $datas = $tree =  array();
        foreach ($cates as $key => $val) {
            $datas[$val['id']] = $val;
        }
        
        return $datas;
    }

    /* 获取栏目tree操作 */
    public function lists ($map = array()) {
        $datas = $this->getAll($map, 'sort asc, id asc');
        foreach ($datas as $key => $val) {
            if(isset($datas[$val['pid']])){
                $datas[$val['pid']]['child'][] = &$datas[$val['id']];
            }else{
                $tree[] = &$datas[$val['id']];
            }
        }
        return $tree;
    }

    /* 获取格式化后的栏目tree操作 */
    public function formatTree ($map=array()) {
        $this->_formatTree(array(),0,'└',$map);
        return $this->_formatTree;
    }

    /* 格式化操作操作 */
    private function _formatTree ($lists = array(), $level = 0 , $ext = '└', $map =array()) {
        if (!$lists) {
            $lists = $this->lists($map);
        }
        $str = str_repeat('&nbsp', $level * 4);
        foreach ($lists as $key => $val) {
            $val['title'] = $str . $ext . $val['title'];
            $val['level'] = $level;
            if(array_key_exists('child', $val)){
                $child = $val['child'];
                $val['cat'] = 1;
                unset($val['child']);
                array_push($this->_formatTree, $val);
                $this->_formatTree($child, $level+1);
            } else {
                $val['cat'] = 0;
                array_push($this->_formatTree, $val);
            }
        }
    }



}
