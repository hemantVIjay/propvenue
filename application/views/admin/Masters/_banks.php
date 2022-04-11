<div class="row">
   <div class="col-12 col-xl-4">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title">Add Banks</h5>
         </div>
         <div class="card-body">
            <form method="POST" action="<?= base_url('admin/masters/add_banks'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
               <input type="hidden" name="id" value="<?php echo $record->id ?? '';?>">
               <div class="mb-3">
                  <label class="form-label">Bank Name</label>
                  <input name="name" type="text" class="form-control" placeholder="Enter Bank here..." value="<?php echo $record->name ?? '';?>" >
               </div>
               <div class="mb-3">
                  <label class="form-label w-100">Icon</label>
                  <input type="file" name="icon" accept=".svg" class="form-control">
                  <small class="form-text text-muted">Please choose only .svg files here.</small>
                  <br>
                  <?php if(isset($record->icon)){ ?>
                  <img src="<?= base_url('uploads/banks/');?><?= $record->icon ?? ''; ?>" style="10px 0px;">
                  <?php } ?>
               </div>
               <button type="submit" class="btn btn-primary">Save</button>
            </form>
         </div>
      </div>
   </div>
   <div class="col-12 col-xl-8">
      <div class="card">
         <div class="card-header">
            <h5 class="card-title">Banks Lists</h5>
         </div>
         <div style="overflow:auto;max-height:525px;">
            <table class="table" style="width:100%;height:100%;">
               <thead>
                  <tr>
                     <th style="width:12%;">Sr. No.</th>
                     <th style="width:55%;">Bank Name</th>
                     <th class="d-none d-md-table-cell" style="width:25%">Icon</th>
                     <th>Actions</th>
                  </tr>
               </thead>
               <tbody>
                  <?php $i=0;
                     foreach($banks as $key=>$row){ $cls = ($i % 2); ?>
                  <tr class="<?php if($cls==0){ ?>table-success<?php } ?>">
                     <td><?= $i+1; ?></td>
                     <td><?= $row->name; ?></td>
                     <td><img src="<?= base_url('uploads/banks/');?><?= $row->icon; ?>"/></td>
                     <td class="table-action">
                        <a href="<?= base_url('admin/masters/list_banks/').$row->id; ?>">
                           <i class="bi bi-pencil"></i>
                        </a>
                        <!--<a class="ms-2" href="<?= base_url('admin/masters/delete_banks/').$row->id; ?>">
                           <i class="bi bi-trash"></i>
                        </a>-->
                     </td>
                  </tr>
                  <?php $i++; } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>