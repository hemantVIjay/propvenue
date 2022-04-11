<!--Main Header-->
<!--<?php //include_once('_header.php'); ?>-->
<?php $class_name=$this->router->fetch_class(); ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?= $title; ?></title>
      <meta name="description" content="<?= $description; ?>">
      <meta name="author" content="Propvenues">
      <meta name="keywords" content="<?= $keywords; ?>">
      <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.png" />
      <base href="<?= base_url(); ?>">
      <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets/css/mulish.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets/css/bootstrap-icons.css" rel="stylesheet">
      <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet">
      <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
      <script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
	  <script src="<?= base_url(); ?>assets/js/site/<?= $class_name ?>.js"></script>
   </head>
   <body data-spy="scroll" data-target=".navbar" data-offset="400">
      <div class="page-loader" id="page-loader" style="display:none;">
         <div class="ripple-loader">
            <img src="<?= base_url('assets/images/loader.svg'); ?>">
         </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light pv-header ps-0 ps-sm-3 pe-0 pe-sm-3">
         <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url(); ?>">
            <img class="ws-logo" src="<?= base_url(); ?>assets/images/logo.svg" />
            </a>
            <div class="CitLink dropdown d-none d-sm-block">
               <a class="nav-link dropdown-toggle" href="javascript:;" id="ctDdwn">
                  <span class="pvh-icon">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black"/>
                        <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black"/>
                     </svg>
                  </span>
                  Buy in Noida
               </a>
            </div>
            <?php $cls = $this->router->fetch_class(); $mthd = $this->router->fetch_method();
			if($cls!='home' && $mthd!='index' && $is_search == true){
			?>
            <?php include_once('_topSearch.php'); ?> 
			<?php } ?>   
			   
			   <div class="lgnlnk ms-auto align-items-center">
                     <?php if(isset($_SESSION['login']) && $_SESSION['login']['is_site_login']=='1'){ ?>
                     <a class="nav-link usrlgd dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" href="javascript:;" ><img src="<?= base_url(); ?>assets/images/user.jpg" class="userPhot" /><span class="activeStatus"></span> <?= $_SESSION['login']['full_name']; ?></a>
                     <div class="dropdown-menu dropdown-menu-end">
                        <div class="upbody d-flex align-items-center">
                           <div class="user-prof-photo">
                              <img id="imgUser" src="<?= base_url(); ?>assets/images/user.jpg" alt="">
                           </div>
                           <div class="user-prof-detail">
                              <div class="user-prof-name">Hello, <?= $_SESSION['login']['full_name']; ?></div>
                              <div class="user-prof-code"><?= $_SESSION['login']['email']; ?></div>
                           </div>
                        </div>
                        <div class="row no-gutters text-center">
                           <div class="col-6 bdr1">
                              <a class="user-prof-inbox" href="#" id="changePassword">
                                 <span class="user-prof-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                       <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M3.11117 13.2288C3.27137 11.0124 5.01376 9.29156 7.2315 9.15059C8.55778 9.06629 10.1795 9 12 9C13.8205 9 15.4422 9.06629 16.7685 9.15059C18.9862 9.29156 20.7286 11.0124 20.8888 13.2288C20.9535 14.1234 21 15.085 21 16C21 16.915 20.9535 17.8766 20.8888 18.7712C20.7286 20.9876 18.9862 22.7084 16.7685 22.8494C15.4422 22.9337 13.8205 23 12 23C10.1795 23 8.55778 22.9337 7.23151 22.8494C5.01376 22.7084 3.27137 20.9876 3.11118 18.7712C3.04652 17.8766 3 16.915 3 16C3 15.085 3.04652 14.1234 3.11117 13.2288Z" fill="#12131A"></path>
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M13 16.7324C13.5978 16.3866 14 15.7403 14 15C14 13.8954 13.1046 13 12 13C10.8954 13 10 13.8954 10 15C10 15.7403 10.4022 16.3866 11 16.7324V18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18V16.7324Z" fill="#12131A"></path>
                                       <path fill-rule="evenodd" clip-rule="evenodd" d="M7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6V10C17 10.5523 16.5523 11 16 11C15.4477 11 15 10.5523 15 10V6C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6V10C9 10.5523 8.55228 11 8 11C7.44772 11 7 10.5523 7 10V6Z" fill="#12131A"></path>
                                    </svg>
                                 </span>
                                 <span class="user-prof-intitle">Change Password</span>
                              </a>
                           </div>
                           <div class="col-6">
                              <form action="#" class="logoutForm d-block" method="post">
                                 <a class="user-prof-inbox" href="<?= base_url(); ?>logout">
                                    <span class="user-prof-icon">
                                       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                             <rect x="0" y="0" width="24" height="24"></rect>
                                             <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000)"></path>
                                             <rect fill="#000000" opacity="0.5" transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000)" x="13" y="6" width="2" height="12" rx="1"></rect>
                                             <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z" fill="#000000" fill-rule="nonzero" transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000)"></path>
                                          </g>
                                       </svg>
                                    </span>
                                    <span class="user-prof-intitle">Logout</span>
                                 </a>
                              </form>
                           </div>
                        </div>
                     </div>
                     <!--<a class="nav-link" href="javascript:;" >
                        <span class="pvh-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M3.11117 13.2288C3.27137 11.0124 5.01376 9.29156 7.2315 9.15059C8.55778 9.06629 10.1795 9 12 9C13.8205 9 15.4422 9.06629 16.7685 9.15059C18.9862 9.29156 20.7286 11.0124 20.8888 13.2288C20.9535 14.1234 21 15.085 21 16C21 16.915 20.9535 17.8766 20.8888 18.7712C20.7286 20.9876 18.9862 22.7084 16.7685 22.8494C15.4422 22.9337 13.8205 23 12 23C10.1795 23 8.55778 22.9337 7.23151 22.8494C5.01376 22.7084 3.27137 20.9876 3.11118 18.7712C3.04652 17.8766 3 16.915 3 16C3 15.085 3.04652 14.1234 3.11117 13.2288Z" fill="#12131A"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M13 16.7324C13.5978 16.3866 14 15.7403 14 15C14 13.8954 13.1046 13 12 13C10.8954 13 10 13.8954 10 15C10 15.7403 10.4022 16.3866 11 16.7324V18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18V16.7324Z" fill="#12131A"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6V10C17 10.5523 16.5523 11 16 11C15.4477 11 15 10.5523 15 10V6C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6V10C9 10.5523 8.55228 11 8 11C7.44772 11 7 10.5523 7 10V6Z" fill="#12131A"></path>
                           </svg>
                        </span>
                        
                        </a>-->
                     <?php }else{ ?>					 
                     <a class="nav-link" href="javascript:;" data-bs-toggle="modal" data-bs-target="#pvMdlLogin">
                        <span class="pvh-icon">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                              <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M3.11117 13.2288C3.27137 11.0124 5.01376 9.29156 7.2315 9.15059C8.55778 9.06629 10.1795 9 12 9C13.8205 9 15.4422 9.06629 16.7685 9.15059C18.9862 9.29156 20.7286 11.0124 20.8888 13.2288C20.9535 14.1234 21 15.085 21 16C21 16.915 20.9535 17.8766 20.8888 18.7712C20.7286 20.9876 18.9862 22.7084 16.7685 22.8494C15.4422 22.9337 13.8205 23 12 23C10.1795 23 8.55778 22.9337 7.23151 22.8494C5.01376 22.7084 3.27137 20.9876 3.11118 18.7712C3.04652 17.8766 3 16.915 3 16C3 15.085 3.04652 14.1234 3.11117 13.2288Z" fill="#12131A"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M13 16.7324C13.5978 16.3866 14 15.7403 14 15C14 13.8954 13.1046 13 12 13C10.8954 13 10 13.8954 10 15C10 15.7403 10.4022 16.3866 11 16.7324V18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18V16.7324Z" fill="#12131A"></path>
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6V10C17 10.5523 16.5523 11 16 11C15.4477 11 15 10.5523 15 10V6C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6V10C9 10.5523 8.55228 11 8 11C7.44772 11 7 10.5523 7 10V6Z" fill="#12131A"></path>
                           </svg>
                        </span>
                        Login
                     </a>
                     <?php } ?>
                  </div>
            </div>
         </div>
      </nav>
      <div class="ddmCity">
         <div class="row gx-3">
            <?php echo _mainCities(''); ?>
         </div>
      </div>
      <!-- *****CONTENT***** -->
      <main class="main-content">
         <?= $sub_view; ?>
      </main>
      <footer class="footer-pv ps-3 pe-3" id="footer">
         <div class="container-fluid mb-5">
            <div class="row">
               <div class="col-md-6">
                  <div class="row">
                     <div class="col-md-6">
                        <img src="<?= base_url(); ?>assets/images/logo.svg" class="img-fluid ft-logo">
                        <div class="cmp-txt mt-3 mb-4">@Various independent surveys have rated it as India's most popular real estate platform.</div>
                        <div class="tlfr mb-1">Toll Free - 1800 88 88888</div>
                        <div class="txtsb mb-4">Tuesday - Sunday (9:00 AM to 7:00 PM)</div>
                        <div class="tlfr mb-4">Email - properties@propvenues.com</div>
                        <h6 class="foot-title">Follow Us</h6>
                        <div class="pv-social">
                           <a href="javascript:;" class="pv-slink">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <path opacity="0.3" d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="black"/>
                                 <path d="M13.643 9.36206C13.6427 9.05034 13.7663 8.75122 13.9864 8.53052C14.2065 8.30982 14.5053 8.18559 14.817 8.18506H15.992V5.23999H13.643C13.1796 5.24052 12.7209 5.33229 12.293 5.51013C11.8651 5.68798 11.4764 5.94841 11.1491 6.27649C10.8219 6.60457 10.5625 6.99389 10.3857 7.42224C10.209 7.85059 10.1183 8.30956 10.119 8.77295V11.718H7.769V14.663H10.119V21.817C11.2812 22.0479 12.4762 22.0604 13.643 21.854V14.663H15.992L17.167 11.718H13.643V9.36206Z" fill="black"/>
                              </svg>
                           </a>
                           <a href="javascript:;" class="pv-slink">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <path opacity="0.3" d="M19.0003 4.40002C18.2003 3.50002 17.1003 3 15.8003 3C14.1003 3 12.5003 3.99998 11.8003 5.59998C11.0003 7.39998 11.9004 9.49993 11.2004 11.2999C10.1004 14.2999 7.80034 16.9 4.90034 17.9C4.50034 18 3.80035 18.2 3.10035 18.2C2.60035 18.3 2.40034 19 2.90034 19.2C4.40034 19.8 6.00033 20.2 7.80033 20.2C15.8003 20.2 20.2004 13.5999 20.2004 7.79993C20.2004 7.59993 20.2004 7.39995 20.2004 7.19995C20.8004 6.69995 21.4003 6.09993 21.9003 5.29993C22.2003 4.79993 21.9003 4.19998 21.4003 4.09998C20.5003 4.19998 19.7003 4.20002 19.0003 4.40002Z" fill="black"/>
                                 <path d="M11.5004 8.29997C8.30036 8.09997 5.60034 6.80004 3.30034 4.50004C2.90034 4.10004 2.30037 4.29997 2.20037 4.79997C1.60037 6.59997 2.40035 8.40002 3.90035 9.60002C3.50035 9.60002 3.10037 9.50007 2.70037 9.40007C2.40037 9.30007 2.00036 9.60004 2.10036 10C2.50036 11.8 3.60035 12.9001 5.40035 13.4001C5.10035 13.5001 4.70034 13.5 4.30034 13.6C3.90034 13.6 3.70035 14.1001 3.90035 14.4001C4.70035 15.7001 5.90036 16.5 7.50036 16.5C8.80036 16.5 10.1004 16.5 11.2004 15.8C12.7004 14.9 13.9003 13.2001 13.8003 11.4001C13.9003 10.0001 13.1004 8.39997 11.5004 8.29997Z" fill="black"/>
                              </svg>
                           </a>
                           <a href="javascript:;" class="pv-slink">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <path opacity="0.3" d="M22 8.20267V15.7027C22 19.1027 19.2 22.0026 15.7 22.0026H8.2C4.8 22.0026 2 19.2027 2 15.7027V8.20267C2 4.80267 4.8 2.0026 8.2 2.0026H15.7C19.2 1.9026 22 4.70267 22 8.20267ZM12 7.30265C9.5 7.30265 7.39999 9.40262 7.39999 11.9026C7.39999 14.4026 9.5 16.5026 12 16.5026C14.5 16.5026 16.6 14.4026 16.6 11.9026C16.6 9.30262 14.5 7.30265 12 7.30265ZM17.9 5.0026C17.3 5.0026 16.9 5.4026 16.9 6.0026C16.9 6.6026 17.3 7.0026 17.9 7.0026C18.5 7.0026 18.9 6.6026 18.9 6.0026C18.9 5.5026 18.4 5.0026 17.9 5.0026Z" fill="black"/>
                                 <path d="M12 17.5026C8.9 17.5026 6.39999 15.0026 6.39999 11.9026C6.39999 8.80259 8.9 6.30261 12 6.30261C15.1 6.30261 17.6 8.80259 17.6 11.9026C17.6 15.0026 15.1 17.5026 12 17.5026ZM12 8.30261C10 8.30261 8.39999 9.90259 8.39999 11.9026C8.39999 13.9026 10 15.5026 12 15.5026C14 15.5026 15.6 13.9026 15.6 11.9026C15.6 9.90259 14 8.30261 12 8.30261Z" fill="black"/>
                              </svg>
                           </a>
                           <a href="javascript:;" class="pv-slink">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                 <path d="M21 6.30005C20.5 5.30005 19.9 5.19998 18.7 5.09998C17.5 4.99998 14.5 5 11.9 5C9.29999 5 6.29998 4.99998 5.09998 5.09998C3.89998 5.19998 3.29999 5.30005 2.79999 6.30005C2.19999 7.30005 2 8.90002 2 11.9C2 14.8 2.29999 16.5 2.79999 17.5C3.29999 18.5 3.89998 18.6001 5.09998 18.7001C6.29998 18.8001 9.29999 18.8 11.9 18.8C14.5 18.8 17.5 18.8001 18.7 18.7001C19.9 18.6001 20.5 18.4 21 17.5C21.6 16.5 21.8 14.9 21.8 11.9C21.8 9.00002 21.5 7.30005 21 6.30005ZM9.89999 15.7001V8.20007L14.5 11C15.3 11.5 15.3 12.5 14.5 13L9.89999 15.7001Z" fill="black"/>
                              </svg>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <h6 class="foot-title">Info Links</h6>
                        <ul class="ftm-link">
                           <li><a href="<?= base_url(); ?>about-us">About Us</a></li>
                           <li><a href="javascript:;">Careers</a></li>
                           <li><a href="javascript:;">Partners</a></li>
                           <li><a href="javascript:;">Contact Us</a></li>
                           <li><a href="javascript:;">Feedback</a></li>
                           <li><a href="javascript:;">Safety Guide</a></li>
                           <li><a href="javascript:;">Sitemap</a></li>
                           <li><a href="javascript:;">Blogs</a></li>
                           <li><a href="javascript:;">Advertise With us</a></li>
                        </ul>
                     </div>
                     <div class="col-md-3">
                        <h6 class="foot-title">Resources</h6>
                        <ul class="ftm-link">
                           <li><a href="javascript:;">Home Loan</a></li>
                           <li><a href="javascript:;">All Cities</a></li>
                           <li><a href="javascript:;">All Localities</a></li>
                           <li><a href="javascript:;">All Builders</a></li>
                           <li><a href="javascript:;">Price Trends</a></li>
                           <li><a href="javascript:;">EMI Calculator</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <h6 class="foot-title">Property in India</h6>
                  <div class="foot-link mb-4">
                     <a href="javascript:;">Property in Delhi-NCR</a>
                     <a href="javascript:;">Property in Noida</a>
                     <a href="javascript:;">Property in Greater Noida</a>
                     <a href="javascript:;">Property in Greater Noida West</a>
                     <a href="javascript:;">Property in Yamuna Expressway</a>
                     <a href="javascript:;">Property in Ghaziabad</a>
                     <a href="javascript:;">Property in Faridabad</a>
                     <a href="javascript:;">Property in Gurgaon</a>
                  </div>
                  <h6 class="foot-title">Latest Project in India</h6>
                  <div class="foot-link mb-4">
                     <a href="javascript:;">Experion The Westerlies</a>
                     <a href="javascript:;">Gaur City Yamuna Expressway</a>
                     <a href="javascript:;">Shapoorji Pallonji Joyville Gurugram</a>
                     <a href="javascript:;">DLF The Skycourt</a>
                     <a href="javascript:;">SS The leaf</a>
                     <a href="javascript:;">Experion The Heartsong</a>
                     <a href="javascript:;">ATS Grandstand</a>
                     <a href="javascript:;">Godrej 101</a>
                  </div>
                  <h6 class="foot-title">Popular Builders in India</h6>
                  <div class="foot-link">
                     <a href="javascript:;">ATS Group</a>
                     <a href="javascript:;">Jaypee Greens</a>
                     <a href="javascript:;">Mahagun Group</a>
                     <a href="javascript:;">Prateek Group</a>
                     <a href="javascript:;">Prestige Group</a>
                     <a href="javascript:;">Godrej Properties</a>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <div class="footer-copyright ps-3 pe-3">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 cpytxt">
                  Copyright © 2021, Propvenues. All Rights Reserved.
               </div>
               <div class="col-md-6 lgl-link text-end">
                  <a href="javascript:;">Privay Policy</a>
                  <a href="javascript:;">Terms of uses</a>
                  <a href="javascript:;">Refund Policy</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="pvMdlLogin" tabindex="-1" aria-labelledby="pvMdlLoginLabel" aria-hidden="true" >
         <div class="modal-dialog modal-dialog-centered modal-lgn">
            <div class="modal-content">
               <div class="row g-0">
                  <div class="col-md-5 lgnMdlBg position-relative">
                     <div class="pvPdMdl">
                        <h4 class="cmn-title mb-4"><span id="snI">Sign In</span><span id="snU" style="display:none">Sign Up</span></h4>
                        <p>Get access to your Properties, Wishlist and Recommendations</p>
                     </div>
                     <img src="<?= base_url(); ?>assets/images/hse.png" class="img-fluid psblt" />
                  </div>
                  <div class="col-md-7">
                     <div class="pvPdMdl pvPdMdlFrm position-relative">
                        <div class="posabs">
                           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="sgnIn">
                           <form name="login" id="login" method="POST">
                              <div class="form-floating mb-4">
                                 <input type="email" class="form-control" name="email" id="l_email" placeholder="Username">
                                 <label for="email">Username</label>
                                 <span class="errors" id="el_email"></span>
                              </div>
                              <div class="form-floating mb-4">
                                 <input type="password" class="form-control" name="password" id="l_password" placeholder="Password">
                                 <label for="floatingPassword">Password</label>
                                 <span class="errors" id="el_password"></span>
                              </div>
                              <div class="mb-4 d-flex">
                                 <span class="errors" id="l_response"></span>
                              </div>
                              <!--<div class="mb-4 d-flex">
                                 <input type="checkbox" class="cks" checked="">
                                 <span class="pvsml ms-2">I Agree to Propvenue's <a href="javascript:;">Terms of Use</a></span>
                                 </div>-->
                              <div class="d-grid gap-2 mb-4">
                                 <button class="btn btn-primary btn-lg" type="button"  onclick="return login_user(this);">Sign In</button>
                              </div>
                           </form>
                           <div class="mb-4">
                              No account? <a href="javascript:;" id="crtAcnt">Create account!</a>
                           </div>
                        </div>
                        <div id="sgnUp" style="display:none;">
                           <form name="register" id="register" method="POST">
                              <div class="form-floating mb-4">
                                 <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Name">
                                 <label for="full_name">Name</label>
                                 <span class="errors" id="e_full_name"></span>
                              </div>
                              <div class="form-floating mb-4">
                                 <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                 <label for="email">Email</label>
                                 <span class="errors" id="e_email"></span>
                              </div>
                              <div class="form-floating mb-4">
                                 <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                 <label for="password">Password</label>
                                 <span class="errors" id="e_password"></span>
                              </div>
                              <div class="form-floating mb-4">
                                 <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile No.">
                                 <label for="phone">Mobile No.</label>
                                 <span class="errors" id="e_phone"></span>
                              </div>
                              <div class="mb-4 d-flex">
                                 <input type="checkbox" class="cks" name="terms_use" id="terms" value="1" checked="">
                                 <span class="pvsml ms-2">I Agree to Propvenue's <a href="javascript:;">Terms of Use</a></span>
                                 <span class="errors" id="e_terms"></span>
                              </div>
                              <div class="d-grid gap-2 mb-4">
                                 <button class="btn btn-primary btn-lg" type="button"  onclick="return register_user(this);">Sign Up</button>
                              </div>
                              <div class="mb-2">
                                 You h've account? <a href="javascript:;" id="lgnAcnt">Login account!</a>
                              </div>
                              <span id="response" class="errors"></span>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Toast Code Start -->
      <div id="toasts"></div>
      <!-- Toast Code End -->
      <!--Main Footer-->
      <!--<?php include_once('modals/offers.php'); ?>
         <!--<?php //include_once('_footer.php'); ?>-->
<script>
         function alertToasts(type, message) {
			var content = '<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11"><div class="toast align-items-center text-white bg-' + type + ' border-0" role="alert" aria-live="assertive" aria-atomic="true"><div class="d-flex"><div class="toast-body">' + message + '</div><button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div></div>';
			$('#toasts').append(content);
		}

		function showAlert(type, msg) {
			alertToasts(type, msg);
			$('.toast').toast('show');
		}

		$("#crtAcnt").click(function () {
			$("#sgnUp").show();
			$("#sgnIn").hide();
			$("#snI").hide();
			$("#snU").show();
		});

		$("#lgnAcnt").click(function () {
			$("#sgnUp").hide();
			$("#sgnIn").show();
			$("#snU").hide();
			$("#snI").show();
		});

		function validate() {
			var fname = $('#full_name').val();
			var phone = $('#mobile').val();
			var password = $('#password').val();
			var email = $('#email').val();
			var terms = $('#terms');
			var flag = true;

			if (fname == '') {
				$('#e_full_name').html('Please enter Full Name');
				flag = false;
			}
			if (phone == '') {
				$('#e_phone').html('Please enter Mobile number');
				flag = false;
			}
			if (password == '') {
				$('#e_password').html('Please enter Mobile number');
				flag = false;
			}
			if (email == '') {
				$('#e_email').html('Please enter Email Address');
				flag = false;
			}
			if (terms.is(':checked') != true) {
				$('#e_terms').html('Please select terms and conditions');
				flag = false;
			}
			/*else{
					   
					  }*/
			return flag;
		}

		function validates() {
			var email = $('#l_email').val();
			var password = $('#l_password').val();
			var flag = true;
			if (email == '') {
				$('#el_email').html('Please enter Email Address');
				flag = false;
			}
			if (password == '') {
				$('#el_password').html('Please enter password');
				flag = false;
			}
			/*if(email!=''&&password!=''){
			$.ajax({
				type: 'POST',
				url:  baseUrl + "auth/verify_Details",
				data: {email:email,pass:password},
				success: function (response) {
				  var res = JSON.parse(response);
				  $('#response').html(res.message);
				}
			  });  
			}*/

			return flag;
		}

		function register_user(e) {
			var baseUrl = $('base').attr("href");
			var vd = validate();
			$('#page-loader').fadeIn();
			if (vd == true) {
				$('#e_full_name').html('');
				$('#e_phone').html('');
				$('#e_email').html('');
				$('#e_terms').html('');
				$.ajax({
					type: 'POST',
					url: baseUrl + "auth/register",
					data: $('#register').serialize(),
					success: function (response) {
						var res = JSON.parse(response);
						$('#page-loader').fadeOut();
						$('#register')[0].reset();
						$('#response').html(res.message);
					}
				});
			} else {
				$('#page-loader').fadeOut();
			}
			return false;
		}

		function login_user(e) {
			$('#l_response').html('');
			var baseUrl = $('base').attr("href");
			var vd = validates();
			if (vd == true) {
				$('#el_email').html('');
				$('#el_password').html('');
				$.ajax({
					type: 'POST',
					url: baseUrl + "auth/login",
					data: $('#login').serialize(),
					success: function (response) {
						var res = JSON.parse(response);
						if (res.success == false) {
							$('#l_response').html(res.message);
						} else {
							window.location.reload();
						}
					}
				});
			} else {
				$('#page-loader').fadeOut();
			}
			return false;
		}

		// $(document).ready(function(){
		// $("#ctDdwn").click(function(){
		// $(".ddmCity").slideToggle();
		// });
		// });


		$("#ctDdwn").click(function (e) {
			$(".ddmCity").show();
			e.stopPropagation();
		});

		$(".ddmCity").click(function (e) {
			e.stopPropagation();
		});

		$(document).click(function () {
			$(".ddmCity").hide();
		});
		    

    //SHOW ALERT
    function showAlerts(type,head,message){
        $.toast({heading: head ,text: message,loader: false,position : 'bottom-right',showHideTransition: 'fade', icon: type });
    }
	
	function saveReview(e) {
		var _user = "<?php if(isset($_SESSION['login']) && $_SESSION['login']['user_id']!=''){ echo'1'; }else{ echo'0'; } ?>";
      if ($('input[name="rating"]:checked').length == 0) {
			showAlert('warning', 'Please add your rating Stars.');
			return false;
		}
      if($('#review_name').val() == '') {
         showAlert('warning', 'Please enter full name first.');
         return false;
      }
      if($('#review_phone').val() == '') {
         showAlert('warning', 'Please enter Phone/Mobile no.');
         return false;
      }
      if($('#review_email').val() == '') {
         showAlert('warning', 'Please enter email Address.');
         return false;
      }
      //$('#page-loader').fadeIn();			   
		$.ajax({
			type: 'POST',
			url: baseUrl + "home/save_review",
			data: $('#reviews').serialize(),
			dataType: 'json',
			async: false,
			success: function (response) {
				var newData = JSON.stringify(response)
				var res = JSON.parse(newData);
				showAlert('success', res.message);
				//window.location.reload();
			}
		});
		return false;
	}
	
function validate() {
	var fname = $('#full_name').val();
	var phone = $('#phone').val();
	var email = $('#email').val();
	var terms = $('#terms');
	var flag = true;
	if (fname == '') {
		$('#e_full_name').html('Please enter Full Name');
		flag = false;
	}
	if (phone == '') {
		$('#e_phone').html('Please enter Phone number');
		flag = false;
	}
	if (email == '') {
		$('#e_email').html('Please enter Email Address');
		flag = false;
	}
	if (terms.is(':checked') != true) {
		$('#e_terms').html('Please select terms and conditions');
		flag = false;
	}
	return flag;
}

function save_enquiries(e) {
	var vd = validate();
	$('#page-loader').fadeIn();
	if (vd == true) {
		$('#e_full_name').html('');
		$('#e_phone').html('');
		$('#e_email').html('');
		$('#e_terms').html('');

		$.ajax({
			type: 'POST',
			url: baseUrl + "pages/post_enquiry",
			data: $('#call_back').serialize(),
			success: function (response) {
				$('#page-loader').fadeOut();
				$('#call_back')[0].reset();
			}
		});
	} else {
		$('#page-loader').fadeOut();
	}
	return false;
}

      </script>
