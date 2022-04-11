<link href="<?= base_url(); ?>assets/plugins/jqueryui/css/jquery-ui.css" rel="stylesheet">
<link href="<?= base_url(); ?>assets/plugins/owlcarousel/css/owl.carousel.min.css" rel="stylesheet">
<section class="section top-area">
   <div class="container text-center">
      <div class="row justify-content-center">
         <div class="col-xl-8 col-lg-9 col-md-10 col-sm-11">
            <h1 class="tb-title">Beautiful spaces in the best places</h1>
            <form name="search_properties" id="search_properties" method="POST" action="">
               <div class="srch-box mt-5 mb-5">
                  <div class="d-flex flex-wrap fltrRDO">
                     <?php echo _categories(''); ?>                      
                  </div>
                  <div class="input-group input-group-lg mb-2">
                     <select class="form-select form-select-lg mx-wd-150" id="inputGroupSelect01" name="cities">
                     <?php echo _topCities(''); ?>
                     </select>
                     <input type="text" class="form-control form-control-lg autocomplete" placeholder="Search your property here..." name="search">
                     <button class="btn btn-lg btn-primary" type="button" id="hmain_search">Search</button>
                  </div>
                  <input type="hidden" id="search" name="content">	  
            </form>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="section prop-loc-bys">
   <div class="container">
      <h2 class="cmn-title mb-3">Explore Projects in India</h2>
      <div id="flatCarousel" class="owl-carousel owl-theme">
         <?php if(!empty($_popularProjects)){ foreach($_popularProjects as $project){  $lpinfo = _listingInfo('project', $project->id);?>
		 <div class="item">
            <a href="<?php echo base_url();?><?= (isset($lpinfo->url))? $lpinfo->url : ''; ?>" title="" target="_blank" class="card">
               <div class="card-inner">
                  <div class="card-img">
				     <?php if($project->main_image!=''){ ?>
                     <img src="<?= base_url(); ?>uploads/projects/Main Image/<?= $project->main_image; ?>" class="img-fluid">
					 <?php }else{ ?>
					 <img src="<?= base_url(); ?>assets/images/cities/noida.jpg" class="img-fluid">	 
					 <?php } ?>
                  </div>
                  <div class="card-img-overlay">
                     <?php if($project->rera_approved==1){?><span class="aprvl-badge"><i class="bi bi-check-circle-fill"></i>RERA</span><?php } ?>
                     <div class="prop-snfc">Possession from <?= my_date_show($project->possesion_start_date); ?></div>
                  </div>
               </div>
               <div class="card-body">
                  <h5 class="pvpr-name"><?= $project->project_name; ?></h5>
				  <?php 
				   $bd = $this->masters->get_record_id('builders', $project->builder_id);
				   $lt = $this->masters->get_record_id('locations', $project->locality_id);
				   $ct = $this->masters->get_record_id('cities', $project->city_id);
				  ?>
                  <div class="bldr-name mb-1">by <span class="bn"><?php if(isset($bd) && !empty($bd)){ echo$bd->builder_name; } ?></span></div>
                  <div class="pvpr-loc mb-2"><?php if(isset($lt) && !empty($lt)){ echo$lt->name.', '; }if(isset($ct) && !empty($ct)){ echo$ct->name; } ?></div>
                  <div class="d-flex justify-content-between">
				     <?php $c_units = $this->home->configurationUnits($project->id); 
					 $all_conf = array(); 
					 if(isset($c_units) && !empty($c_units)){
					 foreach($c_units as $c_row){ $all_conf[] = $c_row->units; } } ?>
                     <div class="pvpr-bhk"><?= (!empty($all_conf))? implode(', ', $all_conf).' BHK Flats' : ''?></div>
                     <div class="pvpr-prc">₹ <?php $lp = listing_prices($project->id, $project->project_category); ?><?php echo no_to_words($lp->min_price).' - '.no_to_words($lp->max_price); ?></div>
                  </div>
               </div>
			  </a>
         </div>
		 <?php } } ?>
      </div>
      </div>
   </div>
</section>
<section class="section fndhm">
   <div class="container">
      <div class="row justify-content-center mt-3 mb-3">
         <div class="col-xl-6 col-lg-7 col-md-8 text-center">
            <h2 class="pg-title-big">Find your home with <span class="text-primary">Propvenues!</span></h2>
            <p class="text-hdln">Just regist to be our member, let us know your full information and then buy your
               home to the most profitable budget!
            </p>
         </div>
      </div>
   </div>
</section>
<!--<section class="section prop-loc-bys">
   <div class="container">
      <h2 class="cmn-title mb-3">Popular Residential Projects</h2>
      <div id="flatCarousel" class="owl-carousel owl-theme">
         <div class="item">
            <div class="card">
               <div class="card-inner">
                  <div class="card-img">
                     <img src="<?= base_url(); ?>assets/images/plots/greater-noida-west.jpg" class="img-fluid">
                  </div>
                  <div class="card-img-overlay">
                     <span class="aprvl-badge"><i class="bi bi-check-circle-fill"></i>RERA</span>
                     <div class="prop-snfc">Possession from Mar 2024</div>
                  </div>
               </div>
               <div class="card-body">
                  <h5 class="pvpr-name">Godrej Nurture Phase 1</h5>
                  <div class="bldr-name mb-1">by Prateek Group</div>
                  <div class="pvpr-loc mb-2">Sector- 151, Noida</div>
                  <div class="d-flex justify-content-between">
                     <div class="pvpr-bhk">2,3,4 BHK Flats</div>
                     <div class="pvpr-prc">₹ 1.88 - 5.08 Cr.</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="card">
               <div class="card-inner">
                  <div class="card-img">
                     <img src="<?= base_url(); ?>assets/images/cities/greater-noida.jpg" class="img-fluid">
                  </div>
                  <div class="card-img-overlay">
                     <span class="aprvl-badge"><i class="bi bi-check-circle-fill"></i>RERA</span>
                     <div class="prop-snfc">Possession from Mar 2024</div>
                  </div>
               </div>
               <div class="card-body">
                  <h5 class="pvpr-name">Godrej Nurture Phase 1</h5>
                  <div class="bldr-name mb-1">by Prateek Group</div>
                  <div class="pvpr-loc mb-2">Sector- 151, Noida</div>
                  <div class="d-flex justify-content-between">
                     <div class="pvpr-bhk">2,3,4 BHK Flats</div>
                     <div class="pvpr-prc">₹ 1.88 - 5.08 Cr.</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="card">
               <div class="card-inner">
                  <div class="card-img">
                     <img src="<?= base_url(); ?>assets/images/cities/ghaziabad.jpg" class="img-fluid">
                  </div>
                  <div class="card-img-overlay">
                     <span class="aprvl-badge"><i class="bi bi-check-circle-fill"></i>RERA</span>
                     <div class="prop-snfc">Possession from Mar 2024</div>
                  </div>
               </div>
               <div class="card-body">
                  <h5 class="pvpr-name">Godrej Nurture Phase 1</h5>
                  <div class="bldr-name mb-1">by Prateek Group</div>
                  <div class="pvpr-loc mb-2">Sector- 151, Noida</div>
                  <div class="d-flex justify-content-between">
                     <div class="pvpr-bhk">2,3,4 BHK Flats</div>
                     <div class="pvpr-prc">₹ 1.88 - 5.08 Cr.</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="card">
               <div class="card-inner">
                  <div class="card-img">
                     <img src="<?= base_url(); ?>assets/images/cities/delhi.jpg" class="img-fluid">
                  </div>
                  <div class="card-img-overlay">
                     <span class="aprvl-badge"><i class="bi bi-check-circle-fill"></i>RERA</span>
                     <div class="prop-snfc">Possession from Mar 2024</div>
                  </div>
               </div>
               <div class="card-body">
                  <h5 class="pvpr-name">Godrej Nurture Phase 1</h5>
                  <div class="bldr-name mb-1">by Prateek Group</div>
                  <div class="pvpr-loc mb-2">Sector- 151, Noida</div>
                  <div class="d-flex justify-content-between">
                     <div class="pvpr-bhk">2,3,4 BHK Flats</div>
                     <div class="pvpr-prc">₹ 1.88 - 5.08 Cr.</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="card">
               <div class="card-inner">
                  <div class="card-img">
                     <img src="<?= base_url(); ?>assets/images/cities/gurgaon.jpg" class="img-fluid">
                  </div>
                  <div class="card-img-overlay">
                     <span class="aprvl-badge"><i class="bi bi-check-circle-fill"></i>RERA</span>
                     <div class="prop-snfc">Possession from Mar 2024</div>
                  </div>
               </div>
               <div class="card-body">
                  <h5 class="pvpr-name">Godrej Nurture Phase 1</h5>
                  <div class="bldr-name mb-1">by Prateek Group</div>
                  <div class="pvpr-loc mb-2">Sector- 151, Noida</div>
                  <div class="d-flex justify-content-between">
                     <div class="pvpr-bhk">2,3,4 BHK Flats</div>
                     <div class="pvpr-prc">₹ 1.88 - 5.08 Cr.</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="item">
            <div class="card">
               <div class="card-inner">
                  <div class="card-img">
                     <img src="<?= base_url(); ?>assets/images/cities/faridabad.jpg" class="img-fluid">
                  </div>
                  <div class="card-img-overlay">
                     <span class="aprvl-badge"><i class="bi bi-check-circle-fill"></i>RERA</span>
                     <div class="prop-snfc">Possession from Mar 2024</div>
                  </div>
               </div>
               <div class="card-body">
                  <h5 class="pvpr-name">Godrej Nurture Phase 1</h5>
                  <div class="bldr-name mb-1">by Prateek Group</div>
                  <div class="pvpr-loc mb-2">Sector- 151, Noida</div>
                  <div class="d-flex justify-content-between">
                     <div class="pvpr-bhk">2,3,4 BHK Flats</div>
                     <div class="pvpr-prc">₹ 1.88 - 5.08 Cr.</div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="section bdrsec">
   <div class="container">
      <div class="row justify-content-center mt-3 mb-4">
         <div class="col-xl-6 col-lg-7 col-md-8 text-center">
            <h2 class="pg-title-big">Popular  <span class="text-primary">builders!</span></h2>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-xl-10 col-lg-11 col-md-12">
            <div id="builderCarausel" class="owl-carousel owl-theme bldrc mb-4">
               <div class="item">
                  <div class="card bldc mb-3">
                     <div class="card-body d-flex">
                        <div class="bldpic">
                           <img src="<?= base_url(); ?>assets/images/builders/Jaypee-Group-Logo.png" />
                        </div>
                        <div>
                           <a class="bldnme" href="javascript:;">Jaypee Greens</a>
                           <div class="d-flex blddth">
                              <span class="me-3">Exp: <strong>21 Years</strong></span>  |  <span class="me-3 ms-3">Total Projects: <strong>72</strong></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card bldc">
                     <div class="card-body d-flex">
                        <div class="bldpic">
                           <img src="<?= base_url(); ?>assets/images/builders/ats-Logo.png" />
                        </div>
                        <div>
                           <a class="bldnme" href="javascript:;">ATS Group</a>
                           <div class="d-flex blddth">
                              <span class="me-3">Exp: <strong>21 Years</strong></span>  |  <span class="me-3 ms-3">Total Projects: <strong>72</strong></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="card bldc mb-3">
                     <div class="card-body d-flex">
                        <div class="bldpic">
                           <img src="<?= base_url(); ?>assets/images/builders/prateek-logo.png" />
                        </div>
                        <div>
                           <a class="bldnme" href="javascript:;">Prateek Group</a>
                           <div class="d-flex blddth">
                              <span class="me-3">Exp: <strong>21 Years</strong></span>  |  <span class="me-3 ms-3">Total Projects: <strong>72</strong></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card bldc">
                     <div class="card-body d-flex">
                        <div class="bldpic">
                           <img src="<?= base_url(); ?>assets/images/builders/ajnara.png" />
                        </div>
                        <div>
                           <a class="bldnme" href="javascript:;">Ajnara India</a>
                           <div class="d-flex blddth">
                              <span class="me-3">Exp: <strong>21 Years</strong></span>  |  <span class="me-3 ms-3">Total Projects: <strong>72</strong></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="item">
                  <div class="card bldc mb-3">
                     <div class="card-body d-flex">
                        <div class="bldpic">
                           <img src="<?= base_url(); ?>assets/images/builders/mahagun-logo.png" />
                        </div>
                        <div>
                           <a class="bldnme" href="javascript:;">Mahagun Group</a>
                           <div class="d-flex blddth">
                              <span class="me-3">Exp: <strong>21 Years</strong></span>  |  <span class="me-3 ms-3">Total Projects: <strong>72</strong></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card bldc">
                     <div class="card-body d-flex">
                        <div class="bldpic">
                           <img src="<?= base_url(); ?>assets/images/builders/gulshan-homz-logo.png" />
                        </div>
                        <div>
                           <a class="bldnme" href="javascript:;">Gulshan Homz</a>
                           <div class="d-flex blddth">
                              <span class="me-3">Exp: <strong>21 Years</strong></span>  |  <span class="me-3 ms-3">Total Projects: <strong>72</strong></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>-->
<section class="section prop-loc-bys">
   <div class="container">
      <h2 class="cmn-title mb-3 mt-4">Popular Residential Plots</h2>
      <div id="commercialCarousel" class="owl-carousel owl-theme">
         <?php if(!empty($_popularPlots)){ foreach($_popularPlots as $p_project){ $linfo = _listingInfo('project', $p_project->id);?>
		 <div class="item">
            <a href="<?php echo base_url();?><?= (isset($linfo->url))? $linfo->url : ''; ?>" title="" target="_blank" class="card">
               <div class="card-inner">
                  <div class="card-img">
				     <?php if($p_project->main_image!=''){ ?>
                     <img src="<?= base_url(); ?>uploads/projects/Main Image/<?= $p_project->main_image; ?>" class="img-fluid">
					 <?php }else{ ?>
					 <img src="<?= base_url(); ?>assets/images/cities/noida.jpg" class="img-fluid">	 
					 <?php } ?>
                  </div>
                  <div class="card-img-overlay">
                     <?php if($p_project->rera_approved==1){?><span class="aprvl-badge"><i class="bi bi-check-circle-fill"></i>RERA</span><?php } ?>
                     <div class="prop-snfc">Possession from <?= my_date_show($p_project->possesion_start_date); ?></div>
                  </div>
               </div>
               <div class="card-body">
                  <h5 class="pvpr-name"><?= $p_project->project_name; ?></h5>
				  <?php 
				   $bd = $this->masters->get_record_id('builders', $p_project->builder_id);
				   $lt = $this->masters->get_record_id('locations', $p_project->locality_id);
				   $ct = $this->masters->get_record_id('cities', $p_project->city_id);
				  ?>
                  <div class="bldr-name mb-1">by <span class="nm"><?php if(isset($bd) && !empty($bd)){ echo$bd->builder_name; } ?></span></div>
                  <div class="pvpr-loc mb-2"><?php if(isset($lt) && !empty($lt)){ echo$lt->name.', '; }if(isset($ct) && !empty($ct)){ echo$ct->name; } ?></div>
                  <div class="d-flex justify-content-between">
				     <?php $c_units = $this->home->configurationUnits($p_project->id); 
					 $all_conf = array(); 
					 if(isset($c_units) && !empty($c_units)){
					 foreach($c_units as $c_row){ $all_conf[] = $c_row->units; } } ?>
                     <div class="pvpr-bhk d-none"><?= (!empty($all_conf))? implode(', ', $all_conf).' BHK Flats' : ''?></div>
                     <div class="pvpr-prc">₹ <?php $lp = listing_prices($p_project->id, $p_project->project_category); ?><?php echo no_to_words($lp->min_price).' - '.no_to_words($lp->max_price); ?></div>
                  </div>
               </div>
			   </a>
         </div>
		 <?php } } ?>
      </div>
   </div>
   </div>
</section>
<section class="section rrsec">
   <div class="container">
      <div class="row justify-content-center mt-3 mb-3">
         <div class="col-xl-6 col-lg-7 col-md-8 text-center">
            <h2 class="pg-title-big">Real Estate Regulatory Authority <span class="text-primary">(RERA)</span></h2>
            <p class="text-hdln">Get a brief summary of RERA & Its benefits <a href="javascript:;">here</a>. You can also browse through RERA registered projects in Top cities.</p>
         </div>
      </div>
   </div>
</section>
<section class="section prop-loc-bys">
	<div class="container">
      <h2 class="pg-title-big text-center mb-5">What Our Client's Say</h2>
	  <div class="row justify-content-center">
         <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-10 text-center">
		 <img src="<?= base_url(); ?>assets/images/double-quotes.svg" class="img-fluid mb-5">
	  <div id="#clientCarousel" class="owl-carousel owl-theme clientsay">
         <div class="item">
            <div class="csbox">
               <p>I would like to appreciate the service and support provided by a Propveneus team during property purchase. They provide me the complete project details which helps me to buy a one in a hassle free manner. I would say, Propvenues is  a professionally managed firm which has established itself as a renowned player in the online real estate business. </p>
			   <img src="<?= base_url(); ?>assets/images/user.jpg" height="120" width="120" class="img-fluid rounded-circle">
			   <h5>Ravendra Pratap Singh</h5>
            </div>
         </div>
		  <div class="item">
            <div class="csbox">
               <p>I have purchased my own property in NCR from Propvenues. I would like to thank sales team that provides me full support in purchasing my own flat. They deal very nicely with me and logically cleared all my queries related to the project. Also, they help me to choose the best payment plan as per my budget. I recommend Propvenues to everyone.</p>
			   <img src="<?= base_url(); ?>assets/images/user.jpg" height="120" width="120" class="img-fluid rounded-circle">
			   <h5>Hemant Vijay</h5>
            </div>
         </div>
		 <div class="item">
            <div class="csbox">
               <p>I am one of the happy customers of Propvenues. I am happy to deal with  Propvenues because they provide me the inside scoop of the project feasibility, neighbourhood demographics and on-going market trends to make property buying easy for me. They provided me the verified project data that helps me to make final decision regarding my property purchase.</p>
			   <img src="<?= base_url(); ?>assets/images/dharamvir.jpg" height="120" width="120" class="img-fluid rounded-circle">
			   <h5>D.V. Singh</h5>
            </div>
         </div>
		 <div class="item">
            <div class="csbox">
               <p>Last year I was dreaming to buy a new house and finally my dream come true with Propvenues. Propvenues is really a nice online portal that provide deep and inside knowledge about Delhi-NCR projects. They have a professional sales team that helps to you decide the best property as per your needs and budget. Also, they helps you to select the best payment plan. </p>
			   <img src="<?= base_url(); ?>assets/images/user.jpg" height="120" width="120" class="img-fluid rounded-circle">
			   <h5>Manvendra Tyagi</h5>
            </div>
         </div>
		 <div class="item">
            <div class="csbox">
               <p>Propvenues not only help you to search but help you to find one and that too in a pocket-friendly manner. Their sales team is very supportive and reliable. I have an amazing experience with Propvenues. For me Propvenues is a first portal to call to buy a residential property in Delhi-NCR. </p>
			   <img src="<?= base_url(); ?>assets/images/ramvir.jpg" height="120" width="120" class="img-fluid rounded-circle">
			   <h5>Ramvir Singh</h5>
            </div>
         </div>

	  </div>
	  </div>
	  </div>


   <div class="container d-none">
      <h2 class="cmn-title mb-3">Latest News & Articles</h2>
      <div class="row">
         <div class="col-md-6">
            <div class="card">
               <div class="row g-0">
                  <div class="col-md-5">
                     <img src="<?= base_url(); ?>assets/images/cities/gurgaon.jpg" class="img-fluid rounded-start">
                  </div>
                  <div class="col-md-7">
                     <div class="card-body">
                        <h5 class="nws-title"><a href="javascript:;">We realise the growth potential of Indian real estate, says marketing head of Warren Buffet-backed property brokerage</a></h5>
                        <p class="nws-desc">In an exclusive interview with propvenues.com News, Sanya Aeren, chief advisor, Berkshire Hathway Home Services and Orenda India, speaks about the opportunities and challenges facing Berkshire Hathway’s foray into the Indian real estate market</p>
                        <a class="rdmr-link" href="javascript:;">Read More<i class="bi bi-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card">
               <div class="row g-0">
                  <div class="col-md-5">
                     <img src="<?= base_url(); ?>assets/images/cities/yamuna-expressway.jpg" class="img-fluid rounded-start">
                  </div>
                  <div class="col-md-7">
                     <div class="card-body">
                        <h5 class="nws-title"><a href="javascript:;">We realise the growth potential of Indian real estate, says marketing head of Warren Buffet-backed property brokerage</a></h5>
                        <p class="nws-desc">In an exclusive interview with propvenues.com News, Sanya Aeren, chief advisor, Berkshire Hathway Home Services and Orenda India, speaks about the opportunities and challenges facing Berkshire Hathway’s foray into the Indian real estate market</p>
                        <a class="rdmr-link" href="javascript:;">Read More<i class="bi bi-arrow-right"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container d-none">
      <h2 class="pg-title-big text-center mt-5">Tools & Advice</h2>
      <div class="row">
         <div class="col-md-3 col-sm-6 text-center">
            <div class="card">
               <div class="card-body">
                  <img src="<?= base_url(); ?>assets/images/trends.svg" class="img-fluid ta-icons">
                  <h5 class="ta-title mt-4">Trends & Rates</h5>
                  <p class="ta-desc">Get all there is to know about property rates and trends in your city.</p>
                  <a class="rdmr-link" href="javascript:;">Read More<i class="bi bi-arrow-right"></i></a>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-6 text-center">
            <div class="card">
               <div class="card-body">
                  <img src="<?= base_url(); ?>assets/images/investment.svg" class="img-fluid ta-icons">
                  <h5 class="ta-title mt-4">Investment Spotlight</h5>
                  <p class="ta-desc">Find out where to invest in your city's best communities.</p>
                  <a class="rdmr-link" href="javascript:;">Read More<i class="bi bi-arrow-right"></i></a>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-6 text-center">
            <div class="card">
               <div class="card-body">
                  <img src="<?= base_url(); ?>assets/images/research.svg" class="img-fluid ta-icons">
                  <h5 class="ta-title mt-4">Research Insights</h5>
                  <p class="ta-desc">Get real estate professional advice and research reports.</p>
                  <a class="rdmr-link" href="javascript:;">Read More<i class="bi bi-arrow-right"></i></a>
               </div>
            </div>
         </div>
         <div class="col-md-3 col-sm-6 text-center">
            <div class="card">
               <div class="card-body">
                  <img src="<?= base_url(); ?>assets/images/calculator.svg" class="img-fluid ta-icons">
                  <h5 class="ta-title mt-4">EMI Calculator</h5>
                  <p class="ta-desc">Know how much you'll have to pay on your loan each month.</p>
                  <a class="rdmr-link" href="javascript:;">Read More<i class="bi bi-arrow-right"></i></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script src="<?= base_url(); ?>assets/plugins/jqueryui/js/jquery-ui.js"></script>
<script src="<?= base_url(); ?>assets/plugins/owlcarousel/js/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>assets/js/carousel.js"></script>
<script>
   var baseUrl=$('base').attr("href");
      $(function() {
   	 $(".autocomplete" ).autocomplete({
         source: function( request, response ) {
        	var city = $('select[name="cities"]').val();
           $.ajax({
   				url: baseUrl + 'home/search_properties',
   				dataType: "json",
   				data: {
   					q: request.term,
   					city: city	  
   				},
   				success: function (data) {
   					response($.map(data, function (item) {
   						return {
   							label: item.name,
   							desc: item.desc,							
   							val: item.val,						
   							slug: item.slug						
   						};
   					}));
   				}
   			});
         },
         minLength: 0,
         select: function( event, ui ) {
   		var content = btoa(ui.item.val);  
   		var slug = ui.item.slug;  
           $('#search').attr('data-slug','');
           $('#search').val('');
           $('#search').val(content);
           $('#search').attr('data-slug',slug);
         }
       }).autocomplete("instance" )._renderItem = function( ul, item ) {
         return $( "<li>" )
           .append( "<div>" + item.label + "<span class='suggests'>" + item.desc + "</span></div>" )
           .appendTo( ul );
       }; 
   	$('#hmain_search').on('click', function(){
          /*var lc = $('#search').val();
   		if(lc==''){
   		 $('input[name="search"]').css('border','1px solid red');
   		 $('input[name="search"]').focus();
   		 //alert('Please search a locality first!.');
   		 return false;
   		}*/
   		search_properties();
   	});
      });
      function search_properties(){
   	   
   	   var main     = $('select[name="cities"]').val();
   	   var type     = $('input[name="type"]:checked').val();
   	   //var search   = $('input[name="search"]').val();
   	   var search   = $('input[name="content"]').data('slug');
   	   var content  = $('input[name="content"]').val();
   	   console.log(content);
   	   var str  = atob(content);
   	   var res = str.split('_');
   	   if(res[0]=='LOC'){
   	     var mainURL  = baseUrl + 'search/properties/';
   		 if(type==undefined){ type = ''; }
   		 if(search==undefined){ search = ''; }
   	     if(content==undefined){ content = ''; }
   		 window.location.href = mainURL + main + '?location='+search+'&type='+type+'&content='+content;   
   	   }
   	   if(res[0]=='PROJ'){
   		 //var mainURL  = baseUrl + 'property/' + search + '--' + res[1];  
   		 var mainURL  = baseUrl + search;  
   		 window.location.href = mainURL;  
   	   }if(res[0]=='BLD'){
   		 //var mainURL  = baseUrl + 'property/' + main + '/' + search + '--' + res[1];  
   		 var mainURL  = baseUrl + search;  
   		 window.location.href = mainURL;  
   	   }if(content==''){
   		 var mainURL  = baseUrl + main;
   		 window.location.href = mainURL;  
   	   }
      }
    $('#inputGroupSelect01').on('change',function(){
       $('.autocomplete').trigger(jQuery.Event("keydown"));
	});	  
	$('.autocomplete').on("focus", function( event, ui ) {
	  $(this).trigger(jQuery.Event("keydown"));
	});	  
</script>