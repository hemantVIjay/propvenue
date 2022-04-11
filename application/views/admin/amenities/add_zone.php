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
                <label for="inputCategoryTitle">Zone Name</label>
                <input type="text" id="inputCategoryTitle" class="form-control" name="name" placeholder="<?= $this->lang->line("text_enter_category_title"); ?>">
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
                                    type="submit"><span class="ladda-label"><i class="feather icon-save"></i> Save Zone</span></button>
            </div>
        </form>
    </div>
</div>
