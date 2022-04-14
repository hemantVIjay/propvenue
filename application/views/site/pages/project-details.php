<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?= base_url(); ?>assets/plugins/gallery/jquery.fancybox.min.css" rel="stylesheet">
<div class="pv-dtl">
   <div class="container">
      <div class="pv-breadcrumb">
         <a href="<?= base_url(); ?>">Home</a>
         <?php 
            $c_arr = array('name'=>'city','parent_id'=>$project_info->city_id);
            $ct = $this->masters->get_record_id('cities', $project_info->city_id);
            $city = _getlisting($c_arr);
            ?>
         <a href="<?php if(isset($city) && !empty($city)){ echo base_url($city->url); }else{ echo'javascript:;'; } ?>">Property in <?php if(isset($ct) && !empty($ct)){ echo$ct->name; }else{ echo'N/A';} ?></a>
         <?php 
            $l_arr = array('name'=>'locality','parent_id'=>$project_info->locality_id);
            $lt = $this->masters->get_record_id('locations', $project_info->locality_id);
            $lc = _getlisting($l_arr);
            ?>
         <a href="<?php if(isset($lc) && !empty($lc)){ echo base_url($lc->url); }else{ echo'javascript:;'; } ?>">Property in <?php if(isset($lt) && !empty($lt)){ echo$lt->name; }else{ echo'N/A';} ?></a>
         <?php 
            $b_arr = array('name'=>'builder','parent_id'=>$project_info->builder_id);
            $bd = $this->masters->get_record_id('builders', $project_info->builder_id);
            $bld = _getlisting($b_arr);
            ?>
         <a href="<?php if(isset($bld) && !empty($bld)){ echo base_url($bld->url); }else{ echo'javascript:;'; }?>"><?php if(isset($bd) && !empty($bd)){ echo$bd->builder_name; }else{ echo'N/A';} ?></a>
         <?php 
            $o_arr = array('name'=>'project','parent_id'=>$project_info->id);
            $own = _getlisting($o_arr);
            ?>
         <a class="current" href="javascript:;"><?php if($project_info->project_name!=''){ echo$project_info->project_name; } else{ echo'N/A'; } ?></a>
      </div>
      <div class="row">
         <div class="col-md-9">
            <div class="pvd-banner mb-3">
               <a data-fancybox="gallery" href="<?= base_url(); ?><?= ($project_info->main_image!='')? 'uploads/projects/Main Image/'.$project_info->main_image : 'assets/images/home-banner.jpg' ?>" data-caption="">
               <img src="<?= base_url(); ?><?= ($project_info->main_image!='')? 'uploads/projects/Main Image/'.$project_info->main_image : 'assets/images/home-banner.jpg' ?>" class="img-fluid" />
               </a>
            </div>
            <div class="pvpds mb-4">
               <div class="row">
                  <div class="col-md-8">
                     <h2 class="pvpd-title"><?= $project_info->project_name; ?></h2>
                     <h6 class="pvpd-py">By<span> <?php if(isset($bd) && !empty($bd)){ echo$bd->builder_name; } ?></span></h6>
                     <h6 class="pvpd-locate"><?= $project_info->project_address.', '; ?> <?php if(isset($lt) && !empty($lt)){ echo$lt->name.', '; }if(isset($ct) && !empty($ct)){ echo$ct->name; } ?></h6>
                  </div>
                  <div class="col-md-4 text-end">
                     <h1 class="pvpd-prc mb-3">₹ <?php $lp = listing_prices($project_info->id, $project_info->project_category); ?><?php echo no_to_words($lp->min_price).' - '.no_to_words($lp->max_price); ?><span class="pv-sb">₹ <?= number_format(_averageRates($project_info->id, $project_info->project_category),2); ?>/ sq.ft</span></h1>
                     <!--<h5 class="pvpd-pemi">EMI starts at ₹ 19,550</h5>-->
                  </div>
               </div>
               <?php $rera = $project_info->rera_approved; 
                  if($rera=='1'){ ?>
               <div class="pv-reras d-inline-block">
                  <span class="bdg"><i class="bi bi-check-circle-fill me-2"></i>RERA <span class="d-none d-sm-inline-block">Registered</span></span>
                  <span class="bdgrn">Registration No: <?= $project_info->rera_registrationNumber; ?></span>
               </div>
               <?php } ?>
            </div>
         </div>
         <div class="col-md-3">
            <?php include('enquiry-form.php'); ?>
         </div>
      </div>
   </div>
</div>
<nav class="navigation" id="mainNav">
   <div class="container">
      <a class="navigation__link" href="#1">Overview</a>
      <a class="navigation__link" href="#2">Floor Plan & Unit</a>
      <a class="navigation__link" href="#3">Amenities</a>
      <a class="navigation__link" href="#4">Gallery</a>
      <a class="navigation__link" href="#5">Price Trends</a>
      <a class="navigation__link" href="#6">Ratings & Reviews</a>
      <a class="navigation__link" href="#7">About Developer</a>
   </div>
</nav>
<div class="container">
<div class="row">
   <div class="col-md-9">
      <div class="page-section hero" id="1">
         <h4 class="cmn-title mb-4">Overview</h4>
         <div class="row">
            <div class="col-md-4 col-6 mb-4">
               <div class="lblpvfd mb-1">Possession Start Date</div>
               <div class="valuepvfd"><?= my_date_show($project_info->possesion_start_date); ?></div>
            </div>
            <div class="col-md-4 col-6 mb-4">
               <div class="lblpvfd mb-1">Status</div>
               <div class="valuepvfd"><?= $project_info->project_phase; ?></div>
            </div>
            <div class="col-md-4 col-6 mb-4">
               <div class="lblpvfd mb-1">Project Area</div>
               <div class="valuepvfd"><?= number_format($project_info->total_area); ?> Acres</div>
            </div>
            <div class="col-md-4 col-6 mb-4">
               <div class="lblpvfd mb-1">Project Size</div>
               <div class="valuepvfd"><?= $project_info->no_of_towers; ?> Buildings - <?= $project_info->no_of_flats; ?> units</div>
            </div>
            <div class="col-md-4 col-6 mb-4">
               <div class="lblpvfd mb-1">Total Launched <?php echo ($project_info->project_category!='5')?'Apartments':'Plots'; ?></div>
               <div class="valuepvfd"><?= number_format($project_info->launched_units); ?></div>
            </div>
            <div class="col-md-4 col-6 mb-4">
               <div class="lblpvfd mb-1">Launch Date</div>
               <div class="valuepvfd"><?= my_date_show($project_info->project_start_date); ?></div>
            </div>
            <div class="col-md-4 col-6 mb-4">
               <div class="lblpvfd mb-1">Availability</div>
               <div class="valuepvfd">New/ Resale</div>
            </div>
            <div class="col-md-4 col-6 mb-4">
               <div class="lblpvfd mb-1">Configuration</div>
               <?php $c_units = $this->home->configurationUnits($project_info->id); 
                  $all_conf = array(); 
                  if(isset($c_units) && !empty($c_units)){
                  foreach($c_units as $c_row){ $all_conf[] = $c_row->units; } } ?>
               <div class="valuepvfd"><?= (!empty($all_conf))? implode(', ', $all_conf).' BHK Apartments' : 'N/A'?></div>
            </div>
         </div>
         <div class="spcr-bdd mb-4"></div>
         <div class="mb-4">
            <h5 class="pvlbtl">About this property</h5>
            <div class="pvpd-desc"><?= htmlspecialchars_decode($project_info->project_overview); ?></p>
            </div>
         </div>
         <div class="spcr-bds"></div>
         <?php if($project_info->project_category!='5'){ ?>
         <div class="page-section" id="2">
            <h4 class="cmn-title mb-4">Floor Plan & Units</h4>
            <div class="pvfp-tab">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <?php $floors = $this->home->project_Floors($project_info->id); if(isset($floors)&& !empty($floors)){ foreach($floors as $key=>$floor){ ?>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link <?php if($key==0){echo'active'; }?>" id="bhka1-tab" data-bs-toggle="tab" data-bs-target="#bhka_<?=$key;?>" type="button" role="tab" aria-controls="bhka1" aria-selected="true"><?= $floor->floor_bedrooms; ?>BHK<br />Apartment</button>
                  </li>
                  <?php } } ?>
               </ul>
               <div class="tab-content py-4" id="myTabContent">
                  <?php if(isset($floors)&& !empty($floors)){ foreach($floors as $key=>$floor){ ?>
                  <div class="tab-pane fade <?php if($key==0){echo'show active'; }?>" id="bhka_<?=$key;?>" role="tabpanel" aria-labelledby="bhka1-tab">
                     <?php $floorPlans = $this->home->project_Floorplans($project_info->id, $floor->floor_bedrooms); ?>
                     <div class="vpvtab d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                           <?php if(isset($floorPlans)&& !empty($floorPlans)){ foreach($floorPlans as $ks=>$floorPlan){ ?>
                           <button class="nav-link <?php if($ks==0){echo'active'; }?>" id="plan_<?=$ks;?>-tab" data-bs-toggle="pill" data-bs-target="#plan<?=$key;?><?=$ks;?>" type="button" role="tab" aria-controls="plan<?=$ks;?>" aria-selected="true"><?= number_format($floorPlan->floor_size, 2); ?> SQ. FT</button>
                           <?php } } ?>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                           <?php if(isset($floorPlans)&& !empty($floorPlans)){ foreach($floorPlans as $ls=>$floorPlan){ ?>
                           <div class="tab-pane fade <?php if($ls==0){echo'active show'; }?>" id="plan<?=$key;?><?=$ls;?>" role="tabpanel" aria-labelledby="plan<?=$key;?><?=$ls;?>-tab">
                              <div class="fppv-tblwrp">
                                 <table class="table table-fppv">
                                    <tr>
                                       <th>Floor Plan</th>
                                       <th>Inclusions</th>
                                       <th>Area Details</th>
                                       <th>Price Details</th>
                                    </tr>
                                    <tr>
                                       <td>
                                          <?php if($floorPlan->floor_planImage!=''){ ?>
                                          <a data-fancybox="gallery" href="<?= base_url(); ?>uploads/projects/floorPlans/<?= $floorPlan->floor_planImage; ?>" data-caption="">
                                          <img src="<?= base_url(); ?>uploads/projects/floorPlans/<?= $floorPlan->floor_planImage; ?>" class="fp-img" /></a>
                                          <?php }else{ ?>
                                          <a data-fancybox="gallery" href="<?= base_url(); ?>assets/images/no_image.jpg" data-caption="">
                                          <img src="<?= base_url(); ?>assets/images/no_image.jpg" class="fp-img" /></a>
                                          <?php } ?>
                                       </td>
                                       <td class="pvtlst"><?= $floorPlan->floor_bedrooms; ?> bedrooms<br>1 kitchens<br><?= $floorPlan->floor_bathrooms; ?> bathroom<br>3 balcony<br>1 living</td>
                                       <td>
                                          <div class="clbl">Super Built-up Area</div>
                                          <div class="pvlv mb-2"><?= number_format($floorPlan->floor_size,2); ?> sq.ft.<span class="sbpv"><?= number_format(($floorPlan->floor_size*0.305),2); ?> sq.m.</span></div>
                                          <div class="clbl">Builtup Area</div>
                                          <div class="pvlv"><?= number_format($floorPlan->floor_builtupArea,2); ?> sq.ft.<span class="sbpv"><?= number_format(($floorPlan->floor_builtupArea*0.305),2); ?> sq.m.</span></div>
                                       </td>
                                       <td>
                                          <div class="clbl">Base Price</div>
                                          <div class="pvpclv">₹ <?= no_to_words($floorPlan->floor_totalPrice); ?></div>
                                       </td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <?php } } ?>
                        </div>
                     </div>
                  </div>
                  <?php } } ?>
               </div>
            </div>
         </div>
         <?php }else{ ?>
         <div class="page-section" id="2">
            <h4 class="cmn-title mb-4">Plot Plans</h4>
            <div class="pvfp-tab">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <?php $plots = $this->home->project_plots($project_info->id);?>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link active" id="bhka1-tab" data-bs-toggle="tab" data-bs-target="#bhka_c" type="button" role="tab" aria-controls="bhka1" aria-selected="true">Configurations</button>
                  </li>
               </ul>
               <div class="tab-content py-4" id="myTabContent">
                  <?php if(isset($plots)&& !empty($plots)){ foreach($plots as $key=>$plot){ ?>
                  <div class="tab-pane fade <?php if($key==0){echo'show active'; }?>" id="bhka_<?=$key;?>" role="tabpanel" aria-labelledby="bhka1-tab">
                     <div class="vpvtab d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                           <?php if(isset($plots)&& !empty($plots)){ foreach($plots as $ks=>$plot){ ?>
                           <button class="nav-link <?php if($ks==0){echo'active'; }?>" id="plan_<?=$ks;?>-tab" data-bs-toggle="pill" data-bs-target="#plan<?=$ks;?>" type="button" role="tab" aria-controls="plan<?=$ks;?>" aria-selected="true"><?= number_format($plot->plot_size, 2); ?> SQ. FT</button>
                           <?php } } ?>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                           <?php if(isset($plots)&& !empty($plots)){ foreach($plots as $ls=>$plot){ ?>
                           <div class="tab-pane fade <?php if($ls==0){echo'active show'; }?>" id="plan<?=$ls;?>" role="tabpanel" aria-labelledby="plan<?=$ls;?>-tab">
                              <div class="fppv-tblwrp">
                                 <table class="table table-fppv">
                                    <tr>
                                       <th>Plot Plan</th>
                                       <th>Area Details</th>
                                       <th>Price Details</th>
                                    </tr>
                                    <tr>
                                       <td>
                                          <?php if($plot->plot_Image!=''){ ?>
                                          <a data-fancybox="gallery" href="<?= base_url(); ?>uploads/projects/plotPlans/<?= $plot->plot_Image; ?>" data-caption="">
                                          <img src="<?= base_url(); ?>uploads/projects/plotPlans/<?= $plot->plot_Image; ?>" class="fp-img">
                                          <?php }else{ ?>
                                          <a data-fancybox="gallery" href="<?= base_url(); ?>assets/images/no_image.jpg" data-caption="">
                                          <img src="<?= base_url(); ?>assets/images/no_image.jpg" class="fp-img" /></a>
                                          <?php } ?>
                                       </td>
                                       <td>
                                          <div class="clbl">Plot Area</div>
                                          <div class="pvlv mb-2"><?= number_format($plot->plot_size,2); ?> sq.ft.<span class="sbpv"><?= number_format(($plot->plot_size*0.305),2); ?> sq.m.</span></div>
                                       </td>
                                       <td>
                                          <div class="clbl">Base Price</div>
                                          <div class="pvpclv">₹ <?= no_to_words($plot->plot_totalPrice); ?></div>
                                       </td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <?php } } ?>
                        </div>
                     </div>
                  </div>
                  <?php } } ?>
               </div>
            </div>
         </div>
         <?php } ?>
         <div class="spcr-bds"></div>
         <div class="page-section" id="3">
            <h4 class="cmn-title mb-4">Amenities</h4>
            <div class="row gx-3">
               <?php $amenities  = $this->home->_amenities($project_info->project_amenities); 
                  if(!empty($amenities)){ foreach($amenities as $am){ ?>
               <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center mb-3">
                  <div class="pv-amenit">
                     <img src="<?= base_url(); ?>uploads/amenities/<?= $am->icon; ?>" class="img-fluid">
                     <div class="pv-amenit-name"><?= $am->name; ?></div>
                  </div>
               </div>
               <?php } } ?>
            </div>
         </div>
         <div class="spcr-bds"></div>
         <div class="page-section" id="4">
            <h4 class="cmn-title mb-4">Gallery</h4>
            <div class="pvfp-tab gllry-tabs">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <?php $i=0; foreach($properties_images as $ik=>$im){ $tab = str_replace(' ', '_', strtolower($ik));?>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link <?php if($i==0){echo'active'; }?>" id="<?= $tab; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tab; ?>" type="button" role="tab" aria-controls="<?= $tab; ?>" aria-selected="true"><?= $ik; ?></button>
                  </li>
                  <?php $i++; } ?>
               </ul>
               <div class="tab-content py-4" id="myTabContent">
                  <?php $j=0;foreach($properties_images as $kk=>$images){  $ftab = str_replace(' ','_',strtolower($kk)); ?>
                  <div class="tab-pane fade<?php if($j==0){echo'show active'; }?>" id="<?= $ftab; ?>" role="tabpanel" aria-labelledby="<?= $ftab; ?>-tab">
                     <div class="row">
                        <?php foreach($images as $sk=>$p_image){ ?>
                        <div class="col-xl-3 col-md-4 col-sm-6 mt-2">
                           <a data-fancybox="gallery" href="<?= base_url(); ?>uploads/projects/<?= $kk; ?>/<?= $p_image->image_name; ?>" data-caption="<?= $p_image->image_desc; ?>">
                           <img src="<?= base_url(); ?>uploads/projects/<?= $kk; ?>/<?= $p_image->image_name; ?>" class="img-fluid" />
                           </a>
                        </div>
                        <?php } ?>
                     </div>
                  </div>
                  <?php $j++; } ?>
                  <div class="tab-pane fade" id="cnstgt" role="tabpanel" aria-labelledby="cnstgt-tab">...</div>
                  <div class="tab-pane fade" id="nbhdgt" role="tabpanel" aria-labelledby="nbhdgt-tab">...</div>
               </div>
            </div>
            <h4 class="cmn-title mb-4">Site Layout</h4>
            <div class="row">
               <div class="col-xl-3 col-md-4 col-sm-6 mt-2">
                  <?php if($project_info->site_layout!=''){ ?>
                  <a data-fancybox="gallery" href="<?= base_url(); ?>uploads/projects/Site Layout/<?= $project_info->site_layout; ?>" data-caption="<?= $project_info->site_layout; ?>">
                  <img src="<?= base_url(); ?>uploads/projects/Site Layout/<?= $project_info->site_layout; ?>" class="img-fluid" />
                  </a>
                  <?php }else{ ?>
                  <a data-fancybox="gallery" href="<?= base_url(); ?>assets/images/no_image.jpg" data-caption="">
                  <img src="<?= base_url(); ?>assets/images/no_image.jpg" class="fp-img" /></a>
                  <?php } ?>
               </div>
            </div>
         </div>
         <div class="page-section" id="5">
            <h4 class="cmn-title mb-4">Price Trends</h4>
         </div>
         <div class="page-section" id="7">
            <h4 class="cmn-title mb-4">About Developer</h4>
            <div class="pvpd-desc">
               <?php $builder = _builderDetails($project_info->builder_id);
                  if(isset($builder) && !empty($builder)){
                           echo htmlspecialchars_decode($builder->builder_information); } ?>
               <p></p>
            </div>
         </div>
         <div class="bnksec">
            <h4 class="cmn-title mb-4">Approved by Banks</h4>
            <div class="row">
               <?php $banks  = $this->home->_banks($project_info->banks_available); 
                  if(!empty($banks)){ foreach($banks as $bb){ ?>
               <div class="col-xl-2 col-md-3 col-sm-4 mb-3">
                  <div class="bnkcrd">
                     <img src="<?= base_url(); ?>uploads/banks/<?= $bb->icon; ?>" class="img-fluid">
                  </div>
               </div>
               <?php } } ?>
            </div>
         </div>
         <div class="page-section" id="6">
            <h4 class="cmn-title mb-4">Ratings & Reviews</h4>
            <?php include('reviews.php'); ?>
         </div>
      </div>
   </div>
</div>

<button class="btnFxdBtm btn btn-lg btn-pill btn-primary d-md-none"><i class="bi bi-chat-left-text me-2"></i>Cantact with us</button>

<script src="<?= base_url(); ?>assets/plugins/gallery/jquery.fancybox.min.js"></script>
<script>
   $(document).ready(function () {
   $('.fancybox').fancybox({
   beforeShow: function () {
   	this.title = $(this.element).data("caption");
   }
   });
   });
   
   $(window).scroll(function () {
   if ($(window).scrollTop() > 63) {
   $('#mainNav').addClass('navigation-fixed');
   }
   if ($(window).scrollTop() < 64) {
   $('#mainNav').removeClass('navigation-fixed');
   }
   
   if ($(window).scrollTop() > 63) {
   $('#eqbx').addClass('eqbx-fixed');
   }
   if ($(window).scrollTop() < 64) {
   $('#eqbx').removeClass('eqbx-fixed');
   }
   });
   
   $(document).ready(function () {
   $('a[href*=\\#]').bind('click', function (e) {
   e.preventDefault(); // prevent hard jump, the default behavior
   
   var target = $(this).attr("href"); // Set the target as variable
   
   // perform animated scrolling by getting top-position of target-element and set it as scroll target
   $('html, body').stop().animate({
   	scrollTop: $(target).offset().top
   }, 600, function () {
   	location.hash = target; //attach the hash (#jumptarget) to the pageurl
   });
   
   return false;
   });
   });
   
   $(window).scroll(function () {
   var scrollDistance = $(window).scrollTop();
   $('.page-section').each(function (i) {
   if ($(this).position().top <= scrollDistance) {
   	$('.navigation a.active').removeClass('active');
   	$('.navigation a').eq(i).addClass('active');
   }
   });
   }).scroll();
   
   $(document).ready(function () {
   $("input[type='radio']").click(function () {
   var sim = $("input[type='radio']:checked").val();
   //alert(sim);
   if (sim < 3) {
   	$('.myratings').css('color', 'red');
   	$(".myratings").text(sim);
   } else {
   	$('.myratings').css('color', 'green');
   	$(".myratings").text(sim);
   }
   });
   });
   
   $(document).ready(function () {
   $(window).scroll(function () {
   
   if ($(window).scrollTop() > 112) {
   	$('#eqbx').css('position', 'fixed');
   	$('#eqbx').css('top', '0');
   } else if ($(window).scrollTop() <= 112) {
   	$('#eqbx').css('position', '');
   	$('#eqbx').css('top', '');
   }
   if ($('#eqbx').offset().top + $("#eqbx").height() > $("#footer").offset().top) {
   	$('#eqbx').css('top', -($("#eqbx").offset().top + $("#eqbx").height() - $("#footer").offset().top));
   }
   });
   });
   
   $(function() {
  $('.btnFxdBtm').click(function () {
     $( "#eqbx.card.pveq-card.eqbx-fixed" ).css('margin-top','-419px');
	 $('.btnFxdBtm').hide();
  });
  $('.btnClose').click(function () {
     $( "#eqbx.card.pveq-card.eqbx-fixed" ).css('margin-top','0');
	 $('.btnFxdBtm').show();
  });
});
   


</script>