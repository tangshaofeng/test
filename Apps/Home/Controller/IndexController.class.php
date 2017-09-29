<?php
namespace Home\Controller;
use Home\Common\IController;
class IndexController extends IController {
    protected $NAVS= array();   // 一级导航
    protected $CATEGORYS = array(); //所有栏目信息
    
     protected function _init()
    {
      /*模板定义*/
      $this->CategoryModel=D('Category');$this->ConfigModel=D('Config');$this->CaseModel=D('Case');
      $this->AdsModel=D('Ads');$this->ArticleModel=D('Article');$this->LinksModel=D('Links');
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
        /*广告图*/
        $banner = get_ads(1);$this->assign('banner',$banner);
        $service = get_ads(2);$this->assign('service',$service);
        /*新闻中心*/
        $news_childs = get_childs(6);
        $index_news = get_lists('Article',array('is_recom'=>1,'status'=>1,'catid'=>array('in',$news_childs)));
        foreach ($index_news as $key=>$val){
            $index_news[$key]['url'] = U('News/view',array('catid'=>$val['catid'],'id'=>$val['id']));
        }
        $this->assign('index_news',$index_news);

        /*我们的客户*/
        $my_map = get_ads(6);$this->assign('my_map',$my_map);
        foreach($my_map as $key=>$val){
          $my_map[$key]=$val;
        }
        $province=$this->AdsModel->where(array('id'=>$val['id']))->order('sort asc,id desc')->select();
        $this->assign('province',$province);

        $beijing_customer = get_lists('Case',array('area_id'=>1),'id,title,catid',4);
        $hebei_customer = get_lists('Case',array('area_id'=>2),'id,title,catid',4);
        $liaoning_customer = get_lists('Case',array('area_id'=>3),'id,title,catid',4);
        $shandong_customer = get_lists('Case',array('area_id'=>4),'id,title,catid',4);
        $shanxi_customer = get_lists('Case',array('area_id'=>5),'id,title,catid',4);
        $chongqing_customer = get_lists('Case',array('area_id'=>6),'id,title,catid',4);
        $jiangxi_customer = get_lists('Case',array('area_id'=>7),'id,title,catid',4);
        $jiangsu_customer = get_lists('Case',array('area_id'=>8),'id,title,catid',4);
        $shanghai_customer = get_lists('Case',array('area_id'=>9),'id,title,catid',4);
        $zhejiang_customer = get_lists('Case',array('area_id'=>10),'id,title,catid',4);
        $hainan_customer = get_lists('Case',array('area_id'=>11),'id,title,catid',4);
        $xinjiang_customer = get_lists('Case',array('area_id'=>12),'id,title,catid',4);
        $qinghai_customer = get_lists('Case',array('area_id'=>13),'id,title,catid',4);
        $gansu_customer = get_lists('Case',array('area_id'=>14),'id,title,catid',4);
        $xizang_customer = get_lists('Case',array('area_id'=>15),'id,title,catid',4);
        $yunnan_customer = get_lists('Case',array('area_id'=>16),'id,title,catid',4);
        $sichuan_customer = get_lists('Case',array('area_id'=>17),'id,title,catid',4);
        $guizhou_customer = get_lists('Case',array('area_id'=>18),'id,title,catid',4);
        $guangxi_customer = get_lists('Case',array('area_id'=>19),'id,title,catid',4);
        $taiwan_customer = get_lists('Case',array('area_id'=>20),'id,title,catid',4);
        $aomen_customer = get_lists('Case',array('area_id'=>21),'id,title,catid',4);
        $xianggang_customer = get_lists('Case',array('area_id'=>22),'id,title,catid',4);
        $hubei_customer = get_lists('Case',array('area_id'=>23),'id,title,catid',4);
        $hunan_customer = get_lists('Case',array('area_id'=>24),'id,title,catid',4);
        $anhui_customer = get_lists('Case',array('area_id'=>25),'id,title,catid',4);
        $henan_customer = get_lists('Case',array('area_id'=>26),'id,title,catid',4);
        $shanxi_A_customer = get_lists('Case',array('area_id'=>27),'id,title,catid',4);
        $ningxia_customer = get_lists('Case',array('area_id'=>28),'id,title,catid',4);
        $guangdong_customer = get_lists('Case',array('area_id'=>29),'id,title,catid',4);
        $fujian_customer = get_lists('Case',array('area_id'=>30),'id,title,catid',4);
        $neimenggu_customer = get_lists('Case',array('area_id'=>31),'id,title,catid',4);
        $heilongjiang_customer = get_lists('Case',array('area_id'=>32),'id,title,catid',4);
        $jilin_customer = get_lists('Case',array('area_id'=>33),'id,title,catid',4);
        $this->assign('beijing_customer',$beijing_customer);
        $this->assign('liaoning_customer',$liaoning_customer);
        $this->assign('shandong_customer',$shandong_customer);
        $this->assign('shanxi_customer',$shanxi_customer);
        $this->assign('chongqing_customer',$chongqing_customer);
        $this->assign('jiangxi_customer',$jiangxi_customer);
        $this->assign('jiangsu_customer',$jiangsu_customer);
        $this->assign('shanghai_customer',$shanghai_customer);
        $this->assign('zhejiang_customer',$zhejiang_customer);
        $this->assign('hainan_customer',$hainan_customer);
        $this->assign('xinjiang_customer',$xinjiang_customer);
        $this->assign('qinghai_customer',$qinghai_customer);
        $this->assign('gansu_customer',$gansu_customer);
        $this->assign('xizang_customer',$xizang_customer);
        $this->assign('yunnan_customer',$yunnan_customer);
        $this->assign('sichuan_customer',$sichuan_customer);
        $this->assign('guizhou_customer',$guizhou_customer);
        $this->assign('guangxi_customer',$guangxi_customer);
        $this->assign('taiwan_customer',$taiwan_customer);
        $this->assign('aomen_customer',$aomen_customer);
        $this->assign('xianggang_customer',$xianggang_customer);
        $this->assign('hubei_customer',$hubei_customer);
        $this->assign('hunan_customer',$hunan_customer);
        $this->assign('anhui_customer',$anhui_customer);
        $this->assign('beijing_customer',$beijing_customer);
        $this->assign('henan_customer',$beijing_customer);
        $this->assign('shanxi_A_customer',$shanxi_A_customer);
        $this->assign('ningxia_customer',$ningxia_customer);
        $this->assign('guangdong_customer',$guangdong_customer);
        $this->assign('fujian_customer',$fujian_customer);
        $this->assign('neimenggu_customer',$neimenggu_customer);
        $this->assign('heilongjiang_customer',$heilongjiang_customer);
        $this->assign('jilin_customer',$jilin_customer);
        $this->assign('hebei_customer',$hebei_customer);
       
        /*Mate信息*/
        $this->assign('meta_title', $this->Config['title']);
        $this->assign('meta_keywords', $this->Config['keyword']);
        $this->assign('meta_description', $this->Config['description']);
        /*模板定义*/
        $this->display();
    }
    

}