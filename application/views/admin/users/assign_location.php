<div class="tile mb30">
    <div class="tile-title-w-btn">
        <div class="title">
        <h3><?= $title ?></h3>
        </div>
       
    </div>
    <div class="tile-content">
        <form id="addUserForm" action="" method="POST">
            <input type="hidden" name="user_id" id="user_id" value="<?= $uid; ?>">
			<div class="form-group">
                <label for="inputFullname"><?= $user['full_name']; ?> (Delivery Guy)</label>
            </div>
			<div class="row">
			    <?php $locations = _assign_zones(); 
				$uLocation = _userlocations($uid);
				foreach($locations as $location){ ?>
				<div class="col-md-4">
			       <input type="radio" id="location" name="location" value="<?= $location->id; ?>" title="<?= $location->zone_name; ?>" <?php if(in_array($location->id, $uLocation)){ echo'checked'; }?>>
				   <?= $location->zone_name;  ?>
				   
				</div>
				<?php } ?>
			</div>
			<br />
			<div class="form-group">
                <button id="createUserButton" class="btn btn-theme-secondary btn-lg btn-oval ladda-button" data-style="expand-right" data-size="xs"
                                    type="submit" ><span class="ladda-label"><i class="feather icon-save"></i> Assign Zones</span></button>
            </div>
        </form>
    </div>
</div>
<script>



function showAlert(type,head,message){
        $.toast({heading: head ,text: message,loader: false,position : 'top-right',showHideTransition: 'fade', icon: type });
    }
	
$(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();
          var bURL = '<?php echo base_url(); ?>';
          $.ajax({
            type: 'post',
            url: bURL+'admin/users/save_locations',
            data: $('form').serialize(),
            success: function (res) {
			 //console.log(res);
              showAlert('success','Successfully Assigned','Locations successfully assigned.');
			  reload();
   			//$(".tile-content").load(location.href+".tile-content");
            }
          });

        });

      });
function reload(){
		setTimeout(function(){
			 window.location.reload();
	  }, 1000);
   	} 

</script>
