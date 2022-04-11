<link href="<?= base_url(); ?>assets/plugins/jqueryui/css/jquery-ui.css" rel="stylesheet">
<?php $title = $info->name; ?>
<section class="section city-area pt-0">
   <div class="container-fluid">
      <div class="row justify-content-center">
         <div class="col-xl-11 col-md-11 col-sm-12">
            <div class="row">
               <div class="col-md-8">
                  <div class="pv-breadcrumb twht mb-4">
                     <a href="<?= base_url(); ?>">Home</a>
					 <?php 
					 $c_arr = array('name'=>'city','parent_id'=>$info->id);
					 $ct = _getlisting($c_arr);
					 ?>
                     <a href="<?= base_url($ct->url); ?>" class="current">Projects in <?= $title; ?></a>
                  </div>
               </div>
               <div class="col-md-4 text-end py-3">
                  <span class="ludt">Last updated: <?= get_nice_time($info->updated_on); ?></span>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="container">
      <div class="row justify-content-center text-center">
         <div class="col-xl-8 col-lg-9 col-md-10 col-sm-11">
            <h1 class="srhtitle"><?= $title; ?></h1>
            <h5 class="srhtitle-sb">Search from 1,431 projects</h5>
            <form name="search_properties" method="POST" action="">
               <div class="srch-box mt-5 mb-5"><?= $city; ?>
                  <div class="input-group input-group-lg">
                     <select class="form-select form-select-lg mx-wd-150" name="cities">
                        <?php echo _topCities($page->url); ?>
                     </select>
                     <input type="text" class="form-control form-control-lg autocomplete" placeholder="Search location, builder, project here..." name="search">
                     <button class="btn btn-lg btn-primary" type="button" id="hmain_search">Search</button>
                  </div>
                  <input type="hidden" id="search" name="content">
            </form>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="section ctysec">
   <div class="container">
      <div class="container">
	  	  <div class="row">
		<div class="col-xl-8 col-md-6 mb-4">
			<div class="mb-4">
               <div class="bxc bg-lgrn">
                  <h2 class="cmn-title mb-3">New Launch Projects in <span class="text-primary"><?= $title; ?></span></h2>
                  <ul class="culst bldlst">
                     <?php if(!empty($popular_projects)){ foreach($popular_projects as $project){ ?>
					 <li class="d-flex">
                        <div class="bpphoto">
                           <img src="<?= base_url(); ?><?= ($project->main_image!='')? 'uploads/projects/Main Image/'.$project->main_image : 'assets/images/home-banner.jpg' ?>" />
                        </div>
                        <div>
                           <a href="<?=base_url();?><?=_listingUrl($project->id,'project');?>"><?= $project->project_name; ?></a>
                           <?php if($project->rera_registrationNumber!=''){ ?><div class="d-flex bldrdtl">Project REAA ID:<strong class="ms-1"><?= $project->rera_registrationNumber; ?></strong></div><?php } ?>
                        </div>
                     </li>
					 <?php } } ?>
                  </ul>
                  
               </div>
            </div>
            <div class="mb-4">
               <div class="bxc bg-lorng">
                  <h2 class="cmn-title mb-3">Pre-Launch Projects in <span class="text-primary"><?= $title; ?></span></h2>
                  <ul class="culst bldlst">
                     <?php if(!empty($popular_projects)){ foreach($popular_projects as $project){ ?>
					 <li class="d-flex">
                        <div class="bpphoto">
                           <img src="<?= base_url(); ?><?= ($project->main_image!='')? 'uploads/projects/Main Image/'.$project->main_image : 'assets/images/home-banner.jpg' ?>" />
                        </div>
                        <div>
                           <a href="<?=base_url();?><?=_listingUrl($project->id,'project');?>"><?= $project->project_name; ?></a>
                           <?php if($project->rera_registrationNumber!=''){ ?><div class="d-flex bldrdtl">Project REAA ID:<strong class="ms-1"><?= $project->rera_registrationNumber; ?></strong></div><?php } ?>
                        </div>
                     </li>
					 <?php } } ?>
                  </ul>
                  
               </div>
            </div>
            <div class="mb-4">
               <div class="bxc bg-lprpl">
                  <h2 class="cmn-title mb-3">Luxury Projects in <span class="text-primary"><?= $title; ?></span></h2>
                  <ul class="culst bldlst">
                     <?php if(!empty($popular_projects)){ foreach($popular_projects as $project){ ?>
					 <li class="d-flex">
                        <div class="bpphoto">
                           <img src="<?= base_url(); ?><?= ($project->main_image!='')? 'uploads/projects/Main Image/'.$project->main_image : 'assets/images/home-banner.jpg' ?>" />
                        </div>
                        <div>
                           <a href="<?=base_url();?><?=_listingUrl($project->id,'project');?>"><?= $project->project_name; ?></a>
                           <?php if($project->rera_registrationNumber!=''){ ?><div class="d-flex bldrdtl">Project REAA ID:<strong class="ms-1"><?= $project->rera_registrationNumber; ?></strong></div><?php } ?>
                        </div>
                     </li>
					 <?php } } ?>
                  </ul>
                  
               </div>
            </div>
            <div class="mb-4">
               <div class="bxc bg-lpnk">
                  <h2 class="cmn-title mb-3">Popular Projects in <span class="text-primary"><?= $title; ?></span></h2>
                  <ul class="culst bldlst">
                     <?php if(!empty($popular_projects)){ foreach($popular_projects as $project){ ?>
					 <li class="d-flex">
                        <div class="bpphoto">
                           <img src="<?= base_url(); ?><?= ($project->main_image!='')? 'uploads/projects/Main Image/'.$project->main_image : 'assets/images/home-banner.jpg' ?>" />
                        </div>
                        <div>
                           <a href="<?=base_url();?><?=_listingUrl($project->id,'project');?>"><?= $project->project_name; ?></a>
                           <?php if($project->rera_registrationNumber!=''){ ?><div class="d-flex bldrdtl">Project REAA ID:<strong class="ms-1"><?= $project->rera_registrationNumber; ?></strong></div><?php } ?>
                        </div>
                     </li>
					 <?php } } ?>
                  </ul>
                  
               </div>
            </div>
			<div class="mb-4">
               <div class="bxc bg-logrn">
                  <h2 class="cmn-title mb-3">Best Property Builders in <span class="text-primary"><?= $title; ?></span></h2>
                  <ul class="culst bldlst">
                     <?php if(!empty($best_builders)){ foreach($best_builders as $builder){ ?>
					 <li class="d-flex">
                        <div class="bpphoto">
                           <img src="<?= base_url(); ?><?= ($builder->builder_logo!='')? 'uploads/builders/'.$builder->builder_logo : 'assets/images/no_image.jpg' ?>" />
                        </div>
                        <div>
                           <a href="javascript:;"><?= $builder->builder_name; ?></a>
                           <div class="d-flex bldrdtl">
                              <span class="me-3">Exp: <strong>21 Years</strong></span>  |  <span class="me-3 ms-3">Total Projects: <strong>72</strong></span>  |   <span class="ms-3">Ongoing Projects: <strong>16</strong></span>
                           </div>
                        </div>
                     </li>
					 <?php } } ?>
                  </ul>
                  
               </div>
            </div>
		</div>
		<div class=" col-xl-4 col-md-6 mb-4">
               <div class="bxc bg-lblue">
                  <h2 class="cmn-title mb-3">Property Location in <span class="text-primary"><?= $title; ?></span></h2>
                  <ul class="culst loculst">
                     <?php if(!empty($cities_locations)){ foreach($cities_locations as $lc){ ?>
					 <li class="d-flex">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        <div>
						   <?php $l_arr = array('name'=>'locality','parent_id'=>$lc->id); 
						     $lt = _getlisting($l_arr); ?>
                           <a href="<?php if(isset($lt) && !empty($lt)){ echo base_url($lt->url); }else{ echo'javascript:;'; } ?>">Property in <?= $lc->name; ?></a>
                           <div class="d-flex bldrdtl">Avg. Rate: <strong class="ms-1">₹ 5,400 / sqft</strong></div>
                        </div>
                     </li>
					 <?php } } ?>
                  </ul>
                  
               </div>
            </div>
	  </div>
      </div>
   </div>
</section>
<script src="<?= base_url();?>assets/plugins/jqueryui/js/jquery-ui.js"></script>
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
		 window.location.href = mainURL+main+'?location='+search+'&type='+type+'&content='+content;   
	   }
	   if(res[0]=='PROJ'){
		 var mainURL  = baseUrl + search;  
		 window.location.href = mainURL;  
	   }if(res[0]=='BLD'){
		 var mainURL  = baseUrl + search;  
		 window.location.href = mainURL;  
	   }if(content==''){
		 var mainURL  = baseUrl + main;
		 window.location.href = mainURL;  
	   }
   }   
</script>