<div class="app-title">
    <div class="title-holder">
        <h1><i class="feather icon-users"></i> Assign Raw Material</h1>
        <p>List of Purchases</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/'); ?>"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item">Daily Purchases</li>
    </ul>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="tile mb30">
            <div class="tile-title-w-btn">
                <div class="title">
                    <h3><i class="feather icon-users"></i> Assign Quantities</h3>
                </div>
            </div>
            <div class="tile-content" id="tile-content">
                <?php if($permissions['list_users']==TRUE) { ?>
                <div id="usersLists"></div>
				<table class="table table-bordered" id="orderss">
				 <thead>
				  <tr>
				  <th>Sl No.</th>
				  <th>Product Name</th>
				  <th>Available Quantity(KG)</th>
				  <th>Provide Quantity(KG)</th>
				  <th>Delivery Guy(DG)</th>
				  <th>Comments</th>
				  <th>Action</th>
				  </tr>
				 </thead>
				 <tbody>
				 <?php if (!empty($purchases)): $i = 1; foreach ($purchases as $purchase): ?>
				     <tr>
					 <td><?= $i; ?></td>
					 <td><input type="hidden" class="form-control" name="product_id" value="<?= $purchase->product_id; ?>" ><?= $purchase->name; ?></td>
					 <td><input type="hidden" class="form-control" name="purchase_id" value="<?= $purchase->purchase_id; ?>" readonly><?= _availableQuantity($purchase->purchase_id); ?></td>
					 <td><input type="number" class="form-control" name="assigned_quantity" placeholder="Enter Quantity"></td>
					 <td><select class="form-control" name="user_id" id="user_id"><option value="">--Select Delivery Guy--</option><?php  echo _users(5, ''); ?></select></td>
					 <td><input type="text" class="form-control" name="comments" placeholder="Enter Comments"></td>
					 <td><button name="update_quantity" id="update_quantity" class="btn btn-success" onclick="submit_purchase(this, '<?php echo$purchase->R_ID; ?>')">Submit</button></td>
					 </tr>
				   <?php $i++; endforeach;
    endif;
?>
				 </tbody>
				</table>
                <?php } ?>
            </div>
			<div class="tile-title-w-btn">
                <div class="title">
                    <h3><i class="feather icon-users"></i> List of Today's Assignments</h3>
                </div>
            </div>
			
			 <div class="tile-content">
			    <?php $d_users = _deliveryGuys(); if($permissions['list_users']==TRUE) { ?>
                <div id="usersLists"></div>
				<table class="table table-bordered" id="orderss">
				 <thead>
				  <?php $products = _allProducts(); ?>
				  <tr>
				  <th>Sl No.</th>
				  <th>Delivery Guy</th>
				  <th colspan="<?= count($products); ?>" class="text-center">Assigned Quantities(KG)</th>
				  </tr>
				  <tr>
				  <th></th>
				  <th></th>
				  <?php foreach($products as $rows){ ?>
				  <th><?= $rows->name; ?></th>
				  <?php } ?>
				  </tr>
				 </thead>
				 <tbody>
				 <?php if (!empty($d_users)): $i = 1; foreach ($d_users as $u_row): ?>
				     <tr>
					 <td><?= $i; ?></td>
					 <td><?= $u_row->full_name; ?></td>
					 <?php foreach($products as $rows){ ?>
				        <td><?php $data['user_id'] = $u_row->id;
				                  $data['product_id'] = $rows->id;
						          $sdata = $this->inventory_model->get_assignMent($data); echo $sdata['assigned_quantity']; ?></td>
				     <?php } ?>
<!--					 <td><span class="badge badge-success">Active</span> <span class="badge badge-danger">Inctive</span></td>-->
					 </tr>
				   <?php $i++; endforeach;
    endif;
?>
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

<script>
function showAlert(type,head,message){
        $.toast({heading: head ,text: message,loader: false,position : 'top-right',showHideTransition: 'fade', icon: type });
    }
function submit_purchase(e, r_id){
	var bURL = '<?php echo base_url(); ?>';
	//alert(r_id)
	//debugger
        var available = '<?= _availableQuantity($purchase->purchase_id); ?>';
        var product_id = $(e).closest("tr").find('td:eq(1)').find('input').val();
        var purchase_id = $(e).closest("tr").find('td:eq(2)').find('input').val();
        var assigned_quantity = $(e).closest("tr").find('td:eq(3)').find('input').val();
        var user_id = $(e).closest("tr").find('td:eq(4)').find('select').val();
        var comments = $(e).closest("tr").find('td:eq(5)').find('input').val();
		if(assigned_quantity == ''){
			showAlert('warning','Invalid Quantity', 'Please add some quantity to assign.');
			return false;
		}if(parseInt(assigned_quantity) > parseInt(available)){
			showAlert('warning','Invalid Quantity', 'Assign quantity will be less then or equal to '+available);
			return false;
		}if(user_id == ''){
			showAlert('warning','Invalid User', 'Please select Delivery Guy First.');
			return false;
		}
   		$.ajax({
   		  url:bURL+'admin/inventory/assign_inventory',
   		  type : "POST",
   		  data: {product_id:product_id, purchase_id:purchase_id, assigned_quantity:assigned_quantity, user_id:user_id, comments:comments},
   		  success:function(res){
			showAlert('success','Assigned', 'Material successfully assigned.');
			setTimeout(function(){ window.location.reload(); }, 1000);
			//$("#tile-content").load(location.href+"#tile-content");
   		  }
   		});
   	  
   	  
   	} 

</script>