<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modals extends MY_Controller {
    public function __construct()
	{
        parent::__construct();
        //check if backend login
        $this->is_admin_login();
		
	}
	
	public function getRoom_Data(){
		
      $data['modal_title'] = 'Room Sizes';
      $data['modal_content'] = '<div class="addlt" style="text-align:right;"><a href="javascript:;" onclick="addRow(\'mRoom_sizes\');" ><i class="bi bi-plus-circle-fill me-1"></i>Add Row</a> <a href="javascript:;" onclick="deleteRow(\'mRoom_sizes\');" class="ms-2"><i class="bi bi-dash-circle-fill me-1"></i>Delete Row</a> </div><div class="tbl-resp"> <table class="table tbl-custom" style="width:100%"> <thead> <tr> <th width="50">SNo.</th> <th width="150">Room Size SQFt</th> </tr></thead> <tbody id="mRoom_sizes"> <tr> <td><input type="checkbox"></td><td><input type="text" class="form-control" name="room_size" id="roomSize_1" onkeypress="return isNumberKey(this, event);"/></td></tr></tbody> </table> <input type="hidden" name="button_val" id="button_val"></div>';
	  $data['action_button']  = '<button type="button" class="btn btn-primary" onclick="saveRoom_sizes(this, \'mRoom_sizes\');">Save</button>';
      $this->load->view('admin/components/_modalHeader', $data);
      $this->load->view('admin/components/_modalBody', $data);
      $this->load->view('admin/components/_modalFooter', $data);
	}

	public function getDesc_Data(){
		
      $data['modal_title'] = 'Add Room Description';
      $data['modal_content'] = '<div class="col-md-12"><label>Room Description</label>
	  <textarea class="form-control" name="roomDesc" id="roomDesc"/></textarea>
	  <input type="hidden" name="button_val" id="button_val"></div>';
	  $data['action_button']  = '<button type="button" class="btn btn-primary" onclick="saveDesc(this);">Save</button>';
      $this->load->view('admin/components/_modalHeader', $data);
      $this->load->view('admin/components/_modalBody', $data);
      $this->load->view('admin/components/_modalFooter', $data);
	}

}