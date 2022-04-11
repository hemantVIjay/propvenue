<link href="<?= base_url(); ?>assets/css/jquery.steps.css" rel="stylesheet">
<script src="<?= base_url(); ?>assets/js/jquery.steps.min.js"></script>
<script>
   $(function ()
   {
       $("#wizard").steps({
           headerTag: "h2",
           bodyTag: "section",
           transitionEffect: "slideLeft",
           stepsOrientation: "vertical",
            // Triggered when clicking the Previous/Next buttons
           onStepChanging: function(e, currentIndex, newIndex) {
			  var isValidStep = validate_data();
              if (isValidStep === false || isValidStep === null) {
                    return false;
              }
              return true;
            },
		   onFinished: function (event, currentIndex) {
			  $("#post_property").submit();
			}
       });
   });
   
   function validate_data(){
	   var pvIWT  = getRadioValue('pvIWT');
	   var propertyType  = getRadioValue('propertyType');
	   var pvPTYP  = getRadioValue('pvPTYP');
	   var pvCONSTS  = getRadioValue('pvCONSTS');
	   var pvBHK  = getRadioValue('pvBHK');
	   var pvBTH  = getRadioValue('pvBTH');
	   var pvBLCNY  = getRadioValue('pvBLCNY');
	   var pvFRNTYP  = getRadioValue('pvFRNTYP');
	   var pvOPNPRK  = getRadioValue('pvOPNPRK');
	   var pvCVRPRK  = getRadioValue('pvCVRPRK');
	   var cost  = document.getElementById('cost').value;
	   var maintenance_charges  = document.getElementById('maintenance_charges').value;
	   var builtup_area  = document.getElementById('builtup_area').value;
	   var city  = document.getElementById('city').value;
	   var locality  = document.getElementById('locality').value;
	   
	  if(pvIWT==undefined || pvIWT==''){
		  showAlert('danger', "Please select one option for I want to.")
         return false;		  
	  }if(propertyType==undefined || propertyType==''){
		   showAlert('danger', "Please select one option in Property Type.")
         return false;		  
	  }if(pvPTYP==undefined || pvPTYP==''){
		    showAlert('danger', "Please select one option in Property category.")
         return false;		  
	  }if(pvCONSTS==undefined || pvCONSTS==''){
		    showAlert('danger', "Please select one option in Construction status.")
         return false;		  
	  }if(pvBHK==undefined || pvBHK==''){
		    showAlert('danger', "Please select one option in No. of Bedrooms.")
         return false;		  
	  }if(pvBTH==undefined || pvBTH==''){
		    showAlert('danger', "Please select one option in No. of Bathrooms.")
         return false;		  
	  }if(pvBLCNY==undefined || pvBLCNY==''){
		    showAlert('danger', "Please select one option in No. of Balconies.")
         return false;		  
	  }if(pvFRNTYP==undefined || pvFRNTYP==''){
		    showAlert('danger', "Please select one option in Furnish Type.")
         return false;		  
	  }if(pvOPNPRK==undefined || pvOPNPRK==''){
		    showAlert('danger', "Please select one option in Open Parking.")
         return false;		  
	  }if(pvCVRPRK==undefined || pvCVRPRK==''){
		    showAlert('danger', "Please select one option in Covered Parking.")
         return false;		  
	  }if(cost==undefined || cost==''){
		    showAlert('danger', "Please enter property cost.")
         return false;		  
	  }if(maintenance_charges==undefined || maintenance_charges==''){
		    showAlert('danger', "Please enter maintenance charges.")
         return false;		  
	  }if(builtup_area==undefined || builtup_area==''){
		 showAlert('danger', "Please enter builtup area in SQMTR.")
         return false;		  
	  }

   }
 
function getRadioValue(groupName) {
    var _result;
    try {
        var o_radio_group = document.getElementsByName(groupName);
        for (var a = 0; a < o_radio_group.length; a++) {
            if (o_radio_group[a].checked) {
                _result = o_radio_group[a].value;
                break;
            }
        }
    } catch (e) { }
    return _result;
}    
</script>
<div class="container">
   <div class="row justify-content-center mt-4 mb-4">
     <form name="post_property" id="post_property" method="POST" action="<?= base_url();?>properties/create_property" enctype="multipart/form-data" accept-charset="utf-8">
      <div class="col-xl-10 col-lg-11 col-md-12">
         <div id="wizard">
            <h2>Property Profile</h2>
            <section data-step="0">
               <div class="mb-4">
			      <label class="required">I want to</label>
                  <div class="d-flex flex-wrap bdgchkrdo">
                     <?php echo _pFor(''); ?>
                  </div>
               </div>
               <div class="mb-4">
                  <label class="required">Property Type</label>
                  <div class="row">
                     <div class="col-xl-8 col-md-10 d-flex">
                        <div class="box2RB">
                           <?php echo _pTypes(''); ?>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex flex-wrap bdgchkrdo">
                     <?php echo _p_categories(''); ?>
                  </div>
               </div>
               <div class="mb-4">
                  <label class="required">Construction Status</label>
                  <div class="d-flex flex-wrap bdgchkrdo">
                     <?php echo _constructionStatus(''); ?>
                  </div>
               </div>
               <div class="mb-4">
                  <label class="required">BHK</label>
                  <div class="d-flex flex-wrap bdgchkrdo">
                     <?php echo _floorTypes(''); ?>
                     </span>
                  </div>
               </div>
               <div class="mb-4">
                  <label class="required">Bathroom</label>
                  <div class="d-flex flex-wrap bdgchkrdo">
                     <?php echo _bathrooms(''); ?>
                  </div>
               </div>
               <div class="mb-4">
                  <label class="required">Balcony</label>
                  <div class="d-flex flex-wrap bdgchkrdo">
                     <?php echo _balconies(''); ?>
                  </div>
               </div>
               <div class="mb-4">
                  <label class="required">Furnish Type</label>
                  <div class="d-flex flex-wrap bdgchkrdo">
                     <?php echo _furnishType(''); ?>
                  </div>
               </div>
               <div class="mb-4">
                  <label class="required">Open Parking</label>
                  <div class="d-flex flex-wrap bdgchkrdo">
                     <?php echo _openParkings(''); ?>
                  </div>
               </div>
               <div class="mb-4">
                  <label class="required">Covered Parking</label>
                  <div class="d-flex flex-wrap bdgchkrdo">
                     <?php echo _coverParkings(''); ?>
                  </div>
               </div>

			   <div class="mb-4">
                  <label>Amenities</label>
                  <div class="row gx-3">
                     <?php $amenities = _amenities(); foreach($amenities as $key=>$amenity){ ?>
			   <div class="col-xl-3 col-md-4 mb-3">
						 <div class="pv-amenits">
							 <input id="indoor_<?= $key+1;?>" type="checkbox" name="pvAMNTS[]" value="<?= $amenity->id; ?>">
							 <label for="indoor_<?= $key+1;?>">
								<img src="<?= base_url('uploads/amenities/').$amenity->icon; ?>" class="img-fluid">
								<div class="pv-amenitsn"><?= $amenity->name; ?></div>
							 </label>
						  </div>
                     </div>
               <?php } ?>
                  </div>

               <div class="row">
                  <div class="col-6 mb-4">
                     <div class="form-floating pfff">
                        <input type="text" class="form-control" name="cost" id="cost" placeholder="Cost">
                        <label for="cost" class="required">Cost</label>
                     </div>
                  </div>
                  <div class="col-6 mb-4">
                     <div class="form-floating pfff">
                        <input type="text" class="form-control" name="maintenance_charges" id="maintenance_charges" placeholder="Maintenance Charges/ month">
                        <label for="maintenance_charges">Maintenance Charges/ month</label>
                     </div>
                  </div>
                  <div class="col-6 mb-4">
                     <div class="form-floating pfff">
                        <input type="text" class="form-control" name="builtup_area" id="builtup_area" placeholder="Built Up Area">
                        <label for="builtup_area" class="required">Built Up Area</label>
                     </div>
                  </div>
                  <div class="col-6 mb-4">
                     <div class="form-floating pfff">
                        <input type="text" class="form-control" name="carpet_area" id="carpet_area" placeholder="Carpet Area (Optional)">
                        <label for="carpet_area">Carpet Area (Optional)</label>
                     </div>
                  </div>
               </div>
            </section>
            <h2>Location</h2>
            <section data-step="1">
               <div class="form-floating pfff mb-4">
                  <input type="text" class="form-control" name="city" id="city" placeholder="City">
                  <label for="city" class="required">City</label>
               </div>
               <div class="form-floating pfff mb-4">
                  <input type="text" class="form-control" name="project" id="floatingInput" placeholder="Building/ Project/ Society">
                  <label for="floatingInput">Building/ Project/ Society (Optional)</label>
               </div>
               <div class="form-floating pfff mb-4">
                  <input type="text" class="form-control" name="locality" id="locality" placeholder="Locality">
                  <label for="locality" class="required">Locality</label>
               </div>
            </section>
            <h2>Photo</h2>
            <section  data-step="2">
               <label class="required">Upload Photo (Atleast 10 photo: Bedroom, Hall, Kitchen, Bathroom, Balcony etc.)</label>
               <div class="addlt" style="text-align:right;"><a href="javascript:;"  onclick="addRow('gallery');" ><i class="bi bi-plus-circle-fill me-1"></i>Add Row</a>
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
         </section>
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
	  

	  // Remove a few plugins from the default setup.
ClassicEditor
    .create( document.querySelector( '#ckedtr' ), {
        removePlugins: [ 'Heading', 'Link' ],
        toolbar: [ 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' ]
    } )
    .catch( error => {
        console.log( error );
    } );

</script>
