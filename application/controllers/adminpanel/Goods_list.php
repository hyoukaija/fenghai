<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * AutoCodeIgniter.com
 *
 * 基于CodeIgniter核心模块自动生成程序
 *
 * 源项目		AutoCodeIgniter
 * 作者：		AutoCodeIgniter.com Dev Team EMAIL:hubinjie@outlook.com QQ:5516448
 * 版权：		Copyright (c) 2015 , AutoCodeIgniter com.
 * 项目名称：商品列表 
 * 版本号：1 
 * 最后生成时间：2018-05-18 11:52:29 
 */
class Goods_list extends Admin_Controller {
	
    var $method_config;
    function __construct()
	{
		parent::__construct();
		$this->load->model(array('goods_list_model'));
        $this->load->helper(array('auto_codeIgniter_helper','array'));
  
  
        //保证排序安全性
        $this->method_config['sort_field'] = array(
										'goods_list_name'=>'goods_list_name',
										'goods_list_company'=>'goods_list_company',
										'goods_list_money'=>'goods_list_money',
										'goods_list_weight'=>'goods_list_weight',
										);
	}
    
    /**
     * 默认首页列表
     * @param int $pageno 当前页码
     * @return void
     */
    function index($page_no=0,$sort_id=0)
    {
    	$page_no = max(intval($page_no),1);
        
        $orderby = "goods_list_id desc";
        $dir = $order=  NULL;
		$order=isset($_GET['order'])?safe_replace(trim($_GET['order'])):'';
		$dir=isset($_GET['dir'])?safe_replace(trim($_GET['dir'])):'asc';
        
        if(trim($order)!="")
        {
        	//如果找到得
        	if(isset($this->method_config['sort_field'][strtolower($order)]))
            {
            	if(strtolower($dir)=="asc")
            		$orderby = $this->method_config['sort_field'][strtolower($order)]." asc," .$orderby;
                 else
            		$orderby = $this->method_config['sort_field'][strtolower($order)]." desc," .$orderby;
            }
        }
                
        $where ="";
        $_arr = NULL;//从URL GET
        if (isset($_GET['dosubmit'])) {
        	$where_arr = NULL;
			$_arr['keyword'] =isset($_GET['keyword'])?safe_replace(trim($_GET['keyword'])):'';
			if($_arr['keyword']!="") $where_arr[] = "concat(goods_list_name,goods_list_company) like '%{$_arr['keyword']}%'";
                
		        
        
		        
        	if($where_arr)$where = implode(" and ",$where_arr);
        }

        	$data_list = $this->goods_list_model->listinfo($where,'*',$orderby , $page_no, $this->goods_list_model->page_size,'',$this->goods_list_model->page_size,page_list_url('adminpanel/goods_list/index',true));
        if($data_list)
        {
            	foreach($data_list as $k=>$v)
            	{
					$data_list[$k] = $this->_process_datacorce_value($v);
            	}
        }
    	$this->view('lists',array('require_js'=>true,'data_info'=>$_arr,'order'=>$order,'dir'=>$dir,'data_list'=>$data_list,'pages'=>$this->goods_list_model->pages));
    }
    
    /**
     * 处理数据源结
     * @param array v 
     * @return array
     */
    function _process_datacorce_value($v,$is_edit_model=false)
    {
         return $v;
    }
     /**
     * 新增数据
     * @param AJAX POST 
     * @return void
     */
    function add()
    {
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	//接收POST参数
			$_arr['goods_list_name'] = isset($_POST["goods_list_name"])?trim(safe_replace($_POST["goods_list_name"])):exit(json_encode(array('status'=>false,'tips'=>'商品名 不能为空')));
			if($_arr['goods_list_name']=='')exit(json_encode(array('status'=>false,'tips'=>'商品名 不能为空')));
			$_arr['goods_list_company'] = isset($_POST["goods_list_company"])?trim(safe_replace($_POST["goods_list_company"])):exit(json_encode(array('status'=>false,'tips'=>'品牌名 不能为空')));
			if($_arr['goods_list_company']=='')exit(json_encode(array('status'=>false,'tips'=>'品牌名 不能为空')));
			$_arr['goods_list_money'] = isset($_POST["goods_list_money"])?trim(safe_replace($_POST["goods_list_money"])):exit(json_encode(array('status'=>false,'tips'=>'价格 不能为空')));
			if($_arr['goods_list_money']=='')exit(json_encode(array('status'=>false,'tips'=>'价格 不能为空')));
			if($_arr['goods_list_money']!=''){
			if(!is_price($_arr['goods_list_money']))exit(json_encode(array('status'=>false,'tips'=>'价格 格式不正确')));
			}
			$_arr['goods_list_weight'] = isset($_POST["goods_list_weight"])?trim(safe_replace($_POST["goods_list_weight"])):exit(json_encode(array('status'=>false,'tips'=>'重量 不能为空')));
			if($_arr['goods_list_weight']=='')exit(json_encode(array('status'=>false,'tips'=>'重量 不能为空')));
			if($_arr['goods_list_weight']!=''){
			if(!is_number($_arr['goods_list_weight']))exit(json_encode(array('status'=>false,'tips'=>'重量 格式不正确')));
			}
			$_arr['goods_list_status'] = isset($_POST["goods_list_status"])?trim(safe_replace($_POST["goods_list_status"])):exit(json_encode(array('status'=>false,'tips'=>'发布状态 不能为空')));
			if($_arr['goods_list_status']=='')exit(json_encode(array('status'=>false,'tips'=>'发布状态 不能为空')));
			$_arr['goods_list_createtime'] = date('Y-m-d H:i:s');
			$_arr['goods_list_createUser'] = isset($this->user_name)?$this->user_name:'N/A';
			$_arr['goods_list_color'] = isset($_POST["goods_list_color"])?trim(safe_replace($_POST["goods_list_color"])):'';
			
            $new_id = $this->goods_list_model->insert($_arr);
            if($new_id)
            {
				exit(json_encode(array('status'=>true,'tips'=>'信息新增成功','new_id'=>$new_id)));
            }else
            {
            	exit(json_encode(array('status'=>false,'tips'=>'信息新增失败','new_id'=>0)));
            }
        }else
        {
        	$this->view('edit',array('require_js'=>true,'is_edit'=>false,'id'=>0,'data_info'=>$this->goods_list_model->default_info()));
        }
    }
     /**
     * 删除单个数据
     * @param int id 
     * @return void
     */
    function delete_one($id=0)
    {
    	$id = intval($id);
        $data_info =$this->goods_list_model->get_one(array('goods_list_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
        $status = $this->goods_list_model->delete(array('goods_list_id'=>$id));
        if($status)
        {
        	$this->showmessage('删除成功');
        }else
        	$this->showmessage('删除失败');
    }

    /**
     * 删除选中数据
     * @param post pid 
     * @return void
     */
    function delete_all()
    {
        if(isset($_POST))
		{
			$pidarr = isset($_POST['pid']) ? $_POST['pid'] : $this->showmessage('无效参数', HTTP_REFERER);
			$where = $this->goods_list_model->to_sqls($pidarr, '', 'goods_list_id');
			$status = $this->goods_list_model->delete($where);
			if($status)
			{
				$this->showmessage('操作成功', HTTP_REFERER);
			}else 
			{
				$this->showmessage('操作失败');
			}
		}
    }
     /**
     * 修改数据
     * @param int id 
     * @return void
     */
    function edit($id=0)
    {
    	$id = intval($id);
        
        $data_info =$this->goods_list_model->get_one(array('goods_list_id'=>$id));
    	//如果是AJAX请求
    	if($this->input->is_ajax_request())
		{
        	if(!$data_info)exit(json_encode(array('status'=>false,'tips'=>'信息不存在')));
        	//接收POST参数
			$_arr['goods_list_name'] = isset($_POST["goods_list_name"])?trim(safe_replace($_POST["goods_list_name"])):exit(json_encode(array('status'=>false,'tips'=>'商品名 不能为空')));
			if($_arr['goods_list_name']=='')exit(json_encode(array('status'=>false,'tips'=>'商品名 不能为空')));
			$_arr['goods_list_company'] = isset($_POST["goods_list_company"])?trim(safe_replace($_POST["goods_list_company"])):exit(json_encode(array('status'=>false,'tips'=>'品牌名 不能为空')));
			if($_arr['goods_list_company']=='')exit(json_encode(array('status'=>false,'tips'=>'品牌名 不能为空')));
			$_arr['goods_list_money'] = isset($_POST["goods_list_money"])?trim(safe_replace($_POST["goods_list_money"])):exit(json_encode(array('status'=>false,'tips'=>'价格 不能为空')));
			if($_arr['goods_list_money']=='')exit(json_encode(array('status'=>false,'tips'=>'价格 不能为空')));
			if($_arr['goods_list_money']!=''){
			if(!is_price($_arr['goods_list_money']))exit(json_encode(array('status'=>false,'tips'=>'价格 格式不正确')));
			}
			$_arr['goods_list_weight'] = isset($_POST["goods_list_weight"])?trim(safe_replace($_POST["goods_list_weight"])):exit(json_encode(array('status'=>false,'tips'=>'重量 不能为空')));
			if($_arr['goods_list_weight']=='')exit(json_encode(array('status'=>false,'tips'=>'重量 不能为空')));
			if($_arr['goods_list_weight']!=''){
			if(!is_number($_arr['goods_list_weight']))exit(json_encode(array('status'=>false,'tips'=>'重量 格式不正确')));
			}
			$_arr['goods_list_status'] = isset($_POST["goods_list_status"])?trim(safe_replace($_POST["goods_list_status"])):exit(json_encode(array('status'=>false,'tips'=>'发布状态 不能为空')));
			if($_arr['goods_list_status']=='')exit(json_encode(array('status'=>false,'tips'=>'发布状态 不能为空')));
			$_arr['goods_list_createtime'] = date('Y-m-d H:i:s');
			$_arr['goods_list_createUser'] = isset($this->user_name)?$this->user_name:'N/A';
			$_arr['goods_list_color'] = isset($_POST["goods_list_color"])?trim(safe_replace($_POST["goods_list_color"])):'';
			
            $status = $this->goods_list_model->update($_arr,array('goods_list_id'=>$id));
            if($status)
            {
				exit(json_encode(array('status'=>true,'tips'=>'信息修改成功')));
            }else
            {
            	exit(json_encode(array('status'=>false,'tips'=>'信息修改失败')));
            }
        }else
        {
        	if(!$data_info)$this->showmessage('信息不存在');
            $data_info = $this->_process_datacorce_value($data_info,true);
        	$this->view('edit',array('require_js'=>true,'data_info'=>$data_info,'is_edit'=>true,'id'=>$id));
        }
    }
 
  
     /**
     * 只读查看数据
     * @param int id 
     * @return void
     */
    function readonly($id=0)
    {
    	$id = intval($id);
        $data_info =$this->goods_list_model->get_one(array('goods_list_id'=>$id));
        if(!$data_info)$this->showmessage('信息不存在');
		$data_info = $this->_process_datacorce_value($data_info);
        
        $this->view('readonly',array('require_js'=>true,'data_info'=>$data_info));
    }

}

// END goods_list class

/* End of file goods_list.php */
/* Location: ./goods_list.php */
?>