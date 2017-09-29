<?php
namespace Mobile\Controller;
use Mobile\Common\IController;
class ProductController extends IController {
    protected $NAVS= array();   // 一级导航
    protected $CATEGORYS = array(); //所有栏目信息
    
     protected function _init()
    {
      /*模板定义*/
     $this->CategoryModel=D('Category');$this->ConfigModel=D('Config');$this->PagesModel=D('Pages');
      $this->AdsModel=D('Ads');$this->ArticleModel=D('Article');$this->LinksModel=D('Links');
      $this->ServiceModel=D('Service');
      /* 所有栏目信息 */
      $this->CATEGORYS = $this->CategoryModel->getAll();
      $this->assign('CATEGORYS', $this->CATEGORYS);

      $catid = I('catid', 0, 'intval');
      foreach ($this->CATEGORYS as $key => $val) {
      if($val['pid'] == 0 && $val['display']){
        // 目前延伸3级
          if ($key == $catid || $key == $this->CATEGORYS[$catid]['pid'] || $key == $this->CATEGORYS[$this->CATEGORYS[$catid]['pid']]['pid'] || $key == $this->CATEGORYS[$this->CATEGORYS[$this->CATEGORYS[$catid]['pid']]['pid']]['pid']) {
              $this->top_catid = $key;
          } else {
              
          }
      }
      }

      /* 一级导航 */
      $this->NAVS = get_Navigation($this->top_catid);
      $topinfo=$this->CategoryModel->find($this->top_catid);
      $this->Config = $this->ConfigModel->find(1);
      $this->assign('config', $this->Config);
      $this->assign('top_catid', $this->top_catid);
      $this->assign('topinfo',$topinfo);
      $this->assign('NAVS', $this->NAVS);

      /*导航服务下拉*/
      $nav_service_tree  = $this->ServiceModel->where(array('catid'=>1))->select();
      foreach ($nav_service_tree as $key=>$val){
        $nav_service_tree[$key]['url'] = U('Service/view',array('catid'=>$val['catid'],'id'=>$val['id']));
      }
      $this->assign('nav_service_tree',$nav_service_tree);
      /*导航解决方案下拉*/
      $nav_solution_tree  = $this->ArticleModel->where(array('catid'=>2))->select();
      foreach ($nav_solution_tree as $key=>$val){
        $nav_solution_tree[$key]['url'] = U('Solution/view',array('catid'=>$val['catid'],'id'=>$val['id']));
      }
      $this->assign('nav_solution_tree',$nav_solution_tree);
    }

    public function index(){
        /*接收参数*/
        $catid=I('catid'); if (empty($catid)){$this->redirect('index');}
        /*栏目信息*/
        $category=$this->CategoryModel->find($catid);
        $this->assign('category',$category);$this->assign('catid',$catid);
        $father = $this->CategoryModel->find($category['pid']);$this->assign('father',$father);
        $childs = get_childs($catid);
        /*信息列表*/
        $count=$this->ArticleModel->where(array('catid'=>array('in',$childs),'status'=>1))->count();
        $Page = new \Think\Page($count,12);
        $list=$this->ArticleModel->where(array('catid'=>array('in',$childs),'status'=>1))->order('sort asc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        foreach ($list as $key=>$val){
        $list[$key]['url'] = U('view',array('catid'=>$catid,'id'=>$val['id']));
        }
        $show = $Page->show();$this->assign('page',$show);// 赋值分页输出
        $this->assign('lists',$list);
        /*Mate信息*/
        $this->assign('meta_title', $this->Config['title']);
        $this->assign('meta_keywords', $this->Config['keyword']);
        $this->assign('meta_description', $this->Config['description']);
        /*模板定义*/
        $template = $category['lists_tpl'];
        $this->display($template);
    }

    public function lists(){
      /*接收参数*/
      $catid=I('catid'); if (empty($catid)){$this->redirect('index');}
      
      /*栏目信息*/
      $category=$this->CategoryModel->find($catid);
      $this->assign('category',$category); $this->assign('catid',$catid);
      $father = $this->CategoryModel->find($category['pid']);$this->assign('father',$father);
      /*列表*/
      $cpzx1=$this->ArticleModel->where(array('lists_tpl'=>'product_list','display'=>1))->select();
      
      /*信息列表*/
      $count=$this->ArticleModel->where(array('catid'=>$catid,'status'=>1))->count();
      $Page = new \Think\Page($count,12);
      $list=$this->ArticleModel->where(array('catid'=>$catid,'status'=>1))->order('sort asc,id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
      foreach ($list as $key=>$val){
        $list[$key]['url'] = U('view',array('catid'=>$catid,'id'=>$val['id']));
      }
      $show = $Page->show();$this->assign('page',$show);// 赋值分页输出
      $this->assign('lists',$list);
      /*Mate信息*/
      $this->assign('meta_title', $this->Config['title']);
      $this->assign('meta_keywords', $this->Config['keyword']);
      $this->assign('meta_description', $this->Config['description']);
      /*模板定义*/
      $this->display();
    }

    public function view(){
      /*接收参数*/
      $catid=I('catid'); $id=I('id'); if (empty($catid) || empty($id)){$this->redirect('index');}
      /*栏目信息*/
      $category=$this->CategoryModel->find($catid);
      $this->assign('category',$category); $this->assign('catid',$catid);
      $father = $this->CategoryModel->find($category['pid']);$this->assign('father',$father);
      /*文章详情*/
      $info = $this->ArticleModel->find($id);
      $info['content'] = html_entity_decode($info['content']);
      $this->assign('info',$info);
      /*Mate信息*/
      $this->assign('meta_title', $this->Config['title']);
      $this->assign('meta_keywords', $this->Config['keyword']);
      $this->assign('meta_description', $this->Config['description']);
      /*模板定义*/
      $template = $category['view_tpl'];
      $this->display($template);
    }
}