<?php
namespace Mobile\Controller;
use Mobile\Common\IController;
class IndexController extends IController {
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
        
      /* 一级导航 */
      $this->NAVS = get_Navigation();
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
        /*广告图*/
        $banner = get_ads(1,1);$this->assign('banner',$banner);
        $service = get_ads(2);$this->assign('service',$service);
        /*新闻中心*/
        $news_childs = get_childs(6);
        $index_news = $this->ArticleModel->where(array('is_recom'=>1,'status'=>1,'catid'=>array('in',$news_childs)))->limit(4)->order('sort asc,id desc')->select();
        $this->assign('index_news',$index_news);
        foreach ($index_news as $key=>$val){
            $index_news[$key]['url'] = U('News/view',array('catid'=>$val['catid'],'id'=>$val['id']));
        }
        $this->assign('index_news',$index_news);
        /*Mate信息*/
        $this->assign('meta_title', $this->Config['title']);
        $this->assign('meta_keywords', $this->Config['keyword']);
        $this->assign('meta_description', $this->Config['description']);

        /*模板定义*/
        $this->display();
    }

    

}