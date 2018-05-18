<?php defined('BASEPATH') or exit('No direct script access allowed.'); ?><?php defined('BASEPATH') or exit('No permission resources.'); ?>
<div class='panel panel-default grid'>
    <div class='panel-heading'>
        <i class='fa fa-table'></i> 商品列表列表
        <div class='panel-tools'>
            <div class='btn-group'>
                 <a class="btn " href="<?php echo base_url('adminpanel/goods_list/add')?>"><span class="glyphicon glyphicon-plus"></span> 添加 </a>             </div>
            <div class='badge'><?php echo count($data_list)?></div>
        </div>
    </div>
        <div class='panel-filter '>
      <div class='row'>
        <div class='col-md-12'>
        <form class="form-inline" role="form" method="get">
          
<div class="form-group">
<label for="keyword" class="control-label form-control-static">关键词</label>
<input class="form-control" type="text" name="keyword"  value="<?php echo isset($data_info['keyword'])? $data_info['keyword']:"";?>" id="keyword" placeholder="请输入关键词"/></div>
<button type="submit" name="dosubmit" value="搜索" class="btn btn-success"><i class='glyphicon glyphicon-search'></i></button>        </form>
        </div>
      </div> 
    </div>
          <form method="post" id="form_list"  action="<?php echo base_url('adminpanel/goods_list/delete_all')?>"  > 
    <div class='panel-body '>
    <?php if($data_list):?>
        <table class="table table-hover dataTable" id="checkAll">
          <thead>
            <tr>
              <th>#</th>
                            <?php $css=""; $next_url = base_url('adminpanel/goods_list?order=goods_list_name&dir=desc'); ?>
              <?php if(($order=='goods_list_name'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/goods_list?order=goods_list_name&dir=asc'); ?>
              <?php } elseif (($order=='goods_list_name'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">商品名</th>
                            <?php $css=""; $next_url = base_url('adminpanel/goods_list?order=goods_list_company&dir=desc'); ?>
              <?php if(($order=='goods_list_company'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/goods_list?order=goods_list_company&dir=asc'); ?>
              <?php } elseif (($order=='goods_list_company'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">品牌名</th>
                            <?php $css=""; $next_url = base_url('adminpanel/goods_list?order=goods_list_money&dir=desc'); ?>
              <?php if(($order=='goods_list_money'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/goods_list?order=goods_list_money&dir=asc'); ?>
              <?php } elseif (($order=='goods_list_money'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">价格</th>
                            <?php $css=""; $next_url = base_url('adminpanel/goods_list?order=goods_list_weight&dir=desc'); ?>
              <?php if(($order=='goods_list_weight'&&$dir=='desc')) { ?>
              <?php $css="sorting_desc";$next_url = base_url('adminpanel/goods_list?order=goods_list_weight&dir=asc'); ?>
              <?php } elseif (($order=='goods_list_weight'&&$dir=='asc')) { ?>
              <?php $css="sorting_asc";?>
              <?php } ?><th class="sorting <?php echo $css;?>"   onclick="window.location.href='<?php echo $next_url;?>'"   nowrap="nowrap">重量</th>
              <th   nowrap="nowrap">发布状态</th>
              <th   nowrap="nowrap">创建时间</th>
              <th   nowrap="nowrap">创建人</th>
              <th   nowrap="nowrap">商品颜色</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($data_list as $k=>$v):?>
            <tr>
              <td><input type="checkbox" name="pid[]" value="<?php echo $v['goods_list_id']?>" /></td>
                             <td><?php echo $v['goods_list_name']?></td>
                            <td><?php echo $v['goods_list_company']?></td>
                            <td><?php echo $v['goods_list_money']?></td>
                            <td><?php echo $v['goods_list_weight']?></td>
                            <td><?php echo $v['goods_list_status']?></td>
                            <td><?php echo $v['goods_list_createtime']?></td>
                            <td><?php echo $v['goods_list_createUser']?></td>
                            <td><?php echo $v['goods_list_color']?></td>
              <td>
                            	<a href="<?php echo base_url('adminpanel/goods_list/readonly/'.$v['goods_list_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-share-alt"></span> 查看</a>
                                            <a href="<?php echo base_url('adminpanel/goods_list/edit/'.$v['goods_list_id'])?>"  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-edit"></span> 修改</a>
                                            <button type="button" class="btn btn-default btn-xs delete-btn" value="<?php echo $v['goods_list_id'];?>"><span class="glyphicon glyphicon-remove"></span> 删除</button>
                
              </td>
            </tr>
            <?php endforeach;?>
            
          </tbody>
        </table> 
    	</div>
      <div class="panel-footer">
        <div class="pull-left">
          <div class="btn-group">
                  <button type="button" class="btn btn-default" id="reverseBtn"><span class="glyphicon glyphicon-ok"></span> 反选</button>
            <button type="button" id="deleteBtn"  class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> 删除勾选</button>
                 </div>
      </div>
        <div class="pull-right">
        <?php echo $pages;?>
        </div>
      </div> 
      </form>  
  </div>
<?php else:?>
    <div class="no-result">-- 暂无数据 -- </div>
<?php endif;?>

	    <script language="javascript" type="text/javascript">
    require(['<?php echo SITE_URL?>scripts/common.js'], function (common) {
        require(['<?php echo SITE_URL?>scripts/adminpanel/goods_list/lists.js']);
    });
</script>
    