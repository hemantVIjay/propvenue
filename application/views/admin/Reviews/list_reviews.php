<div class="pg-content mb-4">
   <div class="tbl-resp">
      <table class="table tbl-custom" style="width:100%">
         <thead>
            <tr>
               <th>SNo.</th>
               <th>Property Listing</th>
               <th>Stars</th>
               <th>User/Customer</th>
               <th>Is Published</th>
               <th>Message/Comments</th>
               <th>Date Posted</th>
               <th>Publish / Delete</th>
            </tr>
         </thead>
         <tbody>
            <?php $i=0; if(!empty($Reviews)){
               foreach($Reviews as $key=>$row){ $details = _listingDetails($row->listing_id);?>
            <tr>
               <td><?= $i+1;?></td>
               <td><a href="<?php if(isset($details) && !empty($details)){ echo base_url($details->url); }else{ echo'javascript:;'; }?>" target="_blank"><?= @$details->url;?></a></td>
               <td><?= $row->stars;?></td>
               <td><?php $usr = get_user($row->user_id); if(!empty($usr)){ echo$usr['full_name']; }?></td>
               <td><?php if($row->is_visible==''||$row->is_visible=='0'){ ?><label class="badge bg-warning">Not Published</label><?php }else{ ?><label class="badge bg-success">Published</label><?php } ?></td>
               <td><?= $row->message;?></td>
               <td><?= $row->date_publish;?></td>
               <td class="table-action" style="display:flex;">
			   <a class="form-check form-switch">
			   <input class="form-check-input" type="checkbox" <?php if($row->is_visible!=''&&$row->is_visible!='0'){ echo'checked'; } ?> id="flexSwitchCheckDefault" value="1" data-id="<?= $row->id; ?>" onchange="publishReview(this);">
			   </a>
                  <a class="ms-2" href="javascript:vooid(0);" onclick="deleteReview(this);" data-id="<?= $row->id; ?>">
                  <i class="bi bi-trash"></i>
                  </a>
               </td>
            </tr>
            <?php $i++; } }else{ ?>
			<tr>
			 <td colspan="10" class="text-center">NO RECORDS</td>
			</tr>
			<?php } ?>
         </tbody>
      </table>
      <div id="pagination" class="mt10"><?= $pagination; ?></div>
   </div>
</div>
<script>
 var baseUrl=$('base').attr("href");
 function publishReview(e){
   var id = $(e).data('id');	
	if(id!=''){
	if($(e).is(":checked")==true){
		 vl = 1;
	   }else{
		 vl = 0;  
	   }
	     $.ajax({
   			type: 'POST',
   			url: baseUrl + 'admin/reviews/publish_Review',
   			data: {id:id,vl:vl},
   			async: false,
   			success: function (res) {
				showAlerts("success",'Review successfully updated.');
				$(".tbl-resp").load(location.href + " .tbl-resp");

   			},
   			error: function () {
   				
   			}
   	 }); 
   }
 }
 
 function deleteReview(e){
   var id = $(e).data('id');	
	if(id!=''){
	     $.ajax({
   			type: 'POST',
   			url: baseUrl + 'admin/reviews/delete_Review',
   			data: {id:id},
   			async: false,
   			success: function (res) {
				showAlerts("success",'Review successfully deleted.');
				$(".tbl-resp").load(location.href + " .tbl-resp");
   			},
   			error: function () {
   				
   			}
   	 }); 
   }
 }
</script>