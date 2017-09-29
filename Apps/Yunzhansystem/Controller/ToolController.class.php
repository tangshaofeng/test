<?php
namespace Yunzhansystem\Controller;
class ToolController extends \Think\Controller {
    private $rootPath = 'Uploads/';

    public function _empty(){
    }

    public function _initialize () {
        if (!is_login()) {
            $this->redirect('Index/index');
        }
    }

    public function index(){

        $this->display();
    }

    /* 图片上传 */
    public function uploadImage($id = 0 , $imgurl=''){
        if (IS_POST) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     $this->rootPath; // 设置附件上传根目录
            $upload->savePath  =     'Content/'; // 设置附件上传（子）目录
            // 上传文件
            $info   =   $upload->upload();
            $html = '<script charset="UTF-8">';
            if(!$info) {// 上传错误提示错误信息
                //$html .= 'alert("'. $upload->getError() .'"); window.close();';
                $this->show($upload->getError());
            }else{// 上传成功
                foreach($info as $file){
                    $path =  $file['savepath'] . $file['savename'];
                }
                $html .= 'if(window.opener) { ';
                $html .= '       var obj = window.opener.$(".upload-row:eq('. $id .') .input-text"); ';
                $html .= '       obj.val("'. $path .'"); ';

                if (!empty($imgurl)){
                $html .='        var imgurl = window.opener.$("#'.$imgurl.'");';
                $html .= '       imgurl.attr("src","/Uploads/'.$path.'");';
                }
                // $html .= '       alert("上传成功");';
                $html .= '       window.close(); ';
                $html .= '} ';
            }
            $html .= '</script>';
            exit($html);
        } else {
            layout(false);
            $this->assign('id', $id);
            $this->assign('imgurl', $imgurl);
            $this->display();
        }
    }

    /* 百度编辑器 */
    public function ueditor(){
    	$data = new \Org\Util\Ueditor();
        layout(false);
        C('SHOW_PAGE_TRACE', false);
		echo $data->output();
    }
}
