<link href="<?= base_url(); ?>assets/plugins/datepicker/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
<style>
   .reraDetails{
   display:none;
   }
   #pty_flat,#pty_plot{
   display:none;
   }
</style>
<form method="POST" action="<?= base_url('admin/properties/create_property'); ?>" id="img-upload-form" enctype="multipart/form-data" accept-charset="utf-8">
   <div class="pg-content mb-4">
      <div class="row">
         <div class="col-xl-12 col-md-12">
            <div class="cbx">
               <div class="mb-4">
                  <label class="required">Property For</label>
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
			<div class="row">
            <div class="col-md-12 mb-3">
               <label class="required">Property Name</label>
               <input type="text" class="form-control" name="property_name" autocomplete="Off" required />
            </div>
			<div class="col-md-12 mb-3">
               <label class="required">Description/Details</label>
               <textarea type="text" class="form-control" name="description" autocomplete="Off" required id="description"></textarea>
            </div>
            </div>
            <div class="row">
               <div class="col-md-3 mb-3">
                     <label class="required">City</label>
                     <select class="form-select" name="city" id="city">
                        <option value="">--Select--</option>
                     </select>
                  </div>
			   <div class="col-md-3 mb-3">
                     <label class="required">Locality</label>
                     <select class="form-select" name="location" id="location">
                        <option value="">--Select--</option>
                     </select>
               </div>               
               <div class="col-md-3 mb-3">
                  <label class="required">Builder</label>
                  <select class="form-select" name="builder" id="builder_id">
                     <option value="">--Select--</option>
                  </select>
               </div>
               <div class="col-md-3 mb-3">
                  <label class="required">Project</label>
                  <select class="form-select" name="project"  id="project_id">
                     <option value="">--Select--</option>
                  </select>
               </div>
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
         </div>
         <div class="cmnttl position-relative">Amenities</div>
         <div class="row gx-3">
            <?php $amenities = _amenities(); foreach($amenities as $key=>$amenity){ ?>
            <div class="col-xl-2 col-md-2 mb-3">
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
      </div>
      <hr />
      <div class="cmnttl position-relative">Main Image</div>
      <div class="col-6">
         <div class="col-xl-12 mb-3">
            <input type="file" class="form-control" name="main_image"/>
         </div>
      </div>
      <div class="cmnttl position-relative">Site Layout</div>
      <div class="col-6">
         <div class="col-md-12 mb-3">
            <label class="required">Upload Image</label>
            <input type="file" class="form-control" name="site_layout"/>
         </div>
      </div>
      <div class="cmnttl position-relative">Payment Option</div>
      <div class="col-6">
         <div class="col-xl-12 mb-3">
            <input type="file" class="form-control" name="payment_option"/>
         </div>
      </div>
      <hr />
      <div class="cmnttl position-relative">Bank Available</div>
      <div class="row">
         <?php $banks = _banks(); foreach($banks as $key=>$bank){ ?>
         <div class="col-xl-3 col-md-4">
            <span class="form-check">
            <input class="form-check-input" name="banks[]" type="checkbox" id="bank_<?= $key+1;?>" value="<?= $bank->id;?>">
            <span class="form-check-label"><?= $bank->name; ?></span>
            </span>
         </div>
         <?php } ?>
      </div>
      <hr />
      <div class="cmnttl position-relative">Certifications</div>
      <div class="row">
         <div class="col-xl-3 col-md-4">
            <span class="form-check">
            <input class="form-check-input" name="rera_approved" type="checkbox" id="rera_approved" value="1">
            <span class="form-check-label">RERA Approved</span>
            </span>
         </div>
         <div class="col-xl-3 col-md-4 mb-3 reraDetails">
            <label class="required">RERA Registration Number</label>
            <input type="text" class="form-control" name="rera_registrationNumber" id="rera_registrationNumber"/>
         </div>
      </div>
      <hr />
      <div class="btngroup">
         <button class="btn btn-primary">Submit</button>
         <button class="btn btn-outline-secondary ms-2">Reset</button>
      </div>
   </div>
   </div>
   </div>
   </div>
</form>
<script src="<?= base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datepicker/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?= base_url(); ?>assets/js/ckeditor.js"></script>
<!--<script src="<?= base_url(); ?>assets/js/custom.js"></script>-->
<script type="text/javascript">
   var dataURL = $('base').attr("href");
     $(function () {
         $('#dtpicker').datetimepicker({
             format: 'DD-MMM-YYYY'
         });
         $('#project_launch_date').datetimepicker({
             format: 'DD-MMM-YYYY'
         });
     });
     
        
   // CKEditor
   CKEDITOR.replace('description', {
      fullPage: true,
      extraPlugins: 'docprops',
      // Disable content filtering because if you use full page mode, you probably
      // want to  freely enter any HTML content in source mode without any limitations.
      allowedContent: true,
      height: 120,
      removeButtons: 'PasteFromWord'
    });
	 	
 $(function ($) {
	     'use strict';
		  initCities('city');
		  $('#location').select2();
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
		var localities = $('#location');
		$.ajax({
			type: 'POST',
			url: dataURL + 'admin/localities/fetch_locations',
			data: {cid:s_val},
			async: false,
			success: function (res) {
				if(res!=''){
				 mData = atob(res).split("@@");
				 localities.html(mData[0]);	
				 localities.select2().on("select2:select", function (e) {
						var s_element = $(e.currentTarget);
						var s_val = s_element.val();
						fetch_Projects(s_val);
					});
				}
			},
			error: function () {
				
			}
		}); 
	}
	
   function fetch_Projects(s_val){
	    var mData;
		var project_id = $('#project_id');
		$.ajax({
			type: 'POST',
			url: dataURL + 'admin/localities/fetch_projects',
			data: {cid:s_val},
			async: false,
			success: function (res) {
				if(res!=''){
				 mData = atob(res).split("@@");
				 project_id.html(mData[0]);	
				 project_id.select2();
				}
			},
			error: function () {
				
			}
		}); 
	}
	 function isNumberKey(txt, evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode == 46) {
          //Check if the text already contains the . character
          if (txt.value.indexOf('.') === -1) {
            return true;
          } else {
            return false;
          }
        } else {
          if (charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return false;
        }
        return true;
      }
     $('#rera_approved').change(function(){
     if ($(this).is(":checked")){
     $('.reraDetails').css('display','block');
      }else{
     $('.reraDetails').css('display','none');
     }
     });     
</SCRIPT>