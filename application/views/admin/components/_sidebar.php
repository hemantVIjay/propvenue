 <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="list-unstyled ps-0">
		<li><a href="<?= base_url('admin');?>" class="link-dark">Dashborad</a></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#master-collapse" aria-expanded="false">
          Master
        </button>
        <div class="collapse" id="master-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
           <li>
            <a class="nav-link" href="<?= base_url('admin/amenities/list_amenities');?>">Amenities</a>
         </li>
		 <li>
            <a class="nav-link" href="<?= base_url('admin/localities/list_localities');?>">Localities</a>
         </li>
		 <li>
            <a class="nav-link" href="<?= base_url('admin/cities/list_cities');?>">Cities</a>
         </li>
		 <li>
            <a class="nav-link" href="<?= base_url('admin/districts/list_districts');?>">Districts</a>
         </li>
         <li>
            <a class="nav-link" href="<?= base_url('admin/states/list_states');?>">States</a>
         </li>
         <li>
            <a class="nav-link" href="<?= base_url('admin/countries/list_countries');?>">Countries</a>
         </li>
		 <li>
            <a class="nav-link" href="<?= base_url('admin/masters/list_banks');?>">Banks</a>
         </li>
		 <li>
            <a class="nav-link" href="<?= base_url('admin/masters/list_propertiesType');?>">Property Type</a>
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
				<a class="nav-link" href="<?= base_url('admin/properties/list_properties');?>">Properties List</a>
			</li>
			<li>
				<a class="nav-link" href="<?= base_url('admin/properties/add_properties');?>">Add Property</a>
			</li>
          </ul>
        </div>
      </li>
    </ul>
      </div>
    </nav>

