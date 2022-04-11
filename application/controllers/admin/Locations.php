<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locations extends MY_Controller {
    function __construct(){
        parent::__construct();
        //check if backend login
        $this->is_admin_login();
        //Load Libraries
        $this->load->library(array('pagination'));
        //pagination settings
        $this->perPage = 10;
		//load models
        $this->load->model(array('location_model','user_model'));
        
    }
    //list locations
	public function list_locations()
	{
        $data['title']=$this->lang->line("text_locations");
		$id = $this->uri->segment(4);
        if($this->permitted('list_articles')){
            //get all categories
			$locations = $this->location_model->get_locations($id);
            $data['locations']=$locations;
            $data['sub_view'] = $this->load->view('admin/locations/list_locations', $data, TRUE);
        }else{
            $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
        }
        $this->load->view('admin/_layout', $data); 
    }

    //list locations
	public function list_zones()
	{
        $data['title']=$this->lang->line("text_locations");
        if($this->permitted('list_articles')){
            //get all categories
            $locations = $this->location_model->get_zones($conditions=array());
            $data['zones']=$locations;
            $data['sub_view'] = $this->load->view('admin/locations/list_zones', $data, TRUE);
        }else{
            $data['sub_view'] = $this->load->view('errors/permission/denied', $data, TRUE);
        }
        $this->load->view('admin/_layout', $data); 
    }

    //list locations
	public function add_location()
	{
       if($this->input->post()){
            //check permission
            if($this->permitted('add_ticket_category')){
                $data['title']=$this->lang->line("text_locations");
                $success = TRUE;
                $message = '';
                $content = $this->load->view('admin/locations/add_location',$data,TRUE);
            }else{
                $data['title']=$this->lang->line("alert_access_denied");
                $success = TRUE;
                $message = '';
                $content = $this->load->view('errors/permission/denied',$data,TRUE);
            }
            $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
            echo json_encode($json_array);
            exit();
        }exit;
    }

    //list locations
	public function add_zone()
	{
       if($this->input->post()){
            //check permission
            if($this->permitted('add_ticket_category')){
                $data['title']= 'Create New Zone';
                $success = TRUE;
                $message = '';
                $content = $this->load->view('admin/locations/add_zone',$data,TRUE);
            }else{
                $data['title']=$this->lang->line("alert_access_denied");
                $success = TRUE;
                $message = '';
                $content = $this->load->view('errors/permission/denied',$data,TRUE);
            }
            $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
            echo json_encode($json_array);
            exit();
        }exit;
    }
	
	//list locations
	public function add_zonelocation()
	{
       if($this->input->post()){
            //check permission
            if($this->permitted('add_ticket_category')){
                $data['title'] = 'Add Locations to Zone';
                $data['id']    = $this->input->post('category_id');
			    $success = TRUE;
                $message = '';
                $content = $this->load->view('admin/locations/add_zoneLocation',$data,TRUE);
            }else{
                $data['title']=$this->lang->line("alert_access_denied");
                $success = TRUE;
                $message = '';
                $content = $this->load->view('errors/permission/denied',$data,TRUE);
            }
            $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
            echo json_encode($json_array);
            exit();
        }exit;
    }

    //list locations ajax
    public function list_locations_ajaxs($page=0){
        $conditions = array();
        // Row position
        if($page != 0){
            $page = ($page-1) * $this->perPage;
        }
        $keyword=$this->input->post('keyword');
        $category=$this->input->post('category');
        $priority=$this->input->post('priority');
        $status=$this->input->post('status');
        $ticket_type=$this->input->post('ticket_type');
        if(!empty($keyword)){
            $conditions['search']['keyword'] = $keyword;
        }
        if(!empty($category)){
            $conditions['search']['category'] = $category;
        }
        if(!empty($priority)){
            $conditions['search']['priority'] = $priority;
        }
        if(!empty($status)){
            $conditions['search']['status'] = $status;
        }
        if(!empty($ticket_type)){
            $conditions['search']['ticket_type'] = $ticket_type;
        }
        $conditions['search']['user_type'] = $this->get_user_type();
        $conditions['search']['user_id'] = $this->get_user_id();
        //get locations count
        $locations=$this->ticket_model->get_locations($conditions);
        if($locations){
            $locationsCount=count($locations);
        }else{
            $locationsCount=0;
        }
        //set start and limit
        $conditions['start'] = $page;
        $conditions['limit'] = $this->perPage;
        //get all locations
        $locations = $this->ticket_model->get_locations($conditions);
        //get pagination confing
        $config=$this->pagination_config($base_url=base_url().'admin/locations/list_locations_ajax',$total_rows=$locationsCount,$per_page=$this->perPage);
        // Initialize
        $this->pagination->initialize($config);
        //set data array
        $data['pagination'] = $this->pagination->create_links();
        $data['page']=$page;
        $data['locations']=$locations;
        //response
        $success = true;
        $message = '';
        $content = $this->load->view('admin/locations/list_locations_ajax',$data,TRUE);
        $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
        echo json_encode($json_array);
        exit();
    }

   
    //ajax paginate categories
    public function list_locations_ajax($page=0){
        $conditions = array();
        // Row position
        if($page != 0){
            $page = ($page-1) * $this->perPage;
        }
        //get categories count
        $categories=$this->ticket_model->get_categories($conditions);
        if($categories){
            $categoriesCount=count($categories);
        }else{
            $categoriesCount=0;
        }
        //set start and limit
        $conditions['start'] = $page;
        $conditions['limit'] = $this->perPage;
        //get all categories
        $categories = $this->ticket_model->get_categories($conditions);
        //get pagination confing
        $config=$this->pagination_config($base_url=base_url().'locations/list_locations_ajax',$total_rows=$categoriesCount,$per_page=$this->perPage);
        // Initialize
        $this->pagination->initialize($config);
        //set data array
        $data['pagination'] = $this->pagination->create_links();
        $data['page']=$page;
        $data['categories']=$categories;
        //response
        $success = true;
        $message = '';
        $content = $this->load->view('admin/locations/list_locations_ajax',$data,TRUE);
        $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
        echo json_encode($json_array);
        exit();
    }

    //view ticket category
	public function view_category()
	{
        if($this->input->post()){
            //check permission
            if($this->permitted('view_ticket_category')){
                $data['title']=$this->lang->line("text_view_ticket_category");
                $category_id = $this->input->post('category_id');
                //get ticket category by id
                $category = $this->ticket_model->get_category($category_id);
                $data['category']=$category;
                $success = true;
                $message = '';
                $content = $this->load->view('admin/locations/view_category',$data,TRUE);
            }else{
                $data['title']=$this->lang->line("alert_access_denied");
                $success = TRUE;
                $message = '';
                $content = $this->load->view('errors/permission/denied',$data,TRUE);
            }
            $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
            echo json_encode($json_array);
            exit();
        }
    }

    //add ticket category
	/*public function add_location()
	{
        if($this->input->post()){
            //check permission
            if($this->permitted('add_ticket_location')){
                $data['title']=$this->lang->line("text_view_ticket_location");
                $success = TRUE;
                $message = '';
                $content = $this->load->view('admin/locations/add_location',$data,TRUE);
            }else{
                $data['title']=$this->lang->line("alert_access_denied");
                $success = TRUE;
                $message = '';
                $content = $this->load->view('errors/permission/denied',$data,TRUE);
            }
            $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
            echo json_encode($json_array);
            exit();
        }
    }
*/
    //create ticket location
    public function create_location(){
        if($this->input->post()){
            //check permission
            if($this->permitted('add_ticket_category')){
                $this->form_validation->set_rules('name','Name','trim|required');
                $this->form_validation->set_rules('landmark','Landmark','trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $success = FALSE;
                    $message = validation_errors();
                }else{
                    $post_data = array(
                        'name' => $this->input->post('name'),
                        'landmark' => $this->input->post('landmark'),
                        'city_id' => $this->input->post('city_id'),
                        'state_id' => $this->input->post('state_id'),
                        'country_id' => $this->input->post('country_id'),
                        'created_by' => $this->get_user_id(),
                        'updated_by' => $this->get_user_id(),
                    );
                    //XXS Clean
                    $post_data = $this->security->xss_clean($post_data);
                    $result = $this->location_model->create_location($post_data);
                    if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                        $success = TRUE;
                        $message = $this->lang->line("alert_ticket_category_created");
                    }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                        $success = FALSE;
                        $message = $this->lang->line("alert_ticket_category_not_created");
                    }
                }
            }else{
                $success = FALSE;
                $message = $this->lang->line("alert_access_denied");
            }
            $json_array = array('success' => $success, 'message' => $message);
            echo json_encode($json_array);
            exit();
        }
    }


    //create ticket location
    public function create_zone(){
        if($this->input->post()){
            //check permission
            if($this->permitted('add_ticket_category')){
                $this->form_validation->set_rules('name','Name','trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $success = FALSE;
                    $message = validation_errors();
                }else{
                    $post_data = array(
                        'zone_name' => $this->input->post('name'),
                        'city_id' => $this->input->post('city_id'),
                        'state_id' => $this->input->post('state_id'),
                        'country_id' => $this->input->post('country_id'),
                        'created_by' => $this->get_user_id(),
                        'status' => 1
                    );
                    //XXS Clean
                    $post_data = $this->security->xss_clean($post_data);
                    $result = $this->location_model->create_zone($post_data);
                    if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                        $success = TRUE;
                        $message = 'Zone successfully created.';
                    }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                        $success = FALSE;
                        $message = $this->lang->line("Zone not created.");
                    }
                }
            }else{
                $success = FALSE;
                $message = $this->lang->line("alert_access_denied");
            }
            $json_array = array('success' => $success, 'message' => $message);
            echo json_encode($json_array);
            exit();
        }
    }

    //create ticket location
    public function create_zoneLocation(){
        if($this->input->post()){
            //check permission
            if($this->permitted('add_ticket_category')){
                $this->form_validation->set_rules('name','Name','trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $success = FALSE;
                    $message = validation_errors();
                }else{
				   $zone_id = $this->input->post('zone_id');
				   $zones   = $this->location_model->get_zoneDetail($zone_id);
                   $post_data = array(
                        'name' => $this->input->post('name'),
                        'landmark' => $this->input->post('landmark'),
                        'zone_id' => $zones->id,
                        'city_id' => $zones->city_id,
                        'state_id' => $zones->state_id,
                        'country_id' => $zones->country_id,
                        'created_by' => $this->get_user_id(),
                        'updated_by' => $this->get_user_id()
                    );
                    //XXS Clean
                    $post_data = $this->security->xss_clean($post_data);
                    $result = $this->location_model->create_zlocation($post_data);
                    if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                        $success = TRUE;
                        $message = 'Zone successfully created.';
                    }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                        $success = FALSE;
                        $message = $this->lang->line("Zone not created.");
                    }
                }
            }else{
                $success = FALSE;
                $message = $this->lang->line("alert_access_denied");
            }
            $json_array = array('success' => $success, 'message' => $message);
            echo json_encode($json_array);
            exit();
        }
    }
    
    //edit ticket category - load view
	public function edit_category()
	{
        if($this->input->post()){
            //check permission
            if($this->permitted('text_edit_ticket_category')){
                $data['title']=$this->lang->line("alert_access_denied");
                $category_id = $this->input->post('category_id');
                //get ticket category by id
                $category = $this->ticket_model->get_category($category_id);
                $data['category']=$category;
                $success = true;
                $message = '';
                $content = $this->load->view('admin/locations/edit_category',$data,TRUE);
            }else{
                $data['title']=$this->lang->line("alert_access_denied");
                $success = TRUE;
                $message = '';
                $content = $this->load->view('errors/permission/denied',$data,TRUE);
            }
            $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
            echo json_encode($json_array);
            exit();
        }
    }

    //update ticket category
    public function update_category(){
        if($this->input->post()){
            //check permission
            if($this->permitted('edit_ticket_category')){
                $this->form_validation->set_rules('title','Title','trim|required');
                $this->form_validation->set_rules('description','Description','trim|required');
                if ($this->form_validation->run() == FALSE) {
                    $success = FALSE;
                    $message = validation_errors();
                }else{
                    $category_id = $this->input->post('category_id');
                    $update_data = array(
                        'category_name' => $this->input->post('title'),
                        'category_description' => $this->input->post('description'),
                        'updated_by' => $this->get_user_id(),
                    );
                    //XXS Clean
                    $update_data = $this->security->xss_clean($update_data);
                    $result = $this->ticket_model->update_category($category_id,$update_data);
                    if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                        $success = TRUE;
                        $message = $this->lang->line("alert_ticket_category_updated");
                    }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                        $success = FALSE;
                        $message = $this->lang->line("alert_ticket_category_not_updated");
                    }
                }
            }else{
                $success = FALSE;
                $message = $this->lang->line("alert_access_denied");
            }
            $json_array = array('success' => $success, 'message' => $message);
            echo json_encode($json_array);
            exit();
        }
    }

    //ticket categories ordering
    public function categories_ordering()
    {
        if($this->input->post()){
            //check permission
            if($this->permitted('ticket_category_ordering')){
                $data['title']=$this->lang->line("text_categories_ordering");
                $categories = $this->ticket_model->get_categories($conditions=array());
                $data['categories']=$categories;
                $success = true;
                $message = '';
                $content = $this->load->view('admin/locations/categories_ordering',$data,TRUE);
            }else{
                $data['title']=$this->lang->line("alert_access_denied");
                $success = TRUE;
                $message = '';
                $content = $this->load->view('errors/permission/denied',$data,TRUE);
            }
            $json_array = array('success' => $success, 'message' => $message,'content'=>$content);
            echo json_encode($json_array);
            exit();
        }
    }

    //update categories ordering
    public function update_categories_ordering(){
        if($this->input->post()){
            //check permission
            if($this->permitted('ticket_category_ordering')){
                $sorted_data=json_decode($_POST['sorted_data']);
                $sorted_data = $this->security->xss_clean($sorted_data);
                $result = $this->ticket_model->update_category_ordering($sorted_data);
                if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                    $success = TRUE;
                    $message = $this->lang->line("alert_ticket_category_order_updated");
                }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                    $success = FALSE;
                    $message = $this->lang->line("alert_ticket_category_order_not_updated");
                }
            }else{
                $success = FALSE;
                $message = $this->lang->line("alert_access_denied");
            }
            $json_array = array('success' => $success, 'message' => $message);
            echo json_encode($json_array);
            exit();
        }
    }
    //delete ticket category
	public function delete_category()
	{
        if($this->input->post()){
            //check permission
            if($this->permitted('delete_ticket_category')){
                $data['title']=$this->lang->line("text_delete_ticket_category");
                $category_id = $this->input->post('category_id');
                //check locations exist in category
                $locations=$this->ticket_model->get_locations_by_category($category_id);
                if($locations){
                    //if found need to transfer another category
                    $is_exist=TRUE;
                    //get another categories except this
                    $categories=$this->ticket_model->get_categories_except($category_id);
                    $data['categories']=$categories;

                }else{
                    $is_exist=FALSE;
                }
                $data['is_exist']=$is_exist;
                $data['category_id']=$category_id;
                $success = TRUE;
                $message = '';
                $exist = $is_exist;
                $content = $this->load->view('admin/locations/delete_category',$data,TRUE);
            }else{
                $data['title']=$this->lang->line("alert_access_denied");
                $success = TRUE;
                $message = '';
                $exist = FALSE;
                $content = $this->load->view('errors/permission/denied',$data,TRUE);
            }
            $json_array = array('success' => $success, 'message' => $message,'content'=>$content,'exist'=>$exist);
            echo json_encode($json_array);
            exit();
        }
    }

    //delete category action
    public function delete_category_action(){
        if($this->input->post()){
            //check permission
            if($this->permitted('delete_ticket_category')){
                $category_id = $this->input->post('category_id');
                $transfer_category = $this->input->post('transfer_category');
                $complete_delete = $this->input->post('complete_delete');
                //delete ticket
                $result = $this->ticket_model->delete_ticket_category($category_id,$transfer_category,$complete_delete);
                if ($result['status']==TRUE &&$result['label']=='SUCCESS') {
                    $success = TRUE;
                    $message = $this->lang->line("alert_ticket_category_deleted");
                }elseif($result['status']==FALSE &&$result['label']=='ERROR'){
                    $success = FALSE;
                    $message = $this->lang->line("alert_ticket_category_not_deleted");
                }elseif($result['status']==FALSE &&$result['label']=='NOTEXIST'){
                    $success = FALSE;
                    $message = $this->lang->line("alert_transfer_category_not_exist");
                }
            }else{
                $success = FALSE;
                $message = $this->lang->line("alert_access_denied");
            }
            $json_array = array('success' => $success, 'message' => $message);
            echo json_encode($json_array);
            exit();
        }
    }
}