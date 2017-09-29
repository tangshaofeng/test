<?php
namespace Yunzhansystem\Controller;
use Think\Controller;
class PagesController extends Controller {


     /* 初始化 */
    public function _initialize () {
        check_login();
        $this->PagesModel=D('Pages');
        $this->CategoryModel=D('category');
    }


    public function index(){
        $list=$this->CategoryModel->formatTree();
        $this->assign('list',$list);
        $this->assign('category', $this->CategoryModel->getAll());
        $this->display();
    }


    public function edit(){
        if (IS_POST) {
            if ($this->PagesModel->create()) {
                if (false !== $this->PagesModel->save()) {
                  $this->success('数据更新成功！');
                  exit;
                } else {
                  $this->error('数据更新失败');
                }
            } else {
            // 字段验证错误
            $this->error($this->PagesModel->getError());
            }
        }
        $id=I('get.id');
        $info=$this->PagesModel->where('catid='.$id)->find();
        if (empty($info)){$this->error('内容未找到');exit;}
        $this->assign('info',$info);
        $this->display();
    }


}