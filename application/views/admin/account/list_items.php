<div class="app-title">
    <div class="title-holder">
        <h1><i class="feather icon-users"></i> Items/Materials</h1>
        <p>List of Items/Materials</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/'); ?>"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item">Items/Materials</li>
    </ul>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="tile mb30">
            <div class="tile-title-w-btn">
                <div class="title">
                    <h3><i class="feather icon-users"></i> Items/Materials</h3>
                </div>
            </div>
            <div class="tile-content">
                <?php if($permissions['my_materials']==TRUE) { ?>
                <div id="usersList"></div>
				<table class="table table-bordered" id="orders">
				 <thead>
				  <tr>
				  <th>Sl No.</th>
				  <th>Product</th>
				  <th>Product Image</th>
				  <th>Recieved Quantity (KG)</th>
				  <th>Remaining Quantity (KG)</th>
				  <th>Updated</th>
				  </tr>
				 </thead>
				 <tbody>
				 
				   <?php if (!empty($items)): $i = 1; foreach ($items as $item): //print_r($item); ?>
				     <tr>
					 <td><?= $i; ?></td>
					 <td><?php $pr = _productInfo($item->product_id); if(!empty($pr)){ echo$pr->post_title; } ?></td>
					 <td><?php $thumb = _thumbnail($item->product_id); ?><img src="<?php echo$thumb; ?>" style="width:70px;"></td>
					 <td><?= $item->assigned_quantity; ?></td>
					 <td><?= $item->assigned_quantity; ?></td>
					 <td><?php if($item->updated_at != '0000-00-00 00:00:00'){ echo get_nice_time($item->updated_at); }else{ echo get_nice_time($item->created_at); }?></td>
					 </tr>
				   <?php $i++; endforeach; endif; ?>
				 </tbody>
				</table>
                <?php } ?>
            </div>
            <div class="tile-overlay" style="display: none;">
                <div class="m-loader mr-2">
                <svg class="m-circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"/>
                </svg>
                </div>
                <h3 class="l-text"><?= $this->lang->line("text_loading"); ?></h3>
            </div>
        </div>
    </div>
</div>

<div id="sidePanel" class="side-panel">
    <div class="side-panel-content-holder">
        <div class="side-panel-loader"  id="sidePanelLoader"><div class="loader-ripple"><div></div><div></div></div></div>
        <div class="side-panel-content"  id="sidePanelContent"></div>
    </div>
</div>
