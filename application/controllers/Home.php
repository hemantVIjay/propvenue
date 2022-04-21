<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	//Home Page
	public function index()
	{
		$data['title']       = 'Propvenues.com';
        $data['description'] = 'Propvenues.com';
        $data['keywords']    = 'Propvenues.com';
		$count  = 10; 
		$_popularProjects = $this->home->_popularProjects($count, '');
		$_popularPlots = $this->home->_popularProjects($count, '5');
		$data['_popularProjects'] = $_popularProjects;
		$data['_popularPlots'] = $_popularPlots;
		
		$data['sub_view'] = $this->load->view('site/pages/home', $data, TRUE);
        $this->load->view('site/_layout', $data);
	}	
	
	public function search()
	{
		$pdata = array(); $result = array();
		$city = $this->uri->segment(3);
		
		if(isset($_GET['content'])){
		  $mt = explode('_',base64_decode($_GET['content']));
			if($mt[0]=='BLD'){
			 $pdata['builder_id'] = $mt[1];	
			}if($mt[0]=='PROJ'){
			 $pdata['project'] = $mt[1];	
			}if($mt[0]=='LOC'){
			 $pdata['locality'] = $mt[1];	
			}	
		}
		
		$data['title']       = 'Propvenues.com';
        $data['description'] = 'Propvenues.com';
        $data['keywords']    = 'Propvenues.com';
		$alltypes = array();
		if(isset($_GET['type']) && $_GET['type']!=''){
		 $type = explode(',', $_GET['type']);
         foreach($type as $cat){
           $alltypes = _getSlugID('property_categories', $cat);
		 }	 
		}
		if(isset($_GET['budget_min'], $_GET['budget_max'])){
		  $budget_min = $_GET['budget_min'];
		  $budget_max = $_GET['budget_max'];
		}else{
		  $budget_min = '';
		  $budget_max = '';	
		}

		if(isset($_GET['bedrooms'])){
		  $bedrooms = $_GET['bedrooms'];
		}else{
		  $bedrooms = '';
		}
		
		$pdata['city_id'] = _getSlugID('cities', $city); 
		$result = $this->home->search_properties($pdata, $alltypes, $bedrooms, $budget_max, $budget_min);
		$data['listings'] = $result;
		$data['s_content'] = $_GET;
		$data['city'] = $city;
		$data['sub_view'] = $this->load->view('site/pages/properties-listings', $data, TRUE);
        $this->load->view('site/_layout', $data);
	}

	public function properties_details()
	{
		$data['title']       = 'Propvenues.com';
        $data['description'] = 'Propvenues.com';
        $data['keywords']    = 'Propvenues.com';
		$ids  = explode('---',$this->uri->segment(2));
		$result = $this->home->property_details($ids[1]);
		if(!empty($result)){
		  $p_images = $this->home->property_images($ids[1]);
		  $i_arr = array();
		  if(!empty($p_images)){
			 foreach ($p_images as $key => $image) {
				   $i_arr[$image->image_type][$key] = $image;
			 }	
		  }
		  $data['property_info'] = $result;
		  $data['floor_plans'] = $result;
		  $data['properties_images'] = $i_arr;
		  $data['sub_view'] = $this->load->view('site/pages/properties-details', $data, TRUE);
		  $this->load->view('site/_layout', $data);
		}else{
			show_404();
		}
		
	}

	public function properties_listings()
	{
		$data['title']       = 'Propvenues.com';
        $data['description'] = 'Propvenues.com';
        $data['keywords']    = 'Propvenues.com';
		
		$data['sub_view'] = $this->load->view('site/pages/properties-listings', $data, TRUE);
        $this->load->view('site/_layout', $data);
	}

	public function locations_info()
	{
		$data['title']       = 'Propvenues.com';
        $data['description'] = 'Propvenues.com';
        $data['keywords']    = 'Propvenues.com';
		
		$data['sub_view'] = $this->load->view('site/pages/locations-info', $data, TRUE);
        $this->load->view('site/_layout', $data);
	}

	public function save_review()
	{
		$post_data = array(
                        'listing_id' => $this->input->post('listing_id'),
                        'stars' => $this->input->post('rating'),
                        'message' => $this->input->post('message'),
                        'user_id' => $this->get_user_id(),
                        'date_publish' => date('Y-m-d H:i:s')
                    );
		$result = $this->home->save_rating($post_data);
		if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                        $success = TRUE;
                        $message = 'Review successfully posted.';
                    }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                        $success = FALSE;
                        $message = $this->lang->line("Review not posted.");
                    }
					            $json_array = array('success' => $success, 'message' => $message);
            echo json_encode($json_array);
            exit();
	}
	
	
	public function search_locations(){
		
		$cities = [];	  
      $cities = $this->home->_searchLocations($this->input->get("q"), $this->input->get("city"));
      echo json_encode($cities);
	  exit;
		
		
	}

	public function search_properties(){
	  $cities = [];	  
      $cities = $this->home->_searchProperties($this->input->get("q"), $this->input->get("city"));
	  $arr = array();
	  foreach($cities as $row){
		  $cont = '';	  
		  $rr = explode('_', $row->val);
		  if($rr[0]=='PROJ'){$cont = 'Project'; } 	  
		  if($rr[0]=='LOC'){$cont = 'Locality'; } 	  
		  if($rr[0]=='BLD'){$cont = 'Builder'; } 	  
		  $data['name'] = $row->name;	
		  $data['val'] = $row->val;	
		  $data['slug'] = $row->slug;	
		  $data['desc'] = $cont;	
		  $arr[] = $data;
	  }	  
	  echo json_encode($arr);
	  exit;		
	}

	public function search_All(){
	  $cities = [];	  
      $cities = $this->home->_searchAll($this->input->get("q"));
	  $arr = array();
	  foreach($cities as $row){
		  $cont = '';	  
		  $rr = explode('_', $row->val);
		  if($rr[0]=='PROJ'){$cont = 'Project'; } 	  
		  if($rr[0]=='LOC'){$cont = 'Locality'; } 	  
		  if($rr[0]=='BLD'){$cont = 'Builder'; } 	  
		  if($rr[0]=='CITY'){$cont = 'City'; } 	  
		  $data['name'] = $row->name;	
		  $data['val'] = $row->val;	
		  $data['slug'] = $row->slug;	
		  $data['desc'] = $cont;	
		  $arr[] = $data;
	  }	  
	  echo json_encode($arr);
	  exit;		
	}

	public function find_listings(){
	  $cities = [];	  
      $cities = $this->home->_searchListing($this->input->get("q"));
	  echo json_encode($cities);
	  exit;		
	}


}
