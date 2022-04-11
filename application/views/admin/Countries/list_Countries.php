<div class="row">
   <div class="col-12 col-xl-4">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title">Add Countries</h5>
         </div>
         <div class="card-body">
            <form method="POST" action="<?= base_url('admin/states/add_states'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
               <div class="mb-3">
                  <label class="form-label">State Name</label>
                  <input name="amenity_name" type="text" class="form-control" placeholder="Enter State here...">
               </div>
               <button type="submit" class="btn btn-primary">Save</button>
            </form>
         </div>
      </div>
   </div>
   <div class="col-12 col-xl-8">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title">Countries Lists</h5>
         </div>
         <div style="overflow:auto;height:525px;">
		 <table class="table" style="width:100%;height:100%;">
            <thead>
               <tr>
                  <th style="width:12%;">Sr. No.</th>
                  <th style="width:40%;">Country Name</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php $i=0;
			   foreach($Countries as $key=>$row){ $cls = ($i % 2); ?>
			   <tr class="<?php if($cls==0){ ?>table-success<?php } ?>">
                  <td><?= $i+1; ?></td>
                  <td><?= $row->name; ?></td>
                  <td class="table-action">
                     <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle">
                           <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                        </svg>
                     </a>
                     <a href="<?= base_url('admin/amenities/delete_amenities/').$row->id; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle">
                           <polyline points="3 6 5 6 21 6"></polyline>
                           <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        </svg>
                     </a>
                  </td>
               </tr>
			   <?php $i++; } ?>
            </tbody>
         </table>
		 </div>
      </div>
   </div>
</div>