<?php
namespace Yunzhansystem\Controller;
use Think\Controller;
class CategoryController extends Controller {


     /* 初始化 */
    public function _initialize () {
        check_login();
        $this->CategoryModel=D('category');
        $this->PagesModel=D('pages');
        $this->ArticleModel=D('article');
        $this->cateType=array('Pages'=>'系统单页','News'=>'新闻中心','Support'=>'客户支持','Product'=>'产品中心','Solution'=>'解决方案','Service'=>'服务中心');
        $this->lists_tpl=array();
        $this->session_system_level = session('system_level');
        $arg['session_system_level'] = $this->session_system_level;
    }


    public function index(){
        
        $list=$this->CategoryModel->formatTree();
        foreach ($list as $key=>$val){
            $list[$key]['type']=$this->cateType[$val['type']];
            if ($val['display']==0){
              $list[$key]['display']='<font class="red">否</font>';
            }else{
               $list[$key]['display']='是';
            }
            if ($val['nav_display']==0){
              $list[$key]['nav_display']='<font class="red">否</font>';
            }else{
               $list[$key]['nav_display']='是';
            }
           
        }
        $this->assign('M_count',M_total_count('Category'));
        $this->assign('list',$list);
        $this->assign('cateType',$this->cateType);
        $this->display();
    }


    public function add(){
        $catid=I('catid');
        $list=$this->CategoryModel->select();
        $datas=array();
        if (IS_POST){
            $type=I('post.type');$lists_tpl=I('post.lists_tpl');$view_tpl=I('post.view_tpl');
            if ($this->CategoryModel->create()) {
                $inser_id = $data =$this->CategoryModel->add();
                if (false !== $data ) {
                  
                  if ($type=="Pages"){
                   $datas['title']=I('post.title');
                   $datas['catid']=$inser_id;
                   $this->PagesModel->add($datas);
                  }
                  $this->success('数据添加成功！',U('Yunzhansystem/Category/index'));
                  exit;
                } else {
                  $this->error('数据添加失败！');
                }
            } else {
            // 字段验证错误
            $this->error($this->CategoryModel->getError());
            }
        }
        
        /*分类信息*/
        $info=$this->CategoryModel->find($catid);
        $this->assign('catid',$catid);
        $this->assign('catename',$info['title']);
        $this->assign('cateType',$this->cateType);
        $this->assign('view_tpl',$this->view_tpl);
        $this->assign('formatTree',$this->CategoryModel->formatTree());
        $this->display('edit');
    }


    public function edit(){
        $list=$this->CategoryModel->select();
        if (IS_POST) {
            $id=I('post.id');$type=I('post.type');$lists_tpl=I('post.lists_tpl');$view_tpl=I('post.view_tpl');
            if ($this->CategoryModel->create()) {
                if (false !== $this->CategoryModel->save()) {
                  //查询单页数据是否存在，如果不存在则新添加
                  $about=$this->PagesModel->where('catid='.$id)->find();
                  if (!$about){
                    if ($type=="Pages"){
                       $datas['title']=I('post.title');
                       $datas['catid']=$id;
                       $this->PagesModel->add($datas);
                    }
                  }else{
                       $datas['title']=I('post.title');
                       $datas['catid']=$id;
                       $this->PagesModel->where('catid='.$id)->save($datas);
                  }

                  $this->success('数据修改成功！',U('Yunzhansystem/Category/index'));
                  exit;
                } else {
                  $this->error('数据修改失败！');
                }
            } else {
            // 字段验证错误
            //$this->error($Form->getError());
            $this->error('数据修改失败');
            }
        }
        
        $id=I('get.id');
        $info=$this->CategoryModel->find($id);
        if (empty($info)){$this->error('数据未找到！');exit;}
        $this->assign('info',$info);
        $this->assign('cateType',$this->cateType);
        $this->assign('view_tpl',$this->view_tpl);
        $this->assign('formatTree',$this->CategoryModel->formatTree());
        $this->display();
    }





    public function more_del()
    {

        $status=I('get.status');
        $id=I('post.id');
        $sort=I('post.sort');
        if (empty($status)){$this->error('非法操作！');}
        if($status==2){
           if (empty($id)){$this->error('请选择操作对象！');}
        }
        //删除操作
        if ($status==2)
        {
           foreach ($id as $val)
           {
             //查询该分类的模型,后同步删除
             $model=$this->CategoryModel->where('id='.$val)->find();
             if ($model['type']=="Pages"){
                 $this->PagesModel->where('catid='.$val)->delete();
             }
             else
             {
                 $this->ArticleModel->where('catid='.$val)->delete();
             }
             $return=$this->CategoryModel->where('id='.$val)->delete();
           }
        }
        //排序操作
        if($status==1)
        {
            foreach ($sort as $key=>$val)
           {
             $data=array();
             $data['sort']=$val;
             $return=$this->CategoryModel->where('id='.$key)->save($data);
           }
        }

        $this->success('数据操作成功！',U('Yunzhansystem/Category/index'));
        
    }


}