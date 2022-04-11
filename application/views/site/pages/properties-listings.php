<link href="<?= base_url(); ?>assets/plugins/rangeSlider/ion.rangeSlider.min.css" rel="stylesheet">
<input type="hidden" name="city" id="city" value="<?= $city; ?>">
<div class="fltrsec ps-3 pe-3">
   <div class="container-fluid">
      <div class="pvFltrBar megamenu">
         <div class="row g-2 align-items-center">
            <div class="col-xl-2 dropdown spdropdown">
               <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="ptypeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <span class="pvfbx">
               Property Type
               </span>
               </a>
               <ul class="dropdown-menu ddm" aria-labelledby="ptypeDropdown">
                  <?php if(isset($_GET['type'])){ echo _checkCategories($_GET['type']); }else{ echo _checkCategories('');} ?>
               </ul>
            </div>
            <div class="col-xl-2 dropdown spdropdown">
               <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="bhkteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <span class="pvfbx">
               BHK Type
               </span>
               </a>
               <ul class="dropdown-menu ddm" aria-labelledby="bhkteDropdown">
                  <?php if(isset($_GET['bedrooms'])){ $fRooms = $_GET['bedrooms']; }else{ $fRooms = '';} echo _filterRooms($fRooms); ?>
               </ul>
            </div>
            <div class="col-xl-2 dropdown spdropdown">
               <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="bhkteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <span class="pvfbx">
               Budget
               </span>
               </a>
               <div class="dropdown-menu ddm mnwd" aria-labelledby="bhkteDropdown">
                  <div class="rngSldr">
                     <input type="text" id="example_id" name="example_name" value="" />
                  </div>
               </div>
            </div>
            <!--<div class="col-xl-2 dropdown spdropdown">
               <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="bhkteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <span class="pvfbx">
               Project Status
               </span>
               </a>
               <ul class="dropdown-menu ddm" aria-labelledby="bhkteDropdown">
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pvLSoon">
                        <label class="form-check-label" for="pvLSoon">
                        Launching Soon
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pvNLaunch">
                        <label class="form-check-label" for="pvNLaunch">
                        New Launch
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pvUConst">
                        <label class="form-check-label" for="pvUConst">
                        Under Construction
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pvRtMove">
                        <label class="form-check-label" for="pvRtMove">
                        Ready to Move In
                        </label>
                     </div>
                  </li>
               </ul>
               </div>
               <div class="col-xl-2 dropdown spdropdown">
               <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="bhkteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <span class="pvfbx">
               Localities
               </span>
               </a>
               <ul class="dropdown-menu ddm" aria-labelledby="bhkteDropdown">
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pvLNoida">
                        <label class="form-check-label" for="pvLNoida">
                        Noida
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pvLGNoida">
                        <label class="form-check-label" for="pvLGNoida">
                        Gr. Noida
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pvYExpress">
                        <label class="form-check-label" for="pvYExpress">
                        Yamuna Expressway
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pvGhaziabad">
                        <label class="form-check-label" for="pvGhaziabad">
                        Ghaziabad
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pvDelhi">
                        <label class="form-check-label" for="pvDelhi">
                        Delhi
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pvGurgaon">
                        <label class="form-check-label" for="pvGurgaon">
                        Gurgaon
                        </label>
                     </div>
                  </li>
               </ul>
               </div>
               <div class="col-xl-2 dropdown spdropdown">
               <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="bhkteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               <span class="pvfbx">
               Possession Status
               </span>
               </a>
               <ul class="dropdown-menu ddm" aria-labelledby="bhkteDropdown">
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pv3Month">
                        <label class="form-check-label" for="pv3Month">
                        In 3 months
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pv6Month">
                        <label class="form-check-label" for="pv6Month">
                        In 6 months
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pv1Yr">
                        <label class="form-check-label" for="pv1Yr">
                        In 1 year
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pv2Yr">
                        <label class="form-check-label" for="pv2Yr">
                        In 2 years
                        </label>
                     </div>
                  </li>
                  <li>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="pv2PYr">
                        <label class="form-check-label" for="pv2PYr">
                        In 2+ years
                        </label>
                     </div>
                  </li>
               </ul>
               </div>-->
            <div class="col-xl-6">
               <button type="button" class="btn btn-primary" onclick="search_properties();">Apply Filter</button>
               <!--<button type="button" class="btn btn-secondary ms-1">Reset Filter</button>-->
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="row justify-content-center mb-4">
      <!--<div class="col-xl-3 col-md-4 col-sm-6">
         <div class="card pveq-card border-0 shadow">
         	<div class="p-4">
         		<h4 class="cmn-title mb-3">Applied Filters</h4>
         	</div>
         </div>
         </div>-->
      <div class="col-xl-11 col-md-11 col-sm-12">
         <div class="pv-breadcrumb">
            <a href="javascript:;">Home</a>
            <a href="javascript:;">Property in <?= ucfirst($city); ?></a>
            <?php if(isset($s_content['location'])){ ?>
            <a href="javascript:;" class="current">Property in <?= ucfirst($s_content['location']); ?></a>
            <?php } ?>
         </div>
         <?php if(!empty($listings)){ $lcount = count($listings); }else{ $lcount = 0; } ?>
         <?php if(!empty($listings)){ if(isset($s_content['location'])){?>
         <h3 class="pvSrchTitle">Properties in <?= ucfirst($s_content['location']); ?> <span>(<?= $lcount; ?> Properties)</span></h3>
         <?php } }?>
         <div class="pvpts-list">
            <?php if(!empty($listings)){ foreach($listings as $listing){ ?>
            <div class="card mb-3">
               <div class="row g-0">
                  <div class="col-md-4">
                     <div class="card-inner">
                        <div class="card-img rounded-top-right-0">
                           <img src="<?= base_url(); ?>assets/images/cities/ghaziabad.jpg" class="img-fluid">
                        </div>
                        <a href="<?php echo base_url();?>properties-details/<?= $listing->slug; ?>---<?= $listing->id; ?>" class="card-img-overlay">
                        <span class="aprvl-badge"><i class="bi bi-check-circle-fill"></i>RERA Approved</span>
                        <span class="prop-snfc">Posted : 7 Sep. 2021</span>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="card-body">
                        <h5 class="pv-ptttl mb-1"><a href="<?php echo base_url();?>properties-details/<?= $listing->slug; ?>---<?= $listing->id; ?>"><?= $listing->property_name; ?></a></h5>
                        <?php if($listing->builder_id!=''&& $listing->builder_id!='0'){ $builder = _builderDetails($listing->builder_id); print_r($builder); ?>
                        <h6 class="pvpd-py">By<span> <?=$builder->builder_name;?></span></h6>
                        <?php } ?>
                        <h6 class="pvpd-locate mb-3"><?= $listing->property_address; ?></h6>
                        <div class="row mb-3">
                           <div class="col-xl-3 col-4">
                              <h5 class="pv-lprc">₹ <?= no_to_words($listing->cost); ?></h5>
                              <?php $rate = ($listing->cost/$listing->builtup_area); ?>
                              <div class="pv-lprc-sml">₹ <?php echo number_format($rate); ?> per sq.ft.</div>
                           </div>
                           <div class="col-xl-3 col-4">
                              <h5 class="pv-lprc dropdown">
                                 <?= round($listing->builtup_area); ?><span class="ms-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">sq.ft.</span><!--
                                    <ul class="dropdown-menu dmbody shadow" aria-labelledby="navbarDropdown">
                                       <li>72 Sq. Meters</li>
                                       <li>90 Sq. Yards</li>
                                       <li>0.06 Acres</li>
                                       <li>0.09 Bigha</li>
                                       <li>0.045 Hectares</li>
                                    </ul>-->
                              </h5>
                              <div class="pv-lprc-sml">Super built-up Area</div>
                           </div>
                           <div class="col-xl-3 col-4">
                              <h5 class="pv-lprc"><?= $listing->bd_name; ?></h5>
                              <div class="pv-lprc-sml"><?= $listing->bt_name; ?> Bath, <?= $listing->bl_name; ?> R Balcony</div>
                           </div>
                        </div>
                        <div class="mb-4">
                           <span class="badge badge-secondary"><?= $listing->cs_name; ?></span>
                           <span class="badge badge-secondary ms-1"><?= $listing->lt_name; ?></span>
                        </div>
                        <a href="<?php echo base_url();?>properties-details/<?= $listing->slug; ?>---<?= $listing->id; ?>" class="rmLink" target="_blank">Read More<i class="bi bi-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="spcr-bds"></div>
               <div class="py-2 px-3">
                  <div class="row align-items-center">
                     <div class="col-6">
                        <span class="pvrrrg"><i class="bi bi-check-circle-fill me-2"></i>RERA ID : UPRERAPRJ5112</span>
                     </div>
                     <div class="col-6 text-end">
                        <button type="button" class="btn btn-primary offers" data-bs-toggle="modal" data-id="<?= $listing->id; ?>" data-type="property" data-bs-target="#pvGetCallback">Get Current Offers</button>
                     </div>
                  </div>
               </div>
            </div>
            <?php } }else{ ?>
            <h3 class="pvSrchTitle text-center"><span>No Properties in Greater Noida Extension</span></h3>
            <?php } ?>
         </div>
      </div>
   </div>
</div>
<script src="<?= base_url(); ?>assets/plugins/rangeslider/ion.rangeSlider.min.js"></script>
<script>
var baseUrl = $('base').attr("href");
$('.dropdown.spdropdown .dropdown-menu').click(function (e) {
	e.stopPropagation();
});
var ranges = [1000, 10000, 100000, 1000000, 10000000];
var my_from = ranges.indexOf(1000);
var my_to = ranges.indexOf(1000000);

$("#example_id").ionRangeSlider({
	type: "double",
	grid: true,
	from: my_from,
	to: my_to,
	values: ranges,
	prefix: "₹",
	step: 1000,
	prettify_enabled: true,
	prettify_separator: ","
});

function search_properties() {
	var slider = $("#example_id").data("ionRangeSlider");
	var from = slider.result.from;
	var to = slider.result.to;
	var min_price = ranges[from];
	var max_price = ranges[to];
	var main = $('#city').val();
	var type = [];
	$('input[name="type"]').each(function () {
		if ($(this).is(':checked')) {
			type.push($(this).val());
		}
	});
	var bedrooms = [];
	$('input[name="pvBHK"]').each(function () {
		if ($(this).is(':checked')) {
			bedrooms.push($(this).val());
		}
	});
	var location = $('input[name="search"]').val();
	var content = $('input[name="content"]').val();
	if (type == undefined) {
		type = '';
	}
	if (location == undefined) {
		location = '';
	}
	if (content == undefined) {
		content = '';
	}
	window.location.href = baseUrl + 'search/properties/' + main + '?location=' + location + '&type=' + type + '&content=' + content + '&budget_min=' + min_price + '&budget_max=' + max_price + '&bedrooms=' + bedrooms;
}

$('.offers').on('click', function () {
	var $el = $(this);
	var $id = $el.data('id');
	var $type = $el.data('type');
	$("#listing_id").val($id);
	$("#listing_type").val($type);
});


function o_validate(ev) {
	var fname = $(ev).find('#ofull_name').val();
	var phone = $(ev).find('#ophone').val();
	var email = $(ev).find('#oemail').val();
	var terms = $(ev).find('#oterms');
	var flag = true;
	if (fname == '') {
		$(ev).find('#e_full_name').html('Please enter Full Name');
		flag = false;
	}
	if (phone == '') {
		$(ev).find('#e_phone').html('Please enter Phone number');
		flag = false;
	}
	if (email == '') {
		$(ev).find('#e_email').html('Please enter Email Address');
		flag = false;
	}
	if (terms.is(':checked') != true) {
		$(ev).find('#e_terms').html('Please select terms and conditions');
		flag = false;
	}
	return flag;
}

function save_enquiries(e) {
	var baseUrl = $('base').attr("href");
	var vd = o_validate(e);
	$('#page-loader').fadeIn();
	if (vd == true) {
		$(e).find('#e_full_name').html('');
		$(e).find('#e_phone').html('');
		$(e).find('#e_email').html('');
		$(e).find('#e_terms').html('');

		$.ajax({
			type: 'POST',
			url: baseUrl + "pages/post_offer_enquiry",
			data: $('#call_back').serialize(),
			success: function (response) {
				$('#page-loader').fadeOut();
				$('#call_back')[0].reset();
				$('#pvGetCallback').modal('hide');
			}
		});
	} else {
		$('#page-loader').fadeOut();
	}
	return false;
}  
</script>