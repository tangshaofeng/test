<?php
namespace Home\Controller;
use Home\Common\IController;
class SupportController extends IController {
    protected $NAVS= array();   // 一级导航
    protected $CATEGORYS = array(); //所有栏目信息
    
     protected function _init()
    {
      /*模板定义*/
      $this->CategoryModel=D('Category');$this->ConfigModel=D('Config');$this->PagesModel=D('Pages');
      $this->AdsModel=D('Ads');$this->ArticleModel=D('Article');$this->LinksModel=D('Links');
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
      /*微信关注*/
      $wxcode = get_ads(3);$this->assign('wxcode',$wxcode);
      /*合作伙伴*/
      $parents = get_lists('Links',array('catid'=>1));$this->assign('parents',$parents);
      /*导航下拉广告*/
      $ads_service_nav = get_ads(7);$this->assign('ads_service_nav',$ads_service_nav); 
      $ads_solution_nav = get_ads(8);$this->assign('ads_solution_nav',$ads_solution_nav); 
      $ads_product_nav = get_ads(9);$this->assign('ads_product_nav',$ads_product_nav); 
      $ads_support_nav = get_ads(10);$this->assign('ads_support_nav',$ads_support_nav); 
      $ads_about_nav = get_ads(11);$this->assign('ads_about_nav',$ads_about_nav);
      /*导航下拉*/

      $service_nav = get_lists('Service',array('catid'=>1,'status'=>1),'id,title,catid');
      foreach($service_nav as $key=>$val){
        $service_nav[$key]['url']=U('Service/view',array('catid'=>$val['catid'],'id'=>$val['id']));
      }
      $this->assign('service_nav',$service_nav);

      $solution_nav = get_lists('Article',array('catid'=>2,'status'=>1),'id,title,catid');
      foreach($solution_nav as $key=>$val){
        $solution_nav[$key]['url']=U('Solution/view',array('catid'=>$val['catid'],'id'=>$val['id']));
      }
      $this->assign('solution_nav',$solution_nav);

      $product_nav = category_tree2(47);
      foreach($product_nav as $key=>$val){
        $product_nav[$key]['url']=U('Product/index',array('catid'=>$val['catid']));
      }
      $this->assign('product_nav',$product_nav);

      $support_nav = category_tree2(4);
      foreach($support_nav as $key=>$val){
        $support_nav[$key]['url']=U('Support/index',array('catid'=>4));
      }
      $this->assign('support_nav',$support_nav);

      $about_nav = category_tree2(5);
      foreach($about_nav as $key=>$val){
        $about_nav[$key]['url']=U('Pages/index',array('catid'=>5));
      }
      $this->assign('about_nav',$about_nav);


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
        $jswd=$this->ArticleModel->where(array('catid'=>39,'status'=>1))->order('sort asc,id desc')->select();
        /*栏目信息*/
        $category=$this->CategoryModel->find($catid);
        $this->assign('category',$category);
        $this->assign('catid',$catid);
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