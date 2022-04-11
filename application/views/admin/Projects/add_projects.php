<link href="<?= base_url(); ?>assets/plugins/datepicker/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet">
<style>
   .reraDetails{
   display:none;
   }
   #pty_flat,#pty_plot{
   display:none;
   }
</style>
<form method="POST" action="<?= base_url('admin/projects/create_project'); ?>" id="img-upload-form" enctype="multipart/form-data" accept-charset="utf-8">
   <div class="pg-content mb-4">
      <div class="row">
         <div class="col-xl-12 col-md-12">
            <div class="cbx">
               <div class="row">
                  <div class="col-md-12 mb-3">
                     <label class="required">Choose Builder</label>
                     <select class="form-select" name="builder" id="builder">
                        <option value="">--Select--</option>
                        <?= _builders(''); ?>
                     </select>
                  </div>
                  <div class="col-md-6 mb-3">
                     <label class="required">Project Name</label>
                     <input type="text" class="form-control" name="project_name" autocomplete="Off"/>
                  </div>
				  <div class="col-md-6 mb-3">
                     <label class="required">Title</label>
                     <input type="text" class="form-control" name="title" autocomplete="Off" placeholder="Title"/>
                  </div>
				  <div class="col-md-6 mb-3">
                     <label class="required">Summary & Description (Meta Tag)</label>
                     <textarea type="text" class="form-control" name="meta_description" autocomplete="Off" placeholder="Summary & Description (Meta Tag)"></textarea>
                  </div>
				  <div class="col-md-6 mb-3">
                     <label class="required">Keywords (Meta Tag)</label>
                     <textarea type="text" class="form-control" name="meta_keywords" autocomplete="Off" placeholder="Keywords (Meta Tag)"></textarea>
                  </div>
				  <div class="col-md-12 mb-3">
                     <label class="required">Is Featured</label>
                     <a class="form-check form-switch"><input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value="1" data-id="15" name="is_featured">
			         </a>
                  </div>
                  <div class="col-md-3 mb-3">
                     <label class="required">City</label>
                     <select class="form-select" name="city" id="city">
                        <option value="">--Select--</option>
                        <?= _cities(''); ?>
                     </select>
                  </div>
                  <div class="col-md-3 mb-3">
                     <label class="required">Locality</label>
                     <select class="form-select" name="location" id="location">
                        <option value="">--Select--</option>
                        <?= _localities(''); ?>
                     </select>
                  </div>
                  <div class="col-md-12 mb-3">
                     <label class="required">Address</label>
                     <input type="text" class="form-control" name="address" autocomplete="Off"/>
                  </div>
               </div>
               <hr />
               <div class="cmnttl position-relative">Choose Property Type</div>
               <div class="mb-4">
                  <label class="required">Property Type</label>
                  <div class="row">
                     <div class="col-xl-8 col-md-10 d-flex">
                        <div class="box2RB">
                           <?php echo _pTypes(1); ?>
                        </div>
                     </div>
                  </div>
                   <label class="required">Properties Category</label>
				      <div class="d-flex flex-wrap bdgchkrdo">
				       <?php echo _p_categories(''); ?>
                  </div>
               </div>
               <!--<div class="row">
                  <div class="col-md-6 mb-3">
                     <label class="required">Property Type</label>
                     <select class="form-select" id="choose_pty" name="p_type" onchange="changeDetails(this);">
                        <option value="">--Select--</option>
                        <?= _propertyType(''); ?>
                     </select>
                  </div>
                  </div>-->
            </div>
            <div class="ptyp" id="pty_flat">
               <div class="row">
                  <div class="col-md-4 mb-3">
                     <label class="required">No. of Towers</label>
                     <input type="text" class="form-control" name="no_of_towers" onkeypress="return isNumberKey(this, event);" autocomplete="Off"/>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="required">No. of Flats</label>
                     <input type="text" class="form-control" name="no_of_flats" onkeypress="return isNumberKey(this, event);" autocomplete="Off"/>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="required">Total Area (In Acres)</label>
                     <input type="text" class="form-control" name="total_area" onkeypress="return isNumberKey(this, event);" autocomplete="Off"/>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="required">Project Phase</label>
                     <select class="form-select" name="project_phase">
                        <option value="On Going">On Going</option>
                        <option value="Pre-Launch">Pre-Launch</option>
                        <option value="Completed">Completed</option>
                     </select>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="required">Architech Name</label>
                     <input type="text" class="form-control" name="architect_name" autocomplete="Off"/>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="required">Project Launch Date</label>
                     <input type="text" class="form-control calicon" id="dtpicker" data-toggle="datetimepicker" data-target="#dtpicker" name="project_start_date" autocomplete="Off"/>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="required">Launched Units</label>
                     <input type="text" class="form-control" name="launched_units" autocomplete="Off"/>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="required">Possesion Start Date</label>
                     <input type="text" name="possesion_start_date" autocomplete="Off" type="text" class="form-control calicon" id="possesion_start_date" data-toggle="datetimepicker" data-target="#possesion_start_date"/>
                  </div>
                  <div class="col-md-12 mb-3">
                     <label class="required">Project Overview</label>
                     <textarea class="form-control" rows="4" name="project_overview" id="description" autocomplete="Off"></textarea>
                  </div>
               </div>
               <hr />
               <div class="cmnttl position-relative">Add Specifications</div>
               <div class="row">
                  <div class="col-md-3 mb-3"><strong>Doors</strong></div>
                  <div class="col-md-9">
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="required">Internal</label>
                           <input type="text" class="form-control" name="specifications[doors_internal]" autocomplete="Off"/>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="required">External</label>
                           <input type="text" class="form-control" name="specifications[doors_external]" autocomplete="Off"/>
                        </div>
                     </div>
                  </div>
               </div>
               <hr />
               <div class="row">
                  <div class="col-md-3 mb-3"><strong>Flooring</strong></div>
                  <div class="col-md-9">
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="required">Balcony</label>
                           <input type="text" class="form-control" name="specifications[flooring_balcony]" autocomplete="Off"/>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="required">Kitchen</label>
                           <input type="text" class="form-control" name="specifications[flooring_kitchen]" autocomplete="Off"/>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="required">Living/Dining</label>
                           <input type="text" class="form-control" name="specifications[flooring_living_dining]" autocomplete="Off"/>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="required">Master Bedroom</label>
                           <input type="text" class="form-control" name="specifications[flooring_masterbedroom]" autocomplete="Off"/>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="required">Other Bedroom</label>
                           <input type="text" class="form-control" name="specifications[flooring_otherbedroom]" autocomplete="Off"/>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="required">Toilet</label>
                           <input type="text" class="form-control" name="specifications[flooring_toilet]" autocomplete="Off"/>
                        </div>
                     </div>
                  </div>
               </div>
               <hr />
               <div class="row">
                  <div class="col-md-3 mb-3"><strong>Walls</strong></div>
                  <div class="col-md-9">
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="required">Interior</label>
                           <input type="text" class="form-control" name="specifications[walls_interior]" autocomplete="Off"/>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="required">Kitchen</label>
                           <input type="text" class="form-control" name="specifications[walls_kitchen]" autocomplete="Off"/>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="required">Toilet</label>
                           <input type="text" class="form-control" name="specifications[walls_toilet]" autocomplete="Off"/>
                        </div>
                     </div>
                  </div>
               </div>
               <hr />
               <div class="row">
                  <div class="col-md-3 mb-3"><strong>Fittings</strong></div>
                  <div class="col-md-9">
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="required">Kitchen</label>
                           <input type="text" class="form-control" name="specifications[fittings_kitchen]" autocomplete="Off"/>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="required">Toilet</label>
                           <input type="text" class="form-control" name="specifications[fittings_toilet]" autocomplete="Off"/>
                        </div>
                     </div>
                  </div>
               </div>
               <hr />
               <div class="row">
                  <div class="col-md-3 mb-3"><strong>Others</strong></div>
                  <div class="col-md-9">
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="required">Windows</label>
                           <input type="text" class="form-control" name="specifications[others_windows]" autocomplete="Off"/>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="required">Frame Structure</label>
                           <input type="text" class="form-control" name="specifications[others_frame_structure]" autocomplete="Off"/>
                        </div>
                     </div>
                  </div>
               </div>
               <hr />
               <div class="cmnttl position-relative">Floor Plans</div>
               <div class="tbl-resp">
                  <table class="table tbl-custom" style="width:100%">
                     <thead>
                        <tr>
                           <th width="50">Select</th>
                           <th width="150">Room Sizes</th>
                           <th width="100">Description</th>
                           <th width="90">Bedrooms</th>
                           <th width="90">Bathrooms</th>
                           <th width="450">Unit Name</th>
                           <th width="150">Size(SqFt)</th>
                           <th width="150">Builtup Area</th>
                           <th width="150">BSP</th>
                           <th width="150">Total Price</th>
                           <th width="80">Plan Image</th>
                        </tr>
                     </thead>
                     <tbody id="floor_plans">
                        <tr>
                           <td><input type="hidden" name="floor_totalRoomSizes[]" id="allRooms_1">
                              <input type="checkbox" id="check_1">
                           </td>
                           <td><input type="hidden" name="floor_allRoomSizes[]" id="roomSizes_1">
                              <a href="javascript:void(0);" onclick="addRoom_Sizes(this);" style="text-decoration:underline;font-weight:900;">ADD SIZES</a>
                           </td>
                           <td><input type="hidden" name="floor_roomDesc[]" id="roomDesc_1">
                              <a href="javascript:void(0);" onclick="addDescription(this);" style="text-decoration:underline;font-weight:900;">ADD DESC.</a>
                           </td>
                           <td><select class="form-select" id="bedrooms_1" name="floor_bedrooms[]" onchange="generateUnitName(this);"><?= _Numbers('', 10); ?></select></td>
                           <td><select class="form-select" id="bathrooms_1" name="floor_bathrooms[]" onchange="generateUnitName(this);"><?= _Numbers('', 10); ?></select></td>
                           <td><input type="text" class="form-control" id="unitName_1" name="floor_unit[]" autocomplete="Off"/></td>
                           <td><input type="text" class="form-control text-right" id="size_1" name="floor_size[]" onkeypress="return isNumberKey(this, event);" autocomplete="Off"/></td>
                           <td><input type="text" class="form-control text-right" id="builtupArea_1" name="floor_builtupArea[]" onkeyup="totalPrice(this);" onkeypress="return isNumberKey(this, event);" autocomplete="Off"/></td>
                           <td><input type="text" class="form-control text-right" id="basePrice_1" name="floor_basePrice[]" onkeyup="totalPrice(this);" onkeypress="return isNumberKey(this, event);" autocomplete="Off"/></td>
                           <td><input type="text" class="form-control text-right" id="tPrice_1" name="floor_totalPrice[]" autocomplete="Off"/></td>
                           <td><input type="file" class="" id="floorplanImage_1" name="floor_planImage[]"/></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="addlt">
                  <a href="javascript:;" onclick="addRow('floor_plans');" ><i class="bi bi-plus-circle-fill me-1"></i>Add Row</a>
                  <a href="javascript:;" onclick="deleteRow('floor_plans');" class="ms-2"><i class="bi bi-dash-circle-fill me-1"></i>Delete Row</a>
               </div>
            </div>
            <div class="ptyp" id="pty_plot">
               <div class="row">
                  <div class="col-md-4 mb-3">
                     <label class="required">No. of Plots</label>
                     <input type="text" class="form-control" name="no_of_plots" onkeypress="return isNumberKey(this, event);" autocomplete="Off">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="required">Total Area (In Acres)</label>
                     <input type="text" class="form-control" name="total_area" onkeypress="return isNumberKey(this, event);" autocomplete="Off">
                  </div>
				  <div class="col-md-4 mb-3">
                     <label class="required">Project Phase</label>
                     <select class="form-select" name="project_phase">
                        <option value="On Going">On Going</option>
                        <option value="Pre-Launch">Pre-Launch</option>
                        <option value="Completed">Completed</option>
                     </select>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="required">Project Launch Date</label>
                     <input type="text" class="form-control calicon" id="project_launch_date" data-toggle="datetimepicker" data-target="#project_launch_date" name="project_start_date" autocomplete="Off">
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="required">Launched Units</label>
                     <input type="text" class="form-control" name="launched_units" autocomplete="Off"/>
                  </div>
                  <div class="col-md-4 mb-3">
                     <label class="required">Possesion Start Date</label>
                     <input type="text" name="possesion_start_date" autocomplete="Off" type="text" class="form-control calicon" id="possesion_start_dates" data-toggle="datetimepicker" data-target="#possesion_start_dates"/>
                  </div>
                  <div class="col-md-12 mb-3">
                     <label class="required">Project Overview</label>
                     <textarea class="form-control" rows="4" name="project_overview" id="description1" autocomplete="Off"></textarea>
                  </div>
               </div>
               <hr />
               <div class="cmnttl position-relative">Configuration (Size)</div>
               <div class="tbl-resp">
                  <table class="table tbl-custom" style="width:100%">
                     <thead>
                        <tr>
                           <th width="50">SNo.</th>
                           <th width="150">Plot Size in SQ.Ft.</th>
                           <th width="150">Base Price</th>
                           <th width="150">Total Price</th>
                           <th width="250">Image</th>
                        </tr>
                     </thead>
                     <tbody id="configuration">
                        <tr>
                           <td><input type="checkbox"></td>
                           <td><input type="text" class="form-control" name="plot_size[]" id="plotSize_1" onkeyup="total_Price(this);" onkeypress="return isNumberKey(this, event);" autocomplete="Off"/></td>
                           <td><input type="text" class="form-control" name="plot_basePrice[]" id="plotBasicPrice_1" onkeyup="total_Price(this);" onkeypress="return isNumberKey(this, event);" autocomplete="Off"/></td>
                           <td><input type="text" class="form-control" name="plot_totalPrice[]" id="plotTotalPrice_1"  onkeypress="return isNumberKey(this, event);" autocomplete="Off"/></td>
                           <td><input type="file" class="form-control" name="plot_Image[]" id="plotImage_1"/></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class="addlt">
                  <a href="javascript:;" onclick="addRow('configuration');" ><i class="bi bi-plus-circle-fill me-1"></i>Add Row</a>
                  <a href="javascript:;" onclick="deleteRow('configuration');" class="ms-2"><i class="bi bi-dash-circle-fill me-1"></i>Delete Row</a>
               </div>
            </div>
            <hr />
            <div class="cmnttl position-relative">Amenities</div>
            <div class="row">
               <?php $amenities = _amenities(); foreach($amenities as $key=>$amenity){ ?>
               <div class="col-xl-3 col-md-4">
                  <span class="form-check">
                  <input class="form-check-input" name="amenities[]" type="checkbox" name="remember" id="amenity_<?= $key+1;?>" value="<?= $amenity->id;?>">
                  <span class="form-check-label"><?= $amenity->name; ?></span>
                  </span>
               </div>
               <?php } ?>
            </div>
            <hr />
            <div class="cmnttl position-relative">Main Image</div>
            <div class="row">
               <div class="col-md-12 mb-3">
                  <label class="required">Upload Image</label>
                  <input type="file" class="form-control" name="main_image"/>
               </div>
            </div>
            <hr />
            <div class="cmnttl position-relative">Site Layout</div>
            <div class="row">
               <div class="col-md-12 mb-3">
                  <label class="required">Upload Image</label>
                  <input type="file" class="form-control" name="site_layout"/>
               </div>
            </div>
            <hr />
            <div class="cmnttl position-relative">Payment Option</div>
            <div class="row">
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
<script src="https://cdn.ckeditor.com/4.17.1/standard-all/ckeditor.js"></script>
<script type="text/javascript">
  var dataURL = $('base').attr("href");
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
CKEDITOR.replace('description1', {
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
   $('#builder').select2();
});

function initCities(cid) {
	$('#' + cid).select2({
		placeholder: 'Select City',
		ajax: {
			url: dataURL + 'admin/localities/search_cities',
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

function fetchData(s_val) {
	var mData, lData;
	var localities = $('#location');
	$.ajax({
		type: 'POST',
		url: dataURL + 'admin/localities/fetch_locations',
		data: {
			cid: s_val
		},
		async: false,
		success: function (res) {
			if (res != '') {
				mData = atob(res).split("@@");
				localities.html(mData[0]);
				localities.select2();
			}
		},
		error: function () {

		}
	});
}
$(function () {
	$('#dtpicker').datetimepicker({
		format: 'DD-MMM-YYYY'
	});
	$('#project_launch_date').datetimepicker({
		format: 'DD-MMM-YYYY'
	});
	$('#possesion_start_date').datetimepicker({
		format: 'DD-MMM-YYYY'
	});
	$('#possesion_start_dates').datetimepicker({
		format: 'DD-MMM-YYYY'
	});
});

function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	rowCount = rowCount + 1;
	console.log(rowCount);
	var colCount = table.rows[0].cells.length;
	for (var i = 0; i < colCount; i++) {
		var newcell = row.insertCell(i);
		newcell.innerHTML = table.rows[0].cells[i].innerHTML;
		switch (newcell.childNodes[0].type) {
			case "text":
				newcell.childNodes[0].value = "";
				var nod_id = newcell.childNodes[0].id.split("_");
				if (!isNaN(nod_id[1]))
					newcell.childNodes[0].id = nod_id[0] + '_' + rowCount;
				else
					newcell.childNodes[0].id = nod_id[0] + '_' + nod_id[1] + '_' + rowCount;
				break;
			case "checkbox":
				newcell.childNodes[0].checked = false;
				var nod_id = newcell.childNodes[0].id.split("_");
				if (!isNaN(nod_id[1]))
					newcell.childNodes[0].id = nod_id[0] + '_' + rowCount;
				else
					newcell.childNodes[0].id = nod_id[0] + '_' + nod_id[1] + '_' + rowCount;
				break;
			case "file":
				newcell.childNodes[0].value = "";
				var nod_id = newcell.childNodes[0].id.split("_");
				if (!isNaN(nod_id[1]))
					newcell.childNodes[0].id = nod_id[0] + '_' + rowCount;
				else
					newcell.childNodes[0].id = nod_id[0] + '_' + nod_id[1] + '_' + rowCount;
				break;
			case "hidden":
				newcell.childNodes[0].value = "";
				var nod_id = newcell.childNodes[0].id.split("_");
				if (!isNaN(nod_id[1]))
					newcell.childNodes[0].id = nod_id[0] + '_' + rowCount;
				else
					newcell.childNodes[0].id = nod_id[0] + '_' + nod_id[1] + '_' + rowCount;
				break;
			case "select-one":
				newcell.childNodes[0].selectedIndex = 0;
				var nod_id = newcell.childNodes[0].id.split("_");
				if (!isNaN(nod_id[1]))
					newcell.childNodes[0].id = nod_id[0] + '_' + rowCount;
				else
					newcell.childNodes[0].id = nod_id[0] + '_' + nod_id[1] + '_' + rowCount;
				break;

		}
	}
}

function deleteRow(tableID) {
	try {
		var table = document.getElementById(tableID);
		var rowCount = table.rows.length;
		for (var i = 0; i < rowCount; i++) {
			var row = table.rows[i];
			var chkbox = row.cells[0].childNodes[0];
			if (null != chkbox && true == chkbox.checked) {
				if (rowCount <= 1) {
					alert("Cannot delete all the rows.");
					break;
				}
				table.deleteRow(i);
				rowCount--;
				i--;
			}
		}
	} catch (e) {
		alert(e);
	}
}


function location_details(loc) {
	var baseUrl = $('base').attr("href");
	var id = $(loc).val();
	$.ajax({
		type: "POST",
		url: baseUrl + "admin/properties/location_details",
		data: {
			id: id
		},
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

function totalPrice(ev) {
	var size, price, totalPrice = 0;
	price = $(ev).closest('tr').find('td:nth-child(9)').find('input').val();
	size = $(ev).closest('tr').find('td:nth-child(8)').find('input').val();
	t_price = $(ev).closest('tr').find('td:nth-child(10)').find('input');

	if (isNaN(size) || size == '') {
		size = 0;
	}
	if (isNaN(price) || price == '') {
		price = 0;
	}

	totalPrice = parseFloat(size) * parseFloat(price);
	t_price.val(totalPrice.toFixed(2));
}

function total_Price(ev) {
	var size, price, totalPrice = 0;
	price = $(ev).closest('tr').find('td:nth-child(3)').find('input').val();
	size = $(ev).closest('tr').find('td:nth-child(2)').find('input').val();
	t_price = $(ev).closest('tr').find('td:nth-child(4)').find('input');

	if (isNaN(size) || size == '') {
		size = 0;
	}
	if (isNaN(price) || price == '') {
		price = 0;
	}

	totalPrice = parseFloat(size) * parseFloat(price);
	t_price.val(totalPrice.toFixed(2));
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
$('#rera_approved').change(function () {
	if ($(this).is(":checked")) {
		$('.reraDetails').css('display', 'block');
	} else {
		$('.reraDetails').css('display', 'none');
	}
});
$(function () {
	$('input[name="pvPTYP"]').on('change',function(){
		changeDetails($(this));
	});
});

function changeDetails(ev) {
	var pType = $(ev).val();
	if (pType == '5') {
		$('#pty_flat').css('display', 'none');
		$('#pty_plot').css('display', 'block');
		$('#pty_flat').find('input, textarea, button, select').attr('disabled', 'disabled');
		$('#pty_plot').find('input, textarea, button, select').attr('disabled', false);
	}
	if (pType != '5') {
		$('#pty_flat').css('display', 'block');
		$('#pty_plot').css('display', 'none');
		$('#pty_plot').find('input, textarea, button, select').attr('disabled', 'disabled');
		$('#pty_flat').find('input, textarea, button, select').attr('disabled', false);
	}
}


function addRoom_Sizes(ev) {
	$('.modal-content').load(dataURL + 'admin/modals/getRoom_Data', function () {
		var hID = $(ev).closest('tr').find('td:nth-child(2)').find('input[type="hidden"]').attr('id');
		$('#button_val').val(hID);
		$('#dyNamicModal').modal('show', {
			backdrop: 'static',
			keyboard: false
		});
	});

}

function addDescription(ev) {
	$('.modal-content').load(dataURL + 'admin/modals/getDesc_Data', function () {
		var hID = $(ev).closest('tr').find('td:nth-child(3)').find('input[type="hidden"]').attr('id');
		var rSizes = $(ev).closest('tr').find('td:nth-child(2)').find('input[type="hidden"]').val();
		if (rSizes == '') {
			alert('Please add Room sizes first!');
			return false;
		}
		$('#button_val').val(hID);
		$('#dyNamicModal').modal('show', {
			backdrop: 'static',
			keyboard: false
		});
	});
}

function saveRoom_sizes(e, tblID) {
	var rowCount = $('#' + tblID + ' tr').length;
	var trT = $('#button_val').val();
	var rr = 0;
	totalSizes = 0;
	var Sizes = [];
	$('#' + tblID + ' > tr').each(function (i, t) {
		rr = $(t).find('td:nth-child(2)').find('input').val();
		if (rr != '') {
			var tmp = {};
			tmp['room_size'] = rr;
			Sizes.push(tmp);
			totalSizes = parseFloat(totalSizes) + parseFloat(rr);
		}
	});
	var data = JSON.stringify(Sizes);
	$('#' + trT).val(data);
	$('#' + trT).closest('tr').find('td:nth-child(4)').find('select').val(rowCount);
	$('#' + trT).closest('tr').find('td:nth-child(1)').find('input[type="hidden"]').val(parseFloat(totalSizes));
	$('#dyNamicModal').modal('hide');
}

function saveDesc(e) {
	var trT = $('#button_val').val();
	var desc = $('#roomDesc').val();
	$('#' + trT).closest('tr').find('td:nth-child(3)').find('input[type="hidden"]').val(desc);
	$('#dyNamicModal').modal('hide');
}

function generateUnitName(el) {
	var content = '';
	var unit = $(el).closest('tr').find('td:nth-child(6)').find('input[type="text"]');
	var totalSizes = $(el).closest('tr').find('td:nth-child(1)').find('input[type="hidden"]').val();
	var bhk = $(el).closest('tr').find('td:nth-child(4)').find('select').val();
	var toilets = $(el).closest('tr').find('td:nth-child(5)').find('select').val();
	content = bhk + 'BHK ' + ' + ' + toilets + 'T (' + totalSizes + ' SqFt.)';
	unit.val(content);
}
</SCRIPT>