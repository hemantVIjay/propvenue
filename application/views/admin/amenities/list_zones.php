<div class="app-title">
    <div class="title-holder">
        <h1><i class="feather icon-users"></i> <?= $this->lang->line("all_locations"); ?></h1>
        <p><?= $this->lang->line("text_users_subtitle"); ?></p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('admin/'); ?>"><i class="feather icon-home"></i></a></li>
        <li class="breadcrumb-item"><?= $this->lang->line("all_locations"); ?></li>
    </ul>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="tile mb30">
            <div class="tile-title-w-btn">
                <div class="title">
                    <h3><i class="feather icon-users"></i> <?= $this->lang->line("all_locations"); ?></h3>
                </div>
				<?php if($permissions['add_ticket_category']==TRUE) { ?>
                    <p><button type="button" id="addZoneButton" class="btn btn-theme-primary btn-oval trigger-button"><i class="lni-plus"></i> Add Zone</button></p>
                <?php } ?> 
            </div>
            <div class="tile-content">
                <?php if($permissions['list_users']==TRUE) { ?>
                <div id="usersList"></div>
				<table class="table table-bordered" id="orders">
				 <thead>
				  <tr>
				  <th>Sl No.</th>
				  <th>Zone Name</th>
				  <th>Status</th>
				  <th>Locations</th>
				  <th>Action</th>
				  </tr>
				 </thead>
				 <tbody>
				   <?php $i = 1; if (!empty($zones)): foreach ($zones as $row): ?>
					<tr>	
						<td><?= $i; ?></td>
						<td><?= $row->zone_name; ?></td>
						<td><?php if($row->status == 1){ echo'<label class="badge badge-success">Active</label>'; }else{ echo'<label class="badge badge-danger">Inactive</label>'; } ?></td>
						<td><?= _cityDetails($row->created_by)->country; ?></td>
						<td><input type="radio" id="status_<?= $row->id; ?>" name="status_<?= $row->id; ?>" value="1" <?php if($row->status == 1){ echo'checked'; } ?>/> <label class="badge badge-success">Active</label> <input type="radio" id="status_<?= $row->id; ?>" name="status_<?= $row->id; ?>" value="0" <?php if($row->status == 0){ echo'checked'; } ?>/> <label class="badge badge-danger">Inactive</label> &nbsp;&nbsp;
						<button type="button" id="addLocationButton" class="btn btn-theme-primary btn-oval trigger-button btn-sm addLocationButton" style="font-size: 12px; padding: 1px 8px;" data-id="<?= $row->id; ?>"><i class="app-menu-icon feather icon-map-pin" style="color:#fff;"></i> Add Zone</button>
						<a class="btn btn-theme-primary btn-oval btn-sm" style="font-size: 12px; padding: 1px 8px;"  href="<?= base_url('admin/locations/list_locations'); ?>/<?= $row->id; ?>" ><i class="app-menu-icon feather icon-map-pin" style="color:#fff;"></i> Locations</a>
						<a href="<?= base_url('admin/locations/list_users'); ?>" class="btn btn-theme-primary btn-oval btn-sm" style="font-size: 12px; padding: 1px 8px;" data-id="<?= $row->id; ?>"><i class="app-menu-icon feather icon-user" style="color:#fff;"></i> Assign To User</button>
						</td>
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
