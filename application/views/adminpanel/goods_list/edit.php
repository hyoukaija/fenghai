<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<form class="form-horizontal" role="form" id="validateform" name="validateform" action="<?php echo base_url('adminpanel/goods_list/edit')?>" >
	<div class='panel panel-default '>
		<div class='panel-heading'>
			<i class='fa fa-table'></i> 商品列表 修改信息
			<div class='panel-tools'>
				<div class='btn-group'>
					<a class="btn " href="<?php echo base_url('adminpanel/goods_list')?>"><span class="glyphicon glyphicon-arrow-left"></span> 返回 </a>
				</div>
			</div>
		</div>
		<div class='panel-body '>
								<fieldset>
						<legend>基本信息</legend>
													
	<div class="form-group">
				<label for="goods_list_name" class="col-sm-2 control-label form-control-static">商品名</label>
				<div class="col-sm-9 ">
					<input type="text" name="goods_list_name"  id="goods_list_name"  value='<?php echo isset($data_info['goods_list_name'])?$data_info['goods_list_name']:'' ?>'  class="form-control validate[required]"  placeholder="请输入商品名" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="goods_list_company" class="col-sm-2 control-label form-control-static">品牌名</label>
				<div class="col-sm-9 ">
					<input type="text" name="goods_list_company"  id="goods_list_company"  value='<?php echo isset($data_info['goods_list_company'])?$data_info['goods_list_company']:'' ?>'  class="form-control validate[required]"  placeholder="请输入品牌名" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="goods_list_money" class="col-sm-2 control-label form-control-static">价格</label>
				<div class="col-sm-9 ">
					<input type="number" name="goods_list_money"  id="goods_list_money"   value='<?php echo isset($data_info['goods_list_money'])?$data_info['goods_list_money']:'' ?>'   class="form-control  validate[required,custom[price]]" placeholder="请输入价格" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="goods_list_weight" class="col-sm-2 control-label form-control-static">重量</label>
				<div class="col-sm-9 ">
					<input type="number" name="goods_list_weight"  id="goods_list_weight"  value='<?php echo isset($data_info['goods_list_weight'])?$data_info['goods_list_weight']:'' ?>'   class="form-control  validate[required,custom[integer]]" placeholder="请输入重量" >
				</div>
			</div>
													
	<div class="form-group">
				<label for="goods_list_status" class="col-sm-2 control-label form-control-static">发布状态</label>
				<div class="col-sm-9 ">
					<select class="form-control  validate[required]"  name="goods_list_status"  id="goods_list_status">
				<option value="">==请选择==</option>
								<option value='1' <?php if(isset($data_info['goods_list_status'])&&($data_info['goods_list_status']=='1')) { ?> selected="selected" <?php } ?>            >已发布</option>
				<option value='2' <?php if(isset($data_info['goods_list_status'])&&($data_info['goods_list_status']=='2')) { ?> selected="selected" <?php } ?>            >未发布</option>
				<option value='0' <?php if(isset($data_info['goods_list_status'])&&($data_info['goods_list_status']=='0')) { ?> selected="selected" <?php } ?>            >停用</option>
</select>
				</div>
			</div>
																																							
	<div class="form-group">
				<label for="goods_list_color" class="col-sm-2 control-label form-control-static">商品颜色</label>
				<div class="col-sm-9 ">
					<input type="text" name="goods_list_color"  id="goods_list_color"  value='<?php echo isset($data_info['goods_list_color'])?$data_info['goods_list_color']:'' ?>'  class="form-control validate[required]"  placeholder="请输入商品颜色" >
				</div>
			</div>
											</fieldset>
							<div class='form-actions'>
				<button class='btn btn-primary ' type='submit' id="dosubmit">保存</button>
			</div>
</form>
			<script language="javascript" type="text/javascript">
			var is_edit =<?php echo ($is_edit)?"true":"false" ?>;
			var id =<?php echo $id;?>;

			require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
		        require(['<?php echo SITE_URL?>scripts/adminpanel/goods_list/edit.js']);
		    });
		</script>
	
	