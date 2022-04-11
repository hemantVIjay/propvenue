<div class="col-12 col-xl-6">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Basic form</h5>
									<h6 class="card-subtitle text-muted">Default Bootstrap form layout.</h6>
								</div>
								<div class="card-body">
									<form>
										<div class="mb-3">
											<label class="form-label">Email address</label>
											<input type="email" class="form-control" placeholder="Email">
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input type="password" class="form-control" placeholder="Password">
										</div>
										<div class="mb-3">
											<label class="form-label">Textarea</label>
											<textarea class="form-control" placeholder="Textarea" rows="1"></textarea>
										</div>
										<div class="mb-3">
											<label class="form-label w-100">File input</label>
											<input type="file">
											<small class="form-text text-muted">Example block-level help text here.</small>
										</div>
										<div class="mb-3">
											<label class="form-check m-0">
												<input type="checkbox" class="form-check-input">
												<span class="form-check-label">Check me out</span>
											</label>
										</div>
										<button type="submit" class="btn btn-primary">Submit</button>
									</form>
								</div>
							</div>
						</div>
<div class="tile mb30">
    <div class="tile-title-w-btn">
        <div class="title">
        <h3><?= $title; ?></h3>
        </div>
        <p><button class="btn btn-theme-grey btn-fab close-panel-button"><i class="feather icon-x"></i></button></p>
    </div>
    <div class="tile-content">
        <form id="addCategoryForm" action="#" method="POST">
            <div class="form-group">
                <label for="inputCategoryTitle">Location Name</label>
                <input type="text" id="inputCategoryTitle" class="form-control" name="name" placeholder="<?= $this->lang->line("text_enter_category_title"); ?>">
            </div>
            <div class="form-group">
                <label for="inputCategoryDescription">Near By/Landmark</label>
                <textarea id="inputCategoryDescription" class="form-control" name="landmark" placeholder="<?= $this->lang->line("text_enter_description"); ?>"></textarea>
            </div>
            <div class="form-group">
                <label for="inputCategoryDescription">City</label>
                <select class="form-control" name="city_id" id="city_id">
				   <option value="">--Select City--</option>
				   <?php  echo _cities(''); ?>
			    </select>
            </div>
			
			<div class="form-group">
                <label for="inputCategoryDescription">State</label>
                <select class="form-control" name="state_id" id="state_id">
				   <option value="">--Select State--</option>
				   <?php  echo _states(''); ?>
			    </select>
            </div>
			
			<div class="form-group">
                <label for="inputCategoryDescription">Country</label>
                <select class="form-control" name="country_id" id="country_id">
				   <option value="">--Select Country--</option>
				   <?php  echo _countries(''); ?>
			    </select>
            </div>
            
			<div class="form-group">
                <button id="createCategoryButton" class="btn btn-theme-secondary btn-lg btn-oval ladda-button" data-style="expand-right" data-size="xs"
                                    type="submit"><span class="ladda-label"><i class="feather icon-save"></i> <?= $this->lang->line("text_locations"); ?></span></button>
            </div>
        </form>
    </div>
</div>
