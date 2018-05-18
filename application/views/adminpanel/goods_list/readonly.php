<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<div class='panel panel-default '>
    <div class='panel-heading'>
        <i class='fa fa-table'></i> 商品列表 查看信息 
        <div class='panel-tools'>
            <div class='btn-group'>
            	<a class="btn " href="<?php echo base_url('adminpanel/goods_list')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
            </div>
        </div>
    </div>
    <div class='panel-body '>
<div class="form-horizontal"  >
	<fieldset>
        <legend>基本信息</legend>
     
  	  	
	<div class="form-group">
				<label for="goods_list_name" class="col-sm-2 control-label form-control-static">商品名</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['goods_list_name'])?$data_info['goods_list_name']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="goods_list_company" class="col-sm-2 control-label form-control-static">品牌名</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['goods_list_company'])?$data_info['goods_list_company']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="goods_list_money" class="col-sm-2 control-label form-control-static">价格</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['goods_list_money'])?$data_info['goods_list_money']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="goods_list_weight" class="col-sm-2 control-label form-control-static">重量</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['goods_list_weight'])?$data_info['goods_list_weight']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="goods_list_status" class="col-sm-2 control-label form-control-static">发布状态</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['goods_list_status'])?$data_info['goods_list_status']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="goods_list_createtime" class="col-sm-2 control-label form-control-static">创建时间</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['goods_list_createtime'])?$data_info['goods_list_createtime']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="goods_list_createUser" class="col-sm-2 control-label form-control-static">创建人</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['goods_list_createUser'])?$data_info['goods_list_createUser']:'' ?>
				</div>
			</div>
	  	
	<div class="form-group">
				<label for="goods_list_color" class="col-sm-2 control-label form-control-static">商品颜色</label>
				<div class="col-sm-9 form-control-static ">
					<?php echo isset($data_info['goods_list_color'])?$data_info['goods_list_color']:'' ?>
				</div>
			</div>
	    </fieldset>
	</div>
</div>
</div>
