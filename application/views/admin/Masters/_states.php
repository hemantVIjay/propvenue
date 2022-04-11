<div class="row">
   <div class="col-12 col-xl-4">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title">Add States</h5>
         </div>
         <div class="card-body">
            <form method="POST" action="<?= base_url('admin/masters/add_states'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
			   <input type="hidden" name="id" value="<?php echo $record->id ?? '';?>">
               <div class="mb-3">
                  <label class="form-label">State Name</label>
                  <input name="name" type="text" class="form-control" placeholder="Enter State here..." value="<?php echo $record->name ?? '';?>">
               </div>
			   <div class="mb-3">
                  <label class="form-label">Country</label>
                  <select class="form-control" name="state" id="state_id">
				   <option value="">--Select Country--</option>
				   <?php  echo _countries($record->country_id); ?>
			    </select>
               </div>
			   <button type="submit" class="btn btn-primary">Save</button>
            </form>
         </div>
      </div>
   </div>
   <div class="col-12 col-xl-8">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title">States Lists</h5>
         </div>
         <div style="overflow:auto;max-height:525px;">
		 <table class="table" style="width:100%;height:100%;">
            <thead>
               <tr>
                  <th style="width:10%;">Sr. No.</th>
                  <th style="width:40%;">State Name</th>
                  <th style="width:35%;">Country</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               <?php $i=0; if(!empty($states)){
			   foreach($states as $key=>$row){ $cls = ($i % 2); ?>
			   <tr class="<?php if($cls==0){ ?>table-success<?php } ?>">
                  <td><?= $i+1; ?></td>
                  <td><?= $row->name; ?></td>
                  <td><?= $row->country_id; ?></td>
                  <td class="table-action">
                     <a href="<?= base_url('admin/masters/list_states/').$row->id; ?>">
                        <i class="bi bi-pencil"></i>
                     </a>
                     <!--<a class="ms-2" href="<?= base_url('admin/masters/delete_states/').$row->id; ?>">
                        <i class="bi bi-trash"></i>
                     </a>-->
                  </td>
               </tr>
			   <?php $i++; } }else{ ?>
			   <tr><td colspan="7" class="text-center">No Records Found.</td></tr>
			   <?php }?>
            </tbody>
         </table>
		 </div>
      </div>
   </div>
</div>
<script>
 var dataURL = $('base').attr("href");
 $(function ($) {
	     'use strict';
		  initCities('city_id');
		 });
		 function initCities(cid){			
			 $('#'+cid).select2({
					 placeholder: 'Select City',
					 ajax: {
						 url: dataURL+'admin/localities/search_cities',
						 dataType: 'json',
						 delay: 220,
						 processResults: function (data) {
						 return {
						  results: $.map(data, function (data) {
						   return {
							text: data.name,
							id: data.id
								  }
							 })
						   };
						 },
					 cache: true
				 }
			 }).on("select2:select", function (e) {
				var s_element = $(e.currentTarget);
				var s_val = s_element.val();
				fetchData(s_val);
			});			 
		 }
		 	function fetchData(s_val){
	    var mData, lData;
		var state = $('#state_id');
	    var country = $('#country_id');
		$.ajax({
			type: 'POST',
			url: dataURL + 'admin/localities/fetchCity_Details',
			data: {cid:s_val},
			async: false,
			success: function (res) {
				mData = atob(res).split("@@");
				state.html(mData[0]);
				country.html(mData[1]);
			},
			error: function () {
				
			}
		}); 
	}
</script>