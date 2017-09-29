<?php
namespace Mobile\Controller;
use Mobile\Common\IController;
class ServiceController extends IController {
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
        /*列表*/
        $lists = get_lists('Service',array('catid'=>$catid),'id,catid,title,description,content,thumb');
        foreach($lists as $key=>$val){
          $val=$lists[$key];
        }
        $this->assign('lists',$lists);
          $lists['content'] = html_entity_decode($val['content']);

        /*业内导航信息*/
        $daoh=$this->ServiceModel->where(array('catid'=>$catid,'status'=>1))->select();
        foreach($daoh as $key=>$val){
          $daoh[$key]['url']=U('view',array('catid'=>$val['catid'],'id'=>$val['id']));
        }
        $this->assign('daoh',$daoh);

        /*单页信息*/
        $pages_row=$this->PagesModel->where(array('catid'=>$catid))->find();
        $this->assign('pages_row',$pages_row);
        $this->assign('content', get_content($pages_row['content']));
        $template=$category['view_tpl'];

         /*列表*/
      $service_tree = get_lists('Service',array('catid'=>$this->top_catid));$this->assign('service_tree',$service_tree);
      /*文章详情*/
      $info = $this->ServiceModel->find($id);
      $info['content'] = html_entity_decode($info['content']);
      $info['content1'] = html_entity_decode($info['content1']);
      $info['content2'] = html_entity_decode($info['content2']);
      $info['content3'] = html_entity_decode($info['content3']);
      $info['content4'] = html_entity_decode($info['content4']);
      $this->assign('info',$info);

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
      $catid=I('catid'); $id=I('id'); if (empty($catid) || empty($id)){$this->redirect('index');}
      /*栏目信息*/
      $category=$this->CategoryModel->find($catid);
      $this->assign('category',$category);$this->assign('catid',$catid);
      /*列表*/
      $service_tree = get_lists('Service',array('catid'=>$this->top_catid));$this->assign('service_tree',$service_tree);
      /*文章详情*/
      $info = $this->ServiceModel->find($id);
      $info['content'] = html_entity_decode($info['content']);
      $info['content1'] = html_entity_decode($info['content1']);
      $info['content2'] = html_entity_decode($info['content2']);
      $info['content3'] = html_entity_decode($info['content3']);
      $info['content4'] = html_entity_decode($info['content4']);
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