<?php
namespace Mobile\Controller;
use Mobile\Common\IController;
class SupportController extends IController {
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
        /*服务制度*/
        $ads_fwzd = get_ads(5);$this->assign('ads_fwzd',$ads_fwzd);
        /*质量管理*/
        $zlgl = get_lists('Article',array('catid'=>38,'status'=>1));$this->assign('zlgl',$zlgl);
        /*技术文档*/
        $jswd = get_lists('Article',array('catid'=>39,'status'=>1),'id,catid,title,thumb',22);$this->assign('jswd',$jswd);
        /*栏目信息*/
        $category=$this->CategoryModel->find($catid);
        $this->assign('category',$category); $template = $category['lists_tpl'];
        $this->assign('catid',$catid);
        /*Mate信息*/
        $this->assign('meta_title', $this->Config['title']);
        $this->assign('meta_keywords', $this->Config['keyword']);
        $this->assign('meta_description', $this->Config['description']);
        /*模板定义*/
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
      $info = $this->ArticleModel->find($id);
      $info['content'] = html_entity_decode($info['content']);
      $this->assign('info',$info);
      /*Mate信息*/
      $this->assign('meta_title', $this->Config['title']);
      $this->assign('meta_keywords', $this->Config['keyword']);
      $this->assign('meta_description', $this->Config['description']);
      /*模板定义*/
      $this->display();
    }

    public function message(){
      if(IS_POST){
        $msg_name = trim(I('post.msg_name'));$msg_telphone = trim(I('post.msg_telphone'));
        $msg_email = trim(I('post.msg_email'));$msg_content = trim(I('post.msg_content'));
        $data['company_title'] = $msg_name;$data['company_mobile'] = $msg_telphone;
        $data['company_qq'] = $msg_email;$data['company_content'] = $msg_content;
        $data['create_time'] = time();
        $return = D('Message')->add($data);
         if ($return){
            $this->success('提交成功，请您耐心等待，稍后市场部会与您联系！');
         }else{
            $this->error('服务器正忙,请稍后再试！');
         }
      }
    }
}