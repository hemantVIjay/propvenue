<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?= base_url(); ?>assets/plugins/gallery/jquery.fancybox.min.css" rel="stylesheet">
<div class="pv-dtl">
   <div class="container">
      <div class="pv-breadcrumb">
         <a href="javascript:;">India Property</a>
         <a href="javascript:;">Property in Noida</a>
         <a href="javascript:;">Property in Sector 150</a>
         <a class="current" href="javascript:;">Godrej Nurture Phase 1</a>
      </div>
      <div class="row">
         <div class="col-md-9">
            <div class="pvd-banner mb-3">
               <?php if($property_info->main_image!=''){ ?>
			   <img src="<?= base_url(); ?>uploads/properties/Main Image/<?= $property_info->main_image; ?>" class="img-fluid">
			   <?php }else{ ?>
			   <img src="<?= base_url(); ?>assets/images/home-banner.jpg" class="img-fluid">
			   <?php }?>
            </div>
            <div class="pvpds mb-4">
               <div class="row">
			      <div class="col-md-8">
                     <h2 class="pvpd-title"><?= $property_info->property_name; ?></h2>
                      <h6 class="pvpd-py"><?php if($property_info->builder_id!='0'){ ?> By<span><?php $builder = _builderDetails($property_info->builder_id); echo $builder->builder_name; ?></span><?php } ?></h6>
                     <h6 class="pvpd-locate"><?= $property_info->property_address; ?></h6>
                  </div>
                  <div class="col-md-4 text-end">
                     <h1 class="pvpd-prc mb-3">₹ <?= no_to_words($property_info->cost); ?><?php $rate = ($property_info->cost/$property_info->builtup_area); ?><span class="pv-sb">₹ <?php echo number_format($rate); ?>/ sq.ft</span></h1>
                     <!--<h5 class="pvpd-pemi">EMI starts at ₹ 19,550</h5>-->
                  </div>
               </div>
               <?php $rera = $property_info->rera_approved; 
			    if($rera=='1'){ ?>
			   <div class="pv-reras d-inline-block">
                  <span class="bdg"><i class="bi bi-check-circle-fill me-2"></i>RERA Registered</span>
                  <span class="bdgrn">Registration No: <?= $property_info->rera_registrationNumber; ?></span>
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
      <!--<a class="navigation__link" href="#2">Floor Plan & Unit</a>-->
      <a class="navigation__link" href="#3">Amenities</a>
      <a class="navigation__link" href="#4">Gallery</a>
      <!--<a class="navigation__link" href="#5">Price Trends</a>-->
      <a class="navigation__link" href="#6">Ratings & Reviews</a>
      <a class="navigation__link" href="#7">About Developer</a>
   </div>
</nav>
<div class="container">
<div class="row">
   <div class="col-md-9">
      <div class="page-section hero" id="1">
         <h4 class="cmn-title mb-4">Overview</h4>
         
         <div class="spcr-bdd mb-4"></div>
         <div class="mb-4">
            <h5 class="pvlbtl">About this property</h5>
            <div class="pvpd-desc"><?= htmlspecialchars_decode($property_info->description); ?></p>
            </div>
         </div>
         <div class="spcr-bds"></div>
         <div class="page-section" id="2">
            <!--<h4 class="cmn-title mb-4">Floor Plan & Units</h4>
            <div class="pvfp-tab">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <button class="nav-link active" id="bhka1-tab" data-bs-toggle="tab" data-bs-target="#bhka1" type="button" role="tab" aria-controls="bhka1" aria-selected="true">1BHK<br />Apartment</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="bhka2-tab" data-bs-toggle="tab" data-bs-target="#bhka2" type="button" role="tab" aria-controls="bhka2" aria-selected="false">2BHK<br />Apartment</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="bhka3-tab" data-bs-toggle="tab" data-bs-target="#bhka3" type="button" role="tab" aria-controls="bhka3" aria-selected="false">3BHK<br />Apartment</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="bhka4-tab" data-bs-toggle="tab" data-bs-target="#bhka4" type="button" role="tab" aria-controls="bhka4" aria-selected="false">4BHK<br />Apartment</button>
                  </li>
               </ul>
               <div class="tab-content py-4" id="myTabContent">
                  <div class="tab-pane fade show active" id="bhka1" role="tabpanel" aria-labelledby="bhka1-tab">
                     <div class="vpvtab d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                           <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">520.00 SQ. FT</button>
                           <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">580.00 SQ. FT</button>
                           <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">650.00 SQ. FT</button>
                           <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">710.00 SQ. FT</button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                           <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              <div class="fppv-tblwrp">
                                 <table class="table table-fppv">
                                    <tr>
                                       <th>Floor Plan</th>
                                       <th>Inclusions</th>
                                       <th>Area Details</th>
                                       <th>Price Details</th>
                                    </tr>
                                    <tr>
                                       <td><img src="<?= base_url(); ?>assets/images/plan1.jpg" class="img-fluid fp-img"></td>
                                       <td class="pvtlst">3 bedrooms<br>1 kitchens<br>2 bathroom<br>4 balcony<br>1 living</td>
                                       <td>
                                          <div class="clbl">Super Built-up Area</div>
                                          <div class="pvlv mb-2">1495 sq.ft.<span class="sbpv">138.89 sq.m.</span></div>
                                          <div class="clbl">Builtup Area</div>
                                          <div class="pvlv">1201 sq.ft.<span class="sbpv">111.58 sq.m.</span></div>
                                       </td>
                                       <td>
                                          <div class="clbl">Base Price</div>
                                          <div class="pvpclv">₹ 88.0 Lacs</div>
                                       </td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                              <div class="fppv-tblwrp">
                                 <table class="table table-fppv">
                                    <tr>
                                       <th>Floor Plan</th>
                                       <th>Inclusions</th>
                                       <th>Area Details</th>
                                       <th>Price Details</th>
                                    </tr>
                                    <tr>
                                       <td><img src="<?= base_url(); ?>assets/images/plan1.jpg" class="img-fluid fp-img"></td>
                                       <td class="pvtlst">3 bedrooms<br>1 kitchens<br>2 bathroom<br>4 balcony<br>1 living</td>
                                       <td>
                                          <div class="clbl">Super Built-up Area</div>
                                          <div class="pvlv mb-2">1495 sq.ft.<span class="sbpv">138.89 sq.m.</span></div>
                                          <div class="clbl">Builtup Area</div>
                                          <div class="pvlv">1201 sq.ft.<span class="sbpv">111.58 sq.m.</span></div>
                                       </td>
                                       <td>
                                          <div class="clbl">Base Price</div>
                                          <div class="pvpclv">₹ 88.0 Lacs</div>
                                       </td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                              <div class="fppv-tblwrp">
                                 <table class="table table-fppv">
                                    <tr>
                                       <th>Floor Plan</th>
                                       <th>Inclusions</th>
                                       <th>Area Details</th>
                                       <th>Price Details</th>
                                    </tr>
                                    <tr>
                                       <td><img src="<?= base_url(); ?>assets/images/plan1.jpg" class="img-fluid fp-img"></td>
                                       <td class="pvtlst">3 bedrooms<br>1 kitchens<br>2 bathroom<br>4 balcony<br>1 living</td>
                                       <td>
                                          <div class="clbl">Super Built-up Area</div>
                                          <div class="pvlv mb-2">1495 sq.ft.<span class="sbpv">138.89 sq.m.</span></div>
                                          <div class="clbl">Builtup Area</div>
                                          <div class="pvlv">1201 sq.ft.<span class="sbpv">111.58 sq.m.</span></div>
                                       </td>
                                       <td>
                                          <div class="clbl">Base Price</div>
                                          <div class="pvpclv">₹ 88.0 Lacs</div>
                                       </td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                              <div class="fppv-tblwrp">
                                 <table class="table table-fppv">
                                    <tr>
                                       <th>Floor Plan</th>
                                       <th>Inclusions</th>
                                       <th>Area Details</th>
                                       <th>Price Details</th>
                                    </tr>
                                    <tr>
                                       <td><img src="<?= base_url(); ?>assets/images/plan1.jpg" class="img-fluid fp-img"></td>
                                       <td class="pvtlst">3 bedrooms<br>1 kitchens<br>2 bathroom<br>4 balcony<br>1 living</td>
                                       <td>
                                          <div class="clbl">Super Built-up Area</div>
                                          <div class="pvlv mb-2">1495 sq.ft.<span class="sbpv">138.89 sq.m.</span></div>
                                          <div class="clbl">Builtup Area</div>
                                          <div class="pvlv">1201 sq.ft.<span class="sbpv">111.58 sq.m.</span></div>
                                       </td>
                                       <td>
                                          <div class="clbl">Base Price</div>
                                          <div class="pvpclv">₹ 88.0 Lacs</div>
                                       </td>
                                    </tr>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="bhka2" role="tabpanel" aria-labelledby="bhka2-tab">...</div>
                  <div class="tab-pane fade" id="bhka3" role="tabpanel" aria-labelledby="bhka3-tab">...</div>
                  <div class="tab-pane fade" id="bhka4" role="tabpanel" aria-labelledby="bhka4-tab">...</div>
               </div>
            </div>-->
         </div>
         <div class="spcr-bds"></div>
         <div class="page-section" id="3">
            <h4 class="cmn-title mb-4">Amenities</h4>
            <div class="row gx-3">
               <?php $amenities  = $this->home->_amenities($property_info->property_amenities); 
     			   foreach($amenities as $am){ ?>
			   <div class="col-xl-2 col-lg-3 col-md-4 col-6 text-center mb-3">
                  <div class="pv-amenit">
                     <img src="<?= base_url(); ?>uploads/amenities/<?= $am->icon; ?>" class="img-fluid">
                     <div class="pv-amenit-name"><?= $am->name; ?></div>
                  </div>
               </div>
			   <?php } ?>
            </div>
         </div>
         <div class="spcr-bds"></div>
         <div class="page-section" id="4">
            <h4 class="cmn-title mb-4">Gallery</h4>
            <div class="pvfp-tab gllry-tabs">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <?php foreach($properties_images as $ik=>$im){ $tab = str_replace(' ', '_', strtolower($ik));?>
				  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="<?= $tab; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tab; ?>" type="button" role="tab" aria-controls="<?= $tab; ?>" aria-selected="true"><?= $ik; ?></button>
                  </li>
				  <?php } ?>
               </ul>
               <div class="tab-content py-4" id="myTabContent">
			      <?php foreach($properties_images as $kk=>$images){  $ftab = str_replace(' ','_',strtolower($kk)); ?>
                  <div class="tab-pane fade" id="<?= $ftab; ?>" role="tabpanel" aria-labelledby="<?= $ftab; ?>-tab">
                     <div class="row">
                        <?php foreach($images as $sk=>$p_image){ ?>
						<div class="col-xl-3 col-md-4 col-sm-6 mt-2">
                           <a data-fancybox="gallery" href="<?= base_url(); ?>uploads/properties/<?= $kk; ?>/<?= $p_image->image_name; ?>" data-caption="<?= $p_image->image_desc; ?>">
                           <img src="<?= base_url(); ?>uploads/properties/<?= $kk; ?>/<?= $p_image->image_name; ?>" class="img-fluid" />
                           </a>
                        </div>
						<?php } ?>
                     </div>
                  </div>
				  <?php } ?>
                  <div class="tab-pane fade" id="cnstgt" role="tabpanel" aria-labelledby="cnstgt-tab">...</div>
                  <div class="tab-pane fade" id="nbhdgt" role="tabpanel" aria-labelledby="nbhdgt-tab">...</div>
               </div>
            </div>
         </div>
         <div class="page-section" id="7">
            <h4 class="cmn-title mb-4">About Developer</h4>
            <div class="pvpd-desc"><?php if($property_info->builder_id!='0'){ $builder = _builderDetails($property_info->builder_id); echo $builder->builder_information; } ?>
               <p></p>
            </div>
         </div>
         <!--<div class="bnksec">
            <h4 class="cmn-title mb-4">Approved by Banks</h4>
            <div class="row">
               <?php $banks  = $this->home->_banks($property_info->banks_available); 
     			   foreach($banks as $bb){ ?>
			   <div class="col-xl-2 col-md-3 col-sm-4 mb-3">
                  <div class="bnkcrd">
                     <img src="<?= base_url(); ?>uploads/banks/<?= $bb->icon; ?>" class="img-fluid">
                  </div>
               </div>
			   <?php } ?>
            </div>
         </div>-->
         <div class="page-section" id="6">
            <h4 class="cmn-title mb-4">Ratings & Reviews</h4>
            <?php include('reviews.php'); ?>
         </div>
      </div>
   </div>
</div>
<script src="<?= base_url(); ?>assets/plugins/gallery/jquery.fancybox.min.js"></script>
<script>

   $(document).ready(function() {
    $('.fancybox').fancybox({
     beforeShow : function(){
      this.title =  $(this.element).data("caption");
     }
    });
   });
   
   $(document).ready(function(){
   
   $("input[type='radio']").click(function(){
   var sim = $("input[type='radio']:checked").val();
   //alert(sim);
   if (sim<3) { $('.myratings').css('color','red'); $(".myratings").text(sim); }else{ $('.myratings').css('color','green'); $(".myratings").text(sim); } }); });
   
   
   
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
   
   $(document).ready(function() {
   		$('a[href*=\\#]').bind('click', function(e) {
   				e.preventDefault(); // prevent hard jump, the default behavior
   
   				var target = $(this).attr("href"); // Set the target as variable
   
   				// perform animated scrolling by getting top-position of target-element and set it as scroll target
   				$('html, body').stop().animate({
   						scrollTop: $(target).offset().top
   				}, 600, function() {
   						location.hash = target; //attach the hash (#jumptarget) to the pageurl
   				});
   
   				return false;
   		});
   });
   
   $(window).scroll(function() {
   		var scrollDistance = $(window).scrollTop();
   
   		// Show/hide menu on scroll
   		//if (scrollDistance >= 850) {
   		//		$('nav').fadeIn("fast");
   		//} else {
   		//		$('nav').fadeOut("fast");
   		//}
   	
   		// Assign active class to nav links while scolling
   		$('.page-section').each(function(i) {
   				if ($(this).position().top <= scrollDistance) {
   						$('.navigation a.active').removeClass('active');
   						$('.navigation a').eq(i).addClass('active');
   				}
   		});
   }).scroll();

$(document).ready(function(){

$("input[type='radio']").click(function(){
var sim = $("input[type='radio']:checked").val();
//alert(sim);
if (sim<3) { $('.myratings').css('color','red'); $(".myratings").text(sim); }else{ $('.myratings').css('color','green'); $(".myratings").text(sim); } }); });

$(window).scroll(function() {
		var scrollDistance = $(window).scrollTop();

		// Show/hide menu on scroll
		//if (scrollDistance >= 850) {
		//		$('nav').fadeIn("fast");
		//} else {
		//		$('nav').fadeOut("fast");
		//}
	
		// Assign active class to nav links while scolling
		$('.page-section').each(function(i) {
				if ($(this).position().top <= scrollDistance) {
						$('.navigation a.active').removeClass('active');
						$('.navigation a').eq(i).addClass('active');
				}
		});
}).scroll();

$(document).ready(function(){
$(window).scroll(function () {   
   
 if($(window).scrollTop() > 112) {
    $('#eqbx').css('position','fixed');
    $('#eqbx').css('top','0'); 
 }

 else if ($(window).scrollTop() <= 112) {
    $('#eqbx').css('position','');
    $('#eqbx').css('top','');
 }  
    if ($('#eqbx').offset().top + $("#eqbx").height() > $("#footer").offset().top) {
        $('#eqbx').css('top',-($("#eqbx").offset().top + $("#eqbx").height() - $("#footer").offset().top));
    }
});
});

   
   function validate(){
	   var fname = $('#full_name').val();
	   var phone = $('#phone').val();
	   var email = $('#email').val();
	   var terms = $('#terms');
	   var flag  = true;
	   if(fname == ''){
		   $('#e_full_name').html('Please enter Full Name');
		   flag = false;
	   }if(phone == ''){
		   $('#e_phone').html('Please enter Phone number');
		   flag = false;
	   }if(email == ''){
		   $('#e_email').html('Please enter Email Address');
		   flag = false;
	   }if(terms.is(':checked')!=true){
		   $('#e_terms').html('Please select terms and conditions');
		  flag = false;
	   }/*else{
		   
	   }*/
	   return flag;
   }
   
   function save_enquiries(e){
	 var baseUrl=$('base').attr("href");  
	 var vd = validate();
	 $('#page-loader').fadeIn();
	 if(vd==true){
		 $('#e_full_name').html('');
		 $('#e_phone').html('');
		 $('#e_email').html('');
		 $('#e_terms').html('');
		   
		   $.ajax({
			type: 'POST',
			url:  baseUrl + "pages/post_enquiry",
			data: $('#call_back').serialize(),
			success: function (response) {
			  $('#page-loader').fadeOut();
			  $('#call_back')[0].reset();
			}
		  });	  
	 }else{
		$('#page-loader').fadeOut(); 
	 }
	 return false;
   }
   
   	function saveReview(e){
		 var baseUrl=$('base').attr("href");  
		 if($('input[name="rating"]:checked').length == 0){
			showAlert('warning','Please add your rating Stars.');
			return false;
		 }
		 //$('#page-loader').fadeIn();			   
			   $.ajax({
				type: 'POST',
				url:  baseUrl + "home/save_review",
				data: $('#reviews').serialize(),
				dataType: 'json',
                //async: false,
				success: function (response) {
			  	 var newData = JSON.stringify(response)
				 var res = JSON.parse(newData);
			     showAlert('success',res.message);
				 //window.location.reload();
				}
			  });	  
		 return false;
	}
  
</script>
