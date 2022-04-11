<?php
   defined('BASEPATH') OR exit('No direct script access allowed');
  
   class Masters extends MY_Controller
   {
       function __construct()
       {
           parent::__construct();
           //check if backend login
           $this->is_admin_login();
          
       }
      
       public function list_countries()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $states         = $this->masters->get_record('countries');
               $record            = $this->masters->get_record_id('countries', $id);
               $data['states'] = $states;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_countries', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_countries()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/countries/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'countries');
           } else {
               $result = $this->masters->update_record($id, $post_data, 'countries');
           }
           redirect('admin/masters/list_countries', 'refresh');
       }
      
       public function delete_countries()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'states');
                   redirect('admin/masters/list_states', 'refresh');
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

       public function list_states()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $states         = $this->masters->get_record('states');
               $record            = $this->masters->get_record_id('states', $id);
               $data['states'] = $states;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_states', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_states()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/states/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'states');
           } else {
               $result = $this->masters->update_record($id, $post_data, 'states');
           }
           redirect('admin/masters/list_states', 'refresh');
       }
      
       public function delete_states()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'states');
                   redirect('admin/masters/list_states', 'refresh');
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
	   
	   public function list_cities()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $cities         = $this->masters->get_record('cities');
               $record            = $this->masters->get_record_id('cities', $id);
               $data['cities'] = $cities;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_cities', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_cities()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'state_id' => $this->input->post('state'),
			   'title' => $this->input->post('title'),
               'meta_description' => $this->input->post('meta_description'),
               'meta_keywords' => $this->input->post('meta_keywords')
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/cities/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'cities');
			   $rec = $this->masters->get_record_id('cities',$result['id']);
				$arr['name'] = 'city';
				$arr['url']  = $rec->slug;
				$arr['parent_id'] = $rec->id;
				$arr['status'] = 1;
				$arr['file'] = '';
				$arr['is_active'] = 1;
			   $lr = _listRecord($arr);
           } else {
			   $result = $this->masters->update_record($id, $post_data, 'cities');
			   $rec = $this->masters->get_record_id('cities',$id);
			   $arr['name'] = 'city';
			   $arr['url']  = $rec->slug;
			   $arr['parent_id'] = $rec->id;
			   $arr['status'] = 1;
			   $arr['file'] = 'cities';
			   $arr['is_active'] = 1;
			   $lr = _updatelistRecord($arr);
           }
           redirect('admin/masters/list_cities', 'refresh');
       }
      
       public function delete_cities()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'cities');
                   redirect('admin/masters/list_cities', 'refresh');
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
	   
	   
	   public function list_localities()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $localities         = $this->masters->get_record('locations');
               $record            = $this->masters->get_record_id('locations', $id);
               $data['localities'] = $localities;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_localities', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_localities()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'city_id' => $this->input->post('city'),
               'state_id' => $this->input->post('state'),
               'country_id' => $this->input->post('country'),
			   'title' => $this->input->post('title'),
               'meta_description' => $this->input->post('meta_description'),
               'meta_keywords' => $this->input->post('meta_keywords'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/localities/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'locations');
			   $rec = $this->masters->get_record_id('locations',$result['id']);
			   $ct = $this->masters->get_record_id('cities',$rec->city_id);
			   $arr['name'] = 'locality';
			   $arr['url']  = $rec->slug.'-'.$ct->slug;
			   $arr['parent_id'] = $rec->id;
			   $arr['status'] = 1;
			   $arr['file'] = 'localities';
			   $arr['is_active'] = 1;
			   $lr = _listRecord($arr);
           } else {
               $result = $this->masters->update_record($id, $post_data, 'locations');
			   $rec = $this->masters->get_record_id('locations',$id);
			   $ct = $this->masters->get_record_id('cities',$rec->city_id);
			   $arr['name'] = 'locality';
			   $arr['url']  = $rec->slug.'-'.$ct->slug;
			   $arr['parent_id'] = $rec->id;
			   $arr['status'] = 1;
			   $arr['file'] = 'localities';
			   $arr['is_active'] = 1;
			   $lr = _updatelistRecord($arr);
		   }
           redirect('admin/masters/list_localities', 'refresh');
       }
      
       public function delete_localities()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'locations');
                   redirect('admin/masters/list_localities', 'refresh');
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
	   
	   /******** Amenities **************/
	   public function list_amenities()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $amenities         = $this->masters->get_record('amenities');
               $record            = $this->masters->get_record_id('amenities', $id);
               $data['amenities'] = $amenities;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/amenities/add_amenities', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_amenities()
       {
           $post_data               = array(
               'name' => $this->input->post('amenity_name'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/amenities/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'amenities');
           } else {
               $result = $this->masters->update_record($id, $post_data, 'amenities');
           }
           redirect('admin/masters/list_amenities', 'refresh');
       }
      
       public function delete_amenities()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'amenities');
                   redirect('admin/masters/list_amenities', 'refresh');
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
	   
	   /*********** Banks ********/
	   public function list_banks()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $banks         = $this->masters->get_record('banks');
               $record            = $this->masters->get_record_id('banks', $id);
               $data['banks'] = $banks;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_banks', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_banks()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/banks/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'banks');
           } else {
               $result = $this->masters->update_record($id, $post_data, 'banks');
           }
           redirect('admin/masters/list_banks', 'refresh');
       }
      
       public function delete_banks()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'banks');
                   redirect('admin/masters/list_banks', 'refresh');
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
	   
	   
	   /*********** Property Type ********/
	   public function list_propertiesType()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $property_types         = $this->masters->get_record('property_types');
               $record            = $this->masters->get_record_id('property_types', $id);
               $data['property_types'] = $property_types;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_propertiesType', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_propertiesType()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/property_types/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'property_types');
           } else {
               $result = $this->masters->update_record($id, $post_data, 'property_types');
           }
           redirect('admin/masters/list_propertiesType', 'refresh');
       }
      
       public function delete_propertiesType()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'property_types');
                   redirect('admin/masters/list_propertiesType', 'refresh');
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
	   
	   
	   /*********** Property Categories ********/
	   public function list_categories()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $categories         = $this->masters->get_record('property_categories');
               $record            = $this->masters->get_record_id('property_categories', $id);
               $data['categories'] = $categories;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_categories', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_category()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/categories/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'property_categories');
           } else {
               $result = $this->masters->update_record($id, $post_data, 'property_categories');
           }
           redirect('admin/masters/list_categories', 'refresh');
       }
      
       public function delete_category()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'property_categories');
                   redirect('admin/masters/list_categories', 'refresh');
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

	   /*********** Property Categories ********/
	   public function list_bedrooms()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $bedrooms         = $this->masters->get_record('floor_types');
               $record            = $this->masters->get_record_id('floor_types', $id);
               $data['bedrooms'] = $bedrooms;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_bedrooms', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_bedroom()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/bedrooms/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'floor_types');
           } else {
               $result = $this->masters->update_record($id, $post_data, 'floor_types');
           }
           redirect('admin/masters/list_bedrooms', 'refresh');
       }
      
       public function delete_bedroom()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'floor_types');
                   redirect('admin/masters/list_bedrooms', 'refresh');
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

	   /*********** Bathrooms ********/
	   public function list_bathrooms()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $bathrooms         = $this->masters->get_record('bathrooms');
               $record            = $this->masters->get_record_id('bathrooms', $id);
               $data['bathrooms'] = $bathrooms;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_bathrooms', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_bathroom()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/bathrooms/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'bathrooms');
           } else {
               $result = $this->masters->update_record($id, $post_data, 'bathrooms');
           }
           redirect('admin/masters/list_bathrooms', 'refresh');
       }
      
       public function delete_bathroom()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'bathrooms');
                   redirect('admin/masters/list_bathrooms', 'refresh');
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

	   /*********** Construction Status ********/
	   public function list_construction_status()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $construction_status         = $this->masters->get_record('construction_status');
               $record            = $this->masters->get_record_id('construction_status', $id);
               $data['construction_status'] = $construction_status;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_constructionStatus', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_construction_status()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/bathrooms/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'construction_status');
           } else {
               $result = $this->masters->update_record($id, $post_data, 'construction_status');
           }
           redirect('admin/masters/list_construction_status', 'refresh');
       }
      
       public function delete_construction_status()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'construction_status');
                   redirect('admin/masters/list_construction_status', 'refresh');
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

	   /*********** Furnish Type ********/
	   public function list_furnishType()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $furnish_types         = $this->masters->get_record('furnish_types');
               $record            = $this->masters->get_record_id('furnish_types', $id);
               $data['furnish_types'] = $furnish_types;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_furnishType', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_furnishType()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/bathrooms/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'furnish_types');
           } else {
               $result = $this->masters->update_record($id, $post_data, 'furnish_types');
           }
           redirect('admin/masters/list_furnishType', 'refresh');
       }
      
       public function delete_furnishType()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'furnish_types');
                   redirect('admin/masters/list_furnishType', 'refresh');
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

	   /*********** Parkings ********/
	   public function list_parkings()
       {
           $data['title'] = $this->lang->line("text_locations");
           $id            = $this->uri->segment(4);
           if ($this->permitted('list_articles')) {
               $parkings         = $this->masters->get_record('parkings');
               $record            = $this->masters->get_record_id('parkings', $id);
               $data['parkings'] = $parkings;
               $data['record']    = $record;
               $data['sub_view']  = $this->load->view('admin/Masters/_parkings', $data, TRUE);
           } else {
               $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
           }
           $this->load->view('admin/_layout', $data);
       }
      
       public function add_parking()
       {
           $post_data               = array(
               'name' => $this->input->post('name'),
               'created_by' => $this->get_user_id()
           );
           $id                      = $this->input->post('id');
           //upload config
           $config['upload_path']   = 'uploads/parkings/';
           $config['allowed_types'] = '*';
           $config['encrypt_name']  = TRUE;
           $config['overwrite']     = TRUE;
           $config['max_size']      = '1024'; //1 MB
           //Upload Icon
           if (isset($_FILES['icon']['name']) && $_FILES['icon']['name'] != '') {
               $this->load->library('upload', $config);
               if (!$this->upload->do_upload('icon')) {
                   $success    = FALSE;
                   $message    = $this->upload->display_errors();
                   $json_array = array(
                       'success' => $success,
                       'message' => $message
                   );
                   echo json_encode($json_array);
                   exit();
               } else {
                   $upload_data       = $this->upload->data();
                   $post_data['icon'] = $upload_data['file_name'];
               }
           }
           //XXS Clean
           $post_data = $this->security->xss_clean($post_data);
           if ($id == '') {
               $result = $this->masters->save_record($post_data, 'parkings');
           } else {
               $result = $this->masters->update_record($id, $post_data, 'parkings');
           }
           redirect('admin/masters/list_parkings', 'refresh');
       }
      
       public function delete_parking()
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
                   $res           = $this->masters->delete_record($id, $post_data, 'parkings');
                   redirect('admin/masters/list_parkings', 'refresh');
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