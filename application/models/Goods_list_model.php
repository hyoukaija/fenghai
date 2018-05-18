<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * AutoCodeIgniter.com
 *
 * 基于CodeIgniter核心模块自动生成程序
 *
 * 源项目		AutoCodeIgniter
 * 作者：		AutoCodeIgniter.com Dev Team
 * 版权：		Copyright (c) 2015 , AutoCodeIgniter com.
 * 项目名称：商品列表 MODEL
 * 版本号：1 
 * 最后生成时间：2018-05-18 11:52:29 
 */
class Goods_list_model extends Base_Model {
	
    var $page_size = 10;
    function __construct()
	{
    	$this->db_tablepre = 't_aci_';
    	$this->table_name = 'goods_list';
		parent::__construct();
	}
    
    /**
     * 初始化默认值
     * @return array
     */
    function default_info()
    {
    	return array(
		'goods_list_id'=>0,
		'goods_list_name'=>'',
		'goods_list_company'=>'',
		'goods_list_money'=>'',
		'goods_list_weight'=>'',
		'goods_list_status'=>'',
		'goods_list_createtime'=>'',
		'goods_list_createUser'=>'',
		'goods_list_color'=>'',
		);
    }
    
    /**
     * 安装SQL表
     * @return void
     */
    function init()
    {
    	$this->query("CREATE TABLE  IF NOT EXISTS `t_aci_goods_list`
(
`goods_list_name` varchar(250) DEFAULT NULL COMMENT '商品名',
`goods_list_company` varchar(250) DEFAULT NULL COMMENT '品牌名',
`goods_list_money` decimal(10,2) DEFAULT '0.00' COMMENT '价格',
`goods_list_weight` int(11) DEFAULT '0' COMMENT '重量',
`goods_list_status` varchar(250) DEFAULT NULL COMMENT '发布状态',
`goods_list_createtime` varchar(50) DEFAULT NULL COMMENT '创建时间',
`goods_list_createUser` varchar(50) DEFAULT NULL COMMENT '创建人',
`goods_list_color` varchar(250) DEFAULT NULL COMMENT '商品颜色',
`goods_list_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`goods_list_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
");
    }
    
        }

// END goods_list_model class

/* End of file goods_list_model.php */
/* Location: ./goods_list_model.php */
?>