<!--Upload Images & Video-->
<style>
    .deleteImg > i{
	position: absolute;
    right: -6px;
    top: -34px;
    color: red;
    background: #fff;
    padding: 1px 4px;
    border-radius: 50%;}
</style>
<input type="hidden" name="property_id" id="property_id" value="<?= $id; ?>">
<div class="pvfp-tab gllry-tabs">
   <ul class="nav nav-tabs" id="myTab" role="tablist">
      <?php $i=0; foreach($p_images as $ik=>$im){ $tab = str_replace(' ', '_', strtolower($ik));?>
      <li class="nav-item" role="presentation">
         <button class="nav-link <?php if($i==0){echo'active'; }?>" id="<?= $tab; ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tab; ?>" type="button" role="tab" aria-controls="<?= $tab; ?>" aria-selected="true"><?= $ik; ?></button>
      </li>
      <?php $i++; } ?>
   </ul>
   <div class="tab-content py-4" id="myTabContent">
      <?php $j=0;foreach($p_images as $kk=>$images){  $ftab = str_replace(' ','_',strtolower($kk)); ?>
      <div class="tab-pane fade<?php if($j==0){echo'show active'; }?>" id="<?= $ftab; ?>" role="tabpanel" aria-labelledby="<?= $ftab; ?>-tab">
         <div class="row">
            <?php foreach($images as $sk=>$p_image){ ?>
            <div class="col-xl-2 col-md-3 col-sm-6 mt-2">
               <a data-fancybox="gallery" href="javascript:void(0);" data-caption="<?= $p_image->image_desc; ?>" class="deleteImg" style="position:relative;"><i class="bi bi-trash" title="Delete Image" onclick="return confirmDelete(this, <?= $p_image->id; ?>);"></i>
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
<div class="addlt" style="text-align:right;"><a href="javascript:;" onclick="addRow('gallery');" ><i class="bi bi-plus-circle-fill me-1"></i>Add Row</a>
   <a href="javascript:;" onclick="deleteRow('gallery');" class="ms-2"><i class="bi bi-dash-circle-fill me-1"></i>Delete Row</a>
</div>
<div class="tbl-resp">
   <table class="table tbl-custom" style="width:100%">
      <thead>
         <tr>
            <th width="50">SNo.</th>
            <th width="250">Upload Image</th>
            <th width="150">Category</th>
            <th width="150">Caption</th>
         </tr>
      </thead>
      <tbody id="gallery">
         <tr>
            <td><input type="checkbox"></td>
            <td><input type="file" class="form-control" name="image_name[]"/></td>
            <td>
               <select class="form-select" name="image_type[]">
                  <option value="Elevation">Elevation</option>
                  <option value="Video">Video</option>
                  <option value="Construction Updates">Construction Updates</option>
                  <option value="Neighbourhood">Neighbourhood</option>
               </select>
            </td>
            <td><input type="text" class="form-control" name="image_desc[]"/></td>
         </tr>
      </tbody>
   </table>
</div>