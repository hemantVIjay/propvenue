<div class="row">
   <div class="col-12 col-xl-4">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title">Add Floor Type</h5>
         </div>
         <div class="card-body">
            <form method="POST" action="<?= base_url('admin/masters/create_floorType'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
               <div class="mb-3">
                  <label class="form-label">Property Type</label>
                  <input name="type_name" type="text" class="form-control" placeholder="Enter Type here...">
               </div>
               <div class="mb-3">
                  <label class="form-label w-100">Icon</label>
                  <input type="file" name="type_icon" accept=".svg" required>
                  <small class="form-text text-muted">Please choose only .svg files here.</small>
               </div>
               <button type="submit" class="btn btn-primary">Save</button>
            </form>
         </div>
      </div>
   </div>
   <div class="col-12 col-xl-8">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title">Floor Types Lists</h5>
         </div>
         <div style="overflow:auto;max-height:525px;">
		 <table class="table" style="width:100%;height:100%;">
            <thead>
               <tr>
                  <th style="width:12%;">Sr. No.</th>
                  <th style="width:55%;">Floor Type</th>
                  <th class="d-none d-md-table-cell" style="width:25%">Icon</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php $i=0; if(!empty($floorTypes)){ 
			   foreach($floorTypes as $key=>$row){ $cls = ($i % 2); ?>
			   <tr class="<?php if($cls==0){ ?>table-success<?php } ?>">
                  <td><?= $i+1; ?></td>
                  <td><?= $row->name; ?></td>
                  <td><img src="<?= base_url('uploads/propertyType/');?><?= $row->icon; ?>"/></td>
                  <td class="table-action">
                     <a href="#">
                        <i class="bi bi-pencil"></i>
                     </a>
                     <!--<a class="ms-2" href="<?= base_url('admin/masters/delete_banks/').$row->id; ?>">
                        <i class="bi bi-trash"></i>
                     </a>-->
                  </td>
               </tr>
			   <?php $i++; } }else{ ?>
   			   <tr>
			    <td colspan="4" class="text-center"> No Record Found</td>
			   </tr>
			   <?php } ?>
            </tbody>
         </table>
		 </div>
      </div>
   </div>
</div>