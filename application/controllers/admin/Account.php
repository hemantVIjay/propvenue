<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		//load auth model
		$this->load->model('auth_model');
		
	}
    //login to account
	public function deliveries()
	{
		$data['title']=$this->lang->line("text_orders");
        if($this->permitted('my_deliveries')){
            //get all user types
            $units = $this->settings_model->get_units();
            $data['units']=$units;
            $data['sub_view'] = $this->load->view('admin/account/list_deliveries', $data, TRUE);
        }else{
            $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
        }
        $this->load->view('admin/_layout', $data); 

    }
	
	public function materials()
	{
		$data['title'] = 'List of Items/Materials';
		if($this->permitted('my_materials')){
            //get all user types
			$uid  = $_SESSION['login']['user_id'];
            $items            = $this->inventory_model->get_user_items($uid, '');
            $data['items']    = $items;
            $data['sub_view'] = $this->load->view('admin/account/list_items', $data, TRUE);
        }else{
            $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
        }
        $this->load->view('admin/_layout', $data); 

    }
	//update login info
	public function update_login_info($user_id){
		$update_data = array(
			'login_ip' => $this->get_user_ip(),
			'login_agent' => $this->get_user_agent(),
			'last_login' => date('Y-m-d H:i:s')
		);
		$this->auth_model->update_login_info($user_id,$update_data);
	}
	
	// Logout
	public function logout() {
		// Destroy session data
		$this->session->unset_userdata('login');
		//redirect to login
		redirect('admin/login', 'refresh');
	}
    
   
}