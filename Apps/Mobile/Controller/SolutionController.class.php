<?php
namespace Mobile\Controller;
use Mobile\Common\IController;
class SolutionController extends IController {
    protected $NAVS= array();   // 一级导航
    protected $CATEGORYS = array(); //所有栏目信息
    
     protected function _init()
    {
      /*模板定义*/
      $this->CategoryModel=D('Category');$this->ConfigModel=D('Config');$this->CasesModel=D('Case');
      $this->AdsModel=D('Ads');$this->ArticleModel=D('Article');$this->LinksModel=D('Links');$this->ServiceModel=D('Service');
      /* 所有栏目信息 */
      $this->CATEGORYS = $this->CategoryModel->getAll();
      $this->assign('CATEGORYS', $this->CATEGORYS);

      $catid = I('catid', 0, 'intval');
      foreach ($this->CATEGORYS as $key => $val) {
      if($val['pid'] == 0 && $val['display']){
        // 目前延伸3级
          if ($key == $catid || $key == $this->CATEGORYS[$catid]['pid'] || $key == $this->CATEGORYS[$this->CATEGORYS[$catid]['pid']]['pid']) {
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
        if ($catid == 43){
            $Model = 'Case';
        }else{
            $Model = 'Article';
        }
        /*信息列表*/
        $list=get_lists($Model,array('catid'=>$catid));$this->assign('lists',$list);
        $listA=get_lists($Model,array('catid'=>$catid),0,2);$this->assign('listsA',$listA);
        // dump($listA);
        /*服务案例*/
        $service_case = get_lists('Case',array('catid'=>43),'id,title,catid,thumb',4);
        $this->assign('service_case',$service_case);
        /*Mate信息*/
        $this->assign('meta_title', $this->Config['title']);
        $this->assign('meta_keywords', $this->Config['keyword']);
        $this->assign('meta_description', $this->Config['description']);
        /*模板定义*/
        $template = $category['lists_tpl'];
        $this->display($template);
    }

    public function view(){
      /*接收参数*/
      $catid =I('catid', 0, 'intval'); $id =I('id', 0, 'intval'); if (empty($catid) || empty($id)){$this->redirect('index');}
      /*栏目信息*/
      $category=$this->CategoryModel->find($catid);
      $this->assign('category',$category);$this->assign('catid',$catid);
      /*信息列表*/
      $solution_tree=get_lists('Article',array('catid'=>$this->top_catid));$this->assign('solution_tree',$solution_tree);
      /*文章信息*/
      $info = $this->ArticleModel->find($id);if(empty($info)){$this->redirect('index');}
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