<link href="<?= base_url(); ?>assets/plugins/datepicker/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
<style>
   .reraDetails{
   display:none;
   }
   #pty_flat,#pty_plot{
   display:none;
   }
</style>
<form method="POST" action="<?= base_url('admin/properties/update_property'); ?>" id="img-upload-form" enctype="multipart/form-data" accept-charset="utf-8">
<input type="hidden" name="id" value="<?=$id; ?>">
   <div class="pg-content mb-4">
      <div class="row">
         <div class="col-xl-12 col-md-12">
            <div class="cbx">
               <div class="mb-4">
                  <label class="required">Property For</label>
                  <div class="d-flex flex-wrap bdgchkrdo">
                     <?php echo _pFor($info->property_for); ?>
                  </div>
               </div>
               <div class="mb-4">
                  <label class="required">Property Type</label>
                  <div class="row">
                     <div class="col-xl-8 col-md-10 d-flex">
                        <div class="box2RB">
						   <?php echo _pTypes($info->property_type); ?>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex flex-wrap bdgchkrdo">
                     <?php echo _p_categories($info->property_category); ?>
                  </div>
               </div>
            </div>
            <div class="mb-4">
               <label class="required">Construction Status</label>
               <div class="d-flex flex-wrap bdgchkrdo">
                  <?php echo _constructionStatus($info->construction_status); ?>
               </div>
            </div>
            <div class="mb-4">
               <label class="required">BHK</label>
               <div class="d-flex flex-wrap bdgchkrdo">
                  <?php echo _floorTypes($info->bedrooms); ?>
               </div>
            </div>
            <div class="mb-4">
               <label class="required">Bathroom</label>
               <div class="d-flex flex-wrap bdgchkrdo">
                  <?php echo _bathrooms($info->bathrooms); ?>
               </div>
            </div>
            <div class="mb-4">
               <label class="required">Balcony</label>
               <div class="d-flex flex-wrap bdgchkrdo">
			   <?php echo _balconies($info->balcony); ?>
               </div>
            </div>
            <div class="mb-4">
               <label class="required">Furnish Type</label>
               <div class="d-flex flex-wrap bdgchkrdo">
                  <?php echo _furnishType($info->furnish_type); ?>
               </div>
            </div>
            <div class="mb-4">
               <label class="required">Open Parking</label>
               <div class="d-flex flex-wrap bdgchkrdo">
                  <span class="chkrdobtn">
                  <input id="pv0opnprk" type="radio" name="pvOPNPRK" value="0">
                  <label for="pv0opnprk">0</label>
                  </span>
                  <span class="chkrdobtn">
                  <input id="pv1opnprk" type="radio" name="pvOPNPRK" value="1">
                  <label for="pv1opnprk">1</label>
                  </span>
                  <span class="chkrdobtn">
                  <input id="pv2opnprk" type="radio" name="pvOPNPRK" value="2">
                  <label for="pv2opnprk">2</label>
                  </span>
                  <span class="chkrdobtn">
                  <input id="pv3opnprk" type="radio" name="pvOPNPRK" value="3">
                  <label for="pv3opnprk">3</label>
                  </span>
                  <span class="chkrdobtn">
                  <input id="pv3popnprk" type="radio" name="pvOPNPRK" value="4">
                  <label for="pv3popnprk">3+</label>
                  </span>
               </div>
            </div>
            <div class="mb-4">
               <label class="required">Covered Parking</label>
               <div class="d-flex flex-wrap bdgchkrdo">
                  <span class="chkrdobtn">
                  <input id="pv0cvrprk" type="radio" name="pvCVRPRK" value="0">
                  <label for="pv0cvrprk">0</label>
                  </span>
                  <span class="chkrdobtn">
                  <input id="pv1cvrprk" type="radio" name="pvCVRPRK" value="1">
                  <label for="pv1cvrprk">1</label>
                  </span>
                  <span class="chkrdobtn">
                  <input id="pv2cvrprk" type="radio" name="pvCVRPRK" value="2">
                  <label for="pv2cvrprk">2</label>
                  </span>
                  <span class="chkrdobtn">
                  <input id="pv3cvrprk" type="radio" name="pvCVRPRK" value="3">
                  <label for="pv3cvrprk">3</label>
                  </span>
                  <span class="chkrdobtn">
                  <input id="pv3pcvrprk" type="radio" name="pvCVRPRK" value="4">
                  <label for="pv3pcvrprk">3+</label>
                  </span>
               </div>
            </div>
			<div class="row">
            <div class="col-md-12 mb-3">
               <label class="required">Property Name</label>
               <input type="text" class="form-control" name="property_name" autocomplete="Off" required value="<?= $info->property_name?>"/>
            </div>
			<div class="col-md-12 mb-3">
               <label class="required">Description/Details</label>
               <textarea type="text" class="form-control" name="description" autocomplete="Off" required id="description"><?= $info->description?></textarea>
            </div>
            </div>
            <div class="row">
               <div class="col-md-3 mb-3">
                  <label class="required">City</label>
                  <select class="form-select" name="city" id="city">
                     <option value="">--Select--</option>
                     <?= _cities(''); ?>
                  </select>
               </div>
			   <div class="col-md-3 mb-3">
                  <label class="required">Location</label>
                  <select class="form-select" name="location" onchange="location_details(this);">
                     <option value="">--Select--</option>
                     <?= _localities(''); ?>
                  </select>
               </div>               
               <div class="col-md-3 mb-3">
                  <label class="required">Builder</label>
                  <select class="form-select" name="district" id="district">
                     <option value="">--Select--</option>
                     <?= _districts(''); ?>
                  </select>
               </div>
               <div class="col-md-3 mb-3">
                  <label class="required">Project</label>
                  <select class="form-select" name="state"  id="state">
                     <option value="">--Select--</option>
                     <?= _states(''); ?>
                  </select>
               </div>
            </div>
            <div class="row">
               <div class="col-6 mb-4">
                  <div class="form-floating pfff">
                     <input type="text" class="form-control" name="cost" id="cost" placeholder="Cost" value="<?= $info->cost;?>">
                     <label for="cost" class="required">Cost</label>
                  </div>
               </div>
               <div class="col-6 mb-4">
                  <div class="form-floating pfff">
                     <input type="text" class="form-control" name="maintenance_charges" id="maintenance_charges" placeholder="Maintenance Charges/ month" value="<?= $info->maintenance_charges;?>">
                     <label for="maintenance_charges">Maintenance Charges/ month</label>
                  </div>
               </div>
               <div class="col-6 mb-4">
                  <div class="form-floating pfff">
                     <input type="text" class="form-control" name="builtup_area" id="builtup_area" placeholder="Built Up Area" value="<?= $info->builtup_area;?>">
                     <label for="builtup_area" class="required" >Built Up Area</label>
                  </div>
               </div>
               <div class="col-6 mb-4">
                  <div class="form-floating pfff">
                     <input type="text" class="form-control" name="carpet_area" id="carpet_area" placeholder="Carpet Area (Optional)" value="<?= $info->carpet_area;?>">
                     <label for="carpet_area">Carpet Area (Optional)</label>
                  </div>
               </div>
            </div>
         </div>
         <div class="cmnttl position-relative">Amenities</div>
         <div class="row gx-3">
            <?php $c_amenities = explode(',', $info->property_amenities);  $amenities = _amenities(); 
			foreach($amenities as $key=>$amenity){ $checked=''; if(in_array($amenity->id, $c_amenities)){ $checked='checked'; }?>
            <div class="col-xl-2 col-md-2 mb-3">
               <div class="pv-amenits">
                  <input id="indoor_<?= $key+1;?>" type="checkbox" name="pvAMNTS[]" value="<?= $amenity->id; ?>" <?= $checked; ?>>
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
            <input class="form-check-input" name="rera_approved" type="checkbox" id="rera_approved" value="1" <?php if($info->rera_approved=='1'){echo'checked'; } ?>>
            <span class="form-check-label">RERA Approved</span>
            </span>
         </div>
         <div class="col-xl-3 col-md-4 mb-3 reraDetails">
            <label class="required">RERA Registration Number</label>
            <input type="text" class="form-control" name="rera_registrationNumber" id="rera_registrationNumber" value="<?= $info->rera_registrationNumber;?>"/>
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
<script src="https://cdn.ckeditor.com/4.17.1/standard-all/ckeditor.js"></script>
<!--<script src="<?= base_url(); ?>assets/js/custom.js"></script>-->
<script type="text/javascript">
   var dataURL = $('base').attr("href");
     $(function () {
     if ($('#rera_approved').is(":checked")){
     $('.reraDetails').css('display','block');
      }else{
     $('.reraDetails').css('display','none');
     }
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
	 
	 
     function city_locations(ct) {
     var baseUrl=$('base').attr("href");
     var id = $(ct).val();
     $.ajax({
     type: "POST",
     url: baseUrl + "admin/properties/_cityLocations",
     data:{id:id},
     async: false,
     success: function (data) {
       var mdata = JSON.parse(data);
       $('#location').val(mdata['city']);
     },
     error: function () {
     
     }
     });
     }
	 
	 function location_details(loc) {
     var baseUrl=$('base').attr("href");
     var id = $(loc).val();
     $.ajax({
     type: "POST",
     url: baseUrl + "admin/properties/location_details",
     data:{id:id},
     async: false,
     success: function (data) {
       var mdata = JSON.parse(data);
       $('#city').val(mdata['city']);
       $('#district').val(mdata['district']);
       $('#state').val(mdata['state']);
       $('#country').val(mdata['country']);
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