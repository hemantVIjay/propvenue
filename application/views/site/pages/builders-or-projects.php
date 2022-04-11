<link href="<?= base_url(); ?>assets/plugins/rangeSlider/ion.rangeSlider.min.css" rel="stylesheet">
<?php if($is_builder==true){ ?>
<section class="bldrsec">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-11 col-md-11 col-sm-12">
            <div class="row">
               <div class="col-md-8">
                  <div class="pv-breadcrumb twht mb-0 mb-sm-4">
                     <a href="<?php echo base_url();?>">Home</a>
                     <a href="<?php echo base_url($builder['slug']);?>"><?= $builder['builder_name']; ?></a>
                  </div>
               </div>
               <div class="col-md-4 text-end py-3">
                  <span class="ludt">Last updated: <?= get_nice_time('12-Nov-2021')?></span>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-xl-11 col-md-11 col-sm-12">
            <div class="row align-items-center">
               <div class="col-xl-3 col-lg-3 col-md-4">
                  <div class="bldrImg">
                     <img src="<?= base_url(); ?>uploads/builders/<?= $builder['builder_logo']; ?>" class="img-fluid">
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-8">
                  <div class="bdrDtls">
                     <h1 class="bldrName"><?= $builder['builder_name']; ?></h1>
                     <div class="d-flex prjDtl">
                        <?php $exp = 'N/A'; if(!$builder['builder_estabilished_year']!=''){ $curYear = date('Y'); 
                           $exp = (int)$curYear - (int)$builder['builder_estabilished_year']; } ?>
                        <span class="bdz"><?= $exp; ?> Years of Experience</span>
                        <span class="bdz"><?php if(!empty($builder_projects)){ echo count($builder_projects); }else{ echo'0'; } ?> Total Projects</span>
                        <span class="bdz">Ongoing Projects</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container">
   <div class="row justify-content-center mt-4 mb-4">
      <!--<div class="col-xl-3 col-md-4 col-sm-6">
         <div class="card pveq-card border-0 shadow">
         	<div class="p-4">
         		<h4 class="cmn-title mb-3">Applied Filters</h4>
         	</div>
         </div>
         </div>-->
      <div class="col-xl-11 col-md-11 col-sm-12">
         <!--<div class="text-end mb-1">
            <button class="btnReset"><i class="bi bi-arrow-counterclockwise me-1"></i>Reset</button>
         </div>
         <div class="pvFltrBar megamenu">
            <div class="row bdra align-items-center">
               <!--<div class="col-xl-2 dropdown spdropdown">
                  <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="ptypeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="pvfbx">
                  Property Type
                  </span>
                  </a>
                  <ul class="dropdown-menu ddm" aria-labelledby="ptypeDropdown">
                     <?= _checkCategories(''); ?>
                  </ul>
               </div>-->
               <!--<div class="col-xl-2 dropdown spdropdown">
                  <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="bhkteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="pvfbx">
                  Bedrooms
                  </span>
                  </a>
                  <ul class="dropdown-menu ddm" aria-labelledby="bhkteDropdown">
                     <?php echo _filterRooms($_GET['bedrooms']); ?>
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
               <div class="col-xl-2 dropdown spdropdown">
                  <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="bhkteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="pvfbx">
                  Project Status
                  </span>
                  </a>
                  <ul class="dropdown-menu ddm" aria-labelledby="bhkteDropdown">
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pvLSoon" >
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
                  Possession within
                  </span>
                  </a>
                  <ul class="dropdown-menu ddm" aria-labelledby="bhkteDropdown">
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pv3Month">
                           <label class="form-check-label" for="pv3Month">
                            3 months
                           </label>
                        </div>
                     </li>
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pv6Month">
                           <label class="form-check-label" for="pv6Month">
                           6 months
                           </label>
                        </div>
                     </li>
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pv1Yr">
                           <label class="form-check-label" for="pv1Yr">
                           1 year
                           </label>
                        </div>
                     </li>
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pv2Yr">
                           <label class="form-check-label" for="pv2Yr">
                           2+ years
                           </label>
                        </div>
                     </li>
                  </ul>
               </div>
			   
			   <div class="col-xl-2 dropdown spdropdown">
                  <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="bhkteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="pvfbx">
                  Area Sqft
                  </span>
                  </a>
                  <ul class="dropdown-menu ddm" aria-labelledby="bhkteDropdown">
                     <li>
					  <div class="row">
					  <div class="col-sm-6">
					  <label class="label">
                       Minimum
                      </label>
					  <select class="form-control">
					  <option>250 Sqft</option>
					  <option>500 Sqft</option>
					  <option>1000 Sqft</option>
					  <option>1500 Sqft</option>
					  <option>2000 Sqft</option>
					  <option>2500 Sqft</option>
					  <option>3000 Sqft</option>
					  <option>3500 Sqft</option>
					  <option>4000 Sqft</option>
					  </select>
					  </div>
					  <div class="col-sm-6">
					  <label class="label">
                       Maximum
                      </label>
					  <select class="form-control">
					  <option>500 Sqft</option>
					  <option>1000 Sqft</option>
					  <option>1500 Sqft</option>
					  <option>2000 Sqft</option>
					  <option>2500 Sqft</option>
					  <option>3000 Sqft</option>
					  <option>3500 Sqft</option>
					  <option>4000 Sqft</option>
					  <option>5000 Sqft</option>
					  </select>
					  </div>
					  </div>
                     </li>
                  </ul>
               </div>
			   <div class="col-xl-2">
               <button type="button" class="btn btn-primary" onclick="search_projects();">Apply Filter</button>
            </div>
            </div>
         </div>-->
		 <div class="pv-breadcrumb mt-3">
            <!--<a href="javascript:;">Home</a>
            <a href="javascript:;">Property in Noida</a>
            <a href="javascript:;" class="current">Property in Sector 150</a>-->
         </div>
         <h3 class="pvSrchTitle">Projects by  <span>(<?php if(!empty($builder_projects)){ echo count($builder_projects); }else{ echo'0'; } ?> Projects)</span></h3>
         <div class="pvpts-list">
            <?php if(!empty($builder_projects)){ foreach($builder_projects as $project){ 
			$linfo = _listingInfo('project', $project->id);
		    ?>
            <div class="card mb-3">
               <div class="row g-0">
                  <div class="col-md-4">
                     <div class="card-inner">
                        <div class="card-img rounded-top-right-0">
                           <img src="<?= base_url(); ?><?= ($project->main_image!='')? 'uploads/projects/Main Image/'.$project->main_image : 'assets/images/home-banner.jpg' ?>" class="img-fluid">
                        </div>
                        <a href="<?php echo base_url();?><?= (isset($linfo->url))? $linfo->url : ''; ?>" class="card-img-overlay">
                        <?php if($project->rera_approved=='1'){ ?><span class="aprvl-badge"><i class="bi bi-check-circle-fill"></i>RERA Approved</span><?php } ?>
                        <span class="prop-snfc">Posted : <?= get_nice_time($project->updated_on); ?></span>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="card-body">
                        <h5 class="pv-ptttl mb-1"><a href="<?php echo base_url();?><?= (isset($linfo->url))? $linfo->url : ''; ?>"><?= $project->project_name; ?></a></h5>
                        <h6 class="pvpd-py">By<span> <?= $builder['builder_name']; ?></span></h6>
                        <?php 
						   $bd = $this->masters->get_record_id('builders', $project->builder_id);
						   $lt = $this->masters->get_record_id('locations', $project->locality_id);
						   $ct = $this->masters->get_record_id('cities', $project->city_id);
						?>
						<h6 class="pvpd-locate mb-3"><?= $project->project_address.', '; ?><?php if(isset($lt) && !empty($lt)){ echo$lt->name.', '; }if(isset($ct) && !empty($ct)){ echo$ct->name; } ?></h6>
                        <div class="row mb-3">
                           <div class="col-xl-5 col-sm-4">
                              <h5 class="pv-lprc">₹ <?php $lp = listing_prices($project->id, $project->project_category); ?><?php echo no_to_words($lp->min_price).' - '.no_to_words($lp->max_price); ?></h5>
                              <div class="pv-lprc-sml mb-4 mb-sm-0">₹ <?= number_format(_averageRates($project->id, $project->project_category),2); ?> per sq.ft.</div>
                           </div>
						   <?php $p_listings = $this->project->get_projectPlans($project->id);?>
                           <div class="col-xl-7 col-sm-4">
                              <table class="table tableBdr" width="100%">
							   <tbody>
							    <?php if(!empty($p_listings)){ foreach($p_listings as $row){ ?>
								<tr>
								  <td>
								   <a href="/noida/ats-green-kingston-heath-sector-150-13456968/3bhk-5t-2350-sqft-apartment" target="_blank" data-type="cluster-link-property" class="no-ajaxy"><?= $row->floor_bedrooms;?>BHK&nbsp;+&nbsp;<?= $row->floor_bathrooms;?>T</a>
								   </td>
								   <td class="js-prop-size"><?= round($row->floor_builtupArea);?> sqft</td><td class="js-prop-price"> ₹ <?= no_to_words($row->floor_totalPrice);?></td>
							    </tr>
								<?php } } ?>
							    </tbody>
							  </table>
                           </div>
                        </div>
                        
						<div class="mb-4">
                           <?php if($project->project_category!='5'){ ?><span class="badge badge-secondary">Ready to Move</span>
     						<?php } ?>
                           <span class="badge badge-secondary ms-1">Resale</span>
                        </div>
                        <a href="<?php echo base_url();?><?= (isset($linfo->url))? $linfo->url : ''; ?>" class="rmLink">Read More<i class="bi bi-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
               <div class="spcr-bds"></div>
               <div class="py-2 px-3">
                  <div class="row align-items-center">
                     <div class="col-6">
                        <?php if($project->rera_approved=='1'){ ?><span class="pvrrrg"><i class="bi bi-check-circle-fill me-2"></i>RERA ID : <?= $project->rera_registrationNumber; ?></span><?php } ?>
                     </div>
                     <div class="col-6 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pvGetCallback">Get Current Offers</button>
                     </div>
                  </div>
               </div>
            </div>
            <?php } }else{ ?>
            <h3 class="pvSrchTitle"><span>No Projects found.</span></h3>
            <?php } ?>
         </div>
		 
      </div>
   </div>
</div>
<?php } if($is_project==true){ ?>
<section class="bldrsec">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-xl-11 col-md-11 col-sm-12">
            <div class="row">
               <div class="col-md-8">
                  <div class="pv-breadcrumb twht mb-4">
                     <a href="javascript:;">Home</a>
                     <a href="javascript:;">SKA Developers & Builders</a>
                     <a href="javascript:;" class="current">Residential Projects by SKA Builders</a>
                  </div>
               </div>
               <div class="col-md-4 text-end py-3">
                  <span class="ludt">Last updated: 12-Nov-2021</span>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-xl-11 col-md-11 col-sm-12">
            <div class="row align-items-center">
               <div class="col-xl-3 col-lg-3 col-md-4">
                  <div class="bldrImg">
                     <img src="<?= base_url(); ?>uploads/builders/<?= $project->site_layout; ?>" class="img-fluid">
                  </div>
               </div>
               <div class="col-xl-9 col-lg-9 col-md-8">
                  <div class="bdrDtls">
                     <h1 class="bldrName"><?= $project->project_name; ?></h1>
                     <div class="d-flex prjDtl">
                        <?php if($project->project_start_date!='' && $project->project_start_date!='0000-00-00'){ ?>
                        <span class="bdz">Started from <?= date_format(date_create($project->project_start_date),'d/m/Y'); ?></span><?php } ?>
                        <span class="bdz"><?php if(!empty($project_properties)){ echo count($project_properties); }else{ echo'0'; } ?> Total Properties</span>
                        <!--<span class="bdz">Ongoing Projects</span>-->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="container">
   <div class="row justify-content-center mt-4 mb-4">
      <!--<div class="col-xl-3 col-md-4 col-sm-6">
         <div class="card pveq-card border-0 shadow">
         	<div class="p-4">
         		<h4 class="cmn-title mb-3">Applied Filters</h4>
         	</div>
         </div>
         </div>-->
      <div class="col-xl-11 col-md-11 col-sm-12">
         <div class="text-end mb-1">
            <button class="btnReset"><i class="bi bi-arrow-counterclockwise me-1"></i>Reset</button>
         </div>
         <div class="pvFltrBar megamenu">
            <div class="row bdra align-items-center">
               <div class="col-xl-2 dropdown spdropdown">
                  <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="ptypeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="pvfbx">
                  Property Type
                  </span>
                  </a>
                  <ul class="dropdown-menu ddm" aria-labelledby="ptypeDropdown">
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pvApartment">
                           <label class="form-check-label" for="pvApartment">
                           Apartment
                           </label>
                        </div>
                     </li>
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pvIHouse">
                           <label class="form-check-label" for="pvIHouse">
                           Independent House
                           </label>
                        </div>
                     </li>
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pvFlat">
                           <label class="form-check-label" for="pvFlat">
                           Flat
                           </label>
                        </div>
                     </li>
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pvPlot">
                           <label class="form-check-label" for="pvPlot">
                           Plot
                           </label>
                        </div>
                     </li>
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pvVilla">
                           <label class="form-check-label" for="pvVilla">
                           Villa
                           </label>
                        </div>
                     </li>
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pvDuplex">
                           <label class="form-check-label" for="pvDuplex">
                           Duplex
                           </label>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="col-xl-2 dropdown spdropdown">
                  <a href="javascript:;" class="pvfbxb d-flex justify-content-between dropdown-toggle" id="bhkteDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="pvfbx">
                  BHK Type
                  </span>
                  </a>
                  <ul class="dropdown-menu ddm" aria-labelledby="bhkteDropdown">
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pv1BHK">
                           <label class="form-check-label" for="pv1BHK">
                           1 BHK
                           </label>
                        </div>
                     </li>
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pv2BHK">
                           <label class="form-check-label" for="pv2BHK">
                           2 BHK
                           </label>
                        </div>
                     </li>
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pv3BHK">
                           <label class="form-check-label" for="pv3BHK">
                           3 BHK
                           </label>
                        </div>
                     </li>
                     <li>
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" value="" id="pv3plusBHK">
                           <label class="form-check-label" for="pv3plusBHK">
                           3+ BHK
                           </label>
                        </div>
                     </li>
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
               <div class="col-xl-2 dropdown spdropdown">
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
               </div>
            </div>
         </div>
		 <div class="pv-breadcrumb mt-3">
            <a href="javascript:;">Home</a>
            <a href="javascript:;">Property in Noida</a>
            <a href="javascript:;" class="current">Property in Sector 150</a>
         </div>
         <h3 class="pvSrchTitle">Properties in <?= $project->project_name; ?><span>(<?php if(!empty($project_properties)){ echo count($project_properties); }else{ echo'0'; } ?> Properties)</span></h3>
         <div class="pvpts-list">
            <?php if(!empty($project_properties)){ foreach($project_properties as $listing){ ?>
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
			            <h6 class="pvpd-py">By<span> <?=$builder->builder_name;?></span></h6><?php } ?>
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
<?php } ?>
<!-- Modal -->
<div class="modal fade" id="pvGetCallback" tabindex="-1" aria-labelledby="pvGetCallbackLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="row g-0">
            <div class="col-md-7">
               <img src="<?= base_url(); ?>assets/images/offer-banner.jpg" class="img-fluid rounded-start">
            </div>
            <div class="col-md-5">
               <div class="p-4">
                  <div class="d-flex justify-content-between">
                     <h4 class="cmn-title mb-4">Contact with us</h4>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="mb-3">
                     <label class="required">Full Name</label>
                     <input type="text" class="form-control" placeholder="Enter your name">
                  </div>
                  <div class="mb-3">
                     <label class="required">Phone Number</label>
                     <input type="text" class="form-control" placeholder="Enter your phone no.">
                  </div>
                  <div class="mb-3">
                     <label class="required">Email ID</label>
                     <input type="text" class="form-control" placeholder="Enter email id">
                  </div>
                  <div class="mb-3 d-flex">
                     <input type="checkbox" class="cks" checked="">
                     <span class="pvsml ms-2">I Agree to Propvenue's <a href="javascript:;">Terms of Use</a></span>
                  </div>
                  <div class="mb-3 d-flex">
                     <input type="checkbox" class="cks">
                     <span class="pvsml ms-2">I am interested in Home Loans</span>
                  </div>
                  <div class="d-grid gap-2">
                     <button class="btn btn-primary" type="button">Get Call Back</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="<?= base_url(); ?>assets/plugins/rangeslider/ion.rangeSlider.min.js"></script>
<script>
   $('.dropdown.spdropdown .dropdown-menu').click(function(e) {
       e.stopPropagation();
   });
   var baseUrl=$('base').attr("href");
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
         prettify_separator: ",",
	     onFinish: function (data) {
		  filterData();
		}
       });
	
	 function filterData(){
	   var bld = '<?php echo $this->uri->segment(1); ?>';
	   var slider = $("#example_id").data("ionRangeSlider");
	   var from   = slider.result.from;
	   var to     = slider.result.to;
	   var min_price = ranges[from];
	   var max_price = ranges[to];
	   var bedrooms = [];
		$('input[name="pvBHK"]').each(function () {
			if ($(this).is(':checked')) {
				bedrooms.push($(this).val());
			}
		});
   	   	if (type == undefined) {
			type = '';
		}
   	   var search   = $('input[name="content"]').data('slug');
   	   var content  = $('input[name="content"]').val();
   	   var str  = atob(content);
   	   var res = str.split('_');
	   var type = '1';
   	   var mainURL  = baseUrl + bld + '?type='+type+'&budget_min=' + min_price + '&budget_max=' + max_price + '&bedrooms=' + bedrooms;
   		 window.location.href = mainURL;  
   	 }
	   
</script>