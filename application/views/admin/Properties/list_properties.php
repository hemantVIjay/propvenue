<div class="pg-content mb-4">
   <div class="tbl-resp">
      <table class="table tbl-custom" style="width:100%">
         <thead>
            <tr>
               <th>SNo.</th>
               <th>Code</th>
               <th>Name</th>
               <th>Property Type</th>
               <th>Locality</th>
               <th>Address</th>
               <th>Area</th>
               <th>Status</th>
               <th>Gallery</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php $i=0;
               if(!empty($Properties)){ foreach($Properties as $key=>$row){ ?>
            <tr>
               <td><?= $i+1;?></td>
               <td><?= $row->code;?></td>
               <td><?= $row->property_name;?></td>
               <td><?= $row->property_name;?></td>
               <td><?= $row->property_name;?></td>
               <td><?= $row->property_address;?></td>
               <td><?= $row->builtup_area;?></td>
               <td><?= $row->property_name;?></td>
               <td><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-parent-id="<?= $row->id;?>">
                  <i class="bi bi-plus-circle-fill me-1"></i>Gallery
                  </a>
               </td>
               <td class="table-action">
                  <a href="<?= base_url('admin/properties/edit_property/').$row->id; ?>">
                  <i class="bi bi-pencil"></i>
                  </a>
                  <a class="ms-2" href="<?= base_url('admin/properties/delete_property/').$row->id; ?>">
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
        <form method="POST" action="<?= base_url('admin/properties/upload_propertyImages'); ?>" id="img-upload-form" enctype="multipart/form-data" accept-charset="utf-8">
		<input type="hidden" name="property_id" id="property_id">
		 <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Property Gallery</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body" style="max-height:400px;min-height:400px;overflow-y:auto;">

		 <!--Upload Images & Video-->
		 <div class="pvfp-tab gllry-tabs">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
				  <li class="nav-item" role="presentation">
					<button class="nav-link active" id="elevgt-tab" data-bs-toggle="tab" data-bs-target="#elevgt" type="button" role="tab" aria-controls="elevgt" aria-selected="true">Elevation</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="vdogt-tab" data-bs-toggle="tab" data-bs-target="#vdogt" type="button" role="tab" aria-controls="vdogt" aria-selected="false">Video</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="cnstgt-tab" data-bs-toggle="tab" data-bs-target="#cnstgt" type="button" role="tab" aria-controls="cnstgt" aria-selected="false">Construction Updates</button>
				  </li>
				  <li class="nav-item" role="presentation">
					<button class="nav-link" id="nbhdgt-tab" data-bs-toggle="tab" data-bs-target="#nbhdgt" type="button" role="tab" aria-controls="nbhdgt" aria-selected="false">Neighbourhood</button>
				  </li>
				</ul>
				<div class="tab-content py-4" id="myTabContent">
				  <div class="tab-pane fade show active" id="elevgt" role="tabpanel" aria-labelledby="elevgt-tab">
						<div class="row gx-3">
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/delhi.jpg" class="img-fluid" />
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/faridabad.jpg" class="img-fluid" />
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/ghaziabad.jpg" class="img-fluid" />
						</div>
						</div>
				  </div>
				  <div class="tab-pane fade" id="vdogt" role="tabpanel" aria-labelledby="vdogt-tab">
						<div class="row gx-3">
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/delhi.jpg" class="img-fluid" />
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/faridabad.jpg" class="img-fluid" />
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/ghaziabad.jpg" class="img-fluid" />
						</div>
						</div>
				  </div>
				  <div class="tab-pane fade" id="cnstgt" role="tabpanel" aria-labelledby="cnstgt-tab">
					<div class="row gx-3">
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/delhi.jpg" class="img-fluid" />
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/faridabad.jpg" class="img-fluid" />
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/ghaziabad.jpg" class="img-fluid" />
						</div>
						</div>
				  </div>
				  <div class="tab-pane fade" id="nbhdgt" role="tabpanel" aria-labelledby="nbhdgt-tab">
					<div class="row gx-3">
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/delhi.jpg" class="img-fluid" />
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/faridabad.jpg" class="img-fluid" />
						</div>
						<div class="col-xl-2 col-md-3 col-sm-4 col-6">
							<img src="<?= base_url(); ?>assets/images/cities/ghaziabad.jpg" class="img-fluid" />
						</div>
						</div>
				  </div>
				</div>
			</div>

		 <div class="addlt" style="text-align:right;"><a href="javascript:;" onclick="addRow('gallery');" ><i class="bi bi-plus-circle-fill me-1"></i>Add Row</a>
               <a href="javascript:;" onclick="deleteRow('gallery');" class="ms-2"><i class="bi bi-dash-circle-fill me-1"></i>Delete Row</a>
            </div>
            <div class="tbl-resp">
               <table class="table tbl-custom" style="width:100%">
                  <thead>
                     <tr>
                        <th width="50">SNo.</th>
                        <th width="250">Upload Image</th>
                        <th width="150">Category</th>
                        <th width="150">Caption</th>
                     </tr>
                  </thead>
                  <tbody id="gallery">
                     <tr>
                        <td><input type="checkbox"></td>
                        <td><input type="file" class="form-control" name="image_name[]"/></td>
                        <td>
                           <select class="form-select" name="image_type[]">
                              <option value="Elevation">Elevation</option>
                              <option value="Video">Video</option>
                              <option value="Construction Updates">Construction Updates</option>
                              <option value="Neighbourhood">Neighbourhood</option>
                           </select>
                        </td>
                        <td><input type="text" class="form-control" name="image_desc[]"/></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="modal-footer">
            <div class="mt-3">
               <button type="submit" class="btn btn-primary">Submit</button>
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
		$(e.currentTarget).find('input[name="property_id"]').val(bookId);
	 });
	  
</script>
