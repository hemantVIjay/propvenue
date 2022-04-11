<div class="pg-content mb-4">
   <div class="tbl-resp">
      <table class="table tbl-custom" style="width:100%">
         <thead>
            <tr>
               <th>SNo.</th>
               <th>Code</th>
               <th>Name</th>
               <th>Project Type</th>
               <th>Locality</th>
               <th>Address</th>
               <th>Area</th>
               <th>Status</th>
               <th>Gallery</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php $i=0; if(!empty($Projects)){
               foreach($Projects as $key=>$row){ ?>
            <tr>
               <td><?= $i+1;?></td>
               <td><?= $row->code;?></td>
               <td><?= $row->project_name;?></td>
               <td><?= $row->project_type;?></td>
               <td><?= $row->locality_id;?></td>
               <td><?= $row->project_address;?></td>
               <td><?= $row->total_area;?></td>
               <td><?= $row->status;?></td>
               <td><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-parent-id="<?= $row->id;?>">
                  <i class="bi bi-plus-circle-fill me-1"></i>Gallery
                  </a>
               </td>
               <td class="table-action">
                  <a href="<?= base_url('admin/projects/edit_project/').$row->id; ?>">
                  <i class="bi bi-pencil"></i>
                  </a>
                  <a class="ms-2" href="<?= base_url('admin/projects/delete_project/').$row->id; ?>">
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <form method="POST" action="<?= base_url('admin/projects/upload_propertyImages'); ?>" id="img-upload-form" enctype="multipart/form-data" accept-charset="utf-8">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Project Gallery</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height:400px;min-height:400px;overflow-y:auto;">
               
            </div>
            <div class="modal-footer">
               <div class="mt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<script>
   function addRow(tableID) {
   var table = document.getElementById(tableID);
   var rowCount = table.rows.length;
   var row = table.insertRow(rowCount);
   var colCount = table.rows[0].cells.length;
   for (var i = 0; i < colCount; i++) {
   var newcell = row.insertCell(i);
   newcell.innerHTML = table.rows[0].cells[i].innerHTML;
   switch (newcell.childNodes[0].type) {
   	case "text":
   		newcell.childNodes[0].value = "";
   		var nod_id = newcell.childNodes[0].id.split("_");;
   		if(!isNaN(nod_id[1]))
   		newcell.childNodes[0].id = nod_id[0]+'_'+rowCount;
   		else
   		newcell.childNodes[0].id = nod_id[0]+'_'+nod_id[1]+'_'+rowCount;
   		break;
   	case "checkbox":
   		newcell.childNodes[0].checked = false;
   		var nod_id = newcell.childNodes[0].id.split("_");;
   		if(!isNaN(nod_id[1]))
   		newcell.childNodes[0].id = nod_id[0]+'_'+rowCount;
   		else
   		newcell.childNodes[0].id = nod_id[0]+'_'+nod_id[1]+'_'+rowCount;
   		break;
   	case "file":
   		newcell.childNodes[0].value = "";
   		var nod_id = newcell.childNodes[0].id.split("_");;
   		if(!isNaN(nod_id[1]))
   		newcell.childNodes[0].id = nod_id[0]+'_'+rowCount;
   		else
   		newcell.childNodes[0].id = nod_id[0]+'_'+nod_id[1]+'_'+rowCount;
   		break;	
   	case "select-one":
   		newcell.childNodes[0].selectedIndex = 0;
   		var nod_id = newcell.childNodes[0].id.split("_");;
   		if(!isNaN(nod_id[1]))
   		newcell.childNodes[0].id = nod_id[0]+'_'+rowCount;
   		else
   		newcell.childNodes[0].id = nod_id[0]+'_'+nod_id[1]+'_'+rowCount;
   		break;
   		
   }
   }		
   }
      
      function deleteRow(tableID) {
      try {
      var table = document.getElementById(tableID);
      var rowCount = table.rows.length;
      for(var i=0; i<rowCount; i++) {
      var row = table.rows[i];
      var chkbox = row.cells[0].childNodes[0];
      if(null != chkbox && true == chkbox.checked) {
      if(rowCount <= 1) {
      alert("Cannot delete all the rows.");
      break;
      }
      table.deleteRow(i);
      rowCount--;
      i--;
      }
      }
      }catch(e) {
      alert(e);
      }
      }
   
   $('#exampleModal').on('show.bs.modal', function(e) {
     var bookId = $(e.relatedTarget).data('parent-id');
     var url = '<?= base_url();?>admin/projects/galleryModal?id='+bookId;
	 $('.modal-body').load(url,function(){});
   });
    function confirmDelete(ev, bookId){
		var dataURL = '<?= base_url();?>admin/projects/deleteImg';
	 	if (!confirm("Do you want to delete")){
		  return false;
		}else{
			$.ajax({
			 type: 'POST',
			 url: dataURL,
			 data: {id:bookId},
			 async: false,
			 success: function (res) {
				window.location.reload();
			 },
			 error: function(){}
		  });
		}	
	}  
</script>