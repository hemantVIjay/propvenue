<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Properties extends MY_Controller
  {
      public function __construct()
      {
          parent::__construct();
          //check if backend login
          $this->is_admin_login();
          //pagination settings
          $this->perPage = 10;
          
      }
      //list orders
      public function list_properties($page = 0)
      {
          $data['title'] = $this->lang->line("text_orders");
          $conditions    = array();
          
          // Row position
          if ($page != 0) {
              $page = ($page - 1) * $this->perPage;
          }
          $keyword  = $this->input->post('keyword');
          $category = $this->input->post('category');
          $status   = $this->input->post('status');
          if (!empty($keyword)) {
              $conditions['search']['keyword'] = $keyword;
          }
          if (!empty($status)) {
              $conditions['search']['status'] = $status;
          }
          $Properties = $this->properties->get_allProperties($conditions);
          if ($Properties) {
              $propertiesCount = count($Properties);
          } else {
              $propertiesCount = 0;
          }
          //set start and limit
          $conditions['start'] = $page;
          $conditions['limit'] = $this->perPage;
          
          $data['title'] = $this->lang->line("text_locations");
          $id            = $this->uri->segment(4);
          if ($this->permitted('list_articles')) {
              $Properties = $this->properties->get_allProperties($conditions);
              //get pagination confing
              $config     = $this->pagination_config($base_url = base_url() . 'admin/properties/list_properties', $total_rows = $propertiesCount, $per_page = $this->perPage);
              // Initialize
              $this->pagination->initialize($config);
              //set data array
              $data['pagination'] = $this->pagination->create_links();
              $data['page']       = $page;
              
              $data['Properties'] = $Properties;
              $data['sub_view']   = $this->load->view('admin/Properties/list_properties', $data, TRUE);
          } else {
              $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
          }
          $this->load->view('admin/_layout', $data);
      }
      
      public function add_projects()
      {
          $data['title'] = $this->lang->line("text_orders");
          if ($this->permitted('list_users')) {
              //get all user types
              $data['sub_view'] = $this->load->view('admin/Properties/add_projects', $data, TRUE);
          } else {
              $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
          }
          $this->load->view('admin/_layout', $data);
      }


      public function add_properties()
      {
          $data['title'] = $this->lang->line("text_orders");
          if ($this->permitted('list_users')) {
              //get all user types
              $data['sub_view'] = $this->load->view('admin/Properties/add_properties', $data, TRUE);
          } else {
              $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
          }
          $this->load->view('admin/_layout', $data);
      }

	  public function edit_property()
      {
          $data['title'] = $this->lang->line("text_orders");
          if ($this->permitted('list_users')) {
              //get all user types
		  $id = $this->uri->segment(4);	  
		  $propertyData = $this->properties->propertyDetails($id);	 
          $data['info'] = $propertyData;		  
          $data['id'] = $id;		  
              $data['sub_view'] = $this->load->view('admin/Properties/edit_properties', $data, TRUE);
          } else {
              $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
          }
          $this->load->view('admin/_layout', $data);
      }
      
      
      public function create_property()
      {
		  $pcode = _autoCode('Property');
          $amenities = '';
		  $banks = '';
          if (!empty($this->input->post('pvAMNTS'))) {
              $amenities = implode(',', $this->input->post('pvAMNTS'));
          }
		  if(!empty($this->input->post('banks'))){
		   $banks = implode(',', $this->input->post('banks'));
		  }
          
          $post_data  = array(
              'code' => $pcode,
              'property_name' => $this->input->post('property_name'),
              'property_for' => $this->input->post('pvIWT'),
			  'property_type' => $this->input->post('propertyType'),
			  'property_category' => $this->input->post('pvPTYP'),
              'bedrooms' => $this->input->post('pvBHK'),
              'bathrooms' => $this->input->post('pvBTH'),
              'balcony' => $this->input->post('pvBLCNY'),
              'furnish_type' => $this->input->post('pvFRNTYP'),
              'open_parking' => $this->input->post('pvOPNPRK'),
              'covered_parking' => $this->input->post('pvCVRPRK'),
              'cost' => $this->input->post('cost'),
              'maintenance_charges' => $this->input->post('maintenance_charges'),
              'locality' => $this->input->post('location'),
              'builder_id' => $this->input->post('builder'),
              'project' => $this->input->post('project'),
              'city_id' => $this->input->post('city'),             
              'builtup_area' => $this->input->post('builtup_area'),
              'carpet_area' => $this->input->post('carpet_area'),
              'construction_status' => $this->input->post('pvCONSTS'),
              'description' => htmlentities($this->input->post('description')),
			  'property_amenities' => $amenities,
			  'banks_available' => $banks,
              'rera_approved' => $this->input->post('rera_approved'),
              'rera_registrationNumber' => $this->input->post('rera_registrationNumber'),
              'status' => 1,
              'created_by' => $this->get_user_id()
          );
		  if(isset($_FILES['payment_option']) && $_FILES['payment_option']['name']!=''){
		   $post_data['payment_option'] = $this->singleUpload('payment_option', 'properties/Payment Option');
		  }
		  if(isset($_FILES['site_layout']) && $_FILES['site_layout']['name']!=''){
		   $post_data['site_layout'] = $this->singleUpload('site_layout', 'properties/Site Layout');
		  }
		  if(isset($_FILES['main_image']) && $_FILES['main_image']['name']!=''){
		   $post_data['main_image'] = $this->singleUpload('main_image', 'properties/Main Image');
		  }	
          //XXS Clean
          $post_data = $this->security->xss_clean($post_data);
          $result    = $this->properties->create_property($post_data);
          
          redirect('admin/properties/list_properties', 'refresh');
      }
	  
	  
	  public function update_property()
      {
		  $amenities = '';
		  $banks = '';
		  $id = $this->input->post('id');
          if (!empty($this->input->post('pvAMNTS'))) {
              $amenities = implode(',', $this->input->post('pvAMNTS'));
          }
		  if(!empty($this->input->post('banks'))){
		   $banks = implode(',', $this->input->post('banks'));
		  }
          
          $post_data  = array(
              'property_name' => $this->input->post('property_name'),
              'property_for' => $this->input->post('pvIWT'),
			  'property_type' => $this->input->post('propertyType'),
			  'property_category' => $this->input->post('pvPTYP'),
              'bedrooms' => $this->input->post('pvBHK'),
              'bathrooms' => $this->input->post('pvBTH'),
              'balcony' => $this->input->post('pvBLCNY'),
              'furnish_type' => $this->input->post('pvFRNTYP'),
              'open_parking' => $this->input->post('pvOPNPRK'),
              'covered_parking' => $this->input->post('pvCVRPRK'),
              'cost' => $this->input->post('cost'),
              'maintenance_charges' => $this->input->post('maintenance_charges'),
              'locality' => $this->input->post('location'),
              'project' => $this->input->post('project'),
              'city_id' => $this->input->post('city'),             
              'builtup_area' => $this->input->post('builtup_area'),
              'carpet_area' => $this->input->post('carpet_area'),
              'construction_status' => $this->input->post('pvCONSTS'),
              'description' => htmlentities($this->input->post('description')),
			  'property_amenities' => $amenities,
			  'banks_available' => $banks,
              'rera_approved' => $this->input->post('rera_approved'),
              'rera_registrationNumber' => $this->input->post('rera_registrationNumber'),
              'updated_by' => $this->get_user_id()
          );
		  if(isset($_FILES['payment_option']) && $_FILES['payment_option']['name']!=''){
		   $post_data['payment_option'] = $this->singleUpload('payment_option', 'properties/Payment Option');
		  }
		  if(isset($_FILES['site_layout']) && $_FILES['site_layout']['name']!=''){
		   $post_data['site_layout'] = $this->singleUpload('site_layout', 'properties/Site Layout');
		  }
		  if(isset($_FILES['main_image']) && $_FILES['main_image']['name']!=''){
		   $post_data['main_image'] = $this->singleUpload('main_image', 'properties/Main Image');
		  }	
          //XXS Clean
          $post_data = $this->security->xss_clean($post_data);
          $result    = $this->properties->update_property($post_data, $id);
          
          redirect('admin/properties/list_properties', 'refresh');
      }
      
      
      public function location_details()
      {
          $locations        = $this->masters->get_location($_REQUEST['id']);
          $data['city']     = $locations->city_id;
          $data['district'] = $locations->district_id;
          $data['state']    = $locations->state_id;
          $data['country']  = $locations->country_id;
          echo json_encode($data);
          exit;
      }
	  
	  public function _cityLocations()
      {
          $locations        = $this->masters->get_cityLocations($_REQUEST['id']);
          $data['city']     = $locations->city_id;
          $data['district'] = $locations->district_id;
          $data['state']    = $locations->state_id;
          $data['country']  = $locations->country_id;
          echo json_encode($data);
          exit;
      }
      
      
      public function upload_propertyImages()
      {
          $propertyImages = array();
          foreach ($_FILES['image_name']['name'] as $k => $fval) {
              /******For Image******/
              $_FILES['mFile']['name']     = $_FILES['image_name']['name'][$k];
              $_FILES['mFile']['type']     = $_FILES['image_name']['type'][$k];
              $_FILES['mFile']['tmp_name'] = $_FILES['image_name']['tmp_name'][$k];
              $_FILES['mFile']['error']    = $_FILES['image_name']['error'][$k];
              $_FILES['mFile']['size']     = $_FILES['image_name']['size'][$k];
              $fdata[$k]['image_name']     = $this->singleUpload('mFile', 'properties/' . $_REQUEST['image_type'][$k]);
              /******For Image******/
              $fdata[$k]['image_type']     = $_REQUEST['image_type'][$k];
              $fdata[$k]['image_desc']     = $_REQUEST['image_desc'][$k];
              $fdata[$k]['property_id']    = $_REQUEST['property_id'];
              
              $propertyImages[] = $fdata[$k];
          }
          //XXS Clean
          $propertyImages = $this->security->xss_clean($propertyImages);
          
          $result = $this->properties->upload_PropertyImages($propertyImages);
          redirect('admin/properties/list_properties', 'refresh');
          
          echo '<pre/>';
          print_r($propertyImages);
          exit;
      }
      
      
      public function delete_property()
      {
          $id = $this->uri->segment(4);
          if (isset($id)) {
              //check permission
              if ($this->permitted('delete_article')) {
                  $data['title'] = $this->lang->line("text_delete_article");
                  $post_data     = array(
                      'status' => 0,
                      'updated_by' => $this->get_user_id()
                  );
                  $res           = $this->properties->delete_property($id, $post_data);
                  redirect('admin/properties/list_properties', 'refresh');
              } else {
                  $data['title'] = $this->lang->line("alert_access_denied");
                  $success       = TRUE;
                  $message       = '';
                  $content       = $this->load->view('errors/permission/denied', $data, TRUE);
              }
              $json_array = array(
                  'success' => $success,
                  'message' => $message,
                  'content' => $content
              );
              echo json_encode($json_array);
              exit();
          }
      }    
      
  }
