<!-- Modal -->
<div class="modal fade" id="pvGetCallback" tabindex="-1" aria-labelledby="pvGetCallbackLabel" aria-hidden="true">
  <form name="call_back" id="call_back" onsubmit="return save_enquiries(this);" method="POST">
   <input type="hidden" name="listing_id" id="listing_id">
   <input type="hidden" name="listing_type" id="listing_type">
   <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
	    	      <!-- *****PAGE LOADER*****  -->
      <div class="page-loader" id="page-loader" style="display:none;">
      <div class="ripple-loader">
	   <img src="<?= base_url('assets/images/loader.svg'); ?>">
      </div>
      </div>
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
                     <input type="text" class="form-control" placeholder="Enter your name" name="full_name" id="ofull_name"/>
					 <span class="errors" id="e_full_name"></span>
                  </div>
                  <div class="mb-3">
                     <label class="required">Phone Number</label>
                     <input type="text" class="form-control" placeholder="Enter your phone no." name="phone" id="ophone">
					 <span class="errors" id="e_phone"></span>
                  </div>
                  <div class="mb-3">
                     <label class="required">Email ID</label>
                     <input type="text" class="form-control" placeholder="Enter email id" name="email" id="oemail">
					 <span class="errors" id="e_email"></span>
                  </div>
                  <div class="mb-3 d-flex">
                     <input type="checkbox" class="cks" checked="" name="terms" id="oterms" value="1" >
                     <span class="pvsml ms-2">I Agree to Propvenue's <a href="javascript:;">Terms of Use</a></span>
					 <span class="errors" id="e_terms"></span>
                  </div>
                  <div class="mb-3 d-flex">
                     <input type="checkbox" class="cks" name="loans" id="loans" value="1">
                     <span class="pvsml ms-2">I am interested in Home Loans</span>
                  </div>
                  <div class="d-grid gap-2">
                     <button class="btn btn-primary" type="submit" name="submit">Get Call Back</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
