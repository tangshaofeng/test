<?php
namespace Home\Common;
class IController extends \Think\Controller {

    public function _initialize () {

    // 执行类初始化方法最好不要用__construct
    if(is_mobile()){ //跳转至wap分组 
        $this->redirect('/Wap/Index');
        exit;
    }
    clear_stats();
    $this->_init();
    }

    protected function _init() {
       
        
    }

    /**
     * 通用分页列表数据集获取方法
     *  可以通过url参数传递where条件,例如:  index.html?name=asdfasdfasdfddds
     *  可以通过url空值排序字段和方式,例如: index.html?_field=id&_order=asc
     *  可以通过url参数r指定每页数据条数,例如: index.html?r=5
     * @param sting|Model  $model   模型名或模型实例
     * @param array        $where   where查询条件(优先级: $where>$_REQUEST>模型设定)
     * @param array|string $order   排序条件,传入null时使用sql默认排序或模型属性(优先级最高);
     *                              请求参数中如果指定了_order和_field则据此排序(优先级第二);
     *                              否则使用$order参数(如果$order参数,且模型也没有设定过order,则取主键降序);
     * @param boolean      $field   单表模型用不到该参数,要用在多表join时为field()方法指定参数
     * @return array|false
     * 返回数据集
     */
    protected function getAll($model, $where = array(), $order = '', $page_num = 0){
        $options    =   array();
        $param    =   (array)I('get.');
        if(is_string($model)){
            $model  =   M($model);
        }
        $OPT        =   new \ReflectionProperty($model,'options');
        $OPT->setAccessible(true);
        $pk         =   $model->getPk();
        if($order===null){
            //order置空
        }else if ( isset($param['_order']) && isset($param['_field']) && in_array(strtolower($param['_order']),array('desc','asc')) ) {
            $options['order'] = '`'.$param['_field'].'` '.$param['_order'];
        }elseif( $order==='' && empty($options['order']) && !empty($pk) ){
            $options['order'] = $pk.' desc';
        }elseif($order){
            $options['order'] = $order;
        }
        unset($param['_order'],$param['_field']);
        if(empty($where)){
            $where  =   array('status'=>array('egt',0));
        }
        if( !empty($where)){
            $options['where']   =   $where;
        }
        $options      =   array_merge( (array)$OPT->getValue($model), $options );
        $total        =   $model->where($options['where'])->count();
        if( isset($param['r']) ){
            $listRows = (int)$param['r'];
        }else{
            if (empty($page_num)) {
                $listRows = C('SHOW_LIST_ROWS') > 0 ? C('SHOW_LIST_ROWS') : 10;
            } else {
                $listRows = $page_num;
            }

        }
        $page = new \Think\Page($total, $listRows, $param);
        if($total>$listRows){
            $page->setConfig('theme',' %UP_PAGE% %FIRST% %LINK_PAGE% %END% %DOWN_PAGE%  %HEADER% ');
            $page->rollPage = 7;
            $page->setConfig('prev', '上一页');
            $page->setConfig('next', '下一页');
            $page->setConfig('first', '首页');
            $page->setConfig('last', '末页');
            $page->setConfig('header', '<strong>共'.$total.'条</strong>');
        }
        $p =$page->show();
        $this->assign('_page', $p? $p: '');
        $this->assign('_total',$total);
        $options['limit'] = $page->firstRow.','.$page->listRows;

        $model->setProperty('options',$options);

        return $model->field($field)->select();
    }


}
