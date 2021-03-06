<?php
namespace Yunzhansystem\Controller;
use Think\Controller;
class ProductController extends Controller {


     /* 初始化 */
    public function _initialize () {
        check_login();
        $this->ProductModel=D('Article');
        $this->CategoryModel=D('category');
    }


    public function index(){

        $str ='1=1 ';
        $catid=I('get.catid');$start_time=I('start_time');$end_time=I('end_time');$q=I('q');
        if (!empty($catid)){
            $str .=' And catid='.$catid;
            $Category=$this->CategoryModel->find($catid);
            $this->assign('catename',$Category['title']);
        }
        if (!empty($start_time) && !empty($end_time)){
            $start_time=strtotime($start_time);
            $end_time=strtotime($end_time);
            $str .=' And create_time between '.$start_time.' And '.$end_time;
        }

        if (!empty($q)){$str .=" And title like '%".$q."%'";}

        $count = $this->ProductModel->where($str)->count();
        $Page = new \Think\Page($count,25);
        if (!empty($start_time) && !empty($end_time)){
            $Page->parameter['start_time']   =  $start_time;
            $Page->parameter['end_time']   =  $end_time;
        }
        if(!empty($q)){
            $Page->parameter['q']   =  $q;
        }
        $show = $Page->show();// 分页显示输出
        $list = $this->ProductModel->where($str)->order('sort asc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('category', $this->CategoryModel->getAll());
        $this->display();
    }


    public function add(){
        $menulist=$this->CategoryModel->where("type='Product'")->select();
        if (IS_POST){
            if ($this->ProductModel->create()) {
                $this->ProductModel->create_time = time(); 
                if (false !== $this->ProductModel->add()) {
                  $this->success('数据添加成功！');
                  exit;
                } else {
                  $this->error('数据写入错误');
                }
            } else {
            // 字段验证错误
            $this->error($this->ProductModel->getError());
            }
        }
        $this->assign('menulist',$menulist);
        $tree_map=array();$tree_map['type'] = 'Product';
        $this->assign('formatTree',$this->CategoryModel->formatTree($tree_map));
        $this->display('edit');
    }


    public function edit(){
        $menulist=$this->CategoryModel->where("type='Product'")->select();
        if (IS_POST) {
            if (!$this->db->update()) {
                $this->error($this->db->getError());
            } else {
                action_log();
                $this->updateCache();
                $this->success('更新成功', U('index'));
            }
        }
        $id=I('get.id');
        $info=$this->ProductModel->find($id);
        if (empty($info)){$this->error('内容未找到');exit;}
        $this->assign('info',$info);
        $tree_map=array();$tree_map['type'] = 'Product';
        $this->assign('formatTree',$this->CategoryModel->formatTree($tree_map));
        $this->assign('menulist',$menulist);
        $this->display();
    }



        public function more_del()
    {
     if (IS_POST){
        $status=I('post.status');
        $id=I('post.id');
        $sort=I('post.listorders');
        if (empty($status)){$this->error('非法操作！');}
        if($status==2){
           if (empty($id)){$this->error('请选择操作对象！');}
        }
       
        //排序操作
        if($statu==1)
        {
            foreach ($sort as $key=>$val)
           {
             $data=array();
             $data['sort']=$val;
             $this->ProductModel->where('id='.$key)->save($data);
           }
        }
        //删除操作
        if ($status==2)
        {
           foreach ($id as $val)
           {
                 $this->ProductModel->where('id='.$val)->delete();
           }
        }

        //推荐操作和审核操作
        if ($status==3 || $status==4 || $status==5 || $status==6)
        {
           foreach ($id as $val)
           {
             $data=array();
             switch ($status){
                case 3:
                $data['is_recom']=1;
                break;
                case 4:
                $data['is_recom']=0;
                break;
                case 5:
                $data['status']=1;
                break;
                case 6:
                $data['status']=0;
                break;
               }
             }
             $this->ProductModel->where('id='.$val)->save($data);
           }
        }

        $this->success('数据操作成功！',U('Yunzhansystem/Product/index'));
    }


}