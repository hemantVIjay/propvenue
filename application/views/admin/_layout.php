<?php
   $class_name=$this->router->fetch_class();
   $method_name=$this->router->fetch_method();
   ?>
<!--<?php //include_once('components/_header.php'); ?>
   <?php //include_once('components/_sidebar.php'); ?>-->
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="keywords" content="">
      <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.png" />
      <base href="<?= base_url(); ?>">
      <title><?= $title; ?> - <?= $site_name; ?></title>
      <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets/css/mulish.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets/css/bootstrap-icons.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">
	  <link href="<?= base_url(); ?>assets/css/select2.min.css" rel="stylesheet">
      <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
      <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
	  <script src="<?= base_url(); ?>assets/js/select2.min.js"></script>
   </head>
   <style>
      body::-webkit-scrollbar {
      width: 4px;
      }
      body::-webkit-scrollbar-track {
      box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      }
      body::-webkit-scrollbar-thumb {
      background-color: darkgrey;
      outline: 1px solid slategrey;
      }
      ::-webkit-scrollbar {
      width: 4px;
      height: 4px;
      }
      ::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
      border-radius: 10px;
      }
      ::-webkit-scrollbar-thumb {
      border-radius: 10px;
      -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
      background-color: #efa41c;
      }
      .page-loader {
      background: #ffffff;
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      z-index: 99999;
      }
      .ripple-loader {
      position: absolute;
      margin: 0 auto;
      left: 0;
      right: 0;
      top: 50%;
      width: 64px;
      height: 64px;
      }
   </style>
   <body>
      <!-- *****PAGE LOADER*****  -->
      <div class="page-loader" id="page-loader">
         <div class="ripple-loader">
            <img src="<?= base_url('assets/images/loader.svg'); ?>">
         </div>
      </div>
      <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
         <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Propvenues</a>
         <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <a style="position:absolute;right:150px;" class="btn btn-success" href="<?= base_url(); ?>" target="_blank" >Website</a>
		 <div class="flex-shrink-0 dropdown me-3">
            <a href="javascript:;" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?= base_url(); ?>assets/img/avatars/avatar.jpg" alt="mdo" width="32" height="32" class="rounded-circle">
            Hemant
            </a>
            <ul class="dropdown-menu shadow" aria-labelledby="dropdownUser2" style="">
               <li><a class="dropdown-item" href="#">Change Password</a></li>
               <li>
                  <hr class="dropdown-divider">
               </li>
               <li><a class="dropdown-item" href="<?= base_url('admin/logout');?>">Sign out</a></li>
            </ul>
         </div>
      </header>
      <div class="container-fluid">
         <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
               <div class="position-sticky pt-3">
                  <ul class="list-unstyled ps-0">
                     <li><a href="<?= base_url('admin');?>" class="nav-link">Dashborad</a></li>
                     <li class="mb-1">
                        <button class="btn btn-toggle align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#master-collapse" aria-expanded="false">
                        Master
                        </button>
                        <div class="collapse" id="master-collapse">
                           <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_amenities');?>">Amenities</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_localities');?>">Localities</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_cities');?>">Cities</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_districts');?>">Districts</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_states');?>">States</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_countries');?>">Countries</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_banks');?>">Banks</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_propertiesType');?>">Property Type</a>
                              </li>
							  <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_categories');?>">Categories</a>
                              </li>
							  <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_bedrooms');?>">Bedrooms</a>
                              </li>
							  <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_bathrooms');?>">Bathrooms</a>
                              </li>
							  <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_construction_status');?>">Construction Status</a>
                              </li>
							  <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_furnishType');?>">Furnish Type</a>
                              </li>
							  <li>
                                 <a class="nav-link" href="<?= base_url('admin/masters/list_parkings');?>">Parkings</a>
                              </li>
                           </ul>
                        </div>
                     </li>
                     <li class="mb-1">
                        <button class="btn btn-toggle align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#builder-collapse" aria-expanded="false">
                        Builder
                        </button>
                        <div class="collapse" id="builder-collapse">
                           <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/builders/list_builders');?>">Builder List</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/builders/add_builder');?>">Add Builder</a>
                              </li>
                           </ul>
                        </div>
                     </li>
                     <li class="mb-1">
                        <button class="btn btn-toggle align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#property-collapse" aria-expanded="false">
                        Properties
                        </button>
                        <div class="collapse" id="property-collapse">
                           <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/projects/list_projects');?>">Projects List</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/projects/add_projects');?>">Add Project</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/properties/list_properties');?>">Properties List</a>
                              </li>
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/properties/add_properties');?>">Add Property</a>
                              </li>
                           </ul>
                        </div>
                     </li>
					 
					 <li class="mb-1">
                        <button class="btn btn-toggle align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#reviews-collapse" aria-expanded="false">
                        User Reviews
                        </button>
                        <div class="collapse" id="reviews-collapse">
                           <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                              <li>
                                 <a class="nav-link" href="<?= base_url('admin/reviews/list_reviews');?>">Reviews</a>
                              </li>
                           </ul>
                        </div>
                     </li>
                  </ul>
               </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4">
               <?= $sub_view; ?>
            </main>
         </div>
      </div>
      <?php include_once('components/_baseModal.php'); ?>
	  <div id="toasts"></div>
      <script>
         var wn = $(window);
         /*============================================
          PAGE PRE LOADER
         ==============================================*/
         wn.on('load', function () {
             $('#page-loader').fadeOut(500);
         });
	 	function alertToasts(type, message){		  
			  var content = '<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11"><div class="toast align-items-center text-white bg-'+type+' border-0" role="alert" aria-live="assertive" aria-atomic="true"><div class="d-flex"><div class="toast-body">'+message+'</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div></div></div>';
			  $('#toasts').append(content);
		}

		//SHOW ALERT
		function showAlerts(type,message){
			alertToasts(type,message); 
			$('.toast').toast('show');
		}
      </script>
   </body>
</html>
<!--<?php //include_once('components/_footer.php'); ?>-->